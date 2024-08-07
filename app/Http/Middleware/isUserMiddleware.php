<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isUserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next) {
        if(Auth::check() && (Auth::user()->role === 'student' || Auth::user()->role === 'parent') && Auth::user()->status === 'active') {
            return $next($request);
        } else {
            if(Auth::check()) {
                Auth::logout();
            }
            return redirect()->route('login');
        }            
    }
}
