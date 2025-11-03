<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleHasPermissionsTableSeeder extends Seeder
{
    public function run()
    {
        // Admin ko sab permissions milte hain
        $permissions = DB::table('permissions')->pluck('id');
        foreach ($permissions as $perm) {
            DB::table('role_has_permissions')->insert([
                'role_id' => 1, // Admin
                'permission_id' => $perm,
            ]);
        }

        // Manager ko limited permissions
        for ($i = 1; $i <= 20; $i++) {
            DB::table('role_has_permissions')->insert([
                'role_id' => 2, // Manager
                'permission_id' => $i,
            ]);
        }
    }
}
