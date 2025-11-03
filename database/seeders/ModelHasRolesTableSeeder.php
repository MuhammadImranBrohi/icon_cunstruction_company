<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModelHasRolesTableSeeder extends Seeder
{
    public function run()
    {
        // Admin
        DB::table('model_has_roles')->insert([
            'role_id' => 1,
            'model_type' => 'App\\Models\\User',
            'model_id' => 1,
        ]);

        // Manager
        DB::table('model_has_roles')->insert([
            'role_id' => 2,
            'model_type' => 'App\\Models\\User',
            'model_id' => 2,
        ]);

        // Accountant
        DB::table('model_has_roles')->insert([
            'role_id' => 4,
            'model_type' => 'App\\Models\\User',
            'model_id' => 3,
        ]);

        // HR
        DB::table('model_has_roles')->insert([
            'role_id' => 5,
            'model_type' => 'App\\Models\\User',
            'model_id' => 4,
        ]);

        // Employees
        for ($i = 5; $i <= 35; $i++) {
            DB::table('model_has_roles')->insert([
                'role_id' => 3,
                'model_type' => 'App\\Models\\User',
                'model_id' => $i,
            ]);
        }
    }
}