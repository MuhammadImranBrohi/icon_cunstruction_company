<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LoanTypesTableSeeder extends Seeder
{
    public function run()
    {
        $types = [
            'Business Loan', 'Equipment Loan', 'Working Capital', 'Construction Loan',
            'Term Loan', 'Bridge Loan', 'Mortgage Loan', 'Personal Loan',
            'Vehicle Loan', 'Machinery Loan', 'Inventory Loan', 'Project Loan',
            'Development Loan', 'Renovation Loan', 'Expansion Loan', 'Land Purchase Loan',
            'Building Loan', 'Infrastructure Loan', 'Islamic Finance', 'Conventional Loan',
            'Short Term Loan', 'Long Term Loan', 'Secured Loan', 'Unsecured Loan',
            'Fixed Rate Loan', 'Variable Rate Loan', 'Line of Credit', 'Overdraft Facility',
            'Import Financing', 'Export Financing', 'SME Loan', 'Corporate Loan',
            'Agricultural Loan', 'Housing Loan', 'Commercial Loan'
        ];

        foreach ($types as $type) {
            DB::table('loan_types')->insert([
                'name' => $type,
                'description' => $type . ' for construction business needs',
                'is_active' => 1,
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}