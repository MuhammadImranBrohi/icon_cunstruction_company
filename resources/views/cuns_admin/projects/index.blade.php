@extends('layouts.app')

@section('title', 'Projects Management')
@section('page_title', 'Projects - Overview')

@section('content')

    <div class="container-fluid">

        {{-- ========== PAGE HEADER ========== --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-primary">All Projects</h2>
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addProjectModal">
                <i class="fas fa-plus-circle"></i> Add New Project
            </button>
        </div>

        {{-- ========== SUMMARY CARDS ========== --}}
        <div class="row mb-4">
            <div class="col-md-3 mb-3">
                <div class="card shadow-sm border-start border-primary border-3">
                    <div class="card-body">
                        <h6 class="text-muted">Total Projects</h6>
                        <h3 class="fw-bold text-primary">12</h3>
                        <p class="text-secondary mb-0"><i class="fas fa-project-diagram text-primary"></i> Ongoing &
                            completed</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card shadow-sm border-start border-success border-3">
                    <div class="card-body">
                        <h6 class="text-muted">Ongoing Projects</h6>
                        <h3 class="fw-bold text-success">7</h3>
                        <p class="text-secondary mb-0"><i class="fas fa-spinner text-success"></i> Currently in progress</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card shadow-sm border-start border-warning border-3">
                    <div class="card-body">
                        <h6 class="text-muted">Delayed Projects</h6>
                        <h3 class="fw-bold text-warning">2</h3>
                        <p class="text-secondary mb-0"><i class="fas fa-exclamation-triangle text-warning"></i> Behind
                            schedule</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card shadow-sm border-start border-info border-3">
                    <div class="card-body">
                        <h6 class="text-muted">Completed Projects</h6>
                        <h3 class="fw-bold text-info">3</h3>
                        <p class="text-secondary mb-0"><i class="fas fa-check-circle text-info"></i> Successfully finished
                        </p>
                    </div>
                </div>
            </div>
        </div>



        {{-- ========== PROJECTS TABLE ========== --}}
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-light d-flex justify-content-between align-items-center">
                <h5 class="fw-bold mb-0"><i class="fas fa-list me-2"></i>All Projects</h5>
                <div class="d-flex gap-2">
                    <input type="text" class="form-control" placeholder="Search by project name or manager...">
                    <select class="form-select">
                        <option>All Status</option>
                        <option>Ongoing</option>
                        <option>Delayed</option>
                        <option>Completed</option>
                    </select>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered align-middle">
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
                                <button class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></button>
                                <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>002</td>
                            <td>Commercial Complex</td>
                            <td>Fatima Builders</td>
                            <td>Ms. Sara</td>
                            <td>2024-11-15</td>
                            <td>2025-08-20</td>
                            <td><span class="badge bg-warning text-dark">Delayed</span></td>
                            <td>
                                <button class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></button>
                                <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>003</td>
                            <td>Bridge Maintenance</td>
                            <td>Zahid Construction</td>
                            <td>Mr. Bilal</td>
                            <td>2024-12-01</td>
                            <td>2025-06-15</td>
                            <td><span class="badge bg-info">Completed</span></td>
                            <td>
                                <button class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></button>
                                <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        {{-- ========== PROJECTS CHART ========== --}}
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-primary text-white d-flex justify-content-between">
                <h5 class="mb-0"><i class="fas fa-chart-bar me-2"></i>Project Status Overview</h5>
                <select class="form-select w-auto">
                    <option>Current Year</option>
                    <option>Previous Year</option>
                </select>
            </div>
            <div class="card-body w-50">
                <canvas id="projectsChart" height="50"></canvas>
            </div>
        </div>
        {{-- ========== ADD PROJECT MODAL ========== --}}
        <div class="modal fade" id="addProjectModal" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title">Add New Project</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Project Name</label>
                                    <input type="text" class="form-control" placeholder="Enter project name">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Client Name</label>
                                    <input type="text" class="form-control" placeholder="Enter client name">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Project Manager</label>
                                    <input type="text" class="form-control" placeholder="Enter manager name">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Start Date</label>
                                    <input type="date" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">End Date</label>
                                    <input type="date" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Status</label>
                                    <select class="form-select">
                                        <option>Ongoing</option>
                                        <option>Delayed</option>
                                        <option>Completed</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Remarks</label>
                                <textarea class="form-control" rows="3" placeholder="Additional notes"></textarea>
                            </div>
                            <button class="btn btn-primary">Add Project</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- ======== CHART SCRIPT ======== --}}
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const ctx = document.getElementById('projectsChart').getContext('2d');
            new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ['Ongoing', 'Delayed', 'Completed'],
                    datasets: [{
                        data: [7, 2, 3],
                        backgroundColor: ['#198754', '#ffc107', '#0dcaf0']
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'right'
                        }
                    }
                }
            });
        </script>
    @endpush
@endsection
