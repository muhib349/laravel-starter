<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        DB::table('role_user')->truncate();

        $users = [
            [
                'first_name' => 'Admin',
                'last_name' => 'User',
                'email' => 'admin@email.com',
                'password' => bcrypt('admin123'),
                'created_at' => now(),
            ],
            [
                'first_name' => 'Mehedi',
                'last_name' => 'Hasan',
                'email' => 'mehedi@email.com',
                'password' => bcrypt('111111'),
                'created_at' => now(),
            ],
        ];

        DB::table('users')->insert($users);

        $roles = DB::table('roles')->get();
        $roleUsers = [];
        foreach ($roles as $role) {
            $roleUsers[] = ['role_id'=>$role->id, 'user_id'=>1, 'created_at' => now(), 'updated_at' => now()];
        }

        DB::table('role_user')->insert($roleUsers);
    }
}
