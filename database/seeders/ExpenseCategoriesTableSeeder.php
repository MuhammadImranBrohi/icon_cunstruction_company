<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExpenseCategoriesTableSeeder extends Seeder
{
    public function run()
    {
        $categories = [
            'Office Supplies', 'Travel', 'Utilities', 'Salaries', 'Equipment Purchase', 'Maintenance', 'Marketing', 'Training', 'Software Licenses', 'Consulting',
            'Transport', 'Insurance', 'Legal Fees', 'Communication', 'Printing', 'Events', 'Meals & Entertainment', 'Fuel', 'IT Services', 'Miscellaneous',
            'Recruitment', 'Employee Welfare', 'Subscriptions', 'Depreciation', 'Rent', 'Security', 'Cleaning', 'Healthcare', 'Stationery', 'Postage'
        ];

        foreach ($categories as $category) {
            DB::table('expense_categories')->insert([
                'name' => $category,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}