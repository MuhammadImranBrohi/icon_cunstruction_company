<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Livewire\Volt\Volt;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\managercontroller;
//
// MfsV7M1Wid-aVAm95Rpzv // R80a6VCb3B-jGKthS2UwP // fkFjr79FjA-2DX6twDLR3
// wyI953fZ4g-nfob0vdpeY // awzuyrbIMR-wN1ekimwS0  // bzuHL2a2UU-C8nykhCW0A // MiGwGfalhw-4H3A8uzzFy // u7uoFPOk80-gKSdRkjnZl

route::get('/',function(){ return view('index'); })->name('home');
Route::get('/index', function () {  return view('index');  })->name('index');
Route::get('/about', function () {   return view('about');  })->name('about');
Route::get('/contact', function () {  return view('contact');  })->name('contact');
Route::get('/feature', function () {  return view('feature');  })->name('feature');
Route::get('/blog',function(){ return view('blog');   })->name('blog');
Route::get('/service', function () {    return view('service'); })->name('service');
Route::get('/project', function () {   return view('project');  })->name('project');
Route::get('/team', function () {    return view('team'); })->name('team');
Route::get('/testimonial', function () {  return view('testimonial');  })->name('testimonial');
Route::view('dashboard', 'dashboard') ->middleware(['auth', 'verified']) ->name('dashboard');
Route::get('/cus_register',function(){ return view('auth.cus_register'); })->name('/cus_register');

Route::post('/cus_login',function(){ return view('auth.cus_login'); })->name('/cus_login');

//  the admin dashboard panel routes
Route::prefix('cuns_admin')->group(function () {
    // ====== DASHBOARD ======
    Route::get('/dashboard/index', [AdminController::class, 'dashboardIndex'])->name('dashboard.index');
    // ====== CLIENTS ======
    Route::prefix('clients')->group(function () {
        Route::get('/', [AdminController::class, 'clientsIndex'])->name('clients.index');
        Route::get('/create', [AdminController::class, 'clientsCreate'])->name('clients.create');
        Route::get('/contracts', [AdminController::class, 'clientsContracts'])->name('clients.contracts');
        Route::get('/feedback', [AdminController::class, 'clientsFeedback'])->name('clients.feedback');  });

    // ====== DOCUMENTS ======
    Route::prefix('documents')->group(function () {
        Route::get('/faq', [AdminController::class, 'documentsFaq'])->name('documents.faq');
        Route::get('/installation_guide', [AdminController::class, 'documentsInstallationGuide'])->name('documents.installation_guide');
        Route::get('/license', [AdminController::class, 'documentsLicense'])->name('documents.license');
        Route::get('/upload', [AdminController::class, 'documentsUpload'])->name('documents.upload');
    });

    // ====== EMPLOYEES ======
    Route::prefix('employees')->group(function () {
        Route::get('/', [AdminController::class, 'employeesIndex'])->name('employees.index');
        Route::get('/create', [AdminController::class, 'employeesCreate'])->name('employees.create');
        Route::get('/attendance', [AdminController::class, 'employeesAttendance'])->name('employees.attendance');
        Route::get('/payroll', [AdminController::class, 'employeesPayroll'])->name('employees.payroll');
        Route::get('/performance', [AdminController::class, 'employeesPerformance'])->name('employees.performance');
    });

    // ====== EQUIPMENT ======
    Route::prefix('equipment')->group(function () {
        Route::get('/', [AdminController::class, 'equipmentIndex'])->name('equipment.index');
        Route::get('/create', [AdminController::class, 'equipmentCreate'])->name('equipment.create');
        Route::get('/logs', [AdminController::class, 'equipmentLogs'])->name('equipment.logs');
        Route::get('/maintenance', [AdminController::class, 'equipmentMaintenance'])->name('equipment.maintenance');
    });

    // ====== FINANCE ======
    Route::prefix('finance')->group(function () {
        Route::get('/', [AdminController::class, 'financeIndex'])->name('finance.index');
        Route::get('/budget', [AdminController::class, 'financeBudget'])->name('finance.budget');
        Route::get('/invoices', [AdminController::class, 'financeInvoices'])->name('finance.invoices');
        Route::get('/payments', [AdminController::class, 'financePayments'])->name('finance.payments');
        Route::get('/reports', [AdminController::class, 'financeReports'])->name('finance.reports');
        Route::get('/transactions', [AdminController::class, 'financeTransactions'])->name('finance.transactions');
    });

    // ====== INVENTORY ======
    Route::prefix('inventory')->group(function () {
        Route::get('/', [AdminController::class, 'inventoryIndex'])->name('inventory.index');
        Route::get('/create', [AdminController::class, 'inventoryCreate'])->name('inventory.create');
        Route::get('/inventory_orders', [AdminController::class, 'inventoryOrders'])->name('inventory.orders');
        Route::get('/inventory_alerts', [AdminController::class, 'inventoryAlerts'])->name('inventory.alerts');
        Route::get('/inventory_suppliers', [AdminController::class, 'inventorySuppliers'])->name('inventory.suppliers');
    });
    // ====== PROJECTS ======
    Route::prefix('projects')->group(function () {
        Route::get('/', [AdminController::class, 'projectsIndex'])->name('projects.index');
        Route::get('/create', [AdminController::class, 'projectsCreate'])->name('projects.create');
        Route::get('/show', [AdminController::class, 'projectsShow'])->name('projects.show');
        Route::get('/reports', [AdminController::class, 'projectsReports'])->name('projects.reports');
        Route::get('/milestones', [AdminController::class, 'projectsMilestones'])->name('projects.milestones');
    });
    // ====== REPORT ======
    Route::prefix('report')->group(function () {
        Route::get('/employees', [AdminController::class, 'reportEmployees'])->name('report.employees');
        Route::get('/finance', [AdminController::class, 'reportFinance'])->name('report.finance');
        Route::get('/projects', [AdminController::class, 'reportProjects'])->name('report.projects');
    });
    // ====== SETTINGS ======
    Route::prefix('settings')->group(function () {
        Route::get('/backup', [AdminController::class, 'settingsBackup'])->name('settings.backup');
        Route::get('/company', [AdminController::class, 'settingsCompany'])->name('settings.company');
        Route::get('/roles', [AdminController::class, 'settingsRoles'])->name('settings.roles');
    });

});

//  the manager dashboard panel routes
Route::prefix('cuns_manager')->group(function () {
    Route::get('/dashboard/index', [App\Http\Controllers\managercontroller::class, 'index'])->name('dashboard.index');
});



//  the by laravel
Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('profile.edit');
    Volt::route('settings/password', 'settings.password')->name('password.edit');
    Volt::route('settings/appearance', 'settings.appearance')->name('appearance.edit');
    Volt::route('settings/two-factor', 'settings.two-factor')
        ->middleware(
            when(
                Features::canManageTwoFactorAuthentication()
                    && Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword'),
                ['password.confirm'],
                [],
            ),
        )
        ->name('two-factor.show');
});

require __DIR__.'/auth.php';

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


// 2025_10_21_000006_create_subcontractors_table.php;
// 2025_10_21_000013_create_financial_transactions_table.php;
// 1️⃣5️⃣ Project Employees (Pivot Table);
// last continue from tabel 15;

// echo "# icon_cunstruction_company" >> README.md;
// git init;
// git add README.md
// git commit -m "first commit"
// git branch -M main
// git remote add origin https://github.com/MuhammadImranBrohi/icon_cunstruction_company.git
// git push -u origin main

//
// --------------------------------------------------------------------
// --------------------------------------------------------------------
// --------------------------------------------------------------------
// or push an existing repository from the command line
// git remote add origin https://github.com/MuhammadImranBrohi/icon_cunstruction_company.git
// git branch -M main
// git push -u origin main