<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            ['name' => 'Admin User', 'email' => 'admin@example.com', 'role_id' => 1],
            ['name' => 'Project Manager', 'email' => 'manager@example.com', 'role_id' => 2],
            ['name' => 'Accountant Ali', 'email' => 'accountant@example.com', 'role_id' => 4],
            ['name' => 'HR Sana', 'email' => 'hr@example.com', 'role_id' => 5],
        ];

        foreach ($users as $user) {
            DB::table('users')->insert([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Generate 30 random employees
        for ($i = 1; $i <= 30; $i++) {
            DB::table('users')->insert([
                'name' => 'Employee ' . $i,
                'email' => 'employee' . $i . '@example.com',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}