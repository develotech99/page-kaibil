<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CatalogoArmeriaService;

class CatalogoController extends Controller
{
    public function __construct(
        private readonly CatalogoArmeriaService $catalogo
    ) {}

    public function index(Request $request)
    {
        // Filtro opcional: ?sucursal=poptun (filtro de servidor)
        $sucursalSeleccionada = $request->query('sucursal');

        // Obtener catálogo unificado (o filtrado) + errores por sucursal
        $resultado = $this->catalogo->getCatalogoCompleto(
            $sucursalSeleccionada ?: null
        );

        $productos            = $resultado['productos'];
        $erroresSucursales    = $resultado['errores'];
        $sucursales           = $this->catalogo->getSucursalesDisponibles();

        // Extraer categorías dinámicas de los productos obtenidos
        $categorias = collect($productos)
            ->pluck('categoria')
            ->unique()
            ->values()
            ->map(fn($cat) => [
                'nombre' => $cat,
                'slug'   => strtolower(trim($cat))
            ]);

        return view('welcome', compact(
            'productos',
            'sucursales',
            'categorias',
            'sucursalSeleccionada',
            'erroresSucursales'
        ));
    }
}
