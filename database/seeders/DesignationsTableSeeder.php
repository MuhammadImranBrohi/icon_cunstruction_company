<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DesignationsTableSeeder extends Seeder
{
    public function run()
    {
        $designations = [
            'Manager', 'Senior Developer', 'Junior Developer', 'Accountant', 'HR Executive', 'Marketing Executive', 'Team Lead',
            'Intern', 'Project Manager', 'Business Analyst', 'Designer', 'QA Engineer', 'Support Engineer', 'Operations Manager',
            'Sales Executive', 'Data Scientist', 'System Administrator', 'Legal Advisor', 'Procurement Officer', 'Trainer',
            'Security Officer', 'Production Supervisor', 'Researcher', 'Financial Analyst', 'Content Writer', 'PR Manager',
            'Innovation Lead', 'Maintenance Engineer', 'Facilities Manager', 'Executive Assistant'
        ];

        $departmentIds = [1, 2, 3, 4]; // Departments IDs jo pehle seed hon gaye hain

        foreach ($designations as $index => $name) {
            DB::table('designations')->insert([
                'name' => $name,
                'code' => strtoupper(substr(str_replace(' ', '_', $name), 0, 10)), // Example: MANAGER, SENIOR_DEV, etc.
                'department_id' => $departmentIds[$index % count($departmentIds)], // Rotate through department IDs
                'description' => $name . ' role description',
                'salary_range_min' => rand(30000, 80000),
                'salary_range_max' => rand(90000, 200000),
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}