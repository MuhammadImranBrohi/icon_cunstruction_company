<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     */
    public function run(): void
    {
        $this->call([
                // 🔹 Core Tables
            DepartmentsTableSeeder::class,
            DesignationsTableSeeder::class,
            EmployeesTableSeeder::class,
            EmployeeDocumentsTableSeeder::class,
            ClientsTableSeeder::class,

                // 🔹 Projects
            ProjectsTableSeeder::class,
            ProjectCategoriesTableSeeder::class,
            ProjectStatusTableSeeder::class,
            ProjectEquipmentTableSeeder::class,
            ProjectTeamTableSeeder::class,

                // 🔹 Tasks & Attendance
            TasksTableSeeder::class,
            AttendanceTableSeeder::class,
            LeaveTypesTableSeeder::class,
            LeavesTableSeeder::class,

                // 🔹 Financials
            ExpenseCategoriesTableSeeder::class,
            ExpensesTableSeeder::class,
            FundingSourceTypesTableSeeder::class,
            FundingSourcesTableSeeder::class,
            LoanTypesTableSeeder::class,
            LoansTableSeeder::class,
            ClientPaymentsTableSeeder::class,
            SalaryRecordsTableSeeder::class,
            InvoicesTableSeeder::class,

                // 🔹 Materials & Equipment
            MaterialsTableSeeder::class,
            MaterialPurchasesTableSeeder::class,
            MaterialUsageTableSeeder::class,
            EquipmentCategoriesTableSeeder::class,
            EquipmentTableSeeder::class,
            EquipmentMaintenanceTableSeeder::class,

                // 🔹 Suppliers & System
            SuppliersTableSeeder::class,
            SystemSettingsTableSeeder::class,
            ActivityLogsTableSeeder::class,

                // 🔹 User & Roles
            UsersTableSeeder::class,
            RolesTableSeeder::class,
            PermissionsTableSeeder::class,
            RoleHasPermissionsTableSeeder::class,
            ModelHasRolesTableSeeder::class,
            ModelHasPermissionsTableSeeder::class,
            UserRolesTableSeeder::class,
        ]);
    }

}
