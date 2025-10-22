@extends('layouts.app')

@section('title', 'Employee Attendance')
@section('page_title', 'Project Attendance Management')

@section('content')
    <div class="container-fluid">
        <!-- Summary Cards -->
        <div class="row">
            <div class="col-md-3">
                <div class="card text-center bg-success text-white">
                    <div class="card-body">
                        <h5 class="card-title">Total Present</h5>
                        <h2>42</h2>
                        <p class="card-text">Employees present today</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center bg-danger text-white">
                    <div class="card-body">
                        <h5 class="card-title">Absent</h5>
                        <h2>8</h2>
                        <p class="card-text">Marked as absent</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center bg-warning text-dark">
                    <div class="card-body">
                        <h5 class="card-title">On Leave</h5>
                        <h2>5</h2>
                        <p class="card-text">Approved leave today</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center bg-primary text-white">
                    <div class="card-body">
                        <h5 class="card-title">Late Arrivals</h5>
                        <h2>3</h2>
                        <p class="card-text">Arrived after 9:30 AM</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filter and Controls -->
        <div class="card mt-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title mb-0">Attendance Records</h4>
                <div>
                    <input type="date" class="form-control d-inline-block" style="width: 200px;">
                    <button class="btn btn-primary btn-sm">Filter</button>
                    <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#markAttendanceModal">
                        Mark Attendance
                    </button>
                </div>
            </div>

            <div class="card-body">
                <!-- Attendance Table -->
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Employee Name</th>
                                <th>Project</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Time In</th>
                                <th>Time Out</th>
                                <th>Remarks</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Ahmed Khan</td>
                                <td>Building A Block</td>
                                <td>2025-10-22</td>
                                <td><span class="badge bg-success">Present</span></td>
                                <td>09:00 AM</td>
                                <td>06:00 PM</td>
                                <td>On Time</td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                        data-bs-target="#editModal">Edit</button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Ali Raza</td>
                                <td>Highway Expansion</td>
                                <td>2025-10-22</td>
                                <td><span class="badge bg-danger">Absent</span></td>
                                <td>—</td>
                                <td>—</td>
                                <td>Not Reported</td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary">Edit</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Attendance Chart -->
        <div class="card mt-4">
            <div class="card-header">
                <h5 class="card-title">Weekly Attendance Overview</h5>
            </div>
            <div class="card-body">
                <div style="height: 300px; background: #f9f9f9; border: 1px dashed #ccc;"
                    class="d-flex align-items-center justify-content-center">
                    <p class="text-muted">[Attendance Chart Placeholder]</p>
                </div>
            </div>
        </div>

        <!-- Notes Section -->
        <div class="card mt-4">
            <div class="card-header">
                <h5>Supervisor Notes</h5>
            </div>
            <div class="card-body">
                <textarea class="form-control" rows="3" placeholder="Add notes about today’s attendance..."></textarea>
                <button class="btn btn-success mt-2">Save Note</button>
            </div>
        </div>
    </div>

    <!-- Mark Attendance Modal -->
    <div class="modal fade" id="markAttendanceModal" tabindex="-1" aria-labelledby="markAttendanceLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="markAttendanceLabel">Mark Attendance</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label>Employee Name</label>
                                <input type="text" class="form-control" placeholder="Enter employee name">
                            </div>
                            <div class="col-md-6">
                                <label>Project</label>
                                <input type="text" class="form-control" placeholder="Enter project name">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label>Date</label>
                                <input type="date" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label>Status</label>
                                <select class="form-select">
                                    <option>Present</option>
                                    <option>Absent</option>
                                    <option>On Leave</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label>Remarks</label>
                                <input type="text" class="form-control" placeholder="Enter remarks">
                            </div>
                        </div>
                        <button class="btn btn-primary">Save Attendance</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection



{{-- @extends('layouts.app')

@section('title', 'Project Attendance')
@section('page_title', 'Employee Attendance Dashboard')

@section('content')
    <div class="container-fluid">

        <!-- Page Header -->
        <div class="row mb-4">
            <div class="col-12">
                <h4 class="fw-bold text-primary"><i class="bi bi-calendar-check"></i> Project Attendance Overview</h4>
                <p class="text-muted">Monitor daily attendance across ongoing construction projects and work sites.</p>
            </div>
        </div>

        <!-- Summary Cards -->
        <div class="row">
            <div class="col-md-3">
                <div class="card text-bg-success shadow-sm">
                    <div class="card-body">
                        <h6 class="text-uppercase">Present Today</h6>
                        <h3>112</h3>
                        <small>+5 compared to yesterday</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-bg-danger shadow-sm">
                    <div class="card-body">
                        <h6 class="text-uppercase">Absent</h6>
                        <h3>8</h3>
                        <small>-3 compared to last week</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-bg-warning shadow-sm">
                    <div class="card-body">
                        <h6 class="text-uppercase">On Leave</h6>
                        <h3>6</h3>
                        <small>Includes 2 sick leaves</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-bg-info shadow-sm">
                    <div class="card-body">
                        <h6 class="text-uppercase">Total Employees</h6>
                        <h3>126</h3>
                        <small>Company-wide</small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Attendance Filter Section -->
        <div class="card mt-4 shadow">
            <div class="card-header bg-secondary text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><i class="bi bi-funnel-fill"></i> Attendance Filters</h5>
                <button class="btn btn-sm btn-light"><i class="bi bi-arrow-repeat"></i> Refresh</button>
            </div>
            <div class="card-body">
                <form class="row g-3 align-items-end">
                    <div class="col-md-3">
                        <label for="project" class="form-label">Select Project</label>
                        <select id="project" class="form-select">
                            <option selected>All Projects</option>
                            <option>Bridge A1</option>
                            <option>Building B3</option>
                            <option>Highway Section 9</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="date" class="form-label">Select Date</label>
                        <input type="date" id="date" class="form-control" />
                    </div>
                    <div class="col-md-3">
                        <label for="status" class="form-label">Attendance Status</label>
                        <select id="status" class="form-select">
                            <option selected>All</option>
                            <option>Present</option>
                            <option>Absent</option>
                            <option>On Leave</option>
                        </select>
                    </div>
                    <div class="col-md-3 text-end">
                        <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i> Apply Filters</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Attendance Table -->
        <div class="card mt-4 shadow">
            <div class="card-header bg-primary text-white d-flex justify-content-between">
                <h5 class="mb-0"><i class="bi bi-list-check"></i> Attendance Log - Today</h5>
                <button class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#markAttendanceModal">
                    <i class="bi bi-pencil-square"></i> Mark Attendance
                </button>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>Employee ID</th>
                            <th>Name</th>
                            <th>Project</th>
                            <th>Status</th>
                            <th>Check-In</th>
                            <th>Check-Out</th>
                            <th>Remarks</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>E001</td>
                            <td>Ahmed Khan</td>
                            <td>Bridge A1</td>
                            <td><span class="badge bg-success">Present</span></td>
                            <td>08:45 AM</td>
                            <td>05:15 PM</td>
                            <td>On-site inspection</td>
                        </tr>
                        <tr>
                            <td>E002</td>
                            <td>Hassan Raza</td>
                            <td>Building B3</td>
                            <td><span class="badge bg-danger">Absent</span></td>
                            <td>-</td>
                            <td>-</td>
                            <td>No leave applied</td>
                        </tr>
                        <tr>
                            <td>E003</td>
                            <td>Usman Tariq</td>
                            <td>Highway Section 9</td>
                            <td><span class="badge bg-warning text-dark">On Leave</span></td>
                            <td>-</td>
                            <td>-</td>
                            <td>Medical leave</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Attendance Chart Section -->
        <div class="card mt-4 shadow">
            <div class="card-header bg-dark text-white">
                <h5 class="mb-0"><i class="bi bi-bar-chart-line"></i> Monthly Attendance Overview</h5>
            </div>
            <div class="card-body">
                <div class="p-5 text-center bg-light border rounded">
                    <h6 class="text-muted mb-3">[ Chart Placeholder ]</h6>
                    <p class="text-secondary">A monthly chart showing attendance trends, average presence rate, and leave
                        ratios across departments.</p>
                </div>
            </div>
        </div>

        <!-- Modal for Mark Attendance -->
        <div class="modal fade" id="markAttendanceModal" tabindex="-1" aria-labelledby="markAttendanceLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-success text-white">
                        <h5 class="modal-title" id="markAttendanceLabel">Mark Employee Attendance</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Employee Name</label>
                                <input type="text" class="form-control" placeholder="Enter employee name">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Project</label>
                                <select class="form-select">
                                    <option>Bridge A1</option>
                                    <option>Building B3</option>
                                    <option>Highway Section 9</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Status</label>
                                <select class="form-select">
                                    <option>Present</option>
                                    <option>Absent</option>
                                    <option>On Leave</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Date</label>
                                <input type="date" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Remarks</label>
                                <textarea class="form-control" rows="2" placeholder="Enter any remarks..."></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button class="btn btn-success">Save Attendance</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection --}}
