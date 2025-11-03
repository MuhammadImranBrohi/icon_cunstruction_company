<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaterialPurchasesTableSeeder extends Seeder
{
    public function run()
    {
        for ($i=1; $i<=50; $i++) {
            DB::table('material_purchases')->insert([
                'material_id' => rand(1,30),
                'quantity' => rand(10,500),
                'purchase_date' => now()->subDays(rand(1,100)),
                'cost' => rand(500,50000),
                'supplier_id' => rand(1,30),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
