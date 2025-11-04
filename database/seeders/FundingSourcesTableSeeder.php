<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FundingSourcesTableSeeder extends Seeder
{
    public function run()
    {
        $sourceNames = [
            'HBL Construction Finance', 'UBL Project Funding', 'MCB Development Loan',
            'Alfalah Infrastructure Fund', 'NBP Building Finance', 'Government Development Grant',
            'Private Investor Group', 'Internal Company Reserves', 'International Development Fund',
            'Construction Equity Partners', 'Infrastructure Investment Trust', 'Project Finance Consortium',
            'Building Development Fund', 'Urban Development Grant', 'Housing Finance Scheme',
            'Commercial Development Loan', 'Industrial Funding Program', 'Public Works Department',
            'Municipal Development Fund', 'Federal Infrastructure Grant', 'Provincial Development Fund',
            'International Bank Consortium', 'Private Equity Fund', 'Venture Capital Partners',
            'Islamic Financing Facility', 'Syndicated Loan Arrangement', 'Corporate Bond Issue',
            'Share Capital Injection', 'Retained Earnings Allocation', 'Supplier Credit Facility'
        ];

        $data = [];

        for ($i = 1; $i <= 35; $i++) {
            $amount = rand(1000000, 50000000);
            $receivedDate = $this->getRandomDate('2023-01-01', '2024-06-01');
            $dueDate = date('Y-m-d', strtotime($receivedDate . ' +' . rand(12, 60) . ' months'));

            $data[] = [
                'funding_source_type_id' => rand(1, 35),
                'source_name' => $sourceNames[array_rand($sourceNames)],
                'project_id' => rand(1, 35),
                'amount' => $amount,
                'received_date' => $receivedDate,
                'interest_rate' => rand(5, 15) + (rand(0, 99) / 100),
                'due_date' => $dueDate,
                'is_interest_applied' => rand(0, 1),
                'status' => $this->getFundingStatus(),
                'description' => $this->getFundingDescription(),
                'reference_number' => 'FUND-' . str_pad($i, 6, '0', STR_PAD_LEFT),
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('funding_sources')->insert($data);
    }

    private function getRandomDate($start, $end)
    {
        return date('Y-m-d', rand(strtotime($start), strtotime($end)));
    }

    private function getFundingStatus()
    {
        $statuses = ['received', 'pending', 'partial'];
        return $statuses[array_rand($statuses)];
    }

    private function getFundingDescription()
    {
        $descriptions = [
            'Project development funding for construction activities',
            'Infrastructure development loan for project completion',
            'Working capital financing for ongoing construction',
            'Equipment purchase and project development funding',
            'Construction phase financing as per agreement',
        ];
        return $descriptions[array_rand($descriptions)];
    }
}
