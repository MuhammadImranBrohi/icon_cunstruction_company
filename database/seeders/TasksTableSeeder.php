<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TasksTableSeeder extends Seeder
{
    public function run()
    {
        $taskTitles = [
            'Site Survey and Analysis', 'Soil Testing', 'Foundation Design',
            'Structural Design', 'Architectural Planning', 'MEP Design',
            'Obtain Building Permits', 'Site Clearing', 'Excavation Work',
            'Foundation Concrete', 'Column Construction', 'Beam Construction',
            'Slab Casting', 'Brick Work', 'Plumbing Rough-in',
            'Electrical Wiring', 'HVAC Installation', 'Plastering Work',
            'Flooring Installation', 'Painting Work', 'Tile Work',
            'False Ceiling', 'Carpentry Work', 'Glass Installation',
            'Sanitary Installation', 'Electrical Fixtures', 'Landscaping',
            'Road Work', 'Parking Construction', 'Safety Audit',
            'Quality Inspection', 'Client Meeting', 'Progress Reporting',
            'Material Procurement', 'Equipment Setup'
        ];

        $data = [];

        // Each project gets 10-25 tasks
        for ($projectId = 1; $projectId <= 35; $projectId++) {
            $taskCount = rand(10, 25);

            for ($taskNum = 1; $taskNum <= $taskCount; $taskNum++) {
                $startDate = $this->getRandomDate('2023-01-01', '2024-12-31');
                $endDate = date('Y-m-d', strtotime($startDate . ' +' . rand(7, 60) . ' days'));

                $data[] = [
                    'project_id' => $projectId,
                    'parent_task_id' => $taskNum > 1 && rand(0, 3) ? rand(1, $taskNum-1) : null,
                    'title' => $taskTitles[array_rand($taskTitles)] . ' - ' . $this->getTaskSuffix(),
                    'description' => $this->getTaskDescription(),
                    'start_date' => $startDate,
                    'end_date' => $endDate,
                    'actual_start_date' => rand(0, 1) ? $startDate : null,
                    'actual_end_date' => rand(0, 1) ? $endDate : null,
                    'status' => $this->getRandomStatus(),
                    'priority' => $this->getRandomPriority(),
                    'progress_percentage' => rand(0, 100),
                    'estimated_hours' => rand(8, 160),
                    'actual_hours' => rand(0, 1) ? rand(8, 160) : null,
                    'assigned_to' => rand(1, 35),
                    'created_by' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        // Insert in chunks
        foreach (array_chunk($data, 50) as $chunk) {
            DB::table('tasks')->insert($chunk);
        }
    }

    private function getRandomDate($start, $end)
    {
        return date('Y-m-d', rand(strtotime($start), strtotime($end)));
    }

    private function getTaskSuffix()
    {
        $suffixes = ['Ground Floor', 'First Floor', 'Second Floor', 'Basement', 'Phase 1', 'Phase 2', 'Block A', 'Block B'];
        return $suffixes[array_rand($suffixes)];
    }

    private function getTaskDescription()
    {
        $descriptions = [
            'Complete all work as per design specifications and quality standards.',
            'Ensure safety protocols are followed during execution.',
            'Coordinate with other teams for seamless workflow.',
            'Use approved materials and methods for construction.',
            'Maintain daily progress reports and documentation.',
        ];
        return $descriptions[array_rand($descriptions)];
    }

    private function getRandomStatus()
    {
        $statuses = ['pending', 'in_progress', 'completed', 'on_hold', 'cancelled'];
        return $statuses[array_rand($statuses)];
    }

    private function getRandomPriority()
    {
        $priorities = ['low', 'medium', 'high', 'urgent'];
        return $priorities[array_rand($priorities)];
    }
}
