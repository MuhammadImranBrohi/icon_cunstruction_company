@extends('cuns_manager.layouts.main')

@section('title', 'Site Reports - Construction Manager')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <!-- Page Header -->
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="fw-bold py-3 mb-0">
                        <span class="text-muted fw-light">Site Reports /</span> All Reports
                    </h4>
                    <div class="d-flex gap-2">
                        <button class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#reportFiltersModal">
                            <span class="material-icons-round me-2">filter_alt</span>
                            Filters
                        </button>
                        <button class="btn btn-primary" onclick="window.location.href='{{ route('site_reports.create') }}'">
                            <span class="material-icons-round me-2">add</span>
                            Create Report
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Reports Statistics -->
        <div class="row mb-4">
            <div class="col-xl-2 col-lg-4 col-md-4 col-6 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="card-info">
                            <h6 class="card-title text-muted mb-2">Total Reports</h6>
                            <h4 class="text-primary mb-0">{{ $stats['total_reports'] }}</h4>
                            <small class="text-muted">All Time</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-4 col-md-4 col-6 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="card-info">
                            <h6 class="card-title text-muted mb-2">This Week</h6>
                            <h4 class="text-info mb-0">{{ $stats['this_week'] }}</h4>
                            <small class="text-success">+{{ $stats['weekly_increase'] }}%</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-4 col-md-4 col-6 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="card-info">
                            <h6 class="card-title text-muted mb-2">Pending Review</h6>
                            <h4 class="text-warning mb-0">{{ $stats['pending_review'] }}</h4>
                            <small class="text-muted">Needs Attention</small>
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
                            <small class="text-muted">Completed</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-4 col-md-4 col-6 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="card-info">
                            <h6 class="card-title text-muted mb-2">With Issues</h6>
                            <h4 class="text-danger mb-0">{{ $stats['with_issues'] }}</h4>
                            <small class="text-muted">Requires Action</small>
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
                            <small class="text-muted">Site Condition</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-wrap gap-3">
                            <button class="btn btn-outline-primary d-flex align-items-center"
                                onclick="filterReports('all')">
                                <span class="material-icons-round me-2">description</span>
                                All Reports ({{ $stats['total_reports'] }})
                            </button>
                            <button class="btn btn-outline-warning d-flex align-items-center"
                                onclick="filterReports('pending')">
                                <span class="material-icons-round me-2">pending</span>
                                Pending ({{ $stats['pending_review'] }})
                            </button>
                            <button class="btn btn-outline-success d-flex align-items-center"
                                onclick="filterReports('approved')">
                                <span class="material-icons-round me-2">check_circle</span>
                                Approved ({{ $stats['approved'] }})
                            </button>
                            <button class="btn btn-outline-danger d-flex align-items-center"
                                onclick="filterReports('issues')">
                                <span class="material-icons-round me-2">warning</span>
                                With Issues ({{ $stats['with_issues'] }})
                            </button>
                            <div class="ms-auto d-flex gap-2">
                                <button class="btn btn-outline-secondary" onclick="exportReports()">
                                    <span class="material-icons-round me-2">download</span>
                                    Export
                                </button>
                                <div class="dropdown">
                                    <button class="btn btn-outline-secondary dropdown-toggle" type="button"
                                        data-bs-toggle="dropdown">
                                        <span class="material-icons-round me-2">view_list</span>
                                        View
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#" onclick="changeView('grid')">Grid
                                                View</a></li>
                                        <li><a class="dropdown-item" href="#" onclick="changeView('list')">List
                                                View</a></li>
                                        <li><a class="dropdown-item" href="#" onclick="changeView('table')">Table
                                                View</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Reports Grid View -->
        <div class="row" id="reportsGridView">
            @foreach ($reports as $report)
                <div class="col-xl-4 col-lg-6 col-12 mb-4">
                    <div class="card report-card h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <div>
                                    <h5 class="card-title mb-1">{{ $report['title'] }}</h5>
                                    <span class="badge bg-{{ $report['status_color'] }}">{{ $report['status'] }}</span>
                                </div>
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button"
                                        data-bs-toggle="dropdown">
                                        <span class="material-icons-round" style="font-size: 16px;">more_vert</span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item"
                                                href="{{ route('site_reports.view', $report['id']) }}">View Details</a>
                                        </li>
                                        <li><a class="dropdown-item"
                                                href="{{ route('site_reports.edit', $report['id']) }}">Edit Report</a>
                                        </li>
                                        <li><a class="dropdown-item" href="#"
                                                onclick="downloadReport({{ $report['id'] }})">Download PDF</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item text-danger" href="#"
                                                onclick="deleteReport({{ $report['id'] }})">Delete</a></li>
                                    </ul>
                                </div>
                            </div>

                            <p class="card-text text-muted mb-3">{{ Str::limit($report['summary'], 120) }}</p>

                            <div class="report-meta mb-3">
                                <div class="row g-2">
                                    <div class="col-6">
                                        <small class="text-muted">Project</small>
                                        <div class="fw-bold">{{ $report['project_name'] }}</div>
                                    </div>
                                    <div class="col-6">
                                        <small class="text-muted">Site</small>
                                        <div class="fw-bold">{{ $report['site_location'] }}</div>
                                    </div>
                                    <div class="col-6">
                                        <small class="text-muted">Report Date</small>
                                        <div class="fw-bold">{{ $report['report_date'] }}</div>
                                    </div>
                                    <div class="col-6">
                                        <small class="text-muted">Prepared By</small>
                                        <div class="fw-bold">{{ $report['prepared_by'] }}</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Report Ratings -->
                            <div class="report-ratings mb-3">
                                <div class="row text-center">
                                    <div class="col-4">
                                        <div class="rating-item">
                                            <small class="text-muted">Safety</small>
                                            <div class="d-flex justify-content-center">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    <span
                                                        class="material-icons-round {{ $i <= $report['safety_rating'] ? 'text-warning' : 'text-muted' }}"
                                                        style="font-size: 16px;">star</span>
                                                @endfor
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="rating-item">
                                            <small class="text-muted">Progress</small>
                                            <div class="d-flex justify-content-center">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    <span
                                                        class="material-icons-round {{ $i <= $report['progress_rating'] ? 'text-warning' : 'text-muted' }}"
                                                        style="font-size: 16px;">star</span>
                                                @endfor
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="rating-item">
                                            <small class="text-muted">Quality</small>
                                            <div class="d-flex justify-content-center">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    <span
                                                        class="material-icons-round {{ $i <= $report['quality_rating'] ? 'text-warning' : 'text-muted' }}"
                                                        style="font-size: 16px;">star</span>
                                                @endfor
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Issues & Attachments -->
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    @if ($report['critical_issues'] > 0)
                                        <span class="badge bg-danger me-1">{{ $report['critical_issues'] }}
                                            Critical</span>
                                    @endif
                                    @if ($report['attachments_count'] > 0)
                                        <span class="badge bg-info">
                                            <span class="material-icons-round me-1"
                                                style="font-size: 12px;">attachment</span>
                                            {{ $report['attachments_count'] }}
                                        </span>
                                    @endif
                                </div>
                                <a href="{{ route('site_reports.view', $report['id']) }}"
                                    class="btn btn-sm btn-primary">View Report</a>
                            </div>
                        </div>
                        <div class="card-footer bg-transparent">
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-muted">Created: {{ $report['created_at'] }}</small>
                                @if ($report['is_approved'])
                                    <small class="text-success">
                                        <span class="material-icons-round" style="font-size: 16px;">verified</span>
                                        Approved
                                    </small>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Reports Table View (Hidden by default) -->
        <div class="card d-none" id="reportsTableView">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">All Site Reports</h5>
                <div class="d-flex gap-2">
                    <div class="input-group input-group-merge" style="width: 300px;">
                        <span class="input-group-text">
                            <span class="material-icons-round">search</span>
                        </span>
                        <input type="text" class="form-control" placeholder="Search reports..." id="searchReports">
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="reportsTable">
                        <thead>
                            <tr>
                                <th>Report Title</th>
                                <th>Project</th>
                                <th>Site Location</th>
                                <th>Report Date</th>
                                <th>Prepared By</th>
                                <th>Status</th>
                                <th>Ratings</th>
                                <th>Issues</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reports as $report)
                                <tr class="report-row" data-status="{{ $report['status'] }}">
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar avatar-sm me-3">
                                                <span class="avatar-initial rounded-circle bg-label-primary">
                                                    <span class="material-icons-round"
                                                        style="font-size: 16px;">description</span>
                                                </span>
                                            </div>
                                            <div>
                                                <h6 class="mb-0">{{ $report['title'] }}</h6>
                                                <small class="text-muted">{{ Str::limit($report['summary'], 50) }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $report['project_name'] }}</td>
                                    <td>{{ $report['site_location'] }}</td>
                                    <td>
                                        <small class="text-muted">{{ $report['report_date'] }}</small>
                                    </td>
                                    <td>{{ $report['prepared_by'] }}</td>
                                    <td>
                                        <span
                                            class="badge bg-{{ $report['status_color'] }}">{{ $report['status'] }}</span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="material-icons-round text-warning me-1"
                                                style="font-size: 14px;">star</span>
                                            <small>{{ $report['overall_rating'] }}/5</small>
                                        </div>
                                    </td>
                                    <td>
                                        @if ($report['critical_issues'] > 0)
                                            <span class="badge bg-danger">{{ $report['critical_issues'] }} Critical</span>
                                        @else
                                            <span class="badge bg-success">No Issues</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex gap-1">
                                            <button class="btn btn-sm btn-outline-primary"
                                                onclick="window.location.href='{{ route('site_reports.view', $report['id']) }}'">
                                                <span class="material-icons-round"
                                                    style="font-size: 16px;">visibility</span>
                                            </button>
                                            <button class="btn btn-sm btn-outline-secondary"
                                                onclick="window.location.href='{{ route('site_reports.edit', $report['id']) }}'">
                                                <span class="material-icons-round" style="font-size: 16px;">edit</span>
                                            </button>
                                            <button class="btn btn-sm btn-outline-info"
                                                onclick="downloadReport({{ $report['id'] }})">
                                                <span class="material-icons-round"
                                                    style="font-size: 16px;">download</span>
                                            </button>
                                            <button class="btn btn-sm btn-outline-danger"
                                                onclick="deleteReport({{ $report['id'] }})">
                                                <span class="material-icons-round" style="font-size: 16px;">delete</span>
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

        <!-- Pagination -->
        @if ($reports->hasPages())
            <div class="row mt-4">
                <div class="col-12">
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center">
                            {{ $reports->links() }}
                        </ul>
                    </nav>
                </div>
            </div>
        @endif

    </div>

    <!-- Report Filters Modal -->
    <div class="modal fade" id="reportFiltersModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Filter Reports</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="reportFiltersForm">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="filterProject" class="form-label">Project</label>
                                <select class="form-select" id="filterProject">
                                    <option value="">All Projects</option>
                                    @foreach ($projects as $project)
                                        <option value="{{ $project['id'] }}">{{ $project['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="filterStatus" class="form-label">Status</label>
                                <select class="form-select" id="filterStatus">
                                    <option value="">All Status</option>
                                    <option value="draft">Draft</option>
                                    <option value="submitted">Submitted</option>
                                    <option value="under_review">Under Review</option>
                                    <option value="approved">Approved</option>
                                    <option value="rejected">Rejected</option>
                                    <option value="with_issues">With Issues</option>
                                </select>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="filterDateRange" class="form-label">Date Range</label>
                                <select class="form-select" id="filterDateRange">
                                    <option value="">All Time</option>
                                    <option value="today">Today</option>
                                    <option value="this_week">This Week</option>
                                    <option value="this_month">This Month</option>
                                    <option value="this_quarter">This Quarter</option>
                                    <option value="custom">Custom Range</option>
                                </select>
                            </div>
                            <div class="col-12 mb-3 d-none" id="customDateRange">
                                <div class="row">
                                    <div class="col-6">
                                        <label for="filterStartDate" class="form-label">Start Date</label>
                                        <input type="date" class="form-control" id="filterStartDate">
                                    </div>
                                    <div class="col-6">
                                        <label for="filterEndDate" class="form-label">End Date</label>
                                        <input type="date" class="form-control" id="filterEndDate">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="filterPreparedBy" class="form-label">Prepared By</label>
                                <select class="form-select" id="filterPreparedBy">
                                    <option value="">All Users</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user['id'] }}">{{ $user['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label">Minimum Rating</label>
                                <div class="d-flex align-items-center">
                                    <input type="range" class="form-range flex-grow-1 me-3" id="filterMinRating"
                                        min="1" max="5" step="1" value="1">
                                    <span id="minRatingValue" class="fw-bold">1 Star</span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" onclick="resetFilters()">Reset</button>
                    <button type="button" class="btn btn-primary" onclick="applyFilters()">Apply Filters</button>
                </div>
            </div>
        </div>
    </div>

    <style>
        .report-card {
            transition: all 0.3s ease;
            border: 1px solid #e2e8f0;
        }

        .report-card:hover {
            border-color: #3b82f6;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transform: translateY(-2px);
        }

        .rating-item {
            padding: 5px 0;
        }

        .avatar-initial {
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .bg-label-primary {
            background: #eff6ff;
            color: #3b82f6;
        }

        .report-row:hover {
            background-color: #f8f9fa;
        }

        .report-meta .row {
            margin: 0 -5px;
        }

        .report-meta .col-6 {
            padding: 0 5px;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
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

            // Rating filter slider
            const ratingSlider = document.getElementById('filterMinRating');
            const ratingValue = document.getElementById('minRatingValue');

            if (ratingSlider) {
                ratingSlider.addEventListener('input', function() {
                    ratingValue.textContent = this.value + ' Star' + (this.value > 1 ? 's' : '');
                });
            }

            // Custom date range toggle
            const dateRangeSelect = document.getElementById('filterDateRange');
            const customDateRange = document.getElementById('customDateRange');

            if (dateRangeSelect) {
                dateRangeSelect.addEventListener('change', function() {
                    if (this.value === 'custom') {
                        customDateRange.classList.remove('d-none');
                    } else {
                        customDateRange.classList.add('d-none');
                    }
                });
            }
        });

        function filterReports(status) {
            const rows = document.querySelectorAll('.report-row');
            const filterButtons = document.querySelectorAll('.btn-outline-primary');

            // Update active button
            filterButtons.forEach(btn => btn.classList.remove('active'));
            event.target.classList.add('active');

            rows.forEach(row => {
                if (status === 'all') {
                    row.style.display = '';
                } else {
                    row.style.display = row.dataset.status === status ? '' : 'none';
                }
            });
        }

        function changeView(viewType) {
            const gridView = document.getElementById('reportsGridView');
            const tableView = document.getElementById('reportsTableView');

            if (viewType === 'grid') {
                gridView.classList.remove('d-none');
                tableView.classList.add('d-none');
            } else if (viewType === 'table') {
                gridView.classList.add('d-none');
                tableView.classList.remove('d-none');
            }
        }

        function applyFilters() {
            const project = document.getElementById('filterProject').value;
            const status = document.getElementById('filterStatus').value;
            const dateRange = document.getElementById('filterDateRange').value;
            const preparedBy = document.getElementById('filterPreparedBy').value;
            const minRating = document.getElementById('filterMinRating').value;

            console.log('Applying filters:', {
                project,
                status,
                dateRange,
                preparedBy,
                minRating
            });
            // Implement actual filter logic here

            const modal = bootstrap.Modal.getInstance(document.getElementById('reportFiltersModal'));
            modal.hide();
        }

        function resetFilters() {
            document.getElementById('filterProject').value = '';
            document.getElementById('filterStatus').value = '';
            document.getElementById('filterDateRange').value = '';
            document.getElementById('filterPreparedBy').value = '';
            document.getElementById('filterMinRating').value = '1';
            document.getElementById('minRatingValue').textContent = '1 Star';
            document.getElementById('customDateRange').classList.add('d-none');
        }

        function downloadReport(reportId) {
            console.log('Downloading report:', reportId);
            // Implement download functionality
            // window.location.href = `/site_reports/${reportId}/download`;
        }

        function deleteReport(reportId) {
            if (confirm('Are you sure you want to delete this site report? This action cannot be undone.')) {
                console.log('Deleting report:', reportId);
                // Implement delete API call
                // fetch(`/site_reports/${reportId}`, { method: 'DELETE' })
                // .then(response => response.json())
                // .then(data => {
                //     if (data.success) {
                //         location.reload();
                //     }
                // });
            }
        }

        function exportReports() {
            console.log('Exporting reports data');
            // Implement export functionality
        }
    </script>
@endsection
