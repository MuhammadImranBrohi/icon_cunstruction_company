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
                <canvas id="attendanceChart" height="100"></canvas>
            </div>
        </div>

        @push('scripts')
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const ctx = document.getElementById('attendanceChart').getContext('2d');
                    new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                            datasets: [{
                                label: 'Present',
                                data: [40, 42, 41, 39, 43, 38, 40],
                                backgroundColor: 'rgba(40, 167, 69, 0.7)'
                            }, {
                                label: 'Absent',
                                data: [2, 1, 3, 4, 1, 5, 2],
                                backgroundColor: 'rgba(220, 53, 69, 0.7)'
                            }, {
                                label: 'On Leave',
                                data: [3, 2, 2, 3, 2, 2, 3],
                                backgroundColor: 'rgba(255, 193, 7, 0.7)'
                            }]
                        },
                        options: {
                            responsive: true,
                            plugins: {
                                legend: {
                                    position: 'top'
                                },
                                title: {
                                    display: true,
                                    text: 'Weekly Attendance'
                                }
                            }
                        }
                    });
                });
            </script>
        @endpush

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
