<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectEquipmentTableSeeder extends Seeder
{
    public function run()
    {
        for ($i=1; $i<=30; $i++) {
            DB::table('project_equipment')->insert([
                'project_id' => rand(1,30),
                'equipment_id' => rand(1,20),
                'quantity' => rand(1,10),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
