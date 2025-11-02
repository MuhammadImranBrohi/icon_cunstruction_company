@extends('cuns_manager.layouts.main')

@section('title', 'Financial Reports - Construction Manager')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <!-- Page Header -->
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="fw-bold py-3 mb-0">
                        <span class="text-muted fw-light">Reports /</span> Financial Analytics
                    </h4>
                    <div class="d-flex gap-2">
                        <button class="btn btn-outline-secondary" data-bs-toggle="modal"
                            data-bs-target="#financialSettingsModal">
                            <span class="material-icons-round me-2">settings</span>
                            Settings
                        </button>
                        <button class="btn btn-primary" onclick="generateFinancialReport()">
                            <span class="material-icons-round me-2">add</span>
                            Generate Report
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
                            <h6 class="card-title text-muted mb-2">Utilization</h6>
                            <h4 class="text-warning mb-0">{{ $overview['utilization_rate'] }}%</h4>
                            <div class="progress mt-2" style="height: 4px;">
                                <div class="progress-bar bg-warning" style="width: {{ $overview['utilization_rate'] }}%">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-4 col-md-4 col-6 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="card-info">
                            <h6 class="card-title text-muted mb-2">This Month</h6>
                            <h4 class="text-danger mb-0">₹{{ number_format($overview['monthly_spent'] / 100000, 2) }}L</h4>
                            <small class="text-muted">Monthly Expense</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-4 col-md-4 col-6 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="card-info">
                            <h6 class="card-title text-muted mb-2">Variance</h6>
                            <h4 class="text-secondary mb-0">{{ $overview['variance'] }}%</h4>
                            <small class="text-{{ $overview['variance'] > 0 ? 'danger' : 'success' }}">
                                {{ $overview['variance'] > 0 ? 'Over Budget' : 'Under Budget' }}
                            </small>
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
                                <li><a class="dropdown-item" href="#" onclick="changeChartPeriod('all')">All Time</a>
                                </li>
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

        <!-- Quick Financial Reports -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Quick Financial Reports</h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-xl-2 col-lg-4 col-md-4 col-6">
                                <div class="financial-report-card text-center p-3 border rounded"
                                    onclick="generateQuickReport('budget_variance')">
                                    <span class="material-icons-round text-primary mb-2"
                                        style="font-size: 48px;">analytics</span>
                                    <h6>Budget Variance</h6>
                                    <small class="text-muted">Budget vs Actual</small>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-4 col-md-4 col-6">
                                <div class="financial-report-card text-center p-3 border rounded"
                                    onclick="generateQuickReport('cash_flow')">
                                    <span class="material-icons-round text-success mb-2"
                                        style="font-size: 48px;">trending_up</span>
                                    <h6>Cash Flow</h6>
                                    <small class="text-muted">Income vs Expenses</small>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-4 col-md-4 col-6">
                                <div class="financial-report-card text-center p-3 border rounded"
                                    onclick="generateQuickReport('expense_analysis')">
                                    <span class="material-icons-round text-danger mb-2"
                                        style="font-size: 48px;">pie_chart</span>
                                    <h6>Expense Analysis</h6>
                                    <small class="text-muted">Category-wise</small>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-4 col-md-4 col-6">
                                <div class="financial-report-card text-center p-3 border rounded"
                                    onclick="generateQuickReport('project_profitability')">
                                    <span class="material-icons-round text-warning mb-2"
                                        style="font-size: 48px;">account_balance</span>
                                    <h6>Profitability</h6>
                                    <small class="text-muted">Project-wise</small>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-4 col-md-4 col-6">
                                <div class="financial-report-card text-center p-3 border rounded"
                                    onclick="generateQuickReport('tax_summary')">
                                    <span class="material-icons-round text-info mb-2"
                                        style="font-size: 48px;">receipt_long</span>
                                    <h6>Tax Summary</h6>
                                    <small class="text-muted">GST & Taxes</small>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-4 col-md-4 col-6">
                                <div class="financial-report-card text-center p-3 border rounded"
                                    onclick="generateQuickReport('vendor_payments')">
                                    <span class="material-icons-round text-secondary mb-2"
                                        style="font-size: 48px;">payments</span>
                                    <h6>Vendor Payments</h6>
                                    <small class="text-muted">Supplier-wise</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Project-wise Financial Summary -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Project-wise Financial Summary</h5>
                        <div class="d-flex gap-2">
                            <div class="input-group input-group-merge" style="width: 300px;">
                                <span class="input-group-text">
                                    <span class="material-icons-round">search</span>
                                </span>
                                <input type="text" class="form-control" placeholder="Search projects..."
                                    id="searchProjects">
                            </div>
                            <button class="btn btn-outline-secondary" onclick="exportProjectFinancials()">
                                <span class="material-icons-round me-2">download</span>
                                Export
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover" id="projectFinancialTable">
                                <thead>
                                    <tr>
                                        <th>Project</th>
                                        <th>Total Budget</th>
                                        <th>Spent</th>
                                        <th>Remaining</th>
                                        <th>Utilization</th>
                                        <th>Variance</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($projectFinancials as $project)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar avatar-sm me-3">
                                                        <span class="avatar-initial rounded-circle bg-label-primary">
                                                            <span class="material-icons-round"
                                                                style="font-size: 16px;">construction</span>
                                                        </span>
                                                    </div>
                                                    <div>
                                                        <h6 class="mb-0">{{ $project['name'] }}</h6>
                                                        <small class="text-muted">{{ $project['client'] }}</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="fw-bold">₹{{ number_format($project['budget'] / 100000, 2) }}L
                                                </div>
                                                <small class="text-muted">Allocated</small>
                                            </td>
                                            <td>
                                                <div class="fw-bold text-danger">
                                                    ₹{{ number_format($project['spent'] / 100000, 2) }}L</div>
                                                <small class="text-muted">Actual</small>
                                            </td>
                                            <td>
                                                <div class="fw-bold text-success">
                                                    ₹{{ number_format($project['remaining'] / 100000, 2) }}L</div>
                                                <small class="text-muted">Balance</small>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="progress flex-grow-1 me-2" style="height: 6px;">
                                                        <div class="progress-bar bg-{{ $project['utilization_color'] }}"
                                                            style="width: {{ $project['utilization'] }}%"></div>
                                                    </div>
                                                    <small>{{ $project['utilization'] }}%</small>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="badge bg-{{ $project['variance_color'] }}">
                                                    {{ $project['variance'] }}%
                                                </span>
                                            </td>
                                            <td>
                                                <span
                                                    class="badge bg-{{ $project['status_color'] }}">{{ $project['status'] }}</span>
                                            </td>
                                            <td>
                                                <div class="d-flex gap-1">
                                                    <button class="btn btn-sm btn-outline-primary"
                                                        onclick="viewProjectFinancials({{ $project['id'] }})">
                                                        <span class="material-icons-round"
                                                            style="font-size: 16px;">visibility</span>
                                                    </button>
                                                    <button class="btn btn-sm btn-outline-success"
                                                        onclick="downloadProjectReport({{ $project['id'] }})">
                                                        <span class="material-icons-round"
                                                            style="font-size: 16px;">download</span>
                                                    </button>
                                                    <button class="btn btn-sm btn-outline-info"
                                                        onclick="analyzeProject({{ $project['id'] }})">
                                                        <span class="material-icons-round"
                                                            style="font-size: 16px;">analytics</span>
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

        <!-- Expense Categories -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Expense Categories</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach ($expenseCategories as $category)
                                <div class="col-xl-3 col-lg-4 col-md-6 col-12 mb-4">
                                    <div class="category-card border rounded p-3">
                                        <div class="d-flex justify-content-between align-items-start mb-3">
                                            <div>
                                                <h6 class="mb-1">{{ $category['name'] }}</h6>
                                                <small class="text-muted">{{ $category['description'] }}</small>
                                            </div>
                                            <span class="badge bg-{{ $category['trend_color'] }}">
                                                {{ $category['trend'] }}%
                                            </span>
                                        </div>
                                        <div class="mb-2">
                                            <div class="d-flex justify-content-between align-items-center mb-1">
                                                <small class="text-muted">Spent</small>
                                                <small
                                                    class="fw-bold">₹{{ number_format($category['spent'] / 1000, 1) }}K</small>
                                            </div>
                                            <div class="progress" style="height: 6px;">
                                                <div class="progress-bar bg-{{ $category['color'] }}"
                                                    style="width: {{ $category['percentage'] }}%"></div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <small class="text-muted">Budget:
                                                ₹{{ number_format($category['budget'] / 1000, 1) }}K</small>
                                            <small
                                                class="text-{{ $category['variance_color'] }}">{{ $category['variance'] }}%</small>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Financial Transactions -->
        <div class="row">
            <div class="col-lg-8 col-12 mb-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Recent Financial Transactions</h5>
                        <button class="btn btn-sm btn-outline-primary" onclick="viewAllTransactions()">
                            View All
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Description</th>
                                        <th>Category</th>
                                        <th>Project</th>
                                        <th>Amount</th>
                                        <th>Type</th>
                                        <th>Status</th>
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
                                                <div>
                                                    <h6 class="mb-0" style="font-size: 0.9rem;">
                                                        {{ $transaction['description'] }}</h6>
                                                    <small class="text-muted">{{ $transaction['vendor'] }}</small>
                                                </div>
                                            </td>
                                            <td>
                                                <span
                                                    class="badge bg-light text-dark">{{ $transaction['category'] }}</span>
                                            </td>
                                            <td>
                                                <small class="text-muted">{{ $transaction['project'] }}</small>
                                            </td>
                                            <td>
                                                <div class="fw-bold text-{{ $transaction['type_color'] }}">
                                                    ₹{{ number_format($transaction['amount']) }}
                                                </div>
                                            </td>
                                            <td>
                                                <span
                                                    class="badge bg-{{ $transaction['type_badge'] }}">{{ $transaction['type'] }}</span>
                                            </td>
                                            <td>
                                                <span
                                                    class="badge bg-{{ $transaction['status_color'] }}">{{ $transaction['status'] }}</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Financial Insights & Alerts -->
            <div class="col-lg-4 col-12 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Financial Insights</h5>
                    </div>
                    <div class="card-body">
                        <div class="insights-list">
                            @foreach ($financialInsights as $insight)
                                <div class="insight-item d-flex align-items-start mb-3 p-3 rounded"
                                    style="background: {{ $insight['bg_color'] }};">
                                    <span class="material-icons-round {{ $insight['icon_color'] }} me-3 mt-1">
                                        {{ $insight['icon'] }}
                                    </span>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-1">{{ $insight['title'] }}</h6>
                                        <p class="mb-0 text-muted">{{ $insight['description'] }}</p>
                                        <small class="text-muted">{{ $insight['date'] }}</small>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Budget Alerts -->
                        <div class="mt-4">
                            <h6 class="mb-3">Budget Alerts</h6>
                            <div class="alerts-list">
                                @foreach ($budgetAlerts as $alert)
                                    <div class="alert alert-{{ $alert['type'] }} alert-dismissible fade show mb-2"
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
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Financial Settings Modal -->
    <div class="modal fade" id="financialSettingsModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Financial Report Settings</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="financialSettingsForm">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label class="form-label">Currency & Format</label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <select class="form-select" id="currency">
                                            <option value="INR" selected>Indian Rupee (₹)</option>
                                            <option value="USD">US Dollar ($)</option>
                                            <option value="EUR">Euro (€)</option>
                                            <option value="GBP">British Pound (£)</option>
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
                                <label class="form-label">Report Preferences</label>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="includeTaxes" checked>
                                    <label class="form-check-label" for="includeTaxes">
                                        Include tax calculations in reports
                                    </label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="showPercentages" checked>
                                    <label class="form-check-label" for="showPercentages">
                                        Show percentages in financial reports
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="autoCalculate">
                                    <label class="form-check-label" for="autoCalculate">
                                        Auto-calculate financial metrics
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="fiscalYear" class="form-label">Fiscal Year Start</label>
                                <select class="form-select" id="fiscalYear">
                                    <option value="april">April 1st</option>
                                    <option value="january">January 1st</option>
                                    <option value="custom">Custom Date</option>
                                </select>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label">Alert Thresholds</label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="budgetAlert" class="form-label">Budget Alert (%)</label>
                                        <input type="number" class="form-control" id="budgetAlert" value="90"
                                            min="50" max="100">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="varianceAlert" class="form-label">Variance Alert (%)</label>
                                        <input type="number" class="form-control" id="varianceAlert" value="10"
                                            min="1" max="50">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="saveFinancialSettings()">Save
                        Settings</button>
                </div>
            </div>
        </div>
    </div>

    <style>
        .financial-report-card {
            transition: all 0.3s ease;
            cursor: pointer;
            background: white;
        }

        .financial-report-card:hover {
            border-color: #3b82f6 !important;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            transform: translateY(-2px);
        }

        .category-card {
            transition: all 0.3s ease;
            background: white;
        }

        .category-card:hover {
            border-color: #3b82f6 !important;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .insight-item {
            transition: all 0.3s ease;
        }

        .insight-item:hover {
            transform: translateX(5px);
        }

        .avatar-initial {
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .bg-label-primary {
            background: #eff6ff;
            color: #3b82f6;
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
            initializeFinancialCharts();

            // Search functionality
            const searchInput = document.getElementById('searchProjects');
            if (searchInput) {
                searchInput.addEventListener('input', function() {
                    const searchTerm = this.value.toLowerCase();
                    const rows = document.querySelectorAll('#projectFinancialTable tbody tr');

                    rows.forEach(row => {
                        const text = row.textContent.toLowerCase();
                        row.style.display = text.includes(searchTerm) ? '' : 'none';
                    });
                });
            }
        });

        function initializeFinancialCharts() {
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
                            '#06b6d4', '#84cc16', '#f97316', '#6366f1'
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

        function generateQuickReport(type) {
            console.log('Generating quick financial report:', type);

            // Show loading state
            const card = event.currentTarget;
            const originalContent = card.innerHTML;
            card.innerHTML = `
        <div class="text-center">
            <div class="spinner-border text-primary mb-2" role="status"></div>
            <h6>Generating...</h6>
        </div>
    `;

            // Simulate API call
            setTimeout(() => {
                card.innerHTML = originalContent;
                showToast(`${type.replace('_', ' ').toUpperCase()} report generated!`, 'success');

                // Redirect to specific report page
                window.location.href = `/reports/financial/${type}`;
            }, 1500);
        }

        function generateFinancialReport() {
            console.log('Generating comprehensive financial report');
            window.location.href = '/reports/financial/generate';
        }

        function viewProjectFinancials(projectId) {
            console.log('Viewing project financials:', projectId);
            window.location.href = `/reports/financial/project/${projectId}`;
        }

        function downloadProjectReport(projectId) {
            console.log('Downloading project report:', projectId);
            // Implement download functionality
            showToast('Project financial report downloaded!', 'success');
        }

        function analyzeProject(projectId) {
            console.log('Analyzing project:', projectId);
            window.location.href = `/reports/financial/analyze/${projectId}`;
        }

        function exportProjectFinancials() {
            console.log('Exporting project financials');
            // Implement export functionality
            showToast('Project financial data exported!', 'success');
        }

        function viewAllTransactions() {
            console.log('Viewing all transactions');
            window.location.href = '/finance/transactions';
        }

        function changeChartPeriod(period) {
            console.log('Changing chart period to:', period);
            // Implement period change logic
            showToast(`Chart updated to ${period} view`, 'info');
        }

        function saveFinancialSettings() {
            const settings = {
                currency: document.getElementById('currency').value,
                numberFormat: document.getElementById('numberFormat').value,
                includeTaxes: document.getElementById('includeTaxes').checked,
                showPercentages: document.getElementById('showPercentages').checked,
                autoCalculate: document.getElementById('autoCalculate').checked,
                fiscalYear: document.getElementById('fiscalYear').value,
                budgetAlert: document.getElementById('budgetAlert').value,
                varianceAlert: document.getElementById('varianceAlert').value
            };

            console.log('Saving financial settings:', settings);
            // Implement settings save

            const modal = bootstrap.Modal.getInstance(document.getElementById('financialSettingsModal'));
            modal.hide();

            showToast('Financial settings saved successfully!', 'success');
        }

        function showToast(message, type = 'success') {
            // Simple toast implementation
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
            console.log('Auto-refreshing financial data...');
            // Implement data refresh
        }, 300000);

        // Keyboard shortcuts
        document.addEventListener('keydown', function(e) {
            if (e.ctrlKey || e.metaKey) {
                switch (e.key) {
                    case 'r':
                        e.preventDefault();
                        location.reload();
                        break;
                    case 'n':
                        e.preventDefault();
                        generateFinancialReport();
                        break;
                    case 'e':
                        e.preventDefault();
                        exportProjectFinancials();
                        break;
                }
            }
        });
    </script>
@endsection
