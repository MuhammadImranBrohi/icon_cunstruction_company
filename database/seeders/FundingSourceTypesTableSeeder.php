<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FundingSourceTypesTableSeeder extends Seeder
{
    public function run()
    {
        $types = [
            'Bank Loan', 'Investor Funding', 'Government Grant', 'Internal Funds',
            'Private Equity', 'Venture Capital', 'Construction Loan', 'Bridge Financing',
            'Mezzanine Financing', 'Islamic Financing', 'Syndicated Loan', 'Corporate Bonds',
            'Development Finance', 'Export Credit', 'Supplier Credit', 'Customer Advance',
            'Retained Earnings', 'Share Capital', 'Debenture', 'Mortgage Loan',
            'Equipment Financing', 'Working Capital Loan', 'Term Loan', 'Line of Credit',
            'Project Finance', 'Infrastructure Fund', 'Public Private Partnership', 'Crowdfunding',
            'Angel Investment', 'Private Placement', 'IPO Proceeds', 'Government Subsidy',
            'Foreign Investment', 'Joint Venture', 'Partnership Capital'
        ];

        foreach ($types as $type) {
            DB::table('funding_source_types')->insert([
                'name' => $type,
                'description' => 'Funding through ' . strtolower($type) . ' for construction projects',
                'is_active' => 1,
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
