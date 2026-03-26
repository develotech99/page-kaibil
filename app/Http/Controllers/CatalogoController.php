<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
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
=======
use Illuminate\Http\Request;
use App\Services\CatalogoArmeriaService;

class CatalogoController extends Controller
{
    public function index(CatalogoArmeriaService $catalogo)
    {
        $productos = $catalogo->getCatalogo();
        
        // Descomenta esta linea para ver todo el JSON crudo en pantalla:
        dd($productos);
        
        // Pass the products to the existing welcome blade view instead of catalogo.index
        return view('welcome', compact('productos'));
>>>>>>> 90cd85b2ed5c307254edf69931f1cf84e6b42b8f
    }
}
