<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectsTableSeeder extends Seeder
{
    public function run()
    {
        $projectTitles = [
            'Luxury Apartment Complex', 'Commercial Plaza Construction', 'Hospital Renovation',
            'School Building Project', 'Shopping Mall Development', 'Office Tower Construction',
            'Residential Villas Project', 'Industrial Warehouse', 'Bridge Construction',
            'Road Infrastructure', 'Water Treatment Plant', 'Power Station Construction',
            'Hotel Development', 'University Campus', 'Sports Complex',
            'Community Center', 'Park Development', 'Swimming Pool Construction',
            'Museum Renovation', 'Library Building', 'Police Station Construction',
            'Fire Station Building', 'Bank Branch Construction', 'Restaurant Development',
            'Car Parking Plaza', 'Metro Station', 'Bus Terminal',
            'Airport Terminal', 'Railway Station', 'Port Development',
            'Dam Construction', 'Canal Lining', 'Irrigation Project'
        ];

        $locations = [
            'DHA Phase 1, Lahore', 'Bahria Town, Karachi', 'Gulberg, Islamabad',
            'Cantt Area, Rawalpindi', 'Model Town, Faisalabad', 'University Road, Multan',
            'City Center, Peshawar', 'Jinnah Road, Quetta', 'Main Boulevard, Gujranwala',
            'Commercial Area, Sialkot', 'Industrial Zone, Sargodha', 'Defence, Lahore',
            'Clifton, Karachi', 'Blue Area, Islamabad', 'Saddar, Rawalpindi'
        ];

        for ($i = 1; $i <= 35; $i++) {
            $title = $projectTitles[array_rand($projectTitles)] . ' ' . $this->getRandomSuffix();
            $startDate = $this->getRandomDate('2023-01-01', '2024-06-01');
            $endDate = date('Y-m-d', strtotime($startDate . ' +' . rand(6, 24) . ' months'));

            DB::table('projects')->insert([
                'project_code' => 'PROJ-' . str_pad($i, 4, '0', STR_PAD_LEFT),
                'title' => $title,
                'description' => $this->getProjectDescription($title),
                'location' => $locations[array_rand($locations)],
                'start_date' => $startDate,
                'end_date' => $endDate,
                'estimated_budget' => rand(5000000, 50000000),
                'actual_cost' => 0,
                'project_category_id' => rand(1, 35),
                'project_status_id' => rand(1, 30),
                'client_id' => rand(1, 35),
                'manager_id' => rand(1, 35),
                'contract_amount' => rand(5000000, 50000000),
                'advance_payment' => rand(500000, 5000000),
                'retention_percentage' => rand(5, 10),
                'completion_percentage' => rand(0, 100),
                'notes' => $this->getProjectNotes(),
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    private function getRandomSuffix()
    {
        $suffixes = ['Phase I', 'Phase II', 'Extension', 'Renovation', 'New Construction', '2024'];
        return $suffixes[array_rand($suffixes)];
    }

    private function getRandomDate($start, $end)
    {
        return date('Y-m-d', rand(strtotime($start), strtotime($end)));
    }

    private function getProjectDescription($title)
    {
        $descriptions = [
            "This project involves the construction of $title with modern facilities and sustainable design principles.",
            "$title focusing on quality construction and timely completion with international standards.",
            "A comprehensive $title project including all civil works, MEP services, and finishing.",
            "$title development with emphasis on structural integrity and architectural excellence.",
            "Construction of $title incorporating green building technologies and energy-efficient systems.",
        ];
        return $descriptions[array_rand($descriptions)];
    }

    private function getProjectNotes()
    {
        $notes = [
            'Special attention required for foundation work due to soil conditions.',
            'Client has specific requirements for interior finishes.',
            'Project timeline is critical for client business operations.',
            'Coordination required with multiple utility providers.',
            'Environmental compliance measures to be strictly followed.',
        ];
        return $notes[array_rand($notes)];
    }
}
