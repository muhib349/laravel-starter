<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->truncate();
        DB::table('permission_role')->truncate();

        $roles = [
            [
                'name' => 'admin',
                'display_name' => 'Admin',
                'created_at' => now(),
            ],
            [
                'name' => 'hardware_team',
                'display_name' => 'Hardware Team',
                'created_at' => now(),
            ],
            [
                'name' => 'app_team',
                'display_name' => 'App Team',
                'created_at' => now(),
            ],

        ];

        DB::table('roles')->insert($roles);

        $permissions = DB::table('permissions')->get();
        $rolePermissions = [];
        foreach ($permissions as $permission) {
            $rolePermissions[] = ['permission_id'=>$permission->id, 'role_id'=>1, 'created_at' => now(), 'updated_at' => now()];
        }

        DB::table('permission_role')->insert($rolePermissions);
    }
}
