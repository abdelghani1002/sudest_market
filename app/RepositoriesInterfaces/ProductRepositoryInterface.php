<?php

namespace App\RepositoriesInterfaces;

interface ProductRepositoryInterface
{
    public function latest();
    public function getAll();
    public function whereBelongsToStore($store, $category);
    public function find($id);
    public function create($data);
    public function update($id, $data);
    public function delete($id);
}

