@extends('cuns_manager.layouts.main')

@section('title', 'Reports - Construction Manager')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <!-- Page Header -->
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="fw-bold py-3 mb-0">
                        <span class="text-muted fw-light">Reports /</span> Analytics & Insights
                    </h4>
                    <div class="d-flex gap-2">
                        <button class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#reportSettingsModal">
                            <span class="material-icons-round me-2">settings</span>
                            Settings
                        </button>
                        <button class="btn btn-primary" onclick="window.location.href='{{ route('reports.generate') }}'">
                            <span class="material-icons-round me-2">add</span>
                            Generate Report
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Report Statistics -->
        <div class="row mb-4">
            <div class="col-xl-2 col-lg-4 col-md-4 col-6 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="card-info">
                            <h6 class="card-title text-muted mb-2">Total Reports</h6>
                            <h4 class="text-primary mb-0">{{ $stats['total_reports'] }}</h4>
                            <small class="text-muted">All Types</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-4 col-md-4 col-6 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="card-info">
                            <h6 class="card-title text-muted mb-2">This Month</h6>
                            <h4 class="text-info mb-0">{{ $stats['this_month'] }}</h4>
                            <small class="text-success">+{{ $stats['monthly_growth'] }}% growth</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-4 col-md-4 col-6 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="card-info">
                            <h6 class="card-title text-muted mb-2">Scheduled</h6>
                            <h4 class="text-warning mb-0">{{ $stats['scheduled'] }}</h4>
                            <small class="text-muted">Auto-generated</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-4 col-md-4 col-6 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="card-info">
                            <h6 class="card-title text-muted mb-2">Completed</h6>
                            <h4 class="text-success mb-0">{{ $stats['completed'] }}</h4>
                            <small class="text-muted">Ready to view</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-4 col-md-4 col-6 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="card-info">
                            <h6 class="card-title text-muted mb-2">In Progress</h6>
                            <h4 class="text-danger mb-0">{{ $stats['in_progress'] }}</h4>
                            <small class="text-muted">Generating</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-4 col-md-4 col-6 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="card-info">
                            <h6 class="card-title text-muted mb-2">Avg. Time</h6>
                            <h4 class="text-secondary mb-0">{{ $stats['avg_generation_time'] }}s</h4>
                            <small class="text-muted">Generation</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Report Types -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Quick Report Generation</h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-xl-2 col-lg-4 col-md-4 col-6">
                                <div class="report-type-card text-center p-3 border rounded"
                                    onclick="generateQuickReport('daily_progress')">
                                    <span class="material-icons-round text-primary mb-2"
                                        style="font-size: 48px;">today</span>
                                    <h6>Daily Progress</h6>
                                    <small class="text-muted">Today's work summary</small>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-4 col-md-4 col-6">
                                <div class="report-type-card text-center p-3 border rounded"
                                    onclick="generateQuickReport('weekly_summary')">
                                    <span class="material-icons-round text-info mb-2"
                                        style="font-size: 48px;">date_range</span>
                                    <h6>Weekly Summary</h6>
                                    <small class="text-muted">Week overview</small>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-4 col-md-4 col-6">
                                <div class="report-type-card text-center p-3 border rounded"
                                    onclick="generateQuickReport('financial')">
                                    <span class="material-icons-round text-success mb-2"
                                        style="font-size: 48px;">payments</span>
                                    <h6>Financial</h6>
                                    <small class="text-muted">Budget & expenses</small>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-4 col-md-4 col-6">
                                <div class="report-type-card text-center p-3 border rounded"
                                    onclick="generateQuickReport('attendance')">
                                    <span class="material-icons-round text-warning mb-2"
                                        style="font-size: 48px;">groups</span>
                                    <h6>Attendance</h6>
                                    <small class="text-muted">Staff presence</small>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-4 col-md-4 col-6">
                                <div class="report-type-card text-center p-3 border rounded"
                                    onclick="generateQuickReport('materials')">
                                    <span class="material-icons-round text-danger mb-2"
                                        style="font-size: 48px;">inventory_2</span>
                                    <h6>Materials</h6>
                                    <small class="text-muted">Stock & usage</small>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-4 col-md-4 col-6">
                                <div class="report-type-card text-center p-3 border rounded"
                                    onclick="generateQuickReport('safety')">
                                    <span class="material-icons-round text-secondary mb-2"
                                        style="font-size: 48px;">security</span>
                                    <h6>Safety</h6>
                                    <small class="text-muted">Compliance report</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Reports -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Recent Reports</h5>
                        <div class="d-flex gap-2">
                            <div class="input-group input-group-merge" style="width: 300px;">
                                <span class="input-group-text">
                                    <span class="material-icons-round">search</span>
                                </span>
                                <input type="text" class="form-control" placeholder="Search reports..."
                                    id="searchReports">
                            </div>
                            <div class="dropdown">
                                <button class="btn btn-outline-secondary dropdown-toggle" type="button"
                                    data-bs-toggle="dropdown">
                                    <span class="material-icons-round me-2">filter_list</span>
                                    Filter
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#" onclick="filterReports('all')">All
                                            Reports</a></li>
                                    <li><a class="dropdown-item" href="#"
                                            onclick="filterReports('completed')">Completed</a></li>
                                    <li><a class="dropdown-item" href="#" onclick="filterReports('in_progress')">In
                                            Progress</a></li>
                                    <li><a class="dropdown-item" href="#"
                                            onclick="filterReports('scheduled')">Scheduled</a></li>
                                    <li><a class="dropdown-item" href="#"
                                            onclick="filterReports('failed')">Failed</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover" id="reportsTable">
                                <thead>
                                    <tr>
                                        <th>Report Name</th>
                                        <th>Type</th>
                                        <th>Generated By</th>
                                        <th>Date Generated</th>
                                        <th>Status</th>
                                        <th>Size</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($recentReports as $report)
                                        <tr class="report-row" data-status="{{ $report['status'] }}">
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="report-icon me-3">
                                                        <span
                                                            class="material-icons-round text-{{ $report['type_color'] }}">
                                                            {{ $report['icon'] }}
                                                        </span>
                                                    </div>
                                                    <div>
                                                        <h6 class="mb-0">{{ $report['name'] }}</h6>
                                                        <small class="text-muted">{{ $report['description'] }}</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="badge bg-light text-dark">{{ $report['type'] }}</span>
                                            </td>
                                            <td>{{ $report['generated_by'] }}</td>
                                            <td>
                                                <small class="text-muted">{{ $report['generated_at'] }}</small>
                                            </td>
                                            <td>
                                                @if ($report['status'] == 'completed')
                                                    <span class="badge bg-success">Completed</span>
                                                @elseif($report['status'] == 'in_progress')
                                                    <span class="badge bg-warning">In Progress</span>
                                                @elseif($report['status'] == 'scheduled')
                                                    <span class="badge bg-info">Scheduled</span>
                                                @else
                                                    <span class="badge bg-danger">Failed</span>
                                                @endif
                                            </td>
                                            <td>
                                                <small class="text-muted">{{ $report['size'] }}</small>
                                            </td>
                                            <td>
                                                <div class="d-flex gap-1">
                                                    @if ($report['status'] == 'completed')
                                                        <button class="btn btn-sm btn-outline-primary"
                                                            onclick="viewReport({{ $report['id'] }})">
                                                            <span class="material-icons-round"
                                                                style="font-size: 16px;">visibility</span>
                                                        </button>
                                                        <button class="btn btn-sm btn-outline-success"
                                                            onclick="downloadReport({{ $report['id'] }})">
                                                            <span class="material-icons-round"
                                                                style="font-size: 16px;">download</span>
                                                        </button>
                                                    @endif
                                                    <button class="btn btn-sm btn-outline-secondary"
                                                        onclick="regenerateReport({{ $report['id'] }})">
                                                        <span class="material-icons-round"
                                                            style="font-size: 16px;">refresh</span>
                                                    </button>
                                                    <button class="btn btn-sm btn-outline-danger"
                                                        onclick="deleteReport({{ $report['id'] }})">
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

        <!-- Report Analytics -->
        <div class="row">
            <!-- Report Generation Trends -->
            <div class="col-lg-8 col-12 mb-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Report Generation Trends</h5>
                        <div class="dropdown">
                            <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button"
                                data-bs-toggle="dropdown">
                                Last 30 Days
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#" onclick="changeChartPeriod('week')">Last 7
                                        Days</a></li>
                                <li><a class="dropdown-item" href="#" onclick="changeChartPeriod('month')">Last 30
                                        Days</a></li>
                                <li><a class="dropdown-item" href="#" onclick="changeChartPeriod('quarter')">Last 3
                                        Months</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <canvas id="generationTrendsChart" height="300"></canvas>
                    </div>
                </div>
            </div>

            <!-- Report Type Distribution -->
            <div class="col-lg-4 col-12 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Report Type Distribution</h5>
                    </div>
                    <div class="card-body">
                        <canvas id="reportTypeChart" height="300"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Scheduled Reports -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Scheduled Reports</h5>
                        <button class="btn btn-outline-primary btn-sm" onclick="scheduleNewReport()">
                            <span class="material-icons-round me-1" style="font-size: 16px;">add_alarm</span>
                            Schedule New
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Report Name</th>
                                        <th>Schedule</th>
                                        <th>Next Run</th>
                                        <th>Recipients</th>
                                        <th>Format</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($scheduledReports as $schedule)
                                        <tr>
                                            <td>
                                                <h6 class="mb-0">{{ $schedule['name'] }}</h6>
                                                <small class="text-muted">{{ $schedule['type'] }}</small>
                                            </td>
                                            <td>
                                                <small class="text-muted">{{ $schedule['schedule'] }}</small>
                                            </td>
                                            <td>
                                                <small class="text-muted">{{ $schedule['next_run'] }}</small>
                                            </td>
                                            <td>
                                                <small class="text-muted">{{ $schedule['recipients_count'] }}
                                                    people</small>
                                            </td>
                                            <td>
                                                <span class="badge bg-light text-dark">{{ $schedule['format'] }}</span>
                                            </td>
                                            <td>
                                                @if ($schedule['is_active'])
                                                    <span class="badge bg-success">Active</span>
                                                @else
                                                    <span class="badge bg-secondary">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="d-flex gap-1">
                                                    <button class="btn btn-sm btn-outline-primary"
                                                        onclick="editSchedule({{ $schedule['id'] }})">
                                                        <span class="material-icons-round"
                                                            style="font-size: 16px;">edit</span>
                                                    </button>
                                                    <button class="btn btn-sm btn-outline-warning"
                                                        onclick="toggleSchedule({{ $schedule['id'] }})">
                                                        <span class="material-icons-round" style="font-size: 16px;">
                                                            {{ $schedule['is_active'] ? 'pause' : 'play_arrow' }}
                                                        </span>
                                                    </button>
                                                    <button class="btn btn-sm btn-outline-danger"
                                                        onclick="deleteSchedule({{ $schedule['id'] }})">
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

    </div>

    <!-- Report Settings Modal -->
    <div class="modal fade" id="reportSettingsModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Report Settings</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="reportSettingsForm">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label class="form-label">Default Report Format</label>
                                <div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="default_format"
                                            id="formatPdf" value="pdf" checked>
                                        <label class="form-check-label" for="formatPdf">PDF</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="default_format"
                                            id="formatExcel" value="excel">
                                        <label class="form-check-label" for="formatExcel">Excel</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="default_format"
                                            id="formatCsv" value="csv">
                                        <label class="form-check-label" for="formatCsv">CSV</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="autoDelete" class="form-label">Auto-delete Reports Older Than</label>
                                <select class="form-select" id="autoDelete">
                                    <option value="never">Never</option>
                                    <option value="30">30 days</option>
                                    <option value="60">60 days</option>
                                    <option value="90">90 days</option>
                                    <option value="180">180 days</option>
                                    <option value="365">1 year</option>
                                </select>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="defaultTimezone" class="form-label">Default Timezone</label>
                                <select class="form-select" id="defaultTimezone">
                                    <option value="UTC">UTC</option>
                                    <option value="IST" selected>India Standard Time (IST)</option>
                                    <option value="EST">Eastern Standard Time</option>
                                    <option value="PST">Pacific Standard Time</option>
                                </select>
                            </div>
                            <div class="col-12 mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="emailNotifications" checked>
                                    <label class="form-check-label" for="emailNotifications">
                                        Send email notifications when reports are generated
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="autoSave" checked>
                                    <label class="form-check-label" for="autoSave">
                                        Auto-save report configurations
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="backupReports">
                                    <label class="form-check-label" for="backupReports">
                                        Create backup of all generated reports
                                    </label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="saveSettings()">Save Settings</button>
                </div>
            </div>
        </div>
    </div>

    <style>
        .report-type-card {
            transition: all 0.3s ease;
            cursor: pointer;
            background: white;
        }

        .report-type-card:hover {
            border-color: #3b82f6 !important;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            transform: translateY(-2px);
        }

        .report-icon {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            background: #f8f9fa;
        }

        .report-row:hover {
            background-color: #f8f9fa;
        }

        .table th {
            border-top: none;
            font-weight: 600;
            color: #64748b;
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize charts
            initializeCharts();

            // Search functionality
            const searchInput = document.getElementById('searchReports');
            if (searchInput) {
                searchInput.addEventListener('input', function() {
                    const searchTerm = this.value.toLowerCase();
                    const rows = document.querySelectorAll('#reportsTable tbody tr');

                    rows.forEach(row => {
                        const text = row.textContent.toLowerCase();
                        row.style.display = text.includes(searchTerm) ? '' : 'none';
                    });
                });
            }
        });

        function initializeCharts() {
            // Generation Trends Chart
            const trendsCtx = document.getElementById('generationTrendsChart').getContext('2d');
            new Chart(trendsCtx, {
                type: 'line',
                data: {
                    labels: {!! json_encode($generationTrends['dates']) !!},
                    datasets: [{
                        label: 'Reports Generated',
                        data: {!! json_encode($generationTrends['counts']) !!},
                        borderColor: '#3b82f6',
                        backgroundColor: 'rgba(59, 130, 246, 0.1)',
                        tension: 0.4,
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Number of Reports'
                            }
                        }
                    }
                }
            });

            // Report Type Chart
            const typeCtx = document.getElementById('reportTypeChart').getContext('2d');
            new Chart(typeCtx, {
                type: 'doughnut',
                data: {
                    labels: {!! json_encode($reportDistribution['types']) !!},
                    datasets: [{
                        data: {!! json_encode($reportDistribution['counts']) !!},
                        backgroundColor: [
                            '#3b82f6', '#10b981', '#f59e0b', '#ef4444', '#8b5cf6',
                            '#06b6d4', '#84cc16', '#f97316'
                        ]
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'bottom'
                        }
                    }
                }
            });
        }

        function generateQuickReport(type) {
            console.log('Generating quick report:', type);

            // Show loading state
            const card = event.currentTarget;
            const originalContent = card.innerHTML;
            card.innerHTML = `
        <div class="text-center">
            <div class="spinner-border text-primary mb-2" role="status"></div>
            <h6>Generating...</h6>
        </div>
    `;

            // Simulate API call
            setTimeout(() => {
                card.innerHTML = originalContent;
                showToast('Report generation started!', 'success');

                // Redirect to generate page with pre-filled type
                window.location.href = `/reports/generate?type=${type}`;
            }, 1500);
        }

        function viewReport(reportId) {
            console.log('Viewing report:', reportId);
            window.location.href = `/reports/view/${reportId}`;
        }

        function downloadReport(reportId) {
            console.log('Downloading report:', reportId);
            // Implement download functionality
            // window.location.href = `/reports/${reportId}/download`;
        }

        function regenerateReport(reportId) {
            if (confirm('Are you sure you want to regenerate this report?')) {
                console.log('Regenerating report:', reportId);
                // Implement regenerate functionality
                showToast('Report regeneration started!', 'info');
            }
        }

        function deleteReport(reportId) {
            if (confirm('Are you sure you want to delete this report? This action cannot be undone.')) {
                console.log('Deleting report:', reportId);
                // Implement delete functionality
                showToast('Report deleted successfully!', 'success');
            }
        }

        function filterReports(status) {
            const rows = document.querySelectorAll('.report-row');

            rows.forEach(row => {
                if (status === 'all') {
                    row.style.display = '';
                } else {
                    row.style.display = row.dataset.status === status ? '' : 'none';
                }
            });
        }

        function changeChartPeriod(period) {
            console.log('Changing chart period to:', period);
            // Implement period change logic
        }

        function scheduleNewReport() {
            console.log('Scheduling new report');
            window.location.href = '/reports/schedule';
        }

        function editSchedule(scheduleId) {
            console.log('Editing schedule:', scheduleId);
            window.location.href = `/reports/schedule/${scheduleId}/edit`;
        }

        function toggleSchedule(scheduleId) {
            console.log('Toggling schedule:', scheduleId);
            // Implement toggle functionality
        }

        function deleteSchedule(scheduleId) {
            if (confirm('Are you sure you want to delete this scheduled report?')) {
                console.log('Deleting schedule:', scheduleId);
                // Implement delete functionality
            }
        }

        function saveSettings() {
            const form = document.getElementById('reportSettingsForm');
            const settings = {
                defaultFormat: document.querySelector('input[name="default_format"]:checked').value,
                autoDelete: document.getElementById('autoDelete').value,
                timezone: document.getElementById('defaultTimezone').value,
                emailNotifications: document.getElementById('emailNotifications').checked,
                autoSave: document.getElementById('autoSave').checked,
                backupReports: document.getElementById('backupReports').checked
            };

            console.log('Saving settings:', settings);
            // Implement settings save

            const modal = bootstrap.Modal.getInstance(document.getElementById('reportSettingsModal'));
            modal.hide();

            showToast('Settings saved successfully!', 'success');
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

        // Keyboard shortcuts
        document.addEventListener('keydown', function(e) {
            if (e.ctrlKey || e.metaKey) {
                switch (e.key) {
                    case 'n':
                        e.preventDefault();
                        window.location.href = '{{ route('reports.generate') }}';
                        break;
                    case 's':
                        e.preventDefault();
                        document.getElementById('reportSettingsModal').click();
                        break;
                }
            }
        });
    </script>
@endsection
