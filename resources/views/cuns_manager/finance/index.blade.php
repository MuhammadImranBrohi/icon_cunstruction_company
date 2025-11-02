@extends('cuns_manager.layouts.main')

@section('title', 'Finance - Construction Manager')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <!-- Page Header -->
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="fw-bold py-3 mb-0">
                        <span class="text-muted fw-light">Finance /</span> Financial Management
                    </h4>
                    <div class="d-flex gap-2">
                        <button class="btn btn-outline-secondary" data-bs-toggle="modal"
                            data-bs-target="#financeSettingsModal">
                            <span class="material-icons-round me-2">settings</span>
                            Settings
                        </button>
                        <button class="btn btn-primary"
                            onclick="window.location.href='{{ route('finance.expense_form') }}'">
                            <span class="material-icons-round me-2">add</span>
                            Add Expense
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Financial Overview Cards -->
        <div class="row mb-4">
            <div class="col-xl-2 col-lg-4 col-md-4 col-6 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="card-info">
                            <h6 class="card-title text-muted mb-2">Total Budget</h6>
                            <h4 class="text-primary mb-0">₹{{ number_format($overview['total_budget'] / 100000, 2) }}Cr</h4>
                            <small class="text-muted">All Projects</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-4 col-md-4 col-6 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="card-info">
                            <h6 class="card-title text-muted mb-2">Total Spent</h6>
                            <h4 class="text-info mb-0">₹{{ number_format($overview['total_spent'] / 100000, 2) }}Cr</h4>
                            <small class="text-muted">Actual Expenditure</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-4 col-md-4 col-6 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="card-info">
                            <h6 class="card-title text-muted mb-2">Remaining</h6>
                            <h4 class="text-success mb-0">₹{{ number_format($overview['remaining_budget'] / 100000, 2) }}Cr
                            </h4>
                            <small class="text-muted">Available Balance</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-4 col-md-4 col-6 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="card-info">
                            <h6 class="card-title text-muted mb-2">This Month</h6>
                            <h4 class="text-warning mb-0">₹{{ number_format($overview['monthly_spent'] / 100000, 2) }}L</h4>
                            <small class="text-muted">Monthly Expense</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-4 col-md-4 col-6 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="card-info">
                            <h6 class="card-title text-muted mb-2">Pending Payments</h6>
                            <h4 class="text-danger mb-0">₹{{ number_format($overview['pending_payments'] / 100000, 2) }}L
                            </h4>
                            <small class="text-muted">Awaiting Approval</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-4 col-md-4 col-6 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="card-info">
                            <h6 class="card-title text-muted mb-2">Utilization</h6>
                            <h4 class="text-secondary mb-0">{{ $overview['utilization_rate'] }}%</h4>
                            <div class="progress mt-2" style="height: 4px;">
                                <div class="progress-bar bg-{{ $overview['utilization_color'] }}"
                                    style="width: {{ $overview['utilization_rate'] }}%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Financial Charts -->
        <div class="row mb-4">
            <!-- Budget vs Actual -->
            <div class="col-lg-8 col-12 mb-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Budget vs Actual Spending</h5>
                        <div class="dropdown">
                            <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button"
                                data-bs-toggle="dropdown">
                                Last 6 Months
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#" onclick="changeChartPeriod('3months')">Last 3
                                        Months</a></li>
                                <li><a class="dropdown-item" href="#" onclick="changeChartPeriod('6months')">Last 6
                                        Months</a></li>
                                <li><a class="dropdown-item" href="#" onclick="changeChartPeriod('1year')">Last 1
                                        Year</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <canvas id="budgetVsActualChart" height="300"></canvas>
                    </div>
                </div>
            </div>

            <!-- Expense Distribution -->
            <div class="col-lg-4 col-12 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Expense Distribution</h5>
                    </div>
                    <div class="card-body">
                        <canvas id="expenseDistributionChart" height="300"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Financial Actions -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Quick Financial Actions</h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-xl-2 col-lg-4 col-md-4 col-6">
                                <div class="finance-action-card text-center p-3 border rounded"
                                    onclick="window.location.href='{{ route('finance.expense_form') }}'">
                                    <span class="material-icons-round text-primary mb-2"
                                        style="font-size: 48px;">receipt</span>
                                    <h6>Add Expense</h6>
                                    <small class="text-muted">Record new expense</small>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-4 col-md-4 col-6">
                                <div class="finance-action-card text-center p-3 border rounded" onclick="recordPayment()">
                                    <span class="material-icons-round text-success mb-2"
                                        style="font-size: 48px;">payments</span>
                                    <h6>Record Payment</h6>
                                    <small class="text-muted">Make payment</small>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-4 col-md-4 col-6">
                                <div class="finance-action-card text-center p-3 border rounded"
                                    onclick="generateInvoice()">
                                    <span class="material-icons-round text-info mb-2"
                                        style="font-size: 48px;">description</span>
                                    <h6>Generate Invoice</h6>
                                    <small class="text-muted">Create invoice</small>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-4 col-md-4 col-6">
                                <div class="finance-action-card text-center p-3 border rounded" onclick="viewReports()">
                                    <span class="material-icons-round text-warning mb-2"
                                        style="font-size: 48px;">analytics</span>
                                    <h6>View Reports</h6>
                                    <small class="text-muted">Financial reports</small>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-4 col-md-4 col-6">
                                <div class="finance-action-card text-center p-3 border rounded" onclick="manageVendors()">
                                    <span class="material-icons-round text-danger mb-2"
                                        style="font-size: 48px;">business</span>
                                    <h6>Vendors</h6>
                                    <small class="text-muted">Supplier management</small>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-4 col-md-4 col-6">
                                <div class="finance-action-card text-center p-3 border rounded" onclick="taxManagement()">
                                    <span class="material-icons-round text-secondary mb-2"
                                        style="font-size: 48px;">calculate</span>
                                    <h6>Tax Management</h6>
                                    <small class="text-muted">GST & Taxes</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Transactions -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Recent Transactions</h5>
                        <div class="d-flex gap-2">
                            <div class="input-group input-group-merge" style="width: 300px;">
                                <span class="input-group-text">
                                    <span class="material-icons-round">search</span>
                                </span>
                                <input type="text" class="form-control" placeholder="Search transactions..."
                                    id="searchTransactions">
                            </div>
                            <button class="btn btn-outline-secondary" onclick="exportTransactions()">
                                <span class="material-icons-round me-2">download</span>
                                Export
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover" id="transactionsTable">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Description</th>
                                        <th>Category</th>
                                        <th>Project</th>
                                        <th>Vendor</th>
                                        <th>Amount</th>
                                        <th>Payment Method</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($recentTransactions as $transaction)
                                        <tr>
                                            <td>
                                                <small
                                                    class="text-muted">{{ $transaction['date']->format('M d, Y') }}</small>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span
                                                        class="material-icons-round {{ $transaction['icon_color'] }} me-2">
                                                        {{ $transaction['icon'] }}
                                                    </span>
                                                    <div>
                                                        <h6 class="mb-0" style="font-size: 0.9rem;">
                                                            {{ $transaction['description'] }}</h6>
                                                        <small class="text-muted">Ref:
                                                            {{ $transaction['reference'] }}</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span
                                                    class="badge bg-light text-dark">{{ $transaction['category'] }}</span>
                                            </td>
                                            <td>
                                                <small class="text-muted">{{ $transaction['project_name'] }}</small>
                                            </td>
                                            <td>
                                                <small class="text-muted">{{ $transaction['vendor_name'] }}</small>
                                            </td>
                                            <td>
                                                <div class="fw-bold text-{{ $transaction['amount_color'] }}">
                                                    ₹{{ number_format($transaction['amount']) }}
                                                </div>
                                            </td>
                                            <td>
                                                <span class="badge bg-outline-{{ $transaction['payment_method_color'] }}">
                                                    {{ $transaction['payment_method'] }}
                                                </span>
                                            </td>
                                            <td>
                                                <span
                                                    class="badge bg-{{ $transaction['status_color'] }}">{{ $transaction['status'] }}</span>
                                            </td>
                                            <td>
                                                <div class="d-flex gap-1">
                                                    <button class="btn btn-sm btn-outline-primary"
                                                        onclick="viewTransaction({{ $transaction['id'] }})">
                                                        <span class="material-icons-round"
                                                            style="font-size: 16px;">visibility</span>
                                                    </button>
                                                    <button class="btn btn-sm btn-outline-secondary"
                                                        onclick="editTransaction({{ $transaction['id'] }})">
                                                        <span class="material-icons-round"
                                                            style="font-size: 16px;">edit</span>
                                                    </button>
                                                    <button class="btn btn-sm btn-outline-success"
                                                        onclick="downloadReceipt({{ $transaction['id'] }})">
                                                        <span class="material-icons-round"
                                                            style="font-size: 16px;">receipt</span>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Project-wise Budget -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Project-wise Budget Overview</h5>
                        <button class="btn btn-outline-primary btn-sm" onclick="viewAllProjects()">
                            View All Projects
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach ($projectBudgets as $project)
                                <div class="col-xl-4 col-lg-6 col-12 mb-4">
                                    <div class="project-budget-card border rounded p-3">
                                        <div class="d-flex justify-content-between align-items-start mb-3">
                                            <div>
                                                <h6 class="mb-1">{{ $project['name'] }}</h6>
                                                <small class="text-muted">{{ $project['client'] }}</small>
                                            </div>
                                            <span
                                                class="badge bg-{{ $project['status_color'] }}">{{ $project['status'] }}</span>
                                        </div>

                                        <div class="budget-progress mb-3">
                                            <div class="d-flex justify-content-between align-items-center mb-1">
                                                <small class="text-muted">Budget Utilization</small>
                                                <small class="fw-bold">{{ $project['utilization'] }}%</small>
                                            </div>
                                            <div class="progress" style="height: 8px;">
                                                <div class="progress-bar bg-{{ $project['utilization_color'] }}"
                                                    style="width: {{ $project['utilization'] }}%"></div>
                                            </div>
                                        </div>

                                        <div class="budget-details">
                                            <div class="row text-center">
                                                <div class="col-4">
                                                    <div class="budget-item">
                                                        <h6 class="text-primary mb-0">
                                                            ₹{{ number_format($project['budget'] / 100000, 2) }}L</h6>
                                                        <small class="text-muted">Budget</small>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="budget-item">
                                                        <h6 class="text-danger mb-0">
                                                            ₹{{ number_format($project['spent'] / 100000, 2) }}L</h6>
                                                        <small class="text-muted">Spent</small>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="budget-item">
                                                        <h6 class="text-success mb-0">
                                                            ₹{{ number_format($project['remaining'] / 100000, 2) }}L</h6>
                                                        <small class="text-muted">Remaining</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mt-3">
                                            <button class="btn btn-sm btn-outline-primary w-100"
                                                onclick="viewProjectFinance({{ $project['id'] }})">
                                                View Details
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Approvals & Alerts -->
        <div class="row">
            <div class="col-lg-6 col-12 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Pending Approvals</h5>
                    </div>
                    <div class="card-body">
                        <div class="approvals-list">
                            @foreach ($pendingApprovals as $approval)
                                <div
                                    class="approval-item d-flex align-items-center justify-content-between p-3 border rounded mb-3">
                                    <div class="d-flex align-items-center">
                                        <span class="material-icons-round text-warning me-3">pending_actions</span>
                                        <div>
                                            <h6 class="mb-1">{{ $approval['title'] }}</h6>
                                            <small class="text-muted">{{ $approval['description'] }}</small>
                                            <div class="mt-1">
                                                <small class="text-muted">Amount:
                                                    ₹{{ number_format($approval['amount']) }}</small>
                                                <span class="mx-2">•</span>
                                                <small class="text-muted">{{ $approval['days_pending'] }} days
                                                    pending</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="approval-actions">
                                        <button class="btn btn-sm btn-success me-1"
                                            onclick="approveTransaction({{ $approval['id'] }})">
                                            <span class="material-icons-round" style="font-size: 16px;">check</span>
                                        </button>
                                        <button class="btn btn-sm btn-danger"
                                            onclick="rejectTransaction({{ $approval['id'] }})">
                                            <span class="material-icons-round" style="font-size: 16px;">close</span>
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-12 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Financial Alerts</h5>
                    </div>
                    <div class="card-body">
                        <div class="alerts-list">
                            @foreach ($financialAlerts as $alert)
                                <div class="alert alert-{{ $alert['type'] }} alert-dismissible fade show mb-3"
                                    role="alert">
                                    <div class="d-flex">
                                        <span class="material-icons-round me-2">{{ $alert['icon'] }}</span>
                                        <div>
                                            <h6 class="alert-heading mb-1">{{ $alert['title'] }}</h6>
                                            <p class="mb-1">{{ $alert['message'] }}</p>
                                            <small class="text-muted">{{ $alert['project'] }}</small>
                                        </div>
                                    </div>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>
                            @endforeach
                        </div>

                        <!-- Upcoming Payments -->
                        <div class="mt-4">
                            <h6 class="mb-3">Upcoming Payments</h6>
                            <div class="upcoming-payments">
                                @foreach ($upcomingPayments as $payment)
                                    <div
                                        class="payment-item d-flex align-items-center justify-content-between p-2 border rounded mb-2">
                                        <div>
                                            <h6 class="mb-0" style="font-size: 0.9rem;">{{ $payment['vendor'] }}</h6>
                                            <small class="text-muted">Due: {{ $payment['due_date'] }}</small>
                                        </div>
                                        <div class="text-end">
                                            <div class="fw-bold text-warning">₹{{ number_format($payment['amount']) }}
                                            </div>
                                            <small
                                                class="text-{{ $payment['urgency_color'] }}">{{ $payment['days_until_due'] }}
                                                days</small>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Finance Settings Modal -->
    <div class="modal fade" id="financeSettingsModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Finance Settings</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="financeSettingsForm">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label class="form-label">Currency & Format</label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <select class="form-select" id="currency">
                                            <option value="INR" selected>Indian Rupee (₹)</option>
                                            <option value="USD">US Dollar ($)</option>
                                            <option value="EUR">Euro (€)</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-select" id="numberFormat">
                                            <option value="lakhs">Lakhs & Crores</option>
                                            <option value="thousands">Thousands & Millions</option>
                                            <option value="actual">Actual Values</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label">Tax Settings</label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="gstRate" class="form-label">GST Rate (%)</label>
                                        <input type="number" class="form-control" id="gstRate" value="18"
                                            step="0.1">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="tdsRate" class="form-label">TDS Rate (%)</label>
                                        <input type="number" class="form-control" id="tdsRate" value="10"
                                            step="0.1">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label">Approval Workflow</label>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="autoApproveSmall" checked>
                                    <label class="form-check-label" for="autoApproveSmall">
                                        Auto-approve expenses under ₹10,000
                                    </label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="requireReceipt">
                                    <label class="form-check-label" for="requireReceipt">
                                        Require receipt for all expenses
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="budgetAlerts" checked>
                                    <label class="form-check-label" for="budgetAlerts">
                                        Send budget alert when 80% utilized
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label">Payment Reminders</label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="reminderDays" class="form-label">Reminder Before Due (Days)</label>
                                        <input type="number" class="form-control" id="reminderDays" value="7"
                                            min="1" max="30">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="lateFee" class="form-label">Late Fee Percentage</label>
                                        <input type="number" class="form-control" id="lateFee" value="2"
                                            step="0.1">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label">Report Preferences</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="includeTaxReports" checked>
                                    <label class="form-check-label" for="includeTaxReports">
                                        Include tax details in financial reports
                                    </label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="saveFinanceSettings()">Save Settings</button>
                </div>
            </div>
        </div>
    </div>

    <style>
        .finance-action-card {
            transition: all 0.3s ease;
            cursor: pointer;
            background: white;
        }

        .finance-action-card:hover {
            border-color: #3b82f6 !important;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            transform: translateY(-2px);
        }

        .project-budget-card {
            transition: all 0.3s ease;
            background: white;
        }

        .project-budget-card:hover {
            border-color: #3b82f6 !important;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .approval-item,
        .payment-item {
            transition: all 0.3s ease;
        }

        .approval-item:hover,
        .payment-item:hover {
            border-color: #3b82f6 !important;
            background-color: #f8f9fa;
        }

        .bg-outline-primary {
            background: transparent;
            border: 1px solid #3b82f6;
            color: #3b82f6;
        }

        .bg-outline-success {
            background: transparent;
            border: 1px solid #10b981;
            color: #10b981;
        }

        .bg-outline-warning {
            background: transparent;
            border: 1px solid #f59e0b;
            color: #f59e0b;
        }

        .budget-item {
            padding: 5px 0;
        }

        .table th {
            border-top: none;
            font-weight: 600;
            color: #64748b;
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize charts
            initializeFinanceCharts();

            // Search functionality
            const searchInput = document.getElementById('searchTransactions');
            if (searchInput) {
                searchInput.addEventListener('input', function() {
                    const searchTerm = this.value.toLowerCase();
                    const rows = document.querySelectorAll('#transactionsTable tbody tr');

                    rows.forEach(row => {
                        const text = row.textContent.toLowerCase();
                        row.style.display = text.includes(searchTerm) ? '' : 'none';
                    });
                });
            }
        });

        function initializeFinanceCharts() {
            // Budget vs Actual Chart
            const budgetCtx = document.getElementById('budgetVsActualChart').getContext('2d');
            new Chart(budgetCtx, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($budgetData['months']) !!},
                    datasets: [{
                        label: 'Budget',
                        data: {!! json_encode($budgetData['budget']) !!},
                        backgroundColor: 'rgba(59, 130, 246, 0.7)',
                        borderColor: '#3b82f6',
                        borderWidth: 1
                    }, {
                        label: 'Actual',
                        data: {!! json_encode($budgetData['actual']) !!},
                        backgroundColor: 'rgba(16, 185, 129, 0.7)',
                        borderColor: '#10b981',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Amount (₹)'
                            }
                        }
                    }
                }
            });

            // Expense Distribution Chart
            const expenseCtx = document.getElementById('expenseDistributionChart').getContext('2d');
            new Chart(expenseCtx, {
                type: 'doughnut',
                data: {
                    labels: {!! json_encode($expenseChart['categories']) !!},
                    datasets: [{
                        data: {!! json_encode($expenseChart['amounts']) !!},
                        backgroundColor: [
                            '#3b82f6', '#ef4444', '#10b981', '#f59e0b', '#8b5cf6',
                            '#06b6d4', '#84cc16', '#f97316'
                        ]
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'bottom'
                        }
                    }
                }
            });
        }

        function changeChartPeriod(period) {
            console.log('Changing chart period to:', period);
            // Implement period change logic
            showToast(`Chart period updated to ${period}`, 'info');
        }

        function recordPayment() {
            console.log('Recording payment');
            // Implement payment recording
            showToast('Opening payment recording form...', 'info');
        }

        function generateInvoice() {
            console.log('Generating invoice');
            window.location.href = '/finance/invoices/create';
        }

        function viewReports() {
            console.log('Viewing financial reports');
            window.location.href = '/reports/financial';
        }

        function manageVendors() {
            console.log('Managing vendors');
            window.location.href = '/finance/vendors';
        }

        function taxManagement() {
            console.log('Managing taxes');
            window.location.href = '/finance/taxes';
        }

        function viewTransaction(transactionId) {
            console.log('Viewing transaction:', transactionId);
            window.location.href = `/finance/transactions/${transactionId}`;
        }

        function editTransaction(transactionId) {
            console.log('Editing transaction:', transactionId);
            window.location.href = `/finance/transactions/${transactionId}/edit`;
        }

        function downloadReceipt(transactionId) {
            console.log('Downloading receipt for transaction:', transactionId);
            // Implement receipt download
            showToast('Receipt downloaded successfully!', 'success');
        }

        function exportTransactions() {
            console.log('Exporting transactions');
            // Implement export functionality
            showToast('Transactions exported successfully!', 'success');
        }

        function viewProjectFinance(projectId) {
            console.log('Viewing project finance:', projectId);
            window.location.href = `/finance/projects/${projectId}`;
        }

        function viewAllProjects() {
            console.log('Viewing all projects');
            window.location.href = '/finance/projects';
        }

        function approveTransaction(approvalId) {
            if (confirm('Are you sure you want to approve this transaction?')) {
                console.log('Approving transaction:', approvalId);
                // Implement approval logic
                showToast('Transaction approved successfully!', 'success');
            }
        }

        function rejectTransaction(approvalId) {
            const reason = prompt('Please specify the reason for rejection:');
            if (reason) {
                console.log('Rejecting transaction:', approvalId, 'Reason:', reason);
                // Implement rejection logic
                showToast('Transaction rejected!', 'success');
            }
        }

        function saveFinanceSettings() {
            const settings = {
                currency: document.getElementById('currency').value,
                numberFormat: document.getElementById('numberFormat').value,
                gstRate: document.getElementById('gstRate').value,
                tdsRate: document.getElementById('tdsRate').value,
                autoApproveSmall: document.getElementById('autoApproveSmall').checked,
                requireReceipt: document.getElementById('requireReceipt').checked,
                budgetAlerts: document.getElementById('budgetAlerts').checked,
                reminderDays: document.getElementById('reminderDays').value,
                lateFee: document.getElementById('lateFee').value,
                includeTaxReports: document.getElementById('includeTaxReports').checked
            };

            console.log('Saving finance settings:', settings);
            // Implement settings save

            const modal = bootstrap.Modal.getInstance(document.getElementById('financeSettingsModal'));
            modal.hide();

            showToast('Finance settings saved successfully!', 'success');
        }

        function showToast(message, type = 'success') {
            const toast = document.createElement('div');
            toast.className = `alert alert-${type} alert-dismissible fade show position-fixed`;
            toast.style.cssText = 'top: 20px; right: 20px; z-index: 1055; min-width: 300px;';
            toast.innerHTML = `
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    `;
            document.body.appendChild(toast);

            setTimeout(() => {
                toast.remove();
            }, 3000);
        }

        // Auto-refresh data every 5 minutes
        setInterval(() => {
            console.log('Auto-refreshing finance data...');
            // Implement data refresh
        }, 300000);

        // Keyboard shortcuts
        document.addEventListener('keydown', function(e) {
            if (e.ctrlKey || e.metaKey) {
                switch (e.key) {
                    case 'n':
                        e.preventDefault();
                        window.location.href = '{{ route('finance.expense_form') }}';
                        break;
                    case 'r':
                        e.preventDefault();
                        location.reload();
                        break;
                    case 's':
                        e.preventDefault();
                        document.getElementById('financeSettingsModal').click();
                        break;
                }
            }
        });
    </script>
@endsection
