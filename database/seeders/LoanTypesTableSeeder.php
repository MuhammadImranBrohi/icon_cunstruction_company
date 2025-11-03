<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LoanTypesTableSeeder extends Seeder
{
    public function run()
    {
        $loanTypes = ['Personal Loan','Business Loan','Home Loan','Car Loan','Education Loan','Bridge Loan','Equipment Loan','Short-term Loan','Long-term Loan','Emergency Loan',
                      'Microfinance','Government Loan','Bank Loan','Private Loan','Startup Loan','Venture Loan','Angel Loan','Convertible Loan','Secured Loan','Unsecured Loan',
                      'Overdraft','Line of Credit','Credit Facility','Investment Loan','Project Loan','Operational Loan','Working Capital Loan','Invoice Financing','Factoring','Leasing'];

        foreach ($loanTypes as $type) {
            DB::table('loan_types')->insert([
                'name' => $type,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}