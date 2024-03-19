<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CustomerRoleSeeder extends Seeder
{
    public function run(): void
    {
        // Orders Management
        $create_order = new Permission();
        $create_order->name = 'create-order';
        $create_order->save();
        $create_order = Permission::where('name', 'create-order')->first();

        $edit_order = new Permission();
        $edit_order->name = 'edit-order';
        $edit_order->save();
        $edit_order = Permission::where('name', 'edit-order')->first();

        $delete_order = new Permission();
        $delete_order->name = 'delete-order';
        $delete_order->save();
        $delete_order = Permission::where('name', 'delete-order')->first();

        $customer_permissions = [];
        array_push($customer_permissions, [
            $create_order,
            $edit_order,
            $delete_order
        ]);

        $customerRole = new Role();
        $customerRole->name = 'customer';
        $customerRole->save();
        // dd($customer_permissions);
        foreach ($customer_permissions as &$permission) {
            $customerRole->permissions()->attach($permission[0]);
        }
        foreach ($customer_permissions as &$permission) {
            $permission[0]->roles()->attach($customerRole);
        }

        $customerRole = Role::where('name', 'customer')->first();

        $customer = new User();
        $customer->name = 'Customer';
        $customer->email = 'customer@gmail.com';
        $customer->password = Hash::make("password");
        $customer->save();
        $customer->roles()->attach($customerRole);
        foreach ($customer_permissions as $permission) {
            $customer->permissions()->attach($permission[0]);
        }
    }
}
