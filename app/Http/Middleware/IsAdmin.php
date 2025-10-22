<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Make sure user logged in and has admin role
        if (auth()->check() && auth()->user()->is_admin == 1) {
            return $next($request);
        }

        return redirect('/')->with('error', 'You do not have admin access.');
    }
}
