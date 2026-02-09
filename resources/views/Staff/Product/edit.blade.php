<form action="{{ route('staff.products.update', $product->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <label for="name">Nama Produk:</label>
    <input type="text" id="name" name="nama_produk" value="{{ $product->nama_produk }}" required>

    <label for="category">Kategori</label>
    <input type="text" id="category" name="kategori" value="{{ $product->kategori }}" required>

    <label for="price">Harga:</label>
    <input type="number" id="price" name="harga" value="{{ $product->harga }}" required>

    <label for="stok">Stok:</label>
    <input type="number" id="stok" name="stok" value="{{ $product->stok }}" required>
    <label for="description">Deskripsi:</label>
    <textarea id="description" name="deskripsi" required>{{ $product->deskripsi }}</textarea>

    <label for="photo">Cover:</label>
    <input type="file" id="photo" name="gambar_produk" accept="image/*" value="{{ $product->gambar_produk }}">

    <button type="submit">Update Product</button>
</form>
