<?php

namespace App\Repositories;

use App\Models\Product;
use App\RepositoriesInterfaces\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{
    public function latest()
    {
        return Product::latest()->paginate(6);
    }

    public function getThisMonthCount()
    {
        return Product::whereMonth('created_at', now()->month)->count();
    }

    public function getAll()
    {
        return Product::all();
    }

    public function whereBelongsToStore($store, $category = null)
    {
        return $category ?
                    Product::whereBelongsTo($store)->whereBelongsTo($category)->get()
                        :
                    Product::whereBelongsTo($store)->get();
    }

    public function find($id)
    {
        return Product::find($id);
    }

    public function create($data)
    {
        return Product::create($data);
    }

    public function update($id, $data)
    {
        return Product::find($id)->update($data);
    }

    public function delete($id)
    {
        return Product::find($id)->delete();
    }
}
