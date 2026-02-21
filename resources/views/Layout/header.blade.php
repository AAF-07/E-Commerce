<header class="w-full top-0 bg-[#FAF5F5] border-b">
    <div class="max-w-7xl mx-auto px-6 py-3 flex items-center justify-between">

        {{-- Left: Logo --}}
        <div class="flex items-center gap-2">
            <img src="{{ asset('image/The Platypus.png') }}" alt="Logo" class="h-10">
        </div>

        {{-- Middle: Search --}}
        <div class="flex justify-center  mx-10 ">
            <div class="relative sticky top-0">

                <input
                    type="text"
                    placeholder="Search"
                    class="w-180 bg-gray-200 rounded-full px-10 py-2 focus:outline-none "
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
            <div class="relative">
    <!-- Icon Profile -->
    <button onclick="toggleDropdown()" class="focus:outline-none">
        <svg class="w-8 h-8 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M5.121 17.804A4 4 0 0112 15a4 4 0 016.879 2.804M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
        </svg>
    </button>

    <!-- Dropdown -->
    <div id="profileDropdown"
         class="hidden absolute right-0 mt-2 w-40 bg-white rounded-lg shadow-lg border z-50">



        <form action="{{ route('staff.logout') }}" method="POST">
            @csrf
            <button type="submit"
                    class="w-full text-left px-4 py-2 hover:bg-red-100 text-red-500">
                Logout
            </button>
        </form>
    </div>
</div>
        </div>

    </div>
</header>


