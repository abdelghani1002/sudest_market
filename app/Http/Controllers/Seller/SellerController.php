<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Store;
use App\Repositories\CategoryRepository;
use App\RepositoriesInterfaces\CategoryRepositoryInterface;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    protected $category;

    public function __construct(CategoryRepositoryInterface $category)
    {
        $this->middleware('role:seller');
        $this->category = $category;
    }

    public function statistics()
    {
        $store = auth()->user()->store;
        return view('seller.store.statistics', compact("store"));
    }

    public function index()
    {
        $categories = $this->category->getAll();
        $store = auth()->user()->store;
        return view("seller.store.categories.index", compact('categories', 'store'));
    }

    public function update(Request $request)
    {
        $store = auth()->user()->store;
        $selectedCategoryIds = $request->input('categories', []);
        $store->categories()->sync($selectedCategoryIds);
        return redirect()->back()->with('success', "Categories has been updated succeessfully.");
    }

    public function show($category)
    {
        // get store products by category
        $store = auth()->user()->store;
        $products = $store->products;
        return view("seller.store.categories.show", compact('products'));
    }
}
