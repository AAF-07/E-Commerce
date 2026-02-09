<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthStaff extends Controller
{
    // Show the staff login form
    public function showLoginForm()
    {
        return view('Staff.login');
    }

    // Handle staff login
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (auth()->guard('staff')->attempt($credentials)) {
            return redirect()->intended('/staff/dashboard');
        }

        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ]);
    }

    // Handle staff logout
    public function logout(Request $request)
    {
        auth()->guard('staff')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/staff');
    }
}
