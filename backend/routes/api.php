<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;

Route::apiResource('categorias', CategoriaController::class);
Route::apiResource('clientes', ClienteController::class);