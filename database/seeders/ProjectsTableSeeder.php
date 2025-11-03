<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProjectsTableSeeder extends Seeder
{
    public function run()
    {
        for ($i=1; $i<=30; $i++) {
            DB::table('projects')->insert([
                'title' => 'Project ' . Str::random(5) . ' ' . $i,
                'category_id' => rand(1,30),
                'status_id' => rand(1,10),
                'client_id' => rand(1,30),
                'start_date' => now()->subDays(rand(1,100)),
                'end_date' => now()->addDays(rand(10,200)),
                'budget' => rand(50000,500000),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
