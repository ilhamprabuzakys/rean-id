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

Route::controller(HomeController::class)->group(function() {
    Route::get('/', 'index')->name('index');
});

// Route::middleware(['role:superadmin', 'role:admin'])->group(function() {
//     Route::get('/', function() {
//         return redirect()->route('dashboard');
//     });
// });

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

    Route::middleware(['role:superadmin'])->group(function() {
        Route::get('/posts/approval', [PostController::class, 'approval'])->name('posts.approval');
        Route::post('/post/approval', [PostController::class, 'approvalForm'])->name('posts.approval.form');
        Route::get('/logs', [LogController::class, 'index'])->name('logs.index');
        Route::resource('/categories', CategoryController::class);
        Route::resource('/tags', TagController::class);
    });
    
    Route::get('/posts/checkSlug', [PostController::class, 'checkSlug'])->name('posts.checkslug');
    Route::resource('/posts', PostController::class);

    Route::middleware(['role:superadmin,admin'])->group(function() {
        Route::get('/users/roles', [UserController::class, 'roles'])->name('users.roles');
        Route::resource('/users', UserController::class);
    });

});

require __DIR__ . '/auth.php';

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function() {
//     return redirect()->to('/dashboard');
// })->name('index');

// Route::get('/home', function() {
//     return redirect()->to('/dashboard');
// })->name('home');


// Route::middleware(['auth', 'role:superadmin'])->group(function() {
   
// });