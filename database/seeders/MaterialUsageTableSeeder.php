<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaterialUsageTableSeeder extends Seeder
{
    public function run()
    {
        for ($i=1; $i<=50; $i++) {
            DB::table('material_usage')->insert([
                'material_id' => rand(1,30),
                'project_id' => rand(1,30),
                'quantity' => rand(1,100),
                'used_date' => now()->subDays(rand(1,50)),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
