<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */

   public function dashboardIndex()
    {
        return view('cuns_admin.dashboard.index');
    }

    // ===== CLIENTS =====
    public function clientsIndex() { return view('cuns_admin.clients.index'); }
    public function clientsCreate() { return view('cuns_admin.clients.create'); }
    public function clientsContracts() { return view('cuns_admin.clients.contracts'); }
    public function clientsFeedback() { return view('cuns_admin.clients.feedback'); }

    // ===== DOCUMENTS =====
    public function documentsFaq() { return view('cuns_admin.documents.faq'); }
    public function documentsInstallationGuide() { return view('cuns_admin.documents.installation_guide'); }
    public function documentsLicense() { return view('cuns_admin.documents.license'); }
    public function documentsUpload() { return view('cuns_admin.documents.upload'); }

    // ===== EMPLOYEES =====
    public function employeesIndex() { return view('cuns_admin.employees.index'); }
    public function employeesCreate() { return view('cuns_admin.employees.create'); }
    public function employeesAttendance() { return view('cuns_admin.employees.attendance'); }
    public function employeesPayroll() { return view('cuns_admin.employees.payroll'); }
    public function employeesPerformance() { return view('cuns_admin.employees.performance'); }

    // ===== EQUIPMENT =====
    public function equipmentIndex() { return view('cuns_admin.equipment.index'); }
    public function equipmentCreate() { return view('cuns_admin.equipment.create'); }
    public function equipmentLogs() { return view('cuns_admin.equipment.logs'); }
    public function equipmentMaintenance() { return view('cuns_admin.equipment.maintenance'); }

    // ===== FINANCE =====
    public function financeIndex() { return view('cuns_admin.finance.index'); }
    public function financeBudget() { return view('cuns_admin.finance.budget'); }
    public function financeInvoices() { return view('cuns_admin.finance.invoices'); }
    public function financePayments() { return view('cuns_admin.finance.payments'); }
    public function financeReports() { return view('cuns_admin.finance.reports'); }
    public function financeTransactions() { return view('cuns_admin.finance.transactions'); }

    // ===== INVENTORY =====
    public function inventoryIndex() { return view('cuns_admin.inventory.index'); }
    public function inventoryCreate() { return view('cuns_admin.inventory.create_inventory'); }
    public function inventoryOrders() { return view('cuns_admin.inventory.inventory_orders'); }
    public function inventoryAlerts() { return view('cuns_admin.inventory.inventory_alerts'); }
    public function inventorySuppliers() { return view('cuns_admin.inventory.inventory_suppliers'); }

    // ===== PROJECTS =====
    public function projectsIndex() { return view('cuns_admin.projects.index'); }
    public function projectsCreate() { return view('cuns_admin.projects.create'); }
    public function projectsShow() { return view('cuns_admin.projects.show'); }
    public function projectsReports() { return view('cuns_admin.projects.reports'); }
    public function projectsMilestones() { return view('cuns_admin.projects.milestones'); }

    // ===== REPORT ====
    public function reportEmployees() { return view('cuns_admin.report.employees'); }
    public function reportFinance() { return view('cuns_admin.report.finance'); }
    public function reportProjects() { return view('cuns_admin.report.projects'); }

    // ===== SETTINGS =====
    public function settingsBackup() { return view('cuns_admin.settings.backup'); }
    public function settingsCompany() { return view('cuns_admin.settings.company'); }
    public function settingsRoles() { return view('cuns_admin.settings.roles'); }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}