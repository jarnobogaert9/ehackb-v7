<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsOwnUser
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
        if ($request->route('user') == Auth::user() || Auth::user()->role == 2){
            return $next($request);
        }
        return redirect(route('users.ownProfile'));
    }
}
