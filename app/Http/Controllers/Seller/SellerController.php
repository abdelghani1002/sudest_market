<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\RepositoriesInterfaces\CategoryRepositoryInterface;
use App\RepositoriesInterfaces\ProductRepositoryInterface;
use App\RepositoriesInterfaces\UserRepositoryInterface;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    protected $categoryRepository;
    protected $productRepository;
    protected $userRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository,
                                ProductRepositoryInterface $productRepository,
                                UserRepositoryInterface $userRepository)
    {
        $this->middleware('role:seller');
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
        $this->userRepository = $userRepository;
    }

    public function statistics()
    {
        $store = auth()->user()->store;
        // calc some statistics
        $sales = [
            'total' => $store->getTotalSales(),
            'this_month' => $store->getTotalSales(now()->startOfMonth()),
            'total_amount' => $store->products->sum(function ($product) {
                return $product->orders->sum('pivot.units') * $product->price;
            }),
            'this_month_amount' =>  $store->products->sum(function ($product) {
                return $product->orders->where('created_at', '>=', now()->startOfMonth())->sum('pivot.units') * $product->price;
            }),
        ];

        $customers_ids = $store->products->map(function ($product) {
            return $product->orders->pluck('user_id');
        })->flatten()->unique();
        $customers_collection = $this->userRepository->findById($customers_ids);
        // Calc the total customers and the new customers that place some orders this month
        $customers =[
            'total' => $customers_ids->count(),
        ];

        // Calc the best selling product with the highest sales count
        foreach ($store->products as &$product) {
            $total_sales = 0;
            foreach ($product->orders as $order) {
                $total_sales += $order->pivot->units;
            }
            $product->total_sales = $total_sales;
            $product->revenue = $total_sales * $product->price;
            $product->last_sale = $product->orders->sortByDesc('created_at')->first()->created_at ?? null;
        }
        $best_selling_product = $store->products->sortByDesc('total_sales');
        $products = [
            'total' => $store->products->count(),
            'this_month' => $store->products->where('created_at', '>=', now()->startOfMonth())->count(),
            'best_selling' => $best_selling_product,
        ];

        $categories = $store->categories->map(function ($category) use ($store){
            $category->products_count = $category->products->where("store_id", $store->id)->count();
            return $category;
        })->sortByDesc('products_count')->values();

        $chartData = [];
        foreach ($categories as $category) {
            $chartData[$category->name] = $category->products_count;
        }

        return view('seller.store.statistics', compact("store", "sales", "customers", "products", "categories", "chartData"));
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
