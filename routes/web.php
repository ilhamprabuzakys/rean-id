<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EbookController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HeroImageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\MediaPostController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebsiteBuilderController;
use App\Mail\MailOtp;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

// Paksa URL route menggunakan konfigurasi di ENV
URL::forceRootUrl(config('app.url'));

require __DIR__ . '/auth.php';

Route::get('/test-mail', function() {
    $data = [
        'user_nama' => 'TEST',
        'user_email' => 'ilahazs.tiktok@gmail.com',
        'otp' => 'TEST 123',
    ];
    Mail::to($data['user_email'])->send(new MailOtp($data));
});

Route::middleware(['auth'])->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::controller(DashboardController::class)->group(function () {
            Route::get('/', 'index')->name('dashboard');
            Route::get('/pages-json', 'getPagesJson')->name('dashboard.getPagesJson');
        });

        Route::controller(SettingController::class)->group(function () {
            Route::get('/profile', 'profile')->name('profile');
            Route::get('/settings', 'settings')->name('settings');
            Route::post('/settings', 'settings')->name('settings.reset-password');
        });
        Route::get('/logs', [LogController::class, 'index'])->name('logs.index');
        
        Route::middleware(['except:member'])->group(function () {
            Route::get('/media/posts', [MediaPostController::class, 'posts'])->name('media.posts');
            Route::resource('/events', EventController::class)->except(['show']);
            Route::resource('/news', NewsController::class);
            Route::get('/users/roles', [UserController::class, 'roles'])->name('users.roles');
            Route::resource('/users', UserController::class);
        });
        
        Route::get('/posts/checkSlug', [PostController::class, 'checkSlug'])->name('posts.checkslug');
        Route::resource('/posts', PostController::class);
        Route::resource('/ebooks', EbookController::class)->except(['show']);
        Route::get('/chats', [ChatController::class, 'index'])->name('chats.index');

        Route::middleware(['role:superadmin,admin'])->group(function () {
            Route::resource('/categories', CategoryController::class);
            Route::resource('/tags', TagController::class);
            Route::get('/hero/main', [HeroImageController::class, 'main'])->name('hero.name');
            Route::get('/hero/detail', [HeroImageController::class, 'detail'])->name('hero.detail');
            Route::get('/hero/basic', [HeroImageController::class, 'basic'])->name('hero.basic');
        });

        Route::middleware(['role:superadmin'])->group(function () {
            /* Jika anda ingin mengubah personalisasi website bagian front-end Landing Page */
            Route::controller(WebsiteBuilderController::class)->group(function () {
                Route::prefix('website')->group(function () {
                    Route::get('/components', 'components')->name('website.components');
                    Route::get('/background-images', 'background_images')->name('website.background-images');
                });
            });
        });
    });
});

Route::middleware(['record.visitor'])->group(function () {
    Route::controller(HomeController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/about', 'about')->name('home.about');
        // Route::get('/all-post', 'all_post')->name('home.all_post');
        Route::get('/daftar-postingan', 'semua_postingan')->name('home.semua_postingan');
        Route::get('/users/{user}', 'user_view')->name('home.show_user');
        Route::get('/events/{event}', 'event_detail')->name('home.events.show');
        Route::get('/events', 'event')->name('home.events.index');
        Route::get('/news/{news}', 'news_detail')->name('home.news.show');
        Route::get('/news', 'news')->name('home.news.index');
        Route::get('/daftar-kategori', 'category_list')->name('home.category_list');
        Route::get('/tag/{tag}', 'tag_view')->name('home.tag_view');
        Route::get('/cns-radio', 'cns_radio')->name('home.cns');
        Route::get('/contact-us', 'contact')->name('home.contact');
        // Route::get('/analytics', 'analytics')->name('home.analytics');
        Route::get('/ebooks', 'ebook')->name('home.ebooks.index');
        Route::get('/ebooks/{ebook}', 'ebook_detail')->name('home.ebooks.show');
        Route::get('/{category}', 'category_view')->name('home.category_view');
        Route::get('/{category}/{post}', 'show_post')->name('home.show_post');
    });
});