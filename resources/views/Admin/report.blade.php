{{-- @include('Layout.layout')
<nav class="flex gap-6 font-semibold items-center justify-center py-4">
    <a href="/admin/dashboard"
       class="hover:text-teal-500">
        Home
    </a>
    <a href="/admin/report" class="border-b-2 border-teal-500 pb-1">
        Report
    </a>
    <a href="/admin/staff" class="hover:text-teal-500">
        Staff
    </a>
    <a href="/admin/data" class="hover:text-teal-500">
        Back Up
    </a>
</nav>
@section('content')


<div class="max-w-6xl mx-auto px-6 py-8">

    <h1 class="text-3xl font-bold text-center mb-10">Laporan</h1>

    <!-- Top Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">

        <!-- Pendapatan -->
        <a href="/admin/report/earning" class="bg-teal-500 text-black rounded-xl p-6 block transition hover:bg-teal-400">
            <p class="text-lg">Pendapatan</p>
            <h2 class="text-2xl font-bold mt-4">Rp. 4.300.000</h2>
        </a>

        <!-- Pengguna -->
        <a href="/admin/report/user" class="bg-teal-900 text-white rounded-xl p-6 block transition hover:bg-teal-800">
            <p class="text-lg">Pengguna</p>
            <h2 class="text-2xl font-bold mt-4">{{ $users }} user</h2>
        </a>

    </div>

    <!-- Pembayaran Section -->
    <h2 class="text-xl font-semibold mb-4 text-center">Pembayran</h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

            <a href="/admin/report/order">
                <!-- Valid -->
                <div class="bg-teal-500 text-black rounded-xl p-6 hover:bg-teal-400 transition">
                    <p class="text-lg">Valid</p>
                    <h2 class="text-2xl font-bold mt-4">135 Pesanan</h2>
                </div>
            </a>

            <a href="/admin/report/order">
                <!-- Tidak Valid -->
                <div class="bg-teal-500 text-black rounded-xl p-6 hover:bg-teal-400 transition">
                    <p class="text-lg">Tidak Valid/Dilaporkan</p>
                    <h2 class="text-2xl font-bold mt-4">2 Pesanan</h2>
                </div>
            </a>




        <!-- Staff -->
        <a href="/admin/staff" class="bg-teal-900 text-white rounded-xl p-6 hover:bg-teal-800 transition">
            <p class="text-lg">Petugas/Staff</p>
            <h2 class="text-2xl font-bold mt-4">{{ $staffs }} Staff</h2>
        </a>

    </div>

    <!-- Laporan -->
    <div class="bg-red-500 text-white rounded-xl p-8 text-center mb-8">
        <h2 class="text-2xl font-bold">Laporan</h2>
        <p class="text-3xl font-bold mt-4">1</p>
    </div>

    <!-- Backup -->
    <a href="/admin/backup">
        <div class="bg-teal-800 text-white rounded-xl p-8 text-center hover:bg-teal-700 transition">
        <h2 class="text-2xl font-bold">Back Up & Restore</h2>
        <p class="text-xl font-semibold mt-4">
            Terakhir Back up pada 10/02/2026
        </p>
    </div>
    </a>


</div> --}}

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

    <h1 class="text-3xl font-bold text-center mb-10">Laporan User</h1>

    <!-- Filter -->
    <div class="flex items-center gap-2 font-semibold mb-6 cursor-pointer">
        <span>Semua</span>
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
        </svg>
    </div>

    <!-- Card 1 -->
    @foreach ($reported as $report)
    <div class="border border-red-400 rounded-xl p-6 mb-6 flex justify-between items-center">

        <div class="flex items-center gap-6">
                <div class="text-lg font-semibold">{{ $report->order_id }}</div>

        @if ($report->order && $report->produk )
            <img src="{{ asset('storage/' . $report->produk->gambar_produk) }}" class="w-24 rounded" alt="Product Image">
        @else
            <div class="w-24 h-24 bg-gray-200 rounded flex items-center justify-center text-gray-500">
                No Image
            </div>
        @endif
            <div>
                <h2 class="text-xl font-semibold">{{ $report->order->name }}</h2>
                <p>Rp. {{ number_format($report->order->price, 0, ',', '.') }}</p>
                <p>Alamat : {{ $report->order->alamat }}</p>
                <p>User : {{ $report->user->name }}</p>
                <p>Pembayaran : {{ $report->order->payment_method }}</p>
            </div>


        </div>

        <div class="text-right">
            <a href="/admin/report_detail/{{ $report->id }}"><span class="bg-red-500 text-white px-6 py-2 rounded-lg font-semibold">
                {{ $report->order->status }}
            </span></a>
        </div>

    </div>
    @endforeach

</div>


