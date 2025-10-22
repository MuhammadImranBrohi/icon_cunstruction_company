@extends('layouts.app')

@section('title', 'Finance Transactions')
@section('page_title', 'Finance — Transactions Overview')

@section('content')
    <div class="container-fluid px-4 py-3">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold mb-0">💰 Transaction Management</h4>
            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addTransactionModal">
                <i class="bi bi-plus-circle"></i> Add New Transaction
            </button>
        </div>

        <!-- Summary Cards -->
        <div class="row g-3 mb-4">
            <div class="col-md-3">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body">
                        <h6>Total Income</h6>
                        <h3 class="text-success fw-bold">$120,400</h3>
                        <small class="text-muted">+15% from last month</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body">
                        <h6>Total Expenses</h6>
                        <h3 class="text-danger fw-bold">$85,670</h3>
                        <small class="text-muted">-4% from last month</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body">
                        <h6>Profit Margin</h6>
                        <h3 class="text-primary fw-bold">29%</h3>
                        <small class="text-muted">Healthy growth trend</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body">
                        <h6>Pending Payments</h6>
                        <h3 class="text-warning fw-bold">$12,980</h3>
                        <small class="text-muted">3 pending invoices</small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filter Bar -->
        <div class="card mb-4 shadow-sm border-0">
            <div class="card-body">
                <form class="row g-3 align-items-end">
                    <div class="col-md-3">
                        <label for="projectFilter" class="form-label">Project</label>
                        <select class="form-select" id="projectFilter">
                            <option>All Projects</option>
                            <option>Highway Expansion</option>
                            <option>Bridge Construction</option>
                            <option>Residential Villas</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="typeFilter" class="form-label">Transaction Type</label>
                        <select class="form-select" id="typeFilter">
                            <option>All</option>
                            <option>Income</option>
                            <option>Expense</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="dateRange" class="form-label">Date Range</label>
                        <input type="date" class="form-control" id="dateRange">
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-dark w-100"><i class="bi bi-search"></i> Apply Filters</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Transaction Table -->
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header bg-light">
                <h6 class="fw-bold mb-0">Transaction Records</h6>
            </div>
            <div class="card-body table-responsive">
                <table class="table align-middle table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Project</th>
                            <th>Type</th>
                            <th>Description</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 1; $i <= 10; $i++)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ date('Y-m-d', strtotime("-$i days")) }}</td>
                                <td>Project {{ $i }}</td>
                                <td><span
                                        class="badge bg-{{ $i % 2 == 0 ? 'success' : 'danger' }}">{{ $i % 2 == 0 ? 'Income' : 'Expense' }}</span>
                                </td>
                                <td>Transaction details for project {{ $i }}</td>
                                <td>${{ number_format(rand(500, 9000), 2) }}</td>
                                <td><span
                                        class="badge bg-{{ $i % 3 == 0 ? 'warning' : 'info' }}">{{ $i % 3 == 0 ? 'Pending' : 'Completed' }}</span>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-outline-secondary"><i class="bi bi-eye"></i></button>
                                    <button class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></button>
                                </td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Bar Chart -->
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-body">
                <h6 class="fw-bold mb-3">Monthly Income vs. Expenses</h6>
                <canvas id="financeChart" height="100"></canvas>
            </div>
        </div>

        <!-- Add Transaction Modal -->
        <div class="modal fade" id="addTransactionModal" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-dark text-white">
                        <h5 class="modal-title">Add New Transaction</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Transaction Type</label>
                                    <select class="form-select">
                                        <option>Income</option>
                                        <option>Expense</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Project</label>
                                    <input type="text" class="form-control" placeholder="Enter project name">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Amount</label>
                                    <input type="number" class="form-control" placeholder="Enter amount">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Date</label>
                                    <input type="date" class="form-control">
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Description</label>
                                    <textarea class="form-control" rows="3"></textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success">Save Transaction</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart.js Script -->
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const ctx = document.getElementById('financeChart');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                    datasets: [{
                            label: 'Income',
                            data: [12000, 15000, 17000, 14000, 16000, 20000],
                            backgroundColor: 'rgba(25, 135, 84, 0.6)',
                        },
                        {
                            label: 'Expenses',
                            data: [8000, 9500, 10000, 9000, 11000, 13000],
                            backgroundColor: 'rgba(220, 53, 69, 0.6)',
                        }
                    ]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top'
                        },
                        tooltip: {
                            enabled: true
                        }
                    }
                }
            });
        </script>
    @endpush
@endsection
