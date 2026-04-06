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
                <div class="w-14 h-14 rounded-full bg-gray-300 flex items-center justify-center overflow-hidden">
                    @if(auth('user')->user()->foto_profil)
                        <img src="{{ asset('storage/' . auth('user')->user()->foto_profil) }}" alt="Profile" class="w-full h-full object-cover">
                    @else
                        <span class="text-xl">👤</span>
                    @endif
                </div>
                <div>
                    <h2 class="font-semibold">{{ auth('user')->user()->name }}</h2>
                    <p class="text-gray-600 text-sm">{{ auth('user')->user()->email }}</p>
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
                    <div class="w-24 h-24 rounded-full bg-gray-300 flex items-center justify-center overflow-hidden">
                        @if(auth('user')->user()->foto_profil)
                            <img src="{{ asset('storage/' . auth('user')->user()->foto_profil) }}" alt="Profile" class="w-full h-full object-cover">
                        @else
                            <span class="text-3xl">👤</span>
                        @endif
                    </div>

                    <form id="photoForm" action="{{ route('user.profile.addphoto') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file"
                               name="foto_profil"
                               class="hidden"
                               id="photoInput"
                               accept="image/*"
                               onchange="document.getElementById('photoForm').submit()">
                        <button type="button"
                                onclick="document.getElementById('photoInput').click()"
                                class="bg-teal-500 text-white px-4 py-1 rounded-lg text-sm hover:bg-teal-600">
                            Pilih Foto
                        </button>
                    </form>

                    @if($errors->has('foto_profil'))
                        <p class="text-red-500 text-sm">{{ $errors->first('foto_profil') }}</p>
                    @endif
                </div>

                <!-- biodata -->
                <div class="space-y-4 flex-1">

                    <div>
                        <p class="text-gray-500 text-sm">Nama</p>
                        <p class="font-semibold">{{ auth('user')->user()->name }}</p>
                    </div>

                    <div>
                        <p class="text-gray-500 text-sm">Email</p>
                        <p class="font-semibold">{{ auth('user')->user()->email }}</p>
                    </div>

                    <div>
                        <p class="text-gray-500 text-sm">Nomor HP</p>
                        <p class="font-semibold text-gray-600">{{ auth('user')->user()->no_hp ?? 'Belum ada' }}</p>
                    </div>

                    <!-- Edit Profile Button -->
                    <button onclick="showTab('editProfile')" class="mt-4 px-4 py-2 bg-teal-500 text-white rounded-lg hover:bg-teal-600">
                        Edit Profile
                    </button>

                </div>

            </div>

            {{-- Edit Profile --}}
            <div id="editProfile" class="tab-content hidden bg-gray-100 rounded-xl shadow p-8 space-y-4">
                <h2 class="text-xl font-semibold mb-4">Edit Profile</h2>

                <form action="{{ route('user.profile.update') }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block text-sm font-semibold mb-2">Nama Lengkap</label>
                        <input type="text"
                               name="name"
                               value="{{ auth('user')->user()->name }}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500"
                               required>
                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold mb-2">Email</label>
                        <input type="email"
                               name="email"
                               value="{{ auth('user')->user()->email }}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500"
                               required>
                        @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold mb-2">Nomor HP</label>
                        <input type="tel"
                               name="no_hp"
                               value="{{ auth('user')->user()->no_hp }}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500"
                               placeholder="08xxxxxxxxxx">
                        @error('no_hp')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex gap-3">
                        <button type="submit" class="px-6 py-2 bg-teal-500 text-white rounded-lg hover:bg-teal-600">
                            Simpan Perubahan
                        </button>
                        <button type="button" onclick="showTab('biodata')" class="px-6 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">
                            Batal
                        </button>
                    </div>
                </form>
            </div>

            {{-- Alamat --}}
            <div id="alamat" class="tab-content hidden bg-gray-100 rounded-xl shadow p-8 space-y-6">



                @if(auth('user')->user()->alamat)
                    <div class="border border-teal-400 rounded-xl p-4 flex justify-between items-center">
                        <div>
                            <p class="font-semibold">Alamat Utama</p>
                            <p class="text-sm text-gray-700">
                                {{ auth('user')->user()->alamat }}
                            </p>
                        </div>

                        <div class="flex gap-2">
                            <button onclick="showTab('editAlamat')" class="bg-teal-400 px-4 py-1 rounded-lg font-semibold hover:bg-teal-500">
                                Ubah
                            </button>
                            <form action="{{ route('user.address.delete') }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-400 px-4 py-1 rounded-lg font-semibold hover:bg-red-500 text-white" onclick="return confirm('Hapus alamat ini?')">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <button onclick="showTab('tambahAlamat')" class="w-full bg-teal-400 text-black font-semibold py-3 rounded-xl hover:bg-teal-500 transition">
                        + Tambah Alamat Baru
                    </button>
                    <p class="text-gray-600">Belum ada alamat yang tersimpan</p>
                @endif

            </div>

            {{-- Tambah Alamat --}}
            <div id="tambahAlamat" class="tab-content hidden bg-gray-100 rounded-xl shadow p-8 space-y-4">
                <h2 class="text-xl font-semibold mb-4">Tambah Alamat Baru</h2>

                <form action="{{ route('user.address.add') }}" method="POST" class="space-y-4">
                    @csrf

                    <div>
                        <label class="block text-sm font-semibold mb-2">Alamat Lengkap</label>
                        <textarea name="alamat"
                                  rows="4"
                                  class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500"
                                  placeholder="Jl. Kulintang No. 29 B, Depok, Jawa Barat"
                                  required></textarea>
                        @error('alamat')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex gap-3">
                        <button type="submit" class="px-6 py-2 bg-teal-500 text-white rounded-lg hover:bg-teal-600">
                            Simpan Alamat
                        </button>
                        <button type="button" onclick="showTab('alamat')" class="px-6 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">
                            Kembali
                        </button>
                    </div>
                </form>
            </div>

            {{-- Edit Alamat --}}
            <div id="editAlamat" class="tab-content hidden bg-gray-100 rounded-xl shadow p-8 space-y-4">
                <h2 class="text-xl font-semibold mb-4">Edit Alamat</h2>

                <form action="{{ route('user.address.update') }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block text-sm font-semibold mb-2">Alamat Lengkap</label>
                        <textarea name="alamat"
                                  rows="4"
                                  class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500"
                                  required>{{ auth('user')->user()->alamat }}</textarea>
                        @error('alamat')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex gap-3">
                        <button type="submit" class="px-6 py-2 bg-teal-500 text-white rounded-lg hover:bg-teal-600">
                            Simpan Perubahan
                        </button>
                        <button type="button" onclick="showTab('alamat')" class="px-6 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">
                            Batal
                        </button>
                    </div>
                </form>
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
