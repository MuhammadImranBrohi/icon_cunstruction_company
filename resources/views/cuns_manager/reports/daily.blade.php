@extends('cuns_manager.layouts.main')

@section('title', 'Daily Reports - Construction Manager')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <!-- Page Header -->
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="fw-bold py-3 mb-0">
                        <span class="text-muted fw-light">Reports /</span> Daily Reports
                    </h4>
                    <div class="d-flex gap-2">
                        <button class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#dailySettingsModal">
                            <span class="material-icons-round me-2">settings</span>
                            Settings
                        </button>
                        <button class="btn btn-primary" onclick="generateDailyReport()">
                            <span class="material-icons-round me-2">add</span>
                            Generate Today's Report
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Daily Report Statistics -->
        <div class="row mb-4">
            <div class="col-xl-2 col-lg-4 col-md-4 col-6 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="card-info">
                            <h6 class="card-title text-muted mb-2">Today's Report</h6>
                            <h4 class="text-primary mb-0">{{ $stats['today_exists'] ? 'Ready' : 'Pending' }}</h4>
                            <small class="text-muted">{{ date('M d, Y') }}</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-4 col-md-4 col-6 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="card-info">
                            <h6 class="card-title text-muted mb-2">This Week</h6>
                            <h4 class="text-info mb-0">{{ $stats['this_week'] }}/7</h4>
                            <small class="text-success">{{ $stats['week_completion'] }}% complete</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-4 col-md-4 col-6 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="card-info">
                            <h6 class="card-title text-muted mb-2">This Month</h6>
                            <h4 class="text-success mb-0">{{ $stats['this_month'] }}</h4>
                            <small class="text-muted">Reports generated</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-4 col-md-4 col-6 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="card-info">
                            <h6 class="card-title text-muted mb-2">Pending</h6>
                            <h4 class="text-warning mb-0">{{ $stats['pending_reviews'] }}</h4>
                            <small class="text-muted">Awaiting approval</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-4 col-md-4 col-6 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="card-info">
                            <h6 class="card-title text-muted mb-2">Approved</h6>
                            <h4 class="text-success mb-0">{{ $stats['approved'] }}</h4>
                            <small class="text-muted">This month</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-4 col-md-4 col-6 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="card-info">
                            <h6 class="card-title text-muted mb-2">Avg. Rating</h6>
                            <h4 class="text-secondary mb-0">{{ $stats['avg_rating'] }}/5</h4>
                            <small class="text-muted">Quality score</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Date Navigation -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex gap-2 align-items-center">
                                <button class="btn btn-outline-secondary" onclick="navigateDate('prev')">
                                    <span class="material-icons-round">chevron_left</span>
                                </button>
                                <h5 class="mb-0" id="currentDateDisplay">{{ date('F d, Y') }}</h5>
                                <button class="btn btn-outline-secondary" onclick="navigateDate('next')">
                                    <span class="material-icons-round">chevron_right</span>
                                </button>
                                <button class="btn btn-outline-primary ms-2" onclick="goToToday()">
                                    Today
                                </button>
                            </div>
                            <div class="d-flex gap-2">
                                <input type="date" class="form-control" id="datePicker" value="{{ date('Y-m-d') }}"
                                    onchange="selectDate(this.value)">
                                <div class="dropdown">
                                    <button class="btn btn-outline-secondary dropdown-toggle" type="button"
                                        data-bs-toggle="dropdown">
                                        <span class="material-icons-round me-1">view_week</span>
                                        View
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#" onclick="changeView('daily')">Daily
                                                View</a></li>
                                        <li><a class="dropdown-item" href="#" onclick="changeView('weekly')">Weekly
                                                View</a></li>
                                        <li><a class="dropdown-item" href="#" onclick="changeView('monthly')">Monthly
                                                Calendar</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Daily Report Summary -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Today's Summary</h5>
                        <div class="d-flex gap-2">
                            <span class="badge bg-{{ $todayReport ? 'success' : 'warning' }}">
                                {{ $todayReport ? 'Report Generated' : 'No Report Yet' }}
                            </span>
                            <button class="btn btn-sm btn-outline-primary" onclick="refreshData()">
                                <span class="material-icons-round" style="font-size: 16px;">refresh</span>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        @if ($todayReport)
                            <div class="row">
                                <div class="col-md-3 text-center mb-3">
                                    <div class="summary-item">
                                        <h3 class="text-primary mb-1">{{ $todayReport['work_hours'] ?? 0 }}</h3>
                                        <small class="text-muted">Work Hours</small>
                                    </div>
                                </div>
                                <div class="col-md-3 text-center mb-3">
                                    <div class="summary-item">
                                        <h3 class="text-success mb-1">{{ $todayReport['workers_present'] ?? 0 }}</h3>
                                        <small class="text-muted">Workers Present</small>
                                    </div>
                                </div>
                                <div class="col-md-3 text-center mb-3">
                                    <div class="summary-item">
                                        <h3 class="text-info mb-1">{{ $todayReport['tasks_completed'] ?? 0 }}</h3>
                                        <small class="text-muted">Tasks Completed</small>
                                    </div>
                                </div>
                                <div class="col-md-3 text-center mb-3">
                                    <div class="summary-item">
                                        <h3 class="text-warning mb-1">{{ $todayReport['issues_reported'] ?? 0 }}</h3>
                                        <small class="text-muted">Issues Reported</small>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3">
                                <h6>Work Summary:</h6>
                                <p class="mb-0">{{ $todayReport['work_summary'] ?? 'No work summary available.' }}</p>
                            </div>
                        @else
                            <div class="text-center py-4">
                                <span class="material-icons-round text-muted mb-3"
                                    style="font-size: 64px;">description</span>
                                <h5 class="text-muted">No Report Generated for Today</h5>
                                <p class="text-muted">Generate today's daily report to track progress and activities.</p>
                                <button class="btn btn-primary" onclick="generateDailyReport()">
                                    <span class="material-icons-round me-2">play_arrow</span>
                                    Generate Today's Report
                                </button>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Daily Reports -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Recent Daily Reports</h5>
                        <div class="d-flex gap-2">
                            <div class="input-group input-group-merge" style="width: 300px;">
                                <span class="input-group-text">
                                    <span class="material-icons-round">search</span>
                                </span>
                                <input type="text" class="form-control" placeholder="Search reports..."
                                    id="searchReports">
                            </div>
                            <button class="btn btn-outline-secondary" onclick="exportDailyReports()">
                                <span class="material-icons-round me-2">download</span>
                                Export
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover" id="dailyReportsTable">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Project</th>
                                        <th>Work Hours</th>
                                        <th>Workers</th>
                                        <th>Tasks Completed</th>
                                        <th>Issues</th>
                                        <th>Status</th>
                                        <th>Rating</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($recentReports as $report)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span
                                                        class="material-icons-round text-primary me-2">calendar_today</span>
                                                    <div>
                                                        <h6 class="mb-0">{{ $report['date']->format('M d, Y') }}</h6>
                                                        <small
                                                            class="text-muted">{{ $report['date']->format('l') }}</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span
                                                    class="badge bg-light text-dark">{{ $report['project_name'] }}</span>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="material-icons-round text-warning me-1"
                                                        style="font-size: 16px;">schedule</span>
                                                    <span>{{ $report['work_hours'] }}h</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="material-icons-round text-success me-1"
                                                        style="font-size: 16px;">groups</span>
                                                    <span>{{ $report['workers_present'] }}</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="material-icons-round text-info me-1"
                                                        style="font-size: 16px;">task</span>
                                                    <span>{{ $report['tasks_completed'] }}</span>
                                                </div>
                                            </td>
                                            <td>
                                                @if ($report['issues_reported'] > 0)
                                                    <span class="badge bg-danger">{{ $report['issues_reported'] }}</span>
                                                @else
                                                    <span class="badge bg-success">None</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($report['status'] == 'approved')
                                                    <span class="badge bg-success">Approved</span>
                                                @elseif($report['status'] == 'pending')
                                                    <span class="badge bg-warning">Pending</span>
                                                @elseif($report['status'] == 'draft')
                                                    <span class="badge bg-secondary">Draft</span>
                                                @else
                                                    <span class="badge bg-danger">Rejected</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        <span
                                                            class="material-icons-round {{ $i <= $report['rating'] ? 'text-warning' : 'text-muted' }}"
                                                            style="font-size: 16px;">star</span>
                                                    @endfor
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex gap-1">
                                                    <button class="btn btn-sm btn-outline-primary"
                                                        onclick="viewDailyReport({{ $report['id'] }})">
                                                        <span class="material-icons-round"
                                                            style="font-size: 16px;">visibility</span>
                                                    </button>
                                                    <button class="btn btn-sm btn-outline-secondary"
                                                        onclick="editDailyReport({{ $report['id'] }})">
                                                        <span class="material-icons-round"
                                                            style="font-size: 16px;">edit</span>
                                                    </button>
                                                    <button class="btn btn-sm btn-outline-success"
                                                        onclick="downloadDailyReport({{ $report['id'] }})">
                                                        <span class="material-icons-round"
                                                            style="font-size: 16px;">download</span>
                                                    </button>
                                                    <button class="btn btn-sm btn-outline-danger"
                                                        onclick="deleteDailyReport({{ $report['id'] }})">
                                                        <span class="material-icons-round"
                                                            style="font-size: 16px;">delete</span>
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
            </div>
        </div>

        <!-- Weekly Overview Chart -->
        <div class="row">
            <div class="col-lg-8 col-12 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Weekly Progress Overview</h5>
                    </div>
                    <div class="card-body">
                        <canvas id="weeklyProgressChart" height="250"></canvas>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="col-lg-4 col-12 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Quick Actions</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-grid gap-2">
                            <button class="btn btn-outline-primary d-flex align-items-center justify-content-center py-3"
                                onclick="generateDailyReport()">
                                <span class="material-icons-round me-2">play_arrow</span>
                                Generate Today's Report
                            </button>
                            <button class="btn btn-outline-success d-flex align-items-center justify-content-center py-3"
                                onclick="generateWeeklySummary()">
                                <span class="material-icons-round me-2">summarize</span>
                                Weekly Summary
                            </button>
                            <button class="btn btn-outline-warning d-flex align-items-center justify-content-center py-3"
                                data-bs-toggle="modal" data-bs-target="#scheduleModal">
                                <span class="material-icons-round me-2">schedule</span>
                                Schedule Reports
                            </button>
                            <button class="btn btn-outline-info d-flex align-items-center justify-content-center py-3"
                                onclick="exportAllDailyReports()">
                                <span class="material-icons-round me-2">archive</span>
                                Export All Reports
                            </button>
                        </div>

                        <!-- Upcoming Reports -->
                        <div class="mt-4">
                            <h6 class="mb-3">Upcoming Reports</h6>
                            <div class="upcoming-reports">
                                @foreach ($upcomingReports as $upcoming)
                                    <div
                                        class="upcoming-item d-flex align-items-center justify-content-between p-2 border rounded mb-2">
                                        <div>
                                            <h6 class="mb-0" style="font-size: 0.9rem;">{{ $upcoming['title'] }}</h6>
                                            <small class="text-muted">{{ $upcoming['date'] }}</small>
                                        </div>
                                        <span
                                            class="badge bg-{{ $upcoming['status_color'] }}">{{ $upcoming['status'] }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Daily Settings Modal -->
    <div class="modal fade" id="dailySettingsModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Daily Report Settings</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="dailySettingsForm">
                        <div class="mb-3">
                            <label class="form-label">Auto-generation</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="autoGenerate" checked>
                                <label class="form-check-label" for="autoGenerate">
                                    Auto-generate daily reports at 6:00 PM
                                </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="defaultProject" class="form-label">Default Project</label>
                            <select class="form-select" id="defaultProject">
                                <option value="">Select Default Project</option>
                                @foreach ($projects as $project)
                                    <option value="{{ $project['id'] }}">{{ $project['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="reportTemplate" class="form-label">Default Template</label>
                            <select class="form-select" id="reportTemplate">
                                <option value="standard">Standard Template</option>
                                <option value="detailed">Detailed Template</option>
                                <option value="summary">Summary Template</option>
                                <option value="custom">Custom Template</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Notifications</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="emailReminders" checked>
                                <label class="form-check-label" for="emailReminders">
                                    Email reminders for pending reports
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="completionAlerts">
                                <label class="form-check-label" for="completionAlerts">
                                    Alert when report is completed
                                </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="retentionPeriod" class="form-label">Report Retention</label>
                            <select class="form-select" id="retentionPeriod">
                                <option value="30">30 days</option>
                                <option value="90" selected>90 days</option>
                                <option value="180">180 days</option>
                                <option value="365">1 year</option>
                                <option value="forever">Keep forever</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="saveDailySettings()">Save Settings</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Schedule Modal -->
    <div class="modal fade" id="scheduleModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Schedule Daily Reports</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="scheduleForm">
                        <div class="mb-3">
                            <label for="scheduleTime" class="form-label">Generation Time</label>
                            <input type="time" class="form-control" id="scheduleTime" value="18:00">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Days of Week</label>
                            <div class="row">
                                @foreach (['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'] as $day)
                                    <div class="col-4 mb-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="day{{ $day }}"
                                                {{ in_array($day, ['Mon', 'Tue', 'Wed', 'Thu', 'Fri']) ? 'checked' : '' }}>
                                            <label class="form-check-label"
                                                for="day{{ $day }}">{{ $day }}</label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="recipients" class="form-label">Email Recipients</label>
                            <textarea class="form-control" id="recipients" rows="3" placeholder="Enter email addresses (comma-separated)"></textarea>
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="includeWeekends">
                                <label class="form-check-label" for="includeWeekends">
                                    Include weekends in report generation
                                </label>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="saveSchedule()">Save Schedule</button>
                </div>
            </div>
        </div>
    </div>

    <style>
        .summary-item {
            padding: 15px;
            border-radius: 8px;
            background: #f8f9fa;
        }

        .upcoming-item {
            transition: all 0.3s ease;
        }

        .upcoming-item:hover {
            border-color: #3b82f6 !important;
            background-color: #f8f9fa;
        }

        #currentDateDisplay {
            min-width: 200px;
            text-align: center;
        }

        .table th {
            border-top: none;
            font-weight: 600;
            color: #64748b;
        }

        .table td {
            vertical-align: middle;
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        let currentDate = new Date();

        document.addEventListener('DOMContentLoaded', function() {
            // Initialize chart
            initializeWeeklyChart();

            // Search functionality
            const searchInput = document.getElementById('searchReports');
            if (searchInput) {
                searchInput.addEventListener('input', function() {
                    const searchTerm = this.value.toLowerCase();
                    const rows = document.querySelectorAll('#dailyReportsTable tbody tr');

                    rows.forEach(row => {
                        const text = row.textContent.toLowerCase();
                        row.style.display = text.includes(searchTerm) ? '' : 'none';
                    });
                });
            }

            // Set date picker max to today
            document.getElementById('datePicker').max = new Date().toISOString().split('T')[0];
        });

        function initializeWeeklyChart() {
            const ctx = document.getElementById('weeklyProgressChart').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($weeklyData['days']) !!},
                    datasets: [{
                        label: 'Work Hours',
                        data: {!! json_encode($weeklyData['work_hours']) !!},
                        backgroundColor: '#3b82f6',
                        borderColor: '#3b82f6',
                        borderWidth: 1
                    }, {
                        label: 'Tasks Completed',
                        data: {!! json_encode($weeklyData['tasks_completed']) !!},
                        backgroundColor: '#10b981',
                        borderColor: '#10b981',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Count'
                            }
                        }
                    }
                }
            });
        }

        function navigateDate(direction) {
            if (direction === 'prev') {
                currentDate.setDate(currentDate.getDate() - 1);
            } else if (direction === 'next') {
                currentDate.setDate(currentDate.getDate() + 1);
            }

            updateDateDisplay();
            loadDateData(currentDate);
        }

        function goToToday() {
            currentDate = new Date();
            updateDateDisplay();
            loadDateData(currentDate);
        }

        function selectDate(dateString) {
            currentDate = new Date(dateString);
            updateDateDisplay();
            loadDateData(currentDate);
        }

        function updateDateDisplay() {
            const options = {
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            };
            document.getElementById('currentDateDisplay').textContent = currentDate.toLocaleDateString('en-US', options);
            document.getElementById('datePicker').value = currentDate.toISOString().split('T')[0];
        }

        function loadDateData(date) {
            console.log('Loading data for:', date.toDateString());
            // Implement API call to load data for selected date
            // fetch(`/api/daily-reports/${date.toISOString().split('T')[0]}`)
            // .then(response => response.json())
            // .then(data => updateUIWithData(data));

            // Show loading state
            showToast(`Loading data for ${date.toLocaleDateString()}...`, 'info');
        }

        function changeView(viewType) {
            console.log('Changing view to:', viewType);
            if (viewType === 'weekly') {
                window.location.href = '/reports/weekly';
            } else if (viewType === 'monthly') {
                window.location.href = '/reports/monthly';
            }
            // Daily view is already active
        }

        function generateDailyReport() {
            console.log('Generating daily report for:', currentDate.toDateString());

            // Show loading state
            showToast('Generating daily report...', 'info');

            // Simulate API call
            setTimeout(() => {
                showToast('Daily report generated successfully!', 'success');
                // Refresh the page or update UI
                location.reload();
            }, 2000);
        }

        function generateWeeklySummary() {
            console.log('Generating weekly summary');
            window.location.href = '/reports/weekly-summary';
        }

        function viewDailyReport(reportId) {
            console.log('Viewing daily report:', reportId);
            window.location.href = `/reports/daily/${reportId}/view`;
        }

        function editDailyReport(reportId) {
            console.log('Editing daily report:', reportId);
            window.location.href = `/reports/daily/${reportId}/edit`;
        }

        function downloadDailyReport(reportId) {
            console.log('Downloading daily report:', reportId);
            // Implement download functionality
            // window.location.href = `/reports/daily/${reportId}/download`;
        }

        function deleteDailyReport(reportId) {
            if (confirm('Are you sure you want to delete this daily report? This action cannot be undone.')) {
                console.log('Deleting daily report:', reportId);
                // Implement delete functionality
                showToast('Daily report deleted successfully!', 'success');
            }
        }

        function exportDailyReports() {
            console.log('Exporting daily reports');
            // Implement export functionality
            showToast('Exporting daily reports...', 'info');
        }

        function exportAllDailyReports() {
            console.log('Exporting all daily reports');
            // Implement bulk export functionality
            showToast('Preparing all daily reports for export...', 'info');
        }

        function refreshData() {
            console.log('Refreshing data...');
            showToast('Refreshing data...', 'info');
            location.reload();
        }

        function saveDailySettings() {
            const settings = {
                autoGenerate: document.getElementById('autoGenerate').checked,
                defaultProject: document.getElementById('defaultProject').value,
                reportTemplate: document.getElementById('reportTemplate').value,
                emailReminders: document.getElementById('emailReminders').checked,
                completionAlerts: document.getElementById('completionAlerts').checked,
                retentionPeriod: document.getElementById('retentionPeriod').value
            };

            console.log('Saving daily settings:', settings);
            // Implement settings save

            const modal = bootstrap.Modal.getInstance(document.getElementById('dailySettingsModal'));
            modal.hide();

            showToast('Daily report settings saved!', 'success');
        }

        function saveSchedule() {
            const schedule = {
                time: document.getElementById('scheduleTime').value,
                recipients: document.getElementById('recipients').value,
                includeWeekends: document.getElementById('includeWeekends').checked
            };

            console.log('Saving schedule:', schedule);
            // Implement schedule save

            const modal = bootstrap.Modal.getInstance(document.getElementById('scheduleModal'));
            modal.hide();

            showToast('Report schedule saved!', 'success');
        }

        function showToast(message, type = 'success') {
            // Simple toast implementation
            const toast = document.createElement('div');
            toast.className = `alert alert-${type} alert-dismissible fade show position-fixed`;
            toast.style.cssText = 'top: 20px; right: 20px; z-index: 1055; min-width: 300px;';
            toast.innerHTML = `
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    `;
            document.body.appendChild(toast);

            setTimeout(() => {
                toast.remove();
            }, 3000);
        }

        // Keyboard shortcuts for date navigation
        document.addEventListener('keydown', function(e) {
            if (e.ctrlKey || e.metaKey) {
                switch (e.key) {
                    case 'ArrowLeft':
                        e.preventDefault();
                        navigateDate('prev');
                        break;
                    case 'ArrowRight':
                        e.preventDefault();
                        navigateDate('next');
                        break;
                    case 't':
                        e.preventDefault();
                        goToToday();
                        break;
                }
            }
        });
    </script>
@endsection
