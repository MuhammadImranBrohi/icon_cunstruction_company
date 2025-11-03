<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActivityLogsTableSeeder extends Seeder
{
    public function run()
    {
        for ($i=1; $i<=50; $i++) {
            DB::table('activity_logs')->insert([
                'user_id' => rand(1,30),
                'action' => ['Created','Updated','Deleted','Viewed'][rand(0,3)],
                'model' => ['Project','Task','Employee','Client','Invoice','Expense'][rand(0,5)],
                'description' => 'User performed an action',
                'created_at' => now()->subDays(rand(0,50)),
                'updated_at' => now(),
            ]);
        }
    }
}