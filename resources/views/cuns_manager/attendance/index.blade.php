@extends('cuns_manager.layouts.main')

@section('title', 'Attendance - Construction Manager')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <!-- Page Header -->
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="fw-bold py-3 mb-0">
                        <span class="text-muted fw-light">Staff /</span> Attendance Management
                    </h4>
                    <div class="d-flex gap-2">
                        <button class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#bulkActionModal">
                            <span class="material-icons-round me-2">playlist_add_check</span>
                            Bulk Actions
                        </button>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#markAttendanceModal">
                            <span class="material-icons-round me-2">edit_calendar</span>
                            Mark Attendance
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Attendance Summary -->
        <div class="row mb-4">
            <div class="col-lg-3 col-md-6 col-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="card-info">
                                <h6 class="card-title text-muted mb-2">Present Today</h6>
                                <h4 class="text-success mb-0">{{ $attendance['present_today'] ?? 42 }}</h4>
                                <small class="text-muted">Out of {{ $attendance['total_staff'] ?? 45 }}</small>
                            </div>
                            <div class="card-icon">
                                <span class="material-icons-round text-success" style="font-size: 48px;">check_circle</span>
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
                                <h6 class="card-title text-muted mb-2">Absent Today</h6>
                                <h4 class="text-danger mb-0">
                                    {{ ($attendance['total_staff'] ?? 45) - ($attendance['present_today'] ?? 42) }}</h4>
                                <small
                                    class="text-muted">{{ number_format(((($attendance['total_staff'] ?? 45) - ($attendance['present_today'] ?? 42)) / ($attendance['total_staff'] ?? 45)) * 100, 1) }}%
                                    of staff</small>
                            </div>
                            <div class="card-icon">
                                <span class="material-icons-round text-danger" style="font-size: 48px;">cancel</span>
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
                                <small class="text-muted">Approved leave requests</small>
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
                                <h6 class="card-title text-muted mb-2">Attendance Rate</h6>
                                <h4 class="text-primary mb-0">{{ $attendance['attendance_rate'] ?? 93.3 }}%</h4>
                                <small class="text-success">+2.5% from last week</small>
                            </div>
                            <div class="card-icon">
                                <span class="material-icons-round text-primary" style="font-size: 48px;">trending_up</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filters and Controls -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-3">
                                <label for="dateFilter" class="form-label">Date</label>
                                <input type="date" class="form-control" id="dateFilter" value="{{ date('Y-m-d') }}">
                            </div>
                            <div class="col-md-3">
                                <label for="departmentFilter" class="form-label">Department</label>
                                <select class="form-select" id="departmentFilter">
                                    <option value="">All Departments</option>
                                    <option value="engineering">Engineering</option>
                                    <option value="safety">Safety</option>
                                    <option value="labor">Labor</option>
                                    <option value="supervision">Supervision</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="shiftFilter" class="form-label">Shift</label>
                                <select class="form-select" id="shiftFilter">
                                    <option value="">All Shifts</option>
                                    <option value="morning">Morning Shift</option>
                                    <option value="evening">Evening Shift</option>
                                    <option value="night">Night Shift</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="statusFilter" class="form-label">Status</label>
                                <select class="form-select" id="statusFilter">
                                    <option value="">All Status</option>
                                    <option value="present">Present</option>
                                    <option value="absent">Absent</option>
                                    <option value="late">Late</option>
                                    <option value="half_day">Half Day</option>
                                    <option value="leave">On Leave</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <div class="d-flex gap-2">
                                    <button class="btn btn-primary" onclick="applyFilters()">
                                        <span class="material-icons-round me-2">search</span>
                                        Apply Filters
                                    </button>
                                    <button class="btn btn-outline-secondary" onclick="resetFilters()">
                                        <span class="material-icons-round me-2">refresh</span>
                                        Reset
                                    </button>
                                    <button class="btn btn-outline-success ms-auto">
                                        <span class="material-icons-round me-2">download</span>
                                        Export Report
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Daily Attendance Table -->
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">Today's Attendance ({{ date('F j, Y') }})</h5>
                <div class="d-flex gap-2">
                    <div class="input-group input-group-merge" style="width: 250px;">
                        <span class="input-group-text">
                            <span class="material-icons-round">search</span>
                        </span>
                        <input type="text" class="form-control" placeholder="Search employees..."
                            id="searchAttendance">
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="attendanceTable">
                        <thead>
                            <tr>
                                <th>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="selectAll">
                                    </div>
                                </th>
                                <th>Employee</th>
                                <th>Employee ID</th>
                                <th>Department</th>
                                <th>Shift</th>
                                <th>Check-in</th>
                                <th>Check-out</th>
                                <th>Working Hours</th>
                                <th>Status</th>
                                <th>Remarks</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input row-checkbox" type="checkbox">
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-online me-3">
                                            <span class="material-icons-round">person</span>
                                        </div>
                                        <div>
                                            <h6 class="mb-0">Rahul Sharma</h6>
                                            <small class="text-muted">Site Engineer</small>
                                        </div>
                                    </div>
                                </td>
                                <td>EMP-001</td>
                                <td>Engineering</td>
                                <td>
                                    <span class="badge bg-info">Morning</span>
                                </td>
                                <td>08:05 AM</td>
                                <td>05:15 PM</td>
                                <td>9h 10m</td>
                                <td>
                                    <span class="badge bg-success">Present</span>
                                </td>
                                <td>
                                    <small class="text-muted">On time</small>
                                </td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                            data-bs-target="#editAttendanceModal">
                                            <span class="material-icons-round" style="font-size: 16px;">edit</span>
                                        </button>
                                        <button class="btn btn-sm btn-outline-danger">
                                            <span class="material-icons-round" style="font-size: 16px;">delete</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input row-checkbox" type="checkbox">
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-online me-3">
                                            <span class="material-icons-round">person</span>
                                        </div>
                                        <div>
                                            <h6 class="mb-0">Priya Singh</h6>
                                            <small class="text-muted">Safety Officer</small>
                                        </div>
                                    </div>
                                </td>
                                <td>EMP-002</td>
                                <td>Safety</td>
                                <td>
                                    <span class="badge bg-info">Morning</span>
                                </td>
                                <td>08:15 AM</td>
                                <td>05:20 PM</td>
                                <td>9h 5m</td>
                                <td>
                                    <span class="badge bg-success">Present</span>
                                </td>
                                <td>
                                    <small class="text-warning">15 mins late</small>
                                </td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                            data-bs-target="#editAttendanceModal">
                                            <span class="material-icons-round" style="font-size: 16px;">edit</span>
                                        </button>
                                        <button class="btn btn-sm btn-outline-danger">
                                            <span class="material-icons-round" style="font-size: 16px;">delete</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input row-checkbox" type="checkbox">
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-offline me-3">
                                            <span class="material-icons-round">person</span>
                                        </div>
                                        <div>
                                            <h6 class="mb-0">Mohan Lal</h6>
                                            <small class="text-muted">Supervisor</small>
                                        </div>
                                    </div>
                                </td>
                                <td>EMP-003</td>
                                <td>Supervision</td>
                                <td>
                                    <span class="badge bg-warning">Evening</span>
                                </td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>
                                    <span class="badge bg-danger">Absent</span>
                                </td>
                                <td>
                                    <small class="text-muted">No information</small>
                                </td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                            data-bs-target="#editAttendanceModal">
                                            <span class="material-icons-round" style="font-size: 16px;">edit</span>
                                        </button>
                                        <button class="btn btn-sm btn-outline-danger">
                                            <span class="material-icons-round" style="font-size: 16px;">delete</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input row-checkbox" type="checkbox">
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-online me-3">
                                            <span class="material-icons-round">person</span>
                                        </div>
                                        <div>
                                            <h6 class="mb-0">Suresh Kumar</h6>
                                            <small class="text-muted">Labor</small>
                                        </div>
                                    </div>
                                </td>
                                <td>EMP-004</td>
                                <td>Labor</td>
                                <td>
                                    <span class="badge bg-info">Morning</span>
                                </td>
                                <td>07:55 AM</td>
                                <td>12:30 PM</td>
                                <td>4h 35m</td>
                                <td>
                                    <span class="badge bg-warning">Half Day</span>
                                </td>
                                <td>
                                    <small class="text-info">Medical leave</small>
                                </td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                            data-bs-target="#editAttendanceModal">
                                            <span class="material-icons-round" style="font-size: 16px;">edit</span>
                                        </button>
                                        <button class="btn btn-sm btn-outline-danger">
                                            <span class="material-icons-round" style="font-size: 16px;">delete</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Attendance Statistics -->
        <div class="row mt-4">
            <div class="col-lg-8 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Attendance Trend (Last 7 Days)</h5>
                    </div>
                    <div class="card-body">
                        <div class="row text-center">
                            @foreach ($attendance['daily_log'] as $log)
                                <div class="col">
                                    <div class="attendance-day">
                                        <h6 class="mb-1">{{ $log['present'] }}</h6>
                                        <small class="text-muted d-block">Present</small>
                                        <small class="text-muted">{{ $log['date'] }}</small>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Department-wise Attendance</h5>
                    </div>
                    <div class="card-body">
                        <div class="department-stats">
                            <div class="department-item d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <span class="material-icons-round text-primary me-2">engineering</span>
                                    <span>Engineering</span>
                                </div>
                                <span class="badge bg-success">95%</span>
                            </div>
                            <div class="department-item d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <span class="material-icons-round text-success me-2">security</span>
                                    <span>Safety</span>
                                </div>
                                <span class="badge bg-success">92%</span>
                            </div>
                            <div class="department-item d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <span class="material-icons-round text-warning me-2">supervisor_account</span>
                                    <span>Supervision</span>
                                </div>
                                <span class="badge bg-warning">85%</span>
                            </div>
                            <div class="department-item d-flex justify-content-between align-items-center">
                                <div>
                                    <span class="material-icons-round text-info me-2">construction</span>
                                    <span>Labor</span>
                                </div>
                                <span class="badge bg-danger">78%</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Mark Attendance Modal -->
    <div class="modal fade" id="markAttendanceModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Mark Attendance</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="attendanceForm">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="attendanceDate" class="form-label">Date</label>
                                <input type="date" class="form-control" id="attendanceDate"
                                    value="{{ date('Y-m-d') }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="employeeSelect" class="form-label">Employee</label>
                                <select class="form-select" id="employeeSelect" required>
                                    <option value="">Select Employee</option>
                                    <option value="1">Rahul Sharma (EMP-001)</option>
                                    <option value="2">Priya Singh (EMP-002)</option>
                                    <option value="3">Mohan Lal (EMP-003)</option>
                                    <option value="4">Suresh Kumar (EMP-004)</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="checkInTime" class="form-label">Check-in Time</label>
                                <input type="time" class="form-control" id="checkInTime" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="checkOutTime" class="form-label">Check-out Time</label>
                                <input type="time" class="form-control" id="checkOutTime">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="attendanceStatus" class="form-label">Status</label>
                                <select class="form-select" id="attendanceStatus" required>
                                    <option value="present">Present</option>
                                    <option value="absent">Absent</option>
                                    <option value="late">Late</option>
                                    <option value="half_day">Half Day</option>
                                    <option value="leave">On Leave</option>
                                </select>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="attendanceRemarks" class="form-label">Remarks</label>
                                <textarea class="form-control" id="attendanceRemarks" rows="3" placeholder="Any remarks or notes..."></textarea>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="saveAttendance()">Save Attendance</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Attendance Modal -->
    <div class="modal fade" id="editAttendanceModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Attendance</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Similar form as mark attendance but pre-filled -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Update Attendance</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bulk Action Modal -->
    <div class="modal fade" id="bulkActionModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Bulk Actions</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="bulkAction" class="form-label">Select Action</label>
                        <select class="form-select" id="bulkAction">
                            <option value="">Choose action...</option>
                            <option value="mark_present">Mark as Present</option>
                            <option value="mark_absent">Mark as Absent</option>
                            <option value="mark_leave">Mark as On Leave</option>
                            <option value="export">Export Selected</option>
                            <option value="delete">Delete Records</option>
                        </select>
                    </div>
                    <div class="alert alert-info">
                        <span class="material-icons-round me-2">info</span>
                        This action will affect all selected employees.
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="performBulkAction()">Apply Action</button>
                </div>
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

        .avatar-offline::after {
            content: '';
            position: absolute;
            bottom: 0;
            right: 0;
            width: 10px;
            height: 10px;
            background: #ef4444;
            border-radius: 50%;
            border: 2px solid white;
        }

        .attendance-day {
            padding: 15px;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
        }

        .department-item {
            padding: 10px;
            border-bottom: 1px solid #f1f5f9;
        }

        .department-item:last-child {
            border-bottom: none;
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Select all checkbox functionality
            const selectAll = document.getElementById('selectAll');
            const rowCheckboxes = document.querySelectorAll('.row-checkbox');

            selectAll.addEventListener('change', function() {
                rowCheckboxes.forEach(checkbox => {
                    checkbox.checked = selectAll.checked;
                });
            });

            // Search functionality
            const searchInput = document.getElementById('searchAttendance');
            searchInput.addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase();
                const rows = document.querySelectorAll('#attendanceTable tbody tr');

                rows.forEach(row => {
                    const text = row.textContent.toLowerCase();
                    row.style.display = text.includes(searchTerm) ? '' : 'none';
                });
            });
        });

        function applyFilters() {
            // Implement filter logic here
            console.log('Applying filters...');
        }

        function resetFilters() {
            document.getElementById('dateFilter').value = '';
            document.getElementById('departmentFilter').value = '';
            document.getElementById('shiftFilter').value = '';
            document.getElementById('statusFilter').value = '';
            applyFilters();
        }

        function saveAttendance() {
            // Implement save attendance logic here
            console.log('Saving attendance...');
            const modal = bootstrap.Modal.getInstance(document.getElementById('markAttendanceModal'));
            modal.hide();
        }

        function performBulkAction() {
            const action = document.getElementById('bulkAction').value;
            if (!action) {
                alert('Please select an action');
                return;
            }

            // Implement bulk action logic here
            console.log('Performing bulk action:', action);
            const modal = bootstrap.Modal.getInstance(document.getElementById('bulkActionModal'));
            modal.hide();
        }
    </script>
@endsection
