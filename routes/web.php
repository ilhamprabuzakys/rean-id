<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/auth.php';

Route::middleware(['auth'])->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard');
    });

    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile/{user}', 'index')->name('profile.index');
        Route::put('/profile', 'update')->name('profile.update');
        Route::get('/profile/password/{user}/edit', 'password')->name('profile.password');
        Route::put('/profile/password/{user}', 'update_password')->name('profile.update-password');
    });

    Route::middleware(['except:role:member'])->group(function () {
        Route::get('/posts/approval', [PostController::class, 'approval'])->name('posts.approval');
        Route::post('/posts/approval', [PostController::class, 'approvalForm'])->name('posts.approval.form');
        Route::get('/logs', [LogController::class, 'index'])->name('logs.index');
        Route::resource('/categories', CategoryController::class);
        Route::resource('/tags', TagController::class);
    });

    Route::get('/posts/checkSlug', [PostController::class, 'checkSlug'])->name('posts.checkslug');
    Route::resource('/posts', PostController::class);

    Route::middleware(['role:superadmin,admin'])->group(function () {
        Route::get('/users/roles', [UserController::class, 'roles'])->name('users.roles');
        Route::resource('/users', UserController::class);
    });

    
});

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/all-post', 'all_post')->name('home.all_post');
    Route::get('/kategori/{category}', 'category_view')->name('home.category_view');
    Route::get('/daftar-kategori', 'category_list')->name('home.category_list');
    Route::get('/cns-radio', 'cns_radio')->name('home.cns');
    Route::get('/contact-us', 'contact')->name('home.contact');
    Route::post('/contact-us', 'contact_send')->name('home.contact_send');
    Route::get('/{category}/{post}', 'show_post')->name('home.show_post');
});
