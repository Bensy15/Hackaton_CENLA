<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

         // Пытаемся войти как User
    if (Auth::guard('user')->attempt($credentials, $request->remember)) {
        $request->session()->regenerate();
        return redirect()->intended(route('user.home'));
    }

    // Пытаемся войти как Volunteer
    if (Auth::guard('volunteer')->attempt($credentials, $request->remember)) {
        $request->session()->regenerate();
        return redirect()->intended(route('volunteer.home'));
    }
    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ])->onlyInput('email');
}

    public function logout(Request $request)
    {
        if (Auth::guard('user')->check()) {
            Auth::guard('user')->logout();
        } elseif (Auth::guard('volunteer')->check()) {
            Auth::guard('volunteer')->logout();
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}