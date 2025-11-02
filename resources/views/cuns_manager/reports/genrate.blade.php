@extends('cuns_manager.layouts.main')

@section('title', 'Generate Report - Construction Manager')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <!-- Page Header -->
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="fw-bold py-3 mb-0">
                        <span class="text-muted fw-light">Reports /</span> Generate New Report
                    </h4>
                    <button class="btn btn-outline-secondary" onclick="window.location.href='{{ route('reports.index') }}'">
                        <span class="material-icons-round me-2">arrow_back</span>
                        Back to Reports
                    </button>
                </div>
            </div>
        </div>

        <!-- Report Generation Form -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Report Configuration</h5>
                    </div>
                    <div class="card-body">
                        <form id="generateReportForm" action="{{ route('reports.store') }}" method="POST">
                            @csrf

                            <!-- Report Basic Information -->
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h6 class="mb-3 text-primary">Basic Information</h6>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="reportName" class="form-label">Report Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="reportName" name="name"
                                        placeholder="Enter report name" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="reportType" class="form-label">Report Type <span
                                            class="text-danger">*</span></label>
                                    <select class="form-select" id="reportType" name="type" required
                                        onchange="updateReportConfig()">
                                        <option value="">Select Report Type</option>
                                        <option value="daily_progress">Daily Progress Report</option>
                                        <option value="weekly_summary">Weekly Summary Report</option>
                                        <option value="monthly_overview">Monthly Overview</option>
                                        <option value="financial_analysis">Financial Analysis</option>
                                        <option value="attendance_summary">Attendance Summary</option>
                                        <option value="materials_inventory">Materials Inventory</option>
                                        <option value="safety_compliance">Safety Compliance</option>
                                        <option value="project_performance">Project Performance</option>
                                        <option value="task_progress">Task Progress</option>
                                        <option value="quality_audit">Quality Audit</option>
                                        <option value="custom">Custom Report</option>
                                    </select>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="reportDescription" class="form-label">Description</label>
                                    <textarea class="form-control" id="reportDescription" name="description" rows="2"
                                        placeholder="Brief description of the report..."></textarea>
                                </div>
                            </div>

                            <!-- Date Range Selection -->
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h6 class="mb-3 text-primary">Date Range</h6>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="dateRangeType" class="form-label">Date Range Type</label>
                                    <select class="form-select" id="dateRangeType" name="date_range_type"
                                        onchange="toggleDateRange()">
                                        <option value="custom">Custom Range</option>
                                        <option value="today">Today</option>
                                        <option value="yesterday">Yesterday</option>
                                        <option value="this_week">This Week</option>
                                        <option value="last_week">Last Week</option>
                                        <option value="this_month">This Month</option>
                                        <option value="last_month">Last Month</option>
                                        <option value="this_quarter">This Quarter</option>
                                        <option value="last_quarter">Last Quarter</option>
                                        <option value="this_year">This Year</option>
                                        <option value="all_time">All Time</option>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-3" id="startDateGroup">
                                    <label for="startDate" class="form-label">Start Date <span
                                            class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="startDate" name="start_date"
                                        value="{{ date('Y-m-d', strtotime('-7 days')) }}">
                                </div>
                                <div class="col-md-3 mb-3" id="endDateGroup">
                                    <label for="endDate" class="form-label">End Date <span
                                            class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="endDate" name="end_date"
                                        value="{{ date('Y-m-d') }}">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">Quick Actions</label>
                                    <div class="d-grid">
                                        <button type="button" class="btn btn-outline-secondary"
                                            onclick="setLast30Days()">
                                            Last 30 Days
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Project & Site Filters -->
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h6 class="mb-3 text-primary">Project & Site Filters</h6>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="projectFilter" class="form-label">Project</label>
                                    <select class="form-select" id="projectFilter" name="project_id"
                                        onchange="updateSiteFilter()">
                                        <option value="">All Projects</option>
                                        @foreach ($projects as $project)
                                            <option value="{{ $project['id'] }}">{{ $project['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="siteFilter" class="form-label">Site Location</label>
                                    <select class="form-select" id="siteFilter" name="site_location">
                                        <option value="">All Sites</option>
                                        <!-- Sites will be populated dynamically -->
                                    </select>
                                </div>
                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="includeSubprojects"
                                            name="include_subprojects">
                                        <label class="form-check-label" for="includeSubprojects">
                                            Include sub-projects and related sites
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Data Sections to Include -->
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h6 class="mb-3 text-primary">Data Sections</h6>
                                    <p class="text-muted mb-3">Select the data sections to include in your report:</p>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h6 class="card-title">Core Sections</h6>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input section-checkbox" type="checkbox"
                                                    id="sectionSummary" name="sections[]" value="summary" checked>
                                                <label class="form-check-label" for="sectionSummary">Executive
                                                    Summary</label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input section-checkbox" type="checkbox"
                                                    id="sectionProgress" name="sections[]" value="progress" checked>
                                                <label class="form-check-label" for="sectionProgress">Progress
                                                    Overview</label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input section-checkbox" type="checkbox"
                                                    id="sectionFinancial" name="sections[]" value="financial">
                                                <label class="form-check-label" for="sectionFinancial">Financial
                                                    Data</label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input section-checkbox" type="checkbox"
                                                    id="sectionAttendance" name="sections[]" value="attendance">
                                                <label class="form-check-label" for="sectionAttendance">Attendance &
                                                    Labor</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input section-checkbox" type="checkbox"
                                                    id="sectionMaterials" name="sections[]" value="materials">
                                                <label class="form-check-label" for="sectionMaterials">Materials &
                                                    Inventory</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h6 class="card-title">Additional Sections</h6>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input section-checkbox" type="checkbox"
                                                    id="sectionSafety" name="sections[]" value="safety">
                                                <label class="form-check-label" for="sectionSafety">Safety &
                                                    Compliance</label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input section-checkbox" type="checkbox"
                                                    id="sectionQuality" name="sections[]" value="quality">
                                                <label class="form-check-label" for="sectionQuality">Quality
                                                    Control</label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input section-checkbox" type="checkbox"
                                                    id="sectionIssues" name="sections[]" value="issues">
                                                <label class="form-check-label" for="sectionIssues">Issues & Risks</label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input section-checkbox" type="checkbox"
                                                    id="sectionTasks" name="sections[]" value="tasks">
                                                <label class="form-check-label" for="sectionTasks">Task Details</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input section-checkbox" type="checkbox"
                                                    id="sectionRecommendations" name="sections[]"
                                                    value="recommendations">
                                                <label class="form-check-label"
                                                    for="sectionRecommendations">Recommendations</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mt-3">
                                    <button type="button" class="btn btn-sm btn-outline-primary me-2"
                                        onclick="selectAllSections()">
                                        Select All
                                    </button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary"
                                        onclick="deselectAllSections()">
                                        Deselect All
                                    </button>
                                </div>
                            </div>

                            <!-- Report Format & Delivery -->
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h6 class="mb-3 text-primary">Format & Delivery</h6>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="reportFormat" class="form-label">Output Format <span
                                            class="text-danger">*</span></label>
                                    <select class="form-select" id="reportFormat" name="format" required>
                                        <option value="pdf">PDF Document</option>
                                        <option value="excel">Excel Spreadsheet</option>
                                        <option value="csv">CSV File</option>
                                        <option value="html">Web Page (HTML)</option>
                                        <option value="json">JSON Data</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="reportLanguage" class="form-label">Language</label>
                                    <select class="form-select" id="reportLanguage" name="language">
                                        <option value="en" selected>English</option>
                                        <option value="hi">Hindi</option>
                                        <option value="es">Spanish</option>
                                        <option value="fr">French</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="timezone" class="form-label">Timezone</label>
                                    <select class="form-select" id="timezone" name="timezone">
                                        <option value="IST" selected>India Standard Time (IST)</option>
                                        <option value="UTC">UTC</option>
                                        <option value="EST">Eastern Standard Time</option>
                                        <option value="PST">Pacific Standard Time</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" id="includeCharts"
                                            name="include_charts" checked>
                                        <label class="form-check-label" for="includeCharts">
                                            Include charts and graphs in the report
                                        </label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" id="includeRawData"
                                            name="include_raw_data">
                                        <label class="form-check-label" for="includeRawData">
                                            Include raw data tables
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="compressReport"
                                            name="compress_report">
                                        <label class="form-check-label" for="compressReport">
                                            Compress report file to reduce size
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Advanced Options -->
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h6 class="mb-3 text-primary">
                                        Advanced Options
                                        <button type="button" class="btn btn-sm btn-outline-secondary ms-2"
                                            data-bs-toggle="collapse" data-bs-target="#advancedOptions">
                                            Toggle
                                        </button>
                                    </h6>
                                </div>
                                <div class="col-12 collapse" id="advancedOptions">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="dataGranularity" class="form-label">Data
                                                        Granularity</label>
                                                    <select class="form-select" id="dataGranularity"
                                                        name="data_granularity">
                                                        <option value="daily">Daily</option>
                                                        <option value="weekly" selected>Weekly</option>
                                                        <option value="monthly">Monthly</option>
                                                        <option value="quarterly">Quarterly</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="maxRecords" class="form-label">Maximum Records</label>
                                                    <input type="number" class="form-control" id="maxRecords"
                                                        name="max_records" min="10" max="10000" value="1000">
                                                    <small class="text-muted">Limit the number of records in the
                                                        report</small>
                                                </div>
                                                <div class="col-12 mb-3">
                                                    <label for="customFilters" class="form-label">Custom Filters</label>
                                                    <textarea class="form-control" id="customFilters" name="custom_filters" rows="3"
                                                        placeholder="Add custom filter conditions..."></textarea>
                                                    <small class="text-muted">Use SQL-like syntax for custom
                                                        filtering</small>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="includeSensitiveData" name="include_sensitive_data">
                                                        <label class="form-check-label" for="includeSensitiveData">
                                                            Include sensitive data (financial details, personal information)
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Delivery Options -->
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h6 class="mb-3 text-primary">Delivery Options</h6>
                                </div>
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Delivery Method</label>
                                                    <div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="delivery_method" id="deliveryDownload"
                                                                value="download" checked>
                                                            <label class="form-check-label" for="deliveryDownload">
                                                                Download immediately
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="delivery_method" id="deliveryEmail" value="email">
                                                            <label class="form-check-label" for="deliveryEmail">
                                                                Send via email
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="delivery_method" id="deliveryBoth" value="both">
                                                            <label class="form-check-label" for="deliveryBoth">
                                                                Both download and email
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3" id="emailOptions" style="display: none;">
                                                    <label for="emailRecipients" class="form-label">Email
                                                        Recipients</label>
                                                    <textarea class="form-control" id="emailRecipients" name="email_recipients" rows="3"
                                                        placeholder="Enter email addresses (comma-separated)"></textarea>
                                                    <small class="text-muted">Report will be sent to these email
                                                        addresses</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Preview & Generate -->
                            <div class="row mt-4">
                                <div class="col-12">
                                    <div class="card bg-light">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col-md-8">
                                                    <h6 class="mb-1">Ready to generate your report?</h6>
                                                    <p class="text-muted mb-0" id="reportConfigSummary">
                                                        Configure your report settings and click generate.
                                                    </p>
                                                </div>
                                                <div class="col-md-4 text-end">
                                                    <div class="d-flex gap-2 justify-content-end">
                                                        <button type="button" class="btn btn-outline-secondary"
                                                            onclick="previewReport()">
                                                            <span class="material-icons-round me-2">visibility</span>
                                                            Preview
                                                        </button>
                                                        <button type="submit" class="btn btn-primary">
                                                            <span class="material-icons-round me-2">play_arrow</span>
                                                            Generate Report
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Preview Modal -->
    <div class="modal fade" id="previewModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Report Preview</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="previewContent" class="text-center">
                        <div class="spinner-border text-primary mb-3" role="status"></div>
                        <p>Generating preview...</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="generateReport()">Generate Full
                        Report</button>
                </div>
            </div>
        </div>
    </div>

    <style>
        .section-checkbox:checked+label {
            font-weight: 600;
            color: #3b82f6;
        }

        .card .card-body {
            padding: 1.25rem;
        }

        #advancedOptions .card {
            border: 1px solid #e2e8f0;
        }

        .bg-light {
            background-color: #f8f9fa !important;
        }

        .form-check-input:checked {
            background-color: #3b82f6;
            border-color: #3b82f6;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize form
            initializeForm();

            // Update report config summary
            updateReportConfig();

            // Set default dates
            setDefaultDates();

            // Delivery method toggle
            const deliveryMethods = document.querySelectorAll('input[name="delivery_method"]');
            deliveryMethods.forEach(method => {
                method.addEventListener('change', function() {
                    toggleEmailOptions();
                });
            });
        });

        function initializeForm() {
            // Set minimum end date based on start date
            const startDate = document.getElementById('startDate');
            const endDate = document.getElementById('endDate');

            startDate.addEventListener('change', function() {
                endDate.min = this.value;
                if (endDate.value && endDate.value < this.value) {
                    endDate.value = this.value;
                }
            });
        }

        function toggleDateRange() {
            const rangeType = document.getElementById('dateRangeType').value;
            const startDateGroup = document.getElementById('startDateGroup');
            const endDateGroup = document.getElementById('endDateGroup');

            if (rangeType === 'custom') {
                startDateGroup.style.display = 'block';
                endDateGroup.style.display = 'block';
            } else {
                startDateGroup.style.display = 'none';
                endDateGroup.style.display = 'none';
                setPredefinedDateRange(rangeType);
            }
        }

        function setPredefinedDateRange(rangeType) {
            const today = new Date();
            let startDate = new Date();
            let endDate = new Date();

            switch (rangeType) {
                case 'today':
                    startDate = today;
                    endDate = today;
                    break;
                case 'yesterday':
                    startDate.setDate(today.getDate() - 1);
                    endDate.setDate(today.getDate() - 1);
                    break;
                case 'this_week':
                    startDate.setDate(today.getDate() - today.getDay());
                    endDate.setDate(today.getDate() + (6 - today.getDay()));
                    break;
                case 'last_week':
                    startDate.setDate(today.getDate() - today.getDay() - 7);
                    endDate.setDate(today.getDate() - today.getDay() - 1);
                    break;
                case 'this_month':
                    startDate = new Date(today.getFullYear(), today.getMonth(), 1);
                    endDate = new Date(today.getFullYear(), today.getMonth() + 1, 0);
                    break;
                case 'last_month':
                    startDate = new Date(today.getFullYear(), today.getMonth() - 1, 1);
                    endDate = new Date(today.getFullYear(), today.getMonth(), 0);
                    break;
                case 'this_quarter':
                    const quarter = Math.floor(today.getMonth() / 3);
                    startDate = new Date(today.getFullYear(), quarter * 3, 1);
                    endDate = new Date(today.getFullYear(), (quarter + 1) * 3, 0);
                    break;
                case 'this_year':
                    startDate = new Date(today.getFullYear(), 0, 1);
                    endDate = new Date(today.getFullYear(), 11, 31);
                    break;
                case 'all_time':
                    startDate = new Date('2020-01-01');
                    endDate = today;
                    break;
            }

            // Update hidden date fields
            document.getElementById('startDate').value = startDate.toISOString().split('T')[0];
            document.getElementById('endDate').value = endDate.toISOString().split('T')[0];
        }

        function setLast30Days() {
            const today = new Date();
            const startDate = new Date();
            startDate.setDate(today.getDate() - 30);

            document.getElementById('dateRangeType').value = 'custom';
            document.getElementById('startDate').value = startDate.toISOString().split('T')[0];
            document.getElementById('endDate').value = today.toISOString().split('T')[0];

            toggleDateRange();
        }

        function setDefaultDates() {
            // Set default date to today
            document.getElementById('endDate').value = new Date().toISOString().split('T')[0];

            // Set start date to 7 days ago
            const startDate = new Date();
            startDate.setDate(startDate.getDate() - 7);
            document.getElementById('startDate').value = startDate.toISOString().split('T')[0];
        }

        function updateReportConfig() {
            const reportType = document.getElementById('reportType').value;
            const summaryElement = document.getElementById('reportConfigSummary');

            let summary = 'Configure your report settings and click generate.';

            switch (reportType) {
                case 'daily_progress':
                    summary = 'Daily progress report showing work completed, issues, and next day plans.';
                    break;
                case 'weekly_summary':
                    summary = 'Weekly summary with progress metrics, achievements, and upcoming tasks.';
                    break;
                case 'financial_analysis':
                    summary = 'Financial analysis including budget vs actual, expenses, and forecasts.';
                    break;
                case 'attendance_summary':
                    summary = 'Attendance and labor report with presence records and productivity metrics.';
                    break;
                case 'materials_inventory':
                    summary = 'Materials inventory report showing stock levels, usage, and requirements.';
                    break;
                case 'safety_compliance':
                    summary = 'Safety compliance report with incidents, audits, and compliance status.';
                    break;
            }

            summaryElement.textContent = summary;
        }

        function updateSiteFilter() {
            const projectId = document.getElementById('projectFilter').value;
            const siteFilter = document.getElementById('siteFilter');

            // Clear existing options
            siteFilter.innerHTML = '<option value="">All Sites</option>';

            if (projectId) {
                // Simulate API call to get sites for selected project
                const sites = [{
                        id: 1,
                        name: 'Main Construction Site'
                    },
                    {
                        id: 2,
                        name: 'Foundation Area'
                    },
                    {
                        id: 3,
                        name: 'Structural Zone'
                    },
                    {
                        id: 4,
                        name: 'Finishing Section'
                    }
                ];

                sites.forEach(site => {
                    const option = document.createElement('option');
                    option.value = site.id;
                    option.textContent = site.name;
                    siteFilter.appendChild(option);
                });
            }
        }

        function selectAllSections() {
            const checkboxes = document.querySelectorAll('.section-checkbox');
            checkboxes.forEach(checkbox => {
                checkbox.checked = true;
            });
        }

        function deselectAllSections() {
            const checkboxes = document.querySelectorAll('.section-checkbox');
            checkboxes.forEach(checkbox => {
                checkbox.checked = false;
            });
        }

        function toggleEmailOptions() {
            const deliveryMethod = document.querySelector('input[name="delivery_method"]:checked').value;
            const emailOptions = document.getElementById('emailOptions');

            if (deliveryMethod === 'email' || deliveryMethod === 'both') {
                emailOptions.style.display = 'block';
            } else {
                emailOptions.style.display = 'none';
            }
        }

        function previewReport() {
            const form = document.getElementById('generateReportForm');

            if (!form.checkValidity()) {
                form.reportValidity();
                return;
            }

            const previewModal = new bootstrap.Modal(document.getElementById('previewModal'));
            previewModal.show();

            // Simulate preview generation
            setTimeout(() => {
                const previewContent = document.getElementById('previewContent');
                previewContent.innerHTML = `
            <div class="text-start">
                <h4>Report Preview</h4>
                <p class="text-muted">This is a preview of how your report will look.</p>
                
                <div class="row">
                    <div class="col-6">
                        <h6>Report Configuration:</h6>
                        <ul class="list-unstyled">
                            <li><strong>Name:</strong> ${document.getElementById('reportName').value}</li>
                            <li><strong>Type:</strong> ${document.getElementById('reportType').options[document.getElementById('reportType').selectedIndex].text}</li>
                            <li><strong>Format:</strong> ${document.getElementById('reportFormat').value.toUpperCase()}</li>
                            <li><strong>Date Range:</strong> ${document.getElementById('startDate').value} to ${document.getElementById('endDate').value}</li>
                        </ul>
                    </div>
                    <div class="col-6">
                        <h6>Sections Included:</h6>
                        <ul>
                            ${Array.from(document.querySelectorAll('.section-checkbox:checked'))
                                .map(cb => `<li>${cb.nextElementSibling.textContent}</li>`)
                                .join('')}
                        </ul>
                    </div>
                </div>
                
                <div class="alert alert-info mt-3">
                    <span class="material-icons-round me-2">info</span>
                    This is a simplified preview. The actual report will contain detailed data and analytics.
                </div>
            </div>
        `;
            }, 1000);
        }

        function generateReport() {
            const form = document.getElementById('generateReportForm');

            // Show loading state
            const submitBtn = form.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = `
        <span class="spinner-border spinner-border-sm me-2" role="status"></span>
        Generating...
    `;
            submitBtn.disabled = true;

            // Simulate report generation
            setTimeout(() => {
                form.submit();
            }, 2000);
        }

        // Auto-save form data
        let autoSaveTimer;

        function autoSaveForm() {
            clearTimeout(autoSaveTimer);
            autoSaveTimer = setTimeout(() => {
                const formData = new FormData(document.getElementById('generateReportForm'));
                const formObject = {};

                for (let [key, value] of formData.entries()) {
                    if (key === 'sections[]') {
                        if (!formObject.sections) formObject.sections = [];
                        formObject.sections.push(value);
                    } else {
                        formObject[key] = value;
                    }
                }

                localStorage.setItem('reportConfigDraft', JSON.stringify(formObject));
                console.log('Form auto-saved');
            }, 1000);
        }

        // Load saved draft
        function loadDraft() {
            const draft = localStorage.getItem('reportConfigDraft');
            if (draft) {
                const formObject = JSON.parse(draft);

                // Populate form fields
                for (let key in formObject) {
                    if (key === 'sections') {
                        formObject[key].forEach(section => {
                            const checkbox = document.querySelector(`input[value="${section}"]`);
                            if (checkbox) checkbox.checked = true;
                        });
                    } else {
                        const element = document.querySelector(`[name="${key}"]`);
                        if (element) element.value = formObject[key];
                    }
                }

                // Update dependent fields
                updateReportConfig();
                toggleDateRange();
                toggleEmailOptions();

                console.log('Draft loaded successfully');
            }
        }

        // Add event listeners for auto-save
        document.querySelectorAll('#generateReportForm input, #generateReportForm select, #generateReportForm textarea')
            .forEach(element => {
                element.addEventListener('change', autoSaveForm);
                element.addEventListener('input', autoSaveForm);
            });

        // Load draft on page load
        window.addEventListener('load', loadDraft);
    </script>
@endsection
