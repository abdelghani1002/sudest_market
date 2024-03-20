<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminRoleSeeder extends Seeder
{
    public function run(): void
    {
        // Catagory Management
        $create_category = new Permission();
        $create_category->name = 'create-category';
        $create_category->save();
        $create_category = Permission::where('name', 'create-category')->first();

        $edit_category = new Permission();
        $edit_category->name = 'edit-category';
        $edit_category->save();
        $edit_category = Permission::where('name', 'edit-category')->first();

        $delete_category = new Permission();
        $delete_category->name = 'delete-category';
        $delete_category->save();
        $delete_category = Permission::where('name', 'delete-category')->first();

        // Users Management
        $ban_user = new Permission();
        $ban_user->name = 'ban-user';
        $ban_user->save();
        $ban_user = Permission::where('name', 'ban-user')->first();

        $reban_user = new Permission();
        $reban_user->name = 'reban-user';
        $reban_user->save();
        $reban_user = Permission::where('name', 'reban-user')->first();

        // Stores Managment
        $close_store = new Permission();
        $close_store->name = 'close-store';
        $close_store->save();
        $close_store = Permission::where('name', 'close-store')->first();

        $open_store = new Permission();
        $open_store->name = 'open-store';
        $open_store->save();
        $open_store = Permission::where('name', 'open-store')->first();

        $admin_permissions = [];
        array_push($admin_permissions, [
            $create_category,
            $edit_category,
            $delete_category,
            $ban_user,
            $reban_user,
            $close_store,
            $open_store,
        ]);

        $adminRole = new Role();
        $adminRole->name = 'admin';
        $adminRole->save();
        // dd($admin_permissions);
        foreach ($admin_permissions as &$permission) {
            $adminRole->permissions()->attach($permission[0]);
        }
        foreach ($admin_permissions as &$permission) {
            $permission[0]->roles()->attach($adminRole);
        }

        $adminRole = Role::where('name', 'admin')->first();
        $sellerRole = Role::where('name', 'seller')->first();

        $admin = new User();
        $admin->name = 'Admin';
        $admin->email = 'admin@gmail.com';
        $admin->password = Hash::make("password");
        $admin->save();
        $admin->roles()->attach($adminRole);
        $admin->roles()->attach($sellerRole);
        foreach ($admin_permissions as $permission) {
            $admin->permissions()->attach($permission[0]);
        }
    }
}
