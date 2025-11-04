<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserRolesTableSeeder extends Seeder
{
    public function run()
    {
        // Check if user_roles table exists
        $tableExists = DB::select("SHOW TABLES LIKE 'user_roles'");

        if (empty($tableExists)) {
            $this->command->error('user_roles table not found. Please check your migrations.');
            $this->command->info('Available tables with "role":');

            // Show available role-related tables
            $roleTables = DB::select("SHOW TABLES LIKE '%role%'");
            foreach ($roleTables as $table) {
                foreach ($table as $tableName) {
                    $this->command->info("- " . $tableName);
                }
            }

            return;
        }

        $roles = [
            // Core Roles
            ['super_admin', 'Super Administrator', 'Full system access with all permissions'],
            ['admin', 'Administrator', 'System administrator with management access'],
            ['manager', 'Manager', 'Department and project management'],
            ['supervisor', 'Supervisor', 'Team supervision and task management'],
            ['client', 'Client', 'Client access to project information'],

            // Technical Roles
            ['project_manager', 'Project Manager', 'End-to-end project management'],
            ['site_engineer', 'Site Engineer', 'Site engineering and technical supervision'],
            ['senior_engineer', 'Senior Engineer', 'Senior technical engineering role'],
            ['junior_engineer', 'Junior Engineer', 'Junior engineering support role'],
            ['design_engineer', 'Design Engineer', 'Engineering design and planning'],

            // Administrative Roles
            ['hr_manager', 'HR Manager', 'Human resources management'],
            ['hr_executive', 'HR Executive', 'HR operations and support'],
            ['finance_manager', 'Finance Manager', 'Financial management and accounting'],
            ['accountant', 'Accountant', 'Accounting and bookkeeping'],
            ['procurement_manager', 'Procurement Manager', 'Material procurement management'],

            // Site Operations
            ['site_supervisor', 'Site Supervisor', 'Site supervision and coordination'],
            ['foreman', 'Foreman', 'Team leadership on construction site'],
            ['safety_officer', 'Safety Officer', 'Site safety and compliance'],
            ['quality_controller', 'Quality Controller', 'Quality assurance and control'],
            ['store_keeper', 'Store Keeper', 'Material storage management'],

            // Support Roles
            ['logistics_manager', 'Logistics Manager', 'Logistics and transportation'],
            ['driver', 'Driver', 'Vehicle operation and transportation'],
            ['operator', 'Operator', 'Equipment operation'],
            ['technician', 'Technician', 'Technical maintenance and repair'],
            ['electrician', 'Electrician', 'Electrical work and maintenance'],

            // Trade Roles
            ['plumber', 'Plumber', 'Plumbing work and maintenance'],
            ['carpenter', 'Carpenter', 'Carpentry work'],
            ['mason', 'Mason', 'Masonry work'],
            ['painter', 'Painter', 'Painting work'],
            ['welder', 'Welder', 'Welding work'],

            // Entry Level Roles
            ['labor', 'Labor', 'General labor work'],
            ['intern', 'Intern', 'Internship role'],
            ['trainee', 'Trainee', 'Training role'],
            ['consultant', 'Consultant', 'Consultation services'],
            ['auditor', 'Auditor', 'System auditing and compliance'],
        ];

        foreach ($roles as $role) {
            DB::table('user_roles')->insert([
                'name' => $role[0],
                'display_name' => $role[1],
                'guard_name' => 'web',
                'description' => $role[2],
                'is_system' => in_array($role[0], ['super_admin', 'admin', 'manager', 'supervisor', 'client']) ? 1 : 0,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $this->command->info('Successfully seeded ' . count($roles) . ' user roles.');
    }
}
