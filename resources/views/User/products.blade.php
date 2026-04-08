@extends('User.Layout.layout')

@section('content')
<div class="flex gap-6 py-4">
    {{-- filter --}}
    <div class="sticky top-24" >
        <div class=" shadow border rounded-lg w-40 px-4 py-2 bg-[#FAF5F5] gap-4 mb-6">
            <h1 class="text-lg font-semibold">Filter</h1>
            <ul>
                    <li><a href="{{ route('user.products.bestseller') }}">Best Seller</a></li>

                    <li><a href="{{ route('user.products.newest') }}">Terbaru</a></li>
            </ul>

        </div>

        <div class=" shadow border rounded-lg w-40 px-4 py-2 bg-[#FAF5F5] gap-4 mb-6">
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
        @if (isset($seachQuery))
        <div class="mb-6 p-4 bg-blue-50 border border-blue-200 rounded-lg">
                <p class="text-gray-700">
                    Hasil pencarian untuk: <span class="font-semibold text-blue-600">"{{ $searchQuery }}"</span>
                    <span class="text-gray-500">({{ count($products) }} produk ditemukan)</span>
                </p>
            </div>
        @endif

        @forelse($products as $product)
            <div>
                <a href="{{ route('user.product', $product->id) }}" class="group">
                    <img src="{{ asset('storage/' . $product->gambar_produk) }}"
                         alt="{{ $product->nama_produk }}"
                         class="w-full aspect-[5/8] rounded shadow-md group-hover:scale-105 transition duration-300">
                    <h3 class="mt-3 font-semibold text-sm line-clamp-2">
                        {{ $product->nama_produk }}
                    </h3>
                    <p class="text-gray-600 text-sm">
                        Rp. {{ number_format($product->harga, 0, ',', '.') }}
                    </p>
                </a>
            </div>
        @empty
            <div class="text-center py-12">
                <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <h3 class="text-xl font-semibold text-gray-600 mb-2">Produk tidak ditemukan</h3>
                <p class="text-gray-500 mb-4">
                    @if(isset($searchQuery))
                        Tidak ada produk yang sesuai dengan pencarian "{{ $searchQuery }}"
                    @else
                        Tidak ada produk tersedia
                    @endif
                </p>
                <a href="{{ route('home') }}" class="inline-block px-6 py-2 bg-teal-500 text-white rounded-lg hover:bg-teal-600 transition">
                    Kembali ke Beranda
                </a>
            </div>
        @endforelse
    </div>
</div>
@endsection
