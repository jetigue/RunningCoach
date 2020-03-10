<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class Coach
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
//        if (Auth::check() && Auth::user()->role->slug === 'admin' || Auth::user()->role->slug === 'coach') {
        if (Auth::check() && Auth::user()->role->slug === 'coach') {
            return $next($request);
        } elseif (Auth::check() && Auth::user()->role->slug === 'admin') {
            return $next($request);
        }

        return redirect('/');
    }
}
