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

<div class="max-w-6xl mx-auto px-6 py-8">

    <h1 class="text-3xl font-bold text-center mb-10">Akun</h1>

    <div class="bg-white rounded-xl shadow-md overflow-hidden">

        <!-- Header -->
        <div class="bg-teal-800 text-white grid grid-cols-5 px-6 py-4 font-semibold">
            <div>No.</div>
            <div>Nama Lengkap</div>
            <div>Email</div>
            <div>Jumlah Order</div>
            <div>Aksi</div>
        </div>

        @for($i = 1; $i <= 16; $i++)
        <div class="grid grid-cols-5 px-6 py-4 items-center border-b">
            <div>{{ $i }}</div>
            <div>{{ $i % 2 == 0 ? 'Pramodya Anantatoer' : 'Abdul Aziz Firmansyah' }}</div>
            <div>{{ $i % 2 == 0 ? 'anjaypenulis@gmail.com' : 'abdul98@gmail.com' }}</div>
            <div>5</div>
            <div>
                <button class="text-red-500 hover:underline font-semibold">
                    Batasi
                </button>
            </div>
        </div>
        @endfor

    </div>

</div>

