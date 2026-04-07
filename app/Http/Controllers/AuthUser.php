<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthUser extends Controller
{

    public function addPhoto(Request $request)
    {
        $request->validate([
            'foto_profil' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = auth()->user();

        // Hapus foto lama jika ada
        if ($user->foto_profil && \Storage::exists('public/' . $user->foto_profil)) {
            \Storage::delete('public/' . $user->foto_profil);
        }

        // Simpan foto baru
        $path = $request->file('foto_profil')->store('profile', 'public');

        $user->update(['foto_profil' => $path]);

        return redirect()->route('user.profile')->with('success', 'Foto profil berhasil diperbarui.');
    }

    public function deletePhoto()
    {
        Auth()->user()->update(['foto_profil' => null]);

        return redirect()->route('user.profile')->with('success', 'Foto profil berhasil dihapus.');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . auth('user')->id(),
            'no_hp' => 'nullable|string|max:20',
        ]);

        auth()->user()->update($request->only(['name', 'email', 'no_hp']));

        return redirect()->route('user.profile')->with('success', 'Profile berhasil diperbarui.');
    }

    public function addAddress(Request $request)
    {
        $request->validate([
            'alamat' => 'required|string|max:500',
        ]);

        auth()->user()->update(['alamat' => $request->alamat]);

        return redirect()->route('user.profile')->with('success', 'Alamat berhasil ditambahkan.');
    }

    public function updateAddress(Request $request)
    {
        $request->validate([
            'alamat' => 'required|string|max:500',
        ]);

        auth()->user()->update(['alamat' => $request->alamat]);

        return redirect()->route('user.profile')->with('success', 'Alamat berhasil diperbarui.');
    }

    public function deleteAddress()
    {
        auth()->user()->update(['alamat' => null]);

        return redirect()->route('user.profile')->with('success', 'Alamat berhasil dihapus.');
    }
}
