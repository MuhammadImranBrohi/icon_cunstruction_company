@extends('cuns_manager.layouts.main')

@section('title', 'Leave Management - Construction Manager')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <!-- Page Header -->
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="fw-bold py-3 mb-0">
                        <span class="text-muted fw-light">Staff /</span> Leave Management
                    </h4>
                    <div class="d-flex gap-2">
                        <button class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#leavePolicyModal">
                            <span class="material-icons-round me-2">policy</span>
                            Leave Policy
                        </button>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#applyLeaveModal">
                            <span class="material-icons-round me-2">add</span>
                            Apply Leave
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Leave Statistics -->
        <div class="row mb-4">
            <div class="col-lg-3 col-md-6 col-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="card-info">
                                <h6 class="card-title text-muted mb-2">Pending Requests</h6>
                                <h4 class="text-warning mb-0">5</h4>
                                <small class="text-muted">Awaiting approval</small>
                            </div>
                            <div class="card-icon">
                                <span class="material-icons-round text-warning"
                                    style="font-size: 48px;">pending_actions</span>
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
                                <h6 class="card-title text-muted mb-2">Approved This Month</h6>
                                <h4 class="text-success mb-0">12</h4>
                                <small class="text-muted">Leave requests</small>
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
                                <h6 class="card-title text-muted mb-2">On Leave Today</h6>
                                <h4 class="text-info mb-0">3</h4>
                                <small class="text-muted">Currently absent</small>
                            </div>
                            <div class="card-icon">
                                <span class="material-icons-round text-info" style="font-size: 48px;">beach_access</span>
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
                                <h6 class="card-title text-muted mb-2">Rejected This Month</h6>
                                <h4 class="text-danger mb-0">2</h4>
                                <small class="text-muted">Leave requests</small>
                            </div>
                            <div class="card-icon">
                                <span class="material-icons-round text-danger" style="font-size: 48px;">cancel</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filters and Quick Actions -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-3">
                                <label for="leaveStatusFilter" class="form-label">Status</label>
                                <select class="form-select" id="leaveStatusFilter">
                                    <option value="">All Status</option>
                                    <option value="pending">Pending</option>
                                    <option value="approved">Approved</option>
                                    <option value="rejected">Rejected</option>
                                    <option value="cancelled">Cancelled</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="leaveTypeFilter" class="form-label">Leave Type</label>
                                <select class="form-select" id="leaveTypeFilter">
                                    <option value="">All Types</option>
                                    <option value="casual">Casual Leave</option>
                                    <option value="sick">Sick Leave</option>
                                    <option value="earned">Earned Leave</option>
                                    <option value="maternity">Maternity Leave</option>
                                    <option value="paternity">Paternity Leave</option>
                                    <option value="emergency">Emergency Leave</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="dateRangeFilter" class="form-label">Date Range</label>
                                <input type="text" class="form-control" id="dateRangeFilter"
                                    placeholder="Select date range">
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
                            <div class="col-12">
                                <div class="d-flex gap-2">
                                    <button class="btn btn-primary" onclick="applyLeaveFilters()">
                                        <span class="material-icons-round me-2">search</span>
                                        Apply Filters
                                    </button>
                                    <button class="btn btn-outline-secondary" onclick="resetLeaveFilters()">
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

        <!-- Leave Requests Table -->
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">Leave Requests</h5>
                <div class="d-flex gap-2">
                    <div class="input-group input-group-merge" style="width: 250px;">
                        <span class="input-group-text">
                            <span class="material-icons-round">search</span>
                        </span>
                        <input type="text" class="form-control" placeholder="Search leaves..." id="searchLeaves">
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="leavesTable">
                        <thead>
                            <tr>
                                <th>Employee</th>
                                <th>Leave Type</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Duration</th>
                                <th>Reason</th>
                                <th>Applied On</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($leave_requests as $leave)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar avatar-online me-3">
                                                <span class="material-icons-round">person</span>
                                            </div>
                                            <div>
                                                <h6 class="mb-0">{{ $leave['employee_name'] }}</h6>
                                                <small
                                                    class="text-muted">{{ $leave['employee_department'] ?? 'Engineering' }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge leave-type-{{ $leave['leave_type'] ?? 'sick' }}">
                                            {{ ucfirst($leave['leave_type'] ?? 'Sick Leave') }}
                                        </span>
                                    </td>
                                    <td>{{ $leave['start_date'] }}</td>
                                    <td>{{ $leave['end_date'] }}</td>
                                    <td>
                                        <strong>{{ \Carbon\Carbon::parse($leave['start_date'])->diffInDays($leave['end_date']) + 1 }}
                                            days</strong>
                                    </td>
                                    <td>
                                        <small class="text-muted" title="{{ $leave['reason'] ?? 'Medical reasons' }}">
                                            {{ Str::limit($leave['reason'] ?? 'Medical reasons', 30) }}
                                        </small>
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($leave['applied_date'] ?? now())->format('M d, Y') }}</td>
                                    <td>
                                        @if ($leave['status'] == 'pending')
                                            <span class="badge bg-warning">Pending</span>
                                        @elseif($leave['status'] == 'approved')
                                            <span class="badge bg-success">Approved</span>
                                        @else
                                            <span class="badge bg-danger">Rejected</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex gap-1">
                                            @if ($leave['status'] == 'pending')
                                                <button class="btn btn-sm btn-outline-success"
                                                    onclick="approveLeave({{ $leave['id'] }})">
                                                    <span class="material-icons-round"
                                                        style="font-size: 16px;">check</span>
                                                </button>
                                                <button class="btn btn-sm btn-outline-danger"
                                                    onclick="rejectLeave({{ $leave['id'] }})">
                                                    <span class="material-icons-round"
                                                        style="font-size: 16px;">close</span>
                                                </button>
                                            @endif
                                            <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                                data-bs-target="#viewLeaveModal"
                                                onclick="viewLeaveDetails({{ $leave['id'] }})">
                                                <span class="material-icons-round"
                                                    style="font-size: 16px;">visibility</span>
                                            </button>
                                            <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal"
                                                data-bs-target="#editLeaveModal"
                                                onclick="editLeave({{ $leave['id'] }})">
                                                <span class="material-icons-round" style="font-size: 16px;">edit</span>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Leave Balance and Calendar -->
        <div class="row mt-4">
            <!-- Leave Balance Summary -->
            <div class="col-lg-6 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Leave Balance Summary</h5>
                    </div>
                    <div class="card-body">
                        <div class="leave-balance-container">
                            <div
                                class="leave-balance-item d-flex justify-content-between align-items-center mb-3 p-3 border rounded">
                                <div class="d-flex align-items-center">
                                    <span class="material-icons-round text-primary me-3">beach_access</span>
                                    <div>
                                        <h6 class="mb-1">Casual Leave</h6>
                                        <small class="text-muted">12 days per year</small>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <h5 class="mb-0 text-success">8</h5>
                                    <small class="text-muted">Days remaining</small>
                                </div>
                            </div>
                            <div
                                class="leave-balance-item d-flex justify-content-between align-items-center mb-3 p-3 border rounded">
                                <div class="d-flex align-items-center">
                                    <span class="material-icons-round text-warning me-3">local_hospital</span>
                                    <div>
                                        <h6 class="mb-1">Sick Leave</h6>
                                        <small class="text-muted">10 days per year</small>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <h5 class="mb-0 text-success">7</h5>
                                    <small class="text-muted">Days remaining</small>
                                </div>
                            </div>
                            <div
                                class="leave-balance-item d-flex justify-content-between align-items-center p-3 border rounded">
                                <div class="d-flex align-items-center">
                                    <span class="material-icons-round text-success me-3">card_giftcard</span>
                                    <div>
                                        <h6 class="mb-1">Earned Leave</h6>
                                        <small class="text-muted">30 days per year</small>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <h5 class="mb-0 text-success">22</h5>
                                    <small class="text-muted">Days remaining</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Leave Calendar -->
            <div class="col-lg-6 mb-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Leave Calendar</h5>
                        <div class="d-flex gap-2">
                            <button class="btn btn-outline-secondary btn-sm" onclick="previousMonth()">
                                <span class="material-icons-round">chevron_left</span>
                            </button>
                            <span class="fw-bold mx-2" id="currentMonth">March 2024</span>
                            <button class="btn btn-outline-secondary btn-sm" onclick="nextMonth()">
                                <span class="material-icons-round">chevron_right</span>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="leave-calendar">
                            <div class="calendar-header d-flex text-center mb-3">
                                <div class="calendar-day-header">Sun</div>
                                <div class="calendar-day-header">Mon</div>
                                <div class="calendar-day-header">Tue</div>
                                <div class="calendar-day-header">Wed</div>
                                <div class="calendar-day-header">Thu</div>
                                <div class="calendar-day-header">Fri</div>
                                <div class="calendar-day-header">Sat</div>
                            </div>
                            <div class="calendar-body" id="calendarBody">
                                <!-- Calendar will be populated by JavaScript -->
                            </div>
                        </div>
                        <div class="leave-legend mt-3">
                            <div class="d-flex flex-wrap gap-3">
                                <div class="d-flex align-items-center">
                                    <div class="legend-color casual-leave me-2"></div>
                                    <small>Casual Leave</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="legend-color sick-leave me-2"></div>
                                    <small>Sick Leave</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="legend-color earned-leave me-2"></div>
                                    <small>Earned Leave</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="legend-color holiday me-2"></div>
                                    <small>Holiday</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Upcoming Leaves -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Upcoming Approved Leaves</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <div class="upcoming-leave-card p-3 border rounded">
                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                        <div>
                                            <h6 class="mb-1">Rahul Sharma</h6>
                                            <small class="text-muted">Site Engineer</small>
                                        </div>
                                        <span class="badge bg-info">Casual Leave</span>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small class="text-muted">Mar 25 - Mar 27</small>
                                        <small class="text-warning">3 days</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="upcoming-leave-card p-3 border rounded">
                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                        <div>
                                            <h6 class="mb-1">Priya Singh</h6>
                                            <small class="text-muted">Safety Officer</small>
                                        </div>
                                        <span class="badge bg-warning">Sick Leave</span>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small class="text-muted">Mar 28 - Mar 29</small>
                                        <small class="text-warning">2 days</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="upcoming-leave-card p-3 border rounded">
                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                        <div>
                                            <h6 class="mb-1">Mohan Lal</h6>
                                            <small class="text-muted">Supervisor</small>
                                        </div>
                                        <span class="badge bg-success">Earned Leave</span>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small class="text-muted">Apr 1 - Apr 5</small>
                                        <small class="text-warning">5 days</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Apply Leave Modal -->
    <div class="modal fade" id="applyLeaveModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Apply for Leave</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="applyLeaveForm">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="leaveEmployee" class="form-label">Employee</label>
                                <select class="form-select" id="leaveEmployee" required>
                                    <option value="">Select Employee</option>
                                    <option value="1">Rahul Sharma</option>
                                    <option value="2">Priya Singh</option>
                                    <option value="3">Mohan Lal</option>
                                    <option value="4">Suresh Kumar</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="leaveType" class="form-label">Leave Type</label>
                                <select class="form-select" id="leaveType" required>
                                    <option value="">Select Leave Type</option>
                                    <option value="casual">Casual Leave</option>
                                    <option value="sick">Sick Leave</option>
                                    <option value="earned">Earned Leave</option>
                                    <option value="maternity">Maternity Leave</option>
                                    <option value="paternity">Paternity Leave</option>
                                    <option value="emergency">Emergency Leave</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="leaveStartDate" class="form-label">Start Date</label>
                                <input type="date" class="form-control" id="leaveStartDate" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="leaveEndDate" class="form-label">End Date</label>
                                <input type="date" class="form-control" id="leaveEndDate" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="leaveReason" class="form-label">Reason for Leave</label>
                                <textarea class="form-control" id="leaveReason" rows="3"
                                    placeholder="Please provide a reason for your leave..." required></textarea>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="contactDuringLeave" class="form-label">Contact During Leave</label>
                                <input type="text" class="form-control" id="contactDuringLeave"
                                    placeholder="Phone number where you can be reached">
                            </div>
                            <div class="col-12 mb-3">
                                <label for="handoverNotes" class="form-label">Handover Notes</label>
                                <textarea class="form-control" id="handoverNotes" rows="2"
                                    placeholder="Any important handover information..."></textarea>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="emergencyLeave">
                                    <label class="form-check-label" for="emergencyLeave">
                                        This is an emergency leave
                                    </label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="submitLeaveApplication()">Submit
                        Application</button>
                </div>
            </div>
        </div>
    </div>

    <!-- View Leave Details Modal -->
    <div class="modal fade" id="viewLeaveModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Leave Application Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="leaveDetailsContent">
                    <!-- Leave details will be loaded here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Leave Policy Modal -->
    <div class="modal fade" id="leavePolicyModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Leave Policy</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="policy-section mb-4">
                        <h6>Casual Leave</h6>
                        <ul>
                            <li>12 days per calendar year</li>
                            <li>Maximum 3 consecutive days</li>
                            <li>Advance notice required: 2 days</li>
                        </ul>
                    </div>
                    <div class="policy-section mb-4">
                        <h6>Sick Leave</h6>
                        <ul>
                            <li>10 days per calendar year</li>
                            <li>Medical certificate required for more than 2 days</li>
                            <li>Can be availed without prior notice in emergencies</li>
                        </ul>
                    </div>
                    <div class="policy-section mb-4">
                        <h6>Earned Leave</h6>
                        <ul>
                            <li>30 days per calendar year</li>
                            <li>Accrued based on months worked</li>
                            <li>Advance notice required: 7 days</li>
                        </ul>
                    </div>
                    <div class="policy-section">
                        <h6>Other Leaves</h6>
                        <ul>
                            <li>Maternity Leave: 26 weeks</li>
                            <li>Paternity Leave: 15 days</li>
                            <li>Emergency Leave: 3 days per incident</li>
                        </ul>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
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

        .leave-type-casual {
            background-color: #3b82f6;
            color: white;
        }

        .leave-type-sick {
            background-color: #f59e0b;
            color: white;
        }

        .leave-type-earned {
            background-color: #10b981;
            color: white;
        }

        .leave-balance-item {
            transition: all 0.3s ease;
        }

        .leave-balance-item:hover {
            border-color: #3b82f6 !important;
            background: #f8fafc;
        }

        .calendar-day-header {
            flex: 1;
            padding: 8px;
            font-weight: 600;
            color: #64748b;
        }

        .calendar-body {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 2px;
        }

        .calendar-day {
            aspect-ratio: 1;
            padding: 4px;
            border: 1px solid #e2e8f0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .calendar-day:hover {
            background: #f1f5f9;
        }

        .calendar-day.leave-day {
            background: #dbeafe;
            border-color: #3b82f6;
        }

        .calendar-day.holiday {
            background: #fef3c7;
            border-color: #f59e0b;
        }

        .legend-color {
            width: 16px;
            height: 16px;
            border-radius: 4px;
        }

        .legend-color.casual-leave {
            background: #3b82f6;
        }

        .legend-color.sick-leave {
            background: #f59e0b;
        }

        .legend-color.earned-leave {
            background: #10b981;
        }

        .legend-color.holiday {
            background: #fef3c7;
        }

        .upcoming-leave-card {
            transition: all 0.3s ease;
        }

        .upcoming-leave-card:hover {
            border-color: #3b82f6 !important;
            background: #f8fafc;
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
            // Initialize date pickers
            const today = new Date();
            document.getElementById('leaveStartDate').value = today.toISOString().split('T')[0];

            const nextWeek = new Date(today);
            nextWeek.setDate(today.getDate() + 7);
            document.getElementById('leaveEndDate').value = nextWeek.toISOString().split('T')[0];

            // Initialize calendar
            generateCalendar(today.getFullYear(), today.getMonth());

            // Search functionality
            const searchInput = document.getElementById('searchLeaves');
            searchInput.addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase();
                const rows = document.querySelectorAll('#leavesTable tbody tr');

                rows.forEach(row => {
                    const text = row.textContent.toLowerCase();
                    row.style.display = text.includes(searchTerm) ? '' : 'none';
                });
            });
        });

        function generateCalendar(year, month) {
            const calendarBody = document.getElementById('calendarBody');
            calendarBody.innerHTML = '';

            const firstDay = new Date(year, month, 1);
            const lastDay = new Date(year, month + 1, 0);
            const startingDay = firstDay.getDay();

            // Add empty cells for days before the first day of the month
            for (let i = 0; i < startingDay; i++) {
                const emptyDay = document.createElement('div');
                emptyDay.className = 'calendar-day';
                calendarBody.appendChild(emptyDay);
            }

            // Add days of the month
            for (let day = 1; day <= lastDay.getDate(); day++) {
                const dayElement = document.createElement('div');
                dayElement.className = 'calendar-day';
                dayElement.textContent = day;

                // Mark leave days (example logic)
                if (day % 7 === 0 || day % 13 === 0) {
                    dayElement.classList.add('leave-day');
                }

                // Mark holidays (example)
                if (day === 25 || day === 26) {
                    dayElement.classList.add('holiday');
                }

                calendarBody.appendChild(dayElement);
            }

            // Update current month display
            document.getElementById('currentMonth').textContent =
                firstDay.toLocaleString('default', {
                    month: 'long',
                    year: 'numeric'
                });
        }

        function previousMonth() {
            const current = document.getElementById('currentMonth').textContent;
            const [month, year] = current.split(' ');
            const date = new Date(`${month} 1, ${year}`);
            date.setMonth(date.getMonth() - 1);
            generateCalendar(date.getFullYear(), date.getMonth());
        }

        function nextMonth() {
            const current = document.getElementById('currentMonth').textContent;
            const [month, year] = current.split(' ');
            const date = new Date(`${month} 1, ${year}`);
            date.setMonth(date.getMonth() + 1);
            generateCalendar(date.getFullYear(), date.getMonth());
        }

        function applyLeaveFilters() {
            // Implement filter logic
            console.log('Applying leave filters...');
        }

        function resetLeaveFilters() {
            document.getElementById('leaveStatusFilter').value = '';
            document.getElementById('leaveTypeFilter').value = '';
            document.getElementById('dateRangeFilter').value = '';
            document.getElementById('departmentFilter').value = '';
            applyLeaveFilters();
        }

        function approveLeave(leaveId) {
            if (confirm('Are you sure you want to approve this leave request?')) {
                // Implement approve logic
                console.log('Approving leave:', leaveId);
                // Refresh the table or update status
            }
        }

        function rejectLeave(leaveId) {
            if (confirm('Are you sure you want to reject this leave request?')) {
                // Implement reject logic
                console.log('Rejecting leave:', leaveId);
                // Refresh the table or update status
            }
        }

        function viewLeaveDetails(leaveId) {
            // Implement view details logic
            console.log('Viewing leave details:', leaveId);
            // Load leave details and show in modal
        }

        function editLeave(leaveId) {
            // Implement edit leave logic
            console.log('Editing leave:', leaveId);
        }

        function submitLeaveApplication() {
            const form = document.getElementById('applyLeaveForm');
            if (form.checkValidity()) {
                // Implement submit logic
                console.log('Submitting leave application');
                const modal = bootstrap.Modal.getInstance(document.getElementById('applyLeaveModal'));
                modal.hide();
            } else {
                form.reportValidity();
            }
        }
    </script>
@endsection
