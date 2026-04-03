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
    <form class="w-full mx-auto mb-6">
        <label for="quantity-input" class="block mb-2.5 text-sm font-medium text-heading">Banyak barang:</label>
        <div class="relative flex items-center justify-center max-w mx-auto">
            <button type="button" id="decrement-button" data-input-counter-decrement="quantity-input" class="text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading focus:ring-4 focus:ring-neutral-tertiary font-medium leading-5 rounded-s-base text-sm px-3 focus:outline-none h-10">
                <svg class="w-4 h-4 text-heading" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14"/></svg>
            </button>
            <input type="text" id="quantity-input" data-input-counter data-input-counter-min="1" data-input-counter-max="50" aria-describedby="helper-text-explanation" class="border-x-0 h-10 placeholder:text-heading text-heading text-center w-full bg-neutral-secondary-medium border-default-medium py-2.5 placeholder:text-body" placeholder="999" value="1" required />
            <button type="button" id="increment-button" data-input-counter-increment="quantity-input" class="text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading focus:ring-4 focus:ring-neutral-tertiary font-medium leading-5 rounded-e-base text-sm px-3 focus:outline-none h-10">
                <svg class="w-4 h-4 text-heading" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5"/></svg>
            </button>
        </div>
    </form>

    <!-- tombol -->
    @if( auth('user')->check() )
    <form action="{{ route('cart.add') }}" method="POST" class="space-y-3">
        @csrf
        <input type="hidden" name="id" value="{{ $product->id }}">
        <input type="hidden" name="name" value="{{ $product->nama_produk }}">
        <input type="hidden" name="price" value="{{ $product->harga }}">
        <input type="hidden" name="quantity" id="quantity-form" value="1">

        <button type="submit" class="w-full mb-3 px-4 py-2 border border-teal-500 text-teal-500 rounded-lg hover:bg-teal-50">
            Keranjang
        </button>
    </form>

    <a href="/checkout" class="w-full px-4 py-2 bg-teal-500 text-white rounded-lg hover:bg-teal-600 block text-center">
        Beli langsung
    </a>
    @else
    <a href="/login" class="w-full mb-3 px-4 py-2 border border-teal-500 text-teal-500 rounded-lg hover:bg-teal-50 block text-center">
        Keranjang
    </a>

    <a href="/login" class="w-full px-4 py-2 bg-teal-500 text-white rounded-lg hover:bg-teal-600 block text-center">
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
