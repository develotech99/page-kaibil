<?php

namespace App\Http\Controllers;

use App\Services\CatalogoArmeriaService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class CatalogoController extends Controller
{
    public function __construct(
        private readonly CatalogoArmeriaService $catalogoArmeriaService,
    ) {
    }

    public function index(Request $request): View
    {
        $sucursales = $this->catalogoArmeriaService->getSucursalesDisponibles();
        $sucursalSeleccionada = Str::slug((string) $request->query('sucursal', ''));

        if (! collect($sucursales)->contains(static fn (array $sucursal): bool => $sucursal['slug'] === $sucursalSeleccionada)) {
            $sucursalSeleccionada = null;
        }

        $productos = $this->catalogoArmeriaService->getCatalogoCompleto($sucursalSeleccionada);

        return view('catalogo.index', [
            'productos' => $productos,
            'sucursales' => $sucursales,
            'sucursalSeleccionada' => $sucursalSeleccionada,
            'erroresSucursales' => $this->catalogoArmeriaService->getErroresSucursales(),
        ]);
    }
}
