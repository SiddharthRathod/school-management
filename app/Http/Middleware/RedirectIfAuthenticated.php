<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            //it redirect to login if user authenticated respected to its role
            if( Auth::guard($guard)->check() && (Auth::user()->role === 'student' || Auth::user()->role === 'parent') ) {
                return redirect()->route('user.dashboard');
            } else if( Auth::guard($guard)->check() && Auth::user()->role === 'teacher' ) {
                return redirect()->route('teacher.dashboard');
            } else if( Auth::guard($guard)->check() && Auth::user()->role === 'admin' ) {
                return redirect()->route('admin.dashboard');
            }
        }

        return $next($request);
    }
}
