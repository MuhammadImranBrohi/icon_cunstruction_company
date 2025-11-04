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
            'Innovation', 'Data Science', 'Analytics', 'Engineering', 'Maintenance', 'Security', 'Accounts', 'Facilities', 'Communications'
        ];

        $usedCodes = []; // Track used codes to avoid duplicates

        foreach ($departments as $dept) {
            // Unique code generate karo
            $code = $this->generateUniqueCode($dept, $usedCodes);
            $usedCodes[] = $code; // Mark code as used

            DB::table('departments')->insert([
                'name' => $dept,
                'code' => $code,
                'description' => $dept . ' Department - Responsible for all ' . $dept . ' related activities',
                'head_id' => null, // Required column, set to null
                'is_active' => 1,
                'created_by' => null, // Required column, set to null
                'updated_by' => null, // Required column, set to null
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    private function generateUniqueCode($dept, $usedCodes)
    {
        $baseCode = strtoupper(substr(str_replace(' ', '', $dept), 0, 4));

        // Special cases handle karo
        $specialCases = [
            'Customer Support' => 'CUST',
            'Quality Assurance' => 'QA',
            'Research & Development' => 'RND',
            'Public Relations' => 'PR',
            'Business Development' => 'BD',
            'Data Science' => 'DATA',
        ];

        if (isset($specialCases[$dept])) {
            $baseCode = $specialCases[$dept];
        }

        // Agar code already used hai, toh number add karo
        $code = $baseCode;
        $counter = 1;

        while (in_array($code, $usedCodes)) {
            $code = $baseCode . $counter;
            $counter++;
        }

        return $code;
    }
}
