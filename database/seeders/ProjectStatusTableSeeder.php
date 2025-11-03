<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectStatusTableSeeder extends Seeder
{
    public function run()
    {
        $statuses = ['Planned', 'Ongoing', 'Completed', 'On Hold', 'Cancelled', 'Delayed', 'Under Review', 'Approved', 'In Testing', 'Deployment'];

        foreach ($statuses as $status) {
            DB::table('project_statuses')->insert([
                'status' => $status,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}