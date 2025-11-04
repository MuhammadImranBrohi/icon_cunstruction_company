<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActivityLogsTableSeeder extends Seeder
{
    public function run()
    {
        $data = [];
        $actions = ['login', 'logout', 'create', 'update', 'delete', 'view', 'approve', 'reject', 'export', 'import'];
        $models = ['User', 'Employee', 'Project', 'Task', 'Material', 'Equipment', 'Client', 'Supplier', 'Invoice', 'Expense'];

        for ($i = 1; $i <= 200; $i++) { // 200 activity logs
            $action = $actions[array_rand($actions)];
            $model = $models[array_rand($models)];
            $modelId = rand(1, 100);

            $data[] = [
                'user_id' => rand(1, 35),
                'action' => $action,
                'description' => $this->getActivityDescription($action, $model),
                'model_type' => 'App\\Models\\' . $model,
                'model_id' => $modelId,
                'ip_address' => $this->getRandomIP(),
                'user_agent' => $this->getRandomUserAgent(),
                'created_at' => $this->getRandomDateTime('2024-01-01', '2024-06-01'),
                'updated_at' => now(),
            ];
        }

        DB::table('activity_logs')->insert($data);
    }

    private function getRandomDateTime($start, $end)
    {
        return date('Y-m-d H:i:s', rand(strtotime($start), strtotime($end)));
    }

    private function getActivityDescription($action, $model)
    {
        $descriptions = [
            'login' => 'User logged into the system',
            'logout' => 'User logged out of the system',
            'create' => "Created new {$model} record",
            'update' => "Updated {$model} record",
            'delete' => "Deleted {$model} record",
            'view' => "Viewed {$model} details",
            'approve' => "Approved {$model} request",
            'reject' => "Rejected {$model} request",
            'export' => "Exported {$model} data",
            'import' => "Imported {$model} data"
        ];
        return $descriptions[$action];
    }

    private function getRandomIP()
    {
        return rand(100, 255) . '.' . rand(0, 255) . '.' . rand(0, 255) . '.' . rand(0, 255);
    }

    private function getRandomUserAgent()
    {
        $userAgents = [
            'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36',
            'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36',
            'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:89.0) Gecko/20100101 Firefox/89.0',
            'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/14.1.1 Safari/605.1.15',
            'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36'
        ];
        return $userAgents[array_rand($userAgents)];
    }
}