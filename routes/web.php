<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FilesController;
use App\Http\Controllers\FoldersController;
use App\Http\Controllers\SharedFilesController;

//Routes de register
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store'])->name('store');
//Routes de connexion
Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/', [AuthController::class, 'handleLogin'])->name('handleLogin');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//Routes Dashboard
Route::middleware('auth')->group(function() {
    //Routes administrateur
    Route::get('admin', [AdminController::class, 'index'])->name('admin');
    Route::post('admin', [AdminController::class, 'store'])->name('users.register');
    //Routes users simples
    Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::resource('dashboard/files', FilesController::class);
    Route::get('/files/{file}/download', [FilesController::class, 'download'])->name('files.download');
    Route::post('/files/{file}/share', [FilesController::class, 'share'])->name('files.share.store');
    Route::resource('dashboard/folders', FoldersController::class);
    Route::get('dashboard/sharedFiles', [SharedFilesController::class, 'index'])->name('sharedFiles.index');
    //Route::get('/sharedFiles/{sharedFile}/download', [SharedFilesController::class, 'download'])->name('sharedFiles.download');
});

