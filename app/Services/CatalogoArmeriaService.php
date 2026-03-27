<?php

namespace App\Services;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use JsonException;
use RuntimeException;
use Throwable;

class CatalogoArmeriaService
{
    private const CACHE_TTL_SECONDS = 3300;
    private const ENDPOINT_CATALOGO = '/api/catalogo';

    private string $apiKey;
    private array  $sucursales;
    private array  $erroresSucursales = [];

    public function __construct()
    {
        $config = config('services.armeria');
        if (!is_array($config)) {
            Log::error('CatalogoArmeriaService: config services.armeria no encontrada o inválida.');
            $this->apiKey = '';
            $this->sucursales = [];
            return;
        }

        $this->apiKey     = (string) ($config['key'] ?? '');
        $this->sucursales = (array)  ($config['sucursales'] ?? []);
    }

    /**
     * @return array{productos: array, errores: array}
     */
    public function getCatalogoCompleto(?string $slug = null): array
    {
        $this->erroresSucursales = [];
        $productos = [];
        $pendientes = [];

        // 1. Identificar sucursales y revisar cache
        foreach ($this->sucursales as $sucursal) {
            if (empty($sucursal['url'])) continue;
            if ($slug !== null && ($sucursal['slug'] ?? '') !== $slug) continue;

            $sSlug    = $sucursal['slug'] ?? 'desconocido';
            $cacheKey = "catalogo_armeria_{$sSlug}";

            if (Cache::has($cacheKey)) {
                $productos = array_merge($productos, Cache::get($cacheKey));
            } else {
                $pendientes[$sSlug] = $sucursal;
            }
        }

        // 2. Consultar pendientes en PARALELO
        if (!empty($pendientes)) {
            $responses = Http::pool(fn ($pool) => 
                array_map(function ($s) use ($pool) {
                    return $pool->as($s['slug'])
                        ->timeout(12)
                        ->withoutVerifying() 
                        ->withHeaders([
                            'X-Api-Key' => $this->apiKey,
                            'Accept'    => 'application/json',
                        ])->get(rtrim($s['url'], '/') . self::ENDPOINT_CATALOGO);
                }, $pendientes)
            );

            foreach ($responses as $sSlug => $response) {
                $sucursal = $pendientes[$sSlug];

                if ($response->failed()) {
                    $this->erroresSucursales[$sSlug] = "HTTP {$response->status()}";
                    Log::error("CatalogoArmeriaService: error en sucursal [{$sSlug}]", [
                        'status' => $response->status(),
                        'url'    => $sucursal['url'],
                        'body'   => $response->body()
                    ]);
                    continue;
                }

                try {
                    $payload = $response->json();
                    $itemsRaw = $this->extraerProductos($payload);
                    $normalizados = array_map(fn($p) => $this->normalizarProducto($p, $sucursal), $itemsRaw);

                    Cache::put("catalogo_armeria_{$sSlug}", $normalizados, self::CACHE_TTL_SECONDS);
                    $productos = array_merge($productos, $normalizados);

                } catch (Throwable $e) {
                    $this->erroresSucursales[$sSlug] = $e->getMessage();
                }
            }
        }

        // 3. Fallback Demo si está todo vacío
        if (empty($productos)) {
            $productos = $this->getDatosDemo();
            $this->erroresSucursales = [];
        }

        return [
            'productos' => $productos,
            'errores'   => $this->erroresSucursales
        ];
    }

    private function extraerProductos(mixed $payload): array
    {
        if (!is_array($payload)) throw new RuntimeException('API no devolvió arreglo JSON.');
        if (array_is_list($payload)) return $payload;

        foreach (['data', 'productos', 'catalogo', 'items', 'results'] as $key) {
            if (isset($payload[$key]) && is_array($payload[$key])) {
                return array_is_list($payload[$key]) ? $payload[$key] : [$payload[$key]];
            }
        }
        return [$payload];
    }

    public function normalizarProducto(array $producto, array $sucursal): array
    {
        $dominio = rtrim((string) ($sucursal['url'] ?? ''), '/');

        return [
            'id'               => $this->pickValue($producto, ['id', 'producto_id', 'pro_id']),
            'nombre'           => $this->pickValue($producto, ['nombre', 'producto_nombre', 'pro_nombre']) ?? 'Desconocido',
            'descripcion'      => $this->pickValue($producto, ['descripcion', 'producto_descripcion', 'pro_descripcion']) ?? '',
            'precio'           => $this->normalizarPrecio($this->pickValue($producto, ['precio', 'pro_precio'])),
            'categoria'        => $this->pickValue($producto, ['categoria', 'cat_nombre']) ?? 'General',
            'subcategoria'     => $this->pickValue($producto, ['subcategoria']) ?? '',
            'marca'            => $this->pickValue($producto, ['marca']) ?? '',
            'modelo'           => $this->pickValue($producto, ['modelo']) ?? '',
            'calibre'          => $this->pickValue($producto, ['calibre']) ?? '',
            'pais_fabricacion' => $this->pickValue($producto, ['pais_fabricacion']) ?? '',
            'imagenes'         => $this->normalizarImagenes($this->pickValue($producto, ['imagenes', 'imagenes_urls'], [])),
            'sucursal'         => $sucursal['nombre'] ?? 'Desconocida',
            'sucursal_slug'    => $sucursal['slug'] ?? '',
            'dominio'          => $dominio,
            'storage_url'      => $dominio === '' ? '' : $dominio . '/storage',
        ];
    }

    private function pickValue(array $data, array $keys, mixed $default = null): mixed
    {
        foreach ($keys as $key) {
            if (array_key_exists($key, $data) && $data[$key] !== null) {
                return $data[$key];
            }
        }
        return $default;
    }

    private function normalizarPrecio(mixed $value): float
    {
        if (is_numeric($value)) return (float) $value;
        if (!is_string($value)) return 0.0;
        $clean = preg_replace('/[^\d.]/', '', str_replace(',', '.', $value));
        return is_numeric($clean) ? (float) $clean : 0.0;
    }

    private function normalizarImagenes(mixed $imagenes): array
    {
        if (is_string($imagenes)) {
            $imagenes = json_decode($imagenes, true) ?? explode(',', $imagenes);
        }
        if (!is_array($imagenes)) return [];

        return array_values(array_filter(array_map(function($img) {
            if (is_array($img)) $img = $img['url'] ?? $img['path'] ?? $img['src'] ?? '';
            $img = trim((string)$img);
            if (empty($img)) return null;
            // Limpiar prefijos storage/ o public/
            return ltrim(str_replace(['public/', 'storage/'], '', $img), '/');
        }, $imagenes)));
    }

    public function getSucursalesDisponibles(): array
    {
        return array_values(array_filter($this->sucursales, fn($s) => !empty($s['url'])));
    }

    public function getErroresSucursales(): array
    {
        return $this->erroresSucursales;
    }

    private function getDatosDemo(): array
    {
        $sucursalesDemo = [
            ['nombre' => 'Melchor de Mencos', 'slug' => 'melchor', 'url' => 'https://melchordemencos.armeriabalam.com'],
            ['nombre' => 'Poptun',            'slug' => 'poptun',  'url' => 'https://poptun.armeriabalam.com'],
            ['nombre' => 'San Luis',          'slug' => 'sanluis', 'url' => 'https://sanluis.armeriabalam.com'],
        ];

        $productosDemo = [
            ['nombre' => 'Glock 19 Gen 5',    'descripcion' => 'Pistola táctica calibre 9mm.', 'categoria' => 'Armas Cortas', 'marca' => 'Glock', 'calibre' => '9mm'],
            ['nombre' => 'Fusil Táctico M4A1','descripcion' => 'Rifle de asalto.',             'categoria' => 'Fusiles',      'marca' => 'Colt',  'calibre' => '5.56mm'],
        ];

        $res = [];
        foreach ($productosDemo as $i => $p) {
            $sucursal = $sucursalesDemo[$i % count($sucursalesDemo)];
            $res[] = $this->normalizarProducto($p, $sucursal);
        }
        return $res;
    }
}
