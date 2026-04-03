<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Produk;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function pesanan()
    {
        $orders = Order::where('user_id', auth('user')->id())->with('items.produk')->get();
        return view('User.pesanan', compact('orders'));
    }


    public function Keranjang()
    {
        $cart = Cart::content();
        return view('User.keranjang', compact('cart'));
    }

    public function addToCart(Request $request)
    {
        $product = Produk::findOrFail($request->id);

        Cart::add([
            'id' => $product->id,
            'name' => $product->nama_produk,
            'qty' => $request->quantity ?? 1,
            'price' => $product->harga,
            'weight' => 0,  // Tambahkan weight
            'options' => [
                'image' => $product->gambar_produk,
            ],
        ]);
        return redirect()->route('user.cart')->with('success', 'Produk berhasil ditambahkan ke keranjang.');
    }

    public function update(Request $request, $rowId)
    {
        Cart::update($rowId, ['quantity' => $request->qty]);
    }

    public function remove($rowId)
    {
        Cart::remove($rowId);
        return redirect()->route('user.cart')->with('success', 'Produk berhasil dihapus dari keranjang.');
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
