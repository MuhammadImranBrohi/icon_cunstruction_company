<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectTeamTableSeeder extends Seeder
{
    public function run()
    {
        for ($i=1; $i<=50; $i++) { // Multiple employees per project
            DB::table('project_team')->insert([
                'project_id' => rand(1,30),
                'employee_id' => rand(1,30),
                'role' => ['Team Lead','Developer','Designer','Tester','Analyst'][rand(0,4)],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
