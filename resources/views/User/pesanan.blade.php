@extends('User.Layout.layout')

@section('content')
<div class="px-10 py-6">

    <!-- title -->
    <h1 class="text-3xl font-bold mb-6">Pesanan</h1>

    <div class="flex gap-8">

        <!-- sidebar -->
        <div class="w-64 bg-gray-100 rounded-xl shadow p-5 h-fit sticky top-24">
            <h2 class="font-semibold text-lg mb-4">Filter</h2>
            <ul class="space-y-2 text-gray-600">
                <li class="hover:text-black cursor-pointer">Semua</li>
                <li class="hover:text-black cursor-pointer">Pending</li>
                <li class="hover:text-black cursor-pointer">Paid</li>
                <li class="hover:text-black cursor-pointer">Dikirim</li>
                <li class="hover:text-black cursor-pointer">Completed</li>
                <li class="hover:text-black cursor-pointer">Failed</li>
            </ul>
        </div>

        <!-- content -->
        <div class="flex-1 space-y-5">

            <p class="font-semibold text-gray-600 mb-4">Pembayaran akan dikonfirmasi dalam 1x24 jam</p>

            @forelse($orders as $order)
                <!-- order card -->
                <div class="border border-teal-400 rounded-xl p-5">

                    <!-- order header -->
                    <div class="flex justify-between items-center mb-4 pb-3 border-b border-gray-300">
                        <div>
                            <p class="text-sm text-gray-600">Order ID: <span class="font-semibold">{{ $order->order_code }}</span></p>
                            <p class="text-sm text-gray-600">Tanggal: <span class="font-semibold">{{ $order->created_at->format('d M Y H:i') }}</span></p>
                        </div>
                        <div class="text-right">
                            <p class="text-sm text-gray-600">Status</p>
                            <span class="inline-block px-3 py-1 rounded-full text-white text-sm font-semibold
                                @if($order->status == 'pending') bg-yellow-500
                                @elseif($order->status == 'paid') bg-blue-500
                                @elseif($order->status == 'completed') bg-green-500
                                @else bg-red-500
                                @endif
                            ">
                                {{ ucfirst($order->status) }}
                            </span>
                        </div>
                    </div>

                    <!-- order items -->
                    <div class="space-y-3 mb-4">
                        @forelse($order->items as $item)
                            <div class="flex items-center justify-between">
                                <div class="flex gap-4 items-center flex-1">
                                    <img src="{{ asset('storage/' . $item->produk->gambar_produk) }}" alt="{{ $item->produk->nama_produk }}" class="w-20 h-24 object-cover rounded">
                                    <div class="flex-1">
                                        <h3 class="font-semibold text-lg">{{ $item->produk->nama_produk }}</h3>
                                        <p class="text-gray-600 text-sm">Qty: {{ $item->quantity }}</p>
                                        <p class="text-teal-600 font-semibold">Rp. {{ number_format($item->price, 0, ',', '.') }} x {{ $item->quantity }}</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="text-gray-600 text-sm">Subtotal</p>
                                    <p class="font-semibold text-lg">Rp. {{ number_format($item->subtotal, 0, ',', '.') }}</p>
                                </div>
                            </div>
                        @empty
                            <p class="text-gray-600">Tidak ada item dalam pesanan ini.</p>
                        @endforelse
                    </div>

                    <!-- order footer -->
                    <div class="flex justify-between items-center pt-3 border-t border-gray-300">
                        <div class="text-right flex-1">
                            <p class="text-gray-600 text-sm">Total Pesanan</p>
                            <p class="font-bold text-xl text-teal-600">Rp. {{ number_format($order->total_amount, 0, ',', '.') }}</p>
                        </div>

                        <div class="flex gap-3 ml-4">
                            @if($order->status != 'completed' && $order->status != 'failed')
                                <button class="px-5 py-2 border border-red-400 text-red-400 rounded-lg hover:bg-red-50 transition">
                                    Batalkan
                                </button>
                            @endif
                            <a href="/orders/{{ $order->id }}" class="px-5 py-2 bg-teal-500 text-white rounded-lg hover:bg-teal-600 transition">
                                Detail Pesanan
                            </a>
                        </div>
                    </div>

                </div>
            @empty
                <!-- empty state -->
                <div class="text-center py-12">
                    <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                    </svg>
                    <h3 class="text-xl font-semibold text-gray-600 mb-2">Tidak ada pesanan</h3>
                    <p class="text-gray-500 mb-4">Anda belum melakukan pembelian apapun.</p>
                    <a href="{{ route('home') }}" class="inline-block px-6 py-2 bg-teal-500 text-white rounded-lg hover:bg-teal-600 transition">
                        Mulai Belanja
                    </a>
                </div>
            @endforelse

        </div>
    </div>
</div>
@endsection
