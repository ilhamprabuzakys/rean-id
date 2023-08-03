<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\TagController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
URL::forceRootUrl(config('app.url'));

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Fetch data
Route::get('/posts', [PostController::class, 'index'])->name('api.posts.index');
Route::controller(CategoryController::class)->group(function() {
    Route::get('/categories', 'index')->name('api.categories.index');
});
Route::get('/tags', [TagController::class, 'index'])->name('api.tags.index');


