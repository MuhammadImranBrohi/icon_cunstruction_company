<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectCategoriesTableSeeder extends Seeder
{
    public function run()
    {
        $categories = [
            'Software Development', 'Construction', 'Marketing Campaign', 'Research & Development', 'IT Infrastructure',
            'Event Management', 'Product Design', 'Consulting', 'Financial Services', 'Education', 'Healthcare', 'Logistics',
            'Manufacturing', 'Media Production', 'Telecom', 'Energy', 'Retail', 'E-commerce', 'Legal Services', 'Hospitality',
            'Engineering', 'Data Analytics', 'Mobile App', 'Web Development', 'AI Project', 'Blockchain', 'Cybersecurity', 'Automation', 'Cloud Services', 'Gaming'
        ];

        foreach ($categories as $category) {
            DB::table('project_categories')->insert([
                'name' => $category,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}