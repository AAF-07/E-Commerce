<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Produk;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;
use Midtrans\Transaction;

class OrderController extends Controller
{
    public function __construct()
    {
        Config::$serverKey = config('midtrans.server_key');
        Config::$clientKey = config('midtrans.client_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.is_sanitized');
        Config::$is3ds = config('midtrans.is_3ds');
    }

    public function pesanan()
    {
        $orders = Order::where('user_id', auth('user')->id())->with('items.produk')->orderBy('created_at', 'desc')->get();
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
            'weight' => 0,
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

    public function checkout(Request $request)
    {
        // Ambil checked_items dari request
        $checkedItems = json_decode($request->input('checked_items', '[]'), true);

        if (empty($checkedItems)) {
            return redirect()->route('user.cart')->with('error', 'Silakan pilih produk yang ingin dibeli.');
        }

        // Simpan ke session
        session(['checked_items' => $checkedItems]);

        $cart = Cart::content();
        $alamat = auth('user')->user()->alamat;

        // Filter hanya item yang dicentang
        $selectedItems = $cart->filter(function ($item) use ($checkedItems) {
            return in_array($item->rowId, $checkedItems);
        });

        if ($selectedItems->isEmpty()) {
            return redirect()->route('user.cart')->with('error', 'Silakan pilih produk yang ingin dibeli.');
        }

        // Hitung total harga
        $totalPrice = $selectedItems->sum(function ($item) {
            return $item->price * $item->qty;
        });

        try {
            // Generate unique order ID
            $orderId = 'ORDER-' . auth('user')->id() . '-' . time();

            $param = [
                'transaction_details' => [
                    'order_id' => $orderId,
                    'gross_amount' => (int)$totalPrice,
                ],
                'customer_details' => [
                    'first_name' => auth('user')->user()->name,
                    'email' => auth('user')->user()->email,
                    'phone' => auth('user')->user()->phone ?? '08123456789',
                ],
                'items' => $selectedItems->map(function ($item) {
                    return [
                        'id' => (string)$item->id,
                        'price' => (int)$item->price,
                        'quantity' => (int)$item->qty,
                        'name' => substr($item->name, 0, 50),
                    ];
                })->values()->toArray(),
            ];

            $snapToken = Snap::getSnapToken($param);

            return view('User.checkout', compact('alamat', 'selectedItems', 'totalPrice', 'snapToken', 'orderId'));
        } catch (\Exception $e) {
            \Log::error('Midtrans Snap Error: ' . $e->getMessage());
            return redirect()->route('user.cart')->with('error', 'Gagal membuat token pembayaran: ' . $e->getMessage());
        }
    }

    public function finish(Request $request)
    {
        $orderId = $request->input('order_id');

        if (!$orderId) {
            return redirect()->route('user.cart')->with('error', 'Order ID tidak ditemukan.');
        }

        try {
            $status = Transaction::status($orderId);

            \Log::info('Transaction Status:', (array)$status);

            if ($status->transaction_status == 'capture' || $status->transaction_status == 'settlement') {
                // Payment success - create order record
                $this->createOrder($orderId, $status);
                session()->forget('checked_items');
                return redirect()->route('user.orders')->with('success', 'Pembayaran berhasil! Terima kasih atas pembelian Anda.');
            } else {
                return redirect()->route('user.cart')->with('error', 'Status pembayaran: ' . $status->transaction_status);
            }
        } catch (\Exception $e) {
            \Log::error('Checkout finish error: ' . $e->getMessage());
            return redirect()->route('user.cart')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function error(Request $request)
    {
        session()->forget('checked_items');
        return redirect()->route('user.cart')->with('error', 'Pembayaran dibatalkan atau gagal.');
    }

    public function pending(Request $request)
    {
        $orderId = $request->input('order_id');
        return redirect()->route('user.orders')->with('warning', 'Pembayaran sedang diproses dengan order ID: ' . $orderId . '. Silakan tunggu konfirmasi.');
    }

    private function createOrder($orderId, $transactionStatus)
    {
        $checkedItems = session('checked_items', []);
        $cart = Cart::content();

        // Filter selected items
        $selectedItems = $cart->filter(function ($item) use ($checkedItems) {
            return in_array($item->rowId, $checkedItems);
        });

        // Calculate subtotal
        $subtotal = $selectedItems->sum(function ($item) {
            return $item->price * $item->qty;
        });

        // Create Order
        $order = Order::create([
            'user_id' => auth('user')->id(),
            'order_code' => $orderId,
            'total_amount' => $subtotal,
            'status' => 'paid',
            'payment_method' => $transactionStatus->payment_type ?? 'midtrans',
            'midtrans_order_id' => $transactionStatus->order_id ?? $orderId,
            'midtrans_transaction_id' => $transactionStatus->transaction_id ?? null,
            'midtrans_response' => json_encode($transactionStatus),
            'payment_time' => now(),
        ]);

        // Create Order Items
        foreach ($selectedItems as $item) {
            $order->items()->create([
                'produk_id' => $item->id,
                'quantity' => $item->qty,
                'price' => $item->price,
                'subtotal' => $item->price * $item->qty,
            ]);
        }

        foreach ($selectedItems as $item) {
            Cart::remove($item->rowId);
        }

        \Log::info('Order created:', ['order_id' => $order->id, 'midtrans_order_id' => $orderId]);
    }

    public function handleWebhook(Request $request)
    {
        $payload = $request->getContent();
        $notification = json_decode($payload);

        try {
            // Verify signature
            $serverKey = config('midtrans.server_key');
            $orderId = $notification->order_id;
            $statusCode = $notification->status_code;
            $grossAmount = $notification->gross_amount;
            $signature = $notification->signature_key;

            $hash = hash('sha512', $orderId . $statusCode . $grossAmount . $serverKey);

            if ($signature !== $hash) {
                return response()->json(['status' => 'error', 'message' => 'Invalid signature'], 403);
            }

            // Get transaction status
            $status = Transaction::status($orderId);

            if ($status->transaction_status == 'capture' || $status->transaction_status == 'settlement') {
                $order = Order::where('midtrans_order_id', $orderId)->first();
                if ($order) {
                    $order->update(['status' => 'paid']);
                }
            } elseif ($status->transaction_status == 'pending') {
                $order = Order::where('midtrans_order_id', $orderId)->first();
                if ($order) {
                    $order->update(['status' => 'pending']);
                }
            } elseif (in_array($status->transaction_status, ['deny', 'expire', 'cancel'])) {
                $order = Order::where('midtrans_order_id', $orderId)->first();
                if ($order) {
                    $order->update(['status' => 'failed']);
                }
            }

            return response()->json(['status' => 'ok']);
        } catch (\Exception $e) {
            \Log::error('Webhook error: ' . $e->getMessage());
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 400);
        }
    }

    public function alamatadd(Request $request)
    {
        $request->validate([
            'alamat' => 'required|string|max:255',
        ]);

        $user = auth('user')->user();
        $user->alamat = $request->alamat;
        $user->save();

        return redirect()->back()->with('success', 'Alamat berhasil disimpan.');
    }

    public function detailPesanan()
    {
        return view('User.detail_pesanan');
    }
}
