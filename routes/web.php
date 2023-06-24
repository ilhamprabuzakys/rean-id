<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function() {
    return redirect()->to('/dashboard');
})->name('index');

Route::get('/home', function() {
    return redirect()->to('/dashboard');
})->name('home');

Route::middleware(['auth'])->group(function() {
    Route::controller(DashboardController::class)->group(function() {
        Route::get('/dashboard', 'index')->name('dashboard');
    });
    
    Route::controller(ProfileController::class)->group(function() {
        Route::get('/profile/{user}', 'index')->name('profile.index');
        Route::put('/profile', 'update')->name('profile.update');
        Route::get('/profile/password/{user}/edit', 'password')->name('profile.password');
        Route::put('/profile/password/{user}', 'update_password')->name('profile.update-password');
    });
    
    Route::get('/posts/checkSlug', [PostController::class, 'checkSlug'])->name('posts.checkslug');
    Route::resource('/posts', PostController::class);
    Route::resource('/categories', CategoryController::class);
    Route::resource('/users', UserController::class);
});

require __DIR__ . '/auth.php';
