<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientsTableSeeder extends Seeder
{
    public function run()
    {
        $companies = [
            'Alpha Solutions', 'Beta Technologies', 'Gamma Enterprises', 'Delta Corp', 'Epsilon Systems', 'Zeta Labs',
            'Eta Global', 'Theta Innovations', 'Iota Industries', 'Kappa Consulting', 'Lambda Services', 'Mu Logistics',
            'Nu Designs', 'Xi Marketing', 'Omicron Finance', 'Pi Analytics', 'Rho Developers', 'Sigma Solutions',
            'Tau Networks', 'Upsilon Media', 'Phi Productions', 'Chi Ventures', 'Psi Holdings', 'Omega Tech',
            'A1 Enterprises', 'B2 Solutions', 'C3 Systems', 'D4 Labs', 'E5 Consulting', 'F6 Services'
        ];

        foreach ($companies as $company) {
            DB::table('clients')->insert([
                'name' => $company,
                'email' => strtolower(str_replace(' ', '', $company)) . '@example.com',
                'phone' => '03' . rand(0,9) . rand(10000000,99999999),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}