<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FundingSourceTypesTableSeeder extends Seeder
{
    public function run()
    {
        $types = ['Equity', 'Debt', 'Grant', 'Crowdfunding', 'Angel Investment', 'Venture Capital', 'Loan', 'Savings', 'Revenue', 'Donation',
                  'Partnership', 'Sponsor', 'Bond', 'Government Fund', 'Private Fund', 'Internal Fund', 'External Fund', 'Asset Sale', 'Investment Return', 'Miscellaneous',
                  'Foundation', 'Trust', 'Charity', 'Loan Repayment', 'Share Issue', 'Seed Fund', 'Series A', 'Series B', 'Series C', 'Bridge Loan'];

        foreach ($types as $type) {
            DB::table('funding_source_types')->insert([
                'name' => $type,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}