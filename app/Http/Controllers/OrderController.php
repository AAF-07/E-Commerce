<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Produk;
use App\Models\Reported;
use App\Notifications\OrderShipped;
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
        $orders = Order::where('user_id', auth()->id())->with('items.produk')->orderBy('created_at', 'desc')->get();
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

        if ($request->action == 'buy_now') {
            // Buat array berisi rowId item yang baru saja ditambah agar terpilih di checkout
            $checkedItems = json_encode([$cartItem->rowId]);

            return redirect()->route('user.checkout', [
                'checked_items' => $checkedItems
            ]);
        }
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
        $cart = Cart::content();
        $alamat = auth()->user()->alamat;
        if ($request->has('pengiriman')) {
        session(['pengiriman' => $request->pengiriman]);
    }

        if ($request->has('product_id')){
            $product = Produk::findorfail($request->input('product_id'));
            $qty = $request->input('quantity', 1);
            session([
                'direct_buy_id' => $product->id,
                'direct_buy_qty' => $qty
            ]);

            $selectedItems = collect([
                (object)[
                    'id' => $product->id,
                    'name' => $product->nama_produk,
                    'price' => $product->harga,
                    'qty' => $qty,
                    'options' => [
                        'image' => $product->gambar_produk,
                    ],
                ]
                ]);
        }else {
            $checkedItems = json_decode($request->input('checked_items', '[]'), true);

            if (empty($checkedItems)) {
                return redirect()->route('user.cart')->with('error', 'Silakan pilih produk yang ingin dibeli.');
            }

            // Simpan ke session
            session(['checked_items' => $checkedItems]);

            // Filter hanya item yang dicentang
            $selectedItems = $cart->filter(function ($item) use ($checkedItems) {
                return in_array($item->rowId, $checkedItems);
            });


            if ($selectedItems->isEmpty()) {
                return redirect()->route('user.cart')->with('error', 'Silakan pilih produk yang ingin dibeli.');
            }
        }

        // Hitung total harga
        $totalPrice = $selectedItems->sum(function ($item) {
            return $item->price * $item->qty;
        });

        try {
            // Generate unique order ID
            $orderId = 'ORDER-' . auth()->id() . '-' . time();

           // 1. Siapkan array items dari produk
        $items = $selectedItems->map(function ($item) {
            return [
                'id'       => (string)$item->id,
                'price'    => (int)$item->price,
                'quantity' => (int)$item->qty,
                'name'     => substr($item->name, 0, 50),
            ];
        })->values()->toArray();

        // 2. Tambahkan biaya pengiriman sebagai item tersendiri
        $items[] = [
            'id'       => 'SHIPPING_FEE',
            'price'    => 5000,
            'quantity' => 1,
            'name'     => 'Biaya Pengiriman',
        ];

        // 3. Susun Param
        $param = [
            'transaction_details' => [
                'order_id'     => $orderId,
                'gross_amount' => (int)$totalPrice + 5000, // Harus sama dengan total harga di array $items
            ],
            'customer_details' => [
                'first_name' => auth()->user()->name,
                'email'      => auth()->user()->email,
                'phone'      => auth()->user()->phone ?? '08123456789',
                'billing_address' => [
                    'address' => $alamat ?? 'Alamat tidak tersedia',
                ],
                'shipping_address' => [
                    'address' => $alamat ?? 'Alamat tidak tersedia',
                ],
            ],
            'item_details' => $items, // Ganti 'items' menjadi 'item_details'
        ];
            $snapToken = Snap::getSnapToken($param);

            return view('User.checkout', compact('alamat', 'selectedItems', 'totalPrice', 'snapToken', 'orderId'));
        } catch (\Exception $e) {
            \Log::error('Midtrans Snap Error: ' . $e->getMessage());
            return redirect()->route('user.cart')->with('error', 'Gagal membuat token pembayaran: ' . $e->getMessage());
        }
        // Di dalam method checkout bagian if ($request->has('product_id'))

    }

    public function finish(Request $request)
    {
        $orderId = $request->input('order_id');
        $pengiriman = $request->input('pengiriman');

        if (!$orderId) {
            return redirect()->route('user.cart')->with('error', 'Order ID tidak ditemukan.');
        }

        try {
            $status = \Midtrans\Transaction::status($orderId);

            if ($status->transaction_status == 'capture' || $status->transaction_status == 'settlement') {
                // Cek dulu apakah order sudah pernah dibuat (mencegah duplikasi saat refresh)
                $order = Order::where('midtrans_order_id', $orderId)->first();

                if (!$order) {
                    $order = $this->createOrder($orderId, $status, $pengiriman);
                }

                if ($order) {
                    auth()->user()->notify(new OrderShipped($order));
                    return redirect()->route('user.orders')->with('success', 'Pembayaran berhasil!');
                }
            }

            return redirect()->route('user.orders')->with('error', 'Gagal memproses pesanan atau pembayaran belum sukses.');

        } catch (\Exception $e) {
            \Log::error('Finish Error: ' . $e->getMessage());
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

    private function createOrder($orderId, $transactionStatus, $pengiriman = null)
    {
        return \DB::transaction(function () use ($orderId, $transactionStatus, $pengiriman) {
            $cart = \Cart::content();
            $checkedItems = session('checked_items', []);

            // JALUR A: Ambil dari Cart (Jika ada checked_items)
            $selectedItems = $cart->filter(function ($item) use ($checkedItems) {
                return in_array($item->rowId, $checkedItems);
            });

            // JALUR B: Jika Cart kosong, cek apakah ini "Beli Langsung"
            if ($selectedItems->isEmpty() && session()->has('direct_buy_id')) {
                $product = Produk::find(session('direct_buy_id'));
                if ($product) {
                    $selectedItems = collect([
                        (object)[
                            'id' => $product->id,
                            'name' => $product->nama_produk,
                            'price' => $product->harga,
                            'qty' => session('direct_buy_qty', 1),
                            'options' => ['image' => $product->gambar_produk],
                            'is_direct' => true // Penanda beli langsung
                        ]
                    ]);
                }
            }

            // Jika tetap kosong, hentikan proses agar tidak buat Order kosong
            if ($selectedItems->isEmpty()) {
                \Log::error("Gagal create order: Item tidak ditemukan. OrderID: $orderId");
                return null;
            }

            $subtotal = $selectedItems->sum(fn($item) => $item->price * $item->qty);

            // Buat data Order Utama
            $order = Order::create([
                'user_id'                 => auth()->id(),
                'order_code'              => $orderId,
                'total_amount'            => $subtotal,
                'status'                  => 'paid',
                'alamat'                  => auth()->user()->alamat,
                'no_hp'                   => auth()->user()->no_hp ?? '08123',
                'pengiriman'              => $pengiriman ?? 'kurir_kami',
                'payment_method'          => $transactionStatus->payment_type ?? 'midtrans',
                'midtrans_order_id'       => $orderId,
                'midtrans_transaction_id' => $transactionStatus->transaction_id ?? null,
                'midtrans_response'       => json_encode($transactionStatus),
                'payment_time'            => now(),
            ]);

            // Simpan setiap item ke tabel order_items
            foreach ($selectedItems as $item) {
                $order->items()->create([
                    'produk_id' => $item->id,
                    'quantity'  => $item->qty,
                    'price'     => $item->price,
                    'subtotal'  => $item->price * $item->qty,
                ]);

                // Hapus dari keranjang jika item ini memang dari keranjang
                if (!isset($item->is_direct) && isset($item->rowId)) {
                    \Cart::remove($item->rowId);
                }
            }

            // Hapus semua session terkait checkout
            session()->forget(['checked_items', 'direct_buy_id', 'direct_buy_qty', 'pengiriman']);

            return $order;
        });
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

        $user = auth()->user();
        $user->alamat = $request->alamat;
        $user->save();

        return redirect()->back()->with('success', 'Alamat berhasil disimpan.');
    }

    public function detailPesanan($id)
    {
        $order = Order::where('user_id', auth()->id())->where('id', $id)->with('items.produk')->first();
        return view('User.detail_pesanan', compact('order'));
    }

    public function lapor(Request $request, $id)
    {
        $request->validate([
            'laporan' => 'required|string',
        ]);

        // Cari order berdasarkan user yang login
        $order = Order::where('user_id', auth()->id())
                      ->where('id', $id)
                      ->with('items')
                      ->first();

        if (!$order) {
            return redirect()->back()->with('error', 'Pesanan tidak ditemukan.');
        }

        // Ambil produk_id jika ada, jika tidak ada biarkan null
        // Kita tidak menggunakan 'if (!$firstItem)' lagi agar proses tidak berhenti di sini
        $firstItem = $order->items->first();
        $productId = $firstItem ? $firstItem->produk_id : null;

        try {
            Reported::create([
                'order_id'  => $order->id,
                'user_id'   => auth()->id(),
                'produk_id' => $productId, // Akan terisi NULL jika produk tidak ada
                'laporan'   => $request->laporan,
            ]);

            $order->update(['status' => 'reported']);

            return redirect('/orders')->with('success', 'Laporan berhasil dikirim.');
        } catch (\Exception $e) {
            // Jika masih error, kemungkinan besar database kamu belum 'nullable'
            \Log::error('Gagal kirim laporan: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal mengirim laporan. Pastikan kolom produk_id di database sudah diatur ke nullable.');
        }
    }
}
