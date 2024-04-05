<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;
    protected $fillable = ['status'];

    /*
    * return a belongsTo relationship
    */
    public function seller(){
        return $this->belongsTo(User::class);
    }

    /*
    * return a belongsToMany relationship
    */
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'stores_categories');
    }

    /*
    * return a belongsToMany relationship
    */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
