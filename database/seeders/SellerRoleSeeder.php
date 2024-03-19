<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SellerRoleSeeder extends Seeder
{
    public function run(): void
    {
        // Products Managment
        $create_product = new Permission();
        $create_product->name = 'create-product';
        $create_product->save();
        $create_product = Permission::where('name', 'create-product')->first();

        $edit_product = new Permission();
        $edit_product->name = 'edit-product';
        $edit_product->save();
        $edit_product = Permission::where('name', 'edit-product')->first();

        $delete_product = new Permission();
        $delete_product->name = 'delete-product';
        $delete_product->save();
        $delete_product = Permission::where('name', 'delete-product')->first();


        // Stores Managment
        $create_store = new Permission();
        $create_store->name = 'create-store';
        $create_store->save();
        $create_store = Permission::where('name', 'create-store')->first();

        $close_store = Permission::where('name', 'close-store')->first();

        $seller_permissions = [];
        array_push($seller_permissions, [
            $create_product,
            $edit_product,
            $delete_product,
            $create_store,
            $close_store,
        ]);

        $sellerRole = new Role();
        $sellerRole->name = 'seller';
        $sellerRole->save();
        // dd($seller_permissions);
        foreach ($seller_permissions as &$permission) {
            $sellerRole->permissions()->attach($permission[0]);
        }
        foreach ($seller_permissions as &$permission) {
            $permission[0]->roles()->attach($sellerRole);
        }

        $sellerRole = Role::where('name', 'seller')->first();
        $customerRole = Role::where('name', 'customer')->first();

        $seller = new User();
        $seller->name = 'Seller';
        $seller->email = 'seller@gmail.com';
        $seller->password = Hash::make("password");
        $seller->save();
        $seller->roles()->attach($sellerRole);
        $seller->roles()->attach($customerRole);
        foreach ($seller_permissions as $permission) {
            $seller->permissions()->attach($permission[0]);
        }
    }
}
