<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModelHasRolesTableSeeder extends Seeder
{
    public function run()
    {
        $data = [];

        // Users 1-5 ko different roles assign karo
        $roleAssignments = [
            1 => 1, // Super Admin
            2 => 2, // Admin
            3 => 3, // Manager
            4 => 4, // Supervisor
            5 => 5, // Client
        ];

        // First 5 users ko specific roles
        foreach ($roleAssignments as $userId => $roleId) {
            $data[] = [
                'role_id' => $roleId,
                'model_type' => 'App\Models\User',
                'model_id' => $userId,
            ];
        }

        // Remaining users ko random roles (1-4)
        for ($i = 6; $i <= 35; $i++) {
            $data[] = [
                'role_id' => rand(1, 4), // Only admin, manager, supervisor, client
                'model_type' => 'App\Models\User',
                'model_id' => $i,
            ];
        }

        DB::table('model_has_roles')->insert($data);
    }
}
