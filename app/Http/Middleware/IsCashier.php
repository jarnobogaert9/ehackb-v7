<?php

namespace App\Http\Middleware;

use Closure;

class IsCashier
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user() && Auth::user()->role == 1){
            // If user is a cashier let them go to cashier specific pages
            return $next($request);
        }
        return redirect('login');
    }
}
