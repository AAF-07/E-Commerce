@extends('User.Layout.layout')

@section('content')


<div class="max-w-7xl mx-auto px-6 py-10">

    <!-- HERO SECTION -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-14">

    <!-- Main Hero (lebih besar) -->
    <div class="md:col-span-2">
        <img src="{{ asset('image/hero.png') }}"
             alt="main-hero"
             class="w-full h-full rounded-2xl shadow-lg">
    </div>

    <!-- Side Hero -->
    <div class="flex flex-col gap-6">
        <img src="{{ asset('image/hero 1.png') }}"
             alt="hero-1"
             class="w-full h-full object-cover rounded-2xl shadow-md">

        <img src="{{ asset('image/Hero2.png') }}"
             alt="hero-2"
             class="w-full h-full object-cover rounded-2xl shadow-md">
    </div>

</div>


    <!-- BEST SELLER -->
    <h2 class="text-2xl font-bold mb-6">Best Seller</h2>

    <div class="grid grid-cols-2 md:grid-cols-5 gap-8 mb-14">
        @foreach($products as $product)
        <div class="group">
            <img src="{{ asset('storage/' . $product->gambar_produk) }}"
                 class="w-full aspect-[5/8] rounded shadow-md group-hover:scale-105 transition duration-300">
            <h3 class="mt-3 font-semibold">
                {{ $product->nama_produk }}
            </h3>
            <p class="text-gray-600">
                Rp. {{ number_format($product->harga, 0, ',', '.') }}
            </p>
        </div>
        @endforeach
    </div>


    <!-- NEW -->
    <h2 class="text-2xl font-bold mb-6">New</h2>

    <div class="grid grid-cols-2 md:grid-cols-5 gap-8 mb-14">
        @foreach($latestproducts as $product)
        <div class="group">
            <img src="{{ asset('storage/' . $product->gambar_produk) }}"
                 class="w-full aspect-[5/8] rounded shadow-md group-hover:scale-105 transition duration-300">
            <h3 class="mt-3 font-semibold">
                {{ $product->nama_produk }}
            </h3>
            <p class="text-gray-600">
                Rp. {{ number_format($product->harga, 0, ',', '.') }}
            </p>
        </div>
        @endforeach
    </div>


    <!-- KOMIK -->
    <h2 class="text-2xl font-bold mb-6">Komik</h2>

    <div class="grid grid-cols-2 md:grid-cols-5 gap-8 mb-14">
        @foreach($komikproducts as $product)
        <div class="group">
            <img src="{{ asset('storage/' . $product->gambar_produk) }}"
                 class="w-full aspect-[5/8] rounded shadow-md group-hover:scale-105 transition duration-300">
            <h3 class="mt-3 font-semibold">
                {{ $product->nama_produk }}
            </h3>
            <p class="text-gray-600">
                Rp. {{ number_format($product->harga, 0, ',', '.') }}
            </p>
        </div>
        @endforeach
    </div>


    <!-- NOVEL -->
    <h2 class="text-2xl font-bold mb-6">Novel</h2>

    <div class="grid grid-cols-2 md:grid-cols-5 gap-8">
        @foreach($novelproducts as $product)
        <div class="group">
            <img src="{{ asset('storage/' . $product->gambar_produk) }}"
                 class="w-full aspect-[5/8] rounded shadow-md group-hover:scale-105 transition duration-300">
            <h3 class="mt-3 font-semibold">
                {{ $product->nama_produk }}
            </h3>
            <p class="text-gray-600">
                Rp. {{ number_format($product->harga, 0, ',', '.') }}
            </p>
        </div>
        @endforeach
    </div>

</div>
@endsection


