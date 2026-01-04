<?php
namespace App\Http\Middleware;

use auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (!auth()->check()) {
            abort(403);
        }

        // role user
        $userRole = auth()->user()->role;

        // jika role user TIDAK ADA di role yang diizinkan
        if (!in_array($userRole, $roles)) {
            abort(403);
        }

        return $next($request);
    }
}
