@include('Layout.layout')
<nav class="flex gap-6 font-semibold items-center justify-center py-4">
    <a href="/staff/dashboard"
       class="hover:text-teal-500 ">
        Home
    </a>
    <a href="/staff/products" class="border-b-2 border-teal-500 pb-1">
        Product
    </a>
    <a href="/staff/orders" class="hover:text-teal-500">
        Orders
    </a>
</nav>
@section("content")

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">

    {{-- Card Tambah Produk --}}
    <a href="{{ route('staff.products.store') }}"
       class="bg-[#0C7779] hover:bg-teal-800 text-white rounded-xl flex flex-col items-center justify-center h-96 transition">

        <div class="text-6xl mb-4">+</div>
        <p class="text-lg font-medium">Tambah Produk</p>
    </a>


    {{-- Card Produk --}}
    @foreach ($products as $product)

        <div class="bg-white rounded-xl p-6 border-2
            {{ $product->stok == 0 ? 'border-red-400' : 'border-teal-500' }}">

            {{-- Gambar --}}
            <div class="flex justify-center mb-4">
                <img src="{{ asset('storage/' . $product->gambar_produk) }}"
                     alt="{{ $product->nama_produk }}"
                     class="h-48 object-contain">
            </div>

            {{-- Nama Produk --}}
            <h2 class="text-lg font-semibold mb-2">
                {{ $product->nama_produk }}
            </h2>

            {{-- Harga --}}
            <p class="text-gray-700 mb-1">
                Rp. {{ number_format($product->harga, 0, ',', '.') }}
            </p>

            {{-- Stok --}}
            <p class="mb-4
                {{ $product->stok == 0 ? 'text-red-500' : 'text-gray-700' }}">
                Stok : {{ $product->stok }}
            </p>

            {{-- Tombol --}}
            <div class="flex gap-3">

                {{-- Delete --}}
                <form action="{{ route('staff.products.destroy', $product->id) }}"
                      method="POST"
                      class="flex-1">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="w-full border border-red-400 text-red-500
                               rounded-lg py-2 hover:bg-red-50 py-2 p-6 transition">
                        Hapus
                    </button>
                </form>

                {{-- Edit --}}
                <a href="{{ route('staff.products.edit', $product->id) }}"
                   class="flex-1 bg-[#3BC1A8] hover:bg-teal-600
                          text-black text-center rounded-lg py-2 p-6 transition">
                    Edit
                </a>

            </div>

        </div>

    @endforeach

</div>




