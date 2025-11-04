<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SuppliersTableSeeder extends Seeder
{
    public function run()
    {
        $supplierNames = [
            'Al-Habib Steel Mills', 'Best Cement Company', 'Quality Wood Suppliers',
            'Metro Hardware Store', 'Prime Electricals', 'Modern Plumbing Solutions',
            'City Paint House', 'Green Building Materials', 'Trusted Aggregates',
            'Safe Tools Corporation', 'Professional Equipment Rentals',
            'Reliable Glass Suppliers', 'Durable Roofing Materials',
            'Eco-Friendly Paints', 'Strong Foundations Ltd.', 'Smart Home Solutions',
            'Traditional Bricks Co.', 'Modern Tiles Gallery', 'Luxury Sanitaryware',
            'Essential Construction Tools', 'Heavy Machinery Suppliers',
            'Safety Equipment Providers', 'Quality Fasteners Corp.',
            'Professional Adhesives', 'Dependable Cement Suppliers',
            'Steel Reinforcement Co.', 'Wood Works Enterprise',
            'Electrical Components Ltd.', 'Plumbing Fittings Inc.',
            'Construction Chemicals Co.'
        ];

        $cities = ['Lahore', 'Karachi', 'Islamabad', 'Rawalpindi', 'Faisalabad', 'Multan'];
        $supplierTypes = ['local', 'international', 'government'];
        $paymentTerms = ['net_15', 'net_30', 'net_45', 'net_60'];
        $bankNames = ['HBL', 'UBL', 'MCB', 'ABL', 'NBP'];

        for ($i = 1; $i <= 35; $i++) {
            $supplierName = $supplierNames[array_rand($supplierNames)];

            DB::table('suppliers')->insert([
                'name' => $supplierName,
                'contact_person' => $this->getRandomName(),
                'phone' => '03' . rand(10, 99) . rand(1000000, 9999999),
                'email' => 'info@' . strtolower(str_replace(' ', '', $supplierName)) . '.com',
                'address' => 'Shop #' . rand(1, 100) . ', ' . $cities[array_rand($cities)] . ' Market, Pakistan',
                'city' => $cities[array_rand($cities)],
                'state' => 'Punjab',
                'country' => 'Pakistan',
                'tax_number' => 'NTN-' . rand(1000000, 9999999),
                'registration_number' => 'REG-' . rand(100000, 999999),
                'supplier_type' => $supplierTypes[array_rand($supplierTypes)],
                'payment_terms' => $paymentTerms[array_rand($paymentTerms)],
                'bank_name' => $bankNames[array_rand($bankNames)],
                'account_number' => rand(10000000000, 99999999999),
                'status' => 'active',
                'notes' => $this->getRandomSupplierNote(),
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    private function getRandomName()
    {
        $firstNames = ['Rashid', 'Imran', 'Kamran', 'Nadeem', 'Shahid', 'Asif', 'Tariq', 'Javed'];
        $lastNames = ['Ahmed', 'Khan', 'Malik', 'Butt', 'Chaudhry', 'Sheikh', 'Qureshi'];
        return $firstNames[array_rand($firstNames)] . ' ' . $lastNames[array_rand($lastNames)];
    }

    private function getRandomSupplierNote()
    {
        $notes = [
            'Provides bulk discounts on large orders.',
            'Known for timely deliveries.',
            'Quality materials at competitive prices.',
            'Specializes in imported materials.',
            'Local manufacturer with good reputation.',
            'Offers credit facility to regular customers.',
            'Wide range of products available.',
            'Technical support available for products.',
        ];
        return $notes[array_rand($notes)];
    }
}