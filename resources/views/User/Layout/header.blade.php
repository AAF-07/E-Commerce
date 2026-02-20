<header class="bg-white shadow-sm">
    <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">

        <!-- LEFT: Logo -->
        <div class="flex items-center gap-4">
            <a href="/" class="text-3xl font-bold text-teal-700">
               BS
            </a>

            <!-- Dropdown kecil -->
            <div class="relative">
                <select class="border rounded-lg px-2 py-1 text-sm focus:outline-none">
                    <option>All</option>
                    <option>Komik</option>
                    <option>Novel</option>
                </select>
            </div>
        </div>

        <!-- CENTER: Search -->
        <div class="flex-1 mx-10">
            <div class="relative">
                <input type="text"
                       placeholder="Search"
                       class="w-full bg-gray-100 rounded-full py-2 px-5 focus:outline-none focus:ring-2 focus:ring-teal-400">
            </div>
        </div>

        <!-- RIGHT: Auth Buttons -->
        <div class="flex items-center gap-4">
            <a href="/login"
               class="border border-gray-400 px-4 py-2 rounded-lg hover:bg-gray-100 transition">
                Masuk
            </a>

            <a href="/signup"
               class="bg-teal-700 text-white px-4 py-2 rounded-lg hover:bg-teal-600 transition">
                Daftar
            </a>
        </div>

    </div>

    <!-- MENU -->

</header>
