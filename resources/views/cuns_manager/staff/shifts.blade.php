@extends('cuns_manager.layouts.main')

@section('title', 'Shift Management - Construction Manager')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <!-- Page Header -->
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="fw-bold py-3 mb-0">
                        <span class="text-muted fw-light">Staff /</span> Shift Management
                    </h4>
                    <div class="d-flex gap-2">
                        <button class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#generateRosterModal">
                            <span class="material-icons-round me-2">calendar_today</span>
                            Generate Roster
                        </button>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createShiftModal">
                            <span class="material-icons-round me-2">add</span>
                            Create Shift
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Shift Statistics -->
        <div class="row mb-4">
            <div class="col-lg-3 col-md-6 col-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="card-info">
                                <h6 class="card-title text-muted mb-2">Active Shifts</h6>
                                <h4 class="text-primary mb-0">3</h4>
                                <small class="text-muted">Currently running</small>
                            </div>
                            <div class="card-icon">
                                <span class="material-icons-round text-primary" style="font-size: 48px;">schedule</span>
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
                                <h6 class="card-title text-muted mb-2">Total Employees</h6>
                                <h4 class="text-success mb-0">45</h4>
                                <small class="text-muted">Across all shifts</small>
                            </div>
                            <div class="card-icon">
                                <span class="material-icons-round text-success" style="font-size: 48px;">groups</span>
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
                                <h6 class="card-title text-muted mb-2">Morning Shift</h6>
                                <h4 class="text-info mb-0">25</h4>
                                <small class="text-muted">Employees assigned</small>
                            </div>
                            <div class="card-icon">
                                <span class="material-icons-round text-info" style="font-size: 48px;">wb_sunny</span>
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
                                <h6 class="card-title text-muted mb-2">Evening Shift</h6>
                                <h4 class="text-warning mb-0">20</h4>
                                <small class="text-muted">Employees assigned</small>
                            </div>
                            <div class="card-icon">
                                <span class="material-icons-round text-warning" style="font-size: 48px;">nights_stay</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Shift Schedule Overview -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Current Week Schedule</h5>
                        <div class="d-flex gap-2">
                            <button class="btn btn-outline-secondary btn-sm" onclick="previousWeek()">
                                <span class="material-icons-round">chevron_left</span>
                            </button>
                            <span class="fw-bold mx-2" id="currentWeekRange">Mar 18 - Mar 24, 2024</span>
                            <button class="btn btn-outline-secondary btn-sm" onclick="nextWeek()">
                                <span class="material-icons-round">chevron_right</span>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="weeklySchedule">
                                <thead>
                                    <tr>
                                        <th>Employee</th>
                                        <th>Mon<br>18</th>
                                        <th>Tue<br>19</th>
                                        <th>Wed<br>20</th>
                                        <th>Thu<br>21</th>
                                        <th>Fri<br>22</th>
                                        <th>Sat<br>23</th>
                                        <th>Sun<br>24</th>
                                        <th>Total Hours</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar avatar-online me-2">
                                                    <span class="material-icons-round">person</span>
                                                </div>
                                                <span>Rahul Sharma</span>
                                            </div>
                                        </td>
                                        <td><span class="badge bg-info">Morning</span></td>
                                        <td><span class="badge bg-info">Morning</span></td>
                                        <td><span class="badge bg-info">Morning</span></td>
                                        <td><span class="badge bg-info">Morning</span></td>
                                        <td><span class="badge bg-info">Morning</span></td>
                                        <td><span class="badge bg-secondary">Off</span></td>
                                        <td><span class="badge bg-secondary">Off</span></td>
                                        <td><strong>40h</strong></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar avatar-online me-2">
                                                    <span class="material-icons-round">person</span>
                                                </div>
                                                <span>Priya Singh</span>
                                            </div>
                                        </td>
                                        <td><span class="badge bg-info">Morning</span></td>
                                        <td><span class="badge bg-info">Morning</span></td>
                                        <td><span class="badge bg-warning">Evening</span></td>
                                        <td><span class="badge bg-warning">Evening</span></td>
                                        <td><span class="badge bg-info">Morning</span></td>
                                        <td><span class="badge bg-secondary">Off</span></td>
                                        <td><span class="badge bg-warning">Evening</span></td>
                                        <td><strong>44h</strong></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar avatar-online me-2">
                                                    <span class="material-icons-round">person</span>
                                                </div>
                                                <span>Mohan Lal</span>
                                            </div>
                                        </td>
                                        <td><span class="badge bg-warning">Evening</span></td>
                                        <td><span class="badge bg-warning">Evening</span></td>
                                        <td><span class="badge bg-warning">Evening</span></td>
                                        <td><span class="badge bg-warning">Evening</span></td>
                                        <td><span class="badge bg-warning">Evening</span></td>
                                        <td><span class="badge bg-secondary">Off</span></td>
                                        <td><span class="badge bg-secondary">Off</span></td>
                                        <td><strong>40h</strong></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Shift Definitions -->
        <div class="row">
            <div class="col-lg-8 mb-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Shift Definitions</h5>
                        <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal"
                            data-bs-target="#createShiftModal">
                            <span class="material-icons-round me-1">add</span>
                            Add Shift
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach ($shifts as $shift)
                                <div class="col-md-6 mb-4">
                                    <div class="card shift-card">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-start mb-3">
                                                <div>
                                                    <h6 class="card-title mb-1">{{ $shift['shift_name'] }}</h6>
                                                    <p class="text-muted mb-0">{{ $shift['timing'] }}</p>
                                                </div>
                                                <span class="badge bg-primary">{{ $shift['workers_count'] }} Workers</span>
                                            </div>
                                            <div class="shift-info">
                                                <div class="d-flex justify-content-between align-items-center mb-2">
                                                    <small class="text-muted">Supervisor</small>
                                                    <small class="fw-bold">{{ $shift['supervisor'] }}</small>
                                                </div>
                                                <div class="d-flex justify-content-between align-items-center mb-2">
                                                    <small class="text-muted">Break Time</small>
                                                    <small>1 hour</small>
                                                </div>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <small class="text-muted">Overtime Rate</small>
                                                    <small class="text-success">1.5x</small>
                                                </div>
                                            </div>
                                            <div class="d-flex gap-2 mt-3">
                                                <button class="btn btn-outline-primary btn-sm"
                                                    onclick="editShift({{ $shift['id'] ?? 1 }})">
                                                    <span class="material-icons-round"
                                                        style="font-size: 16px;">edit</span>
                                                </button>
                                                <button class="btn btn-outline-secondary btn-sm"
                                                    onclick="viewShiftEmployees({{ $shift['id'] ?? 1 }})">
                                                    <span class="material-icons-round"
                                                        style="font-size: 16px;">groups</span>
                                                </button>
                                                <button class="btn btn-outline-danger btn-sm"
                                                    onclick="deleteShift({{ $shift['id'] ?? 1 }})">
                                                    <span class="material-icons-round"
                                                        style="font-size: 16px;">delete</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- Shift Assignment -->
            <div class="col-lg-4 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Quick Assignment</h5>
                    </div>
                    <div class="card-body">
                        <form id="quickAssignmentForm">
                            <div class="mb-3">
                                <label for="assignEmployee" class="form-label">Employee</label>
                                <select class="form-select" id="assignEmployee" required>
                                    <option value="">Select Employee</option>
                                    <option value="1">Rahul Sharma</option>
                                    <option value="2">Priya Singh</option>
                                    <option value="3">Mohan Lal</option>
                                    <option value="4">Suresh Kumar</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="assignShift" class="form-label">Shift</label>
                                <select class="form-select" id="assignShift" required>
                                    <option value="">Select Shift</option>
                                    <option value="morning">Morning Shift (08:00 - 16:00)</option>
                                    <option value="evening">Evening Shift (16:00 - 00:00)</option>
                                    <option value="night">Night Shift (00:00 - 08:00)</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="assignDate" class="form-label">Start Date</label>
                                <input type="date" class="form-control" id="assignDate" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Repeat</label>
                                <div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="repeatOption"
                                            id="repeatOnce" value="once" checked>
                                        <label class="form-check-label" for="repeatOnce">Once</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="repeatOption"
                                            id="repeatWeekly" value="weekly">
                                        <label class="form-check-label" for="repeatWeekly">Weekly</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="repeatOption"
                                            id="repeatMonthly" value="monthly">
                                        <label class="form-check-label" for="repeatMonthly">Monthly</label>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">
                                <span class="material-icons-round me-2">assignment</span>
                                Assign Shift
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Shift Calendar -->
                <div class="card mt-4">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Today's Shifts</h5>
                    </div>
                    <div class="card-body">
                        <div class="shift-calendar">
                            <div class="shift-time-slot mb-3">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <h6 class="mb-0 text-primary">Morning Shift</h6>
                                    <small class="text-muted">08:00 - 16:00</small>
                                </div>
                                <div class="employee-list">
                                    <div class="employee-item d-flex align-items-center mb-2">
                                        <div class="avatar avatar-online me-2">
                                            <span class="material-icons-round">person</span>
                                        </div>
                                        <small>Rahul Sharma</small>
                                    </div>
                                    <div class="employee-item d-flex align-items-center mb-2">
                                        <div class="avatar avatar-online me-2">
                                            <span class="material-icons-round">person</span>
                                        </div>
                                        <small>Priya Singh</small>
                                    </div>
                                    <small class="text-muted">+23 more employees</small>
                                </div>
                            </div>
                            <div class="shift-time-slot">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <h6 class="mb-0 text-warning">Evening Shift</h6>
                                    <small class="text-muted">16:00 - 00:00</small>
                                </div>
                                <div class="employee-list">
                                    <div class="employee-item d-flex align-items-center mb-2">
                                        <div class="avatar avatar-online me-2">
                                            <span class="material-icons-round">person</span>
                                        </div>
                                        <small>Mohan Lal</small>
                                    </div>
                                    <div class="employee-item d-flex align-items-center mb-2">
                                        <div class="avatar avatar-online me-2">
                                            <span class="material-icons-round">person</span>
                                        </div>
                                        <small>Suresh Kumar</small>
                                    </div>
                                    <small class="text-muted">+18 more employees</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Create Shift Modal -->
    <div class="modal fade" id="createShiftModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create New Shift</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="createShiftForm">
                        <div class="mb-3">
                            <label for="shiftName" class="form-label">Shift Name</label>
                            <input type="text" class="form-control" id="shiftName" placeholder="e.g., Morning Shift"
                                required>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="startTime" class="form-label">Start Time</label>
                                <input type="time" class="form-control" id="startTime" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="endTime" class="form-label">End Time</label>
                                <input type="time" class="form-control" id="endTime" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="shiftDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="shiftDescription" rows="3" placeholder="Shift description..."></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="shiftSupervisor" class="form-label">Shift Supervisor</label>
                            <select class="form-select" id="shiftSupervisor" required>
                                <option value="">Select Supervisor</option>
                                <option value="1">Rajesh Kumar</option>
                                <option value="2">Mohan Lal</option>
                                <option value="3">Suresh Kumar</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="maxEmployees" class="form-label">Maximum Employees</label>
                            <input type="number" class="form-control" id="maxEmployees" min="1" value="25">
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="allowOvertime" checked>
                            <label class="form-check-label" for="allowOvertime">
                                Allow Overtime
                            </label>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="createShift()">Create Shift</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Generate Roster Modal -->
    <div class="modal fade" id="generateRosterModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Generate Roster</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="rosterForm">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="rosterStartDate" class="form-label">Start Date</label>
                                <input type="date" class="form-control" id="rosterStartDate" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="rosterEndDate" class="form-label">End Date</label>
                                <input type="date" class="form-control" id="rosterEndDate" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="rosterDepartment" class="form-label">Department</label>
                                <select class="form-select" id="rosterDepartment">
                                    <option value="">All Departments</option>
                                    <option value="engineering">Engineering</option>
                                    <option value="safety">Safety</option>
                                    <option value="labor">Labor</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="rosterTemplate" class="form-label">Roster Template</label>
                                <select class="form-select" id="rosterTemplate">
                                    <option value="standard">Standard 5-day Week</option>
                                    <option value="rotational">Rotational Shifts</option>
                                    <option value="custom">Custom Template</option>
                                </select>
                            </div>
                            <div class="col-12 mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="includeWeekends">
                                    <label class="form-check-label" for="includeWeekends">
                                        Include weekends in roster
                                    </label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="generateRoster()">Generate Roster</button>
                </div>
            </div>
        </div>
    </div>

    <style>
        .avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: #f1f5f9;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #64748b;
            font-size: 16px;
        }

        .avatar-online::after {
            content: '';
            position: absolute;
            bottom: 0;
            right: 0;
            width: 8px;
            height: 8px;
            background: #10b981;
            border-radius: 50%;
            border: 2px solid white;
        }

        .shift-card {
            border: 1px solid #e2e8f0;
            transition: all 0.3s ease;
        }

        .shift-card:hover {
            border-color: #3b82f6;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .shift-time-slot {
            padding: 15px;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        .shift-time-slot:last-child {
            margin-bottom: 0;
        }

        .employee-item {
            padding: 5px 0;
        }

        .table th {
            border-top: none;
            font-weight: 600;
            color: #64748b;
            text-align: center;
        }

        .table td {
            vertical-align: middle;
            text-align: center;
        }

        .badge {
            font-size: 0.7rem;
            padding: 4px 8px;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Set default dates
            const today = new Date();
            document.getElementById('assignDate').value = today.toISOString().split('T')[0];

            const startDate = new Date(today);
            startDate.setDate(today.getDate() - today.getDay() + 1); // Monday
            document.getElementById('rosterStartDate').value = startDate.toISOString().split('T')[0];

            const endDate = new Date(startDate);
            endDate.setDate(startDate.getDate() + 6); // Sunday
            document.getElementById('rosterEndDate').value = endDate.toISOString().split('T')[0];
        });

        function previousWeek() {
            // Implement previous week navigation
            console.log('Previous week');
        }

        function nextWeek() {
            // Implement next week navigation
            console.log('Next week');
        }

        function editShift(shiftId) {
            // Implement edit shift functionality
            console.log('Editing shift:', shiftId);
        }

        function viewShiftEmployees(shiftId) {
            // Implement view shift employees functionality
            console.log('Viewing employees for shift:', shiftId);
        }

        function deleteShift(shiftId) {
            if (confirm('Are you sure you want to delete this shift?')) {
                console.log('Deleting shift:', shiftId);
            }
        }

        function createShift() {
            const form = document.getElementById('createShiftForm');
            if (form.checkValidity()) {
                // Implement create shift functionality
                console.log('Creating new shift');
                const modal = bootstrap.Modal.getInstance(document.getElementById('createShiftModal'));
                modal.hide();
            } else {
                form.reportValidity();
            }
        }

        function generateRoster() {
            const form = document.getElementById('rosterForm');
            if (form.checkValidity()) {
                // Implement generate roster functionality
                console.log('Generating roster');
                const modal = bootstrap.Modal.getInstance(document.getElementById('generateRosterModal'));
                modal.hide();
            } else {
                form.reportValidity();
            }
        }

        // Quick assignment form submission
        document.getElementById('quickAssignmentForm').addEventListener('submit', function(e) {
            e.preventDefault();
            // Implement quick assignment functionality
            console.log('Assigning shift');
        });
    </script>
@endsection
