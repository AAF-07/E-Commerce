@include('Layout.layout')
<nav class="flex gap-6 font-semibold items-center justify-center py-4">
    <a href="/staff/dashboard"
       class="border-b-2 border-teal-500 pb-1">
        Home
    </a>
    <a href="/staff/products" class="hover:text-teal-500">
        Product
    </a>
    <a href="/staff/orders" class="hover:text-teal-500">
        Orders
    </a>
</nav>
@section("content")

    <main class="max-w-7xl mx-auto px-6 py-10">

    {{-- Welcome --}}
    <h1 class="text-3xl font-bold text-center mb-12">
        Welcome, {{ auth()->guard('staff')->user()->username }}
    </h1>

    {{-- Stats --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-14">

        {{-- Pendapatan --}}
        <div class="border border-teal-400 rounded-xl p-6">
            <p class="text-lg">Pendapatan</p>
            <p class="text-2xl font-bold mt-2">
                Rp. 4.300.000
            </p>
        </div>

        {{-- Pengguna --}}
        <div class="border border-teal-400 rounded-xl p-6">
            <p class="text-lg">Pengguna</p>
            <p class="text-2xl font-bold mt-2">
                {{ $totalusers }} user
            </p>
        </div>

    </div>

    {{-- Produk --}}
    <h2 class="text-2xl font-bold mb-6">
        Produk
    </h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">

        {{-- Card --}}
        @foreach($products as $p)
        <div class="border {{ $p['stok'] == 0 ? 'border-red-400' : 'border-teal-500' }} rounded-xl p-4 flex flex-col items-center text-center">
            <img src="{{ asset('storage/'.$p['gambar_produk']) }}"
                 class="h-48 object-contain mb-4">

            <p class="font-semibold text-lg mb-1">
                {{ $p['nama_produk'] }}
            </p>

            <p class="mb-1">
                Rp. {{ number_format($p['harga'], 0, ',', '.') }}
            </p>

            <p class="text-red-500 font-semibold">
                Stok : {{ $p['stok'] }}
            </p>
        </div>
        @endforeach

    </div>

</main>


