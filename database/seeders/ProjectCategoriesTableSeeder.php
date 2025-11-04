<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectCategoriesTableSeeder extends Seeder
{
    public function run()
    {
        $categories = [
            'Residential Buildings', 'Commercial Complexes', 'Industrial Facilities',
            'Infrastructure Projects', 'Renovation Works', 'Government Projects',
            'Educational Institutions', 'Healthcare Facilities', 'Hospitality Projects',
            'Retail Spaces', 'Warehouse Construction', 'Office Buildings',
            'Apartment Complexes', 'Villa Projects', 'Township Development',
            'Road Construction', 'Bridge Construction', 'Dam Construction',
            'Airport Projects', 'Railway Projects', 'Water Treatment Plants',
            'Power Plants', 'Telecom Towers', 'Sports Complexes',
            'Religious Buildings', 'Cultural Centers', 'Park Development',
            'Swimming Pools', 'Landscaping Projects', 'Interior Works',
            'Exterior Finishing', 'Structural Works', 'MEP Works',
            'Foundation Works', 'Roofing Projects'
        ];

        foreach ($categories as $category) {
            DB::table('project_categories')->insert([
                'name' => $category,
                'description' => 'Construction projects related to ' . strtolower($category),
                'is_active' => 1,
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
