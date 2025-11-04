<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaterialUsageTableSeeder extends Seeder
{
    public function run()
    {
        $data = [];

        for ($i = 1; $i <= 100; $i++) { // 100 usage records
            $materialId = rand(1, 35);
            $quantity = rand(10, 500);
            $unitPrice = rand(50, 5000);
            $totalCost = $quantity * $unitPrice;

            $usageDate = $this->getRandomDate('2023-02-01', '2024-06-01');

            $data[] = [
                'material_id' => $materialId,
                'project_id' => rand(1, 35),
                'task_id' => rand(1, 500), // Assuming 500 tasks exist
                'quantity' => $quantity,
                'unit_price' => $unitPrice,
                'total_cost' => $totalCost,
                'usage_date' => $usageDate,
                'used_by' => rand(1, 35),
                'notes' => $this->getUsageNotes(),
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('material_usage')->insert($data);
    }

    private function getRandomDate($start, $end)
    {
        return date('Y-m-d', rand(strtotime($start), strtotime($end)));
    }

    private function getUsageNotes()
    {
        $notes = [
            'Used for foundation work',
            'Applied in structural construction',
            'For finishing and plastering work',
            'Electrical installation materials',
            'Plumbing system installation',
            'Flooring and tiling work',
            'Roof construction materials',
            'Wall construction and masonry',
            'Painting and coating application',
            'Safety and protection work'
        ];
        return $notes[array_rand($notes)];
    }
}