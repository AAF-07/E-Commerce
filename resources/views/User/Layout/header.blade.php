<div class="sticky top-0 z-50">
    <header class="bg-[#FAF5F5] shadow-sm s">
    <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">

        <!-- LEFT -->
        <div class="flex items-center gap-4">
            <a href="/" class="w-10">
                <img src="{{ asset('image/Logo.png') }}" alt="logo">
            </a>
        </div>

        <div class="flex justify-center  mx-5 ">
            <div class="relative sticky top-0">

                <form action="/search/{}" method="GET">
                    <input type="text"
                           name="query"
                           placeholder="Search"
                           class="w-180 bg-gray-200 rounded-full px-10 py-2 focus:outline-none "/>

                    <svg class="w-5 h-5 absolute left-3 top-2.5 text-gray-500"
                     fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M21 21l-4.35-4.35m1.85-5.65a7.5 7.5 0 11-15 0 7.5 7.5 0 0115 0z"/>
                    </svg>
                </form>
            </div>
        </div>

        <!-- RIGHT -->
        <div class="flex items-center gap-4">

            @guest()
                <a href="/login" class="border px-4 py-2 rounded-lg">
                    Masuk
                </a>

                <a href="/register" class="bg-teal-700 text-white px-4 py-2 rounded-lg">
                    Daftar
                </a>
            @endguest

            @auth()
                <div class="relative inline-block">
                    {{-- Titik Merah pada Avatar Utama --}}
                    @if(auth()->user()->unreadNotifications->count() > 0)
                        <span class="absolute top-0 right-0 block h-3 w-3 rounded-full ring-2 ring-white bg-red-500 z-50"></span>
                    @endif

                    @if (auth()->user()->foto_profil)
                        <img src="{{ asset('storage/' . auth()->user()->foto_profil) }}"
                             alt="Profile"
                             data-dropdown-toggle="userDropdown"
                             class="w-10 h-10 rounded-full cursor-pointer object-cover">
                    @else
                        <div data-dropdown-toggle="userDropdown" data-dropdown-placement="bottom-start" class="cursor-pointer text-gray-600">
                            <svg id="avatarButton" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                                <rect width="24" height="24" fill="none" />
                                <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                    <path d="M5 21v-1c0 -2.21 1.79 -4 4 -4h4c2.21 0 4 1.79 4 4v1" />
                                    <path d="M11 13c-1.66 0 -3 -1.34 -3 -3c0 -1.66 1.34 -3 3 -3c1.66 0 3 1.34 3 3c0 1.66 -1.34 3 -3 3Z" />
                                </g>
                            </svg>
                        </div>
                    @endif
                </div>

                <div id="userDropdown" class="z-10 hidden bg-white border border-gray-200 rounded-lg shadow-lg w-44">
                    <div class="px-4 py-3 border-b border-gray-100 text-sm">
                        <div class="font-medium text-gray-900">{{ auth()->user()->name }}</div>
                        <div class="truncate text-gray-500">{{ auth()->user()->email }}</div>
                    </div>
                    <ul class="p-2 text-sm font-medium">
                        <li>
                            <a href="/profile" class="flex items-center justify-between p-2 hover:bg-gray-100 rounded-md">
                                <span>Profile</span>
                                {{-- Titik Merah di dalam Menu Dropdown --}}
                                @if(auth()->user()->unreadNotifications->count() > 0)
                                    <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                                @endif
                            </a>
                        </li>
                        <li>
                            <a href="/cart" class="block p-2 hover:bg-gray-100 rounded-md">Keranjang</a>
                        </li>
                        <li>
                            <a href="/orders" class="block p-2 hover:bg-gray-100 rounded-md">Pesanan</a>
                        </li>
                        <li class="border-t border-gray-100 mt-2 pt-2">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="block w-full text-left p-2 hover:bg-red-50 text-red-600 rounded-md">Log out</button>
                            </form>
                        </li>
                    </ul>
                </div>
            @endauth
        </div>
    </div>
</header>

<nav class="flex gap-6 font-semibold items-center justify-center bg-[#FAF5F5]/60">
    <div class="max-w-7xl mx-auto px-6 py-4 flex gap-10 font-semibold">
        @if (request()->is('/'))
        <a href="/" class="hover:text-teal-600 border-b-2 border-teal-600 pb-1">
            Home
        </a>
        <a href="/product" class="hover:text-teal-600">
            Product
        </a>
        @elseif(request()->is('product'))
        <a href="/" class="hover:text-teal-600 ">
            Home
        </a>
        <a href="/product" class="hover:text-teal-600 border-b-2 border-teal-600 pb-1">
            Product
        </a>
        @else
        <a href="/" class="hover:text-teal-600 ">
            Home
        </a>
        <a href="/product" class="hover:text-teal-600">
            Product
        </a>
        @endif
    </div>

</nav>

</div>
