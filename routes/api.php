<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProductoLimpiezaController;
use Illuminate\Support\Facades\Route;

// Rutas públicas de autenticación
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Rutas protegidas con Sanctum
Route::middleware('auth:sanctum')->group(function () {
    // Autenticación
    Route::post('/logout', [AuthController::class, 'logout']);

    // CRUD de productos de limpieza
    Route::apiResource('productos-limpieza', ProductoLimpiezaController::class);
});
