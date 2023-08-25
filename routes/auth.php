<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\GoogleController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

URL::forceRootUrl(config('app.url'));

Route::middleware(['guest'])->group(function () {
    // Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
    // Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::get('/code-verification/{user}', [RegisterController::class, 'code_verification'])->name('register.code_verification');
    Route::get('/register/email/{user}', [RegisterController::class, 'email_again'])->name('register.email-again');
    Route::post('/register/email/{user}', [RegisterController::class, 'email_again_authenticate'])->name('register.email-again.authenticate');
    Route::post('/register', [RegisterController::class, 'authenticate'])->name('register.authenticate');
    Route::post('/code-verification/{user}', [RegisterController::class, 'verification_authenticate'])->name('register.verification_authenticate');
    Route::get('/code-verification/resend/{user}', [RegisterController::class, 'resend_code_verification'])->name('register.again_code_verification');

    Route::controller(GoogleController::class)->group(function() {
        Route::get('auth/google', 'redirect')->name('google.login');
        Route::get('auth/google/callback', 'callback')->name('google.callback');
    });
});

Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});
