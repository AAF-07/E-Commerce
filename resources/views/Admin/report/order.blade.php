@include('Layout.layout')
<nav class="flex gap-6 font-semibold items-center justify-center py-4">
    <a href="/admin/dashboard"
       class="hover:text-teal-500">
        Home
    </a>
    <a href="/admin/report" class="hover:text-teal-500">
        Report
    </a>
    <a href="/admin/staff" class="hover:text-teal-500">
        Staff
    </a>
    <a href="/admin/backup" class="hover:text-teal-500">
        Back Up
    </a>
</nav>
@section('content')

<div class="max-w-5xl mx-auto px-6 py-8">

    <h1 class="text-3xl font-bold text-center mb-10">Status Pesanan</h1>

    <!-- Filter -->
    <div class="flex items-center gap-2 font-semibold mb-6 cursor-pointer">
        <span>Semua</span>
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
        </svg>
    </div>

    <!-- Card 1 -->
    <div class="border border-red-400 rounded-xl p-6 mb-6 flex justify-between items-center">

        <div class="flex items-center gap-6">
            <div class="text-lg font-semibold">003</div>

            <img src="/images/komi.jpg" class="w-24 rounded">

            <div>
                <h2 class="text-xl font-semibold">Komi Can't Communicate</h2>
                <p>Rp. 76.000</p>
                <p>Alamat : JL. Raden Sanim</p>
                <p>User : Firman</p>
                <p>Pembayaran : Transfer Bank</p>
            </div>
        </div>

        <div class="text-right">
            <span class="bg-red-500 text-white px-6 py-2 rounded-lg font-semibold">
                Ditolak
            </span>
            <p class="mt-3 font-semibold">Oleh Staff 1</p>
        </div>

    </div>

    <!-- Card 2 -->
    <div class="border border-teal-500 rounded-xl p-6 mb-6 flex justify-between items-center">

        <div class="flex items-center gap-6">
            <div class="text-lg font-semibold">002</div>

            <img src="/images/demon.jpg" class="w-24 rounded">

            <div>
                <h2 class="text-xl font-semibold">Demon Slayer</h2>
                <p>Rp. 38.000</p>
                <p>Alamat : JL. Raden Sanim</p>
                <p>User : Aziz</p>
                <p>Pembayaran : Transfer Bank</p>
            </div>
        </div>

        <div class="text-right">
            <span class="bg-teal-500 text-white px-6 py-2 rounded-lg font-semibold">
                Dikonfirmasi
            </span>
            <p class="mt-3 font-semibold">Oleh Staff 1</p>
        </div>

    </div>

    <!-- Card 3 -->
    <div class="border border-red-400 rounded-xl p-6 mb-6 flex justify-between items-center">

        <div class="flex items-center gap-6">
            <div class="text-lg font-semibold">001</div>

            <img src="/images/poppy.jpg" class="w-24 rounded">

            <div>
                <h2 class="text-xl font-semibold">The Poppy War</h2>
                <p>Rp. 160.000</p>
                <p>Alamat : JL. Raden Sanim</p>
                <p>User : Abdul</p>
                <p>Pembayaran : QRIS</p>
            </div>
        </div>

        <div class="text-right">
            <span class="bg-red-500 text-white px-6 py-2 rounded-lg font-semibold">
                Dilaporkan
            </span>
            <p class="mt-3 font-semibold">Oleh Abdul</p>
        </div>

    </div>

</div>


