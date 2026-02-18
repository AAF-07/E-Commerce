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
        $credentials = $request->only('username', 'password', 'role');

        if (auth()->guard('staff')->attempt($credentials)) {
            if (auth()->guard('staff')->user()->role === 'admin') {
                return redirect()->intended('/admin/dashboard');
            }else if (auth()->guard('staff')->user()->role === 'staff') {
                return redirect()->intended('/staff/dashboard');
            }
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
