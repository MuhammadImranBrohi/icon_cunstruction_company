<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttendanceTableSeeder extends Seeder
{
    public function run()
    {
        for ($i=1; $i<=100; $i++) {
            DB::table('attendance')->insert([
                'employee_id' => rand(1,30),
                'date' => now()->subDays(rand(0,60)),
                'status' => ['Present','Absent','Leave','Remote'][rand(0,3)],
                'check_in' => now()->subHours(rand(0,2))->format('H:i:s'),
                'check_out' => now()->addHours(rand(6,9))->format('H:i:s'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
