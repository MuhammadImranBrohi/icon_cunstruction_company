<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientPaymentsTableSeeder extends Seeder
{
    public function run()
    {
        for ($i=1; $i<=50; $i++) {
            DB::table('client_payments')->insert([
                'client_id' => rand(1,30),
                'project_id' => rand(1,30),
                'amount' => rand(10000,200000),
                'payment_date' => now()->subDays(rand(1,100)),
                'method' => ['Cash','Bank Transfer','Cheque','Credit Card'][rand(0,3)],
                'status' => ['Paid','Pending','Overdue'][rand(0,2)],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
