<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //handle tambah produk
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'gambar_produk' => 'required|image',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'categories' => 'required|array',
            'categories.*' => 'exists:categories,id',
        ]);

        if ($request->hasFile('gambar_produk')) {
            $imagePath = $request->file('gambar_produk')->store('produk_images', 'public');
            $validatedData['gambar_produk'] = $imagePath;
        }

        $produk = Produk::create([
            'nama_produk' => $validatedData['nama_produk'],
            'gambar_produk' => $validatedData['gambar_produk'],
            'deskripsi' => $validatedData['deskripsi'],
            'harga' => $validatedData['harga'],
            'stok' => $validatedData['stok'],
        ]);

        // attach kategori
        $produk->categories()->attach($validatedData['categories']);

        return redirect()->route('staff.products.index')
            ->with('success', 'Produk berhasil ditambahkan.');
    }

    public function create()
    {
        $categories = Category::all();
        return view('Staff.Product.add', compact('categories'));
    }

    //handle view all products
    public function index()
    {
        $products = Produk::all();
        return view('Staff.products', compact('products'));
    }

    //handle edit product ambil per id
    public function edit($id)
    {
        $product = Produk::with('categories')->findOrFail($id);
        $categories = Category::all();

        return view('Staff.Product.edit', compact('product', 'categories'));
    }

    //handle update product
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'gambar_produk' => 'nullable|image',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'categories' => 'required|array',
            'categories.*' => 'exists:categories,id',
        ]);

        $product = Produk::findOrFail($id);

        if ($request->hasFile('gambar_produk')) {
            $imagePath = $request->file('gambar_produk')->store('produk_images', 'public');
            $validatedData['gambar_produk'] = $imagePath;
        }

        $product->update([
            'nama_produk' => $validatedData['nama_produk'],
            'gambar_produk' => $validatedData['gambar_produk'] ?? $product->gambar_produk,
            'deskripsi' => $validatedData['deskripsi'],
            'harga' => $validatedData['harga'],
            'stok' => $validatedData['stok'],
        ]);

        // sync kategori (replace lama dengan baru)
        $product->categories()->sync($validatedData['categories']);

        return redirect()->route('staff.products.index')
            ->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $product = Produk::findOrFail($id);
        $product->delete();

        return redirect()->route('staff.products.index')->with('success', 'Produk berhasil dihapus.');
    }
    public function show()
    {
       $latestproducts = Produk::latest()->take(5)->get();
       $products = Produk::take(5)->get();

       $komikproducts = Produk::whereHas('categories', function ($q) {
           $q->where('nama', 'Komik');
       })->take(5)->get();

       $novelproducts = Produk::whereHas('categories', function ($q) {
           $q->where('nama', 'Novel');
       })->take(5)->get();

       return view('User.dashboard', compact(
           'latestproducts',
           'products',
           'komikproducts',
           'novelproducts'
       ));
    }
}
