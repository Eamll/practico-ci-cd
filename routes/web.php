<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EmpleadoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('empleados', EmpleadoController::class);
Route::resource('productos', ProductoController::class);
Route::resource('clientes', ClienteController::class);