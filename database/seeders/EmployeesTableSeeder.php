<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EmployeesTableSeeder extends Seeder
{
    public function run()
    {
        $firstNames = ['Ali', 'Ahmed', 'Fatima', 'Ayesha', 'Hassan', 'Hussain', 'Zainab', 'Sadia', 'Owais', 'Sarah', 'Imran', 'Usman', 'Noor', 'Zoya', 'Bilal'];
        $lastNames = ['Khan', 'Ali', 'Ahmed', 'Raza', 'Qureshi', 'Hussain', 'Malik', 'Farooq', 'Javed', 'Shah', 'Aslam', 'Siddiqui'];

        for ($i = 1; $i <= 30; $i++) {
            $first = $firstNames[array_rand($firstNames)];
            $last = $lastNames[array_rand($lastNames)];
            $name = $first . ' ' . $last;
            $email = strtolower($first) . $i . '@example.com';
            $phone = '03' . rand(0,9) . rand(10000000,99999999);
            DB::table('employees')->insert([
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'department_id' => rand(1,30),
                'designation_id' => rand(1,30),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}