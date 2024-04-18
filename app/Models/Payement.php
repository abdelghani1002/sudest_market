<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payement extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_id',
        'description',
        'amount',
        'currency',
        'payment_status',
        'payment_method',
        'order_id',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
