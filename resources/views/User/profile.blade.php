@extends('User.Layout.layout')

@section('content')
<div class="px-10 py-6">

    <!-- title -->
    <h1 class="text-3xl font-bold mb-6">Profile</h1>

    <div class="flex gap-10">

        <!-- LEFT SIDEBAR -->
        <div class="w-72">

            <!-- user info -->
            <div class="flex items-center gap-4 mb-6">
                <div class="w-14 h-14 rounded-full bg-gray-300 flex items-center justify-center">
                    <span class="text-xl">👤</span>
                </div>
                <div>
                    <h2 class="font-semibold">Abdul</h2>
                    <p class="text-gray-600 text-sm">abdul98@gmail.com</p>
                </div>
            </div>

            <!-- menu -->
            <ul class="space-y-3">
                <li onclick="showTab('biodata')" class="font-semibold underline cursor-pointer">Biodata</li>
                <li onclick="showTab('alamat')" class="cursor-pointer">Set Alamat</li>
                <li onclick="showTab('notifikasi')" class="cursor-pointer flex items-center gap-2">
                    Notifikasi
                    <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                </li>
                <li class="cursor-pointer text-red-500">
                    <form action="{{ route('user.logout') }}" method="POST">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                </li>
            </ul>

        </div>

        <!-- divider -->
        <div class="w-px bg-gray-300"></div>

        <!-- RIGHT CONTENT -->
        <div class="flex-1">
            {{-- biodata --}}
            <div id="biodata" class="tab-content bg-gray-100 rounded-xl shadow p-8 flex gap-10 items-start">

                <!-- foto -->
                <div class="flex flex-col items-center gap-3">
                    <div class="w-24 h-24 rounded-full bg-gray-300 flex items-center justify-center">
                        <span class="text-3xl">👤</span>
                    </div>

                    <button class="bg-teal-500 text-white px-4 py-1 rounded-lg text-sm">
                        Pilih Foto
                    </button>
                </div>

                <!-- biodata -->
                <div class="space-y-4">

                    <div>
                        <p class="text-gray-500">Nama</p>
                        <p class="font-semibold">{{ auth('user')->user()->name }}</p>
                    </div>

                    <div>
                        <p class="text-gray-500">Email</p>
                        <p class="font-semibold">{{ auth('user')->user()->email }}</p>
                    </div>

                    <div>
                        <p class="text-gray-500">Nomor HP</p>
                        <p class="font-semibold text-gray-600">{{ auth('user')->user()->no_hp ?? 'Belum ada' }}</p>
                    </div>

                </div>

            </div>

            {{-- Alamat --}}
            <div id="alamat" class="tab-content hidden bg-gray-100 rounded-xl shadow p-8 space-y-6">

                <button class="w-full bg-teal-400 text-black font-semibold py-3 rounded-xl">
                    Tambah Alamat
                </button>

                <div class="border border-teal-400 rounded-xl p-4 flex justify-between items-center">
                    <div>
                        <p class="font-semibold">Rumah</p>
                        <p class="text-sm text-gray-700">
                            JL. Kulintang No. 29 B, Depok, Jawa Barat
                        </p>
                    </div>

                    <button class="bg-teal-400 px-4 py-1 rounded-lg font-semibold">
                        Ubah
                    </button>
                </div>

            </div>

             {{-- Notifikasi --}}
            <div id="notifikasi" class="tab-content hidden bg-gray-100 rounded-xl shadow p-8 space-y-4">
                
                <div class="border border-teal-400 rounded-lg p-4">
                    <p class="font-semibold">Pembayaran Diverifikasi</p>
                    <p class="text-sm text-gray-700">
                        Pembayaran untuk pesanan dengan nomor order 002 telah diverifikasi
                    </p>
                </div>

                <div class="border border-teal-400 rounded-lg p-4">
                    <p class="font-semibold">Pesanan Sampai</p>
                    <p class="text-sm text-gray-700">
                        Pesanan dengan nomor order 001 telah sampai
                    </p>
                </div>

            </div>
        </div>

    </div>

</div>
@endsection
