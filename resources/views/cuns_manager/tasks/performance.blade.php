@extends('cuns_manager.layouts.main')

@section('title', 'Task Performance - Construction Manager')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <!-- Page Header -->
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="fw-bold py-3 mb-0">
                        <span class="text-muted fw-light">Tasks /</span> Performance Analytics
                    </h4>
                    <div class="d-flex gap-2">
                        <button class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#dateRangeModal">
                            <span class="material-icons-round me-2">date_range</span>
                            Date Range
                        </button>
                        <button class="btn btn-primary" onclick="exportPerformanceReport()">
                            <span class="material-icons-round me-2">download</span>
                            Export Report
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Performance Overview Cards -->
        <div class="row mb-4">
            <div class="col-xl-2 col-lg-4 col-md-4 col-6 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="card-info">
                            <h6 class="card-title text-muted mb-2">Completion Rate</h6>
                            <h4 class="text-success mb-0">{{ $overview['completion_rate'] }}%</h4>
                            <div class="progress mt-2" style="height: 4px;">
                                <div class="progress-bar bg-success" style="width: {{ $overview['completion_rate'] }}%">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-4 col-md-4 col-6 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="card-info">
                            <h6 class="card-title text-muted mb-2">On Time Rate</h6>
                            <h4 class="text-info mb-0">{{ $overview['on_time_rate'] }}%</h4>
                            <div class="progress mt-2" style="height: 4px;">
                                <div class="progress-bar bg-info" style="width: {{ $overview['on_time_rate'] }}%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-4 col-md-4 col-6 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="card-info">
                            <h6 class="card-title text-muted mb-2">Avg. Completion</h6>
                            <h4 class="text-primary mb-0">{{ $overview['avg_completion_days'] }}d</h4>
                            <small class="text-muted">Per Task</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-4 col-md-4 col-6 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="card-info">
                            <h6 class="card-title text-muted mb-2">Quality Score</h6>
                            <h4 class="text-warning mb-0">{{ $overview['quality_score'] }}/10</h4>
                            <small class="text-muted">Based on Reviews</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-4 col-md-4 col-6 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="card-info">
                            <h6 class="card-title text-muted mb-2">Team Productivity</h6>
                            <h4 class="text-success mb-0">{{ $overview['team_productivity'] }}%</h4>
                            <small class="text-muted">Efficiency</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-4 col-md-4 col-6 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="card-info">
                            <h6 class="card-title text-muted mb-2">Delay Rate</h6>
                            <h4 class="text-danger mb-0">{{ $overview['delay_rate'] }}%</h4>
                            <small class="text-muted">Tasks Delayed</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts Section -->
        <div class="row mb-4">
            <!-- Completion Trend -->
            <div class="col-xl-8 col-12 mb-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Task Completion Trend</h5>
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
                        <canvas id="completionTrendChart" height="300"></canvas>
                    </div>
                </div>
            </div>

            <!-- Performance by Category -->
            <div class="col-xl-4 col-12 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Performance by Category</h5>
                    </div>
                    <div class="card-body">
                        <canvas id="categoryPerformanceChart" height="300"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Team Performance -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Team Performance</h5>
                        <div class="d-flex gap-2">
                            <div class="input-group input-group-merge" style="width: 250px;">
                                <span class="input-group-text">
                                    <span class="material-icons-round">search</span>
                                </span>
                                <input type="text" class="form-control" placeholder="Search team members..."
                                    id="searchTeam">
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover" id="teamPerformanceTable">
                                <thead>
                                    <tr>
                                        <th>Team Member</th>
                                        <th>Role</th>
                                        <th>Tasks Assigned</th>
                                        <th>Completed</th>
                                        <th>Completion Rate</th>
                                        <th>On Time Rate</th>
                                        <th>Avg. Time</th>
                                        <th>Quality Score</th>
                                        <th>Performance</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($teamPerformance as $member)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar avatar-sm me-3">
                                                        <img src="{{ $member['avatar'] }}" alt="Avatar"
                                                            class="rounded-circle">
                                                    </div>
                                                    <div>
                                                        <h6 class="mb-0">{{ $member['name'] }}</h6>
                                                        <small class="text-muted">{{ $member['email'] }}</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="badge bg-light text-dark">{{ $member['role'] }}</span>
                                            </td>
                                            <td>{{ $member['tasks_assigned'] }}</td>
                                            <td>{{ $member['tasks_completed'] }}</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="progress flex-grow-1 me-2" style="height: 6px;">
                                                        <div class="progress-bar bg-{{ $member['completion_rate_color'] }}"
                                                            style="width: {{ $member['completion_rate'] }}%"></div>
                                                    </div>
                                                    <small>{{ $member['completion_rate'] }}%</small>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="progress flex-grow-1 me-2" style="height: 6px;">
                                                        <div class="progress-bar bg-{{ $member['on_time_rate_color'] }}"
                                                            style="width: {{ $member['on_time_rate'] }}%"></div>
                                                    </div>
                                                    <small>{{ $member['on_time_rate'] }}%</small>
                                                </div>
                                            </td>
                                            <td>
                                                <small class="text-muted">{{ $member['avg_completion_time'] }}
                                                    days</small>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span
                                                        class="material-icons-round text-{{ $member['quality_score_color'] }} me-1"
                                                        style="font-size: 16px;">
                                                        star
                                                    </span>
                                                    <small>{{ $member['quality_score'] }}/10</small>
                                                </div>
                                            </td>
                                            <td>
                                                @if ($member['performance'] == 'excellent')
                                                    <span class="badge bg-success">Excellent</span>
                                                @elseif($member['performance'] == 'good')
                                                    <span class="badge bg-info">Good</span>
                                                @elseif($member['performance'] == 'average')
                                                    <span class="badge bg-warning">Average</span>
                                                @else
                                                    <span class="badge bg-danger">Needs Improvement</span>
                                                @endif
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

        <!-- Project Performance -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Project-wise Performance</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach ($projectPerformance as $project)
                                <div class="col-xl-4 col-lg-6 col-12 mb-4">
                                    <div class="card project-performance-card">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-start mb-3">
                                                <h6 class="card-title mb-0">{{ $project['name'] }}</h6>
                                                <span
                                                    class="badge bg-{{ $project['status_color'] }}">{{ $project['status'] }}</span>
                                            </div>

                                            <div class="row text-center mb-3">
                                                <div class="col-4">
                                                    <div class="performance-metric">
                                                        <h4 class="text-primary mb-0">{{ $project['total_tasks'] }}</h4>
                                                        <small class="text-muted">Total Tasks</small>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="performance-metric">
                                                        <h4 class="text-success mb-0">{{ $project['completed_tasks'] }}
                                                        </h4>
                                                        <small class="text-muted">Completed</small>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="performance-metric">
                                                        <h4 class="text-warning mb-0">{{ $project['completion_rate'] }}%
                                                        </h4>
                                                        <small class="text-muted">Rate</small>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <div class="d-flex justify-content-between align-items-center mb-1">
                                                    <small class="text-muted">Overall Progress</small>
                                                    <small class="fw-bold">{{ $project['overall_progress'] }}%</small>
                                                </div>
                                                <div class="progress" style="height: 8px;">
                                                    <div class="progress-bar bg-{{ $project['progress_color'] }}"
                                                        style="width: {{ $project['overall_progress'] }}%"></div>
                                                </div>
                                            </div>

                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <small class="text-muted">Timeline Adherence</small>
                                                    <div class="fw-bold text-{{ $project['timeline_adherence_color'] }}">
                                                        {{ $project['timeline_adherence'] }}%
                                                    </div>
                                                </div>
                                                <div>
                                                    <small class="text-muted">Quality Score</small>
                                                    <div class="fw-bold text-{{ $project['quality_score_color'] }}">
                                                        {{ $project['quality_score'] }}/10
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Performance Insights -->
        <div class="row">
            <div class="col-lg-6 col-12 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Performance Insights</h5>
                    </div>
                    <div class="card-body">
                        <div class="insights-list">
                            @foreach ($insights as $insight)
                                <div class="insight-item d-flex align-items-start mb-3 p-3 rounded"
                                    style="background: {{ $insight['bg_color'] }};">
                                    <span class="material-icons-round {{ $insight['icon_color'] }} me-3 mt-1">
                                        {{ $insight['icon'] }}
                                    </span>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-1">{{ $insight['title'] }}</h6>
                                        <p class="mb-0 text-muted">{{ $insight['description'] }}</p>
                                        <small class="text-muted">{{ $insight['date'] }}</small>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-12 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Top Performers</h5>
                    </div>
                    <div class="card-body">
                        <div class="top-performers">
                            @foreach ($topPerformers as $performer)
                                <div class="performer-item d-flex align-items-center mb-3 p-3 border rounded">
                                    <div class="avatar avatar-lg me-3">
                                        <img src="{{ $performer['avatar'] }}" alt="Avatar" class="rounded-circle">
                                        <span class="avatar-badge bg-{{ $performer['rank_color'] }}">
                                            {{ $loop->iteration }}
                                        </span>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-1">{{ $performer['name'] }}</h6>
                                        <p class="mb-1 text-muted">{{ $performer['role'] }}</p>
                                        <div class="d-flex align-items-center">
                                            <span class="material-icons-round text-warning me-1" style="font-size: 16px;">
                                                star
                                            </span>
                                            <small class="me-3">Score: {{ $performer['performance_score'] }}/100</small>
                                            <small class="text-success">
                                                <span class="material-icons-round me-1" style="font-size: 16px;">
                                                    trending_up
                                                </span>
                                                {{ $performer['improvement'] }}%
                                            </small>
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <span class="badge bg-{{ $performer['performance_badge_color'] }}">
                                            {{ $performer['performance_level'] }}
                                        </span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Date Range Modal -->
    <div class="modal fade" id="dateRangeModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Select Date Range</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="dateRangeForm">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="startDate" class="form-label">Start Date</label>
                                <input type="date" class="form-control" id="startDate"
                                    value="{{ $dateRange['start'] }}">
                            </div>
                            <div class="col-12 mb-3">
                                <label for="endDate" class="form-label">End Date</label>
                                <input type="date" class="form-control" id="endDate"
                                    value="{{ $dateRange['end'] }}">
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label">Quick Select</label>
                                <div class="d-flex flex-wrap gap-2">
                                    <button type="button" class="btn btn-outline-secondary btn-sm"
                                        onclick="setDateRange('week')">This Week</button>
                                    <button type="button" class="btn btn-outline-secondary btn-sm"
                                        onclick="setDateRange('month')">This Month</button>
                                    <button type="button" class="btn btn-outline-secondary btn-sm"
                                        onclick="setDateRange('quarter')">This Quarter</button>
                                    <button type="button" class="btn btn-outline-secondary btn-sm"
                                        onclick="setDateRange('year')">This Year</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="applyDateRange()">Apply</button>
                </div>
            </div>
        </div>
    </div>

    <style>
        .performance-metric {
            padding: 10px 0;
        }

        .project-performance-card {
            transition: all 0.3s ease;
            border: 1px solid #e2e8f0;
        }

        .project-performance-card:hover {
            border-color: #3b82f6;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .avatar-badge {
            position: absolute;
            bottom: -5px;
            right: -5px;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 10px;
            color: white;
            border: 2px solid white;
        }

        .avatar {
            position: relative;
        }

        .insight-item {
            transition: all 0.3s ease;
        }

        .insight-item:hover {
            transform: translateX(5px);
        }

        .performer-item {
            transition: all 0.3s ease;
        }

        .performer-item:hover {
            border-color: #3b82f6 !important;
            background-color: #f8f9fa;
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize charts
            initializeCharts();

            // Search functionality
            const searchInput = document.getElementById('searchTeam');
            if (searchInput) {
                searchInput.addEventListener('input', function() {
                    const searchTerm = this.value.toLowerCase();
                    const rows = document.querySelectorAll('#teamPerformanceTable tbody tr');

                    rows.forEach(row => {
                        const text = row.textContent.toLowerCase();
                        row.style.display = text.includes(searchTerm) ? '' : 'none';
                    });
                });
            }
        });

        function initializeCharts() {
            // Completion Trend Chart
            const completionCtx = document.getElementById('completionTrendChart').getContext('2d');
            new Chart(completionCtx, {
                type: 'line',
                data: {
                    labels: {!! json_encode($completionTrend['labels']) !!},
                    datasets: [{
                        label: 'Tasks Completed',
                        data: {!! json_encode($completionTrend['completed']) !!},
                        borderColor: '#10b981',
                        backgroundColor: 'rgba(16, 185, 129, 0.1)',
                        tension: 0.4,
                        fill: true
                    }, {
                        label: 'Tasks Assigned',
                        data: {!! json_encode($completionTrend['assigned']) !!},
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
                                text: 'Number of Tasks'
                            }
                        }
                    }
                }
            });

            // Category Performance Chart
            const categoryCtx = document.getElementById('categoryPerformanceChart').getContext('2d');
            new Chart(categoryCtx, {
                type: 'doughnut',
                data: {
                    labels: {!! json_encode($categoryPerformance['labels']) !!},
                    datasets: [{
                        data: {!! json_encode($categoryPerformance['data']) !!},
                        backgroundColor: [
                            '#3b82f6', '#10b981', '#f59e0b', '#ef4444', '#8b5cf6',
                            '#06b6d4', '#84cc16', '#f97316', '#6366f1', '#ec4899'
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

        function changeChartPeriod(period) {
            console.log('Changing chart period to:', period);
            // Implement period change logic
            // This would typically make an API call to fetch new data
        }

        function setDateRange(range) {
            const today = new Date();
            let startDate = new Date();

            switch (range) {
                case 'week':
                    startDate.setDate(today.getDate() - 7);
                    break;
                case 'month':
                    startDate.setMonth(today.getMonth() - 1);
                    break;
                case 'quarter':
                    startDate.setMonth(today.getMonth() - 3);
                    break;
                case 'year':
                    startDate.setFullYear(today.getFullYear() - 1);
                    break;
            }

            document.getElementById('startDate').value = startDate.toISOString().split('T')[0];
            document.getElementById('endDate').value = today.toISOString().split('T')[0];
        }

        function applyDateRange() {
            const startDate = document.getElementById('startDate').value;
            const endDate = document.getElementById('endDate').value;

            console.log('Applying date range:', startDate, 'to', endDate);
            // Implement date range filter logic
            // This would typically refresh the page or make API calls

            const modal = bootstrap.Modal.getInstance(document.getElementById('dateRangeModal'));
            modal.hide();
        }

        function exportPerformanceReport() {
            console.log('Exporting performance report');
            // Implement export functionality
            // This could generate PDF or Excel reports
        }
    </script>
@endsection
