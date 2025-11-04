<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EquipmentMaintenanceTableSeeder extends Seeder
{
    public function run()
    {
        $data = [];
        $maintenanceTypes = ['routine', 'repair', 'overhaul', 'inspection'];
        $statuses = ['scheduled', 'in_progress', 'completed', 'cancelled'];
        $technicians = ['Ali Ahmed', 'Mohammad Hassan', 'Usman Khan', 'Bilal Raza', 'Shahid Mahmood', 'Asif Javed', 'Kamran Ali', 'Nadeem Akhtar'];

        for ($i = 1; $i <= 100; $i++) { // 100 maintenance records
            $maintenanceDate = $this->getRandomDate('2023-01-01', '2024-06-01');
            $nextMaintenanceDate = date('Y-m-d', strtotime($maintenanceDate . ' +' . rand(30, 180) . ' days'));
            $cost = rand(5000, 500000);

            $data[] = [
                'equipment_id' => rand(1, 35),
                'maintenance_type' => $maintenanceTypes[array_rand($maintenanceTypes)],
                'maintenance_date' => $maintenanceDate,
                'next_maintenance_date' => $nextMaintenanceDate,
                'cost' => $cost,
                'description' => $this->getMaintenanceDescription(),
                'performed_by' => $technicians[array_rand($technicians)],
                'status' => $statuses[array_rand($statuses)],
                'notes' => $this->getMaintenanceNotes(),
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('equipment_maintenance')->insert($data);
    }

    private function getRandomDate($start, $end)
    {
        return date('Y-m-d', rand(strtotime($start), strtotime($end)));
    }

    private function getMaintenanceDescription()
    {
        $descriptions = [
            'Regular preventive maintenance service',
            'Engine overhaul and component replacement',
            'Hydraulic system repair and maintenance',
            'Electrical system inspection and repair',
            'Structural integrity check and reinforcement',
            'Safety system testing and calibration',
            'Lubrication and fluid replacement',
            'Wear parts replacement and adjustment',
            'Performance optimization and tuning',
            'Comprehensive annual maintenance'
        ];
        return $descriptions[array_rand($descriptions)];
    }

    private function getMaintenanceNotes()
    {
        $notes = [
            'All components functioning properly',
            'Minor adjustments required',
            'Parts replaced as per schedule',
            'Calibration completed successfully',
            'Safety checks passed',
            'Performance within specifications',
            'Recommended for continued operation',
            'Scheduled for next maintenance'
        ];
        return $notes[array_rand($notes)];
    }
}
