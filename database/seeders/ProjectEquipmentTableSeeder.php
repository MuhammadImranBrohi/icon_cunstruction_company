<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectEquipmentTableSeeder extends Seeder
{
    public function run()
    {
        $data = [];
        $statuses = ['active', 'completed', 'cancelled'];

        for ($i = 1; $i <= 100; $i++) { // 100 equipment assignments
            $startDate = $this->getRandomDate('2023-01-01', '2024-05-01');
            $expectedEndDate = date('Y-m-d', strtotime($startDate . ' +' . rand(30, 180) . ' days'));
            $endDate = rand(0, 1) ? $this->getRandomDate($startDate, $expectedEndDate) : null;

            $dailyRate = rand(5000, 50000);
            $totalDays = $endDate ? ceil((strtotime($endDate) - strtotime($startDate)) / (60 * 60 * 24)) : rand(30, 180);
            $totalCost = $dailyRate * $totalDays;

            $data[] = [
                'project_id' => rand(1, 35),
                'equipment_id' => rand(1, 35),
                'usage_start_date' => $startDate,
                'usage_end_date' => $endDate,
                'expected_end_date' => $expectedEndDate,
                'daily_rate' => $dailyRate,
                'total_cost' => $totalCost,
                'status' => $statuses[array_rand($statuses)],
                'notes' => $this->getEquipmentNotes(),
                'assigned_by' => rand(1, 35),
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('project_equipment')->insert($data);
    }

    private function getRandomDate($start, $end)
    {
        return date('Y-m-d', rand(strtotime($start), strtotime($end)));
    }

    private function getEquipmentNotes()
    {
        $notes = [
            'Equipment assigned for earth work',
            'Required for concrete pouring',
            'Structural construction equipment',
            'Finishing work equipment',
            'Material handling equipment',
            'Safety and support equipment',
            'Temporary works equipment',
            'Specialized construction equipment'
        ];
        return $notes[array_rand($notes)];
    }
}