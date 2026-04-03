@extends('User.Layout.layout')

@section('content')
<div class="px-10 py-6">

    <!-- title -->
    <h1 class="text-3xl font-bold mb-6">Keranjang</h1>

    <div class="flex gap-10">

        <!-- LEFT: cart items -->
        <div class="flex-1 space-y-5">

            @foreach ($cart as $item)
            <!-- item -->
            <div class="flex items-center justify-between border border-teal-400 rounded-xl p-5 cart-item" data-row-id="{{ $item->rowId }}">
                <div class="flex items-center gap-5">
                    <!-- checkbox -->
                    <input type="checkbox" class="w-5 h-5 item-checkbox" data-price="{{ $item->price }}" data-row-id="{{ $item->rowId }}" data-qty="{{ $item->qty }}">

                    <!-- image -->
                    <img src="{{ asset('storage/' . $item->options->image) }}" class="w-20 h-28 object-cover rounded">

                    <!-- info -->
                    <div>
                        <h2 class="text-xl font-semibold">{{ $item->name}}</h2>
                        <p>Rp. {{ number_format($item->price, 0, ',', '.') }}/barang</p>
                        <p class="item-total-price text-lg font-semibold text-teal-600" data-row-id="{{ $item->rowId }}" data-price="{{ $item->price }}">Rp. {{ number_format($item->price * $item->qty, 0, ',', '.') }}</p>
                    </div>
                </div>

                <!-- right action -->
                <div class="flex flex-col items-end gap-3">

                    <!-- qty -->
                    <form class="w-full mx-auto">
                        <div class="relative flex items-center justify-center max-w-[8rem] mx-auto">
                            <button type="button" class="qty-decrement text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading focus:ring-4 focus:ring-neutral-tertiary font-medium leading-5 rounded-s-base text-sm px-3 focus:outline-none h-10" data-row-id="{{ $item->rowId }}">
                                <svg class="w-4 h-4 text-heading" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14"/></svg>
                            </button>
                            <input type="number" class="quantity-input border-x-0 h-10 placeholder:text-heading text-heading text-center w-full bg-neutral-secondary-medium border-default-medium py-2.5" data-row-id="{{ $item->rowId }}" value="{{ $item->qty }}" min="1" />
                            <button type="button" class="qty-increment text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading focus:ring-4 focus:ring-neutral-tertiary font-medium leading-5 rounded-e-base text-sm px-3 focus:outline-none h-10" data-row-id="{{ $item->rowId }}">
                                <svg class="w-4 h-4 text-heading" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5"/></svg>
                            </button>
                        </div>
                    </form>

                    <!-- delete -->
                    <form action="{{ route('cart.remove', $item->rowId) }}" method="POST">
                        @csrf
                        <button type="submit" class="border border-teal-400 rounded-lg px-10 py-1 bg-red-500 text-white hover:bg-red-600">🗑</button>
                    </form>

                </div>
            </div>
            @endforeach

        </div>

        <!-- RIGHT: summary -->
        <div class="w-80 bg-gray-100 rounded-xl shadow p-5 h-fit sticky top-30">
            <h2 class="text-xl font-semibold mb-4">Ringkasan</h2>

            <div class="flex justify-between text-gray-700">
                <span>Total Harga (<span id="total-items">0</span> barang)</span>
                <span id="total-price">Rp. 0</span>
            </div>

            <div class="flex justify-between text-gray-700 mb-3">
                <span>Diskon</span>
                <span>0</span>
            </div>

            <hr class="mb-3">

            <div class="flex justify-between font-semibold mb-4">
                <span>Total</span>
                <span id="final-price">Rp. 0</span>
            </div>

            <a href="{{ route('user.checkout') }}">
                <button class="w-full bg-teal-500 text-white py-2 rounded-lg hover:bg-teal-600">
                    Beli
                </button>
            </a>
        </div>

    </div>
</div>


@endsection
