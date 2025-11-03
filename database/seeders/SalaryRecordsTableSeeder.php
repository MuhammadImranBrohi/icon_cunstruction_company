<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SalaryRecordsTableSeeder extends Seeder
{
    public function run()
    {
        for ($i=1; $i<=30; $i++) {
            DB::table('salary_records')->insert([
                'employee_id' => rand(1,30),
                'month' => date('Y-m', strtotime("-$i month")),
                'amount' => rand(30000,150000),
                'status' => ['Paid','Pending'][rand(0,1)],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
