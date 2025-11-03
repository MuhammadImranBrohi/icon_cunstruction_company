<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SuppliersTableSeeder extends Seeder
{
    public function run()
    {
        for ($i=1; $i<=30; $i++) {
            DB::table('suppliers')->insert([
                'name' => 'Supplier ' . $i,
                'email' => 'supplier' . $i . '@example.com',
                'phone' => '03' . rand(0,9) . rand(10000000,99999999),
                'address' => $i . ' Street, City, Country',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
