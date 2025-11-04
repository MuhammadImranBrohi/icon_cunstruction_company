<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            // Core Management (5 users)
            [
                'Super Admin', 'superadmin@iconconstruction.com', 1, // super_admin
                '+923001234567', '123 Main Boulevard, Lahore', '1980-05-15', 'male'
            ],
            [
                'Admin User', 'admin@iconconstruction.com', 2, // admin
                '+923001234568', '456 Commercial Area, Karachi', '1985-08-20', 'male'
            ],
            [
                'Project Manager', 'manager@iconconstruction.com', 3, // manager
                '+923001234569', '789 Model Town, Islamabad', '1982-11-10', 'male'
            ],
            [
                'Site Supervisor', 'supervisor@iconconstruction.com', 4, // supervisor
                '+923001234570', '321 Cantt Area, Rawalpindi', '1988-03-25', 'male'
            ],
            [
                'Client Representative', 'client@iconconstruction.com', 5, // client
                '+923001234571', '654 Defence, Lahore', '1975-12-05', 'male'
            ],

            // Technical Team (10 users)
            [
                'Ali Ahmed - Senior Engineer', 'ali.ahmed@iconconstruction.com', 7, // senior_engineer
                '+923001234572', 'Plot 123, Block B, Lahore', '1987-06-18', 'male'
            ],
            [
                'Fatima Khan - Site Engineer', 'fatima.khan@iconconstruction.com', 8, // site_engineer
                '+923001234573', 'House 456, Street 5, Karachi', '1990-09-12', 'female'
            ],
            [
                'Usman Raza - Design Engineer', 'usman.raza@iconconstruction.com', 9, // design_engineer
                '+923001234574', 'Flat 301, Building C, Islamabad', '1989-04-30', 'male'
            ],
            [
                'Ayesha Malik - Junior Engineer', 'ayesha.malik@iconconstruction.com', 10, // junior_engineer
                '+923001234575', '123 Garden Town, Faisalabad', '1993-01-22', 'female'
            ],
            [
                'Hassan Shah - Project Manager', 'hassan.shah@iconconstruction.com', 6, // project_manager
                '+923001234576', '456 Gulberg, Lahore', '1984-07-08', 'male'
            ],
            [
                'Zainab Akhtar - Quality Controller', 'zainab.akhtar@iconconstruction.com', 19, // quality_controller
                '+923001234577', '789 Satellite Town, Rawalpindi', '1991-11-14', 'female'
            ],
            [
                'Bilal Hassan - Safety Officer', 'bilal.hassan@iconconstruction.com', 18, // safety_officer
                '+923001234578', '321 Model Colony, Karachi', '1986-02-28', 'male'
            ],
            [
                'Sadia Rahman - HR Manager', 'sadia.rahman@iconconstruction.com', 11, // hr_manager
                '+923001234579', '654 Civil Lines, Lahore', '1983-10-05', 'female'
            ],
            [
                'Owais Khan - Finance Manager', 'owais.khan@iconconstruction.com', 13, // finance_manager
                '+923001234580', '987 Commercial Area, Islamabad', '1981-12-20', 'male'
            ],
            [
                'Sarah Javed - Accountant', 'sarah.javed@iconconstruction.com', 14, // accountant
                '+923001234581', '147 Defence, Karachi', '1992-03-15', 'female'
            ],

            // Procurement & Store (5 users)
            [
                'Imran Butt - Procurement Manager', 'imran.butt@iconconstruction.com', 15, // procurement_manager
                '+923001234582', '258 Gulshan, Lahore', '1985-05-25', 'male'
            ],
            [
                'Nadia Aslam - Procurement Officer', 'nadia.aslam@iconconstruction.com', 16, // procurement_officer
                '+923001234583', '369 Johar Town, Lahore', '1990-08-18', 'female'
            ],
            [
                'Kamran Ali - Store Keeper', 'kamran.ali@iconconstruction.com', 20, // store_keeper
                '+923001234584', '741 Township, Karachi', '1988-11-30', 'male'
            ],
            [
                'Rabia Siddiqui - Logistics Manager', 'rabia.siddiqui@iconconstruction.com', 21, // logistics_manager
                '+923001234585', '852 North Nazimabad, Karachi', '1987-04-12', 'female'
            ],
            [
                'Asif Mahmood - Driver', 'asif.mahmood@iconconstruction.com', 22, // driver
                '+923001234586', '963 Orangi Town, Karachi', '1982-09-05', 'male'
            ],

            // Site Operations (10 users)
            [
                'Rashid Khan - Site Supervisor', 'rashid.khan@iconconstruction.com', 17, // site_supervisor
                '+923001234587', '159 Mughal Pura, Lahore', '1980-06-22', 'male'
            ],
            [
                'Farhan Ahmed - Foreman', 'farhan.ahmed@iconconstruction.com', 18, // foreman
                '+923001234588', '753 Samanabad, Lahore', '1983-03-08', 'male'
            ],
            [
                'Naveed Iqbal - Operator', 'naveed.iqbal@iconconstruction.com', 23, // operator
                '+923001234589', '456 Shadman, Lahore', '1986-12-15', 'male'
            ],
            [
                'Tariq Jamil - Technician', 'tariq.jamil@iconconstruction.com', 24, // technician
                '+923001234590', '852 Garden East, Karachi', '1989-07-28', 'male'
            ],
            [
                'Shahid Rasool - Electrician', 'shahid.rasool@iconconstruction.com', 25, // electrician
                '+923001234591', '369 Liaquatabad, Karachi', '1984-01-10', 'male'
            ],
            [
                'Noman Ali - Plumber', 'noman.ali@iconconstruction.com', 26, // plumber
                '+923001234592', '147 Gulshan, Islamabad', '1987-10-03', 'male'
            ],
            [
                'Salman Khan - Carpenter', 'salman.khan@iconconstruction.com', 27, // carpenter
                '+923001234593', '258 I-8/4, Islamabad', '1990-04-17', 'male'
            ],
            [
                'Adnan Malik - Mason', 'adnan.malik@iconconstruction.com', 28, // mason
                '+923001234594', '963 G-9/1, Islamabad', '1985-11-25', 'male'
            ],
            [
                'Javed Akhtar - Painter', 'javed.akhtar@iconconstruction.com', 29, // painter
                '+923001234595', '741 G-10/2, Islamabad', '1988-08-14', 'male'
            ],
            [
                'Shoaib Hassan - Welder', 'shoaib.hassan@iconconstruction.com', 30, // welder
                '+923001234596', '852 F-7/3, Islamabad', '1983-05-30', 'male'
            ],

            // Support Staff (5 users)
            [
                'Nasir Mahmood - Labor', 'nasir.mahmood@iconconstruction.com', 31, // labor
                '+923001234597', '123 Korangi, Karachi', '1992-02-12', 'male'
            ],
            [
                'Zoya Rehman - Intern', 'zoya.rehman@iconconstruction.com', 32, // intern
                '+923001234598', '456 Clifton, Karachi', '1998-09-08', 'female'
            ],
            [
                'Babar Khan - Trainee', 'babar.khan@iconconstruction.com', 33, // trainee
                '+923001234599', '789 Saddar, Rawalpindi', '1997-12-20', 'male'
            ],
            [
                'Amna Sheikh - Consultant', 'amna.sheikh@iconconstruction.com', 34, // consultant
                '+923001234600', '321 Blue Area, Islamabad', '1978-07-03', 'female'
            ],
            [
                'Kashif Raza - Auditor', 'kashif.raza@iconconstruction.com', 35, // auditor
                '+923001234601', '654 Jinnah Avenue, Islamabad', '1976-04-25', 'male'
            ],
        ];

        foreach ($users as $user) {
            DB::table('users')->insert([
                'name' => $user[0],
                'email' => $user[1],
                'password' => Hash::make('password123'),
                'phone' => $user[3],
                'address' => $user[4],
                'date_of_birth' => $user[5],
                'gender' => $user[6],
                'role_id' => $user[2], // Direct role_id use karo
                'is_active' => 1,
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
