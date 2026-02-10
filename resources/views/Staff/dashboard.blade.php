@include('Layout.layout')

@section("content")

    <main class="max-w-7xl mx-auto px-6 py-10">

    {{-- Welcome --}}
    <h1 class="text-3xl font-bold text-center mb-12">
        Welcome, Staff 1
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
                135 user
            </p>
        </div>

    </div>

    {{-- Produk --}}
    <h2 class="text-2xl font-bold mb-6">
        Produk
    </h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">

        {{-- Card --}}
        @php
            $products = [
                ['title'=>'Poppy War','price'=>'160.000','img'=>'poppy.jpg'],
                ['title'=>'Demon Slayer','price'=>'38.000','img'=>'demon.jpg'],
                ['title'=>"Komi Can’t Communicate",'price'=>'38.000','img'=>'komi.jpg'],
                ['title'=>'Blue Lock','price'=>'38.000','img'=>'bluelock.jpg'],
            ];
        @endphp

        @foreach($products as $p)
        <div class="border border-red-400 rounded-xl p-4 flex flex-col items-center text-center">
            <img src="{{ asset('storage/'.$p['img']) }}"
                 class="h-48 object-contain mb-4">

            <p class="font-semibold text-lg mb-1">
                {{ $p['title'] }}
            </p>

            <p class="mb-1">
                Rp. {{ $p['price'] }}
            </p>

            <p class="text-red-500 font-semibold">
                Stok : 0
            </p>
        </div>
        @endforeach

    </div>

</main>


