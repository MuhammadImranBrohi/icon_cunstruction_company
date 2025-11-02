@extends('cuns_manager.layouts.main')

@section('title', 'Attendance Reports - Construction Manager')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <!-- Page Header -->
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="fw-bold py-3 mb-0">
                        <span class="text-muted fw-light">Attendance /</span> Reports & Analytics
                    </h4>
                    <button class="btn btn-outline-secondary"
                        onclick="window.location.href='{{ route('attendance.index') }}'">
                        <span class="material-icons-round me-2">arrow_back</span>
                        Back to Attendance
                    </button>
                </div>
            </div>
        </div>

        <!-- Report Filters -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Generate Report</h5>
                    </div>
                    <div class="card-body">
                        <form id="reportForm">
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">Report Type</label>
                                    <select class="form-select" id="reportType">
                                        <option value="daily">Daily Report</option>
                                        <option value="weekly">Weekly Report</option>
                                        <option value="monthly" selected>Monthly Report</option>
                                        <option value="custom">Custom Period</option>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">From Date</label>
                                    <input type="date" class="form-control" id="fromDate" value="{{ date('Y-m-01') }}">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">To Date</label>
                                    <input type="date" class="form-control" id="toDate" value="{{ date('Y-m-t') }}">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">Site</label>
                                    <select class="form-select" id="siteFilter">
                                        <option value="">All Sites</option>
                                        <option value="site1">Site A</option>
                                        <option value="site2">Site B</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <button type="button" class="btn btn-primary" onclick="generateReport()">
                                        <span class="material-icons-round me-2">assessment</span>
                                        Generate Report
                                    </button>
                                    <button type="button" class="btn btn-outline-secondary" onclick="exportReport()">
                                        <span class="material-icons-round me-2">download</span>
                                        Export PDF
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Analytics Cards -->
        <div class="row mb-4">
            <div class="col-md-2 col-6">
                <div class="card">
                    <div class="card-body text-center">
                        <h3 class="text-primary mb-1">95%</h3>
                        <small class="text-muted">Attendance Rate</small>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-6">
                <div class="card">
                    <div class="card-body text-center">
                        <h3 class="text-warning mb-1">4.2%</h3>
                        <small class="text-muted">Late Arrivals</small>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-6">
                <div class="card">
                    <div class="card-body text-center">
                        <h3 class="text-danger mb-1">2.1%</h3>
                        <small class="text-muted">Absenteeism</small>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-6">
                <div class="card">
                    <div class="card-body text-center">
                        <h3 class="text-info mb-1">8.5</h3>
                        <small class="text-muted">Avg. Hours/Day</small>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-6">
                <div class="card">
                    <div class="card-body text-center">
                        <h3 class="text-success mb-1">42</h3>
                        <small class="text-muted">Total Workers</small>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-6">
                <div class="card">
                    <div class="card-body text-center">
                        <h3 class="text-secondary mb-1">₹12.5K</h3>
                        <small class="text-muted">Overtime Cost</small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts & Detailed Report -->
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Attendance Trend</h5>
                    </div>
                    <div class="card-body">
                        <div id="attendanceChart" style="height: 300px;"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Status Distribution</h5>
                    </div>
                    <div class="card-body">
                        <div id="statusChart" style="height: 300px;"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Detailed Report Table -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Detailed Attendance Report</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Employee</th>
                                        <th>Present</th>
                                        <th>Absent</th>
                                        <th>Late</th>
                                        <th>Leave</th>
                                        <th>Overtime</th>
                                        <th>Attendance %</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Report data will be populated here -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>
        function generateReport() {
            // Implement report generation logic
            console.log('Generating report...');
        }

        function exportReport() {
            // Implement export functionality
            console.log('Exporting report...');
        }

        // Initialize charts
        document.addEventListener('DOMContentLoaded', function() {
            // This is where you would initialize your charts
            // For example using Chart.js or ApexCharts
        });
    </script>
@endsection
