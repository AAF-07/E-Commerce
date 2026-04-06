<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reported extends Model
{
    protected $table = 'reported';
    protected $fillable = [
        'order_id',
        'user_id',
        'laporan',
    ];
}
