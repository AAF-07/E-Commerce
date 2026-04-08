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
                    @if(auth()->user()->foto_profil)
                        <img src="{{ asset('storage/' . auth()->user()->foto_profil) }}" alt="Profile" class="w-full h-full object-cover">
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        	<rect width="24" height="24" fill="none" />
                        	<g fill="none" stroke="currentColor" stroke-dasharray="28" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                        		<path d="M4 21v-1c0 -3.31 2.69 -6 6 -6h4c3.31 0 6 2.69 6 6v1" stroke-dashoffset="0" />
                        		<path stroke-dashoffset="0" d="M12 11c-2.21 0 -4 -1.79 -4 -4c0 -2.21 1.79 -4 4 -4c2.21 0 4 1.79 4 4c0 2.21 -1.79 4 -4 4Z" />
                        	</g>
                        </svg>
                    @endif
                </div>
                <div>
                    <h2 class="font-semibold">{{ auth()->user()->name }}</h2>
                    <p class="text-gray-600 text-sm">{{ auth()->user()->email }}</p>
                </div>
            </div>

            <!-- menu -->
            <ul class="space-y-3">
                <li id="menu-biodata" onclick="showTab('biodata')" class="cursor-pointer">Biodata</li>
                <li id="menu-alamat" onclick="showTab('alamat')" class="cursor-pointer">Set Alamat</li>
                <li id="menu-notifikasi" onclick="showTab('notifikasi'); markRead()" class="cursor-pointer flex items-center gap-2">
                    Notifikasi
                    @if(auth()->user()->unreadNotifications->count() > 0)
                        <span id="notif-dot" class="w-2 h-2 bg-red-500 rounded-full"></span>
                    @endif
                </li>
                 <li class="cursor-pointer text-red-500">
                    <form action="{{ route('logout') }}" method="POST">
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
                        @if(auth()->user()->foto_profil)
                            <img src="{{ asset('storage/' . auth()->user()->foto_profil) }}" alt="Profile" class="w-full h-full object-cover">
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24">
                            	<rect width="24" height="24" fill="none" />
                            	<g fill="none" stroke="currentColor" stroke-dasharray="28" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                            		<path d="M4 21v-1c0 -3.31 2.69 -6 6 -6h4c3.31 0 6 2.69 6 6v1" stroke-dashoffset="0" />
                            		<path stroke-dashoffset="0" d="M12 11c-2.21 0 -4 -1.79 -4 -4c0 -2.21 1.79 -4 4 -4c2.21 0 4 1.79 4 4c0 2.21 -1.79 4 -4 4Z" />
                            	</g>
                            </svg>
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

                    <form action="{{ route('user.profile.delphoto') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded-lg text-sm hover:bg-red-600" onclick="return confirm('Hapus foto ini?')">
                            Hapus Foto
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
                        <p class="font-semibold">{{ auth()->user()->name }}</p>
                    </div>

                    <div>
                        <p class="text-gray-500 text-sm">Email</p>
                        <p class="font-semibold">{{ auth()->user()->email }}</p>
                    </div>

                    <div>
                        <p class="text-gray-500 text-sm">Nomor HP</p>
                        <p class="font-semibold text-gray-600">{{ auth()->user()->no_hp ?? 'Belum ada' }}</p>
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
                               value="{{ auth()->user()->name }}"
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
                               value="{{ auth()->user()->email }}"
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
                               value="{{ auth()->user()->no_hp }}"
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



                @if(auth()->user()->alamat)
                    <div class="border border-teal-400 rounded-xl p-4 flex justify-between items-center">
                        <div>
                            <p class="font-semibold">Alamat Utama</p>
                            <p class="text-sm text-gray-700">
                                {{ auth()->user()->alamat }}
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
                        + Tambah Alamat
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
                                  required>{{ auth()->user()->alamat }}</textarea>
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
            <div id="notifikasi" class="tab-content hidden bg-gray-100 rounded-xl shadow p-6">

                <div class="max-h-[400px] overflow-y-auto pr-2 space-y-4">
                    @forelse ($notify as $notif)
                        <div class="border {{ $notif->read_at ? 'border-gray-300 bg-white' : 'border-teal-400 bg-teal-50' }} rounded-lg p-4">
                            <div class="flex justify-between items-start">
                                @if ($notif->type == 'App\Notifications\OrderShipped')
                                    <p class="font-semibold">Pembayaran Diverifikasi</p>
                                @elseif ($notif->type == 'App\Notifications\StatusChange')
                                    <p class="font-semibold">Status Pesanan Berubah</p>
                                @else
                                    <p class="font-semibold">Notifikasi Baru</p>
                                @endif

                                <span class="text-xs text-gray-500">
                                    {{ $notif->created_at->diffForHumans() }}
                                </span>
                            </div>

                            <p class="text-sm text-gray-700">
                                {{ $notif->data['message'] }} - {{ $notif->data['order_code'] }}
                            </p>
                        </div>
                    @empty
                        <p class="text-center text-gray-500">Tidak ada notifikasi.</p>
                    @endforelse
                </div>

            </div>
        </div>

    </div>

</div>
<script>
    function markRead() {
    const dot = document.getElementById('notif-dot');
    if (dot) {
        fetch("{{ route('notifications.markRead') }}", {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}",
                'Content-Type': 'application/json'
            }
        }).then(response => {
            if (response.ok) {
                dot.remove();
            }
        });
    }
}
</script>
@endsection
