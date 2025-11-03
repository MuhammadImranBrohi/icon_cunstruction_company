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

        foreach ($designations as $title) {
            DB::table('designations')->insert([
                'title' => $title,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
