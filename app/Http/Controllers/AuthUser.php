<?php

namespace App\Http\Controllers;

use App\Models\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthUser extends Controller
{
    public function showSignupForm()
    {
        return view('User.signup');
    }

    public function signup(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'no_hp' => 'nullable|string|max:14',
            'alamat' => 'nullable|string|max:255',
        ]);

        $validated['password'] = Hash::make($validated['password']);

        $user = User::create($validated);

        auth()->guard('user')->login($user);

        return redirect('/login')->with('success', 'Signup berhasil!');
    }

    public function showLoginForm()
    {
        return view('User.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (auth()->guard('user')->attempt($credentials)) {
            // AMBIL cart setelah login berhasil
            $userId = auth()->guard('user')->id();
            Cart::restore($userId);

            return redirect()->intended('/');
        }

        // Jika sampai sini, berarti login gagal
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }


    public function logout(Request $request)
    {
        $userId = auth()->guard('user')->id();
        if ($userId) {
            // Only store if there are items, otherwise just erase old saved cart
            if (Cart::count() > 0) {
                Cart::erase($userId); // Clear previous DB entry to avoid rowId conflicts
                Cart::store($userId);
            } else {
                Cart::erase($userId); // User logged out with empty cart, clear DB
            }
        }

        auth()->guard('user')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function addPhoto(Request $request)
    {
        $request->validate([
            'foto_profil' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = auth('user')->user();

        // Hapus foto lama jika ada
        if ($user->foto_profil && \Storage::exists('public/' . $user->foto_profil)) {
            \Storage::delete('public/' . $user->foto_profil);
        }

        // Simpan foto baru
        $path = $request->file('foto_profil')->store('profile', 'public');

        $user->update(['foto_profil' => $path]);

        return redirect()->route('user.profile')->with('success', 'Foto profil berhasil diperbarui.');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . auth('user')->id(),
            'no_hp' => 'nullable|string|max:20',
        ]);

        auth('user')->user()->update($request->only(['name', 'email', 'no_hp']));

        return redirect()->route('user.profile')->with('success', 'Profile berhasil diperbarui.');
    }

    public function addAddress(Request $request)
    {
        $request->validate([
            'alamat' => 'required|string|max:500',
        ]);

        auth('user')->user()->update(['alamat' => $request->alamat]);

        return redirect()->route('user.profile')->with('success', 'Alamat berhasil ditambahkan.');
    }

    public function updateAddress(Request $request)
    {
        $request->validate([
            'alamat' => 'required|string|max:500',
        ]);

        auth('user')->user()->update(['alamat' => $request->alamat]);

        return redirect()->route('user.profile')->with('success', 'Alamat berhasil diperbarui.');
    }

    public function deleteAddress()
    {
        auth('user')->user()->update(['alamat' => null]);

        return redirect()->route('user.profile')->with('success', 'Alamat berhasil dihapus.');
    }
}
