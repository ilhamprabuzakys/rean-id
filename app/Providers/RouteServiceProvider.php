<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/dashboard';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });

        // Custom resolution untuk model Post
        Route::bind('post', function ($value) {
            // Coba ambil post berdasarkan slug saat ini
            $post = \App\Models\Post::where('slug', $value)->first();

            // Jika post tidak ditemukan, cek di tabel old_slugs
            if (!$post) {
                $oldSlug = DB::table('old_slugs')->where('slug', $value)->first();

                // Jika ditemukan di old_slugs, arahkan ke post dengan slug baru
                if ($oldSlug) {
                    $post = \App\Models\Post::find($oldSlug->post_id);

                    // Redirect ke route dengan slug baru
                    redirect()->route('home.show_post', ['category' => $post->category->slug, 'post' => $post->slug])->send();
                }
            }

            // Jika post tetap tidak ditemukan, akan mengembalikan 404
            if (!$post) {
                abort(404);
            }

            return $post;
        });
    }
}
