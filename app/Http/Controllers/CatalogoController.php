<?php

namespace App\Http\Controllers;

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
    }
}
