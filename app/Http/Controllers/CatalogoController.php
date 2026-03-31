<?php

namespace App\Http\Controllers;

use App\Services\CatalogoArmeriaService;
use Illuminate\Http\Request;

class CatalogoController extends Controller
{
    public function __construct(
        private readonly CatalogoArmeriaService $catalogo
    ) {}

    public function index(Request $request)
    {
        // Filtro opcional: ?sucursal=poptun
        $sucursalSeleccionada = $request->query('sucursal');

        // 1. Obtener catálogo TOTAL (para destacados globales)
        $resultadoGlobal = $this->catalogo->getCatalogoCompleto(null);
        $todosLosProductos = $resultadoGlobal['productos'];

        // 2. Si hay sucursal seleccionada, filtramos para el catálogo principal
        if ($sucursalSeleccionada) {
            $productos = collect($todosLosProductos)
                ->filter(fn($p) => ($p['sucursal_slug'] ?? '') === $sucursalSeleccionada)
                ->values()
                ->all();
        } else {
            $productos = $todosLosProductos;
        }

        $erroresSucursales    = $resultadoGlobal['errores'];
        $sucursales           = $this->catalogo->getSucursalesDisponibles();
        // Eliminar las líneas duplicadas y el error del $resultado anterior


        // Crear estructura jerárquica: Categoría -> [Subcategorías]
        $menuCategorias = collect($productos)
            ->groupBy('categoria')
            ->map(function ($items, $catName) {
                // Agrupamos por subcategoría
                $subGroups = $items->groupBy('subcategoria');
                
                // Si solo hay una subcategoría y es vacía, no tiene sentido mostrar grid de subcategorías
                if ($subGroups->count() === 1 && empty($subGroups->keys()->first())) {
                    return [
                        'nombre' => $catName,
                        'slug'   => strtolower(trim($catName)),
                        'subcategorias' => []
                    ];
                }

                $subcats = $subGroups->map(function($subItems, $subName) {
                        $isGeneral = empty($subName);
                        $finalName = $isGeneral ? 'GENERAL / OTROS' : $subName;
                        
                        $firstWithImg = $subItems->first(fn($p) => !empty($p['imagenes']));
                        $img = null;
                        if ($firstWithImg) {
                            $storageUrl = rtrim($firstWithImg['storage_url'] ?? '', '/');
                            $img = $storageUrl . '/' . ltrim($firstWithImg['imagenes'][0], '/');
                        }
                        return [
                            'nombre' => $finalName,
                            'slug'   => strtolower(trim($isGeneral ? 'all' : $subName)),
                            'is_fallback' => $isGeneral,
                            'imagen' => $img
                        ];
                    })->values()->all();

                return [
                    'nombre' => $catName,
                    'slug'   => strtolower(trim($catName)),
                    'subcategorias' => $subcats
                ];
            })->values();

        // 3. Lógica de "Productos Iniciales" (Máximo 25 aleatorios, PRIORIZANDO los que tienen imagen)
        $productosColeccion = collect($productos);
        
        // Separar productos con imagen y sin imagen
        $conImagen = $productosColeccion->filter(fn($p) => !empty($p['imagenes']))->shuffle();
        $sinImagen = $productosColeccion->filter(fn($p) => empty($p['imagenes']))->shuffle();

        // Tomar 25 priorizando los que tienen imagen
        $seleccionados = $conImagen->take(25);
        if ($seleccionados->count() < 25) {
            $restantes = 25 - $seleccionados->count();
            $seleccionados = $seleccionados->concat($sinImagen->take($restantes));
        }
        
        // Identificar los seleccionados para marcarlos
        $inicialesKeys = $seleccionados->map(function($p) {
            return ($p['id_unico'] ?? '') . ($p['nombre'] ?? '') . ($p['sucursal'] ?? '');
        })->all();
        
        $productosFinales = $productosColeccion->map(function($p) use ($inicialesKeys) {
            $key = ($p['id_unico'] ?? '') . ($p['nombre'] ?? '') . ($p['sucursal'] ?? '');
            $p['is_initial'] = in_array($key, $inicialesKeys);
            return $p;
        })->all();

        // Extraer marcas únicas totales (para filtros)
        $marcas = collect($productos)
            ->pluck('marca')
            ->filter()
            ->unique()
            ->sort()
            ->values()
            ->map(fn($m) => ['nombre' => $m, 'slug' => strtolower(trim($m))]);

        // Extraer marcas SOLAMENTE de la categoría ARMAS (para sección Quiénes Somos)
        $marcasArmas = collect($productos)
            ->filter(fn($p) => stripos($p['categoria'] ?? '', 'ARMA') !== false)
            ->pluck('marca')
            ->filter()
            ->unique()
            ->sort()
            ->values()
            ->map(fn($m) => ['nombre' => $m, 'slug' => strtolower(trim($m))]);

        // Retornar a la vista welcome
        return view('welcome', [
            'productos' => $productosFinales,
            'todosLosProductos' => $todosLosProductos,
            'sucursales' => $sucursales,
            'menuCategorias' => $menuCategorias,
            'marcas' => $marcas,
            'marcasArmas' => $marcasArmas,
            'sucursalSeleccionada' => $sucursalSeleccionada,
            'erroresSucursales' => $erroresSucursales
        ]);
    }
}
