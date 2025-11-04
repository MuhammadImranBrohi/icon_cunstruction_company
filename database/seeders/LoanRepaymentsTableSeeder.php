<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LoanRepaymentsTableSeeder extends Seeder
{
    public function run()
    {
        // First, get all loans from the database
        $loans = DB::table('loans')->get();

        $loanRepayments = [];

        foreach ($loans as $loan) {
            // Generate repayments based on loan details
            $repayments = $this->generateLoanRepayments($loan);
            $loanRepayments = array_merge($loanRepayments, $repayments);
        }

        DB::table('loan_repayments')->insert($loanRepayments);

        $this->command->info('Successfully seeded ' . count($loanRepayments) . ' loan repayments for ' . $loans->count() . ' loans.');
    }

    private function generateLoanRepayments($loan)
    {
        $repayments = [];

        $totalInstallments = $loan->total_installments;
        $paidInstallments = $loan->paid_installments;
        $principalAmount = $loan->principal_amount;
        $interestRate = $loan->interest_rate;
        $issueDate = Carbon::parse($loan->issue_date);
        $repaymentFrequency = $loan->repayment_frequency;
        $penaltyRate = $loan->penalty_rate;
        $isInterestFree = $loan->is_interest_free;

        // Calculate installment amounts
        $monthlyPrincipal = $principalAmount / $totalInstallments;
        $monthlyInterest = $isInterestFree ? 0 : ($principalAmount * $interestRate / 100) / 12;
        $monthlyInstallment = $monthlyPrincipal + $monthlyInterest;

        for ($i = 1; $i <= $totalInstallments; $i++) {
            $dueDate = $this->calculateDueDate($issueDate, $i, $repaymentFrequency);
            $isPaid = $i <= $paidInstallments;
            $isOverdue = !$isPaid && $dueDate < Carbon::now();

            $status = $this->getInstallmentStatus($isPaid, $isOverdue);
            $paidDate = $isPaid ? $this->getPaidDate($dueDate) : null;
            $paidAmount = $isPaid ? $monthlyInstallment : 0;
            $penaltyAmount = $isOverdue ? $this->calculatePenalty($monthlyInstallment, $penaltyRate) : 0;

            $repayments[] = [
                'loan_id' => $loan->id,
                'installment_number' => $i,
                'due_date' => $dueDate->format('Y-m-d'),
                'principal_amount' => round($monthlyPrincipal, 2),
                'interest_amount' => round($monthlyInterest, 2),
                'penalty_amount' => round($penaltyAmount, 2),
                'total_amount' => round($monthlyInstallment + $penaltyAmount, 2),
                'paid_date' => $paidDate,
                'paid_amount' => round($paidAmount, 2),
                'status' => $status,
                'payment_method' => $isPaid ? $this->getRandomPaymentMethod() : null,
                'reference_number' => $isPaid ? 'REP-' . $loan->id . '-' . str_pad($i, 3, '0', STR_PAD_LEFT) : null,
                'notes' => $this->getInstallmentNotes($i, $totalInstallments, $status, $loan->lender_name, $isInterestFree),
                'received_by' => $isPaid ? 1 : null,
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        return $repayments;
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

    private function getInstallmentStatus($isPaid, $isOverdue)
    {
        if ($isPaid) {
            return 'paid';
        }

        if ($isOverdue) {
            return 'overdue';
        }

        return 'pending';
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

    private function getInstallmentNotes($installmentNumber, $totalInstallments, $status, $lenderName, $isInterestFree)
    {
        $interestText = $isInterestFree ? ' (Interest-Free)' : '';

        $notes = [
            'paid' => "Installment {$installmentNumber}/{$totalInstallments} paid to {$lenderName}{$interestText}",
            'overdue' => "Installment {$installmentNumber}/{$totalInstallments} overdue - {$lenderName}{$interestText}",
            'pending' => "Upcoming installment {$installmentNumber}/{$totalInstallments} for {$lenderName}{$interestText}",
            'partial' => "Partial payment for installment {$installmentNumber}/{$totalInstallments} - {$lenderName}{$interestText}",
            'waived' => "Installment {$installmentNumber}/{$totalInstallments} waived for {$lenderName}{$interestText}"
        ];

        return $notes[$status];
    }
}