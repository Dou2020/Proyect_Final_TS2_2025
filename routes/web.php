<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NichoController;
use App\Http\Controllers\UsuarioController;

// Ruta de root
Route::get('/', [LoginController::class, 'showLogin'])->name('login');

// visualizar la vista de login
Route::get('/login', [LoginController::class, 'showLogin'])->name('login');

// validar las credenciales del formulario login
Route::post('/login', [LoginController::class, 'login']);

// cerrar sesión
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// En routes/web.php
Route::middleware('auth:usuarios')->group(function () {
    
    // Route of the HomeController
    Route::get('/home', [HomeController::class, 'showHome'])->name('home');

    // Route options fot the NichoController
    Route::resource('nichos', NichoController::class);

    // Route option for the UsuarioController
    Route::resource('usuarios', UsuarioController::class);

});