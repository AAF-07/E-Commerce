@extends('User.Layout.layout')

@section('content')
<div class="flex gap-6">
    <div class="grid pl-10 sticky">
        <img src="{{ asset('storage/' . $product->gambar_produk) }}" alt="{{ $product->nama_produk }}"
            class="w-201 rounded shadow-md">
    </div>
    <div>
        <h1 class="text-3xl font-bold mb-4">
            {{ $product->nama_produk }}
        </h1>
        <p class="text-gray-600 text-xl mb-6">
            Rp. {{ number_format($product->harga, 0, ',', '.') }}
        </p>
        <p class="text-gray-700 mb-6">
            {{ $product->deskripsi }}
        </p>
        <p class="text-gray-700 mb-6">
            Stok : {{ $product->stok }}
        </p>
    </div>

    <div>
        <button class="px-6 py-3 bg-teal-500 text-white rounded-lg hover:bg-teal-600 transition duration-300">
            Tambah ke Keranjang
        </button>
    </div>
</div>

@endsection
