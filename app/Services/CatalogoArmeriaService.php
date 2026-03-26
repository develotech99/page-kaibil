<?php

namespace App\Services;

<<<<<<< HEAD
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

    /**
     * @var array<string, string>
     */
    private array $erroresSucursales = [];

    /**
     * @return array<int, array<string, mixed>>
     */
    public function getCatalogoCompleto(?string $slug = null): array
    {
        $this->erroresSucursales = [];

        $sucursales = $this->getSucursalesDisponibles();
        $slug = $slug !== null ? Str::slug($slug) : null;

        if ($slug !== null && $slug !== '') {
            $sucursales = array_values(array_filter(
                $sucursales,
                static fn (array $sucursal): bool => $sucursal['slug'] === $slug,
            ));
        }

        $productos = [];

        foreach ($sucursales as $sucursal) {
            $productos = array_merge($productos, $this->getCatalogoSucursal($sucursal));
        }

        usort(
            $productos,
            static fn (array $a, array $b): int => [$a['sucursal'], $a['nombre'], (string) $a['id']]
                <=> [$b['sucursal'], $b['nombre'], (string) $b['id']],
        );

        return $productos;
    }

    /**
     * @param array<string, mixed> $sucursal
     * @return array<int, array<string, mixed>>
     */
    public function getCatalogoSucursal(array $sucursal): array
    {
        $slug = (string) ($sucursal['slug'] ?? 'desconocida');
        $apiKey = $this->getApiKey();

        if ($apiKey === '') {
            $this->registrarError($slug, 'API key no configurada en services.armeria.key.');

            return [];
        }

        try {
            $productos = $this->rememberSucursal(
                $this->getCacheKey($slug),
                fn (): array => $this->consultarApiSucursal($sucursal, $apiKey),
            );
        } catch (Throwable $exception) {
            $this->registrarError(
                $slug,
                $this->normalizarMensajeError($exception),
                [
                    'sucursal' => $sucursal,
                    'exception' => $exception::class,
                ],
            );

            return [];
        }

        $normalizados = [];

        foreach ($productos as $producto) {
            if (! is_array($producto)) {
                continue;
            }

            $normalizado = $this->normalizarProducto($producto, $sucursal);

            if ($normalizado['nombre'] === '' && $normalizado['id'] === '') {
                continue;
            }

            $normalizados[] = $normalizado;
        }

        return $normalizados;
    }

    /**
     * @param array<string, mixed> $producto
     * @param array<string, mixed> $sucursal
     * @return array<string, mixed>
     */
    public function normalizarProducto(array $producto, array $sucursal): array
    {
        $dominio = rtrim((string) ($sucursal['url'] ?? ''), '/');

        return [
            'id' => $this->normalizarTexto($this->pickValue($producto, ['id', 'pro_id'])),
            'nombre' => $this->normalizarTexto($this->pickValue($producto, ['nombre', 'pro_nombre'])),
            'descripcion' => $this->normalizarTexto($this->pickValue($producto, ['descripcion', 'pro_descripcion'])),
            'precio' => $this->normalizarPrecio($this->pickValue($producto, ['precio', 'pro_precio'])),
            'imagenes' => $this->normalizarImagenes(
                $this->pickValue(
                    $producto,
                    ['imagenes', 'imagenes_urls', 'imagenes_url', 'fotos', 'galeria', 'imagen', 'image'],
                    [],
                ),
            ),
            'sucursal' => $this->normalizarTexto($sucursal['nombre'] ?? ''),
            'sucursal_slug' => $this->normalizarTexto($sucursal['slug'] ?? ''),
            'dominio' => $dominio,
            'storage_url' => $dominio === '' ? '' : rtrim($dominio, '/') . '/storage',
        ];
    }

    /**
     * @return array<int, array{nombre: string, slug: string, url: string}>
     */
    public function getSucursalesDisponibles(): array
    {
        $config = $this->getArmeriaConfig();
        $sucursales = $config['sucursales'] ?? [];

        if (! is_array($sucursales)) {
            Log::error('La configuración services.armeria.sucursales es inválida.', [
                'config' => $config,
            ]);

            return [];
        }

        $resultado = [];
        $slugsRegistrados = [];

        foreach ($sucursales as $index => $sucursal) {
            if (! is_array($sucursal)) {
                Log::error('Se encontró una sucursal con configuración inválida.', [
                    'index' => $index,
                    'sucursal' => $sucursal,
                ]);

                continue;
            }

            $nombre = trim((string) ($sucursal['nombre'] ?? ''));
            $slug = Str::slug((string) ($sucursal['slug'] ?? $nombre));
            $url = trim((string) ($sucursal['url'] ?? ''));

            if ($nombre === '' || $slug === '' || $url === '' || ! filter_var($url, FILTER_VALIDATE_URL)) {
                Log::error('Sucursal omitida por configuración incompleta o URL inválida.', [
                    'index' => $index,
                    'sucursal' => $sucursal,
                ]);

                continue;
            }

            if (isset($slugsRegistrados[$slug])) {
                Log::error('Sucursal omitida por slug duplicado.', [
                    'slug' => $slug,
                    'sucursal' => $sucursal,
                ]);

                continue;
            }

            $resultado[] = [
                'nombre' => $nombre,
                'slug' => $slug,
                'url' => rtrim($url, '/'),
            ];

            $slugsRegistrados[$slug] = true;
        }

        return $resultado;
    }

    /**
     * @return array<string, string>
     */
    public function getErroresSucursales(): array
    {
        return $this->erroresSucursales;
    }

    /**
     * @return array<string, mixed>
     */
    private function getArmeriaConfig(): array
    {
        $config = config('services.armeria');

        if (! is_array($config)) {
            Log::error('config("services.armeria") devolvió un valor nulo o inválido.', [
                'config' => $config,
            ]);

            return [
                'key' => null,
                'sucursales' => [],
            ];
        }

        return $config;
    }

    private function getApiKey(): string
    {
        return trim((string) ($this->getArmeriaConfig()['key'] ?? ''));
    }

    private function getCacheKey(string $slug): string
    {
        return 'catalogo_armeria_' . Str::slug($slug);
    }

    /**
     * @param array<string, mixed> $sucursal
     * @return array<int, mixed>
     */
    private function consultarApiSucursal(array $sucursal, string $apiKey): array
    {
        $url = trim((string) ($sucursal['url'] ?? ''));

        if ($url === '') {
            throw new RuntimeException('Sucursal sin URL configurada.');
        }

        $endpoint = rtrim($url, '/') . self::ENDPOINT_CATALOGO;

        $response = Http::timeout(15)
            ->withHeaders([
                'X-Api-Key' => $apiKey,
                'Accept' => 'application/json',
            ])
            ->get($endpoint);

        if (! $response->successful()) {
            throw new RuntimeException('Respuesta HTTP ' . $response->status());
        }

        try {
            $payload = json_decode($response->body(), true, 512, JSON_THROW_ON_ERROR);
        } catch (JsonException $exception) {
            throw new RuntimeException('Respuesta JSON inválida.', previous: $exception);
        }

        return $this->extraerProductos($payload);
    }

    /**
     * @return array<int, mixed>
     */
    private function rememberSucursal(string $cacheKey, callable $resolver): array
    {
        try {
            $cached = Cache::get($cacheKey);

            if (is_array($cached)) {
                return $cached;
            }
        } catch (Throwable $exception) {
            Log::warning('No se pudo leer el cache local del catálogo. Se usará consulta directa.', [
                'cache_key' => $cacheKey,
                'exception' => $exception::class,
                'message' => $exception->getMessage(),
            ]);
        }

        $fresh = $resolver();

        try {
            Cache::put($cacheKey, $fresh, self::CACHE_TTL_SECONDS);
        } catch (Throwable $exception) {
            Log::warning('No se pudo guardar el cache local del catálogo.', [
                'cache_key' => $cacheKey,
                'exception' => $exception::class,
                'message' => $exception->getMessage(),
            ]);
        }

        return $fresh;
    }

    /**
     * @return array<int, mixed>
     */
    private function extraerProductos(mixed $payload): array
    {
        if (! is_array($payload)) {
            throw new RuntimeException('La API no devolvió un arreglo JSON válido.');
        }

        if (array_is_list($payload)) {
            return $payload;
        }

        foreach (['data', 'productos', 'catalogo', 'items', 'results'] as $clave) {
            if (isset($payload[$clave]) && is_array($payload[$clave])) {
                return array_is_list($payload[$clave]) ? $payload[$clave] : [$payload[$clave]];
            }
        }

        if ($this->pareceProducto($payload)) {
            return [$payload];
        }

        throw new RuntimeException('La API no devolvió una estructura de catálogo reconocible.');
    }

    /**
     * @param array<string, mixed> $payload
     */
    private function pareceProducto(array $payload): bool
    {
        foreach (['id', 'pro_id', 'nombre', 'pro_nombre', 'descripcion', 'pro_descripcion'] as $clave) {
            if (array_key_exists($clave, $payload)) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param array<string, mixed> $data
     */
    private function pickValue(array $data, array $keys, mixed $default = null): mixed
    {
        foreach ($keys as $key) {
            if (! array_key_exists($key, $data)) {
                continue;
            }

            $value = $data[$key];

            if ($value === null) {
                continue;
            }

            if (is_string($value) && trim($value) === '') {
                continue;
            }

            return $value;
        }

        return $default;
    }

    private function normalizarTexto(mixed $value): string
    {
        if ($value === null) {
            return '';
        }

        if (is_scalar($value)) {
            return trim((string) $value);
        }

        return '';
    }

    private function normalizarPrecio(mixed $value): ?float
    {
        if ($value === null || $value === '') {
            return null;
        }

        if (is_int($value) || is_float($value)) {
            return round((float) $value, 2);
        }

        if (! is_string($value)) {
            return null;
        }

        $normalizado = preg_replace('/[^\d,.\-]/', '', $value);

        if ($normalizado === null || $normalizado === '') {
            return null;
        }

        if (str_contains($normalizado, ',') && ! str_contains($normalizado, '.')) {
            $normalizado = str_replace(',', '.', $normalizado);
        } else {
            $normalizado = str_replace(',', '', $normalizado);
        }

        return is_numeric($normalizado) ? round((float) $normalizado, 2) : null;
    }

    /**
     * @return array<int, string>
     */
    private function normalizarImagenes(mixed $imagenes): array
    {
        if ($imagenes === null || $imagenes === '') {
            return [];
        }

        $items = [];

        if (is_array($imagenes)) {
            $items = $imagenes;
        } elseif (is_string($imagenes)) {
            $imagenes = trim($imagenes);

            if ($imagenes === '') {
                return [];
            }

            if ($imagenes[0] === '[') {
                try {
                    $decodificado = json_decode($imagenes, true, 512, JSON_THROW_ON_ERROR);

                    if (is_array($decodificado)) {
                        $items = $decodificado;
                    }
                } catch (JsonException) {
                    $items = [];
                }
            }

            if ($items === []) {
                $items = str_contains($imagenes, ',')
                    ? preg_split('/\s*,\s*/', $imagenes, -1, PREG_SPLIT_NO_EMPTY) ?: []
                    : [$imagenes];
            }
        } else {
            return [];
        }

        $resultado = [];

        foreach ($items as $item) {
            if (is_array($item)) {
                $item = $this->pickValue($item, ['path', 'url', 'src', 'imagen', 'image'], '');
            }

            if (! is_scalar($item)) {
                continue;
            }

            $ruta = $this->normalizarRutaImagen((string) $item);

            if ($ruta === '' || in_array($ruta, $resultado, true)) {
                continue;
            }

            $resultado[] = $ruta;
        }

        return $resultado;
    }

    private function normalizarRutaImagen(string $ruta): string
    {
        $ruta = trim($ruta);

        if ($ruta === '') {
            return '';
        }

        if (filter_var($ruta, FILTER_VALIDATE_URL)) {
            $ruta = (string) (parse_url($ruta, PHP_URL_PATH) ?? '');
        }

        $ruta = str_replace('\\', '/', $ruta);
        $ruta = preg_replace('#^/?public/#', '', $ruta) ?? $ruta;
        $ruta = preg_replace('#^/?storage/#', '', $ruta) ?? $ruta;

        return ltrim($ruta, '/');
    }

    private function registrarError(string $slug, string $mensaje, array $contexto = []): void
    {
        $this->erroresSucursales[$slug] = $mensaje;

        Log::error('Error al consultar catálogo de armería.', array_merge($contexto, [
            'slug' => $slug,
            'mensaje' => $mensaje,
        ]));
    }

    private function normalizarMensajeError(Throwable $exception): string
    {
        if ($exception instanceof ConnectionException) {
            $mensaje = Str::lower($exception->getMessage());

            return str_contains($mensaje, 'timed out')
                ? 'Timeout al consultar la API.'
                : 'Error de conexión al consultar la API.';
        }

        $mensaje = trim($exception->getMessage());

        return $mensaje !== '' ? $mensaje : 'Error desconocido al consultar la API.';
=======
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class CatalogoArmeriaService
{
    private string $baseUrl;
    private string $apiKey;

    public function __construct()
    {
        $this->baseUrl = rtrim(config('services.armeria.url', ''), '/');
        $this->apiKey  = config('services.armeria.key', '');
    }

    /**
     * Obtiene el catálogo de productos desde controldearmas.
     * Cachea localmente 55 minutos (5 min menos que el servidor).
     */
    public function getCatalogo(): array
    {
        return Cache::remember('catalogo_armeria_local', 3300, function () {
            try {
                $response = Http::timeout(15)
                    ->withHeaders([
                        'X-Api-Key' => $this->apiKey,
                        'Accept'    => 'application/json',
                    ])
                    ->get("{$this->baseUrl}/api/catalogo");

                if ($response->failed()) {
                    Log::error('CatalogoArmeriaService: fallo al obtener catálogo', [
                        'status' => $response->status(),
                    ]);
                    return [];
                }

                return $response->json() ?? [];
            } catch (\Exception $e) {
                Log::error('CatalogoArmeriaService: Excepción de conexión', [
                    'message' => $e->getMessage()
                ]);
                
                // MODO DEBUG TEMPORAL PARA QUE VEAS EL ERROR REAL EN PANTALLA
                dd([
                    'ESTADO' => 'ERROR DE CONEXIÓN',
                    'RAZON' => $e->getMessage(),
                    'URL_INTENTADA' => $this->baseUrl . '/api/catalogo'
                ]);
                
                return [];
            }
        });
>>>>>>> 90cd85b2ed5c307254edf69931f1cf84e6b42b8f
    }
}
