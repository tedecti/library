<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // dd(auth('user')->check());
        if (auth('user')->check()) {
            return $next($request);
        } else {
            return redirect()->route('signin')->with('error', 'Пожалуйста, выполните вход в систему');
        }
    }
}
