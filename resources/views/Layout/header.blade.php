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
                    <svg id="avatarButton" data-dropdown-toggle="userDropdown" data-dropdown-placement="bottom-start" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    	<rect width="24" height="24" fill="none" />
                    	<g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                    		<g stroke-dasharray="22">
                    			<path d="M5 21v-1c0 -2.21 1.79 -4 4 -4h4c2.21 0 4 1.79 4 4v1" stroke-dashoffset="0" />
                    			<path stroke-dashoffset="0" d="M11 13c-1.66 0 -3 -1.34 -3 -3c0 -1.66 1.34 -3 3 -3c1.66 0 3 1.34 3 3c0 1.66 -1.34 3 -3 3Z" />
                    		</g>
                    		<path d="M20 3v4" />
                    		<path d="M20 11v0.01" />
                    	</g>
                    </svg>

    <!-- Dropdown -->
     <div id="userDropdown" class="z-10 hidden bg-neutral-primary-medium border border-default-medium rounded-base shadow-lg w-44">
                    {{-- <div class="px-4 py-3 border-b border-default-medium text-sm text-heading">
                      <div class="font-medium">{{ auth()->user()->name }}</div>
                      <div class="truncate">{{ auth()->user()->email }}</div>
                    </div> --}}
                    <ul class="p-2 text-sm text-body font-medium" aria-labelledby="avatarButton">

                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="block w-full p-2 hover:bg-neutral-tertiary-medium text-fg-danger rounded-md">Log out</button>
                        </form>
                      </li>
                    </ul>
                </div>
</div>
        </div>

    </div>
</header>


