@extends('cuns_manager.layouts.main')

@section('title', 'Performance Details - Construction Manager')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <!-- Page Header -->
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h4 class="fw-bold py-3 mb-0">
                            <span class="text-muted fw-light">Performance /</span> Detailed Analytics
                        </h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('performance.index') }}">Performance</a></li>
                                <li class="breadcrumb-item active">Detailed View</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="d-flex gap-2">
                        <button class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#exportModal">
                            <span class="material-icons-round me-2">download</span>
                            Export
                        </button>
                        <button class="btn btn-outline-primary" onclick="window.print()">
                            <span class="material-icons-round me-2">print</span>
                            Print
                        </button>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#compareModal">
                            <span class="material-icons-round me-2">compare</span>
                            Compare
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Performance Overview -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <h2 class="card-title mb-2">Performance Analytics</h2>
                                <p class="card-text text-muted mb-3">
                                    Comprehensive performance analysis for {{ $dateRange['start'] }} to
                                    {{ $dateRange['end'] }}
                                </p>
                                <div class="d-flex flex-wrap gap-3">
                                    <div class="performance-badge">
                                        <span
                                            class="badge bg-{{ $overallScore >= 80 ? 'success' : ($overallScore >= 60 ? 'warning' : 'danger') }} fs-6">
                                            Overall Score: {{ $overallScore }}/100
                                        </span>
                                    </div>
                                    <div class="performance-meta">
                                        <span class="text-muted">
                                            <span class="material-icons-round me-1"
                                                style="font-size: 16px;">trending_up</span>
                                            {{ $improvement }}% improvement
                                        </span>
                                    </div>
                                    <div class="performance-meta">
                                        <span class="text-muted">
                                            <span class="material-icons-round me-1"
                                                style="font-size: 16px;">assessment</span>
                                            {{ $totalMetrics }} metrics tracked
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 text-md-end">
                                <div class="performance-summary">
                                    <div class="row text-center">
                                        <div class="col-4">
                                            <div class="summary-item">
                                                <h4 class="text-primary mb-0">{{ $projectsCount }}</h4>
                                                <small class="text-muted">Projects</small>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="summary-item">
                                                <h4 class="text-success mb-0">{{ $teamMembersCount }}</h4>
                                                <small class="text-muted">Team Members</small>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="summary-item">
                                                <h4 class="text-info mb-0">{{ $tasksCount }}</h4>
                                                <small class="text-muted">Tasks</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Key Performance Indicators -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Key Performance Indicators (KPIs)</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach ($kpis as $kpi)
                                <div class="col-xl-3 col-lg-4 col-md-6 col-12 mb-4">
                                    <div class="kpi-card border rounded p-3">
                                        <div class="d-flex justify-content-between align-items-start mb-3">
                                            <div class="kpi-icon">
                                                <span
                                                    class="material-icons-round {{ $kpi['icon_color'] }} p-2 rounded-circle"
                                                    style="background: {{ $kpi['bg_color'] }};">
                                                    {{ $kpi['icon'] }}
                                                </span>
                                            </div>
                                            <div class="kpi-trend">
                                                <span class="badge bg-{{ $kpi['trend_color'] }}">
                                                    <span class="material-icons-round me-1" style="font-size: 14px;">
                                                        {{ $kpi['trend_icon'] }}
                                                    </span>
                                                    {{ $kpi['trend'] }}%
                                                </span>
                                            </div>
                                        </div>
                                        <h6 class="kpi-title mb-2">{{ $kpi['title'] }}</h6>
                                        <div class="kpi-value mb-2">
                                            <h3 class="text-{{ $kpi['value_color'] }} mb-0">{{ $kpi['value'] }}</h3>
                                            <small class="text-muted">{{ $kpi['unit'] }}</small>
                                        </div>
                                        <div class="kpi-progress">
                                            <div class="d-flex justify-content-between align-items-center mb-1">
                                                <small class="text-muted">Target: {{ $kpi['target'] }}</small>
                                                <small class="fw-bold">{{ $kpi['achievement'] }}%</small>
                                            </div>
                                            <div class="progress" style="height: 6px;">
                                                <div class="progress-bar bg-{{ $kpi['progress_color'] }}"
                                                    style="width: {{ $kpi['achievement'] }}%"></div>
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

        <!-- Performance Charts -->
        <div class="row mb-4">
            <!-- Performance Trends -->
            <div class="col-lg-8 col-12 mb-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Performance Trends</h5>
                        <div class="dropdown">
                            <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button"
                                data-bs-toggle="dropdown">
                                Last 30 Days
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#" onclick="changeTrendPeriod('week')">Last 7
                                        Days</a></li>
                                <li><a class="dropdown-item" href="#" onclick="changeTrendPeriod('month')">Last 30
                                        Days</a></li>
                                <li><a class="dropdown-item" href="#" onclick="changeTrendPeriod('quarter')">Last 3
                                        Months</a></li>
                                <li><a class="dropdown-item" href="#" onclick="changeTrendPeriod('year')">Last 1
                                        Year</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <canvas id="performanceTrendChart" height="300"></canvas>
                    </div>
                </div>
            </div>

            <!-- Performance Distribution -->
            <div class="col-lg-4 col-12 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Performance Distribution</h5>
                    </div>
                    <div class="card-body">
                        <canvas id="performanceDistributionChart" height="300"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Project Performance -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Project Performance</h5>
                        <div class="d-flex gap-2">
                            <div class="input-group input-group-merge" style="width: 300px;">
                                <span class="input-group-text">
                                    <span class="material-icons-round">search</span>
                                </span>
                                <input type="text" class="form-control" placeholder="Search projects..."
                                    id="searchProjects">
                            </div>
                            <button class="btn btn-outline-secondary" onclick="exportProjectPerformance()">
                                <span class="material-icons-round me-2">download</span>
                                Export
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover" id="projectPerformanceTable">
                                <thead>
                                    <tr>
                                        <th>Project</th>
                                        <th>Progress</th>
                                        <th>Timeline Adherence</th>
                                        <th>Budget Performance</th>
                                        <th>Quality Score</th>
                                        <th>Safety Rating</th>
                                        <th>Overall Score</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($projectPerformance as $project)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar avatar-sm me-3">
                                                        <span class="avatar-initial rounded-circle bg-label-primary">
                                                            <span class="material-icons-round"
                                                                style="font-size: 16px;">construction</span>
                                                        </span>
                                                    </div>
                                                    <div>
                                                        <h6 class="mb-0">{{ $project['name'] }}</h6>
                                                        <small class="text-muted">{{ $project['client'] }}</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="progress flex-grow-1 me-2" style="height: 6px;">
                                                        <div class="progress-bar bg-{{ $project['progress_color'] }}"
                                                            style="width: {{ $project['progress'] }}%"></div>
                                                    </div>
                                                    <small>{{ $project['progress'] }}%</small>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span
                                                        class="material-icons-round text-{{ $project['timeline_color'] }} me-1"
                                                        style="font-size: 16px;">
                                                        schedule
                                                    </span>
                                                    <span>{{ $project['timeline_adherence'] }}%</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span
                                                        class="material-icons-round text-{{ $project['budget_color'] }} me-1"
                                                        style="font-size: 16px;">
                                                        attach_money
                                                    </span>
                                                    <span>{{ $project['budget_performance'] }}%</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        <span
                                                            class="material-icons-round {{ $i <= $project['quality_score'] ? 'text-warning' : 'text-muted' }}"
                                                            style="font-size: 14px;">star</span>
                                                    @endfor
                                                    <small class="ms-1">{{ $project['quality_score'] }}/5</small>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        <span
                                                            class="material-icons-round {{ $i <= $project['safety_rating'] ? 'text-success' : 'text-muted' }}"
                                                            style="font-size: 14px;">security</span>
                                                    @endfor
                                                    <small class="ms-1">{{ $project['safety_rating'] }}/5</small>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="text-center">
                                                    <div class="score-circle"
                                                        data-score="{{ $project['overall_score'] }}">
                                                        <span class="score-value">{{ $project['overall_score'] }}</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span
                                                    class="badge bg-{{ $project['status_color'] }}">{{ $project['status'] }}</span>
                                            </td>
                                            <td>
                                                <div class="d-flex gap-1">
                                                    <button class="btn btn-sm btn-outline-primary"
                                                        onclick="viewProjectDetails({{ $project['id'] }})">
                                                        <span class="material-icons-round"
                                                            style="font-size: 16px;">visibility</span>
                                                    </button>
                                                    <button class="btn btn-sm btn-outline-info"
                                                        onclick="analyzeProjectPerformance({{ $project['id'] }})">
                                                        <span class="material-icons-round"
                                                            style="font-size: 16px;">analytics</span>
                                                    </button>
                                                    <button class="btn btn-sm btn-outline-success"
                                                        onclick="generateProjectReport({{ $project['id'] }})">
                                                        <span class="material-icons-round"
                                                            style="font-size: 16px;">summarize</span>
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

        <!-- Team Performance -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Team Performance</h5>
                        <div class="d-flex gap-2">
                            <div class="input-group input-group-merge" style="width: 300px;">
                                <span class="input-group-text">
                                    <span class="material-icons-round">search</span>
                                </span>
                                <input type="text" class="form-control" placeholder="Search team members..."
                                    id="searchTeam">
                            </div>
                            <button class="btn btn-outline-primary" onclick="viewTeamAnalytics()">
                                <span class="material-icons-round me-2">groups</span>
                                Team Analytics
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach ($teamPerformance as $member)
                                <div class="col-xl-3 col-lg-4 col-md-6 col-12 mb-4">
                                    <div class="team-member-card border rounded p-3">
                                        <div class="d-flex align-items-start mb-3">
                                            <div class="avatar avatar-lg me-3">
                                                <img src="{{ $member['avatar'] }}" alt="Avatar"
                                                    class="rounded-circle">
                                                <span class="avatar-badge bg-{{ $member['performance_badge_color'] }}">
                                                    {{ $member['rank'] }}
                                                </span>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="mb-1">{{ $member['name'] }}</h6>
                                                <p class="text-muted mb-1">{{ $member['role'] }}</p>
                                                <div class="d-flex align-items-center">
                                                    <span class="material-icons-round text-warning me-1"
                                                        style="font-size: 14px;">star</span>
                                                    <small class="me-2">Score:
                                                        {{ $member['performance_score'] }}/100</small>
                                                    <span class="material-icons-round text-{{ $member['trend_color'] }}"
                                                        style="font-size: 14px;">
                                                        {{ $member['trend_icon'] }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="performance-metrics">
                                            <div class="row text-center">
                                                <div class="col-4">
                                                    <div class="metric-item">
                                                        <h6 class="mb-0 text-primary">{{ $member['tasks_completed'] }}
                                                        </h6>
                                                        <small class="text-muted">Tasks</small>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="metric-item">
                                                        <h6 class="mb-0 text-success">{{ $member['completion_rate'] }}%
                                                        </h6>
                                                        <small class="text-muted">Rate</small>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="metric-item">
                                                        <h6 class="mb-0 text-info">{{ $member['quality_score'] }}/5</h6>
                                                        <small class="text-muted">Quality</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mt-3">
                                            <div class="d-flex justify-content-between align-items-center mb-1">
                                                <small class="text-muted">Performance</small>
                                                <small class="fw-bold">{{ $member['performance_score'] }}%</small>
                                            </div>
                                            <div class="progress" style="height: 6px;">
                                                <div class="progress-bar bg-{{ $member['performance_color'] }}"
                                                    style="width: {{ $member['performance_score'] }}%"></div>
                                            </div>
                                        </div>

                                        <div class="mt-3">
                                            <button class="btn btn-sm btn-outline-primary w-100"
                                                onclick="viewMemberPerformance({{ $member['id'] }})">
                                                View Details
                                            </button>
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
                            @foreach ($performanceInsights as $insight)
                                <div class="insight-item d-flex align-items-start mb-3 p-3 border rounded">
                                    <span class="material-icons-round {{ $insight['icon_color'] }} me-3 mt-1">
                                        {{ $insight['icon'] }}
                                    </span>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-1">{{ $insight['title'] }}</h6>
                                        <p class="mb-2 text-muted">{{ $insight['description'] }}</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <small class="text-muted">{{ $insight['category'] }}</small>
                                            <small
                                                class="text-{{ $insight['impact_color'] }}">{{ $insight['impact'] }}</small>
                                        </div>
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
                        <h5 class="card-title mb-0">Recommendations</h5>
                    </div>
                    <div class="card-body">
                        <div class="recommendations-list">
                            @foreach ($recommendations as $recommendation)
                                <div class="recommendation-item d-flex align-items-start mb-3 p-3 border rounded">
                                    <span class="material-icons-round text-primary me-3 mt-1">lightbulb</span>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-1">{{ $recommendation['title'] }}</h6>
                                        <p class="mb-2 text-muted">{{ $recommendation['description'] }}</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span
                                                class="badge bg-{{ $recommendation['priority_color'] }}">{{ $recommendation['priority'] }}</span>
                                            <small class="text-muted">Expected improvement:
                                                {{ $recommendation['improvement'] }}%</small>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="card mt-4">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Quick Actions</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-grid gap-2">
                            <button class="btn btn-outline-primary d-flex align-items-center justify-content-center py-2"
                                onclick="schedulePerformanceReview()">
                                <span class="material-icons-round me-2">event</span>
                                Schedule Review
                            </button>
                            <button class="btn btn-outline-success d-flex align-items-center justify-content-center py-2"
                                onclick="generatePerformanceReport()">
                                <span class="material-icons-round me-2">summarize</span>
                                Generate Report
                            </button>
                            <button class="btn btn-outline-warning d-flex align-items-center justify-content-center py-2"
                                onclick="setPerformanceGoals()">
                                <span class="material-icons-round me-2">flag</span>
                                Set Goals
                            </button>
                            <button class="btn btn-outline-info d-flex align-items-center justify-content-center py-2"
                                onclick="sharePerformanceData()">
                                <span class="material-icons-round me-2">share</span>
                                Share Insights
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Export Modal -->
    <div class="modal fade" id="exportModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Export Performance Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exportFormat" class="form-label">Export Format</label>
                        <select class="form-select" id="exportFormat">
                            <option value="pdf">PDF Document</option>
                            <option value="excel">Excel Spreadsheet</option>
                            <option value="csv">CSV File</option>
                            <option value="json">JSON Data</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exportRange" class="form-label">Date Range</label>
                        <select class="form-select" id="exportRange">
                            <option value="current">Current View</option>
                            <option value="last_week">Last Week</option>
                            <option value="last_month">Last Month</option>
                            <option value="last_quarter">Last Quarter</option>
                            <option value="custom">Custom Range</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Include Sections</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="includeKpis" checked>
                            <label class="form-check-label" for="includeKpis">Key Performance Indicators</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="includeProjects" checked>
                            <label class="form-check-label" for="includeProjects">Project Performance</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="includeTeam" checked>
                            <label class="form-check-label" for="includeTeam">Team Performance</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="includeInsights" checked>
                            <label class="form-check-label" for="includeInsights">Insights & Recommendations</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="exportPerformanceData()">Export</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Compare Modal -->
    <div class="modal fade" id="compareModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Compare Performance</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="comparePeriod1" class="form-label">First Period</label>
                            <select class="form-select" id="comparePeriod1">
                                <option value="last_week">Last Week</option>
                                <option value="last_month" selected>Last Month</option>
                                <option value="last_quarter">Last Quarter</option>
                                <option value="custom1">Custom Period</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="comparePeriod2" class="form-label">Second Period</label>
                            <select class="form-select" id="comparePeriod2">
                                <option value="current_week">Current Week</option>
                                <option value="current_month" selected>Current Month</option>
                                <option value="current_quarter">Current Quarter</option>
                                <option value="custom2">Custom Period</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Comparison Metrics</label>
                        <div class="row">
                            @foreach ($comparisonMetrics as $metric)
                                <div class="col-md-6 mb-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="metric{{ $loop->index }}"
                                            checked>
                                        <label class="form-check-label"
                                            for="metric{{ $loop->index }}">{{ $metric }}</label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="generateComparison()">Generate
                        Comparison</button>
                </div>
            </div>
        </div>
    </div>

    <style>
        .kpi-card {
            transition: all 0.3s ease;
            background: white;
        }

        .kpi-card:hover {
            border-color: #3b82f6 !important;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            transform: translateY(-2px);
        }

        .team-member-card {
            transition: all 0.3s ease;
            background: white;
        }

        .team-member-card:hover {
            border-color: #3b82f6 !important;
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

        .score-circle {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 12px;
            margin: 0 auto;
        }

        .score-circle[data-score="90"] {
            background: #dcfce7;
            color: #166534;
        }

        .score-circle[data-score="80"] {
            background: #bbf7d0;
            color: #15803d;
        }

        .score-circle[data-score="70"] {
            background: #fef3c7;
            color: #92400e;
        }

        .score-circle[data-score="60"] {
            background: #fed7aa;
            color: #9a3412;
        }

        .score-circle[data-score*="5"] {
            background: #fecaca;
            color: #991b1b;
        }

        .insight-item,
        .recommendation-item {
            transition: all 0.3s ease;
        }

        .insight-item:hover,
        .recommendation-item:hover {
            border-color: #3b82f6 !important;
            background-color: #f8f9fa;
        }

        .metric-item {
            padding: 5px 0;
        }

        @media print {

            .btn,
            .card-header .material-icons-round {
                display: none !important;
            }

            .card {
                border: 1px solid #000 !important;
                break-inside: avoid;
            }
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize charts
            initializePerformanceCharts();

            // Search functionality
            initializeSearch();
        });

        function initializePerformanceCharts() {
            // Performance Trends Chart
            const trendCtx = document.getElementById('performanceTrendChart').getContext('2d');
            new Chart(trendCtx, {
                type: 'line',
                data: {
                    labels: {!! json_encode($trendData['dates']) !!},
                    datasets: [{
                        label: 'Overall Performance',
                        data: {!! json_encode($trendData['scores']) !!},
                        borderColor: '#3b82f6',
                        backgroundColor: 'rgba(59, 130, 246, 0.1)',
                        tension: 0.4,
                        fill: true
                    }, {
                        label: 'Target',
                        data: {!! json_encode($trendData['targets']) !!},
                        borderColor: '#10b981',
                        borderDash: [5, 5],
                        backgroundColor: 'transparent',
                        tension: 0.4
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            min: 0,
                            max: 100,
                            title: {
                                display: true,
                                text: 'Performance Score'
                            }
                        }
                    }
                }
            });

            // Performance Distribution Chart
            const distributionCtx = document.getElementById('performanceDistributionChart').getContext('2d');
            new Chart(distributionCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Excellent (90-100)', 'Good (80-89)', 'Average (70-79)', 'Needs Improvement (60-69)',
                        'Poor (<60)'
                    ],
                    datasets: [{
                        data: {!! json_encode($distributionData) !!},
                        backgroundColor: [
                            '#10b981', '#3b82f6', '#f59e0b', '#f97316', '#ef4444'
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

        function initializeSearch() {
            // Project search
            const projectSearch = document.getElementById('searchProjects');
            if (projectSearch) {
                projectSearch.addEventListener('input', function() {
                    const searchTerm = this.value.toLowerCase();
                    const rows = document.querySelectorAll('#projectPerformanceTable tbody tr');

                    rows.forEach(row => {
                        const text = row.textContent.toLowerCase();
                        row.style.display = text.includes(searchTerm) ? '' : 'none';
                    });
                });
            }

            // Team search
            const teamSearch = document.getElementById('searchTeam');
            if (teamSearch) {
                teamSearch.addEventListener('input', function() {
                    const searchTerm = this.value.toLowerCase();
                    const cards = document.querySelectorAll('.team-member-card');

                    cards.forEach(card => {
                        const text = card.textContent.toLowerCase();
                        card.parentElement.style.display = text.includes(searchTerm) ? '' : 'none';
                    });
                });
            }
        }

        function changeTrendPeriod(period) {
            console.log('Changing trend period to:', period);
            // Implement period change logic
            showToast(`Trend period updated to ${period}`, 'info');
        }

        function viewProjectDetails(projectId) {
            console.log('Viewing project details:', projectId);
            window.location.href = `/projects/${projectId}`;
        }

        function analyzeProjectPerformance(projectId) {
            console.log('Analyzing project performance:', projectId);
            window.location.href = `/performance/project/${projectId}`;
        }

        function generateProjectReport(projectId) {
            console.log('Generating project report:', projectId);
            // Implement report generation
            showToast('Project performance report generated!', 'success');
        }

        function viewMemberPerformance(memberId) {
            console.log('Viewing member performance:', memberId);
            window.location.href = `/performance/team/${memberId}`;
        }

        function viewTeamAnalytics() {
            console.log('Viewing team analytics');
            window.location.href = '/performance/team';
        }

        function exportProjectPerformance() {
            console.log('Exporting project performance data');
            // Implement export functionality
            showToast('Project performance data exported!', 'success');
        }

        function exportPerformanceData() {
            const format = document.getElementById('exportFormat').value;
            const range = document.getElementById('exportRange').value;

            console.log('Exporting performance data:', {
                format,
                range
            });
            // Implement export functionality

            const modal = bootstrap.Modal.getInstance(document.getElementById('exportModal'));
            modal.hide();

            showToast('Performance data export started!', 'success');
        }

        function generateComparison() {
            const period1 = document.getElementById('comparePeriod1').value;
            const period2 = document.getElementById('comparePeriod2').value;

            console.log('Generating comparison:', {
                period1,
                period2
            });
            // Implement comparison functionality

            const modal = bootstrap.Modal.getInstance(document.getElementById('compareModal'));
            modal.hide();

            showToast('Performance comparison generated!', 'success');
        }

        function schedulePerformanceReview() {
            console.log('Scheduling performance review');
            // Implement scheduling functionality
            showToast('Performance review scheduled!', 'success');
        }

        function generatePerformanceReport() {
            console.log('Generating performance report');
            window.location.href = '/reports/performance/generate';
        }

        function setPerformanceGoals() {
            console.log('Setting performance goals');
            window.location.href = '/performance/goals';
        }

        function sharePerformanceData() {
            console.log('Sharing performance data');
            // Implement sharing functionality
            showToast('Performance insights shared!', 'success');
        }

        function showToast(message, type = 'success') {
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

        // Auto-refresh data every 2 minutes
        setInterval(() => {
            console.log('Auto-refreshing performance data...');
            // Implement data refresh
        }, 120000);
    </script>
@endsection
