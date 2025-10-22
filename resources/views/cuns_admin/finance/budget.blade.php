@extends('layouts.app')

@section('title', 'Project Budgets')
@section('page_title', 'Finance — Project Budgets')

@section('content')
    <div class="container-fluid px-4 py-3">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold mb-0">💰 Budget Allocation & Utilization</h4>
            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addBudgetModal">
                <i class="bi bi-plus-circle"></i> Add New Budget
            </button>
        </div>

        <!-- Summary Cards -->
        <div class="row g-3 mb-4">
            <div class="col-md-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <h6>Total Allocated</h6>
                        <h3 class="fw-bold text-primary">$1,200,000</h3>
                        <small class="text-muted">Across all projects</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <h6>Total Spent</h6>
                        <h3 class="fw-bold text-danger">$870,000</h3>
                        <small class="text-muted">72.5% utilized</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <h6>Remaining Funds</h6>
                        <h3 class="fw-bold text-success">$330,000</h3>
                        <small class="text-muted">Available for next phase</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <h6>Pending Approvals</h6>
                        <h3 class="fw-bold text-warning">3 Requests</h3>
                        <small class="text-muted">Awaiting management review</small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Allocated vs Spent Chart -->
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-body">
                <h6 class="fw-bold mb-3">Allocated vs. Spent (Top 5 Projects)</h6>
                <canvas id="budgetComparisonChart" height="100"></canvas>
            </div>
        </div>

        <!-- Budget Table -->
        <div class="card shadow-sm border-0">
            <div class="card-header bg-light d-flex justify-content-between align-items-center">
                <h6 class="fw-bold mb-0">📋 Project Budget Details</h6>
                <button class="btn btn-outline-secondary btn-sm"><i class="bi bi-arrow-repeat"></i> Refresh</button>
            </div>
            <div class="card-body table-responsive">
                <table class="table align-middle table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Project Name</th>
                            <th>Allocated ($)</th>
                            <th>Spent ($)</th>
                            <th>Utilization</th>
                            <th>Category</th>
                            <th>Last Updated</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ([['Bridge Construction', 300000, 270000, 'Infrastructure'], ['Residential Complex', 250000, 180000, 'Housing'], ['Office Tower', 200000, 150000, 'Commercial'], ['Highway Repair', 150000, 120000, 'Maintenance'], ['Water Treatment Plant', 300000, 150000, 'Utility']] as $index => $project)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $project[0] }}</td>
                                <td>${{ number_format($project[1]) }}</td>
                                <td>${{ number_format($project[2]) }}</td>
                                <td>
                                    @php
                                        $utilization = round(($project[2] / $project[1]) * 100);
                                        $color =
                                            $utilization > 80 ? 'danger' : ($utilization > 60 ? 'warning' : 'success');
                                    @endphp
                                    <div class="progress" style="height: 10px;">
                                        <div class="progress-bar bg-{{ $color }}" role="progressbar"
                                            style="width: {{ $utilization }}%;">
                                        </div>
                                    </div>
                                    <small>{{ $utilization }}%</small>
                                </td>
                                <td><span class="badge bg-info">{{ $project[3] }}</span></td>
                                <td>{{ now()->subDays($index + 2)->format('Y-m-d') }}</td>
                                <td>
                                    <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#editBudgetModal">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>
                                    <button class="btn btn-outline-danger btn-sm">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Add Budget Modal -->
    <div class="modal fade" id="addBudgetModal" tabindex="-1" aria-labelledby="addBudgetLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h5 class="modal-title" id="addBudgetLabel">Add New Budget Allocation</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Project Name</label>
                                <input type="text" class="form-control" placeholder="e.g. Bridge Construction">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Allocated Amount ($)</label>
                                <input type="number" class="form-control" placeholder="50000">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Category</label>
                                <select class="form-select">
                                    <option>Infrastructure</option>
                                    <option>Maintenance</option>
                                    <option>Housing</option>
                                    <option>Commercial</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Remarks</label>
                                <textarea class="form-control" rows="3" placeholder="Notes or description..."></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save Budget</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Chart.js Script -->
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const ctx = document.getElementById('budgetComparisonChart');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Bridge', 'Complex', 'Tower', 'Highway', 'Water Plant'],
                    datasets: [{
                            label: 'Allocated',
                            data: [300000, 250000, 200000, 150000, 300000],
                            backgroundColor: 'rgba(13,110,253,0.6)',
                        },
                        {
                            label: 'Spent',
                            data: [270000, 180000, 150000, 120000, 150000],
                            backgroundColor: 'rgba(220,53,69,0.6)',
                        }
                    ]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'bottom'
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
    @endpush
@endsection
