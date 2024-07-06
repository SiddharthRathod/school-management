<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;
    protected function redirectTo() {
        
        //it redirect to login if user authenticated respected to its role
        if((Auth::user()->role === 'student' || Auth::user()->role === 'parent') && Auth::user()->status === 'active') {
            return '/user/dashboard';
        } else if(Auth::user()->role === 'teacher' && Auth::user()->status === 'active') {
            return '/teacher/dashboard';
        } else if(Auth::user()->role === 'admin' && Auth::user()->status === 'active') {
            return '/admin/dashboard';
        }

    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
