<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentsTableSeeder extends Seeder
{
    public function run()
    {
        $departments = [
            'HR', 'Finance', 'IT', 'Marketing', 'Operations', 'Sales', 'Customer Support', 'Legal', 'Procurement', 'R&D',
            'Logistics', 'Quality Assurance', 'Admin', 'Business Development', 'Strategy', 'Design', 'Production', 'Training', 'Public Relations', 'Compliance',
            'Innovation', 'Data Science', 'Analytics', 'Engineering', 'Maintenance', 'Security', 'Accounts', 'Procurement', 'Facilities', 'Communications'
        ];

        foreach ($departments as $dept) {
            DB::table('departments')->insert([
                'name' => $dept,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
