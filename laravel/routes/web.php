<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\HamburguerController;

// Página inicial
Route::get('/', [HomeController::class, 'index'])->name('home');

// Login simples
Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/login', [LoginController::class, 'auth'])->name('login.auth');
Route::post('/logout', [LoginController::class, 'logout'])->name('login.logout');

// CRUD de categorias
Route::resource('categorias', CategoriaController::class);

// CRUD de hambúrgueres
Route::resource('hamburgueres', HamburguerController::class);
