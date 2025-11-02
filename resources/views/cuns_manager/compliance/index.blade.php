@extends('cuns_manager.layouts.main')

@section('title', 'Compliance Management - Construction Manager')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <!-- Page Header -->
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="fw-bold py-3 mb-0">
                        <span class="text-muted fw-light">Compliance /</span> Documents & Regulations Management
                    </h4>
                    <div class="d-flex gap-2">
                        <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#bulkUploadModal">
                            <span class="material-icons-round me-2">upload_file</span>
                            Bulk Upload
                        </button>
                        <button class="btn btn-primary" onclick="window.location.href='{{ route('compliance.upload') }}'">
                            <span class="material-icons-round me-2">add</span>
                            Add New Document
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Compliance Overview Stats -->
        <div class="row mb-4">
            <div class="col-md-2 col-6">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="avatar avatar-lg bg-primary bg-gradient-primary rounded-circle mb-2">
                            <span class="material-icons-round text-white">folder</span>
                        </div>
                        <h3 class="card-title mb-1">156</h3>
                        <small class="text-muted">Total Documents</small>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-6">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="avatar avatar-lg bg-success bg-gradient-success rounded-circle mb-2">
                            <span class="material-icons-round text-white">verified</span>
                        </div>
                        <h3 class="card-title mb-1">124</h3>
                        <small class="text-muted">Approved</small>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-6">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="avatar avatar-lg bg-warning bg-gradient-warning rounded-circle mb-2">
                            <span class="material-icons-round text-white">pending</span>
                        </div>
                        <h3 class="card-title mb-1">18</h3>
                        <small class="text-muted">Pending Review</small>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-6">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="avatar avatar-lg bg-danger bg-gradient-danger rounded-circle mb-2">
                            <span class="material-icons-round text-white">warning</span>
                        </div>
                        <h3 class="card-title mb-1">8</h3>
                        <small class="text-muted">Expired</small>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-6">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="avatar avatar-lg bg-info bg-gradient-info rounded-circle mb-2">
                            <span class="material-icons-round text-white">schedule</span>
                        </div>
                        <h3 class="card-title mb-1">6</h3>
                        <small class="text-muted">Expiring Soon</small>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-6">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="avatar avatar-lg bg-secondary bg-gradient-secondary rounded-circle mb-2">
                            <span class="material-icons-round text-white">block</span>
                        </div>
                        <h3 class="card-title mb-1">4</h3>
                        <small class="text-muted">Rejected</small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions & Alerts -->
        <div class="row mb-4">
            <div class="col-md-8">
                <!-- Critical Alerts -->
                <div class="card border-danger">
                    <div class="card-header bg-danger text-white d-flex justify-content-between align-items-center">
                        <h6 class="mb-0">
                            <span class="material-icons-round me-2">warning</span>
                            Critical Compliance Alerts
                        </h6>
                        <span class="badge bg-white text-danger">3 Urgent</span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-sm bg-danger rounded-circle me-3">
                                        <span class="material-icons-round text-white" style="font-size: 16px;">gavel</span>
                                    </div>
                                    <div>
                                        <small class="fw-medium d-block">Building Permit</small>
                                        <small class="text-muted">Expired 5 days ago</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-sm bg-danger rounded-circle me-3">
                                        <span class="material-icons-round text-white"
                                            style="font-size: 16px;">health_and_safety</span>
                                    </div>
                                    <div>
                                        <small class="fw-medium d-block">Safety Certificate</small>
                                        <small class="text-muted">Expires in 2 days</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-sm bg-warning rounded-circle me-3">
                                        <span class="material-icons-round text-white"
                                            style="font-size: 16px;">local_fire_department</span>
                                    </div>
                                    <div>
                                        <small class="fw-medium d-block">Fire NOC</small>
                                        <small class="text-muted">Pending approval</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <!-- Quick Actions -->
                <div class="card">
                    <div class="card-header">
                        <h6 class="card-title mb-0">Quick Actions</h6>
                    </div>
                    <div class="card-body">
                        <div class="d-grid gap-2">
                            <button class="btn btn-outline-primary text-start" onclick="generateComplianceReport()">
                                <span class="material-icons-round me-2">assessment</span>
                                Generate Compliance Report
                            </button>
                            <button class="btn btn-outline-success text-start" data-bs-toggle="modal"
                                data-bs-target="#renewalModal">
                                <span class="material-icons-round me-2">autorenew</span>
                                Bulk Renewal Requests
                            </button>
                            <button class="btn btn-outline-warning text-start" onclick="sendReminders()">
                                <span class="material-icons-round me-2">notifications</span>
                                Send Expiry Reminders
                            </button>
                            <button class="btn btn-outline-info text-start" data-bs-toggle="modal"
                                data-bs-target="#auditModal">
                                <span class="material-icons-round me-2">fact_check</span>
                                Schedule Compliance Audit
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Advanced Filters -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Filters & Search</h5>
                        <button class="btn btn-sm btn-outline-secondary" onclick="resetFilters()">
                            <span class="material-icons-round me-1" style="font-size: 16px;">refresh</span>
                            Reset
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Document Type</label>
                                <select class="form-select" id="docTypeFilter" onchange="applyFilters()">
                                    <option value="">All Types</option>
                                    <option value="license">Licenses</option>
                                    <option value="permit">Permits</option>
                                    <option value="certificate">Certificates</option>
                                    <option value="insurance">Insurance</option>
                                    <option value="tax">Tax Documents</option>
                                    <option value="environmental">Environmental</option>
                                    <option value="safety">Safety Compliance</option>
                                    <option value="labor">Labor Laws</option>
                                    <option value="quality">Quality Standards</option>
                                </select>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Status</label>
                                <select class="form-select" id="statusFilter" onchange="applyFilters()">
                                    <option value="">All Status</option>
                                    <option value="approved">Approved</option>
                                    <option value="pending">Pending Review</option>
                                    <option value="expired">Expired</option>
                                    <option value="expiring_soon">Expiring Soon</option>
                                    <option value="rejected">Rejected</option>
                                    <option value="draft">Draft</option>
                                </select>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Site/Project</label>
                                <select class="form-select" id="siteFilter" onchange="applyFilters()">
                                    <option value="">All Sites</option>
                                    <option value="site1">Site A - Commercial Complex</option>
                                    <option value="site2">Site B - Residential Tower</option>
                                    <option value="site3">Site C - Infrastructure</option>
                                    <option value="head_office">Head Office</option>
                                </select>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Priority</label>
                                <select class="form-select" id="priorityFilter" onchange="applyFilters()">
                                    <option value="">All Priorities</option>
                                    <option value="high">High</option>
                                    <option value="medium">Medium</option>
                                    <option value="low">Low</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Issuing Authority</label>
                                <input type="text" class="form-control" id="authorityFilter"
                                    placeholder="Search authority..." onkeyup="applyFilters()">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Date Range</label>
                                <div class="input-group">
                                    <input type="date" class="form-control" id="dateFrom" onchange="applyFilters()">
                                    <span class="input-group-text">to</span>
                                    <input type="date" class="form-control" id="dateTo" onchange="applyFilters()">
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Search Documents</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="searchInput"
                                        placeholder="Search by name, reference, description..." onkeyup="applyFilters()">
                                    <button class="btn btn-outline-primary" type="button">
                                        <span class="material-icons-round">search</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Compliance Documents Grid -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Compliance Documents</h5>
                        <div class="d-flex gap-2 align-items-center">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="showExpired"
                                    onchange="applyFilters()">
                                <label class="form-check-label" for="showExpired">Show Expired</label>
                            </div>
                            <div class="dropdown">
                                <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button"
                                    data-bs-toggle="dropdown">
                                    <span class="material-icons-round me-1" style="font-size: 16px;">view_module</span>
                                    View
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item active" href="#"
                                            onclick="changeView('table')">Table View</a></li>
                                    <li><a class="dropdown-item" href="#" onclick="changeView('grid')">Grid
                                            View</a></li>
                                    <li><a class="dropdown-item" href="#" onclick="changeView('card')">Card
                                            View</a></li>
                                </ul>
                            </div>
                            <div class="dropdown">
                                <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button"
                                    data-bs-toggle="dropdown">
                                    <span class="material-icons-round me-1" style="font-size: 16px;">download</span>
                                    Export
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#" onclick="exportData('pdf')">PDF
                                            Report</a></li>
                                    <li><a class="dropdown-item" href="#" onclick="exportData('excel')">Excel
                                            Sheet</a></li>
                                    <li><a class="dropdown-item" href="#" onclick="exportData('csv')">CSV File</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                        <!-- Table View -->
                        <div id="tableView">
                            <div class="table-responsive">
                                <table class="table table-hover" id="complianceTable">
                                    <thead>
                                        <tr>
                                            <th width="50">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="selectAll">
                                                </div>
                                            </th>
                                            <th>Document Details</th>
                                            <th>Type & Category</th>
                                            <th>Site/Project</th>
                                            <th>Dates</th>
                                            <th>Status</th>
                                            <th>Priority</th>
                                            <th width="120">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($documents as $doc)
                                            <tr class="compliance-row {{ $doc['status_class'] }}">
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input row-checkbox" type="checkbox"
                                                            value="{{ $doc['id'] }}">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-start">
                                                        <div class="avatar me-3">
                                                            <span
                                                                class="avatar-initial bg-{{ $doc['icon_color'] }} rounded-circle">
                                                                <span class="material-icons-round text-white"
                                                                    style="font-size: 18px;">{{ $doc['icon'] }}</span>
                                                            </span>
                                                        </div>
                                                        <div>
                                                            <h6 class="mb-1">{{ $doc['name'] }}</h6>
                                                            <small class="text-muted">Ref: {{ $doc['reference'] }}</small>
                                                            <br>
                                                            <small class="text-muted">Authority:
                                                                {{ $doc['authority'] }}</small>
                                                            @if ($doc['description'])
                                                                <br>
                                                                <small
                                                                    class="text-muted">{{ Str::limit($doc['description'], 50) }}</small>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge bg-light text-dark mb-1">{{ $doc['type'] }}</span>
                                                    <br>
                                                    <small class="text-muted">{{ $doc['category'] }}</small>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <span class="material-icons-round text-muted me-1"
                                                            style="font-size: 16px;">location_on</span>
                                                        <small>{{ $doc['site'] }}</small>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="text-nowrap">
                                                        <small class="d-block">
                                                            <strong>Issue:</strong> {{ $doc['issue_date'] }}
                                                        </small>
                                                        <small class="d-block">
                                                            <strong>Expiry:</strong> {{ $doc['expiry_date'] }}
                                                        </small>
                                                        @if ($doc['days_remaining'] !== null)
                                                            <small class="d-block">
                                                                <strong>Remaining:</strong>
                                                                <span
                                                                    class="badge bg-{{ $doc['days_class'] }}">{{ $doc['days_remaining'] }}
                                                                    days</span>
                                                            </small>
                                                        @endif
                                                    </div>
                                                </td>
                                                <td>
                                                    <span
                                                        class="badge bg-{{ $doc['status_color'] }}">{{ $doc['status'] }}</span>
                                                    @if ($doc['requires_renewal'])
                                                        <br>
                                                        <small class="text-warning">
                                                            <span class="material-icons-round"
                                                                style="font-size: 14px;">autorenew</span>
                                                            Renewal needed
                                                        </small>
                                                    @endif
                                                </td>
                                                <td>
                                                    <span
                                                        class="badge bg-{{ $doc['priority_color'] }}">{{ $doc['priority'] }}</span>
                                                </td>
                                                <td>
                                                    <div class="d-flex gap-1">
                                                        <button class="btn btn-sm btn-outline-primary"
                                                            onclick="viewDocument({{ $doc['id'] }})"
                                                            data-bs-toggle="tooltip" title="View">
                                                            <span class="material-icons-round"
                                                                style="font-size: 16px;">visibility</span>
                                                        </button>
                                                        <button class="btn btn-sm btn-outline-success"
                                                            onclick="downloadDocument({{ $doc['id'] }})"
                                                            data-bs-toggle="tooltip" title="Download">
                                                            <span class="material-icons-round"
                                                                style="font-size: 16px;">download</span>
                                                        </button>
                                                        <div class="dropdown">
                                                            <button
                                                                class="btn btn-sm btn-outline-secondary dropdown-toggle"
                                                                data-bs-toggle="dropdown">
                                                                <span class="material-icons-round"
                                                                    style="font-size: 16px;">more_vert</span>
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                                <li><a class="dropdown-item" href="#"
                                                                        onclick="editDocument({{ $doc['id'] }})">Edit</a>
                                                                </li>
                                                                <li><a class="dropdown-item" href="#"
                                                                        onclick="renewDocument({{ $doc['id'] }})">Renew</a>
                                                                </li>
                                                                <li><a class="dropdown-item" href="#"
                                                                        onclick="shareDocument({{ $doc['id'] }})">Share</a>
                                                                </li>
                                                                <li><a class="dropdown-item" href="#"
                                                                        onclick="viewHistory({{ $doc['id'] }})">View
                                                                        History</a></li>
                                                                <li>
                                                                    <hr class="dropdown-divider">
                                                                </li>
                                                                <li><a class="dropdown-item text-danger" href="#"
                                                                        onclick="deleteDocument({{ $doc['id'] }})">Delete</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Grid View (Hidden by default) -->
                        <div id="gridView" style="display: none;">
                            <div class="row" id="documentsGrid">
                                @foreach ($documents as $doc)
                                    <div class="col-md-6 col-lg-4 mb-4">
                                        <div class="card compliance-card h-100 {{ $doc['status_class'] }}">
                                            <div class="card-header d-flex justify-content-between align-items-center">
                                                <div class="d-flex align-items-center">
                                                    <span
                                                        class="avatar avatar-sm bg-{{ $doc['icon_color'] }} rounded-circle me-2">
                                                        <span class="material-icons-round text-white"
                                                            style="font-size: 16px;">{{ $doc['icon'] }}</span>
                                                    </span>
                                                    <small class="fw-medium">{{ $doc['type'] }}</small>
                                                </div>
                                                <span
                                                    class="badge bg-{{ $doc['priority_color'] }}">{{ $doc['priority'] }}</span>
                                            </div>
                                            <div class="card-body">
                                                <h6 class="card-title">{{ $doc['name'] }}</h6>
                                                <p class="card-text small text-muted">
                                                    {{ Str::limit($doc['description'], 80) }}</p>

                                                <div class="mb-2">
                                                    <small class="text-muted">
                                                        <strong>Reference:</strong> {{ $doc['reference'] }}
                                                    </small>
                                                </div>

                                                <div class="mb-2">
                                                    <small class="text-muted">
                                                        <span class="material-icons-round me-1"
                                                            style="font-size: 14px;">location_on</span>
                                                        {{ $doc['site'] }}
                                                    </small>
                                                </div>

                                                <div class="mb-3">
                                                    <small class="text-muted">
                                                        <span class="material-icons-round me-1"
                                                            style="font-size: 14px;">account_balance</span>
                                                        {{ $doc['authority'] }}
                                                    </small>
                                                </div>

                                                <div class="row text-center mb-3">
                                                    <div class="col-6">
                                                        <small class="text-muted d-block">Issue Date</small>
                                                        <strong class="small">{{ $doc['issue_date'] }}</strong>
                                                    </div>
                                                    <div class="col-6">
                                                        <small class="text-muted d-block">Expiry Date</small>
                                                        <strong class="small">{{ $doc['expiry_date'] }}</strong>
                                                    </div>
                                                </div>

                                                @if ($doc['days_remaining'] !== null)
                                                    <div class="mb-3">
                                                        <div
                                                            class="d-flex justify-content-between align-items-center mb-1">
                                                            <small class="text-muted">Days Remaining</small>
                                                            <small class="fw-medium">{{ $doc['days_remaining'] }}
                                                                days</small>
                                                        </div>
                                                        <div class="progress" style="height: 4px;">
                                                            <div class="progress-bar bg-{{ $doc['days_class'] }}"
                                                                style="width: {{ $doc['progress_width'] }}%"></div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="card-footer bg-transparent">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <span
                                                        class="badge bg-{{ $doc['status_color'] }}">{{ $doc['status'] }}</span>
                                                    <div class="d-flex gap-1">
                                                        <button class="btn btn-sm btn-outline-primary"
                                                            onclick="viewDocument({{ $doc['id'] }})">
                                                            <span class="material-icons-round"
                                                                style="font-size: 16px;">visibility</span>
                                                        </button>
                                                        <button class="btn btn-sm btn-outline-success"
                                                            onclick="downloadDocument({{ $doc['id'] }})">
                                                            <span class="material-icons-round"
                                                                style="font-size: 16px;">download</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Pagination -->
                        <div class="row mt-4">
                            <div class="col-12">
                                <nav aria-label="Page navigation">
                                    <ul class="pagination justify-content-center">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" tabindex="-1">Previous</a>
                                        </li>
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">Next</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bulk Actions Bar -->
        <div class="row fixed-bottom" id="bulkActionsBar" style="display: none;">
            <div class="col-12">
                <div class="card shadow-lg border-0 rounded-0">
                    <div class="card-body py-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <span class="fw-medium" id="selectedCount">0 documents selected</span>
                            </div>
                            <div class="d-flex gap-2">
                                <button class="btn btn-outline-primary btn-sm" onclick="bulkDownload()">
                                    <span class="material-icons-round me-1" style="font-size: 16px;">download</span>
                                    Download Selected
                                </button>
                                <button class="btn btn-outline-success btn-sm" onclick="bulkRenew()">
                                    <span class="material-icons-round me-1" style="font-size: 16px;">autorenew</span>
                                    Renew Selected
                                </button>
                                <button class="btn btn-outline-warning btn-sm" onclick="bulkShare()">
                                    <span class="material-icons-round me-1" style="font-size: 16px;">share</span>
                                    Share Selected
                                </button>
                                <button class="btn btn-outline-danger btn-sm" onclick="bulkDelete()">
                                    <span class="material-icons-round me-1" style="font-size: 16px;">delete</span>
                                    Delete Selected
                                </button>
                                <button class="btn btn-outline-secondary btn-sm" onclick="clearSelection()">
                                    <span class="material-icons-round me-1" style="font-size: 16px;">clear</span>
                                    Clear
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Modals will be included here -->
    @include('cuns_manager.compliance.modals.bulk-upload')
    @include('cuns_manager.compliance.modals.renewal')
    @include('cuns_manager.compliance.modals.audit')

    <style>
        .compliance-row.expired {
            background-color: #fff5f5;
        }

        .compliance-row.expiring-soon {
            background-color: #fffbf0;
        }

        .compliance-row.pending {
            background-color: #f0f9ff;
        }

        .compliance-card {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            border-left: 4px solid transparent;
        }

        .compliance-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .compliance-card.expired {
            border-left-color: #dc3545;
        }

        .compliance-card.expiring-soon {
            border-left-color: #ffc107;
        }

        .compliance-card.pending {
            border-left-color: #0dcaf0;
        }

        #bulkActionsBar {
            z-index: 1050;
            margin-bottom: 0;
        }

        .avatar {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .progress {
            background-color: #e9ecef;
        }

        /* Status badge colors */
        .badge.bg-expired {
            background-color: #dc3545;
        }

        .badge.bg-expiring {
            background-color: #ffc107;
            color: #000;
        }

        .badge.bg-pending {
            background-color: #0dcaf0;
        }

        /* Icon colors based on document type */
        .bg-license {
            background-color: #3b82f6;
        }

        .bg-permit {
            background-color: #10b981;
        }

        .bg-certificate {
            background-color: #f59e0b;
        }

        .bg-insurance {
            background-color: #8b5cf6;
        }

        .bg-tax {
            background-color: #ef4444;
        }

        .bg-environmental {
            background-color: #06b6d4;
        }

        .bg-safety {
            background-color: #84cc16;
        }

        .bg-labor {
            background-color: #f97316;
        }

        .bg-quality {
            background-color: #6366f1;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            initializePage();
            loadComplianceStats();
        });

        function initializePage() {
            // Initialize tooltips
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });

            // Initialize select all functionality
            document.getElementById('selectAll').addEventListener('change', function() {
                const checkboxes = document.querySelectorAll('.row-checkbox');
                checkboxes.forEach(checkbox => {
                    checkbox.checked = this.checked;
                });
                updateBulkActionsBar();
            });

            // Add change event to all row checkboxes
            document.querySelectorAll('.row-checkbox').forEach(checkbox => {
                checkbox.addEventListener('change', updateBulkActionsBar);
            });

            // Set default date range (last 30 days)
            const today = new Date();
            const thirtyDaysAgo = new Date(today);
            thirtyDaysAgo.setDate(today.getDate() - 30);

            document.getElementById('dateFrom').value = thirtyDaysAgo.toISOString().split('T')[0];
            document.getElementById('dateTo').value = today.toISOString().split('T')[0];
        }

        function updateBulkActionsBar() {
            const selectedCount = document.querySelectorAll('.row-checkbox:checked').length;
            const bulkActionsBar = document.getElementById('bulkActionsBar');

            if (selectedCount > 0) {
                document.getElementById('selectedCount').textContent = `${selectedCount} documents selected`;
                bulkActionsBar.style.display = 'block';
            } else {
                bulkActionsBar.style.display = 'none';
            }
        }

        function clearSelection() {
            document.querySelectorAll('.row-checkbox').forEach(checkbox => {
                checkbox.checked = false;
            });
            document.getElementById('selectAll').checked = false;
            updateBulkActionsBar();
        }

        function changeView(viewType) {
            const tableView = document.getElementById('tableView');
            const gridView = document.getElementById('gridView');

            if (viewType === 'table') {
                tableView.style.display = 'block';
                gridView.style.display = 'none';
            } else {
                tableView.style.display = 'none';
                gridView.style.display = 'block';
            }

            // Update active state in dropdown
            document.querySelectorAll('.dropdown-menu .dropdown-item').forEach(item => {
                item.classList.remove('active');
            });
            event.target.classList.add('active');
        }

        function applyFilters() {
            const docType = document.getElementById('docTypeFilter').value;
            const status = document.getElementById('statusFilter').value;
            const site = document.getElementById('siteFilter').value;
            const priority = document.getElementById('priorityFilter').value;
            const authority = document.getElementById('authorityFilter').value.toLowerCase();
            const dateFrom = document.getElementById('dateFrom').value;
            const dateTo = document.getElementById('dateTo').value;
            const search = document.getElementById('searchInput').value.toLowerCase();
            const showExpired = document.getElementById('showExpired').checked;

            console.log('Applying filters:', {
                docType,
                status,
                site,
                priority,
                authority,
                dateFrom,
                dateTo,
                search,
                showExpired
            });

            // In a real application, you would make an AJAX call here
            // For now, we'll just show a loading state
            showLoadingState();
            setTimeout(() => {
                hideLoadingState();
                showToast('Filters applied successfully', 'success');
            }, 1000);
        }

        function resetFilters() {
            document.getElementById('docTypeFilter').value = '';
            document.getElementById('statusFilter').value = '';
            document.getElementById('siteFilter').value = '';
            document.getElementById('priorityFilter').value = '';
            document.getElementById('authorityFilter').value = '';
            document.getElementById('dateFrom').value = '';
            document.getElementById('dateTo').value = '';
            document.getElementById('searchInput').value = '';
            document.getElementById('showExpired').checked = false;

            applyFilters();
        }

        function showLoadingState() {
            // Implement loading state
            const tableBody = document.querySelector('#complianceTable tbody');
            tableBody.innerHTML = `
        <tr>
            <td colspan="8" class="text-center py-4">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <p class="mt-2 mb-0">Loading documents...</p>
            </td>
        </tr>
    `;
        }

        function hideLoadingState() {
            // This would be handled by the AJAX response in real implementation
        }

        function loadComplianceStats() {
            // In real implementation, this would fetch stats from API
            console.log('Loading compliance statistics...');
        }

        // Document Actions
        function viewDocument(id) {
            console.log('Viewing document:', id);
            // Implement view document logic
            window.location.href = `/compliance/documents/${id}`;
        }

        function downloadDocument(id) {
            console.log('Downloading document:', id);
            showToast('Download started...', 'info');
        }

        function editDocument(id) {
            console.log('Editing document:', id);
            window.location.href = `/compliance/documents/${id}/edit`;
        }

        function renewDocument(id) {
            console.log('Renewing document:', id);
            // Show renewal modal
            const renewalModal = new bootstrap.Modal(document.getElementById('renewalModal'));
            renewalModal.show();
        }

        function shareDocument(id) {
            console.log('Sharing document:', id);
            showToast('Share options will appear here', 'info');
        }

        function viewHistory(id) {
            console.log('Viewing history for document:', id);
            window.location.href = `/compliance/documents/${id}/history`;
        }

        function deleteDocument(id) {
            if (confirm('Are you sure you want to delete this document? This action cannot be undone.')) {
                console.log('Deleting document:', id);
                showToast('Document deleted successfully', 'success');
            }
        }

        // Bulk Actions
        function bulkDownload() {
            const selectedIds = getSelectedDocumentIds();
            if (selectedIds.length === 0) {
                showToast('Please select documents to download', 'warning');
                return;
            }
            console.log('Bulk download:', selectedIds);
            showToast(`Preparing download for ${selectedIds.length} documents...`, 'info');
        }

        function bulkRenew() {
            const selectedIds = getSelectedDocumentIds();
            if (selectedIds.length === 0) {
                showToast('Please select documents to renew', 'warning');
                return;
            }
            console.log('Bulk renew:', selectedIds);
            // Show bulk renewal modal
            const renewalModal = new bootstrap.Modal(document.getElementById('renewalModal'));
            renewalModal.show();
        }

        function bulkShare() {
            const selectedIds = getSelectedDocumentIds();
            if (selectedIds.length === 0) {
                showToast('Please select documents to share', 'warning');
                return;
            }
            console.log('Bulk share:', selectedIds);
            showToast('Share options for selected documents', 'info');
        }

        function bulkDelete() {
            const selectedIds = getSelectedDocumentIds();
            if (selectedIds.length === 0) {
                showToast('Please select documents to delete', 'warning');
                return;
            }

            if (confirm(`Are you sure you want to delete ${selectedIds.length} documents? This action cannot be undone.`)) {
                console.log('Bulk delete:', selectedIds);
                showToast(`${selectedIds.length} documents deleted successfully`, 'success');
                clearSelection();
            }
        }

        function getSelectedDocumentIds() {
            const selectedCheckboxes = document.querySelectorAll('.row-checkbox:checked');
            return Array.from(selectedCheckboxes).map(checkbox => checkbox.value);
        }

        // Quick Actions
        function generateComplianceReport() {
            console.log('Generating compliance report...');
            showToast('Generating compliance report...', 'info');
        }

        function sendReminders() {
            console.log('Sending expiry reminders...');
            showToast('Expiry reminders sent successfully', 'success');
        }

        function exportData(format) {
            console.log(`Exporting data as ${format}...`);
            showToast(`Exporting data as ${format.toUpperCase()}...`, 'info');
        }

        // Utility Functions
        function showToast(message, type = 'success') {
            const toast = document.createElement('div');
            toast.className = `alert alert-${type} alert-dismissible fade show position-fixed`;
            toast.style.cssText = 'top: 20px; right: 20px; z-index: 1060; min-width: 300px;';
            toast.innerHTML = `
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    `;
            document.body.appendChild(toast);

            setTimeout(() => {
                toast.remove();
            }, 4000);
        }

        // Auto-refresh data every 5 minutes
        setInterval(() => {
            if (document.visibilityState === 'visible') {
                applyFilters();
            }
        }, 300000);

        // Keyboard shortcuts
        document.addEventListener('keydown', function(e) {
            // Ctrl + F for search
            if (e.ctrlKey && e.key === 'f') {
                e.preventDefault();
                document.getElementById('searchInput').focus();
            }

            // Ctrl + A for select all
            if (e.ctrlKey && e.key === 'a') {
                e.preventDefault();
                document.getElementById('selectAll').click();
            }

            // Escape to clear selection
            if (e.key === 'Escape') {
                clearSelection();
            }
        });
    </script>
@endsection
