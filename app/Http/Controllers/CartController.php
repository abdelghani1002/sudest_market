<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addProducttoCart(Request $request,Product $product)
    {
        $units = 1;
        $cart = session()->get('cart');
        // check if product exists in cart
        if ($cart['products']->contains('id', $product->id)) {
            // dd($cart['products']->firstWhere('id', $product->id));
            $cart['products']->firstWhere('id', $product->id)->units += $units;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        $product->units = $units;
        $cart['products']->push($product);
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function removeFromCart(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if ($cart['products']->firstWhere('id', $request->id)) {
                $cart['products'] = $cart['products']->reject(function ($product) use ($request) {
                    return $product->id == $request->id;
                });
                session()->put('cart', $cart);
            }
            // dd($cart);
            if (empty($cart)) {
                session()->forget('cart');
            }
            return redirect()->back()->with('success', 'Product removed from cart successfully!');
        }
    }
}
