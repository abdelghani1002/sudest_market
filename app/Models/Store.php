<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Store extends Model
{
    use HasFactory;
    protected $fillable = ['status'];

    /*
    * return a belongsTo relationship
    */
    public function seller()
    {
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

    public function getTotalSales($date = null)
    {
        return $this->products->sum(function ($product) use ($date){
            if ($date) {
                return $product->orders->where('created_at', '>=', $date)->sum('pivot.units');
            }
            return $product->orders->sum('pivot.units');
        });
    }
}
