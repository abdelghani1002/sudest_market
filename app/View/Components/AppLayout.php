<?php

namespace App\View\Components;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;
use Illuminate\View\View;

class AppLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        // session()->forget('cart');
        $cart = session()->get('cart');
        if (!$cart) {
            $cart = Collection::empty();
            $cart['products'] = Collection::empty();
            $cart['total'] = 0;
            session()->put('cart', $cart);
            return view('layouts.app', ['cart' => $cart]);
        }else{
            $cart['total'] = 0;
            foreach ($cart['products'] as $product) {
                $cart['total'] += $product->price * $product->units;
            }
            return view('layouts.app', ['cart' => $cart]);
        }
    }
}
