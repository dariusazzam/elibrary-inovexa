<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureRole
{
    public function handle(Request $request, Closure $next, string ...$roles)
    {
        $user = session('user');

        if (! $user) {
            return redirect()->route('login')->with('toast', 'Silakan masuk terlebih dahulu');
        }

        if (! in_array($user['role'], $roles, true)) {
            abort(403, 'Anda tidak memiliki hak akses ke halaman ini.');
        }

        return $next($request);
    }
}
