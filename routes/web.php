<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('login');
});


// En routes/web.php
Route::middleware('auth:usuarios')->group(function () {
    // Route of the HomeController
});

Route::get('/home', [HomeController::class, 'showHome'])->name('home');

// visualizar la vista de login
Route::get('/login', [LoginController::class, 'showLogin'])->name('login');

// validar las credenciales del formulario login
Route::post('/login', [LoginController::class, 'login']);

Route::get('/logout', [HomeController::class, 'logout'])->name('logout');
