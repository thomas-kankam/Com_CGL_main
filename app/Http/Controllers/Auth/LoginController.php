<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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

    protected $redirectTo = '/dashboard'; // The default redirect path after login

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated($request)
    {
        // Check the user's role(s) and redirect accordingly
        if (User::where('id', Auth::id())->where('role', 'Super Administrator')->exists()) {
            return redirect()->route('home');
        }
        if (User::where('id', Auth::id())->where('role', 'Administrator')->exists()) {
            return redirect()->route('crud');
        }
    }
}
