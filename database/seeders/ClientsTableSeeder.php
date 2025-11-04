<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientsTableSeeder extends Seeder
{
    public function run()
    {
        $companyNames = [
            'Al-Noor Construction', 'Pearl Builders', 'Skyline Developers', 'Elite Constructions',
            'Metro Builders', 'Green Valley Construction', 'Royal Homes', 'City Developers',
            'Prime Constructions', 'Goldline Builders', 'Dream Homes', 'Future Developers',
            'Luxury Living', 'Smart Builders', 'Urban Developers', 'Heritage Construction',
            'Modern Living', 'Eco Builders', 'Prestige Developers', 'Quality Construction',
            'Trust Builders', 'Reliable Developers', 'Expert Construction', 'Master Builders',
            'Superior Homes', 'First Choice Construction', 'Premium Developers', 'Apex Builders',
            'Supreme Construction', 'Grand Developers'
        ];

        $cities = ['Lahore', 'Karachi', 'Islamabad', 'Rawalpindi', 'Faisalabad', 'Multan', 'Peshawar', 'Quetta'];
        $clientTypes = ['individual', 'company', 'government'];
        $paymentTerms = ['net_15', 'net_30', 'net_45', 'net_60'];

        for ($i = 1; $i <= 35; $i++) {
            $companyName = $companyNames[array_rand($companyNames)] . ' ' . $this->getRandomSuffix();
            $contactPerson = $this->getRandomName();

            DB::table('clients')->insert([
                'user_id' => $i <= 5 ? $i : null, // First 5 clients have user accounts
                'company_name' => $companyName,
                'contact_person' => $contactPerson,
                'phone' => '03' . rand(10, 99) . rand(1000000, 9999999),
                'email' => strtolower(str_replace(' ', '.', $contactPerson)) . '@' . strtolower(str_replace(' ', '', $companyName)) . '.com',
                'address' => 'Plot ' . rand(100, 999) . ', Block ' . chr(rand(65, 70)) . ', ' . $cities[array_rand($cities)] . ', Pakistan',
                'city' => $cities[array_rand($cities)],
                'state' => 'Punjab',
                'country' => 'Pakistan',
                'tax_number' => rand(100000, 999999) . '-' . rand(1, 9),
                'registration_number' => 'REG-' . rand(100000, 999999),
                'client_type' => $clientTypes[array_rand($clientTypes)],
                'status' => 'active',
                'credit_limit' => rand(500000, 5000000),
                'payment_terms' => $paymentTerms[array_rand($paymentTerms)],
                'notes' => 'Client since ' . rand(2018, 2024) . '. ' . $this->getRandomClientNote(),
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    private function getRandomName()
    {
        $firstNames = ['Ali', 'Ahmed', 'Muhammad', 'Hassan', 'Usman', 'Bilal', 'Saad', 'Abdullah'];
        $lastNames = ['Khan', 'Ahmed', 'Malik', 'Qureshi', 'Sheikh', 'Chaudhry', 'Butt'];
        return $firstNames[array_rand($firstNames)] . ' ' . $lastNames[array_rand($lastNames)];
    }

    private function getRandomSuffix()
    {
        $suffixes = ['Ltd.', 'Pvt. Ltd.', 'Corp.', 'Inc.', 'Group', 'Enterprises', '& Co.'];
        return $suffixes[array_rand($suffixes)];
    }

    private function getRandomClientNote()
    {
        $notes = [
            'Prefer residential projects.',
            'Interested in commercial buildings.',
            'Focus on sustainable construction.',
            'Looking for turnkey solutions.',
            'Budget conscious but quality focused.',
            'Quick decision maker.',
            'Prefers modern architecture.',
            'Environmentally conscious.',
        ];
        return $notes[array_rand($notes)];
    }
}
