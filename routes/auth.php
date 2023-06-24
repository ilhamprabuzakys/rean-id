<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::middleware(['guest'])->group(function () {
    // Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
    // Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::get('/code-verification/{user}', [RegisterController::class, 'code_verification'])->name('register.code_verification');
    Route::post('/register', [RegisterController::class, 'authenticate'])->name('register.authenticate');
    Route::post('/code-verification/{user}', [RegisterController::class, 'verification_authenticate'])->name('register.verification_authenticate');
});


Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});
