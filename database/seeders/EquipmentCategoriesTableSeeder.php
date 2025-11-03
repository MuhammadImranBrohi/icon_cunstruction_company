<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EquipmentCategoriesTableSeeder extends Seeder
{
    public function run()
    {
        $categories = [
            'Computers', 'Printers', 'Networking', 'Construction', 'Vehicles', 'Tools', 'Furniture', 'Lab Equipment', 'Medical', 'Electrical',
            'Mechanical', 'Audio/Visual', 'Cameras', 'Software Licenses', 'Office Machines', 'Heavy Machinery', 'Kitchen Equipment', 'Fitness Equipment', 'Safety Gear', 'Miscellaneous',
            'Cables', 'Lighting', 'Heating/Cooling', 'Generators', 'Power Tools', 'Survey Equipment', 'Testing Equipment', 'Communication Devices', 'Storage Equipment', 'Packaging Machines'
        ];

        foreach ($categories as $category) {
            DB::table('equipment_categories')->insert([
                'name' => $category,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}