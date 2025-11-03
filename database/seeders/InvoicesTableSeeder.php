<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InvoicesTableSeeder extends Seeder
{
    public function run()
    {
        for ($i=1; $i<=50; $i++) {
            DB::table('invoices')->insert([
                'client_id' => rand(1,30),
                'project_id' => rand(1,30),
                'amount' => rand(10000,200000),
                'due_date' => now()->addDays(rand(5,60)),
                'status' => ['Paid','Pending','Overdue'][rand(0,2)],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}