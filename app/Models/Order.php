<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Order extends Model
{
    protected $fillable = [
        'status',
        'user_id',
        'total_amount',
        'currency',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class)
            ->using(OrderProduct::class)
            ->withPivot('units');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function payement()
    {
        return $this->hasOne(Payement::class);
    }
}
