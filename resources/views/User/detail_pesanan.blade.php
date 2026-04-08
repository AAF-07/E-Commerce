@extends('User.Layout.layout')

@section('content')
<div class="px-10 py-6">

    <h1 class="text-3xl font-bold mb-6">Detail Pesanan</h1>

    <div class="border border-teal-400 rounded-xl p-8 bg-white shadow-sm">

        <div class="flex gap-10 items-start mb-10">

            <div class="w-48">
                @foreach($order->items as $item)
                <div class="mb-6">
                    <img src="{{ asset('storage/' . $item->produk->gambar_produk) }}"
                         class="aespect-[5/8] object-cover rounded-lg shadow-md mb-3">

                    <h2 class="text-lg font-bold text-gray-800">{{ $item->produk->nama_produk }}</h2>
                    <p class="text-teal-600 font-semibold">Rp. {{ number_format($item->produk->harga, 0, ',', '.') }}</p>
                </div>
                @endforeach
            </div>

            <div class="flex flex-col gap-4 flex-1">
                <div>
                    <p class="text-xs uppercase tracking-wider text-gray-500 font-bold">Status</p>
                    <p class="font-semibold text-teal-700">{{ strtoupper($order->status) }}</p>
                </div>

                <div>
                    <p class="text-xs uppercase tracking-wider text-gray-500 font-bold">Pengiriman</p>
                    <p class="font-semibold">{{ $order->pengiriman }}</p>
                </div>

                <div>
                    <p class="text-xs uppercase tracking-wider text-gray-500 font-bold">Tanggal pembelian</p>
                    <p class="font-semibold">{{ $order->created_at->format('d M Y') }}</p>
                </div>

                <div>
                    <p class="text-xs uppercase tracking-wider text-gray-500 font-bold">Estimasi tiba</p>
                    <p class="font-semibold">{{ $order->created_at->addDays(5)->format('d M Y') }}</p>
                </div>

                <div>
                    <p class="text-xs uppercase tracking-wider text-gray-500 font-bold">Pembayaran</p>
                    <p class="font-semibold">{{ $order->payment_method }}</p>
                </div>
            </div>

            <div class="w-px bg-gray-200 self-stretch"></div>

            <div class="flex flex-col gap-6 flex-1">
                <div>
                    <p class="text-xs uppercase tracking-wider text-gray-500 font-bold">Alamat Pengiriman</p>
                    <p class="text-gray-700 leading-relaxed">{{ $order->alamat }}</p>
                </div>

                <div>
                    <p class="text-xs uppercase tracking-wider text-gray-500 font-bold">No. Pesanan</p>
                    <p class="font-mono font-bold text-gray-800">{{ $order->order_code }}</p>
                </div>
            </div>

        </div>

        <hr class="border-gray-100 mb-8">

        <div class="flex justify-center">
            <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"
                    class="bg-white border-2 border-red-500 text-red-500 hover:bg-red-500 hover:text-white font-bold py-3 px-10 rounded-xl transition-all duration-300 shadow-sm"
                    type="button">
                Laporkan Masalah
            </button>
        </div>

        <div id="authentication-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full bg-black/50">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-2xl shadow-2xl border border-gray-100">
                    <div class="flex items-center justify-between p-5 border-b border-gray-100">
                        <h3 class="text-xl font-bold text-gray-800">
                            Buat Laporan Pesanan
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-100 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="authentication-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <div class="p-6">
                        <form action="{{ route('user.orders.report', $order->id) }}" method="POST">
                            @csrf
                            <div class="mb-5">
                                <label for="laporan" class="block mb-2 text-sm font-bold text-gray-700">Detail Keluhan</label>
                                <textarea id="laporan" name="laporan" rows="4"
                                          class="w-full px-4 py-3 text-gray-700 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-teal-400 focus:border-teal-400 focus:outline-none transition-all placeholder:text-gray-400"
                                          placeholder="Ceritakan kendala pesanan Anda di sini..." required></textarea>
                            </div>

                            <button type="submit"
                                    class="w-full text-white bg-teal-500 hover:bg-teal-600 font-bold py-3 rounded-xl shadow-lg shadow-teal-100 transition-all duration-300">
                                Kirim Laporan
                            </button>
                            <p class="text-center text-xs text-gray-400 mt-4 italic">
                                *Admin akan meninjau laporan Anda dalam 4x24 jam.
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection
