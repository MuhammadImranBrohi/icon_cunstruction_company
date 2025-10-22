@extends('layouts.app')

@section('title', 'Projects Reports')
@section('page_title', 'Reports - Projects')

@section('content')
    <div class="container-fluid">

        {{-- PAGE HEADER --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-primary">Projects Reports</h2>
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
                        <h6 class="text-muted">Total Projects</h6>
                        <h3 class="fw-bold text-primary">25</h3>
                        <p class="text-secondary mb-0"><i class="fas fa-folder-open text-primary"></i> All projects</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm border-start border-success border-3">
                    <div class="card-body">
                        <h6 class="text-muted">Ongoing Projects</h6>
                        <h3 class="fw-bold text-success">15</h3>
                        <p class="text-secondary mb-0"><i class="fas fa-spinner text-success"></i> Currently in progress</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm border-start border-info border-3">
                    <div class="card-body">
                        <h6 class="text-muted">Completed Projects</h6>
                        <h3 class="fw-bold text-info">8</h3>
                        <p class="text-secondary mb-0"><i class="fas fa-check-circle text-info"></i> Finished successfully
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm border-start border-danger border-3">
                    <div class="card-body">
                        <h6 class="text-muted">Delayed Projects</h6>
                        <h3 class="fw-bold text-danger">2</h3>
                        <p class="text-secondary mb-0"><i class="fas fa-exclamation-triangle text-danger"></i> Needs
                            attention</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- SEARCH / FILTER --}}
        <div class="row mb-3">
            <div class="col-md-4">
                <input type="text" class="form-control" placeholder="Search by project name or client">
            </div>
            <div class="col-md-3">
                <select class="form-select">
                    <option value="">Filter by Status</option>
                    <option>Ongoing</option>
                    <option>Completed</option>
                    <option>Delayed</option>
                </select>
            </div>
            <div class="col-md-3">
                <select class="form-select">
                    <option value="">Filter by Project Manager</option>
                    <option>Ali Khan</option>
                    <option>Mr. Ahmed</option>
                    <option>Sara Ahmed</option>
                </select>
            </div>
        </div>

        {{-- PROJECTS TABLE --}}
        <div class="card shadow-sm">
            <div class="card-body table-responsive">
                <table class="table table-bordered align-middle table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Project Name</th>
                            <th>Client</th>
                            <th>Project Manager</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>001</td>
                            <td>Highway Expansion</td>
                            <td>Ali Khan</td>
                            <td>Mr. Ahmed</td>
                            <td>2025-01-10</td>
                            <td>2025-10-31</td>
                            <td><span class="badge bg-success">Ongoing</span></td>
                            <td>
                                <button class="btn btn-sm btn-primary" data-bs-toggle="tooltip" title="View Project"><i
                                        class="fas fa-eye"></i></button>
                                <button class="btn btn-sm btn-warning" data-bs-toggle="tooltip" title="Edit Project"><i
                                        class="fas fa-edit"></i></button>
                                <button class="btn btn-sm btn-danger" data-bs-toggle="tooltip" title="Delete Project"><i
                                        class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>002</td>
                            <td>Commercial Complex</td>
                            <td>Fatima Builders</td>
                            <td>Sara Ahmed</td>
                            <td>2025-02-01</td>
                            <td>2025-08-20</td>
                            <td><span class="badge bg-info">Completed</span></td>
                            <td>
                                <button class="btn btn-sm btn-primary" data-bs-toggle="tooltip" title="View Project"><i
                                        class="fas fa-eye"></i></button>
                                <button class="btn btn-sm btn-warning" data-bs-toggle="tooltip" title="Edit Project"><i
                                        class="fas fa-edit"></i></button>
                                <button class="btn btn-sm btn-danger" data-bs-toggle="tooltip" title="Delete Project"><i
                                        class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>003</td>
                            <td>Bridge Maintenance</td>
                            <td>Zahid Construction</td>
                            <td>Ali Khan</td>
                            <td>2025-03-15</td>
                            <td>2025-09-10</td>
                            <td><span class="badge bg-danger">Delayed</span></td>
                            <td>
                                <button class="btn btn-sm btn-primary" data-bs-toggle="tooltip" title="View Project"><i
                                        class="fas fa-eye"></i></button>
                                <button class="btn btn-sm btn-warning" data-bs-toggle="tooltip" title="Edit Project"><i
                                        class="fas fa-edit"></i></button>
                                <button class="btn btn-sm btn-danger" data-bs-toggle="tooltip" title="Delete Project"><i
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
