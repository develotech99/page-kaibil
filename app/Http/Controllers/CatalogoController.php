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

        // Extraer categorías dinámicas de los productos obtenidos
        $categorias = collect($productos)
            ->pluck('categoria')
            ->unique()
            ->values()
            ->map(fn($cat) => [
                'nombre' => $cat,
                'slug'   => strtolower(trim($cat))
            ]);

        // Retornar a la vista welcome (nuestra interfaz principal)
        return view('welcome', compact(
            'productos',
            'sucursales',
            'categorias',
            'sucursalSeleccionada',
            'erroresSucursales'
        ));
    }
}
