<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Store;
use App\RepositoriesInterfaces\CategoryRepositoryInterface;
use App\RepositoriesInterfaces\ProductRepositoryInterface;
use App\RepositoriesInterfaces\UserRepositoryInterface;

class AdminController extends Controller
{
    protected $user_repository;
    protected $product_repository;
    protected $category_repository;

    public function __construct(
        UserRepositoryInterface $user_repository,
        ProductRepositoryInterface $product_repository,
        CategoryRepositoryInterface $category_repository
    ) {
        $this->user_repository = $user_repository;
        $this->product_repository = $product_repository;
        $this->category_repository = $category_repository;
        $this->middleware("role:admin");
    }

    public function index()
    {
        $users = [
            'all' => $this->user_repository->all(),
            'total' => $this->user_repository->all()->count(),
            'this_month' => $this->user_repository->getThisMonthCount(),
            'customers' => $this->user_repository->getCustomers(),
            'sellers' => [
                'all' => $this->user_repository->getSellers(),
                'total' => $this->user_repository->getSellers()->count(),
                'this_month' => $this->user_repository->getSellers()->filter(function ($seller) {
                    return $seller->created_at->month == now()->month;
                })->count(),
            ],
        ];

        $stores = [
            'total' => Store::all()->count(),
            'this_month' => Store::whereMonth('created_at', now()->month)->count(),
        ];

        $products = [
            'all' => $this->product_repository->getAll(),
            'total' => $this->product_repository->getAll()->count(),
            'this_month' => $this->product_repository->getThisMonthCount(),
        ];

        $orders = [
            'all' => Order::all(),
            'last_24h' => Order::where('created_at', '>=', now()->subDay())
                ->orderBy('created_at', 'desc')
                ->get(),
        ];

        $categories = $this->category_repository->getAll()->map(function ($category) {
            $category->products_count = $category->products->count();
            return $category;
        })->sortByDesc('products_count')->values();

        $chartData = [];
        foreach ($categories as $category) {
            $chartData[$category->name] = $category->products_count;
        }

        // sales
        $sales = [
            'total' => Order::all()->sum('total_amount'),
            'this_month' => Order::whereMonth('created_at', now()->month)->sum('total_amount'),
        ];
        
        return view('admin.statistics', compact('users', 'stores', 'products', 'orders', 'categories', 'chartData', 'sales'));
    }
}
