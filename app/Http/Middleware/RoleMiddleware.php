<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Periksa apakah user login dan memiliki salah satu role
        if (Auth::check() && in_array(Auth::user()->role->role_name, $roles)) {
            return $next($request);
        }

        // Jika tidak memiliki akses, tampilkan 403
        abort(403, 'Unauthorized action.');
    }
}
