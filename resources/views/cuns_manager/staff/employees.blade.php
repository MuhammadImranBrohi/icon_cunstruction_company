@extends('cuns_manager.layouts.main')

@section('title', 'Employees - Construction Manager')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <!-- Page Header -->
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="fw-bold py-3 mb-0">
                        <span class="text-muted fw-light">Staff /</span> All Employees
                    </h4>
                    <div class="d-flex gap-2">
                        <button class="btn btn-outline-secondary">
                            <span class="material-icons-round me-2">file_download</span>
                            Export
                        </button>
                        <button class="btn btn-primary">
                            <span class="material-icons-round me-2">person_add</span>
                            Add Employee
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistics Cards -->
        <div class="row mb-4">
            <div class="col-lg-3 col-md-6 col-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="card-info">
                                <h6 class="card-title text-muted mb-2">Total Employees</h6>
                                <h4 class="text-primary mb-0">45</h4>
                                <small class="text-success">+5 this month</small>
                            </div>
                            <div class="card-icon">
                                <span class="material-icons-round text-primary" style="font-size: 48px;">groups</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="card-info">
                                <h6 class="card-title text-muted mb-2">Active Today</h6>
                                <h4 class="text-success mb-0">42</h4>
                                <small class="text-muted">93% attendance</small>
                            </div>
                            <div class="card-icon">
                                <span class="material-icons-round text-success"
                                    style="font-size: 48px;">event_available</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="card-info">
                                <h6 class="card-title text-muted mb-2">On Leave</h6>
                                <h4 class="text-warning mb-0">3</h4>
                                <small class="text-muted">This week</small>
                            </div>
                            <div class="card-icon">
                                <span class="material-icons-round text-warning" style="font-size: 48px;">beach_access</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="card-info">
                                <h6 class="card-title text-muted mb-2">New Hires</h6>
                                <h4 class="text-info mb-0">5</h4>
                                <small class="text-muted">This month</small>
                            </div>
                            <div class="card-icon">
                                <span class="material-icons-round text-info" style="font-size: 48px;">person_add</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Employees Table -->
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">Employee List</h5>
                <div class="d-flex gap-2">
                    <div class="input-group input-group-merge" style="width: 300px;">
                        <span class="input-group-text">
                            <span class="material-icons-round">search</span>
                        </span>
                        <input type="text" class="form-control" placeholder="Search employees...">
                    </div>
                    <div class="dropdown">
                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                            <span class="material-icons-round">filter_list</span>
                            Filter
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">All Employees</a></li>
                            <li><a class="dropdown-item" href="#">Active Only</a></li>
                            <li><a class="dropdown-item" href="#">On Leave</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">By Department</a></li>
                            <li><a class="dropdown-item" href="#">By Designation</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Employee</th>
                                <th>Position</th>
                                <th>Department</th>
                                <th>Contact</th>
                                <th>Join Date</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employees as $employee)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar avatar-online me-3">
                                                <span class="material-icons-round">person</span>
                                            </div>
                                            <div>
                                                <h6 class="mb-0">{{ $employee['name'] }}</h6>
                                                <small
                                                    class="text-muted">EMP-{{ str_pad($employee['id'], 3, '0', STR_PAD_LEFT) }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $employee['position'] }}</td>
                                    <td>
                                        <span class="badge bg-light text-dark">{{ $employee['department'] }}</span>
                                    </td>
                                    <td>
                                        <small class="text-muted d-block">{{ $employee['contact'] }}</small>
                                        <small class="text-muted">{{ $employee['email'] ?? 'email@example.com' }}</small>
                                    </td>
                                    <td>15 Jan, 2023</td>
                                    <td>
                                        <span class="badge bg-success">Active</span>
                                    </td>
                                    <td>
                                        <div class="d-flex gap-1">
                                            <button class="btn btn-sm btn-outline-primary">
                                                <span class="material-icons-round"
                                                    style="font-size: 16px;">visibility</span>
                                            </button>
                                            <button class="btn btn-sm btn-outline-secondary">
                                                <span class="material-icons-round" style="font-size: 16px;">edit</span>
                                            </button>
                                            <button class="btn btn-sm btn-outline-danger">
                                                <span class="material-icons-round" style="font-size: 16px;">delete</span>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
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
        .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #f1f5f9;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #64748b;
        }

        .avatar-online {
            position: relative;
        }

        .avatar-online::after {
            content: '';
            position: absolute;
            bottom: 0;
            right: 0;
            width: 10px;
            height: 10px;
            background: #10b981;
            border-radius: 50%;
            border: 2px solid white;
        }

        .table th {
            border-top: none;
            font-weight: 600;
            color: #64748b;
        }

        .table td {
            vertical-align: middle;
        }

        .badge {
            font-size: 0.75rem;
        }
    </style>
@endsection
