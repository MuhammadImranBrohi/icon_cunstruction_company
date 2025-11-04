<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeesTableSeeder extends Seeder
{
    public function run()
    {
        $firstNames = ['Ali', 'Ahmed', 'Muhammad', 'Hassan', 'Hussain', 'Usman', 'Omar', 'Bilal', 'Saad', 'Zain', 'Abdullah', 'Ibrahim', 'Yusuf', 'Hamza', 'Khalid', 'Rashid', 'Farhan', 'Waqas', 'Asim', 'Nasir', 'Tariq', 'Kamran', 'Faisal', 'Shahid', 'Noman', 'Salman', 'Adnan', 'Javed', 'Imran', 'Shoaib'];
        $lastNames = ['Khan', 'Ahmed', 'Ali', 'Raza', 'Hussain', 'Malik', 'Qureshi', 'Farooqi', 'Sheikh', 'Chaudhry', 'Butt', 'Mirza', 'Baig', 'Shah', 'Abbasi', 'Rashid', 'Khalid', 'Iqbal', 'Younis', 'Siddiqui', 'Hashmi', 'Jamil', 'Rafique', 'Saeed', 'Hameed', 'Akhtar', 'Nawaz', 'Kareem', 'Zaman', 'Waseem'];

        $employmentTypes = ['permanent', 'contract', 'probation'];
        $bankNames = ['HBL', 'UBL', 'MCB', 'ABL', 'NBP', 'Allied Bank', 'Bank Alfalah', 'Standard Chartered'];

        // Get existing department and designation IDs
        $departmentIds = DB::table('departments')->pluck('id')->toArray();
        $designationIds = DB::table('designations')->pluck('id')->toArray();
        $userIds = DB::table('users')->pluck('id')->toArray();

        for ($i = 0; $i < 35; $i++) {
            $firstName = $firstNames[array_rand($firstNames)];
            $lastName = $lastNames[array_rand($lastNames)];

            // Use only existing IDs
            $userId = $userIds[$i] ?? ($i + 1);
            $departmentId = $departmentIds[array_rand($departmentIds)] ?? 1;
            $designationId = $designationIds[array_rand($designationIds)] ?? 1;

            DB::table('employees')->insert([
                'user_id' => $userId,
                'employee_code' => 'EMP-' . str_pad(($i + 1), 3, '0', STR_PAD_LEFT),
                'first_name' => $firstName,
                'last_name' => $lastName,
                'father_name' => $firstNames[array_rand($firstNames)] . ' ' . $lastNames[array_rand($lastNames)],
                'cnic' => rand(10000, 99999) . '-' . rand(1000000, 9999999) . '-' . rand(1, 9),
                'phone' => '03' . rand(10, 99) . rand(1000000, 9999999),
                'personal_email' => strtolower($firstName) . '.' . strtolower($lastName) . ($i + 1) . '@gmail.com',
                'emergency_contact' => '03' . rand(10, 99) . rand(1000000, 9999999),
                'emergency_contact_name' => $firstNames[array_rand($firstNames)] . ' ' . $lastNames[array_rand($lastNames)],
                'hire_date' => $this->getRandomDate('2020-01-01', '2024-06-01'),
                'salary' => rand(30000, 150000),
                'department_id' => $departmentId,
                'designation_id' => $designationId,
                'reporting_to' => $i > 0 ? rand(1, $i) : null,
                'employment_type' => $employmentTypes[array_rand($employmentTypes)],
                'bank_account_number' => rand(10000000000, 99999999999),
                'bank_name' => $bankNames[array_rand($bankNames)],
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    private function getRandomDate($start, $end)
    {
        return date('Y-m-d', rand(strtotime($start), strtotime($end)));
    }
}
