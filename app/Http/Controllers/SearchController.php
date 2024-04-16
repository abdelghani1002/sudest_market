<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    function __invoke(Request $request)
    {
        if ($request->category) {
            $products = Product::with("category")
                ->where("category_id", $request->category)
                ->where("name", "like", "%" . $request->search_string . "%")
                ->get();
        } else {
            $products = Product::with("category")
                ->where("name", "like", "%" . $request->search_string . "%")
                ->get();
        }

        if ($products->count()) {
            return response()->json([
                "status" => true,
                "products" => view('components.products', compact("products"))->render(),
                "token"  => $request->header("X-CSRF-TOKEN")
            ]);
        } else
            return response()->json([
                "status" => false
            ]);
    }
}
