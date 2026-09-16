<?php

/* Author: Cristian Bolaños */

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminAuthMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::user() && Auth::user()->isAdmin()) {
            return $next($request);
        }

        return redirect()->route('home.index');
    }
}
