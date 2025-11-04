<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectTeamTableSeeder extends Seeder
{
    public function run()
    {
        $data = [];
        $roles = ['supervisor', 'engineer', 'foreman', 'worker', 'other'];

        // Each project gets 5-15 team members
        for ($projectId = 1; $projectId <= 35; $projectId++) {
            $teamSize = rand(5, 15);
            $assignedEmployees = [];

            for ($j = 0; $j < $teamSize; $j++) {
                $employeeId = rand(1, 35);

                // Ensure unique employees per project
                while (in_array($employeeId, $assignedEmployees)) {
                    $employeeId = rand(1, 35);
                }
                $assignedEmployees[] = $employeeId;

                $data[] = [
                    'project_id' => $projectId,
                    'employee_id' => $employeeId,
                    'role' => $roles[array_rand($roles)],
                    'start_date' => $this->getRandomDate('2023-01-01', '2024-06-01'),
                    'end_date' => rand(0, 1) ? $this->getRandomDate('2024-07-01', '2025-12-31') : null,
                    'is_active' => 1,
                    'created_by' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        // Insert in chunks
        foreach (array_chunk($data, 50) as $chunk) {
            DB::table('project_team')->insert($chunk);
        }
    }

    private function getRandomDate($start, $end)
    {
        return date('Y-m-d', rand(strtotime($start), strtotime($end)));
    }
}