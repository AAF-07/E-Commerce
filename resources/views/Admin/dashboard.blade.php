@include('Layout.layout')

<nav class="flex gap-6 font-semibold items-center justify-center py-4">
    <a href="/staff/dashboard"
       class="border-b-2 border-teal-500 pb-1">
        Home
    </a>
    <a href="/staff/products" class="hover:text-teal-500">
        Report
    </a>
    <a href="/staff/orders" class="hover:text-teal-500">
        Staff
    </a>
    <a href="/staff/orders" class="hover:text-teal-500">
        Back Up
    </a>
</nav>
@section('content')

<div class="max-w-6xl mx-auto px-6 py-8">

    <!-- Welcome -->
    <div class="text-center mb-12">
        <h1 class="text-3xl font-bold">
            Selamat Datang, Admin 1
        </h1>
    </div>

    <!-- Statistik -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-14">

        <!-- Pendapatan -->
        <div class="border border-teal-400 rounded-xl p-8 bg-gray-50">
            <p class="text-lg text-gray-700 mb-4">
                Pendapatan
            </p>
            <h2 class="text-2xl font-bold">
                Rp. 4.300.000
            </h2>
        </div>

        <!-- Pengguna -->
        <div class="border border-teal-400 rounded-xl p-8 bg-gray-50">
            <p class="text-lg text-gray-700 mb-4">
                Pengguna
            </p>
            <h2 class="text-2xl font-bold">
                135 user
            </h2>
        </div>

    </div>

    <!-- Staff Section -->
    <div>
        <h2 class="text-2xl font-bold mb-8">
            Staff
        </h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10">

            <!-- Card Staff -->
            @for ($i = 1; $i <= 4; $i++)
            <div class="border border-teal-400 rounded-xl p-8 bg-gray-50 text-left">

                <!-- Icon -->
                <div class="flex justify-center mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-20 h-20 text-gray-700"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                              d="M5.121 17.804A9 9 0 1118.9 17.8M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>

                <!-- Detail -->
                <div class="space-y-2 text-gray-800">
                    <p>Nama : Staff 1</p>
                    <p>Status : Aktif</p>
                    <p>Jam kerja : 09.00 - 17.00</p>
                </div>

            </div>
            @endfor

        </div>
    </div>

</div>



