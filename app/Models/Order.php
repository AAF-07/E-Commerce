<?php

namespace App\Models;

use App\Models\OrderItem;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = [
        'user_id',
        'order_code',
        'total_price',
        'status',
        'snap_token',
        'midtrans_response',
        'paid_at'
    ];

    protected $casts = [
        'midtrans_response' => 'array',
        'paid_at' => 'datetime',
    ];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
