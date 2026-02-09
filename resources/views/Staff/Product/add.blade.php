<form action="{{ route('staff.products.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <label for="name">Nama Produk:</label>
    <input type="text" id="name" name="nama_produk" required>

    <label for="category">Kategori</label>
    <input type="text" id="category" name="kategori" required>

    <label for="price">Harga:</label>
    <input type="number" id="price" name="harga" required>

    <label for="stok">Stok:</label>
    <input type="number" id="stok" name="stok" required>

    <label for="description">Deskripsi:</label>
    <textarea id="description" name="deskripsi" required></textarea>

    <label for="photo">Cover:</label>
    <input type="file" id="photo" name="gambar_produk" accept="image/*" required>

    <button type="submit">Add Product</button>
</form>
