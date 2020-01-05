<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsTeamLeader
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
        if (Auth::user()->is_admin
            || (!empty($request->route('team')) && $request->route('team')->creator == Auth::user())
            || (!empty($request->route('teamrequest')) && $request->route('teamrequest')->team->creator == Auth::user())){
            return $next($request);
        }
        return redirect(route('teams.one', $request->route('team')));
    }
}
