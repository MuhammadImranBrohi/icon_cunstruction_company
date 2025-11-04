<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LeavesTableSeeder extends Seeder
{
    public function run()
    {
        $data = [];
        $statuses = ['pending', 'approved', 'rejected', 'cancelled'];

        for ($i = 1; $i <= 100; $i++) { // 100 leave applications
            $employeeId = rand(1, 35);
            $leaveTypeId = rand(1, 30);
            $startDate = $this->getRandomDate('2023-01-01', '2024-12-31');
            $totalDays = rand(1, 14); // 1-14 days leave
            $endDate = date('Y-m-d', strtotime($startDate . ' +' . ($totalDays - 1) . ' days'));

            $status = $statuses[array_rand($statuses)];
            $approvedBy = $status === 'approved' || $status === 'rejected' ? rand(1, 5) : null;
            $approvedAt = $approvedBy ? $this->getRandomDate($startDate, $endDate) : null;

            $data[] = [
                'employee_id' => $employeeId,
                'leave_type_id' => $leaveTypeId,
                'start_date' => $startDate,
                'end_date' => $endDate,
                'total_days' => $totalDays,
                'reason' => $this->getLeaveReason($leaveTypeId),
                'status' => $status,
                'approved_by' => $approvedBy,
                'approved_at' => $approvedAt,
                'rejection_reason' => $status === 'rejected' ? $this->getRejectionReason() : null,
                'created_by' => $employeeId,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('leaves')->insert($data);
    }

    private function getRandomDate($start, $end)
    {
        return date('Y-m-d', rand(strtotime($start), strtotime($end)));
    }

    private function getLeaveReason($leaveTypeId)
    {
        $reasons = [
            'Annual vacation with family',
            'Medical treatment and rest',
            'Personal work and family commitments',
            'Maternity care and baby bonding',
            'Paternity leave for newborn care',
            'Wedding ceremony and celebrations',
            'Religious pilgrimage and spiritual journey',
            'Emergency family situation',
            'Medical surgery and recovery',
            'Professional development training',
            'Examination preparation and tests',
            'Volunteer community service',
            'Blood donation and recovery',
            'Family care and support',
            'Personal health and wellness',
        ];
        return $reasons[array_rand($reasons)];
    }

    private function getRejectionReason()
    {
        $reasons = [
            'Project deadlines approaching',
            'Insufficient staff coverage',
            'Peak work season',
            'Insufficient leave balance',
            'Prior commitments require your presence',
            'Critical project phase',
            'Team dependency on your work',
            'Client meeting scheduled',
        ];
        return $reasons[array_rand($reasons)];
    }
}
