<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SalaryRecordsTableSeeder extends Seeder
{
    public function run()
    {
        $data = [];
        $paymentMethods = ['cash', 'bank_transfer', 'cheque'];

        // Monthly records for 2024
        $months = [1, 2, 3, 4, 5, 6]; // January to June 2024

        foreach ($months as $month) {
            for ($empId = 1; $empId <= 35; $empId++) {
                $basicSalary = rand(30000, 150000);
                $allowances = rand(5000, 30000);
                $deductions = rand(1000, 15000);
                $overtime = rand(0, 20000);
                $gross = $basicSalary + $allowances + $overtime;
                $net = $gross - $deductions;

                $totalDays = $this->getTotalDaysInMonth($month, 2024);
                $presentDays = rand(20, $totalDays);

                $data[] = [
                    'employee_id' => $empId,
                    'month' => 2024, // YEAR only
                    'total_days' => $totalDays,
                    'present_days' => $presentDays,
                    'basic_salary' => $basicSalary,
                    'allowances' => $allowances,
                    'deductions' => $deductions,
                    'overtime_amount' => $overtime,
                    'gross_amount' => $gross,
                    'net_amount' => $net,
                    'status' => $this->getSalaryStatus(),
                    'paid_date' => $this->getPaidDate(2024, $month),
                    'payment_method' => $paymentMethods[array_rand($paymentMethods)],
                    'notes' => $this->getSalaryNotes($month),
                    'created_by' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        // Insert in chunks
        foreach (array_chunk($data, 50) as $chunk) {
            DB::table('salary_records')->insert($chunk);
        }
    }

    private function getTotalDaysInMonth($month, $year)
    {
        return cal_days_in_month(CAL_GREGORIAN, $month, $year);
    }

    private function getSalaryStatus()
    {
        $weights = ['draft' => 10, 'processed' => 20, 'paid' => 65, 'cancelled' => 5];
        $random = rand(1, 100);
        $current = 0;

        foreach ($weights as $status => $weight) {
            $current += $weight;
            if ($random <= $current) {
                return $status;
            }
        }

        return 'paid';
    }

    private function getPaidDate($year, $month)
    {
        $day = rand(1, 10); // Paid between 1st-10th of next month
        $paidMonth = $month + 1;
        $paidYear = $year;

        if ($paidMonth > 12) {
            $paidMonth = 1;
            $paidYear = $year + 1;
        }

        return sprintf('%d-%02d-%02d', $paidYear, $paidMonth, $day);
    }

    private function getSalaryNotes($month)
    {
        $monthNames = [
            1 => 'January', 2 => 'February', 3 => 'March',
            4 => 'April', 5 => 'May', 6 => 'June',
            7 => 'July', 8 => 'August', 9 => 'September',
            10 => 'October', 11 => 'November', 12 => 'December'
        ];

        $notes = [
            "Regular salary payment for {$monthNames[$month]}",
            "Including overtime and allowances for {$monthNames[$month]}",
            "Deductions applied as per policy for {$monthNames[$month]}",
            "Bonus included for {$monthNames[$month]}",
            "Advance adjustment applied for {$monthNames[$month]}"
        ];
        return $notes[array_rand($notes)];
    }
}
