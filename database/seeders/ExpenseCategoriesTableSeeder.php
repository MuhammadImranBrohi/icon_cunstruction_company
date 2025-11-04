<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExpenseCategoriesTableSeeder extends Seeder
{
    public function run()
    {
        $categories = [
            // Level 1 Categories
            ['Labor Costs', null, 'Employee wages, benefits, and labor expenses'],
            ['Material Costs', null, 'Construction materials and supplies'],
            ['Equipment Costs', null, 'Equipment rental, maintenance, and operation'],
            ['Overhead Costs', null, 'Administrative and general expenses'],
            ['Subcontractor Costs', null, 'Payments to subcontractors and vendors'],

            // Level 2 - Under Labor Costs
            ['Wages and Salaries', 1, 'Employee wages and salary payments'],
            ['Overtime Payments', 1, 'Overtime and extra time payments'],
            ['Employee Benefits', 1, 'Health insurance, provident fund, etc.'],
            ['Training and Development', 1, 'Employee training programs'],
            ['Recruitment Costs', 1, 'Hiring and recruitment expenses'],

            // Level 2 - Under Material Costs
            ['Cement and Concrete', 2, 'Cement, concrete, and related materials'],
            ['Steel and Reinforcement', 2, 'Steel bars, mesh, and reinforcement'],
            ['Bricks and Blocks', 2, 'Bricks, blocks, and masonry materials'],
            ['Electrical Materials', 2, 'Wires, cables, fixtures, and electrical items'],
            ['Plumbing Materials', 2, 'Pipes, fittings, and plumbing supplies'],

            // Level 2 - Under Equipment Costs
            ['Equipment Rental', 3, 'Heavy machinery and equipment rental'],
            ['Fuel and Lubricants', 3, 'Fuel, diesel, and lubricants for equipment'],
            ['Equipment Maintenance', 3, 'Repairs and maintenance of equipment'],
            ['Equipment Insurance', 3, 'Insurance premiums for equipment'],
            ['Equipment Depreciation', 3, 'Depreciation costs for owned equipment'],

            // Level 2 - Under Overhead Costs
            ['Office Rent', 4, 'Office space rental costs'],
            ['Utilities', 4, 'Electricity, water, gas, and internet'],
            ['Office Supplies', 4, 'Stationery and office materials'],
            ['Professional Fees', 4, 'Legal, accounting, and consulting fees'],
            ['Marketing and Advertising', 4, 'Promotion and advertising expenses'],

            // Level 2 - Under Subcontractor Costs
            ['Electrical Work', 5, 'Payments to electrical subcontractors'],
            ['Plumbing Work', 5, 'Payments to plumbing subcontractors'],
            ['Carpentry Work', 5, 'Payments to carpentry subcontractors'],
            ['Masonry Work', 5, 'Payments to masonry subcontractors'],
            ['Painting Work', 5, 'Payments to painting subcontractors'],

            // Additional categories
            ['Transportation', null, 'Vehicle and transportation costs'],
            ['Safety Equipment', null, 'Safety gear and equipment'],
            ['Quality Control', null, 'Testing and quality assurance'],
            ['Waste Management', null, 'Waste disposal and management'],
            ['Miscellaneous', null, 'Other miscellaneous expenses'],
        ];

        foreach ($categories as $category) {
            DB::table('expense_categories')->insert([
                'name' => $category[0],
                'parent_id' => $category[1],
                'description' => $category[2],
                'is_active' => 1,
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}