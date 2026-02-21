<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function produks()
    {
        return $this->belongsToMany(Produk::class, 'category_produk', 'category_id', 'produk_id');
    }
}
