<div class="sticky top-0 z-50">
    <header class="bg-[#FAF5F5] shadow-sm s">
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
                @if (auth('user')->user()->foto_profil)
                    <img src="{{ asset('storage/' . auth('user')->user()->foto_profil) }}"
                         alt="Profile"
                         class="w-10 h-10 rounded-full">
                @else
                    <svg id="avatarButton"
                         xmlns="http://www.w3.org/2000/svg"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke-width="1.5"
                         stroke="currentColor"
                         data-dropdown-toggle="userDropdown"
                         data-dropdown-placement="bottom-start"
                         class="w-10 h-10 p-2 rounded-full cursor-pointer bg-gray-200 hover:bg-gray-300">

                    <p  ath stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                @endif
                <!-- Dropdown menu -->
                <div id="userDropdown" class="z-10 hidden bg-neutral-primary-medium border border-default-medium rounded-base shadow-lg w-44">
                    <div class="px-4 py-3 border-b border-default-medium text-sm text-heading">
                      <div class="font-medium">{{ auth('user')->user()->name }}</div>
                      <div class="truncate">{{ auth('user')->user()->email }}</div>
                    </div>
                    <ul class="p-2 text-sm text-body font-medium" aria-labelledby="avatarButton">
                      <li>
                        <a href="/profile" class="block w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded-md">Profile</a>
                      </li>
                      <li>
                        <a href="/cart" class="block w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded-md">Keranjang</a>
                      </li>
                      <li>
                        <a href="/orders" class="block w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded-md">Pesanan</a>
                      </li>
                      <li>
                        <form action="{{ route('user.logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="block w-full p-2 hover:bg-neutral-tertiary-medium text-fg-danger rounded-md">Log out</button>
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
