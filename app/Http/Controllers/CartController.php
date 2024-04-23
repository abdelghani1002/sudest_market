<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addProducttoCart(Request $request, Product $product)
    {
        $units = $request->units ? $request->units : 1;
        $cart = session()->get('cart');
        // check if product exists in cart
        if ($cart['products']->contains('id', $product->id)) {
            $cart['products']->firstWhere('id', $product->id)->units += $units;
        } else {
            $product->units = $units;
            $cart['products']->push($product);
        }
        session()->put('cart', $cart);
        return response()->json([
            'status' => true,
            'message' => 'Product added to cart successfully!',
            "token"  => $request->header("X-CSRF-TOKEN")
        ]);
    }

    public function removeFromCart(Request $request, int $id)
    {
        if ($id) {
            $cart = session()->get('cart');
            if ($cart['products']->firstWhere('id', $id)) {
                $cart['products'] = $cart['products']->reject(function ($product) use ($id) {
                    return $product->id == $id;
                });
                session()->put('cart', $cart);
            }
            if (empty($cart)) {
                session()->forget('cart');
            }
            return response()->json([
                'status' => true,
                'message' => 'Product removed from cart successfully!',
                "token"  => $request->header("X-CSRF-TOKEN")
            ]);
        }
        return response()->json([
            'status' => false,
            'message' => 'Product not found in cart!',
            "token"  => $request->header("X-CSRF-TOKEN")
        ]);
    }

    public function getCart()
    {
        $cart = session()->get('cart');
        $cart['total'] = $cart['products']->sum(function ($product) {
            return $product->price * $product->units;
        });
        return response()->json([
            'status' => true,
            'message' => 'Cart fetched successfully!',
            'cartbtn' => view('components.cart-button', compact('cart'))->render(),
            'cart' => view('components.cart', compact('cart'))->render(),
        ]);
    }
}
