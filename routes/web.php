<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

//Routes de connexion
Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/', [AuthController::class, 'handleLogin'])->name('handleLogin');

//Routes administrateur
Route::get('admin', [AdminController::class, 'index'])->name('admin');
