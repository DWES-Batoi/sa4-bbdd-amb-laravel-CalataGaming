<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EquipController;
use App\Http\Controllers\EstadiController;
use App\Http\Controllers\JugadoraController;
use App\Http\Controllers\PartitController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

// Redirecció inicial o Vista (Si quieres que el test pase con 200, usa view('welcome'))
Route::get('/', function () {
return view('welcome');});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// ✅ Ruta per canviar idioma (i18n)
Route::get('/locale/{locale}', function (string $locale) {
    $available = ['ca', 'es', 'en'];
    if (!in_array($locale, $available, true)) {
        $locale = config('app.fallback_locale', 'en');
    }
    Session::put('locale', $locale);
    return redirect()->back();
})->name('setLocale');

// ✅ Rutes Públiques: index (Llistats) i show (Detalls)
Route::resource('equips', EquipController::class)->only(['index', 'show']);
Route::resource('estadis', EstadiController::class)->only(['index', 'show']);
Route::resource('jugadoras', JugadoraController::class)->only(['index', 'show']);
Route::resource('partits', PartitController::class)->only(['index', 'show']);

// 🔒 Rutes Protegides: crear/editar/borrar
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Aquí ponemos lo que falta (create, store, edit, update, destroy)
    Route::resource('equips', EquipController::class)->except(['index', 'show']);
    Route::resource('estadis', EstadiController::class)->except(['index', 'show']);
    Route::resource('jugadoras', JugadoraController::class)->except(['index', 'show']);
    Route::resource('partits', PartitController::class)->except(['index', 'show']);
});

require __DIR__.'/auth.php';