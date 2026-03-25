<?php

namespace App\Services;

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
    }
}
