<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LoansTableSeeder extends Seeder
{
    public function run()
    {
        $loans = [];

        // Sample integrated loans with repayment schedules
        $sampleLoans = [
            [
                'loan_type_id' => 1,
                'lender_name' => 'Habib Bank Limited',
                'lender_contact' => '021-111-2222',
                'lender_address' => 'Main Branch, Karachi',
                'project_id' => 1,
                'principal_amount' => 5000000,
                'interest_rate' => 12.5,
                'total_payable' => 5600000,
                'issue_date' => '2024-01-15',
                'due_date' => '2026-01-15',
                'is_interest_free' => false,
                'status' => 'active',
                'remaining_balance' => 4500000,
                'description' => 'Bank loan for project financing with monthly installments',
                'loan_document_path' => null,
                'total_installments' => 24,
                'paid_installments' => 3,
                'next_installment_date' => '2024-05-15',
                'penalty_rate' => 2.0,
                'repayment_frequency' => 'monthly',
                'monthly_installment' => 233333.33,
                'repayment_schedule' => $this->generateRepaymentSchedule(24, 5000000, 12.5, '2024-01-15', 'monthly', 3),
                'total_paid_amount' => 700000,
                'total_penalty_amount' => 0,
                'last_payment_date' => '2024-04-15',
                'last_payment_method' => 'bank_transfer',
                'last_reference_number' => 'REP-001-003',
                'repayment_notes' => 'First 3 installments paid on time',
                'last_received_by' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'loan_type_id' => 2,
                'lender_name' => 'Mr. Ahmed Khan',
                'lender_contact' => '0300-1234567',
                'lender_address' => 'DHA Phase 5, Karachi',
                'project_id' => 2,
                'principal_amount' => 1000000,
                'interest_rate' => 8.0,
                'total_payable' => 1080000,
                'issue_date' => '2024-03-01',
                'due_date' => '2025-03-01',
                'is_interest_free' => false,
                'status' => 'active',
                'remaining_balance' => 900000,
                'description' => 'Personal loan for urgent project expenses',
                'loan_document_path' => null,
                'total_installments' => 12,
                'paid_installments' => 2,
                'next_installment_date' => '2024-05-01',
                'penalty_rate' => 1.5,
                'repayment_frequency' => 'monthly',
                'monthly_installment' => 90000.00,
                'repayment_schedule' => $this->generateRepaymentSchedule(12, 1000000, 8.0, '2024-03-01', 'monthly', 2),
                'total_paid_amount' => 180000,
                'total_penalty_amount' => 0,
                'last_payment_date' => '2024-04-01',
                'last_payment_method' => 'cash',
                'last_reference_number' => 'REP-002-002',
                'repayment_notes' => 'Regular monthly payments',
                'last_received_by' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'loan_type_id' => 3,
                'lender_name' => 'Company Owner',
                'lender_contact' => '0300-7654321',
                'lender_address' => 'Head Office, Lahore',
                'project_id' => 3,
                'principal_amount' => 2000000,
                'interest_rate' => 0.0,
                'total_payable' => 2000000,
                'issue_date' => '2024-02-10',
                'due_date' => '2025-02-10',
                'is_interest_free' => true,
                'status' => 'active',
                'remaining_balance' => 1500000,
                'description' => 'Interest-free loan from company owner',
                'loan_document_path' => null,
                'total_installments' => 12,
                'paid_installments' => 4,
                'next_installment_date' => '2024-06-10',
                'penalty_rate' => 0.0,
                'repayment_frequency' => 'monthly',
                'monthly_installment' => 166666.67,
                'repayment_schedule' => $this->generateRepaymentSchedule(12, 2000000, 0.0, '2024-02-10', 'monthly', 4),
                'total_paid_amount' => 666666.68,
                'total_penalty_amount' => 0,
                'last_payment_date' => '2024-05-10',
                'last_payment_method' => 'bank_transfer',
                'last_reference_number' => 'REP-003-004',
                'repayment_notes' => 'Interest-free installment payments',
                'last_received_by' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        $loans = array_merge($loans, $sampleLoans);

        // Generate more random loans
        for ($i = 4; $i <= 35; $i++) {
            $loan = $this->generateRandomLoan($i);
            $loans[] = $loan;
        }

        DB::table('loans')->insert($loans);

        $this->command->info('Successfully seeded ' . count($loans) . ' loans with integrated repayment system.');
    }

    private function generateRepaymentSchedule($totalInstallments, $principalAmount, $interestRate, $issueDate, $frequency, $paidInstallments)
    {
        $schedule = [];
        $monthlyPrincipal = $principalAmount / $totalInstallments;
        $monthlyInterest = ($principalAmount * $interestRate / 100) / 12;
        $issueDate = Carbon::parse($issueDate);

        for ($i = 1; $i <= $totalInstallments; $i++) {
            $dueDate = $this->calculateDueDate($issueDate, $i, $frequency);
            $isPaid = $i <= $paidInstallments;
            $isOverdue = !$isPaid && $dueDate < Carbon::now();

            $schedule[] = [
                'installment_number' => $i,
                'due_date' => $dueDate->format('Y-m-d'),
                'principal_amount' => round($monthlyPrincipal, 2),
                'interest_amount' => round($monthlyInterest, 2),
                'total_amount' => round($monthlyPrincipal + $monthlyInterest, 2),
                'status' => $isPaid ? 'paid' : ($isOverdue ? 'overdue' : 'pending'),
                'paid_date' => $isPaid ? $this->getPaidDate($dueDate) : null,
                'paid_amount' => $isPaid ? round($monthlyPrincipal + $monthlyInterest, 2) : 0,
                'penalty_amount' => $isOverdue ? $this->calculatePenalty($monthlyPrincipal + $monthlyInterest, 2.0) : 0,
                'payment_method' => $isPaid ? $this->getRandomPaymentMethod() : null,
                'reference_number' => $isPaid ? 'REP-' . $i . '-' . str_pad($i, 3, '0', STR_PAD_LEFT) : null,
                'notes' => "Installment {$i}/{$totalInstallments}"
            ];
        }

        return json_encode($schedule);
    }

    private function generateRandomLoan($index)
    {
        $principal = rand(500000, 20000000);
        $interestRate = rand(8, 18) + (rand(0, 99) / 100);
        $totalInstallments = rand(12, 60);
        $paidInstallments = rand(0, $totalInstallments - 1);
        $issueDate = $this->getRandomDate('2022-01-01', '2024-03-01');
        $dueDate = Carbon::parse($issueDate)->addMonths($totalInstallments)->format('Y-m-d');
        $monthlyInstallment = $principal / $totalInstallments;
        $totalPaid = $monthlyInstallment * $paidInstallments;
        $remainingBalance = $principal - $totalPaid;

        return [
            'loan_type_id' => rand(1, 5),
            'lender_name' => $this->getRandomLenderName(),
            'lender_contact' => '03' . rand(10, 99) . rand(1000000, 9999999),
            'lender_address' => $this->getLenderAddress(),
            'project_id' => rand(1, 35),
            'principal_amount' => $principal,
            'interest_rate' => $interestRate,
            'total_payable' => $principal * (1 + ($interestRate / 100)),
            'issue_date' => $issueDate,
            'due_date' => $dueDate,
            'is_interest_free' => false,
            'status' => $this->getLoanStatus($paidInstallments, $totalInstallments),
            'remaining_balance' => $remainingBalance,
            'description' => $this->getLoanDescription(),
            'loan_document_path' => 'loans/loan_agreement_' . $index . '.pdf',
            'total_installments' => $totalInstallments,
            'paid_installments' => $paidInstallments,
            'next_installment_date' => $this->getNextInstallmentDate($issueDate, $paidInstallments + 1),
            'penalty_rate' => rand(1, 5) + (rand(0, 99) / 100),
            'repayment_frequency' => 'monthly',
            'monthly_installment' => $monthlyInstallment,
            'repayment_schedule' => $this->generateRepaymentSchedule($totalInstallments, $principal, $interestRate, $issueDate, 'monthly', $paidInstallments),
            'total_paid_amount' => $totalPaid,
            'total_penalty_amount' => rand(0, 50000),
            'last_payment_date' => $paidInstallments > 0 ? $this->getLastPaymentDate($issueDate, $paidInstallments) : null,
            'last_payment_method' => $paidInstallments > 0 ? $this->getRandomPaymentMethod() : null,
            'last_reference_number' => $paidInstallments > 0 ? 'REP-' . $index . '-' . str_pad($paidInstallments, 3, '0', STR_PAD_LEFT) : null,
            'repayment_notes' => $this->getRepaymentNotes($paidInstallments, $totalInstallments),
            'last_received_by' => $paidInstallments > 0 ? 1 : null,
            'created_by' => 1,
            'updated_by' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    private function calculateDueDate($issueDate, $installmentNumber, $frequency)
    {
        return match($frequency) {
            'monthly' => $issueDate->copy()->addMonths($installmentNumber),
            'quarterly' => $issueDate->copy()->addMonths($installmentNumber * 3),
            'yearly' => $issueDate->copy()->addYears($installmentNumber),
            default => $issueDate->copy()->addMonths($installmentNumber)
        };
    }

    private function getPaidDate($dueDate)
    {
        $daysOffset = rand(-2, 2);
        return $dueDate->copy()->addDays($daysOffset)->format('Y-m-d');
    }

    private function calculatePenalty($installmentAmount, $penaltyRate)
    {
        return ($installmentAmount * $penaltyRate) / 100;
    }

    private function getRandomPaymentMethod()
    {
        $methods = ['cash', 'bank_transfer', 'cheque', 'online'];
        return $methods[array_rand($methods)];
    }

    private function getRandomLenderName()
    {
        $lenders = [
            'Habib Bank Limited', 'United Bank Limited', 'Muslim Commercial Bank',
            'Allied Bank Limited', 'National Bank of Pakistan', 'Bank Alfalah',
            'Standard Chartered Bank', 'Dubai Islamic Bank', 'Meezan Bank'
        ];
        return $lenders[array_rand($lenders)];
    }

    private function getLenderAddress()
    {
        $cities = ['Lahore', 'Karachi', 'Islamabad', 'Rawalpindi', 'Faisalabad'];
        $areas = ['Main Branch', 'Corporate Branch', 'Commercial Area', 'City Center'];
        return $areas[array_rand($areas)] . ', ' . $cities[array_rand($cities)] . ', Pakistan';
    }

    private function getLoanStatus($paidInstallments, $totalInstallments)
    {
        if ($paidInstallments >= $totalInstallments) {
            return 'paid';
        }

        // Simple logic for overdue - if more than 2 installments overdue
        $overdueCount = $totalInstallments - $paidInstallments;
        return $overdueCount > 2 ? 'overdue' : 'active';
    }

    private function getLoanDescription()
    {
        $descriptions = [
            'Construction project financing loan',
            'Working capital loan for ongoing operations',
            'Equipment purchase and project development loan',
            'Infrastructure development financing',
        ];
        return $descriptions[array_rand($descriptions)];
    }

    private function getNextInstallmentDate($issueDate, $nextInstallment)
    {
        return Carbon::parse($issueDate)->addMonths($nextInstallment)->format('Y-m-d');
    }

    private function getLastPaymentDate($issueDate, $paidInstallments)
    {
        return Carbon::parse($issueDate)->addMonths($paidInstallments)->format('Y-m-d');
    }

    private function getRepaymentNotes($paidInstallments, $totalInstallments)
    {
        if ($paidInstallments === 0) {
            return 'No payments made yet';
        }

        return "{$paidInstallments}/{$totalInstallments} installments paid successfully";
    }

    private function getRandomDate($start, $end)
    {
        return date('Y-m-d', rand(strtotime($start), strtotime($end)));
    }
}
