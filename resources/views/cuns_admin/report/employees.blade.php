@extends('layouts.app')

@section('title', 'Employee Reports')
@section('page_title', 'Reports - Employees')

@section('content')
    <div class="container-fluid">

        {{-- PAGE HEADER --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-primary">Employee Reports</h2>
            <div>
                <button class="btn btn-success me-2"><i class="fas fa-file-alt me-1"></i> Generate Report</button>
                <button class="btn btn-secondary"><i class="fas fa-download me-1"></i> Export CSV</button>
            </div>
        </div>

        {{-- SUMMARY CARDS --}}
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card shadow-sm border-start border-primary border-3">
                    <div class="card-body">
                        <h6 class="text-muted">Total Employees</h6>
                        <h3 class="fw-bold text-primary">45</h3>
                        <p class="text-secondary mb-0"><i class="fas fa-users text-primary"></i> Company-wide</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm border-start border-success border-3">
                    <div class="card-body">
                        <h6 class="text-muted">Active Employees</h6>
                        <h3 class="fw-bold text-success">38</h3>
                        <p class="text-secondary mb-0"><i class="fas fa-user-check text-success"></i> Currently working</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm border-start border-warning border-3">
                    <div class="card-body">
                        <h6 class="text-muted">Inactive Employees</h6>
                        <h3 class="fw-bold text-warning">7</h3>
                        <p class="text-secondary mb-0"><i class="fas fa-user-times text-warning"></i> On leave or resigned
                        </p>
                    </div>
                </div>
            </div>
        </div>

        {{-- SEARCH / FILTER --}}
        <div class="row mb-3">
            <div class="col-md-4">
                <input type="text" class="form-control" placeholder="Search by name or role">
            </div>
            <div class="col-md-3">
                <select class="form-select">
                    <option value="">Filter by Department</option>
                    <option>Construction</option>
                    <option>Finance</option>
                    <option>HR</option>
                </select>
            </div>
            <div class="col-md-3">
                <select class="form-select">
                    <option value="">Filter by Status</option>
                    <option>Active</option>
                    <option>Inactive</option>
                </select>
            </div>
        </div>

        {{-- EMPLOYEES TABLE --}}
        <div class="card shadow-sm">
            <div class="card-body table-responsive">
                <table class="table table-bordered align-middle table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Employee Name</th>
                            <th>Role</th>
                            <th>Department</th>
                            <th>Joined Date</th>
                            <th>Status</th>
                            <th>Remarks</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>001</td>
                            <td>Ali Khan</td>
                            <td>Project Manager</td>
                            <td>Construction</td>
                            <td>2023-01-10</td>
                            <td><span class="badge bg-success">Active</span></td>
                            <td>Excellent performance</td>
                            <td>
                                <button class="btn btn-sm btn-primary" data-bs-toggle="tooltip" title="View Details"><i
                                        class="fas fa-eye"></i></button>
                                <button class="btn btn-sm btn-warning" data-bs-toggle="tooltip" title="Edit Employee"><i
                                        class="fas fa-edit"></i></button>
                                <button class="btn btn-sm btn-danger" data-bs-toggle="tooltip" title="Remove Employee"><i
                                        class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>002</td>
                            <td>Sara Ahmed</td>
                            <td>Site Engineer</td>
                            <td>Construction</td>
                            <td>2023-03-15</td>
                            <td><span class="badge bg-success">Active</span></td>
                            <td>On training program</td>
                            <td>
                                <button class="btn btn-sm btn-primary" data-bs-toggle="tooltip" title="View Details"><i
                                        class="fas fa-eye"></i></button>
                                <button class="btn btn-sm btn-warning" data-bs-toggle="tooltip" title="Edit Employee"><i
                                        class="fas fa-edit"></i></button>
                                <button class="btn btn-sm btn-danger" data-bs-toggle="tooltip" title="Remove Employee"><i
                                        class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>003</td>
                            <td>Zahid Ali</td>
                            <td>Accountant</td>
                            <td>Finance</td>
                            <td>2022-11-20</td>
                            <td><span class="badge bg-warning text-dark">Inactive</span></td>
                            <td>On leave</td>
                            <td>
                                <button class="btn btn-sm btn-primary" data-bs-toggle="tooltip" title="View Details"><i
                                        class="fas fa-eye"></i></button>
                                <button class="btn btn-sm btn-warning" data-bs-toggle="tooltip" title="Edit Employee"><i
                                        class="fas fa-edit"></i></button>
                                <button class="btn btn-sm btn-danger" data-bs-toggle="tooltip" title="Remove Employee"><i
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
