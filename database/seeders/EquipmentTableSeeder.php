<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EquipmentTableSeeder extends Seeder
{
    public function run()
    {
        $equipmentNames = [
            'Laptop', 'Desktop PC', 'Printer', 'Router', 'Excavator', 'Forklift', 'Drill Machine', 'Projector', 'Scanner', 'Camera',
            'Air Conditioner', 'Heater', 'Desk Chair', 'Whiteboard', 'Laptop Stand', 'Server Rack', 'CNC Machine', '3D Printer', 'UPS', 'Switch',
            'Tablet', 'Smartphone', 'Microscope', 'Multimeter', 'Welder', 'Power Saw', 'Chainsaw', 'Vacuum Cleaner', 'Generator', 'Water Pump'
        ];

        foreach ($equipmentNames as $eq) {
            DB::table('equipment')->insert([
                'name' => $eq,
                'category_id' => rand(1,30),
                'quantity' => rand(1,20),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}