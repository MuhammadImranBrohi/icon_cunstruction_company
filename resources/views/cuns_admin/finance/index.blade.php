@extends('layouts.app')

@section('title', 'Finance Overview')
@section('page_title', 'Finance Dashboard')

@section('content')
    <div class="container-fluid">

        <!-- ====== HEADER ====== -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4 class="fw-bold text-primary mb-0">Finance Dashboard</h4>
                <small class="text-muted">Overview of company’s financial health and key metrics</small>
            </div>
            <div>
                <button class="btn btn-primary btn-sm me-2"><i class="fas fa-file-pdf me-1"></i>Export PDF</button>
                <button class="btn btn-outline-primary btn-sm"><i class="fas fa-download me-1"></i>Download Report</button>
            </div>
        </div>

        <!-- ====== STATISTICS CARDS ====== -->
        <div class="row g-3 mb-4">
            <div class="col-md-3">
                <div class="card shadow-sm border-0 p-3">
                    <h6 class="text-muted">Total Revenue</h6>
                    <h4 class="text-success fw-bold">$124,800</h4>
                    <div class="progress mt-2" style="height:6px;">
                        <div class="progress-bar bg-success" style="width: 70%"></div>
                    </div>
                    <small class="text-muted d-block mt-1">+12% from last month</small>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm border-0 p-3">
                    <h6 class="text-muted">Total Expenses</h6>
                    <h4 class="text-danger fw-bold">$92,450</h4>
                    <div class="progress mt-2" style="height:6px;">
                        <div class="progress-bar bg-danger" style="width: 60%"></div>
                    </div>
                    <small class="text-muted d-block mt-1">+7% from last month</small>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm border-0 p-3">
                    <h6 class="text-muted">Pending Invoices</h6>
                    <h4 class="text-warning fw-bold">$8,230</h4>
                    <div class="progress mt-2" style="height:6px;">
                        <div class="progress-bar bg-warning" style="width: 45%"></div>
                    </div>
                    <small class="text-muted d-block mt-1">5 invoices unpaid</small>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm border-0 p-3">
                    <h6 class="text-muted">Net Profit</h6>
                    <h4 class="text-info fw-bold">$32,350</h4>
                    <div class="progress mt-2" style="height:6px;">
                        <div class="progress-bar bg-info" style="width: 80%"></div>
                    </div>
                    <small class="text-muted d-block mt-1">+9% from last month</small>
                </div>
            </div>
        </div>

        <!-- ====== EXPENSE PIE CHART ====== -->
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                <h6 class="fw-bold mb-0">Expense Distribution</h6>
                <select id="financeFilter" class="form-select form-select-sm w-auto">
                    <option value="month">This Month</option>
                    <option value="quarter">This Quarter</option>
                    <option value="year">This Year</option>
                </select>
            </div>
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-7">
                        <canvas id="expensePieChart" height="220"></canvas>
                    </div>
                    <div class="col-md-5">
                        <ul class="list-group small" id="expenseDetails">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span><i class="fas fa-tools text-primary me-2"></i> Materials</span>
                                <span class="fw-bold">$35,000</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span><i class="fas fa-users text-success me-2"></i> Labor</span>
                                <span class="fw-bold">$28,000</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span><i class="fas fa-truck text-warning me-2"></i> Transportation</span>
                                <span class="fw-bold">$12,000</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span><i class="fas fa-file-invoice-dollar text-danger me-2"></i> Overheads</span>
                                <span class="fw-bold">$17,450</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- ====== TRANSACTION HISTORY TABLE ====== -->
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                <h6 class="fw-bold mb-0">Recent Transactions</h6>
                <input type="text" class="form-control form-control-sm w-25" placeholder="Search transaction...">
            </div>
            <div class="card-body table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Type</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Project</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>001</td>
                            <td>2025-10-05</td>
                            <td>Expense</td>
                            <td>$4,500</td>
                            <td><span class="badge bg-danger">Pending</span></td>
                            <td>Highway Bridge</td>
                        </tr>
                        <tr>
                            <td>002</td>
                            <td>2025-10-07</td>
                            <td>Revenue</td>
                            <td>$9,800</td>
                            <td><span class="badge bg-success">Received</span></td>
                            <td>Green Tower</td>
                        </tr>
                        <tr>
                            <td>003</td>
                            <td>2025-10-10</td>
                            <td>Expense</td>
                            <td>$2,300</td>
                            <td><span class="badge bg-success">Approved</span></td>
                            <td>City Mall</td>
                        </tr>
                        <tr>
                            <td>004</td>
                            <td>2025-10-12</td>
                            <td>Revenue</td>
                            <td>$5,600</td>
                            <td><span class="badge bg-success">Received</span></td>
                            <td>Smart Residency</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- ====== NOTES SECTION ====== -->
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-body">
                <h6 class="fw-bold">Finance Notes</h6>
                <textarea class="form-control mt-2" rows="3" placeholder="Add your notes or reminders..."></textarea>
                <div class="mt-3 d-flex justify-content-end">
                    <button class="btn btn-primary btn-sm">
                        <i class="fas fa-save me-1"></i> Save Note
                    </button>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('expensePieChart').getContext('2d');
            const expensePieChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['Materials', 'Labor', 'Transportation', 'Overheads'],
                    datasets: [{
                        label: 'Expense Breakdown',
                        data: [35000, 28000, 12000, 17450],
                        backgroundColor: ['#0d6efd', '#198754', '#ffc107', '#dc3545'],
                        hoverOffset: 15
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        tooltip: {
                            enabled: true,
                            callbacks: {
                                label: function(context) {
                                    const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                    const value = context.parsed;
                                    const percentage = ((value / total) * 100).toFixed(2);
                                    return `${context.label}: $${value.toLocaleString()} (${percentage}%)`;
                                }
                            }
                        },
                        legend: {
                            position: 'bottom',
                            labels: {
                                usePointStyle: true
                            }
                        }
                    }
                }
            });

            // Filter Logic
            document.getElementById('financeFilter').addEventListener('change', (e) => {
                alert(`Filter switched to: ${e.target.value}`);
            });
        });
    </script>
@endpush
