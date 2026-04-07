<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'order_code',
        'total_amount',
        'status',
        'pengiriman',
        'alamat',
        'no_hp',
        'payment_method',
        'midtrans_order_id',
        'midtrans_transaction_id',
        'midtrans_response',
        'payment_time',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
