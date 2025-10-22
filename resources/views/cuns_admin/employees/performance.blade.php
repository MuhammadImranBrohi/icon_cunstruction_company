@extends('layouts.app')

@section('title', 'Project Performance')
@section('page_title', 'Employee Performance Evaluation')

@section('content')
    <div class="container-fluid">
        <!-- Header Section -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="mb-0">Project Performance Dashboard</h4>
            <button class="btn btn-primary"><i class="fas fa-download me-2"></i>Export Report</button>
        </div>

        <!-- KPI Cards -->
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card text-center shadow-sm border-0">
                    <div class="card-body">
                        <h6>Average Productivity</h6>
                        <h3 class="fw-bold text-success">92%</h3>
                        <small class="text-muted">This month performance</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center shadow-sm border-0">
                    <div class="card-body">
                        <h6>Attendance Rate</h6>
                        <h3 class="fw-bold text-info">95%</h3>
                        <small class="text-muted">Across all projects</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center shadow-sm border-0">
                    <div class="card-body">
                        <h6>Completed Tasks</h6>
                        <h3 class="fw-bold text-primary">1,247</h3>
                        <small class="text-muted">In October 2025</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center shadow-sm border-0">
                    <div class="card-body">
                        <h6>Late Submissions</h6>
                        <h3 class="fw-bold text-danger">18</h3>
                        <small class="text-muted">Need follow-up</small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Project Performance Chart Placeholder -->
        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-light">
                <h5 class="mb-0">Project Performance Summary</h5>
            </div>
            <div class="card-body">
                <div class="text-center text-muted" style="height: 300px; border: 2px dashed #ccc; border-radius: 10px;">
                    <p class="mt-5"><i class="fas fa-chart-bar fa-3x mb-3"></i></p>
                    <p>Performance chart visualization will appear here (e.g., Bar or Line Chart)</p>
                </div>
            </div>
        </div>

        <!-- Employee Performance Table -->
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-light d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Individual Employee Performance</h5>
                <div>
                    <input type="search" class="form-control form-control-sm d-inline w-auto"
                        placeholder="Search employee...">
                </div>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped align-middle">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Employee</th>
                            <th>Project</th>
                            <th>Productivity</th>
                            <th>Task Completion</th>
                            <th>Attendance</th>
                            <th>Supervisor Rating</th>
                            <th>Remarks</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Ali Hassan</td>
                            <td>Green City Apartments</td>
                            <td>96%</td>
                            <td>98%</td>
                            <td>100%</td>
                            <td><span class="badge bg-success">Excellent</span></td>
                            <td>Reliable and punctual</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Fatima Noor</td>
                            <td>Metro Expansion</td>
                            <td>89%</td>
                            <td>92%</td>
                            <td>95%</td>
                            <td><span class="badge bg-info">Very Good</span></td>
                            <td>Great teamwork and leadership</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Usman Khan</td>
                            <td>Highway Bridge</td>
                            <td>75%</td>
                            <td>80%</td>
                            <td>90%</td>
                            <td><span class="badge bg-warning">Needs Improvement</span></td>
                            <td>Improve task timeliness</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Top Performers Section -->
        <div class="card shadow-sm">
            <div class="card-header bg-light">
                <h5 class="mb-0">Top Performers of the Month</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card border-success shadow-sm text-center">
                            <div class="card-body">
                                <img src="https://via.placeholder.com/100" class="rounded-circle mb-3" alt="Employee Photo">
                                <h6 class="fw-bold mb-0">Ali Hassan</h6>
                                <small class="text-muted">Project Engineer</small>
                                <p class="mt-2 text-success">Performance: 98%</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card border-info shadow-sm text-center">
                            <div class="card-body">
                                <img src="https://via.placeholder.com/100" class="rounded-circle mb-3" alt="Employee Photo">
                                <h6 class="fw-bold mb-0">Maria Khan</h6>
                                <small class="text-muted">Site Supervisor</small>
                                <p class="mt-2 text-info">Performance: 95%</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card border-primary shadow-sm text-center">
                            <div class="card-body">
                                <img src="https://via.placeholder.com/100" class="rounded-circle mb-3" alt="Employee Photo">
                                <h6 class="fw-bold mb-0">Bilal Ahmed</h6>
                                <small class="text-muted">Safety Officer</small>
                                <p class="mt-2 text-primary">Performance: 93%</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
