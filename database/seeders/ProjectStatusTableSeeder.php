<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectStatusTableSeeder extends Seeder
{
    public function run()
    {
        $statuses = [
            ['Planning', '#6B7280', 'Project in planning phase'],
            ['Design', '#8B5CF6', 'Architectural design in progress'],
            ['Approval', '#F59E0B', 'Awaiting regulatory approvals'],
            ['Site Preparation', '#10B981', 'Site clearing and preparation'],
            ['Foundation', '#059669', 'Foundation work in progress'],
            ['Structure', '#DC2626', 'Structural construction ongoing'],
            ['MEP Works', '#0369A1', 'Mechanical, Electrical, Plumbing works'],
            ['Finishing', '#7C3AED', 'Interior and exterior finishing'],
            ['Landscaping', '#65A30D', 'Landscaping and external works'],
            ['Final Inspection', '#D97706', 'Final quality inspection'],
            ['Completed', '#15803D', 'Project successfully completed'],
            ['On Hold', '#EF4444', 'Project temporarily on hold'],
            ['Cancelled', '#6B7280', 'Project cancelled'],
            ['Delayed', '#F59E0B', 'Project behind schedule'],
            ['Budget Review', '#8B5CF6', 'Budget review in progress'],
            ['Material Procurement', '#10B981', 'Procuring construction materials'],
            ['Quality Check', '#059669', 'Quality assurance checks'],
            ['Safety Audit', '#DC2626', 'Safety compliance audit'],
            ['Client Review', '#0369A1', 'Under client review'],
            ['Handover', '#7C3AED', 'Ready for handover to client'],
            ['Warranty Period', '#65A30D', 'Under warranty period'],
            ['Maintenance', '#D97706', 'Under maintenance phase'],
            ['Expansion', '#15803D', 'Project expansion in progress'],
            ['Renovation', '#EF4444', 'Renovation work ongoing'],
            ['Demolition', '#6B7280', 'Demolition phase'],
            ['Excavation', '#F59E0B', 'Excavation work in progress'],
            ['Piling', '#8B5CF6', 'Piling work ongoing'],
            ['Steel Work', '#10B981', 'Steel structure erection'],
            ['Concrete Work', '#059669', 'Concrete pouring and finishing'],
            ['Roofing', '#DC2626', 'Roof construction ongoing'],
        ];

        foreach ($statuses as $status) {
            DB::table('project_statuses')->insert([
                'name' => $status[0],
                'color' => $status[1],
                'is_active' => 1,
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
