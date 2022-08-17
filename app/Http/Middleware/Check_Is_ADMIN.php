<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Check_Is_ADMIN
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth()->check() && Auth()->user()->isadmin == 1) {
            return $next($request);
        }

        return redirect(route('login'));
    }
}
