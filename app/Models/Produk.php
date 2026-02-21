<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk';
    protected $fillable = [
        'nama_produk',
        'gambar_produk',
        'deskripsi',
        'harga',
        'stok',
    ];
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_produk', 'produk_id', 'category_id');
    }
}
