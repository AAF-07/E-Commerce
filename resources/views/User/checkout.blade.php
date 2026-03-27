@extends('User.Layout.layout')

@section('content')
<div class="px-10 py-6">

    <!-- title -->
    <h1 class="text-3xl font-bold mb-6">Checkout</h1>

    <div class="grid grid-cols-2 gap-10">

        <!-- LEFT -->
        <div class="space-y-6">

            <!-- alamat -->
            <div class="bg-gray-100 rounded-xl shadow p-5">
                <h2 class="text-lg font-semibold mb-2">Alamat</h2>

                <p class="text-gray-600 mb-3">
                    Tidak ada alamat yang terdaftar
                </p>

                <button class="bg-teal-500 text-white px-4 py-2 rounded-lg">
                    Buat alamat
                </button>
            </div>

            <!-- pesanan -->
            <div class="bg-gray-100 rounded-xl shadow p-5">
                <h2 class="text-lg font-semibold mb-4">Pesanan</h2>

                <div class="flex gap-5 items-center">
                    <img src="{{ asset('images/poppywar.jpg') }}" class="w-20 h-28 object-cover rounded">

                    <div>
                        <h3 class="text-lg font-semibold">The Poppy War</h3>
                        <p>Rp. 160.000</p>
                        <p class="text-gray-600">Total: 1</p>
                    </div>
                </div>
            </div>

        </div>

        <!-- RIGHT -->
        <div class="bg-gray-100 rounded-xl shadow p-5 h-fit">

            <!-- pengiriman -->
            <h2 class="text-lg font-semibold mb-3">Pengiriman</h2>

            <select class="w-full border rounded-lg px-3 py-2 mb-5 ">
                <option>Pilih Pengiriman</option>
                <option>JNE</option>
                <option>J&T</option>
                <option>SiCepat</option>
            </select>

            <!-- ringkasan -->
            <h2 class="text-lg font-semibold mb-2">Ringkasan Belanja</h2>

            <div class="flex justify-between text-gray-700">
                <span>Total Harga (1 barang)</span>
                <span>Rp. 160.000</span>
            </div>

            <div class="flex justify-between text-gray-700">
                <span>Biaya Pengiriman</span>
                <span>Rp. 5.000</span>
            </div>

            <div class="flex justify-between text-gray-700 mb-3">
                <span>Diskon</span>
                <span>Rp. 0</span>
            </div>

            <hr class="mb-3">

            <div class="flex justify-between font-semibold text-lg mb-4">
                <span>Total</span>
                <span>Rp. 165.000</span>
            </div>

            <button class="w-full bg-teal-500 text-white py-2 rounded-lg">
                Beli
            </button>

        </div>

    </div>
</div>
@endsection
