<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LeavesTableSeeder extends Seeder
{
    public function run()
    {
        for ($i=1; $i<=50; $i++) {
            DB::table('leaves')->insert([
                'employee_id' => rand(1,30),
                'leave_type_id' => rand(1,20),
                'start_date' => now()->subDays(rand(10,100)),
                'end_date' => now()->subDays(rand(1,9)),
                'status' => ['Approved','Pending','Rejected'][rand(0,2)],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}