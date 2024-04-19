<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'summary',
        'description',
        'primary_photo_src',
        'quantity',
        'price',
        'status',
        'store_id',
        'category_id',
    ];

    /*
    * return belongsTo relationship
    */
    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    /*
    * return belongsTo relationship
    */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /*
    * return belongsTo relationship
    */
    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class)
            ->using(OrderProduct::class)
            ->withPivot('units');
    }
}
