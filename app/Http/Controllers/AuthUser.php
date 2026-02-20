<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthUser extends Controller
{
    public function showsignupForm()
    {
        return view('User.signup');
    }

    public function signup(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:akun_user',
            'password' => 'required|string|min:8|confirmed',
            'no_hp' => 'required|string|max:13',
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        \DB::table('akun_user')->insert($validatedData);

        return redirect('/')->with('success', 'Akun berhasil dibuat. Silakan login.');
    }

   // Show the staff login form
    public function showLoginForm()
    {
        return view('User.login');
    }

    // Handle staff login
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (auth()->guard('user')->attempt($credentials)) {
            return redirect()->intended('/');
        };

        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ]);
    }


    // Handle staff logout
    public function logout(Request $request)
    {
        auth()->guard('user')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}

