<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class UserTypeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    
     public function handle($request, Closure $next, $userType)
     {
         // Check if the authenticated user's type matches the required type
         if (Auth::check() && Auth::user()->user_type == $userType) {
            return $next($request);
        }

        // Redirect to the custom error page for unauthorized access
        return redirect()->route('errors.error404');
     }
}
