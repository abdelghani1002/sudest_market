<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function addToFavorites(Product $product)
    {
        try{
            auth()->user()->favorites()->attach($product);
            return response()->json([
                'success' => true,
                'message' => 'Product added to favorites'
            ]);
        }catch(\Exception $e){
            return response()->json([
                'success' => false,
                'message' => 'Somthing wrong! try again'
            ]);
        }
    }

    public function removeFromFavorites(Product $product)
    {
        try{
            auth()->user()->favorites()->detach($product);
            return response()->json([
                'success' => true,
                'message' => 'Product removed from favorites'
            ]);
        }catch(\Exception $e){
            return response()->json([
                'success' => false,
                'message' => 'Somthing wrong! try again'
            ]);
        }
    }
}
