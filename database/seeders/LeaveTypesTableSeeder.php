<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LeaveTypesTableSeeder extends Seeder
{
    public function run()
    {
        $types = ['Sick Leave','Casual Leave','Annual Leave','Maternity Leave','Paternity Leave','Study Leave','Unpaid Leave','Emergency Leave','Compensatory Leave','Bereavement Leave',
                  'Medical Leave','Vacation Leave','Public Holiday','Half-day Leave','Special Leave','Marriage Leave','Adoption Leave','Examination Leave','Relocation Leave','Sabbatical'];

        foreach ($types as $type) {
            DB::table('leave_types')->insert([
                'name' => $type,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
