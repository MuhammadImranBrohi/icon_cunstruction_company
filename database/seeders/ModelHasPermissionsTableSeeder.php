<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModelHasPermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $data = [];
        $permissions = DB::table('permissions')->pluck('id')->toArray();

        // Super Admin (user_id=1) ko sab permissions
        foreach ($permissions as $permissionId) {
            $data[] = [
                'permission_id' => $permissionId,
                'model_type' => 'App\Models\User',
                'model_id' => 1,
            ];
        }

        // Admin (user_id=2) ko major permissions
        $adminPermissions = array_slice($permissions, 0, 35); // First 35 permissions
        foreach ($adminPermissions as $permissionId) {
            $data[] = [
                'permission_id' => $permissionId,
                'model_type' => 'App\Models\User',
                'model_id' => 2,
            ];
        }

        // Manager (user_id=3) ko project related permissions
        $managerPermissions = array_filter($permissions, function($id) {
            return $id >= 17 && $id <= 26; // Project management permissions
        });
        foreach ($managerPermissions as $permissionId) {
            $data[] = [
                'permission_id' => $permissionId,
                'model_type' => 'App\Models\User',
                'model_id' => 3,
            ];
        }

        DB::table('model_has_permissions')->insert($data);
    }
}
