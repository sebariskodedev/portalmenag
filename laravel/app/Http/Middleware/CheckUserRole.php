<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role = null): Response
    {
        if (auth()->check() && auth()->user()->role === $role) {
            return $next($request); // Proceed to the next middleware or controller
        }

        return redirect('/dashboard'); // Redirect if the condition fails
    }
}
