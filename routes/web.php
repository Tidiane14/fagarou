<?php

use App\Http\Controllers\user\userController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');
Route::get('/login', [userController::class, 'showLoginForm'])->name('login');
Route::post('/login', [userController::class, 'login']);
Route::post('/logout', [userController::class, 'logout'])->name('logout');

// Routes d'inscription avec UserController existant
Route::get('/register', [userController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [UserController::class, 'register'])->name('register');
