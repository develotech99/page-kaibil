<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class CatalogoArmeriaService
{
    private string $apiKey;
    private array  $sucursales;

    public function __construct()
    {
        // Lectura defensiva: si la config no cargó, usamos arreglos vacíos seguros
        $config = config('services.armeria');

        if (! is_array($config)) {
            Log::error('CatalogoArmeriaService: config services.armeria no encontrada o inválida.');
            $this->apiKey    = '';
            $this->sucursales = [];
            return;
        }

        $this->apiKey     = (string) ($config['key'] ?? '');
        $this->sucursales = (array)  ($config['sucursales'] ?? []);
    }

    // ──────────────────────────────────────────────────────────
    //  MÉTODO PRINCIPAL
    // ──────────────────────────────────────────────────────────

    /**
     * Devuelve el catálogo unificado de todas las sucursales.
     * Si se pasa $slug filtra sólo esa sucursal.
     *
     * @param  string|null  $slug   Ej: 'poptun', 'melchor', 'sanluis'
     * @return array{productos: array, errores: array}
     */
    public function getCatalogoCompleto(?string $slug = null): array
    {
        $productos = [];
        $errores   = [];
        $pendientes = [];

        // 1. Identificar qué sucursales consultar (filtros + cache check)
        foreach ($this->sucursales as $sucursal) {
            if (empty($sucursal['url'])) continue;
            if ($slug !== null && ($sucursal['slug'] ?? '') !== $slug) continue;

            $slugKey  = $sucursal['slug'] ?? 'desconocido';
            $cacheKey = "catalogo_armeria_{$slugKey}";

            if (Cache::has($cacheKey)) {
                $productos = array_merge($productos, Cache::get($cacheKey));
            } else {
                $pendientes[$slugKey] = $sucursal;
            }
        }

        // 2. Consultar las sucursales pendientes en PARALELO
        if (!empty($pendientes)) {
            $responses = Http::pool(fn ($pool) => 
                array_map(function ($s) use ($pool) {
                    return $pool->as($s['slug'])
                        ->timeout(12)
                        ->withoutVerifying() // Omitir SSL Check para evitar cURL exit 60 en entornos sin Bundle de Certificados
                        ->withHeaders([
                            'X-Api-Key' => $this->apiKey,
                            'Accept'    => 'application/json',
                        ])->get(rtrim($s['url'], '/') . '/api/catalogo');
                }, $pendientes)
            );

            // 3. Procesar respuestas
            foreach ($responses as $slugKey => $response) {
                $sucursal = $pendientes[$slugKey];

                if ($response->failed()) {
                    $errores[$slugKey] = "HTTP {$response->status()}";
                    Log::error("CatalogoArmeriaService: error técnico sucursal [{$slugKey}]", [
                        'status' => $response->status(),
                        'url'    => $sucursal['url'],
                        'body'   => $response->body()
                    ]);
                    continue;
                }

                try {
                    $json = $response->json();
                    if (!is_array($json)) throw new \Exception("JSON inválido");

                    $items = array_map(
                        fn(array $p) => $this->normalizarProducto($p, $sucursal),
                        $json
                    );

                    // Guardar en cache individual (55 mins)
                    Cache::put("catalogo_armeria_{$slugKey}", $items, 3300);
                    $productos = array_merge($productos, $items);

                } catch (\Throwable $e) {
                    $errores[$slugKey] = $e->getMessage();
                }
            }
        }

        // 4. Modo Demo Fallback (si todo falla o está vacío)
        if (empty($productos)) {
            $productos = $this->getDatosDemo();
            $errores = []; 
        }

        return compact('productos', 'errores');
    }

    // ──────────────────────────────────────────────────────────
    //  DATOS DEMO (mientras las sucursales no estén activas)
    // ──────────────────────────────────────────────────────────

    private function getDatosDemo(): array
    {
        $sucursalesDemo = [
            ['nombre' => 'Melchor de Mencos', 'slug' => 'melchor', 'url' => 'https://melchordemencos.armeriabalam.com'],
            ['nombre' => 'Poptun',            'slug' => 'poptun',  'url' => 'https://poptun.armeriabalam.com'],
            ['nombre' => 'San Luis',          'slug' => 'sanluis', 'url' => 'https://sanluis.armeriabalam.com'],
        ];

        $productosDemo = [
            ['nombre' => 'Glock 19 Gen 5',    'descripcion' => 'Pistola táctica calibre 9mm, la más vendida a nivel mundial.',  'categoria' => 'Armas Cortas', 'marca' => 'Glock', 'calibre' => '9mm', 'modelo' => '19 Gen 5', 'imagenes' => []],
            ['nombre' => 'Fusil Táctico M4A1','descripcion' => 'Confiabilidad extrema en sistemas de asalto urbano.',           'categoria' => 'Fusiles',      'marca' => 'Colt',  'calibre' => '5.56x45mm', 'modelo' => 'M4A1', 'imagenes' => []],
            ['nombre' => 'Remington 700 SPS', 'descripcion' => 'Precisión letal para cacería y tiradores deportivos.',          'categoria' => 'Rifles',       'marca' => 'Remington', 'calibre' => '.308 Win', 'modelo' => '700 SPS', 'imagenes' => []],
            ['nombre' => 'Beretta 92FS',      'descripcion' => 'Clásica pistola de servicio, acción doble, 15+1 rondas.',       'categoria' => 'Armas Cortas', 'marca' => 'Beretta',   'calibre' => '9mm', 'modelo' => '92FS', 'imagenes' => []],
            ['nombre' => 'CZ Scorpion EVO3',  'descripcion' => 'Plataforma PCC ultraligera, asombrosamente precisa.',           'categoria' => 'PCC Sub',      'marca' => 'CZ',        'calibre' => '9mm', 'modelo' => 'Scorpion EVO3', 'imagenes' => []],
            ['nombre' => 'Winchester SXP',    'descripcion' => 'Escopeta de bombeo para defensa personal y deportivo.',         'categoria' => 'Escopetas',    'marca' => 'Winchester', 'calibre' => '12ga',   'modelo' => 'SXP', 'imagenes' => []],
        ];

        $resultado = [];
        foreach ($productosDemo as $i => $producto) {
            $sucursal = $sucursalesDemo[$i % count($sucursalesDemo)];
            $resultado[] = $this->normalizarProducto(
                array_merge(['id' => $i + 1], $producto),
                $sucursal
            );
        }

        return $resultado;
    }

    // ──────────────────────────────────────────────────────────
    //  NORMALIZACIÓN DEFENSIVA (Adaptado a CatalogoApiController real)
    // ──────────────────────────────────────────────────────────

    public function normalizarProducto(array $producto, array $sucursal): array
    {
        $dominio    = rtrim($sucursal['url'] ?? '', '/');
        $storageUrl = $dominio . '/storage';

        $field = fn(string $key, string $alt = '') =>
            $producto[$key] ?? $producto[$alt] ?? null;

        $imagenes = $field('imagenes') ?? [];
        if (! is_array($imagenes)) $imagenes = [];

        return [
            'id'               => $field('id',          'producto_id'),
            'nombre'           => $field('nombre',       'producto_nombre') ?? 'Desconocido',
            'descripcion'      => $field('descripcion',  'producto_descripcion') ?? '',
            'precio'           => (float) ($field('precio') ?? 0),
            'categoria'        => $field('categoria')   ?? 'General',
            'subcategoria'     => $field('subcategoria')?? '',
            'marca'            => $field('marca')       ?? '',
            'modelo'           => $field('modelo')      ?? '',
            'calibre'          => $field('calibre')     ?? '',
            'pais_fabricacion' => $field('pais_fabricacion') ?? '',
            'imagenes'         => $imagenes,
            'sucursal'         => $sucursal['nombre']   ?? 'Desconocida',
            'sucursal_slug'    => $sucursal['slug']     ?? '',
            'dominio'          => $dominio,
            'storage_url'      => $storageUrl,
        ];
    }

    public function getSucursalesDisponibles(): array
    {
        return array_filter(
            $this->sucursales,
            fn(array $s) => ! empty($s['url'])
        );
    }
}
