<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PaymentSchedulesTableSeeder extends Seeder
{
    public function run()
    {
        $schedules = [];

        // Monthly Client Payment Schedule
        $schedules[] = [
            'schedule_type' => 'monthly',
            'title' => 'Monthly Client Payment - ABC Construction',
            'description' => 'Monthly installment payment from ABC Construction Company',
            'amount' => 250000,
            'start_date' => '2024-01-01',
            'end_date' => '2024-12-31',
            'frequency' => 1,
            'day_of_week' => null,
            'day_of_month' => 5,
            'recipient_type' => 'client',
            'recipient_id' => 1,
            'recipient_name' => 'ABC Construction Company',
            'project_id' => 1,
            'payment_method' => 'bank_transfer',
            'status' => 'active',
            'last_payment_date' => '2024-04-05',
            'next_payment_date' => '2024-05-05',
            'total_occurrences' => 12,
            'completed_occurrences' => 4,
            'created_by' => 1,
            'updated_by' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        // Weekly Labor Payment Schedule
        $schedules[] = [
            'schedule_type' => 'weekly',
            'title' => 'Weekly Labor Wages',
            'description' => 'Weekly payment for construction workers and laborers',
            'amount' => 75000,
            'start_date' => '2024-04-01',
            'end_date' => null,
            'frequency' => 1,
            'day_of_week' => 'friday',
            'day_of_month' => null,
            'recipient_type' => 'employee',
            'recipient_id' => null,
            'recipient_name' => 'Construction Labor Team',
            'project_id' => 2,
            'payment_method' => 'cash',
            'status' => 'active',
            'last_payment_date' => '2024-04-26',
            'next_payment_date' => '2024-05-03',
            'total_occurrences' => null,
            'completed_occurrences' => 4,
            'created_by' => 1,
            'updated_by' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        // Monthly Supervisor Salary Schedule
        $schedules[] = [
            'schedule_type' => 'monthly',
            'title' => 'Monthly Supervisor Salaries',
            'description' => 'Monthly salary payment for site supervisors',
            'amount' => 150000,
            'start_date' => '2024-01-01',
            'end_date' => null,
            'frequency' => 1,
            'day_of_week' => null,
            'day_of_month' => 28,
            'recipient_type' => 'supervisor',
            'recipient_id' => null,
            'recipient_name' => 'Site Supervisors',
            'project_id' => 3,
            'payment_method' => 'bank_transfer',
            'status' => 'active',
            'last_payment_date' => '2024-04-28',
            'next_payment_date' => '2024-05-28',
            'total_occurrences' => null,
            'completed_occurrences' => 4,
            'created_by' => 1,
            'updated_by' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        // Quarterly Vendor Payment Schedule
        $schedules[] = [
            'schedule_type' => 'quarterly',
            'title' => 'Quarterly Material Supplier Payment',
            'description' => 'Quarterly payment to material supplier for bulk orders',
            'amount' => 500000,
            'start_date' => '2024-01-01',
            'end_date' => '2024-12-31',
            'frequency' => 1,
            'day_of_week' => null,
            'day_of_month' => 15,
            'recipient_type' => 'vendor',
            'recipient_id' => 1,
            'recipient_name' => 'Building Materials Supplier',
            'project_id' => 4,
            'payment_method' => 'cheque',
            'status' => 'active',
            'last_payment_date' => '2024-04-15',
            'next_payment_date' => '2024-07-15',
            'total_occurrences' => 4,
            'completed_occurrences' => 1,
            'created_by' => 1,
            'updated_by' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        // Daily Site Maintenance Schedule
        $schedules[] = [
            'schedule_type' => 'daily',
            'title' => 'Daily Site Maintenance',
            'description' => 'Daily payment for site cleaning and maintenance',
            'amount' => 5000,
            'start_date' => '2024-04-01',
            'end_date' => null,
            'frequency' => 1,
            'day_of_week' => null,
            'day_of_month' => null,
            'recipient_type' => 'contractor',
            'recipient_id' => 2,
            'recipient_name' => 'Site Maintenance Contractor',
            'project_id' => 5,
            'payment_method' => 'cash',
            'status' => 'active',
            'last_payment_date' => Carbon::yesterday()->format('Y-m-d'),
            'next_payment_date' => Carbon::today()->format('Y-m-d'),
            'total_occurrences' => null,
            'completed_occurrences' => 25,
            'created_by' => 1,
            'updated_by' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        DB::table('payment_schedules')->insert($schedules);

        $this->command->info('Successfully seeded ' . count($schedules) . ' payment schedules.');
    }
}
