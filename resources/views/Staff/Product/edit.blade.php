
@include('Layout.layout')

<div class="min-h-screen bg-gray-100 py-10">

    <h1 class="text-3xl font-bold mb-8 ml-20">Ubah Produk</h1>

    <div class="max-w-6xl mx-auto bg-white border-2 border-teal-500 rounded-2xl p-10">

        <form action="{{ route('staff.products.update', $product->id) }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">

                {{-- LEFT SIDE (Preview Gambar) --}}
                <div class="flex flex-col items-center">

                    <div class="w-64 h-96 bg-gray-100 rounded-lg flex items-center justify-center overflow-hidden mb-6">
                        <img id="previewImage"
                             class="object-contain h-full"
                             src="{{ asset('storage/' . $product->gambar_produk) }}"
                             alt="Preview">
                    </div>

                    <label class="bg-teal-500 hover:bg-teal-600 text-white px-6 py-3 rounded-xl cursor-pointer transition">
                        Ubah Foto
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
                               value="{{ $product->nama_produk }}"
                               required>
                    </div>

                    <div>
                        <label class="block font-semibold mb-2">Kategori</label>

                        <select name="categories[]"
                                multiple
                                class="w-full border-2 border-teal-400 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-teal-300">

                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ $product->categories->contains($category->id) ? 'selected' : '' }}>
                                    {{ $category->nama }}
                                </option>
                            @endforeach

                        </select>

                        <p class="text-sm text-gray-500 mt-1">
                            tekan CTRL (atau CMD di mac) untuk pilih lebih dari satu
                        </p>
                    </div>

                    {{-- Harga --}}
                    <div>
                        <label class="block font-semibold mb-2">Harga</label>
                        <input type="number"
                               name="harga"
                               class="w-full border-2 border-teal-400 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-teal-300"
                               value="{{ $product->harga }}"
                               required>
                    </div>

                    {{-- Stok --}}
                    <div>
                        <label class="block font-semibold mb-2">Stok</label>
                        <input type="number"
                               name="stok"
                               class="w-full border-2 border-teal-400 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-teal-300"
                               value="{{ $product->stok }}"
                               required>
                    </div>

                    {{-- Deskripsi --}}
                    <div>
                        <label class="block font-semibold mb-2">Deskripsi</label>
                        <textarea name="deskripsi"
                                  rows="4"
                                  class="w-full border-2 border-teal-400 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-teal-300"
                                  required>{{ $product->deskripsi }}</textarea>
                    </div>

                    {{-- Button Submit --}}

                </div>
                <div class="pt-4 md:col-span-2 flex justify-center">
                    <button type="submit"
                            class="bg-teal-500 hover:bg-teal-600 text-white px-10 py-3 rounded-xl transition">
                        Ubah
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
