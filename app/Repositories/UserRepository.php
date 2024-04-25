<?php

namespace App\Repositories;

use App\Models\User;
use App\RepositoriesInterfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use Illuminate\Pagination\LengthAwarePaginator;

class UserRepository implements UserRepositoryInterface
{
    public function all()
    {
        return User::all();
    }

    public function getThisMonthCount()
    {
        return User::whereMonth('created_at', now()->month)->count();
    }

    public function list(): LengthAwarePaginator
    {
        return User::paginate(10);
    }

    public function findById($id): User
    {
        return User::find($id);
    }

    public function findByEmail($email): User
    {
        return User::where('email', $email)->first();
    }

    public function storeOrUpdate($id = null, $data = [])
    {
        if (is_null($id)) {
            $user = new User;
            $user->fill($data);
            $user->save();

            return $user;
        }

        $user = User::find($id);
        if (!$user) {
            return false;
        }
        $user->fill($data);
        $user->save();
        return $user;
    }

    public function destroyById($id)
    {
        return User::find($id)->delete();
    }

    public function getCustomers()
    {
        return User::all()->filter(function ($user) {
            return $user->hasRole('customer');
        });
    }

    public function getSellers()
    {
        return User::all()->filter(function ($user) {
            return $user->hasRole('seller');
        });
    }
}
