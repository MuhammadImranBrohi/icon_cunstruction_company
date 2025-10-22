@extends('layouts.app')

@section('title', 'Finance Reports')
@section('page_title', 'Reports - Finance')

@section('content')
    <div class="container-fluid">

        {{-- PAGE HEADER --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-primary">Finance Reports</h2>
            <div>
                <button class="btn btn-success me-2"><i class="fas fa-file-alt me-1"></i> Generate Report</button>
                <button class="btn btn-secondary"><i class="fas fa-download me-1"></i> Export CSV</button>
            </div>
        </div>

        {{-- SUMMARY CARDS --}}
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card shadow-sm border-start border-primary border-3">
                    <div class="card-body">
                        <h6 class="text-muted">Total Payments</h6>
                        <h3 class="fw-bold text-primary">$210,000</h3>
                        <p class="text-secondary mb-0"><i class="fas fa-dollar-sign text-primary"></i> Company-wide</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm border-start border-success border-3">
                    <div class="card-body">
                        <h6 class="text-muted">Received</h6>
                        <h3 class="fw-bold text-success">$175,800</h3>
                        <p class="text-secondary mb-0"><i class="fas fa-check-circle text-success"></i> Completed payments
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm border-start border-warning border-3">
                    <div class="card-body">
                        <h6 class="text-muted">Pending</h6>
                        <h3 class="fw-bold text-warning">$25,500</h3>
                        <p class="text-secondary mb-0"><i class="fas fa-clock text-warning"></i> Awaiting confirmation</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm border-start border-danger border-3">
                    <div class="card-body">
                        <h6 class="text-muted">Failed Transactions</h6>
                        <h3 class="fw-bold text-danger">$8,700</h3>
                        <p class="text-secondary mb-0"><i class="fas fa-times-circle text-danger"></i> Needs review</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- SEARCH / FILTER --}}
        <div class="row mb-3">
            <div class="col-md-4">
                <input type="text" class="form-control" placeholder="Search by client or project">
            </div>
            <div class="col-md-3">
                <select class="form-select">
                    <option value="">Filter by Payment Mode</option>
                    <option>Cash</option>
                    <option>Bank Transfer</option>
                    <option>Online Gateway</option>
                </select>
            </div>
            <div class="col-md-3">
                <select class="form-select">
                    <option value="">Filter by Status</option>
                    <option>Paid</option>
                    <option>Pending</option>
                    <option>Failed</option>
                </select>
            </div>
        </div>

        {{-- PAYMENTS TABLE --}}
        <div class="card shadow-sm">
            <div class="card-body table-responsive">
                <table class="table table-bordered align-middle table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Client</th>
                            <th>Project</th>
                            <th>Mode</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>001</td>
                            <td>Ali Khan</td>
                            <td>Road Expansion</td>
                            <td>Bank Transfer</td>
                            <td>$12,500</td>
                            <td><span class="badge bg-success">Paid</span></td>
                            <td>2025-10-10</td>
                            <td>
                                <button class="btn btn-sm btn-primary" data-bs-toggle="tooltip" title="View Payment"><i
                                        class="fas fa-eye"></i></button>
                                <button class="btn btn-sm btn-danger" data-bs-toggle="tooltip" title="Delete Payment"><i
                                        class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>002</td>
                            <td>Fatima Builders</td>
                            <td>Commercial Complex</td>
                            <td>Cash</td>
                            <td>$8,300</td>
                            <td><span class="badge bg-warning text-dark">Pending</span></td>
                            <td>2025-10-15</td>
                            <td>
                                <button class="btn btn-sm btn-primary" data-bs-toggle="tooltip" title="View Payment"><i
                                        class="fas fa-eye"></i></button>
                                <button class="btn btn-sm btn-danger" data-bs-toggle="tooltip" title="Delete Payment"><i
                                        class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>003</td>
                            <td>Zahid Construction</td>
                            <td>Bridge Maintenance</td>
                            <td>Online</td>
                            <td>$5,200</td>
                            <td><span class="badge bg-danger">Failed</span></td>
                            <td>2025-10-17</td>
                            <td>
                                <button class="btn btn-sm btn-primary" data-bs-toggle="tooltip" title="View Payment"><i
                                        class="fas fa-eye"></i></button>
                                <button class="btn btn-sm btn-danger" data-bs-toggle="tooltip" title="Delete Payment"><i
                                        class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    {{-- TOOLTIP SCRIPT --}}
    @push('scripts')
        <script>
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            })
        </script>
    @endpush

@endsection
