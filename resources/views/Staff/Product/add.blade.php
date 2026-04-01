@include('Layout.layout')
@section('content')

<div class="min-h-screen bg-gray-100 py-10">

    <h1 class="text-3xl font-bold mb-8 ml-20">Tambah Buku</h1>

    <div class="max-w-6xl mx-auto bg-white border-2 border-teal-500 rounded-2xl p-10">

        <form action="{{ route('staff.products.store') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">

                {{-- LEFT SIDE (Preview Gambar) --}}
                <div class="flex flex-col items-center">

                    <div class="w-64 h-96 bg-gray-100 rounded-lg flex items-center justify-center overflow-hidden mb-6">
                        <img id="previewImage"
                             class="object-contain h-full"
                             src="{{ asset('storage/placeholder.jpg') }}"  {{-- Add a placeholder image --}}
                             alt="Preview">
                    </div>

                    <label class="bg-teal-500 hover:bg-teal-600 text-white px-6 py-3 rounded-xl cursor-pointer transition">
                        Tambah Foto
                        <input type="file"
                               name="gambar_produk"
                               accept="image/*"
                               class="hidden"
                               onchange="previewFile(this)">
                    </label>

                </div>


                {{-- RIGHT SIDE (Form Input) --}}
                <div class="space-y-6">

                    {{-- Nama --}}
                    <div>
                        <label class="block font-semibold mb-2">Judul</label>
                        <input type="text"
                               name="nama_produk"
                               class="w-full border-2 border-teal-400 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-teal-300"
                               required>
                    </div>

                    {{-- penulis --}}
                    <div>
                        <label class="block font-semibold mb-2">Penulis</label>
                        <input type="text"
                               name="penulis"
                               class="w-full border-2 border-teal-400 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-teal-300"
                               required>
                    </div>

                    {{-- bahasa --}}
                    <div>
                        <label class="block font-semibold mb-2">Bahasa</label>
                        <input type="text"
                               name="bahasa"
                               class="w-full border-2 border-teal-400 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-teal-300"
                               required>
                    </div>

                    {{-- penerbit --}}
                    <div>
                        <label class="block font-semibold mb-2">Penerbit</label>
                        <input type="text"
                               name="penerbit"
                               class="w-full border-2 border-teal-400 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-teal-300"
                               required>
                    </div>

                    {{-- tanggal terbit --}}
                    <div>
                        <label class="block font-semibold mb-2">Tanggal Terbit</label>
                        <input type="date"
                               name="tanggal_terbit"
                               class="w-full border-2 border-teal-400 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-teal-300"
                               required>
                    </div>
                    {{-- Kategori --}}

                    <button id="dropdownBgHoverButton" data-dropdown-toggle="dropdownBgHover" class="w-full border-2 border-teal-400 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-teal-300" type="button">
                      Pilih Kategori
                    </button>

                    <!-- Dropdown menu -->
                    <div id="dropdownBgHover" class="z-10 hidden bg-neutral-primary-medium border border-default-medium rounded-base shadow-lg w-100">
                        <ul class="p-2 text-sm text-body font-medium" aria-labelledby="dropdownBgHoverButton">
                          @foreach($categories as $category)
                          <li>
                            <div class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded">
                              <input id="category-{{ $category->id }}" type="checkbox" name="categories[]" value="{{ $category->id }}" class="w-4 h-4 border border-default-strong rounded-xs bg-neutral-secondary-strong focus:ring-2 focus:ring-brand-soft">
                              <label for="category-{{ $category->id }}" class="ms-2 text-sm font-medium text-heading">{{ $category->nama }}</label>
                            </div>
                          </li>
                          @endforeach
                        </ul>
                    </div>


                    {{-- Harga --}}
                    <div>
                        <label class="block font-semibold mb-2">Harga</label>
                        <input type="number"
                               name="harga"
                               class="w-full border-2 border-teal-400 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-teal-300"
                               required>
                    </div>

                    {{-- Stok --}}
                    <div>
                        <label class="block font-semibold mb-2">Stok</label>
                        <input type="number"
                               name="stok"
                               class="w-full border-2 border-teal-400 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-teal-300"
                               required>
                    </div>



                    {{-- Deskripsi --}}
                    <div>
                        <label class="block font-semibold mb-2">Deskripsi</label>
                        <textarea name="deskripsi"
                                  rows="4"
                                  class="w-full border-2 border-teal-400 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-teal-300"
                                  required></textarea>
                    </div>

                    {{-- Button Submit --}}

                </div>
                <div class="pt-4 md:col-span-2 flex justify-center">
                    <button type="submit"
                            class="bg-teal-500 hover:bg-teal-600 text-white px-10 py-3 rounded-xl transition">
                        Tambah
                    </button>
                </div>

            </div>

        </form>

    </div>
</div>

<script>
function previewFile(input) {
    const file = input.files[0];
    const preview = document.getElementById('previewImage');

    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
        }
        reader.readAsDataURL(file);
    }
}

</script>

