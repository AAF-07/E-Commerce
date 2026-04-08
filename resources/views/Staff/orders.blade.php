@include('Layout.layout')
<nav class="flex gap-6 font-semibold items-center justify-center py-4">
    <a href="/staff/dashboard"
       class="hover:text-teal-500 ">
        Home
    </a>
    <a href="/staff/products" class="hover:text-teal-500">
        Product
    </a>
    <a href="/staff/orders" class=" border-b-2 border-teal-500 pb-1">
        Orders
    </a>
</nav>
@section("content")
<div class="max-w-5xl mx-auto px-6 py-6">

    <!-- Filter -->
    <div class="mb-6">
        <button class="flex items-center gap-2 font-semibold text-lg">
            Semua
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
        </button>
    </div>

    <div class="space-y-6">
        @foreach ($orders as $order)
            <div class="flex items-center justify-between border border-teal-400 rounded-xl p-6 bg-gray-50">

                <div class="flex items-center gap-4">

                    <!-- ID -->
                    <div class="text-gray-700 font-medium w-10">
                        {{ str_pad($order->id, 3, '0', STR_PAD_LEFT) }}
                    </div>

                    <!-- gambar (stack kalau banyak produk) -->
                    <div class="flex -space-x-3">
                        @foreach ($order->items as $item)
                            <img src="{{ asset('storage/' . $item->produk->gambar_produk) }}"
                                 class="w-14 h-20 object-cover rounded shadow">
                        @endforeach
                    </div>

                </div>

                <!-- tengah -->
                <div class="flex-1 px-6">

                    <!-- list produk -->
                    @forelse ($order->items as $item)
                        <h2 class="font-semibold text-lg">
                            {{ $item->produk->nama_produk }}
                        </h2>
                    @empty
                        <p class="text-gray-600">Tidak ada produk</p>
                    @endforelse
                    <!-- total -->
                    <p class="text-gray-600">
                        Rp. {{ number_format($order->total_amount, 0, ',', '.') }}
                    </p>

                    <!-- info -->
                    <div class="text-sm text-gray-700 mt-2">
                        <p>Alamat : {{ $order->alamat }}</p>
                        <p>User : {{ $order->user->name }}</p>
                        <p>Pembayaran : {{ $order->payment_method }}</p>
                    </div>
                </div>

                <div>

                    <button id="dropdownDelayButton" data-dropdown-toggle="dropdownDelay-{{ $order->id }}" data-dropdown-delay="500" data-dropdown-trigger="click" class="inline-flex items-center justify-center text-white bg-brand box-border border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none" type="button">
                      {{ $order->status }}
                      <svg class="w-4 h-4 ms-1.5 -me-0.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/></svg>
                    </button>

                    <!-- Dropdown menu -->
                    <form action="{{ route('staff.orders.update', $order->id) }}" method="POST">
                        @csrf
                        <div id="dropdownDelay-{{ $order->id }}" class="z-10 hidden bg-gray border border-default-medium rounded-base shadow-lg w-44">
                            <ul class="p-2 text-sm text-body font-medium" aria-labelledby="dropdownDelayButton">
                                <li>
                                    <button name="status" value="paid" class="w-full text-left p-2 hover:bg-gray-200">
                                        Dibayar
                                    </button>
                                </li>

                                <li>
                                    <button name="status" value="pending" class="w-full text-left p-2 hover:bg-gray-200">
                                        Pending
                                    </button>
                                </li>

                                <li>
                                    <button name="status" value="failed" class="w-full text-left p-2 hover:bg-gray-200">
                                        Gagal
                                    </button>
                                </li>

                                <li>
                                    <button name="status" value="cancelled" class="w-full text-left p-2 hover:bg-gray-200">
                                        Dibatalkan
                                    </button>
                                </li>

                                <li>
                                    <button name="status" value="shipped" class="w-full text-left p-2 hover:bg-gray-200">
                                        Dikirim
                                    </button>
                                </li>

                                <li>
                                    <button name="status" value="delivered" class="w-full text-left p-2 hover:bg-gray-200">
                                        Selesai
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </form>


                </div>
            </div>
        @endforeach


    </div>
</div>




