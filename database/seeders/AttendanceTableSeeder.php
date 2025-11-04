<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttendanceTableSeeder extends Seeder
{
    public function run()
    {
        $data = [];

        // Generate attendance for last 30 days only (reduce data)
        $startDate = date('Y-m-d', strtotime('-30 days'));
        $endDate = date('Y-m-d');

        for ($empId = 1; $empId <= 35; $empId++) {
            $currentDate = $startDate;

            while ($currentDate <= $endDate) {
                // Skip weekends (Saturday=6, Sunday=7)
                if (date('N', strtotime($currentDate)) >= 6) {
                    $currentDate = date('Y-m-d', strtotime($currentDate . ' +1 day'));
                    continue;
                }

                $status = $this->getRandomStatus();

                if ($status === 'present' || $status === 'late' || $status === 'half_day') {
                    $checkIn = $this->getCheckInTime($status);
                    $checkOut = $this->getCheckOutTime($checkIn, $status);
                    $totalHours = $this->calculateTotalHours($checkIn, $checkOut);
                    $overtime = $totalHours > 8 ? round($totalHours - 8, 2) : 0;
                } else {
                    $checkIn = null;
                    $checkOut = null;
                    $totalHours = 0;
                    $overtime = 0;
                }

                $data[] = [
                    'employee_id' => $empId,
                    'date' => $currentDate,
                    'check_in' => $checkIn,
                    'check_out' => $checkOut,
                    'status' => $status,
                    'total_hours' => $totalHours,
                    'overtime_hours' => $overtime,
                    'notes' => $this->getAttendanceNote($status),
                    'marked_by' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];

                $currentDate = date('Y-m-d', strtotime($currentDate . ' +1 day'));

                // Insert in chunks
                if (count($data) >= 100) {
                    DB::table('attendance')->insert($data);
                    $data = [];
                }
            }
        }

        // Insert remaining records
        if (!empty($data)) {
            DB::table('attendance')->insert($data);
        }
    }

    private function getRandomStatus()
    {
        $weights = [
            'present' => 70,  // 70% chance
            'late' => 15,     // 15% chance
            'half_day' => 5,  // 5% chance
            'absent' => 5,    // 5% chance
            'holiday' => 5    // 5% chance
        ];

        $random = rand(1, 100);
        $current = 0;

        foreach ($weights as $status => $weight) {
            $current += $weight;
            if ($random <= $current) {
                return $status;
            }
        }

        return 'present';
    }

    private function getCheckInTime($status)
    {
        $baseTime = '09:00:00';
        if ($status === 'late') {
            $lateMinutes = rand(15, 120); // 15 mins to 2 hours late
            return date('H:i:s', strtotime($baseTime . ' +' . $lateMinutes . ' minutes'));
        }
        return $baseTime;
    }

    private function getCheckOutTime($checkIn, $status)
    {
        $checkInTime = strtotime($checkIn);

        if ($status === 'half_day') {
            // Half day - 4-6 hours
            $workHours = rand(4, 6);
        } else {
            // Full day - 8-10 hours
            $workHours = rand(8, 10);
        }

        return date('H:i:s', $checkInTime + ($workHours * 3600));
    }

    private function calculateTotalHours($checkIn, $checkOut)
    {
        if (!$checkIn || !$checkOut) return 0;

        $checkInTime = strtotime($checkIn);
        $checkOutTime = strtotime($checkOut);
        return round(($checkOutTime - $checkInTime) / 3600, 2);
    }

    private function getAttendanceNote($status)
    {
        $notes = [
            'present' => 'Regular work day',
            'absent' => 'On leave',
            'late' => 'Delayed arrival',
            'half_day' => 'Short working day',
            'holiday' => 'Weekly off',
        ];

        return $notes[$status];
    }
}
