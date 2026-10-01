<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // Pastikan user sudah login dan role-nya ada di dalam parameter yang diizinkan
        if ($request->user() && in_array($request->user()->role, $roles)) {
            return $next($request);
        }

        // Jika tidak memiliki akses, abort 403 (Forbidden) atau redirect
        abort(403, 'Unauthorized action.');
    }
}