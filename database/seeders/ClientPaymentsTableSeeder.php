<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ClientPaymentsTableSeeder extends Seeder
{
    public function run()
    {
        $payments = [];

        // One-time payments (traditional)
        $oneTimePayments = [
            [
                'project_id' => 1,
                'client_id' => 1,
                'payment_type' => 'advance',
                'amount' => 500000,
                'payment_date' => '2024-01-15',
                'payment_method' => 'bank_transfer',
                'reference_number' => 'ADV-001',
                'bank_name' => 'Habib Bank Limited',
                'account_number' => '12345678901',
                'received_by' => 1,
                'description' => 'Advance payment for project commencement',
                'status' => 'confirmed',
                'payment_frequency' => 'one_time',
                'is_recurring' => false,
                'next_payment_date' => null,
                'period_start_date' => null,
                'period_end_date' => null,
                'schedule_id' => null,
                'pending_balance' => 0.00,
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'project_id' => 1,
                'client_id' => 1,
                'payment_type' => 'final',
                'amount' => 300000,
                'payment_date' => '2024-06-20',
                'payment_method' => 'cheque',
                'reference_number' => 'FINAL-001',
                'bank_name' => 'United Bank Limited',
                'account_number' => '98765432109',
                'received_by' => 2,
                'description' => 'Final payment upon project completion',
                'status' => 'confirmed',
                'payment_frequency' => 'one_time',
                'is_recurring' => false,
                'next_payment_date' => null,
                'period_start_date' => null,
                'period_end_date' => null,
                'schedule_id' => null,
                'pending_balance' => 0.00,
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        $payments = array_merge($payments, $oneTimePayments);

        // Monthly recurring payments
        $monthlyPayments = [
            [
                'project_id' => 2,
                'client_id' => 2,
                'payment_type' => 'installment',
                'amount' => 150000,
                'payment_date' => '2024-04-01',
                'payment_method' => 'bank_transfer',
                'reference_number' => 'MON-001',
                'bank_name' => 'MCB Bank',
                'account_number' => '55566677788',
                'received_by' => 1,
                'description' => 'Monthly installment payment for construction phase',
                'status' => 'confirmed',
                'payment_frequency' => 'monthly',
                'is_recurring' => true,
                'next_payment_date' => '2024-05-01',
                'period_start_date' => '2024-04-01',
                'period_end_date' => '2024-04-30',
                'schedule_id' => 'SCH-MONTHLY-001',
                'pending_balance' => 750000,
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'project_id' => 3,
                'client_id' => 3,
                'payment_type' => 'installment',
                'amount' => 200000,
                'payment_date' => '2024-04-05',
                'payment_method' => 'online',
                'reference_number' => 'MON-002',
                'bank_name' => 'Allied Bank Limited',
                'account_number' => '44433322211',
                'received_by' => 3,
                'description' => 'Monthly progress payment - Phase 2',
                'status' => 'confirmed',
                'payment_frequency' => 'monthly',
                'is_recurring' => true,
                'next_payment_date' => '2024-05-05',
                'period_start_date' => '2024-04-01',
                'period_end_date' => '2024-04-30',
                'schedule_id' => 'SCH-MONTHLY-002',
                'pending_balance' => 1000000,
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        $payments = array_merge($payments, $monthlyPayments);

        // Weekly recurring payments
        $weeklyPayments = [
            [
                'project_id' => 4,
                'client_id' => 4,
                'payment_type' => 'installment',
                'amount' => 50000,
                'payment_date' => '2024-04-26',
                'payment_method' => 'cash',
                'reference_number' => 'WEEK-001',
                'bank_name' => null,
                'account_number' => null,
                'received_by' => 4,
                'description' => 'Weekly labor and material payment',
                'status' => 'confirmed',
                'payment_frequency' => 'weekly',
                'is_recurring' => true,
                'next_payment_date' => '2024-05-03',
                'period_start_date' => '2024-04-22',
                'period_end_date' => '2024-04-28',
                'schedule_id' => 'SCH-WEEKLY-001',
                'pending_balance' => 200000,
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        $payments = array_merge($payments, $weeklyPayments);

        // Quarterly payments
        $quarterlyPayments = [
            [
                'project_id' => 5,
                'client_id' => 5,
                'payment_type' => 'installment',
                'amount' => 450000,
                'payment_date' => '2024-04-01',
                'payment_method' => 'bank_transfer',
                'reference_number' => 'QTR-001',
                'bank_name' => 'National Bank of Pakistan',
                'account_number' => '77788899900',
                'received_by' => 5,
                'description' => 'Quarterly milestone payment - Q2 2024',
                'status' => 'confirmed',
                'payment_frequency' => 'quarterly',
                'is_recurring' => true,
                'next_payment_date' => '2024-07-01',
                'period_start_date' => '2024-04-01',
                'period_end_date' => '2024-06-30',
                'schedule_id' => 'SCH-QUARTERLY-001',
                'pending_balance' => 1350000,
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        $payments = array_merge($payments, $quarterlyPayments);

        // Generate additional random payments
        for ($i = 6; $i <= 35; $i++) {
            $paymentType = $this->getRandomPaymentType();
            $frequency = $this->getRandomFrequency();
            $isRecurring = $frequency !== 'one_time';

            $payment = [
                'project_id' => rand(1, 35),
                'client_id' => rand(1, 35),
                'payment_type' => $paymentType,
                'amount' => $this->getRandomAmount($paymentType),
                'payment_date' => $this->getRandomDate('2023-01-01', '2024-04-30'),
                'payment_method' => $this->getRandomPaymentMethod(),
                'reference_number' => $this->generateReferenceNumber($paymentType),
                'bank_name' => $this->getRandomBankName(),
                'account_number' => rand(10000000000, 99999999999),
                'received_by' => rand(1, 35),
                'description' => $this->getPaymentDescription($paymentType, $frequency),
                'status' => 'confirmed',
                'payment_frequency' => $frequency,
                'is_recurring' => $isRecurring,
                'next_payment_date' => $isRecurring ? $this->getNextPaymentDate($frequency) : null,
                'period_start_date' => $isRecurring ? $this->getPeriodStartDate($frequency) : null,
                'period_end_date' => $isRecurring ? $this->getPeriodEndDate($frequency) : null,
                'schedule_id' => $isRecurring ? 'SCH-' . strtoupper($frequency) . '-' . $i : null,
                'pending_balance' => $isRecurring ? rand(100000, 5000000) : 0.00,
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ];

            $payments[] = $payment;
        }

        DB::table('client_payments')->insert($payments);

        $this->command->info('Successfully seeded ' . count($payments) . ' client payments with frequency tracking.');
    }

    private function getRandomPaymentType()
    {
        $types = ['advance' => 20, 'installment' => 60, 'final' => 15, 'retention' => 5];
        return $this->getWeightedRandom($types);
    }

    private function getRandomFrequency()
    {
        $frequencies = [
            'one_time' => 40,
            'monthly' => 35,
            'weekly' => 15,
            'quarterly' => 10
        ];
        return $this->getWeightedRandom($frequencies);
    }

    private function getRandomAmount($paymentType)
    {
        $amounts = [
            'advance' => [500000, 2000000],
            'installment' => [50000, 500000],
            'final' => [100000, 1000000],
            'retention' => [50000, 300000]
        ];

        $range = $amounts[$paymentType];
        return rand($range[0], $range[1]);
    }

    private function getRandomPaymentMethod()
    {
        $methods = ['cash', 'cheque', 'bank_transfer', 'online'];
        return $methods[array_rand($methods)];
    }

    private function generateReferenceNumber($paymentType)
    {
        $prefixes = [
            'advance' => 'ADV',
            'installment' => 'INST',
            'final' => 'FINAL',
            'retention' => 'RET'
        ];

        return $prefixes[$paymentType] . '-' . rand(1000, 9999);
    }

    private function getRandomBankName()
    {
        $banks = [
            'Habib Bank Limited',
            'United Bank Limited',
            'MCB Bank',
            'Allied Bank Limited',
            'National Bank of Pakistan',
            'Bank Alfalah',
            'Standard Chartered Bank',
            'Meezan Bank'
        ];
        return $banks[array_rand($banks)];
    }

    private function getPaymentDescription($paymentType, $frequency)
    {
        $descriptions = [
            'advance' => 'Advance payment for project startup',
            'installment' => 'Progress payment for construction work',
            'final' => 'Final settlement payment',
            'retention' => 'Retention amount release'
        ];

        $base = $descriptions[$paymentType];

        if ($frequency !== 'one_time') {
            $base .= ' - ' . ucfirst($frequency) . ' schedule';
        }

        return $base;
    }

    private function getNextPaymentDate($frequency)
    {
        $baseDate = Carbon::now();

        switch ($frequency) {
            case 'weekly':
                return $baseDate->addWeek()->format('Y-m-d');
            case 'monthly':
                return $baseDate->addMonth()->format('Y-m-d');
            case 'quarterly':
                return $baseDate->addMonths(3)->format('Y-m-d');
            default:
                return null;
        }
    }

    private function getPeriodStartDate($frequency)
    {
        $baseDate = Carbon::now()->subMonth();

        switch ($frequency) {
            case 'weekly':
                return $baseDate->startOfWeek()->format('Y-m-d');
            case 'monthly':
                return $baseDate->startOfMonth()->format('Y-m-d');
            case 'quarterly':
                return $baseDate->firstOfQuarter()->format('Y-m-d');
            default:
                return null;
        }
    }

    private function getPeriodEndDate($frequency)
    {
        $baseDate = Carbon::now()->subMonth();

        switch ($frequency) {
            case 'weekly':
                return $baseDate->endOfWeek()->format('Y-m-d');
            case 'monthly':
                return $baseDate->endOfMonth()->format('Y-m-d');
            case 'quarterly':
                return $baseDate->lastOfQuarter()->format('Y-m-d');
            default:
                return null;
        }
    }

    private function getRandomDate($start, $end)
    {
        return date('Y-m-d', rand(strtotime($start), strtotime($end)));
    }

    private function getWeightedRandom($items)
    {
        $random = rand(1, 100);
        $current = 0;

        foreach ($items as $item => $weight) {
            $current += $weight;
            if ($random <= $current) {
                return $item;
            }
        }

        return array_key_first($items);
    }
}