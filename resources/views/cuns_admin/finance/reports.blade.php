@extends('layouts.app')

@section('title', 'Finance Reports')
@section('page_title', 'Finance — Reports & Analytics')

@section('content')
    <div class="container-fluid px-4 py-3">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold mb-0">📊 Financial Reports & Insights</h4>
            <div>
                <button class="btn btn-danger btn-sm me-2"><i class="bi bi-file-pdf"></i> Export PDF</button>
                <button class="btn btn-success btn-sm"><i class="bi bi-file-earmark-excel"></i> Export Excel</button>
            </div>
        </div>

        <!-- Filter Bar -->
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-body">
                <form class="row g-3 align-items-end">
                    <div class="col-md-3">
                        <label class="form-label">Project</label>
                        <select class="form-select">
                            <option>All Projects</option>
                            <option>Bridge Construction</option>
                            <option>Residential Complex</option>
                            <option>Highway Repair</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Report Type</label>
                        <select class="form-select">
                            <option>Monthly</option>
                            <option>Quarterly</option>
                            <option>Yearly</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Year</label>
                        <select class="form-select">
                            @for ($year = 2020; $year <= 2025; $year++)
                                <option>{{ $year }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-dark w-100"><i class="bi bi-search"></i> Generate Report</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Summary Cards -->
        <div class="row g-3 mb-4">
            <div class="col-md-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <h6>Total Revenue</h6>
                        <h3 class="fw-bold text-success">$450,000</h3>
                        <small class="text-muted">↑ 12% from last quarter</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <h6>Total Expenses</h6>
                        <h3 class="fw-bold text-danger">$320,500</h3>
                        <small class="text-muted">↓ 5% from last quarter</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <h6>Net Profit</h6>
                        <h3 class="fw-bold text-primary">$129,500</h3>
                        <small class="text-muted">Stable profit margin</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <h6>Tax Payable</h6>
                        <h3 class="fw-bold text-warning">$18,200</h3>
                        <small class="text-muted">Due in 10 days</small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts Section -->
        <div class="row g-4 mb-4">
            <!-- Line Chart -->
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <h6 class="fw-bold mb-3">Revenue & Expenses Trend (2025)</h6>
                        <canvas id="revenueTrendChart" height="120"></canvas>
                    </div>
                </div>
            </div>
            <!-- Pie Chart -->
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <h6 class="fw-bold mb-3">Expense Distribution by Category</h6>
                        <canvas id="expensePieChart" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Reports Table -->
        <div class="card shadow-sm border-0 mb-5">
            <div class="card-header bg-light d-flex justify-content-between align-items-center">
                <h6 class="fw-bold mb-0">📁 Generated Reports</h6>
                <button class="btn btn-outline-secondary btn-sm"><i class="bi bi-arrow-repeat"></i> Refresh</button>
            </div>
            <div class="card-body table-responsive">
                <table class="table align-middle table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Report Name</th>
                            <th>Type</th>
                            <th>Period</th>
                            <th>Generated On</th>
                            <th>Status</th>
                            <th>Download</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 1; $i <= 8; $i++)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>Quarterly Report Q{{ rand(1, 4) }} - 2025</td>
                                <td><span class="badge bg-info">Finance</span></td>
                                <td>Jan – Mar 2025</td>
                                <td>{{ now()->subDays($i)->format('Y-m-d') }}</td>
                                <td><span class="badge bg-success">Ready</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-danger"><i class="bi bi-file-pdf"></i></button>
                                    <button class="btn btn-sm btn-outline-success"><i
                                            class="bi bi-file-earmark-excel"></i></button>
                                </td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Chart.js Scripts -->
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            // Line Chart: Revenue vs Expenses
            const revCtx = document.getElementById('revenueTrendChart');
            new Chart(revCtx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
                    datasets: [{
                            label: 'Revenue',
                            data: [40000, 45000, 47000, 50000, 52000, 55000, 53000, 58000, 60000],
                            borderColor: 'rgb(25,135,84)',
                            tension: 0.3,
                            fill: true,
                            backgroundColor: 'rgba(25,135,84,0.1)'
                        },
                        {
                            label: 'Expenses',
                            data: [30000, 32000, 34000, 36000, 37000, 39000, 41000, 43000, 45000],
                            borderColor: 'rgb(220,53,69)',
                            tension: 0.3,
                            fill: true,
                            backgroundColor: 'rgba(220,53,69,0.1)'
                        }
                    ]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top'
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Pie Chart: Expense Distribution
            const pieCtx = document.getElementById('expensePieChart');
            new Chart(pieCtx, {
                type: 'pie',
                data: {
                    labels: ['Materials', 'Labor', 'Equipment', 'Transport', 'Admin'],
                    datasets: [{
                        data: [35, 25, 15, 10, 15],
                        backgroundColor: [
                            'rgba(13,110,253,0.7)',
                            'rgba(25,135,84,0.7)',
                            'rgba(255,193,7,0.7)',
                            'rgba(220,53,69,0.7)',
                            'rgba(108,117,125,0.7)'
                        ],
                        hoverOffset: 8
                    }]
                },
                options: {
                    plugins: {
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    return context.label + ': ' + context.parsed + '%';
                                }
                            }
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }
            });
        </script>
    @endpush
@endsection

{{-- @extends('layouts.app')

@section('title', 'Finance Reports')
@section('page_title', 'Financial Reports Overview')

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold">Finance Reports</h4>
        <div>
            <button class="btn btn-primary btn-sm me-2"><i class="fas fa-file-pdf"></i> Export PDF</button>
            <button class="btn btn-success btn-sm"><i class="fas fa-file-excel"></i> Export Excel</button>
        </div>
    </div>

    <!-- Filters -->
    <div class="card mb-4 shadow-sm">
        <div class="card-body">
            <form class="row g-3 align-items-end">
                <div class="col-md-3">
                    <label class="form-label">Report Type</label>
                    <select class="form-select">
                        <option>All Reports</option>
                        <option>Project-wise</option>
                        <option>Expense Summary</option>
                        <option>Profit Analysis</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Date Range</label>
                    <input type="date" class="form-control" />
                </div>
                <div class="col-md-3">
                    <label class="form-label">To</label>
                    <input type="date" class="form-control" />
                </div>
                <div class="col-md-3 text-end">
                    <button class="btn btn-dark mt-2"><i class="fas fa-filter"></i> Apply Filter</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Summary Cards -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card shadow-sm border-start border-primary border-3">
                <div class="card-body">
                    <h6 class="text-muted mb-1">Total Income</h6>
                    <h4 class="fw-bold">$425,000</h4>
                    <small class="text-success">↑ 12% from last quarter</small>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm border-start border-danger border-3">
                <div class="card-body">
                    <h6 class="text-muted mb-1">Total Expenses</h6>
                    <h4 class="fw-bold">$312,000</h4>
                    <small class="text-danger">↓ 8% from last quarter</small>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm border-start border-success border-3">
                <div class="card-body">
                    <h6 class="text-muted mb-1">Net Profit</h6>
                    <h4 class="fw-bold">$113,000</h4>
                    <small class="text-success">↑ 18% growth</small>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm border-start border-warning border-3">
                <div class="card-body">
                    <h6 class="text-muted mb-1">Pending Invoices</h6>
                    <h4 class="fw-bold">$29,500</h4>
                    <small class="text-muted">Due within 10 days</small>
                </div>
            </div>
        </div>
    </div>

    <!-- Line Chart Section -->
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-white d-flex justify-content-between align-items-center">
            <h6 class="fw-bold mb-0">Monthly Profit Trends</h6>
            <button class="btn btn-sm btn-outline-secondary">View Full Report</button>
        </div>
        <div class="card-body">
            <canvas id="profitTrendChart" height="120"></canvas>
        </div>
    </div>

    <!-- Top Spending Categories -->
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-white">
            <h6 class="fw-bold mb-0">Top Spending Categories</h6>
        </div>
        <div class="card-body">
            <table class="table table-striped align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Category</th>
                        <th>Project</th>
                        <th>Amount</th>
                        <th>Percentage</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Equipment Purchase</td>
                        <td>Highway Project</td>
                        <td>$95,000</td>
                        <td>30%</td>
                    </tr>
                    <tr>
                        <td>Labor Costs</td>
                        <td>Bridge Construction</td>
                        <td>$72,500</td>
                        <td>22%</td>
                    </tr>
                    <tr>
                        <td>Materials</td>
                        <td>Residential Housing</td>
                        <td>$54,200</td>
                        <td>18%</td>
                    </tr>
                    <tr>
                        <td>Transportation</td>
                        <td>Road Repair</td>
                        <td>$41,000</td>
                        <td>13%</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Admin Notes -->
    <div class="card shadow-sm">
        <div class="card-body">
            <h6 class="fw-bold mb-3">Admin Remarks</h6>
            <textarea class="form-control" rows="3" placeholder="Write your summary or key insights here..."></textarea>
            <div class="text-end mt-2">
                <button class="btn btn-primary btn-sm">Save Notes</button>
            </div>
        </div>
    </div>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('profitTrendChart').getContext('2d');
new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug'],
        datasets: [{
            label: 'Profit ($)',
            data: [5000, 7000, 8500, 12000, 9500, 14000, 16000, 18000],
            borderColor: '#007bff',
            backgroundColor: 'rgba(0,123,255,0.1)',
            fill: true,
            tension: 0.4
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: { display: false },
            tooltip: { mode: 'index', intersect: false }
        },
        interaction: {
            mode: 'nearest',
            axis: 'x',
            intersect: false
        },
        scales: {
            y: { beginAtZero: true }
        }
    }
});
</script>
@endsection --}}
