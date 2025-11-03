<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FundingSourcesTableSeeder extends Seeder
{
    public function run()
    {
        for ($i=1; $i<=30; $i++) {
            DB::table('funding_sources')->insert([
                'name' => 'Funding Source ' . $i,
                'type_id' => rand(1,30),
                'amount' => rand(50000,1000000),
                'contact' => '03' . rand(0,9) . rand(10000000,99999999),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
