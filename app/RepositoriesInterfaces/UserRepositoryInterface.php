<?php

namespace App\RepositoriesInterfaces;

interface UserRepositoryInterface
{
    public function all();
    public function list();
    public function getThisMonthCount();
    public function findById($id);
    public function findByEmail($email);
    public function storeOrUpdate($id = null, $collection = []);
    public function destroyById($object);
    public function getCustomers();
    public function getSellers();
}
