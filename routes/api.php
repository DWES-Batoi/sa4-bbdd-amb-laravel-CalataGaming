<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\JugadoraController;
use App\Http\Controllers\Api\EquipController;
use App\Http\Controllers\Api\EstadiController;
use App\Http\Controllers\Api\PartitController;

// Auth
Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

// Protegides (escriptura)
// Protegides (escriptura)
Route::middleware('auth:sanctum')->name('api.')->group(function () {
    Route::post('logout', [AuthController::class, 'logout'])->withoutMiddleware('name'); // Logout no suele chocar si se llama 'api.logout' pero bueno

    Route::apiResource('jugadores', JugadoraController::class)
        ->parameters(['jugadores' => 'jugadora'])
        ->except(['index', 'show']);

    Route::apiResource('equips', EquipController::class)
        ->parameters(['equips' => 'equip'])
        ->except(['index', 'show']);

    Route::apiResource('estadis', EstadiController::class)
        ->parameters(['estadis' => 'estadi'])
        ->except(['index', 'show']);

    Route::apiResource('partits', PartitController::class)
        ->parameters(['partits' => 'partit'])
        ->except(['index', 'show']);

    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});

// Públiques (lectura)
Route::name('api.')->group(function () {
    Route::apiResource('jugadores', JugadoraController::class)
        ->parameters(['jugadores' => 'jugadora'])
        ->only(['index', 'show']);

    Route::apiResource('equips', EquipController::class)
        ->parameters(['equips' => 'equip'])
        ->only(['index', 'show']);

    Route::apiResource('estadis', EstadiController::class)
        ->parameters(['estadis' => 'estadi'])
        ->only(['index', 'show']);

    Route::apiResource('partits', PartitController::class)
        ->parameters(['partits' => 'partit'])
        ->only(['index', 'show']);
});
