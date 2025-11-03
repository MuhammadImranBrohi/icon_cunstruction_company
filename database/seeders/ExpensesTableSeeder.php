<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExpensesTableSeeder extends Seeder
{
    public function run()
    {
        for ($i=1; $i<=50; $i++) {
            DB::table('expenses')->insert([
                'category_id' => rand(1,30),
                'project_id' => rand(1,30),
                'amount' => rand(1000,50000),
                'description' => 'Expense for ' . ['Office Supplies','Travel','Maintenance','Marketing','Training'][rand(0,4)],
                'date' => now()->subDays(rand(1,100)),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
