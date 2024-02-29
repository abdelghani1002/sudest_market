<?php

namespace App\RepositoriesInterfaces;

use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;

interface UserRepositoryInterface
{
    public function list() : LengthAwarePaginator;
    public function findById($id) : User;
    public function storeOrUpdate($id = null, $collection = []);
    public function destroyById($object);
}
