<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Order;
use Illuminate\Http\Request;
use Mollie\Laravel\Facades\Mollie;

class OrderController extends Controller
{
    function checkout(Request $request)
    {
        if ($request->has('order_id')) {
            $order = Order::find($request->order_id);
            if (!OrderController::is_order_available($order)) {
                return redirect()->back()->with('error', 'Order is not available');
            }
            $back_url = $request->header('referer');
            return PayementController::pay($order, $back_url);
        }

        if (!OrderController::is_order_available($order)) {
            return redirect()->back()->with('error', 'Order is not available');
        }

        $cart = session()->get('cart');
        $user = auth()->user();
        $order = $user->orders()->create([
            'total_amount' => $cart['total']
        ]);

        foreach ($cart['products'] as $product) {
            $order->products()->attach($product->id, ['units' => $product->units]);
        }

        $back_url = $request->header('referer');
        return PayementController::pay($order, $back_url);
    }

    static function is_order_available($order) : bool
    {
        if ($order->status != 'pending'){
            return false;
        }
        foreach ($order->products as $product) {
            if ($product->quantity < $product->pivot->units) {
                return false;
            }
        }
        return true;
    }
}
