<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function Pesanan()
    {
        return view('User.pesanan');
    }

    public function Keranjang()
    {
        return view('User.keranjang');
    }

    public function checkout()
    {
        // Logika untuk proses checkout
        return view('User.checkout');
    }

    public function detailPesanan()
    {
        return view('User.detail_pesanan');
    }
}
