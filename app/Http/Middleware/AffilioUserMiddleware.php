<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AffilioUserMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!session('user_login')) {
            return redirect()->route('user.login');
        }

        return $next($request);
    }
}