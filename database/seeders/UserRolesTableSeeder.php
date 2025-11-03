<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserRolesTableSeeder extends Seeder
{
    public function run()
    {
        // Assign main users to roles
        DB::table('user_roles')->insert([
            ['user_id' => 1, 'role_id' => 1],
            ['user_id' => 2, 'role_id' => 2],
            ['user_id' => 3, 'role_id' => 4],
            ['user_id' => 4, 'role_id' => 5],
        ]);

        // Employees
        for ($i = 5; $i <= 35; $i++) {
            DB::table('user_roles')->insert([
                'user_id' => $i,
                'role_id' => 3,
            ]);
        }
    }
}