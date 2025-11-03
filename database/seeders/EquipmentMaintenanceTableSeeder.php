<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EquipmentMaintenanceTableSeeder extends Seeder
{
    public function run()
    {
        for ($i=1; $i<=50; $i++) {
            DB::table('equipment_maintenance')->insert([
                'equipment_id' => rand(1,30),
                'maintenance_date' => now()->subDays(rand(1,100)),
                'cost' => rand(500,50000),
                'description' => 'Maintenance task for equipment ' . $i,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
