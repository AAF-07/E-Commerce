@extends('User.Layout.layout')

@section('content')
<div class="px-10 py-6">

    <div class="flex gap-10">

        <!-- gambar -->
        <div class="sticky top-24 self-start">
            <img src="{{ asset('storage/' . $product->gambar_produk) }}"
                 alt="{{ $product->nama_produk }}"
                 class="w-64 rounded shadow-md">
        </div>

        <!-- detail produk -->
        <div class="flex-1">

            <p class="text-gray-500 mb-1">
                {{ $product->penulis ?? 'Penulis tidak tersedia' }}
            </p>

            <h1 class="text-3xl font-bold mb-2 uppercase">
                {{ $product->nama_produk }}
            </h1>

            <p class="text-2xl font-semibold mb-4">
                Rp. {{ number_format($product->harga, 0, ',', '.') }}
            </p>

            <!-- aksi kecil -->
            <div class="flex items-center gap-4 mb-6 text-gray-600">
                <span>♡ Favorit</span>
                <span>🔗 Bagikan</span>
            </div>

            <!-- deskripsi -->
            <h2 class="font-semibold text-lg mb-2">Deskripsi</h2>
            <p class="text-gray-700 mb-6">
                {{ $product->deskripsi }}
            </p>

            <!-- detail tambahan -->
            <h2 class="font-semibold text-lg mb-2">Detail Buku</h2>

            <div class="grid grid-cols-2 gap-y-2 text-gray-700">
                <p>Penerbit</p>
                <p>{{ $product->penerbit ?? '-' }}</p>

                <p>Tanggal Terbit</p>
                <p>{{ $product->tanggal_terbit ?? '-' }}</p>

                <p>Bahasa</p>
                <p>{{ $product->bahasa ?? '-' }}</p>

            </div>

        </div>

        <!-- sidebar beli -->
        <div class="sticky top-24 w-80 border rounded-xl p-5 shadow-sm h-fit">

            <!-- qty -->
            <div class="flex items-center justify-between mb-4">
                <button class="px-3 py-1 border rounded">-</button>
                <span>1</span>
                <button class="px-3 py-1 border rounded">+</button>
            </div>

            <!-- tombol -->
            @if( auth('user')->check() )
            <a href="/cart" class="w-full m-2 mb-3 px-6 py-2 border border-teal-500 text-teal-500 rounded-lg hover:bg-teal-50">
                Keranjang
            </a>

            <a href="/checkout" class="w-full px-4 py-2 bg-teal-500 text-white rounded-lg hover:bg-teal-600">
                Beli langsung
            </a>
            @else
            <a href="/login" class="w-full m-2 mb-3 px-6 py-2 border border-teal-500 text-teal-500 rounded-lg hover:bg-teal-50">
                Keranjang
            </a>

            <a href="/login" class="w-full px-4 py-2 bg-teal-500 text-white rounded-lg hover:bg-teal-600">
                Beli langsung
            </a>
            @endif

        </div>

    </div>

    <h2 class="font-bold text-lg text-center mt-16 mb-0">Produk Lainnya</h2>

    <!-- produk lain -->
    <div class="mt-16">
        <div class="grid grid-cols-5 gap-6">

            @foreach($relatedProducts as $item)
            <div>
                <img src="{{ asset('storage/' . $item->gambar_produk) }}"
                     class="w-64 object-cover rounded">

                <p class="mt-2 font-medium">
                    {{ $item->nama_produk }}
                </p>

                <p class="text-gray-600">
                    Rp. {{ number_format($item->harga, 0, ',', '.') }}
                </p>
            </div>
            @endforeach

        </div>
    </div>

</div>
@endsection
