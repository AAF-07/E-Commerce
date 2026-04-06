@extends('User.Layout.layout')

@section('content')
<div class="px-10 py-6">

    <!-- title -->
    <h1 class="text-3xl font-bold mb-6">Detail Pesanan</h1>

    <div class="border border-teal-400 rounded-xl p-8">

        <div class="flex gap-10 items-start">

            <!-- LEFT: image + product -->
            <div>
                @foreach($order->items as $item)
                <img src="{{ asset('storage/' . $item->produk->gambar_produk) }}"
                     class="w-48 h-72 object-cover rounded mb-4">

                <h2 class="text-xl font-semibold">{{ $item->produk->nama_produk }}</h2>
                <p>Rp. {{ number_format($item->produk->harga, 0, ',', '.') }}</p>
                @endforeach
            </div>

            <!-- MIDDLE: info -->
            <div class="flex flex-col gap-3">
                <div>
                    <p class="text-gray-500">Status</p>
                    <p class="font-semibold">{{ $order->status }}</p>
                </div>

                <div>
                    <p class="text-gray-500">Pengiriman</p>
                    <p class="font-semibold">{{ $order->pengiriman }}</p>
                </div>

                <div>
                    <p class="text-gray-500">Tanggal pembelian</p>
                    <p class="font-semibold">{{ $order->created_at->format('d M Y') }}</p>
                </div>

                <div>
                    <p class="text-gray-500">Estimasi tiba</p>
                    <p class="font-semibold">{{ $order->created_at->addDays(5)->format('d M Y') }}</p>
                </div>

                <div>
                    <p class="text-gray-500">Pembayaran</p>
                    <p class="font-semibold">{{ $order->payment_method }}</p>
                </div>
            </div>

            <!-- divider -->
            <div class="w-px bg-gray-300 h-64"></div>

            <!-- RIGHT: alamat -->
            <div class="flex flex-col gap-5">
                <div>
                    <p class="text-gray-500">Alamat</p>
                    <p class="font-semibold">{{ $order->alamat }}</p>
                </div>

                <div>
                    <p class="text-gray-500">No. Pesanan</p>
                    <p class="font-semibold">{{ $order->order_code }}</p>
                </div>
            </div>

        </div>

        <!-- Modal toggle -->
        <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class="text-red bg-white box-border border border-red hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none" type="button">
         Laporkan Masalah
        </button>

        <!-- Main modal -->
        <div id="authentication-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-neutral-primary-soft border border-default rounded-base shadow-sm p-4 md:p-6">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between border-b border-default pb-4 md:pb-5">
                        <h3 class="text-lg font-medium text-heading">
                            Buat Laporan
                        </h3>
                        <button type="button" class="text-body bg-transparent hover:bg-neutral-tertiary hover:text-heading rounded-base text-sm w-9 h-9 ms-auto inline-flex justify-center items-center" data-modal-hide="authentication-modal">
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6"/></svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form action="#" class="pt-4 md:pt-6">
                        <div class="mb-4">
                            <label for="laporan" class="block mb-2.5 text-sm font-medium text-heading">Laporan</label>
                            <textarea id="laporan" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body" placeholder="Laporkan masalah" required></textarea>
                        </div>

                        <button type="submit" class="text-white bg-brand box-border border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none w-full mb-3">Kirim Laporan</button>
                    </form>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection
