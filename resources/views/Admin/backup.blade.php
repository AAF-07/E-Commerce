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
    <a href="/admin/backup" class="border-b-2 border-teal-500 pb-1">
        Back Up
    </a>
</nav>
@section('content')

<div class="max-w-6xl mx-auto px-6 py-8">

    <h1 class="text-3xl font-bold text-center mb-8">Kelola Data</h1>

    <!-- Tombol Atas -->
    <div class="flex justify-center gap-6 mb-12">
        <button class="bg-teal-400 hover:bg-teal-500 text-black font-semibold px-16 py-3 rounded-xl transition">
            Back Up
        </button>
        <button class="bg-teal-900 hover:bg-teal-800 text-white font-semibold px-16 py-3 rounded-xl transition">
            Restore
        </button>
    </div>

    <!-- Table -->
    <div class="bg-white rounded-xl shadow-md overflow-hidden">

        <!-- Header -->
        <div class="bg-teal-800 text-white grid grid-cols-4 px-6 py-4 font-semibold text-lg">
            <div>No.</div>
            <div>Data</div>
            <div>Tanggal Terakhir</div>
            <div>Aksi</div>
        </div>

        <!-- Row 1 -->
        <div class="grid grid-cols-4 px-6 py-4 items-center border-b">
            <div>1</div>
            <div>Data Akun</div>
            <div>10/02/2026</div>
            <div class="space-x-3">
                <button class="text-teal-500 hover:underline">Back up</button>
                <button class="text-teal-900 hover:underline">Restore</button>
            </div>
        </div>

        <!-- Row 2 -->
        <div class="grid grid-cols-4 px-6 py-4 items-center border-b">
            <div>2</div>
            <div>Data Barang</div>
            <div>10/02/2026</div>
            <div class="space-x-3">
                <button class="text-teal-500 hover:underline">Back up</button>
                <button class="text-teal-900 hover:underline">Restore</button>
            </div>
        </div>

        <!-- Row 3 -->
        <div class="grid grid-cols-4 px-6 py-4 items-center border-b">
            <div>3</div>
            <div>Data Transaksi</div>
            <div>10/02/2026</div>
            <div class="space-x-3">
                <button class="text-teal-500 hover:underline">Back up</button>
                <button class="text-teal-900 hover:underline">Restore</button>
            </div>
        </div>

        <!-- Row 4 -->
        <div class="grid grid-cols-4 px-6 py-4 items-center">
            <div>4</div>
            <div>Data Akun User</div>
            <div>10/02/2026</div>
            <div class="space-x-3">
                <button class="text-teal-500 hover:underline">Back up</button>
                <button class="text-teal-900 hover:underline">Restore</button>
            </div>
        </div>

    </div>

</div>


