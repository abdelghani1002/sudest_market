<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Store;
use App\Repositories\CategoryRepository;
use App\RepositoriesInterfaces\CategoryRepositoryInterface;
use App\RepositoriesInterfaces\ProductRepositoryInterface;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    protected $categoryRepository;
    protected $productRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository, ProductRepositoryInterface $productRepository)
    {
        $this->middleware('role:seller');
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
    }

    public function statistics()
    {
        $store = auth()->user()->store;
        return view('seller.store.statistics', compact("store"));
    }

    public function index()
    {
        $categories = $this->categoryRepository->getAll();
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

    public function show(Category $category)
    {
        // get store products by category
        $store = auth()->user()->store;
        $products = $this->productRepository->whereBelongsToStore($store, $category);
        foreach ($products as $product) {
            $total_sales = 0;
            foreach ($product->orders as $order) {
                $total_sales += $order->pivot->units;
            }
            $product->total_sales = $total_sales;
        }
        return view("seller.store.categories.show", compact('products', 'category'));
    }
}
