<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoT\CharacterController;
use App\Http\Controllers\GoT\HouseController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/got/characters', [CharacterController::class, 'index'])->name('got.characters.index');
Route::get('/got/characters/{slug}', [CharacterController::class, 'show'])->name('got.characters.show');

Route::get('/got/houses', [HouseController::class, 'index'])->name('got.houses.index');
Route::get('/got/houses/{slug}', [HouseController::class, 'show'])->name('got.houses.show');

// Las rutas API ahora están en routes/api.php
