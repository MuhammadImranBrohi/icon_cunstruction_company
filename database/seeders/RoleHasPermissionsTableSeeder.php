<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleHasPermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $data = [];

        // Get all permissions
        $permissions = DB::table('permissions')->pluck('id')->toArray();

        // Role-Permission mappings
        $rolePermissions = [
            // Super Admin - All permissions
            1 => range(1, count($permissions)),

            // Admin - Most permissions except sensitive ones
            2 => array_merge(
                range(1, 8),   // User Management
                range(9, 16),  // Employee Management
                range(17, 26), // Project Management
                range(27, 34), // Task Management
                range(35, 42), // Financial Management
                range(43, 50), // Material Management
                range(51, 58), // Equipment Management
                [59, 60, 62, 64] // Limited System Settings
            ),

            // Manager - Project and team management
            3 => array_merge(
                range(17, 26), // Project Management
                range(27, 34), // Task Management
                range(35, 38), // Basic Financial
                range(43, 46), // Basic Material
                range(51, 54), // Basic Equipment
                [59] // View Settings
            ),

            // Supervisor - Team supervision
            4 => array_merge(
                [17, 18, 21, 25], // Limited Project
                range(27, 32),     // Task Management
                [35, 43, 51, 59]   // Basic views
            ),

            // Client - Limited access
            5 => [17, 25, 35, 37, 59] // View projects, reports, finances
        ];

        // Assign permissions to roles
        foreach ($rolePermissions as $roleId => $permissionIds) {
            foreach ($permissionIds as $permissionIndex) {
                if (isset($permissions[$permissionIndex - 1])) {
                    $data[] = [
                        'permission_id' => $permissions[$permissionIndex - 1],
                        'role_id' => $roleId,
                    ];
                }
            }
        }

        // Assign basic view permissions to remaining roles (6-35)
        $basicPermissions = [1, 9, 17, 27, 35, 43, 51, 59]; // Basic view permissions

        for ($roleId = 6; $roleId <= 35; $roleId++) {
            foreach ($basicPermissions as $permissionIndex) {
                if (isset($permissions[$permissionIndex - 1])) {
                    $data[] = [
                        'permission_id' => $permissions[$permissionIndex - 1],
                        'role_id' => $roleId,
                    ];
                }
            }
        }

        DB::table('role_has_permissions')->insert($data);
    }
}
