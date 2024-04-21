<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        if ($user->favorites->count() > 0) {
            // load store and store seller for each product
            foreach($user->favorites as &$product) {
                $product->store->seller =  User::find($product->store->user_id);
            }
        }
        return view('profile', compact('user'));
    }
}
