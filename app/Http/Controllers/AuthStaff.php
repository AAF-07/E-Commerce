<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Staff;
use App\Models\User;
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


    public function create(Request $request)
    {
        $validate = $request->validate([
            'username' => 'required|string|max:255|unique:akun_staff',
            'password' => 'required|string|min:8',
        ]);

        $validate['password'] = bcrypt($validate['password']);
        $validate['role'] = 'staff';

        Staff::create($validate);
        return redirect()->route('admin.staff')->with('success', 'Staff berhasil ditambahkan!');
    }

    public function showstaff()
    {
        $staffs = Staff::where('role', 'staff')->get();
        return view('Admin.staff', compact('staffs'));
    }

    public function homestaff()
    {
        // $orders = Order::all();
        // $totalamount = Order::sum('total_amount');
        $totalusers = User::count();
        $products = Produk::orderby('stok', 'asc')->take(4)->get();
        return view('Staff.dashboard', compact('totalusers', 'products'));
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
