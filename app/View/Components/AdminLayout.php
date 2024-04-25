<?php

namespace App\View\Components;

use App\Models\SellerRequest;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AdminLayout extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        $seller_requests_count = SellerRequest::where('status', 'pending')->count();
        return view('layouts.admin', compact('seller_requests_count'));
    }
}
