<?php

namespace App\Http\Controllers;

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
            'kategori' => 'required|string|max:100',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
        ]);

        // Handle file upload
        if ($request->hasFile('gambar_produk')) {
            $imagePath = $request->file('gambar_produk')->store('produk_images', 'public');
            $validatedData['gambar_produk'] = $imagePath;
        }

        // Create new product
        Produk::create($validatedData);

        return redirect()->route('staff.products.index')->with('success', 'Produk berhasil ditambahkan.');
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
        $product = Produk::findOrFail($id);
        return view('Staff.Product.edit', compact('product'));
    }

    //handle update product
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'gambar_produk' => 'nullable|image',
            'kategori' => 'required|string|max:100',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
        ]);

        // Handle file upload
        if ($request->hasFile('gambar_produk')) {
            $imagePath = $request->file('gambar_produk')->store('produk_images', 'public');
            $validatedData['gambar_produk'] = $imagePath;
        }

        // Update product
        $product = Produk::findOrFail($id);
        $product->update($validatedData);

        return redirect()->route('staff.products.index')->with('success', 'Produk berhasil diperbarui.');
    }
}
