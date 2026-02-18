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

        <!-- ORDER 003 (Pending) -->
        <div class="flex items-center justify-between border border-teal-400 rounded-xl p-6 bg-gray-50">

            <div class="flex items-center gap-6">

                <!-- ID -->
                <div class="text-lg font-medium text-gray-700">
                    003
                </div>

                <!-- Image -->
                <img src="/images/komi.jpg" class="w-20 h-28 object-cover rounded">

                <!-- Detail -->
                <div>
                    <h2 class="text-xl font-semibold">Komi Can’t Comm...</h2>
                    <p class="text-gray-600">Rp. 76.000</p>

                    <div class="mt-2 text-gray-700 space-y-1 text-sm">
                        <p><span class="font-medium">Alamat</span> : JL. Raden Sanim</p>
                        <p><span class="font-medium">User</span> : Firman</p>
                        <p><span class="font-medium">Pembayaran</span> : Transfer Bank</p>
                    </div>
                </div>
            </div>

            <!-- Action -->
            <div class="flex gap-4">
                <button class="px-6 py-2 rounded-lg border border-red-400 text-red-500 hover:bg-red-50 transition">
                    Tolak
                </button>
                <button class="px-6 py-2 rounded-lg bg-teal-500 text-white hover:bg-teal-600 transition">
                    Konfirmasi
                </button>
            </div>
        </div>


        <!-- ORDER 002 (Ditolak) -->
        <div class="flex items-center justify-between border border-red-400 rounded-xl p-6 bg-gray-50">

            <div class="flex items-center gap-6">
                <div class="text-lg font-medium text-gray-700">
                    002
                </div>

                <img src="/images/demonslayer.jpg" class="w-20 h-28 object-cover rounded">

                <div>
                    <h2 class="text-xl font-semibold">Demon Slayer</h2>
                    <p class="text-gray-600">Rp. 38.000</p>

                    <div class="mt-2 text-gray-700 space-y-1 text-sm">
                        <p><span class="font-medium">Alamat</span> : JL. Raden Sanim</p>
                        <p><span class="font-medium">User</span> : Aziz</p>
                        <p><span class="font-medium">Pembayaran</span> : Transfer Bank</p>
                    </div>
                </div>
            </div>

            <div>
                <button class="px-10 py-2 rounded-lg border border-red-400 text-red-500 bg-red-50 cursor-not-allowed">
                    Ditolak
                </button>
            </div>
        </div>


        <!-- ORDER 001 (Dikonfirmasi) -->
        <div class="flex items-center justify-between border border-teal-400 rounded-xl p-6 bg-gray-50">

            <div class="flex items-center gap-6">
                <div class="text-lg font-medium text-gray-700">
                    001
                </div>

                <img src="/images/poppywar.jpg" class="w-20 h-28 object-cover rounded">

                <div>
                    <h2 class="text-xl font-semibold">The Poppy War</h2>
                    <p class="text-gray-600">Rp. 160.000</p>

                    <div class="mt-2 text-gray-700 space-y-1 text-sm">
                        <p><span class="font-medium">Alamat</span> : JL. Raden Sanim</p>
                        <p><span class="font-medium">User</span> : Abdul</p>
                        <p><span class="font-medium">Pembayaran</span> : Transfer Bank</p>
                    </div>
                </div>
            </div>

            <div>
                <button class="flex items-center gap-2 px-8 py-2 rounded-lg bg-teal-500 text-white">
                    Dikonfirmasi
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
            </div>
        </div>

    </div>
</div>




