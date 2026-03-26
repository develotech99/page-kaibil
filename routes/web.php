<?php

use App\Http\Controllers\CatalogoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatalogoController;

<<<<<<< HEAD
Route::get('/', function () {
    return view('welcome');
});

Route::get('/catalogo', [CatalogoController::class, 'index'])->name('catalogo.index');
=======
Route::get('/', [CatalogoController::class, 'index']);
>>>>>>> 90cd85b2ed5c307254edf69931f1cf84e6b42b8f
