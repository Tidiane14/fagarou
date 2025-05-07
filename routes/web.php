<?php

use App\Http\Controllers\user\userController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\livraisonController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/login', function () {
//     return view('auth.login');
// })->name('login');

// Route::get('/register', function () {
//     return view('auth.register');
// })->name('register');

// Routes d'authentification
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Routes d'inscription
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Route d'accueil après connexion
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');

// Route page livraison
Route::get('/livraison', [livraisonController::class, 'showLivraison'])->name('livraison');