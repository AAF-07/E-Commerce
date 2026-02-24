@extends('User.Layout.layout')

@section('content')
<div class="flex gap-6 py-4">
    {{-- filter --}}
    <div>
        <div class="shadow border rounded-lg w-40 px-4 py-2 bg-[#FAF5F5] gap-4 mb-6">
            <h1 class="text-lg font-semibold">Filter</h1>
            <ul>
                <li><h2>Best Seller</h2></li>
                <li><h2>Akan Datang</h2></li>
                <li><h2>Terfavorit</h2></li>
            </ul>

        </div>

        <div class="shadow border rounded-lg w-40 px-4 py-2 bg-[#FAF5F5] gap-4 mb-6">
            <h1 class="text-lg font-bold">Kategori</h1>
            <h2 class="text-m font-semibold">Jenis Buku</h2>
            <ol>
                @foreach($bookstype as $type)
                <li><a href="{{ route('user.products.category', $type->id) }}">{{ $type->nama }}</a></li>
                @endforeach
            </ol>
            <br>
            <h2 class="text-m font-semibold">Genre</h2>
            <ul>
                @foreach($categories as $category)
                <li><a href="{{ route('user.products.category', $category->id) }}">{{ $category->nama }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>

    {{-- produk --}}
    <div class="grid grid-cols-2 md:grid-cols-5 gap-8 mb-14">
        @foreach($products as $product)
        <a href="{{ route('user.product', $product->id) }}" class="group">
            <img src="{{ asset('storage/' . $product->gambar_produk) }}"
                 class="w-full aspect-[5/8] rounded shadow-md group-hover:scale-105 transition duration-300">
            <h3 class="mt-3 font-semibold">
                {{ $product->nama_produk }}
            </h3>
            <p class="text-gray-600">
                Rp. {{ number_format($product->harga, 0, ',', '.') }}
            </p>
        </a>
        @endforeach
    </div>
</div>
@endsection
