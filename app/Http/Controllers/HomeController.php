<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryRepository;
use App\RepositoriesInterfaces\CategoryRepositoryInterface;
use App\RepositoriesInterfaces\ProductRepositoryInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $categoryrepository;
    protected $productrepository;

    public function __construct(CategoryRepositoryInterface $categoryrepository, ProductRepositoryInterface $productrepository)
    {
        $this->categoryrepository = $categoryrepository;
        $this->productrepository = $productrepository;
    }

    public function index()
    {
        $categories = $this->categoryrepository->getAll();
        $products = $this->productrepository->latest();
        if (session()->has('cart')) {
            $cart = session()->get('cart');
        } else {
            $cart = [];
        }
        return view('home', compact('categories', 'products', 'cart'));
    }
}
