<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SellerLayout extends Component
{
    public $store;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->store = auth()->user()->store;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('layouts.seller');
    }
}
