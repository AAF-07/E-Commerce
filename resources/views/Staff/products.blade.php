<h1>Products</h1>

<nav>
    <ul></ul>
        <li><a href="/staff/dashboard">Home</a></li>
        <li><a href="/staff/products">Products</a></li>
        <li><a href="/staff/orders">Orders</a></li>
    </ul>
</nav>

<a href="{{ route('staff.products.store') }}"><button>Tambah Produk</button></a>

@foreach ($products as $product)
    <div>
        <img src="{{ asset('storage/' . $product->gambar_produk) }}" alt="{{ $product->nama_produk }}" width="200">
        <h2>{{ $product->nama_produk }}</h2>
        <p>Kategori: {{ $product->kategori }}</p>
        <p>Harga: {{ $product->harga }}</p>
        <p>Stok: {{ $product->stok }}</p>
        <p>Deskripsi: {{ $product->deskripsi }}</p>

        <a href="{{ route('staff.products.edit', $product->id) }}"><button>Edit</button></a>
    </div>

@endforeach



