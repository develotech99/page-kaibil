<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class CatalogoControllerTest extends TestCase
{
    public function test_catalogo_unifica_productos_de_multiples_sucursales(): void
    {
        config([
            'cache.default' => 'array',
            'services.armeria' => [
                'key' => 'test-key',
                'sucursales' => [
                    [
                        'nombre' => 'Melchor de Mencos',
                        'slug' => 'melchor',
                        'url' => 'https://melchordemencos.armeriabalam.com',
                    ],
                    [
                        'nombre' => 'Poptun',
                        'slug' => 'poptun',
                        'url' => 'https://poptun.armeriabalam.com',
                    ],
                ],
            ],
        ]);

        Cache::flush();

        Http::fake([
            'https://melchordemencos.armeriabalam.com/api/catalogo' => Http::response([
                [
                    'id' => 1,
                    'nombre' => 'Pistola Glock 19',
                    'descripcion' => 'Calibre 9mm',
                    'precio' => 4500,
                    'imagenes' => ['productos/glock19-1.jpg'],
                ],
            ]),
            'https://poptun.armeriabalam.com/api/catalogo' => Http::response([
                [
                    'pro_id' => 2,
                    'pro_nombre' => 'Escopeta Maverick 88',
                    'pro_descripcion' => 'Defensa y deporte',
                    'pro_precio' => '5200.50',
                    'imagenes_urls' => ['productos/maverick88.jpg'],
                ],
            ]),
        ]);

        $response = $this->get('/catalogo');

        $response->assertOk();
        $response->assertSee('Pistola Glock 19');
        $response->assertSee('Escopeta Maverick 88');
        $response->assertSee('Melchor de Mencos');
        $response->assertSee('Poptun');
        $response->assertSee('https://poptun.armeriabalam.com/storage/productos/maverick88.jpg');
    }

    public function test_catalogo_muestra_error_por_sucursal_sin_romper_la_vista(): void
    {
        config([
            'cache.default' => 'array',
            'services.armeria' => [
                'key' => 'test-key',
                'sucursales' => [
                    [
                        'nombre' => 'Melchor de Mencos',
                        'slug' => 'melchor',
                        'url' => 'https://melchordemencos.armeriabalam.com',
                    ],
                    [
                        'nombre' => 'San Luis',
                        'slug' => 'sanluis',
                        'url' => 'https://sanluis.armeriabalam.com',
                    ],
                ],
            ],
        ]);

        Cache::flush();

        Http::fake([
            'https://melchordemencos.armeriabalam.com/api/catalogo' => Http::response([
                [
                    'id' => 1,
                    'nombre' => 'CZ P-10',
                    'descripcion' => 'Compacta',
                    'precio' => 6000,
                    'imagenes' => [],
                ],
            ]),
            'https://sanluis.armeriabalam.com/api/catalogo' => Http::response([], 500),
        ]);

        $response = $this->get('/catalogo');

        $response->assertOk();
        $response->assertSee('CZ P-10');
        $response->assertSee('San Luis');
        $response->assertSee('Respuesta HTTP 500');
    }
}
