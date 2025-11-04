<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaterialPurchasesTableSeeder extends Seeder
{
    public function run()
    {
        $data = [];
        $paymentMethods = ['cash', 'bank_loan', 'personal_loan', 'credit', 'online'];
        $statuses = ['ordered', 'delivered', 'cancelled'];

        for ($i = 1; $i <= 100; $i++) { // 100 purchase records
            $materialId = rand(1, 35);
            $quantity = rand(100, 5000);
            $unitPrice = rand(50, 5000);
            $totalCost = $quantity * $unitPrice;

            $purchaseDate = $this->getRandomDate('2023-01-01', '2024-06-01');
            $deliveryDate = date('Y-m-d', strtotime($purchaseDate . ' +' . rand(1, 14) . ' days'));

            $data[] = [
                'material_id' => $materialId,
                'project_id' => rand(1, 35),
                'purchase_order_number' => 'PO-' . str_pad($i, 6, '0', STR_PAD_LEFT) . '-2024',
                'quantity' => $quantity,
                'unit_price' => $unitPrice,
                'total_cost' => $totalCost,
                'purchase_date' => $purchaseDate,
                'delivery_date' => $deliveryDate,
                'payment_method' => $paymentMethods[array_rand($paymentMethods)],
                'loan_id' => rand(0, 1) ? rand(1, 35) : null,
                'supplier_id' => rand(1, 35),
                'purchased_by' => rand(1, 35),
                'status' => $statuses[array_rand($statuses)],
                'notes' => $this->getPurchaseNotes(),
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('material_purchases')->insert($data);
    }

    private function getRandomDate($start, $end)
    {
        return date('Y-m-d', rand(strtotime($start), strtotime($end)));
    }

    private function getPurchaseNotes()
    {
        $notes = [
            'Urgent delivery required for project timeline',
            'Standard quality materials as per specification',
            'Include all necessary documentation with delivery',
            'Quality certificate must be provided',
            'Coordinate with site manager for delivery timing'
        ];
        return $notes[array_rand($notes)];
    }
}