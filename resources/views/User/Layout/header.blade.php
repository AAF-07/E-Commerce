
 <header class="bg-[#FAF5F5] shadow-sm sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">

        <!-- LEFT -->
        <div class="flex items-center gap-4">
            <a href="/" class="w-10">
                <img src="{{ asset('image/Logo.png') }}" alt="logo">
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

        <div class="flex-1 mx-10">
            <div class="relative">
                <input type="text"
                       placeholder="Search"
                       class="w-full bg-gray-100 rounded-full py-2 px-5 focus:outline-none focus:ring-2 focus:ring-teal-400">
            </div>
        </div>

        <!-- RIGHT -->
        <div class="flex items-center gap-4">

            @guest('user')
                <a href="/login" class="border px-4 py-2 rounded-lg">
                    Masuk
                </a>

                <a href="/signup" class="bg-teal-700 text-white px-4 py-2 rounded-lg">
                    Daftar
                </a>
            @endguest

            @auth('user')
                <span class="font-semibold">
                    {{ auth('user')->user()->name }}
                </span>

                <form action="{{ route('user.logout') }}" method="POST">
                    @csrf
                    <button class="border px-4 py-2 rounded-lg">
                        Logout
                    </button>
                </form>
            @endauth

        </div>

    </div>
</header>
<nav class="flex gap-6 font-semibold items-center justify-center py-4">
    <div class="max-w-7xl mx-auto px-6 py-3 flex gap-10 font-semibold">
        <a href="/" class="hover:text-teal-600 border-b-2 border-teal-600 pb-1">
            Home
        </a>
        <a href="/product" class="hover:text-teal-600">
            Product
        </a>
    </div>
</nav>
