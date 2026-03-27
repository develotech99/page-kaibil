<?php

use App\Http\Controllers\CatalogoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CatalogoController::class, 'index'])->name('welcome');
Route::get('/catalogo', [CatalogoController::class, 'index'])->name('catalogo.index');
