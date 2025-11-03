<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModelHasPermissionsTableSeeder extends Seeder
{
    public function run()
    {
        // Example: Admin specific permissions
        $permissions = DB::table('permissions')->pluck('id');

        foreach ($permissions as $perm) {
            DB::table('model_has_permissions')->insert([
                'permission_id' => $perm,
                'model_type' => 'App\\Models\\User',
                'model_id' => 1, // Admin
            ]);
        }
    }
}
