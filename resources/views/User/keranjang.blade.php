@extends('User.Layout.layout')

@section('content')
<div class="px-10 py-6">

    <!-- title -->
    <h1 class="text-3xl font-bold mb-6">Keranjang</h1>

    <div class="flex gap-10">

        <!-- LEFT: cart items -->
        <div class="flex-1 space-y-5">

            <!-- item -->
            <div class="flex items-center justify-between border border-teal-400 rounded-xl p-5">

                <div class="flex items-center gap-5">
                    <!-- checkbox -->
                    <input type="checkbox" class="w-5 h-5">

                    <!-- image -->
                    <img src="{{ asset('images/poppywar.jpg') }}" class="w-20 h-28 object-cover rounded">

                    <!-- info -->
                    <div>
                        <h2 class="text-xl font-semibold">The Poppy War</h2>
                        <p>Rp. 160.000</p>
                    </div>
                </div>

                <!-- right action -->
                <div class="flex flex-col items-end gap-3">

                    <!-- qty -->
                    <div class="flex border border-teal-400 rounded-lg overflow-hidden">
                        <button class="px-4 py-1">-</button>
                        <span class="px-6 py-1 border-x">1</span>
                        <button class="px-4 py-1">+</button>
                    </div>

                    <!-- delete -->
                    <button class="border border-teal-400 rounded-lg px-10 py-1 text-red-500">
                        🗑
                    </button>

                </div>
            </div>

            <!-- item -->
            <div class="flex items-center justify-between border border-teal-400 rounded-xl p-5">

                <div class="flex items-center gap-5">
                    <input type="checkbox" class="w-5 h-5">

                    <img src="{{ asset('images/demonslayer.jpg') }}" class="w-20 h-28 object-cover rounded">

                    <div>
                        <h2 class="text-xl font-semibold">Demon Slayer</h2>
                        <p>Rp. 38.000</p>
                    </div>
                </div>

                <div class="flex flex-col items-end gap-3">
                    <div class="flex border border-teal-400 rounded-lg overflow-hidden">
                        <button class="px-4 py-1">-</button>
                        <span class="px-6 py-1 border-x">1</span>
                        <button class="px-4 py-1">+</button>
                    </div>

                    <button class="border border-teal-400 rounded-lg px-10 py-1 text-red-500">
                        🗑
                    </button>
                </div>
            </div>

        </div>

        <!-- RIGHT: summary -->
        <div class="w-80 bg-gray-100 rounded-xl shadow p-5 h-fit sticky top-30">
            <h2 class="text-xl font-semibold mb-4">Ringkasan</h2>

            <div class="flex justify-between text-gray-700">
                <span>Total Harga (1 barang)</span>
                <span>Rp. 160.000</span>
            </div>

            <div class="flex justify-between text-gray-700 mb-3">
                <span>Diskon</span>
                <span>0</span>
            </div>

            <hr class="mb-3">

            <div class="flex justify-between font-semibold mb-4">
                <span>Ringkasan</span>
                <span>Rp. 160.000</span>
            </div>

            <button class="w-full bg-teal-500 text-white py-2 rounded-lg">
                Beli
            </button>
        </div>

    </div>
</div>
@endsection
