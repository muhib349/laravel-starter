<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->truncate();

        $permissions = [
            [ 'name' => 'customer-list','display_name' => 'Customers List', 'group_name'=> 'customers', 'created_at' => now()],
            [ 'name' => 'customer-create','display_name' => 'Create Customer', 'group_name'=> 'customers', 'created_at' => now()],
            [ 'name' => 'customer-edit','display_name' => 'Edit Customer', 'group_name'=> 'customers', 'created_at' => now()],
            [ 'name' => 'customer-delete','display_name' => 'Delete Customer', 'group_name'=> 'customers', 'created_at' => now()],
            [ 'name' => 'customer-show','display_name' => 'Show Customer', 'group_name'=> 'customers', 'created_at' => now()],

            [ 'name' => 'user-list','display_name' => 'Users List', 'group_name'=> 'users', 'created_at' => now()],
            [ 'name' => 'user-create','display_name' => 'Create User', 'group_name'=> 'users', 'created_at' => now()],
            [ 'name' => 'user-edit','display_name' => 'Edit User', 'group_name'=> 'users', 'created_at' => now()],
            [ 'name' => 'user-show','display_name' => 'Show User', 'group_name'=> 'users', 'created_at' => now()],

            [ 'name' => 'role-list','display_name' => 'Roles List', 'group_name'=> 'roles', 'created_at' => now()],
            [ 'name' => 'role-create','display_name' => 'Create Role', 'group_name'=> 'roles', 'created_at' => now()],
            [ 'name' => 'role-edit','display_name' => 'Edit Role', 'group_name'=> 'roles', 'created_at' => now()],
            [ 'name' => 'role-show','display_name' => 'Show Role', 'group_name'=> 'roles', 'created_at' => now()],
            [ 'name' => 'role-permissions-list','display_name' => 'Roles Permissions List', 'group_name'=> 'roles', 'created_at' => now()],
            [ 'name' => 'role-permissions-assign','display_name' => 'Assign permissions to Role', 'group_name'=> 'roles', 'created_at' => now()],

            [ 'name' => 'permission-list','display_name' => 'Permissions List', 'group_name'=> 'permissions', 'created_at' => now()],

        ];

        DB::table('permissions')->insert($permissions);
    }
}
