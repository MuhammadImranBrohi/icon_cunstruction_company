<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ExpensesTableSeeder extends Seeder
{
    public function run()
    {
        $expenses = [];

        // One-time expenses (traditional)
        $oneTimeExpenses = [
            [
                'project_id' => 1,
                'expense_category_id' => 1,
                'title' => 'Construction Material Purchase',
                'description' => 'Purchase of cement, bricks, and steel for foundation work',
                'amount' => 250000,
                'expense_date' => '2024-04-15',
                'spent_by' => 1,
                'approved_by' => 1,
                'payment_method' => 'bank_transfer',
                'receipt_number' => 'MAT-001',
                'receipt_image_path' => 'receipts/material_001.jpg',
                'status' => 'approved',
                'rejection_reason' => null,
                'payment_category' => 'material',
                'is_advance' => false,
                'advance_settlement_id' => null,
                'expense_frequency' => 'one_time',
                'period_start_date' => null,
                'period_end_date' => null,
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'project_id' => 2,
                'expense_category_id' => 2,
                'title' => 'Heavy Equipment Rental',
                'description' => 'Monthly rental for excavator and crane',
                'amount' => 150000,
                'expense_date' => '2024-04-10',
                'spent_by' => 2,
                'approved_by' => 1,
                'payment_method' => 'cheque',
                'receipt_number' => 'EQP-001',
                'receipt_image_path' => 'receipts/equipment_001.jpg',
                'status' => 'approved',
                'rejection_reason' => null,
                'payment_category' => 'equipment',
                'is_advance' => false,
                'advance_settlement_id' => null,
                'expense_frequency' => 'one_time',
                'period_start_date' => null,
                'period_end_date' => null,
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        $expenses = array_merge($expenses, $oneTimeExpenses);

        // Monthly recurring expenses
        $monthlyExpenses = [
            [
                'project_id' => 1,
                'expense_category_id' => 3,
                'title' => 'Monthly Supervisor Salary',
                'description' => 'Salary payment for site supervisor - April 2024',
                'amount' => 80000,
                'expense_date' => '2024-04-30',
                'spent_by' => 3,
                'approved_by' => 1,
                'payment_method' => 'bank_transfer',
                'receipt_number' => 'SAL-001',
                'receipt_image_path' => 'receipts/salary_001.jpg',
                'status' => 'approved',
                'rejection_reason' => null,
                'payment_category' => 'supervisor',
                'is_advance' => false,
                'advance_settlement_id' => null,
                'expense_frequency' => 'monthly',
                'period_start_date' => '2024-04-01',
                'period_end_date' => '2024-04-30',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'project_id' => 3,
                'expense_category_id' => 4,
                'title' => 'Monthly Utility Bills',
                'description' => 'Electricity, water, and internet bills for site office',
                'amount' => 25000,
                'expense_date' => '2024-04-25',
                'spent_by' => 4,
                'approved_by' => 1,
                'payment_method' => 'online',
                'receipt_number' => 'UTIL-001',
                'receipt_image_path' => 'receipts/utility_001.jpg',
                'status' => 'approved',
                'rejection_reason' => null,
                'payment_category' => 'utility',
                'is_advance' => false,
                'advance_settlement_id' => null,
                'expense_frequency' => 'monthly',
                'period_start_date' => '2024-04-01',
                'period_end_date' => '2024-04-30',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        $expenses = array_merge($expenses, $monthlyExpenses);

        // Weekly recurring expenses
        $weeklyExpenses = [
            [
                'project_id' => 2,
                'expense_category_id' => 5,
                'title' => 'Weekly Labor Payment',
                'description' => 'Weekly wages for construction workers',
                'amount' => 75000,
                'expense_date' => '2024-04-26',
                'spent_by' => 5,
                'approved_by' => 1,
                'payment_method' => 'cash',
                'receipt_number' => 'LAB-001',
                'receipt_image_path' => 'receipts/labor_001.jpg',
                'status' => 'approved',
                'rejection_reason' => null,
                'payment_category' => 'contractor',
                'is_advance' => false,
                'advance_settlement_id' => null,
                'expense_frequency' => 'weekly',
                'period_start_date' => '2024-04-22',
                'period_end_date' => '2024-04-28',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        $expenses = array_merge($expenses, $weeklyExpenses);

        // Advance payments with settlement
        $advanceExpenses = [
            [
                'project_id' => 4,
                'expense_category_id' => 6,
                'title' => 'Material Advance Payment',
                'description' => 'Advance payment to material supplier for bulk order',
                'amount' => 100000,
                'expense_date' => '2024-04-20',
                'spent_by' => 6,
                'approved_by' => 1,
                'payment_method' => 'bank_transfer',
                'receipt_number' => 'ADV-001',
                'receipt_image_path' => 'receipts/advance_001.jpg',
                'status' => 'approved',
                'rejection_reason' => null,
                'payment_category' => 'material',
                'is_advance' => true,
                'advance_settlement_id' => null,
                'expense_frequency' => 'one_time',
                'period_start_date' => null,
                'period_end_date' => null,
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'project_id' => 4,
                'expense_category_id' => 6,
                'title' => 'Advance Settlement - Material',
                'description' => 'Settlement of advance payment with actual material bill',
                'amount' => 85000,
                'expense_date' => '2024-04-28',
                'spent_by' => 6,
                'approved_by' => 1,
                'payment_method' => 'bank_transfer',
                'receipt_number' => 'SETTLE-001',
                'receipt_image_path' => 'receipts/settlement_001.jpg',
                'status' => 'approved',
                'rejection_reason' => null,
                'payment_category' => 'material',
                'is_advance' => false,
                'advance_settlement_id' => 5, // Reference to the advance payment
                'expense_frequency' => 'one_time',
                'period_start_date' => null,
                'period_end_date' => null,
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        $expenses = array_merge($expenses, $advanceExpenses);

        // Daily expenses
        $dailyExpenses = [
            [
                'project_id' => 5,
                'expense_category_id' => 7,
                'title' => 'Daily Site Maintenance',
                'description' => 'Daily cleaning and maintenance costs',
                'amount' => 5000,
                'expense_date' => '2024-04-26',
                'spent_by' => 7,
                'approved_by' => 1,
                'payment_method' => 'cash',
                'receipt_number' => 'DAY-001',
                'receipt_image_path' => 'receipts/daily_001.jpg',
                'status' => 'approved',
                'rejection_reason' => null,
                'payment_category' => 'other',
                'is_advance' => false,
                'advance_settlement_id' => null,
                'expense_frequency' => 'daily',
                'period_start_date' => '2024-04-26',
                'period_end_date' => '2024-04-26',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        $expenses = array_merge($expenses, $dailyExpenses);

        // Generate additional random expenses
        for ($i = 8; $i <= 35; $i++) {
            $paymentCategory = $this->getRandomPaymentCategory();
            $frequency = $this->getRandomExpenseFrequency();

            $expense = [
                'project_id' => rand(1, 35),
                'expense_category_id' => rand(1, 10),
                'title' => $this->getExpenseTitle($paymentCategory),
                'description' => $this->getExpenseDescription($paymentCategory, $frequency),
                'amount' => $this->getRandomAmount($paymentCategory),
                'expense_date' => $this->getRandomDate('2024-01-01', '2024-04-30'),
                'spent_by' => rand(1, 35),
                'approved_by' => 1,
                'payment_method' => $this->getRandomPaymentMethod(),
                'receipt_number' => $this->generateReceiptNumber($paymentCategory, $i),
                'receipt_image_path' => 'receipts/expense_' . $i . '.jpg',
                'status' => $this->getExpenseStatus(),
                'rejection_reason' => null,
                'payment_category' => $paymentCategory,
                'is_advance' => $this->getIsAdvance($paymentCategory),
                'advance_settlement_id' => null,
                'expense_frequency' => $frequency,
                'period_start_date' => $this->getPeriodStartDate($frequency),
                'period_end_date' => $this->getPeriodEndDate($frequency),
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ];

            $expenses[] = $expense;
        }

        DB::table('expenses')->insert($expenses);

        $this->command->info('Successfully seeded ' . count($expenses) . ' expenses with frequency tracking and payment categorization.');
    }

    private function getRandomPaymentCategory()
    {
        $categories = [
            'material' => 30,
            'salary' => 20,
            'equipment' => 15,
            'supervisor' => 10,
            'contractor' => 10,
            'utility' => 8,
            'admin' => 5,
            'other' => 2
        ];
        return $this->getWeightedRandom($categories);
    }

    private function getRandomExpenseFrequency()
    {
        $frequencies = [
            'one_time' => 50,
            'monthly' => 25,
            'weekly' => 15,
            'daily' => 10
        ];
        return $this->getWeightedRandom($frequencies);
    }

    private function getExpenseTitle($paymentCategory)
    {
        $titles = [
            'material' => ['Material Purchase', 'Construction Supplies', 'Building Materials'],
            'salary' => ['Employee Salary', 'Staff Payment', 'Labor Wages'],
            'equipment' => ['Equipment Rental', 'Machine Maintenance', 'Tool Purchase'],
            'supervisor' => ['Supervisor Payment', 'Site Manager Salary'],
            'contractor' => ['Contractor Payment', 'Sub-contractor Bill'],
            'utility' => ['Utility Bills', 'Office Maintenance'],
            'admin' => ['Administrative Expense', 'Office Supplies'],
            'other' => ['Miscellaneous Expense', 'Other Costs']
        ];

        $categoryTitles = $titles[$paymentCategory];
        return $categoryTitles[array_rand($categoryTitles)];
    }

    private function getExpenseDescription($paymentCategory, $frequency)
    {
        $descriptions = [
            'material' => 'Purchase of construction materials and supplies',
            'salary' => 'Payment for employee salaries and wages',
            'equipment' => 'Costs related to equipment and machinery',
            'supervisor' => 'Supervisor and management payments',
            'contractor' => 'Contractor and sub-contractor payments',
            'utility' => 'Utility and maintenance expenses',
            'admin' => 'Administrative and office expenses',
            'other' => 'Miscellaneous project expenses'
        ];

        $base = $descriptions[$paymentCategory];

        if ($frequency !== 'one_time') {
            $base .= ' - ' . ucfirst($frequency) . ' expense';
        }

        return $base;
    }

    private function getRandomAmount($paymentCategory)
    {
        $amountRanges = [
            'material' => [50000, 500000],
            'salary' => [20000, 150000],
            'equipment' => [25000, 300000],
            'supervisor' => [50000, 120000],
            'contractor' => [30000, 200000],
            'utility' => [5000, 50000],
            'admin' => [1000, 25000],
            'other' => [1000, 20000]
        ];

        $range = $amountRanges[$paymentCategory];
        return rand($range[0], $range[1]);
    }

    private function getRandomPaymentMethod()
    {
        $methods = ['cash', 'bank_transfer', 'cheque', 'online'];
        return $methods[array_rand($methods)];
    }

    private function generateReceiptNumber($paymentCategory, $index)
    {
        $prefixes = [
            'material' => 'MAT',
            'salary' => 'SAL',
            'equipment' => 'EQP',
            'supervisor' => 'SUP',
            'contractor' => 'CONT',
            'utility' => 'UTIL',
            'admin' => 'ADMIN',
            'other' => 'OTH'
        ];

        return $prefixes[$paymentCategory] . '-' . str_pad($index, 4, '0', STR_PAD_LEFT);
    }

    private function getExpenseStatus()
    {
        $statuses = ['approved' => 80, 'pending' => 15, 'rejected' => 5];
        return $this->getWeightedRandom($statuses);
    }

    private function getIsAdvance($paymentCategory)
    {
        // Only material and contractor payments can be advances
        return in_array($paymentCategory, ['material', 'contractor']) && rand(0, 1);
    }

    private function getPeriodStartDate($frequency)
    {
        if ($frequency === 'one_time') return null;

        $baseDate = Carbon::now()->subDays(rand(1, 30));

        switch ($frequency) {
            case 'daily':
                return $baseDate->format('Y-m-d');
            case 'weekly':
                return $baseDate->startOfWeek()->format('Y-m-d');
            case 'monthly':
                return $baseDate->startOfMonth()->format('Y-m-d');
            default:
                return null;
        }
    }

    private function getPeriodEndDate($frequency)
    {
        if ($frequency === 'one_time') return null;

        $baseDate = Carbon::now()->subDays(rand(1, 30));

        switch ($frequency) {
            case 'daily':
                return $baseDate->format('Y-m-d');
            case 'weekly':
                return $baseDate->endOfWeek()->format('Y-m-d');
            case 'monthly':
                return $baseDate->endOfMonth()->format('Y-m-d');
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

