<?php

namespace App\Http\Middleware;

use App\Models\Visitor;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RecordVisitor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $ipAddress = $request->ip();
        $userAgent = $request->header('User-Agent');
        $visitedDate = now()->toDateString();

        Visitor::firstOrCreate(
            ['ip_address' => $ipAddress, 'visited_date' => $visitedDate],
            ['user_agent' => $userAgent]
        );

        return $next($request);
    }
}
