@extends('cuns_manager.layouts.main')

@section('title', 'Construction Manager Dashboard')

@section('content')
    <div class="container-xxl py-4">

        <!-- Header -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="d-flex align-items-center justify-content-between p-3 rounded-3 bg-light shadow-sm">
                    <div>
                        <h3 class="mb-1 fw-bold text-primary">Construction Manager Dashboard</h3>
                        <small class="text-muted">Track projects, staff, and budget in real-time</small>
                    </div>
                    <div class="d-flex gap-2">
                        <a href="{{ route('cuns_manager.projects.create') }}" class="btn btn-primary">
                            <i class="material-icons-round me-1">add</i> New Project
                        </a>
                        <a href="{{ route('cuns_manager.reports.daily') }}" class="btn btn-outline-secondary">
                            <i class="material-icons-round me-1">assessment</i> Reports
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistic Cards -->
        <div class="row g-3 mb-4">
            <div class="col-lg-3 col-sm-6">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-muted">Total Projects</h6>
                                <h4 class="fw-bold text-primary">{{ $projectsCount }}</h4>
                                <small class="text-success">+12% from last month</small>
                            </div>
                            <span class="material-icons-round text-primary fs-1">business</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-muted">Ongoing Projects</h6>
                                <h4 class="fw-bold text-warning">{{ $ongoingProjects }}</h4>
                                <small class="text-muted">Currently active</small>
                            </div>
                            <span class="material-icons-round text-warning fs-1">construction</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-muted">Total Staff</h6>
                                <h4 class="fw-bold text-success">{{ $staffCount }}</h4>
                                <small class="text-success">{{ $staffCount - 3 }} Active</small>
                            </div>
                            <span class="material-icons-round text-success fs-1">groups</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-muted">Budget Utilization</h6>
                                <h4 class="fw-bold text-info">{{ $budgetUtilization }}%</h4>
                                <small class="text-muted">of total budget</small>
                            </div>
                            <span class="material-icons-round text-info fs-1">pie_chart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts Section -->
        <div class="row mb-4">
            <div class="col-lg-8">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-white fw-bold">Project Progress Overview</div>
                    <div class="card-body">
                        <canvas id="barChart" height="130"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-white fw-bold">Budget Utilization</div>
                    <div class="card-body text-center">
                        <canvas id="pieChart" height="210"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Activities -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white fw-bold">Recent Activities</div>
                    <div class="card-body">
                        @foreach ($recentActivities as $activity)
                            <div class="d-flex align-items-start mb-3 pb-2 border-bottom">
                                <div class="rounded-circle bg-light d-flex align-items-center justify-content-center me-3"
                                    style="width:45px;height:45px;">
                                    <span class="material-icons-round text-primary">notifications</span>
                                </div>
                                <div>
                                    <h6 class="mb-1 fw-semibold">{{ $activity['title'] }}</h6>
                                    <p class="mb-1 text-muted">{{ $activity['project'] }}</p>
                                    <small class="text-muted">{{ $activity['time'] }}</small>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const barCtx = document.getElementById('barChart').getContext('2d');
        const barChart = new Chart(barCtx, {
            type: 'bar',
            data: {
                labels: {!! json_encode(array_column($projectProgress, 'name')) !!},
                datasets: [{
                    label: 'Completion %',
                    data: {!! json_encode(array_column($projectProgress, 'progress')) !!},
                    backgroundColor: ['#3b82f6', '#22c55e', '#facc15', '#06b6d4'],
                    borderRadius: 5
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 100
                    }
                }
            }
        });

        const pieCtx = document.getElementById('pieChart').getContext('2d');
        const pieChart = new Chart(pieCtx, {
            type: 'pie',
            data: {
                labels: ['Used Budget', 'Remaining Budget'],
                datasets: [{
                    data: [{{ $budgetUtilization }}, {{ 100 - $budgetUtilization }}],
                    backgroundColor: ['#facc15', '#e2e8f0'],
                }]
            },
            options: {
                responsive: true
            }
        });
    </script>
@endsection
