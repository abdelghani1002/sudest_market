<?php

namespace App\Repositories;

use App\Models\Category;
use App\RepositoriesInterfaces\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function latest()
    {
        return Category::latest();
    }

    public function getAll()
    {
        return Category::all();
    }

    public function find($id)
    {
        return Category::find($id);
    }

    public function create($data)
    {
        return Category::create($data);
    }

    public function update($id, $data)
    {
        return Category::find($id)->update($data);
    }

    public function delete($id)
    {
        return Category::find($id)->delete();
    }
}
