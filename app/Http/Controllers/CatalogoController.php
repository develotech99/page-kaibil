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

        // Obtener catálogo unificado + errores por sucursal
        $resultado = $this->catalogo->getCatalogoCompleto(
            $sucursalSeleccionada ?: null
        );

        $productos            = $resultado['productos'];
        $erroresSucursales    = $resultado['errores'];
        $sucursales           = $this->catalogo->getSucursalesDisponibles();

        // Crear estructura jerárquica: Categoría -> [Subcategorías]
        $menuCategorias = collect($productos)
            ->groupBy('categoria')
            ->map(function ($items, $catName) {
                return [
                    'nombre' => $catName,
                    'slug'   => strtolower(trim($catName)),
                    'subcategorias' => $items->pluck('subcategoria')
                        ->filter()
                        ->unique()
                        ->values()
                        ->map(fn($sub) => ['nombre' => $sub, 'slug' => strtolower(trim($sub))])
                        ->all()
                ];
            })->values();

        // Extraer marcas únicas
        $marcas = collect($productos)
            ->pluck('marca')
            ->filter()
            ->unique()
            ->sort()
            ->values()
            ->map(fn($m) => ['nombre' => $m, 'slug' => strtolower(trim($m))]);

        // Retornar a la vista welcome
        return view('welcome', compact(
            'productos',
            'sucursales',
            'menuCategorias',
            'marcas',
            'sucursalSeleccionada',
            'erroresSucursales'
        ));
    }
}
