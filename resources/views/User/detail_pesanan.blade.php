@extends('User.Layout.layout')

@section('content')
<div class="px-10 py-6">

    <!-- title -->
    <h1 class="text-3xl font-bold mb-6">Detail Pesanan</h1>

    <div class="border border-teal-400 rounded-xl p-8">

        <div class="flex gap-10 items-start">

            <!-- LEFT: image + product -->
            <div>
                <img src="{{ asset('images/poppywar.jpg') }}"
                     class="w-48 h-72 object-cover rounded mb-4">

                <h2 class="text-xl font-semibold">The Poppy War</h2>
                <p>Rp. 160.000</p>
            </div>

            <!-- MIDDLE: info -->
            <div class="flex flex-col gap-3">
                <div>
                    <p class="text-gray-500">Status</p>
                    <p class="font-semibold">Dikirim</p>
                </div>

                <div>
                    <p class="text-gray-500">Pengiriman</p>
                    <p class="font-semibold">JNT</p>
                </div>

                <div>
                    <p class="text-gray-500">Tanggal pembelian</p>
                    <p class="font-semibold">22 Jan 2026</p>
                </div>

                <div>
                    <p class="text-gray-500">Estimasi tiba</p>
                    <p class="font-semibold">25 Jan 2026</p>
                </div>

                <div>
                    <p class="text-gray-500">Pembayaran</p>
                    <p class="font-semibold">QRIS</p>
                </div>
            </div>

            <!-- divider -->
            <div class="w-px bg-gray-300 h-64"></div>

            <!-- RIGHT: alamat -->
            <div class="flex flex-col gap-5">
                <div>
                    <p class="text-gray-500">Alamat</p>
                    <p class="font-semibold">Jl. Raden Sanim</p>
                </div>

                <div>
                    <p class="text-gray-500">No. Pesanan</p>
                    <p class="font-semibold">001</p>
                </div>
            </div>

        </div>

        <!-- button -->
        <div class="mt-8">
            <button class="border border-red-400 text-red-400 px-6 py-2 rounded-lg">
                Laporkan
            </button>
        </div>

    </div>

</div>
@endsection
