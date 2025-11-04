<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            // User Management (8)
            ['view_users', 'users', 'View users list and details'],
            ['create_users', 'users', 'Create new user accounts'],
            ['edit_users', 'users', 'Edit existing user information'],
            ['delete_users', 'users', 'Delete user accounts'],
            ['manage_user_roles', 'users', 'Assign and manage user roles'],
            ['reset_passwords', 'users', 'Reset user passwords'],
            ['view_user_activity', 'users', 'View user activity logs'],
            ['export_users', 'users', 'Export user data'],

            // Employee Management (8)
            ['view_employees', 'employees', 'View employees list and profiles'],
            ['create_employees', 'employees', 'Create new employee records'],
            ['edit_employees', 'employees', 'Edit employee information'],
            ['delete_employees', 'employees', 'Delete employee records'],
            ['manage_employee_documents', 'employees', 'Upload and manage employee documents'],
            ['view_employee_salary', 'employees', 'View employee salary details'],
            ['manage_employee_attendance', 'employees', 'Manage employee attendance'],
            ['export_employees', 'employees', 'Export employee data'],

            // Project Management (10)
            ['view_projects', 'projects', 'View all projects and details'],
            ['create_projects', 'projects', 'Create new projects'],
            ['edit_projects', 'projects', 'Edit project information'],
            ['delete_projects', 'projects', 'Delete projects'],
            ['manage_project_team', 'projects', 'Assign team members to projects'],
            ['view_project_finances', 'projects', 'View project financial details'],
            ['approve_projects', 'projects', 'Approve project proposals'],
            ['close_projects', 'projects', 'Close completed projects'],
            ['export_projects', 'projects', 'Export project data'],
            ['view_project_reports', 'projects', 'View project reports and analytics'],

            // Task Management (8)
            ['view_tasks', 'tasks', 'View tasks and assignments'],
            ['create_tasks', 'tasks', 'Create new tasks'],
            ['edit_tasks', 'tasks', 'Edit task details'],
            ['delete_tasks', 'tasks', 'Delete tasks'],
            ['assign_tasks', 'tasks', 'Assign tasks to team members'],
            ['update_task_progress', 'tasks', 'Update task progress and status'],
            ['view_task_reports', 'tasks', 'View task reports'],
            ['export_tasks', 'tasks', 'Export task data'],

            // Financial Management (8)
            ['view_finances', 'finances', 'View financial overview'],
            ['manage_expenses', 'finances', 'Create and manage expenses'],
            ['approve_expenses', 'finances', 'Approve expense requests'],
            ['view_invoices', 'finances', 'View and manage invoices'],
            ['create_invoices', 'finances', 'Create new invoices'],
            ['manage_payments', 'finances', 'Record and manage payments'],
            ['view_financial_reports', 'finances', 'View financial reports'],
            ['export_financial_data', 'finances', 'Export financial data'],

            // Material Management (8)
            ['view_materials', 'materials', 'View materials inventory'],
            ['create_materials', 'materials', 'Add new materials to inventory'],
            ['edit_materials', 'materials', 'Edit material information'],
            ['delete_materials', 'materials', 'Remove materials from inventory'],
            ['manage_material_purchases', 'materials', 'Manage material purchases'],
            ['track_material_usage', 'materials', 'Track material usage'],
            ['view_material_reports', 'materials', 'View material reports'],
            ['export_materials', 'materials', 'Export material data'],

            // Equipment Management (8)
            ['view_equipment', 'equipment', 'View equipment inventory'],
            ['create_equipment', 'equipment', 'Add new equipment'],
            ['edit_equipment', 'equipment', 'Edit equipment details'],
            ['delete_equipment', 'equipment', 'Remove equipment'],
            ['assign_equipment', 'equipment', 'Assign equipment to projects'],
            ['manage_equipment_maintenance', 'equipment', 'Schedule and track maintenance'],
            ['view_equipment_reports', 'equipment', 'View equipment reports'],
            ['export_equipment', 'equipment', 'Export equipment data'],

            // System Settings (6)
            ['view_settings', 'settings', 'View system settings'],
            ['manage_settings', 'settings', 'Modify system settings'],
            ['backup_system', 'settings', 'Perform system backups'],
            ['restore_system', 'settings', 'Restore system from backup'],
            ['view_system_logs', 'settings', 'View system logs'],
            ['manage_database', 'settings', 'Manage database operations'],
        ];

        foreach ($permissions as $permission) {
            DB::table('permissions')->insert([
                'name' => $permission[0],
                'guard_name' => 'web',
                'group_name' => $permission[1],
                'description' => $permission[2],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
