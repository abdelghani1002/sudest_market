<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $fillable = ['name', 'photo_src'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function stores()
    {
        return $this->belongsToMany(Store::class, 'stores_categories');
    }


}
