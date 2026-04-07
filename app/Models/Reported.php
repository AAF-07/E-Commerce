<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reported extends Model
{
    protected $table = 'reported';
    protected $fillable = [
        'order_id',
        'user_id',
        'produk_id',
        'laporan',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }


}


