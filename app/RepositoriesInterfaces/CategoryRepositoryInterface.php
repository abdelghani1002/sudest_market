<?php

namespace App\RepositoriesInterfaces;

interface CategoryRepositoryInterface
{
    public function latest();
    public function getAll();
    public function find($id);
    public function create($data);
    public function update($id, $data);
    public function delete($id);
}

