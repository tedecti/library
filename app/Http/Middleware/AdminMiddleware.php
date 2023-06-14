<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        $user = Auth::guard('user')->user();

        if ($user && $user['role_id'] == 2) {
            return $next($request);
        }
        return redirect()->back()->with('error', 'У вас нет доступа к этой странице');
    }
}
