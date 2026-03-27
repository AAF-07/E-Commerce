@extends('User.Layout.layout')

@section('content')
<div class="px-10 py-6" >

    <!-- title -->
    <h1 class="text-3xl font-bold mb-6 sticky">Pesanan</h1>

    <div class="flex gap-8">

        <!-- sidebar -->
        <div class="w-64 bg-gray-100 rounded-xl shadow p-5 h-fit sticky top-24">
            <h2 class="font-semibold text-lg mb-4">Sort</h2>
            <ul class="space-y-2 text-gray-600">
                <li class="hover:text-black cursor-pointer">A-Z</li>
                <li class="hover:text-black cursor-pointer">Z-A</li>
                <li class="hover:text-black cursor-pointer">Tunggu Konfirmasi</li>
                <li class="hover:text-black cursor-pointer">Dikonfirmasi</li>
                <li class="hover:text-black cursor-pointer">Dikirim</li>
                <li class="hover:text-black cursor-pointer">Sudah Sampai</li>
            </ul>
        </div>

        <!-- content -->
        <div class="flex-1 space-y-5">

            <p class="font-semibold">Pembayaran akan dikonfirmasi dalam 1x24jam</p>

            <!-- card 1 -->
            <div class="flex items-center justify-between border border-teal-400 rounded-xl p-5">
                <div class="flex gap-5 items-center">
                    <img src="{{ asset('images/bluelock.jpg') }}" class="w-20 h-28 object-cover rounded">
                    <div>
                        <h2 class="text-xl font-semibold">Blue Lock</h2>
                        <p>Rp. 38.000</p>
                        <p class="text-gray-600">Status : Tunggu Konfirmasi</p>
                    </div>
                </div>

                <div class="flex gap-3">
                    <button class="px-5 py-2 border border-red-400 text-red-400 rounded-lg hover:bg-red-50">
                        Batalkan
                    </button>
                    <button class="px-5 py-2 bg-teal-500 text-white rounded-lg">
                        Detail Pesanan
                    </button>
                </div>
            </div>

            <!-- card 2 -->
            <div class="flex items-center justify-between border border-teal-400 rounded-xl p-5">
                <div class="flex gap-5 items-center">
                    <img src="{{ asset('images/demonslayer.jpg') }}" class="w-20 h-28 object-cover rounded">
                    <div>
                        <h2 class="text-xl font-semibold">Demon Slayer</h2>
                        <p>Rp. 38.000</p>
                        <p class="text-gray-600">Status : Sudah sampai</p>
                    </div>
                </div>

                <button class="px-5 py-2 bg-teal-500 text-white rounded-lg">
                    Detail Pesanan
                </button>
            </div>

            <!-- card 3 -->
            <div class="flex items-center justify-between border border-teal-400 rounded-xl p-5">
                <div class="flex gap-5 items-center">
                    <img src="{{ asset('images/poppywar.jpg') }}" class="w-20 h-28 object-cover rounded">
                    <div>
                        <h2 class="text-xl font-semibold">The Poppy War</h2>
                        <p>Rp. 160.000</p>
                        <p class="text-gray-600">Status : Dikirim</p>
                    </div>
                </div>

                <button class="px-5 py-2 bg-teal-500 text-white rounded-lg">
                    Detail Pesanan
                </button>
            </div>

        </div>
    </div>
</div>
@endsection

