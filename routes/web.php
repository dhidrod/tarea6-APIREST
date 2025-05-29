<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProductoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoT\CharacterController;
use App\Http\Controllers\GoT\HouseController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/got/characters', [CharacterController::class, 'index'])->name('got.characters.index');
Route::get('/got/characters/{slug}', [CharacterController::class, 'show'])->name('got.characters.show');

Route::get('/got/houses', [HouseController::class, 'index'])->name('got.houses.index');
Route::get('/got/houses/{slug}', [HouseController::class, 'show'])->name('got.houses.show');

// Rutas API con prefijo
Route::prefix('api')->group(function () {
    // Rutas públicas de autenticación
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);

    // Ruta de prueba
    Route::get('/test', function () {
        return response()->json(['message' => 'API funcionando correctamente', 'timestamp' => now()]);
    });

    // Rutas protegidas con Sanctum
    Route::middleware('auth:sanctum')->group(function () {
        // Autenticación
        Route::post('/logout', [AuthController::class, 'logout']);

        // Verificar usuario autenticado
        Route::get('/user', function (Request $request) {
            return $request->user();
        });

        // CRUD de productos de limpieza
        Route::apiResource('productos-limpieza', ProductoController::class);
    });
});
