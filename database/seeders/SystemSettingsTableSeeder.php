<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SystemSettingsTableSeeder extends Seeder
{
    public function run()
    {
        $settings = [
            // Company Information
            ['company_name', 'Icon Construction Company', 'string', 'company', 'Company name for system', 1],
            ['company_address', '123 Main Boulevard, Lahore, Pakistan', 'string', 'company', 'Company physical address', 1],
            ['company_phone', '+92-42-1234567', 'string', 'company', 'Company contact number', 1],
            ['company_email', 'info@iconconstruction.com', 'string', 'company', 'Company email address', 1],
            ['company_website', 'www.iconconstruction.com', 'string', 'company', 'Company website', 1],

            // Financial Settings
            ['currency', 'PKR', 'string', 'financial', 'Default currency', 0],
            ['tax_rate', '17', 'integer', 'financial', 'Sales tax rate percentage', 0],
            ['invoice_prefix', 'INV-', 'string', 'financial', 'Invoice number prefix', 0],
            ['payment_terms', 'net_30', 'string', 'financial', 'Default payment terms', 0],

            // Project Settings
            ['default_project_status', '1', 'integer', 'projects', 'Default project status ID', 0],
            ['project_code_prefix', 'PROJ-', 'string', 'projects', 'Project code prefix', 0],
            ['auto_generate_project_code', '1', 'boolean', 'projects', 'Auto generate project codes', 0],

            // Employee Settings
            ['employee_code_prefix', 'EMP-', 'string', 'employees', 'Employee code prefix', 0],
            ['default_working_hours', '8', 'integer', 'employees', 'Default daily working hours', 0],
            ['overtime_rate', '1.5', 'string', 'employees', 'Overtime rate multiplier', 0],

            // Attendance Settings
            ['check_in_time', '09:00:00', 'string', 'attendance', 'Default check-in time', 0],
            ['check_out_time', '17:00:00', 'string', 'attendance', 'Default check-out time', 0],
            ['late_threshold', '15', 'integer', 'attendance', 'Late threshold in minutes', 0],

            // Leave Settings
            ['annual_leave_days', '21', 'integer', 'leaves', 'Annual leave days per year', 0],
            ['sick_leave_days', '12', 'integer', 'leaves', 'Sick leave days per year', 0],
            ['casual_leave_days', '10', 'integer', 'leaves', 'Casual leave days per year', 0],

            // Material Settings
            ['low_stock_threshold', '10', 'integer', 'materials', 'Low stock alert threshold', 0],
            ['material_code_prefix', 'MAT-', 'string', 'materials', 'Material code prefix', 0],

            // Equipment Settings
            ['equipment_code_prefix', 'EQP-', 'string', 'equipment', 'Equipment code prefix', 0],
            ['maintenance_reminder_days', '7', 'integer', 'equipment', 'Maintenance reminder days before due', 0],

            // System Settings
            ['pagination_limit', '25', 'integer', 'system', 'Default records per page', 0],
            ['date_format', 'd-m-Y', 'string', 'system', 'Default date format', 0],
            ['time_format', 'H:i:s', 'string', 'system', 'Default time format', 0],
            ['auto_logout_minutes', '30', 'integer', 'system', 'Auto logout after minutes', 0],
        ];

        foreach ($settings as $setting) {
            DB::table('system_settings')->insert([
                'key' => $setting[0],
                'value' => $setting[1],
                'type' => $setting[2],
                'group_name' => $setting[3],
                'description' => $setting[4],
                'is_public' => $setting[5],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
