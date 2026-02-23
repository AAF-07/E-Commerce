@include('Layout.layout')
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
    <a href="/admin/backup" class="hover:text-teal-500">
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


</div>


