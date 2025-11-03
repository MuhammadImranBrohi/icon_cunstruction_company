<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TasksTableSeeder extends Seeder
{
    public function run()
    {
        for ($i=1; $i<=50; $i++) {
            DB::table('tasks')->insert([
                'project_id' => rand(1,30),
                'assigned_to' => rand(1,30),
                'title' => 'Task ' . $i . ' - ' . ['Design','Development','Testing','Documentation','Deployment'][rand(0,4)],
                'description' => 'This is a task description for task ' . $i,
                'status' => ['Pending','In Progress','Completed','On Hold'][rand(0,3)],
                'priority' => ['Low','Medium','High','Critical'][rand(0,3)],
                'start_date' => now()->subDays(rand(0,20)),
                'due_date' => now()->addDays(rand(5,50)),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}