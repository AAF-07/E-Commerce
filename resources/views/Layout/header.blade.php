<header class="w-full top-0 bg-[#FAF5F5] border-b">
    <div class="max-w-7xl mx-auto px-6 py-3 flex items-center justify-between">

        {{-- Left: Logo --}}
        <div class="flex items-center gap-2">
            <img src="{{ asset('storage/logo.png') }}" alt="Logo" class="h-10">
            {{-- kalau mau teks saja --}}
            {{-- <span class="text-2xl font-bold text-teal-600">ES</span> --}}
        </div>

        {{-- Middle: Search --}}
        <div class="flex-1 mx-10">
            <div class="relative">
                <input
                    type="text"
                    placeholder="Search"
                    class="w-full bg-gray-200 rounded-full px-10 py-2 focus:outline-none"
                >
                <svg class="w-5 h-5 absolute left-3 top-2.5 text-gray-500"
                     fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M21 21l-4.35-4.35m1.85-5.65a7.5 7.5 0 11-15 0 7.5 7.5 0 0115 0z"/>
                </svg>
            </div>
        </div>

        {{-- Right: Menu + Profile --}}
        <div class="flex items-center gap-8">


            {{-- Profile icon --}}
            <div class="w-9 h-9 rounded-full border flex items-center justify-center">
                <svg class="w-6 h-6"
                     fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M5.121 17.804A13.937 13.937 0 0112 15c2.5 0 4.847.655 6.879 1.804M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
            </div>
        </div>

    </div>
</header>
            <nav class="flex gap-6 font-semibold items-center justify-center py-4">
                <a href="/staff/dashboard"
                   class="border-b-2 border-teal-500 pb-1">
                    Home
                </a>
                <a href="/staff/products" class="hover:text-teal-500">
                    Product
                </a>
                <a href="/staff/orders" class="hover:text-teal-500">
                    Orders
                </a>
            </nav>

