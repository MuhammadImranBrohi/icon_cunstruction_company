<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InvoicesTableSeeder extends Seeder
{
    public function run()
    {
        $data = [];
        $statuses = ['draft', 'sent', 'paid', 'overdue', 'cancelled'];

        for ($i = 1; $i <= 100; $i++) { // 100 invoices
            $amount = rand(500000, 10000000);
            $taxAmount = $amount * 0.17; // 17% tax
            $totalAmount = $amount + $taxAmount;

            $invoiceDate = $this->getRandomDate('2023-01-01', '2024-06-01');
            $dueDate = date('Y-m-d', strtotime($invoiceDate . ' +30 days'));

            $status = $statuses[array_rand($statuses)];
            $sentDate = $status !== 'draft' ? $invoiceDate : null;
            $paidDate = $status === 'paid' ? $this->getRandomDate($invoiceDate, $dueDate) : null;

            $data[] = [
                'project_id' => rand(1, 35),
                'client_id' => rand(1, 35),
                'invoice_number' => 'INV-' . str_pad($i, 6, '0', STR_PAD_LEFT) . '-2024',
                'invoice_date' => $invoiceDate,
                'due_date' => $dueDate,
                'amount' => $amount,
                'tax_amount' => $taxAmount,
                'total_amount' => $totalAmount,
                'status' => $status,
                'notes' => $this->getInvoiceNotes(),
                'sent_date' => $sentDate,
                'paid_date' => $paidDate,
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('invoices')->insert($data);
    }

    private function getRandomDate($start, $end)
    {
        return date('Y-m-d', rand(strtotime($start), strtotime($end)));
    }

    private function getInvoiceNotes()
    {
        $notes = [
            'Payment due within 30 days of invoice date',
            'Please include invoice number with payment',
            'Late payment interest may apply',
            'Thank you for your business',
            'For queries contact accounts department'
        ];
        return $notes[array_rand($notes)];
    }
}