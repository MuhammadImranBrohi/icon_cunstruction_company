<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LeaveTypesTableSeeder extends Seeder
{
    public function run()
    {
        $leaveTypes = [
            ['Annual Leave', 'ANL', 21, 1, 7, '#10B981'],
            ['Sick Leave', 'SKL', 12, 1, 5, '#EF4444'],
            ['Casual Leave', 'CSL', 10, 1, 5, '#3B82F6'],
            ['Maternity Leave', 'MTL', 90, 0, 0, '#8B5CF6'],
            ['Paternity Leave', 'PTL', 7, 0, 0, '#06B6D4'],
            ['Marriage Leave', 'MGL', 5, 0, 0, '#F59E0B'],
            ['Hajj Leave', 'HJL', 30, 0, 0, '#84CC16'],
            ['Umrah Leave', 'UML', 15, 0, 0, '#6366F1'],
            ['Emergency Leave', 'EML', 5, 0, 0, '#DC2626'],
            ['Study Leave', 'STL', 10, 0, 0, '#7C3AED'],
            ['Compensatory Leave', 'CMP', 0, 0, 0, '#059669'],
            ['Half Day Leave', 'HDL', 0, 0, 0, '#D97706'],
            ['Short Leave', 'SHL', 0, 0, 0, '#65A30D'],
            ['Quarantine Leave', 'QTL', 14, 0, 0, '#475569'],
            ['Bereavement Leave', 'BRL', 3, 0, 0, '#6B7280'],
            ['Public Holiday', 'PHL', 0, 0, 0, '#1E40AF'],
            ['Optional Holiday', 'OPH', 2, 0, 0, '#7DD3FC'],
            ['Medical Leave', 'MDL', 30, 0, 0, '#F87171'],
            ['Examination Leave', 'EXL', 7, 0, 0, '#A78BFA'],
            ['Training Leave', 'TRL', 5, 0, 0, '#34D399'],
            ['Volunteer Leave', 'VLT', 2, 0, 0, '#FBBF24'],
            ['Blood Donation Leave', 'BDL', 1, 0, 0, '#DC2626'],
            ['Pilgrimage Leave', 'PGL', 10, 0, 0, '#7C3AED'],
            ['Military Leave', 'MIL', 30, 0, 0, '#1E40AF'],
            ['Jury Duty Leave', 'JDL', 5, 0, 0, '#475569'],
            ['Family Care Leave', 'FCL', 5, 0, 0, '#EC4899'],
            ['Personal Leave', 'PER', 5, 0, 0, '#8B5CF6'],
            ['Religious Leave', 'REL', 3, 0, 0, '#06B6D4'],
            ['Community Service Leave', 'CSV', 2, 0, 0, '#10B981'],
            ['Weather Leave', 'WTL', 0, 0, 0, '#38BDF8'],
        ];

        foreach ($leaveTypes as $leaveType) {
            DB::table('leave_types')->insert([
                'name' => $leaveType[0],
                'code' => $leaveType[1],
                'days_per_year' => $leaveType[2],
                'carry_forward' => $leaveType[3],
                'max_carry_forward_days' => $leaveType[4],
                'color' => $leaveType[5],
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
