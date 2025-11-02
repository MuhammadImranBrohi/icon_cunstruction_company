@extends('cuns_manager.layouts.main')

@section('title', 'All Projects - Construction Manager')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <!-- Page Header -->
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="fw-bold py-3 mb-0">
                        <span class="text-muted fw-light">Projects /</span> All Projects
                    </h4>
                    <a href="{{ route('cuns_manager.projects.create') }}" class="btn btn-primary">
                        <span class="material-icons-round me-2">add</span>
                        New Project
                    </a>
                </div>
            </div>
        </div>

        <!-- Projects Table -->
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">Project List</h5>
                <div class="d-flex gap-2">
                    <div class="input-group input-group-merge" style="width: 300px;">
                        <span class="input-group-text">
                            <span class="material-icons-round">search</span>
                        </span>
                        <input type="text" class="form-control" placeholder="Search projects...">
                    </div>
                    <button class="btn btn-outline-secondary">
                        <span class="material-icons-round">filter_list</span>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Project Name</th>
                                <th>Status</th>
                                <th>Progress</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Budget</th>
                                <th>Manager</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <span class="material-icons-round text-primary me-2">business</span>
                                        <div>
                                            <h6 class="mb-0">Office Building Construction</h6>
                                            <small class="text-muted">Sector 62, Noida</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge bg-warning">In Progress</span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="progress" style="width: 100px; height: 6px;">
                                            <div class="progress-bar bg-primary" style="width: 65%"></div>
                                        </div>
                                        <small class="ms-2">65%</small>
                                    </div>
                                </td>
                                <td>15 Jan, 2024</td>
                                <td>30 Jun, 2024</td>
                                <td>₹2.5 Cr</td>
                                <td>Rajesh Kumar</td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <a href="{{ route('cuns_manager.projects.show', ['id' => 1]) }}"
                                            class="btn btn-sm btn-outline-primary">
                                            <span class="material-icons-round" style="font-size: 16px;">visibility</span>
                                        </a>
                                        <a href="{{ route('cuns_manager.projects.edit', ['id' => 1]) }}"
                                            class="btn btn-sm btn-outline-secondary">
                                            <span class="material-icons-round" style="font-size: 16px;">edit</span>
                                        </a>
                                        <button class="btn btn-sm btn-outline-danger">
                                            <span class="material-icons-round" style="font-size: 16px;">delete</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <span class="material-icons-round text-success me-2">apartment</span>
                                        <div>
                                            <h6 class="mb-0">Residential Complex</h6>
                                            <small class="text-muted">Sector 128, Noida</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge bg-success">Completed</span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="progress" style="width: 100px; height: 6px;">
                                            <div class="progress-bar bg-success" style="width: 100%"></div>
                                        </div>
                                        <small class="ms-2">100%</small>
                                    </div>
                                </td>
                                <td>01 Nov, 2023</td>
                                <td>15 Mar, 2024</td>
                                <td>₹1.8 Cr</td>
                                <td>Priya Sharma</td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <a href="{{ route('cuns_manager.projects.show', ['id' => 2]) }}"
                                            class="btn btn-sm btn-outline-primary">
                                            <span class="material-icons-round" style="font-size: 16px;">visibility</span>
                                        </a>
                                        <a href="{{ route('cuns_manager.projects.edit', ['id' => 2]) }}"
                                            class="btn btn-sm btn-outline-secondary">
                                            <span class="material-icons-round" style="font-size: 16px;">edit</span>
                                        </a>
                                        <button class="btn btn-sm btn-outline-danger">
                                            <span class="material-icons-round" style="font-size: 16px;">delete</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center mt-4">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1">Previous</a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

    </div>

    <style>
        .table th {
            border-top: none;
            font-weight: 600;
            color: #64748b;
        }

        .table td {
            vertical-align: middle;
        }

        .progress {
            background-color: #e2e8f0;
        }

        .badge {
            font-size: 0.75rem;
        }
    </style>
@endsection
