@include('Layout.layout')
<nav class="flex gap-6 font-semibold items-center justify-center py-4">
    <a href="/admin/dashboard"
       class="hover:text-teal-500">
        Home
    </a>
    <a href="/admin/report" class="hover:text-teal-500">
        Report
    </a>
    <a href="/admin/staff" class="border-b-2 border-teal-500 pb-1">
        Staff
    </a>
    <a href="/admin/backup" class="hover:text-teal-500">
        Back Up
    </a>
</nav>

@section('content')

<div class="max-w-6xl mx-auto px-6 py-8">

    <!-- Button Tambah Staff -->
    <div class="mb-10">
        <button class="w-full bg-teal-500 hover:bg-teal-600 text-white font-semibold py-4 rounded-xl text-lg transition">
            Tambah Staff
        </button>
    </div>

    <!-- List Staff -->
    <div class="space-y-8">

        @for ($i = 1; $i <= 4; $i++)
        <div class="flex items-center justify-between border border-teal-400 rounded-xl p-8 bg-gray-50">

            <!-- Left Content -->
            <div class="flex items-center gap-8">

                <!-- Icon -->
                <div class="flex justify-center items-center">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-20 h-20 text-gray-800"
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

            <!-- Action Buttons -->
            <div class="flex items-center gap-4">

                <!-- Delete -->
                <button class="px-6 py-2 border border-red-400 rounded-lg text-red-500 hover:bg-red-50 transition">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-5 h-5"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7h6m-1-3H10a1 1 0 00-1 1v2h6V5a1 1 0 00-1-1z"/>
                    </svg>
                </button>

                <!-- Edit -->
                <button class="px-8 py-2 bg-teal-500 hover:bg-teal-600 text-white rounded-lg transition">
                    Ubah
                </button>

            </div>

        </div>
        @endfor

    </div>

</div>



