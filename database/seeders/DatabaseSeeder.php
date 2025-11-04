<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([

            // ========================
            // 🔹 STAGE 1: SYSTEM & CORE SETUP
            // ========================
            UserRolesTableSeeder::class,
            PermissionsTableSeeder::class,
            RoleHasPermissionsTableSeeder::class,
            UsersTableSeeder::class,
            ModelHasRolesTableSeeder::class,
            ModelHasPermissionsTableSeeder::class,
            SystemSettingsTableSeeder::class,

            // ========================
            // 🔹 STAGE 2: ORGANIZATION STRUCTURE
            // ========================
            DepartmentsTableSeeder::class,
            DesignationsTableSeeder::class,
            LeaveTypesTableSeeder::class,

            // ========================
            // 🔹 STAGE 3: PEOPLE MANAGEMENT
            // ========================
            EmployeesTableSeeder::class,
            EmployeeDocumentsTableSeeder::class,

            // ========================
            // 🔹 STAGE 4: CLIENTS & SUPPLIERS
            // ========================
            ClientsTableSeeder::class,
            SuppliersTableSeeder::class,

            // ========================
            // 🔹 STAGE 5: PROJECT MANAGEMENT
            // ========================
            ProjectCategoriesTableSeeder::class,
            ProjectStatusTableSeeder::class,
            ProjectsTableSeeder::class,
            ProjectTeamTableSeeder::class,

            // ========================
            // 🔹 STAGE 6: TASKS & ATTENDANCE
            // ========================
            TasksTableSeeder::class,
            AttendanceTableSeeder::class,
            LeavesTableSeeder::class,

            // ========================
            // 🔹 STAGE 7: FINANCIAL SETUP
            // ========================
            FundingSourceTypesTableSeeder::class,
            LoanTypesTableSeeder::class,
            ExpenseCategoriesTableSeeder::class,
            UnitOfMeasuresTableSeeder::class,

            // ========================
            // 🔹 STAGE 8: CORE FINANCIAL DATA
            // ========================
            FundingSourcesTableSeeder::class,
            LoansTableSeeder::class,
            ExpensesTableSeeder::class,
            ClientPaymentsTableSeeder::class,
            SalaryRecordsTableSeeder::class,
            InvoicesTableSeeder::class,

            // ========================
            // 🔹 STAGE 9: ADVANCED FINANCIAL FEATURES
            // ========================
            LoanRepaymentsTableSeeder::class,
            PaymentSchedulesTableSeeder::class,

            // ========================
            // 🔹 STAGE 10: MATERIALS & EQUIPMENT SETUP
            // ========================
            MaterialCategoriesTableSeeder::class,
            EquipmentCategoriesTableSeeder::class,
            MaterialsTableSeeder::class,
            EquipmentTableSeeder::class,

            // ========================
            // 🔹 STAGE 11: MATERIALS & EQUIPMENT USAGE
            // ========================
            MaterialPurchasesTableSeeder::class,
            MaterialUsageTableSeeder::class,
            ProjectEquipmentTableSeeder::class,
            EquipmentMaintenanceTableSeeder::class,

            // ========================
            // 🔹 STAGE 12: ACTIVITY LOGS (FINAL)
            // ========================
            ActivityLogsTableSeeder::class,

        ]);
    }
}
