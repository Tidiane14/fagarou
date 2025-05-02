<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\medicament\MedicamentController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/medicaments', [MedicamentController::class, 'index'])->name('medicaments.index');
Route::get('/medicaments/{id}', [MedicamentController::class, 'show'])->name('medicaments.show');
Route::post('/panier/ajouter', [MedicamentController::class, 'addToCart'])->name('panier.ajouter');
