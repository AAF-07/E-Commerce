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
    <a href="/admin/data" class="border-b-2 border-teal-500 pb-1">
        Back Up
    </a>
</nav>
@section('content')
<div class="max-w-6xl mx-auto px-6 py-8">
    <h1 class="text-3xl font-bold text-center mb-8">Kelola Data</h1>

    @if(session('success'))
        <div class="bg-green-500 text-white p-4 rounded mb-4 text-center">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="bg-red-500 text-white p-4 rounded mb-4 text-center">{{ session('error') }}</div>
    @endif

    <div class="flex justify-center gap-6 mb-12">
        <form action="{{ route('admin.backup.post') }}" method="POST">
            @csrf
            <button type="submit" class="bg-teal-400 hover:bg-teal-500 text-black font-semibold px-16 py-3 rounded-xl transition shadow-lg">
                Back Up Seluruh Database
            </button>
        </form>

        <div class="bg-teal-900 text-white font-semibold px-6 py-3 rounded-xl shadow-lg flex items-center gap-4">
            <span class="text-sm">Restore:</span>
            <form action="{{ route('admin.restore.post') }}" method="POST" enctype="multipart/form-data" class="flex gap-4">
                @csrf
                <input type="file" name="backup_file" accept=".sql" class="text-xs text-teal-100 file:bg-teal-700 file:text-white file:border-none file:px-3 file:py-1 file:rounded cursor-pointer" required>
                <button type="submit" class="bg-white text-teal-900 px-4 py-1 rounded text-sm hover:bg-teal-100 transition">
                    Run Restore
                </button>
            </form>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-md overflow-hidden">
        <div class="bg-teal-800 text-white grid grid-cols-4 px-6 py-4 font-semibold text-lg">
            <div>No.</div>
            <div>Data</div>
            <div>Status</div>
            <div>Informasi</div>
        </div>

        <div class="grid grid-cols-4 px-6 py-4 items-center border-b italic text-gray-500">
            <div>1</div>
            <div>Seluruh Database</div>
            <div class="text-green-600 font-bold">Aktif</div>
            <div class="text-xs">Backup mencakup Akun, Barang, Transaksi, dan Staff.</div>
        </div>
    </div>
</div>


