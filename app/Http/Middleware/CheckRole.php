<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // return $next($request);
        // Mendapatkan role pengguna saat ini
        $userRole = $request->user()->role;

        // Memeriksa apakah role pengguna ada dalam daftar role yang diizinkan
        if (in_array($userRole, $roles)) {
            return $next($request);
        }

        // Jika role pengguna tidak diizinkan, melakukan penanganan sesuai kebutuhan
        abort(403, 'Unauthorized');
    }
}
