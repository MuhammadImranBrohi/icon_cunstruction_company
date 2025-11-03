<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LoansTableSeeder extends Seeder
{
    public function run()
    {
        for ($i=1; $i<=50; $i++) {
            DB::table('loans')->insert([
                'type_id' => rand(1,30),
                'amount' => rand(50000,500000),
                'borrower_id' => rand(1,30),
                'interest_rate' => rand(5,15),
                'start_date' => now()->subDays(rand(30,200)),
                'end_date' => now()->addDays(rand(30,365)),
                'status' => ['Approved','Pending','Rejected','Paid'][rand(0,3)],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}