<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EquipmentCategoriesTableSeeder extends Seeder
{
    public function run()
    {
        $categories = [
            'Earth Moving Equipment', 'Concrete Equipment', 'Lifting Equipment',
            'Transportation Equipment', 'Excavation Equipment', 'Compaction Equipment',
            'Piling Equipment', 'Crane Systems', 'Hoisting Equipment', 'Conveying Systems',
            'Mixing Equipment', 'Pumping Equipment', 'Drilling Equipment', 'Breaking Equipment',
            'Cutting Equipment', 'Welding Equipment', 'Power Tools', 'Hand Tools',
            'Safety Equipment', 'Measuring Instruments', 'Testing Equipment', 'Scaffolding',
            'Formwork Systems', 'Shoring Equipment', 'Trenching Equipment', 'Grading Equipment',
            'Paving Equipment', 'Dredging Equipment', 'Tunneling Equipment', 'Mining Equipment',
            'Agricultural Equipment', 'Forestry Equipment', 'Material Handling', 'Warehouse Equipment',
            'Environmental Equipment'
        ];

        foreach ($categories as $category) {
            DB::table('equipment_categories')->insert([
                'name' => $category,
                'description' => $category . ' for construction and industrial use',
                'is_active' => 1,
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}