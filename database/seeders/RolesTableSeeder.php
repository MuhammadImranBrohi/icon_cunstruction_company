<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            'super-admin', 'admin', 'manager', 'supervisor', 'client',
            'project-manager', 'site-engineer', 'senior-engineer', 'junior-engineer',
            'hr-manager', 'hr-executive', 'finance-manager', 'accountant',
            'procurement-manager', 'procurement-officer', 'site-supervisor',
            'foreman', 'safety-officer', 'quality-controller', 'store-keeper',
            'logistics-manager', 'driver', 'operator', 'technician',
            'electrician', 'plumber', 'carpenter', 'mason', 'painter',
            'welder', 'labor', 'intern', 'trainee', 'consultant', 'auditor'
        ];

        foreach ($roles as $role) {
            DB::table('roles')->insert([
                'name' => $role,
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}