@extends('User.Layout.layout')

@section('content')
    <nav class="flex gap-6 font-semibold items-center justify-center py-4">
        <div class="max-w-7xl mx-auto px-6 py-3 flex gap-10 font-semibold">
            <a href="/" class="hover:text-teal-600 border-b-2 border-teal-600 pb-1">
                Home
            </a>

            <a href="/product" class="hover:text-teal-600">
                Product
            </a>
        </div>
    </nav>

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

    <!-- SECTION FUNCTION -->
    @php
        $books = [
            ['title' => 'Poppy War', 'price' => '160.000', 'image' => 'poppy.jpg'],
            ['title' => 'Demon Slayer', 'price' => '38.000', 'image' => 'demon.jpg'],
            ['title' => 'Komi Can’t Communicate', 'price' => '38.000', 'image' => 'komi.jpg'],
            ['title' => 'Blue Lock', 'price' => '38.000', 'image' => 'bluelock.jpg'],
            ['title' => 'The Magic Library', 'price' => '69.000', 'image' => 'magic.jpg'],
        ];
    @endphp


    <!-- BEST SELLER -->
    <h2 class="text-2xl font-bold mb-6">Best Seller</h2>

    <div class="grid grid-cols-2 md:grid-cols-5 gap-8 mb-14">
        @foreach($books as $book)
        <div class="group">
            <img src="{{ asset('images/' . $book['image']) }}"
                 class="rounded shadow-md group-hover:scale-105 transition duration-300">
            <h3 class="mt-3 font-semibold">
                {{ $book['title'] }}
            </h3>
            <p class="text-gray-600">
                Rp. {{ $book['price'] }}
            </p>
        </div>
        @endforeach
    </div>


    <!-- NEW -->
    <h2 class="text-2xl font-bold mb-6">New</h2>

    <div class="grid grid-cols-2 md:grid-cols-5 gap-8 mb-14">
        @foreach($books as $book)
        <div class="group">
            <img src="{{ asset('images/' . $book['image']) }}"
                 class="rounded shadow-md group-hover:scale-105 transition duration-300">
            <h3 class="mt-3 font-semibold">
                {{ $book['title'] }}
            </h3>
            <p class="text-gray-600">
                Rp. {{ $book['price'] }}
            </p>
        </div>
        @endforeach
    </div>


    <!-- KOMIK -->
    <h2 class="text-2xl font-bold mb-6">Komik</h2>

    <div class="grid grid-cols-2 md:grid-cols-5 gap-8 mb-14">
        @foreach($books as $book)
        <div class="group">
            <img src="{{ asset('images/' . $book['image']) }}"
                 class="rounded shadow-md group-hover:scale-105 transition duration-300">
            <h3 class="mt-3 font-semibold">
                {{ $book['title'] }}
            </h3>
            <p class="text-gray-600">
                Rp. {{ $book['price'] }}
            </p>
        </div>
        @endforeach
    </div>


    <!-- NOVEL -->
    <h2 class="text-2xl font-bold mb-6">Novel</h2>

    <div class="grid grid-cols-2 md:grid-cols-5 gap-8">
        @foreach($books as $book)
        <div class="group">
            <img src="{{ asset('images/' . $book['image']) }}"
                 class="rounded shadow-md group-hover:scale-105 transition duration-300">
            <h3 class="mt-3 font-semibold">
                {{ $book['title'] }}
            </h3>
            <p class="text-gray-600">
                Rp. {{ $book['price'] }}
            </p>
        </div>
        @endforeach
    </div>

</div>
@endsection


