<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    /**
     * Override the logout method to redirect to login page.
     */
    public function logout(Request $request)
    {
        Auth::logout(); // log the user out
        $request->session()->invalidate(); // invalidate session
        $request->session()->regenerateToken(); // regenerate CSRF token

        return redirect('/login'); // redirect to login page
    }
}
