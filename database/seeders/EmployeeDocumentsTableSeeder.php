<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeDocumentsTableSeeder extends Seeder
{
    public function run()
    {
        $documentTypes = ['cnic', 'degree', 'experience', 'contract', 'other'];
        $documentNames = [
            'CNIC Front Side', 'CNIC Back Side', 'Bachelor Degree', 'Master Degree',
            'Experience Certificate', 'Appointment Letter', 'Contract Agreement',
            'Police Verification', 'Medical Certificate', 'Training Certificate',
            'Salary Slip', 'Bank Statement', 'Profile Picture', 'Resume',
            'Driving License', 'Passport', 'Visa Copy', 'Work Permit'
        ];

        $data = [];

        for ($empId = 1; $empId <= 35; $empId++) {
            $docCount = rand(3, 8); // Each employee has 3-8 documents

            for ($j = 1; $j <= $docCount; $j++) {
                $docType = $documentTypes[array_rand($documentTypes)];
                $docName = $documentNames[array_rand($documentNames)];

                $data[] = [
                    'employee_id' => $empId,
                    'document_type' => $docType,
                    'document_name' => $docName,
                    'file_path' => 'documents/employee_' . $empId . '/' . str_replace(' ', '_', strtolower($docName)) . '.pdf',
                    'file_size' => rand(102400, 5242880), // 100KB to 5MB
                    'mime_type' => 'application/pdf',
                    'description' => $docName . ' for employee record',
                    'uploaded_by' => 1, // Admin user
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        // Insert in chunks to avoid memory issues
        foreach (array_chunk($data, 50) as $chunk) {
            DB::table('employee_documents')->insert($chunk);
        }
    }
}
