@extends('cuns_manager.layouts.main')

@section('title', $report->title . ' - Construction Manager')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <!-- Page Header -->
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h4 class="fw-bold py-3 mb-0">
                            <span class="text-muted fw-light">Site Reports /</span> {{ $report->title }}
                        </h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('site_reports.index') }}">Site Reports</a></li>
                                <li class="breadcrumb-item active">{{ Str::limit($report->title, 30) }}</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="d-flex gap-2">
                        <button class="btn btn-outline-secondary" onclick="window.print()">
                            <span class="material-icons-round me-2">print</span>
                            Print
                        </button>
                        <button class="btn btn-outline-primary" onclick="downloadPDF()">
                            <span class="material-icons-round me-2">download</span>
                            Download PDF
                        </button>
                        <button class="btn btn-primary"
                            onclick="window.location.href='{{ route('site_reports.edit', $report->id) }}'">
                            <span class="material-icons-round me-2">edit</span>
                            Edit Report
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Report Header -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <h2 class="card-title mb-2">{{ $report->title }}</h2>
                                <p class="card-text text-muted mb-3">{{ $report->summary }}</p>
                                <div class="d-flex flex-wrap gap-3">
                                    <div class="report-badge">
                                        <span class="badge bg-{{ $report->status_color }} fs-6">{{ $report->status }}</span>
                                    </div>
                                    <div class="report-meta">
                                        <span class="text-muted">
                                            <span class="material-icons-round me-1"
                                                style="font-size: 16px;">calendar_today</span>
                                            {{ $report->report_date->format('F d, Y') }}
                                        </span>
                                    </div>
                                    <div class="report-meta">
                                        <span class="text-muted">
                                            <span class="material-icons-round me-1" style="font-size: 16px;">person</span>
                                            Prepared by: {{ $report->prepared_by }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 text-md-end">
                                <div class="ratings-overview">
                                    <h5 class="mb-3">Overall Rating</h5>
                                    <div class="overall-rating">
                                        <span class="rating-value">{{ $report->overall_rating }}/5</span>
                                        <div class="stars mb-2">
                                            @for ($i = 1; $i <= 5; $i++)
                                                <span
                                                    class="material-icons-round {{ $i <= $report->overall_rating ? 'text-warning' : 'text-muted' }}">
                                                    star
                                                </span>
                                            @endfor
                                        </div>
                                    </div>
                                    <div class="rating-breakdown">
                                        <small class="d-block">Safety: {{ $report->safety_rating }}/5</small>
                                        <small class="d-block">Progress: {{ $report->progress_rating }}/5</small>
                                        <small class="d-block">Quality: {{ $report->quality_rating }}/5</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="row">
            <!-- Left Column - Report Details -->
            <div class="col-lg-8 col-12">
                <!-- Project & Site Information -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title mb-0">
                            <span class="material-icons-round me-2">business</span>
                            Project & Site Information
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Project Name</label>
                                <p class="mb-0">{{ $report->project->name }}</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Site Location</label>
                                <p class="mb-0">{{ $report->site_location }}</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Project Manager</label>
                                <p class="mb-0">{{ $report->project->manager }}</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Client</label>
                                <p class="mb-0">{{ $report->project->client }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Weather & Site Conditions -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title mb-0">
                            <span class="material-icons-round me-2">wb_sunny</span>
                            Weather & Site Conditions
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label class="form-label fw-bold">Weather Condition</label>
                                <div class="d-flex align-items-center">
                                    <span class="material-icons-round me-2 text-primary">cloud</span>
                                    <span class="text-capitalize">{{ $report->weather_condition ?? 'Not recorded' }}</span>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label fw-bold">Temperature</label>
                                <div class="d-flex align-items-center">
                                    <span class="material-icons-round me-2 text-danger">thermostat</span>
                                    <span>{{ $report->temperature ? $report->temperature . '°C' : 'N/A' }}</span>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label fw-bold">Wind Speed</label>
                                <div class="d-flex align-items-center">
                                    <span class="material-icons-round me-2 text-info">air</span>
                                    <span>{{ $report->wind_speed ? $report->wind_speed . ' km/h' : 'N/A' }}</span>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label fw-bold">Site Condition</label>
                                <div class="d-flex align-items-center">
                                    <span class="material-icons-round me-2 text-success">landscape</span>
                                    <span class="text-capitalize">{{ $report->site_condition ?? 'Not recorded' }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Work Progress -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title mb-0">
                            <span class="material-icons-round me-2">construction</span>
                            Work Progress
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-4">
                            <label class="form-label fw-bold">Work Description</label>
                            <p class="mb-0">{{ $report->work_description }}</p>
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-bold">Overall Progress</label>
                                <div class="progress mb-2" style="height: 12px;">
                                    <div class="progress-bar bg-success" style="width: {{ $report->progress }}%"></div>
                                </div>
                                <span class="fw-bold">{{ $report->progress }}% Complete</span>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-bold">Work Hours</label>
                                <div class="d-flex align-items-center">
                                    <span class="material-icons-round me-2 text-warning">schedule</span>
                                    <span>{{ $report->work_hours ?? 'N/A' }} hours</span>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-bold">Workers Present</label>
                                <div class="d-flex align-items-center">
                                    <span class="material-icons-round me-2 text-info">groups</span>
                                    <span>{{ $report->workers_present ?? 'N/A' }} workers</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Issues & Challenges -->
                @if ($report->issues_encountered || $report->solutions_applied)
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <span class="material-icons-round me-2">warning</span>
                                Issues & Challenges
                            </h5>
                        </div>
                        <div class="card-body">
                            @if ($report->issues_encountered)
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-danger">Issues Encountered</label>
                                    <p class="mb-0">{{ $report->issues_encountered }}</p>
                                </div>
                            @endif

                            @if ($report->solutions_applied)
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-success">Solutions Applied</label>
                                    <p class="mb-0">{{ $report->solutions_applied }}</p>
                                </div>
                            @endif

                            @if ($report->has_critical_issue || $report->has_delay)
                                <div class="alert alert-warning">
                                    <div class="d-flex">
                                        <span class="material-icons-round me-2">priority_high</span>
                                        <div>
                                            <h6 class="alert-heading">Important Notes</h6>
                                            @if ($report->has_critical_issue)
                                                <p class="mb-1">• Contains critical issues requiring immediate attention
                                                </p>
                                            @endif
                                            @if ($report->has_delay)
                                                <p class="mb-0">• Work progress is delayed due to issues</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                @endif

                <!-- Materials & Equipment -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title mb-0">
                            <span class="material-icons-round me-2">inventory_2</span>
                            Materials & Equipment
                        </h5>
                    </div>
                    <div class="card-body">
                        @if ($report->materials_used)
                            <div class="mb-4">
                                <label class="form-label fw-bold">Materials Used</label>
                                <p class="mb-0">{{ $report->materials_used }}</p>
                            </div>
                        @endif

                        @if ($report->equipment_status)
                            <div class="mb-4">
                                <label class="form-label fw-bold">Equipment Status</label>
                                <p class="mb-0">{{ $report->equipment_status }}</p>
                            </div>
                        @endif

                        @if ($report->material_delivery)
                            <div>
                                <label class="form-label fw-bold">Material Delivery Status</label>
                                <div class="d-flex align-items-center">
                                    @if ($report->material_delivery === 'ontime')
                                        <span class="badge bg-success me-2">On Time</span>
                                        <span>Materials delivered as scheduled</span>
                                    @elseif($report->material_delivery === 'delayed')
                                        <span class="badge bg-warning me-2">Delayed</span>
                                        <span>Material delivery was delayed</span>
                                    @elseif($report->material_delivery === 'pending')
                                        <span class="badge bg-info me-2">Pending</span>
                                        <span>Materials pending delivery</span>
                                    @endif
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Safety & Compliance -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title mb-0">
                            <span class="material-icons-round me-2">security</span>
                            Safety & Compliance
                        </h5>
                    </div>
                    <div class="card-body">
                        @if ($report->safety_observations)
                            <div class="mb-4">
                                <label class="form-label fw-bold">Safety Observations</label>
                                <p class="mb-0">{{ $report->safety_observations }}</p>
                            </div>
                        @endif

                        @if ($report->incidents_report)
                            <div class="mb-4">
                                <label class="form-label fw-bold text-danger">Incidents Report</label>
                                <p class="mb-0">{{ $report->incidents_report }}</p>
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-md-4 mb-2">
                                <div class="d-flex align-items-center">
                                    <span
                                        class="material-icons-round me-2 {{ $report->safety_meeting_held ? 'text-success' : 'text-muted' }}">
                                        {{ $report->safety_meeting_held ? 'check_circle' : 'radio_button_unchecked' }}
                                    </span>
                                    <span>Safety Meeting Held</span>
                                </div>
                            </div>
                            <div class="col-md-4 mb-2">
                                <div class="d-flex align-items-center">
                                    <span
                                        class="material-icons-round me-2 {{ $report->ppe_compliance ? 'text-success' : 'text-muted' }}">
                                        {{ $report->ppe_compliance ? 'check_circle' : 'radio_button_unchecked' }}
                                    </span>
                                    <span>PPE Compliance</span>
                                </div>
                            </div>
                            <div class="col-md-4 mb-2">
                                <div class="d-flex align-items-center">
                                    <span
                                        class="material-icons-round me-2 {{ $report->safety_audit_done ? 'text-success' : 'text-muted' }}">
                                        {{ $report->safety_audit_done ? 'check_circle' : 'radio_button_unchecked' }}
                                    </span>
                                    <span>Safety Audit Done</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Next Day Plan -->
                @if ($report->next_day_plan || $report->required_materials || $report->special_instructions)
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <span class="material-icons-round me-2">next_plan</span>
                                Next Day Plan
                            </h5>
                        </div>
                        <div class="card-body">
                            @if ($report->next_day_plan)
                                <div class="mb-4">
                                    <label class="form-label fw-bold">Plan for Next Day</label>
                                    <p class="mb-0">{{ $report->next_day_plan }}</p>
                                </div>
                            @endif

                            @if ($report->required_materials)
                                <div class="mb-4">
                                    <label class="form-label fw-bold">Materials Required</label>
                                    <p class="mb-0">{{ $report->required_materials }}</p>
                                </div>
                            @endif

                            @if ($report->special_instructions)
                                <div class="mb-4">
                                    <label class="form-label fw-bold">Special Instructions</label>
                                    <p class="mb-0">{{ $report->special_instructions }}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                @endif

                <!-- Attachments -->
                @if ($report->attachments && count($report->attachments) > 0)
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <span class="material-icons-round me-2">attachment</span>
                                Attachments ({{ count($report->attachments) }})
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @foreach ($report->attachments as $attachment)
                                    <div class="col-md-6 col-lg-4 mb-3">
                                        <div class="attachment-card border rounded p-3">
                                            <div class="d-flex align-items-center">
                                                <span class="material-icons-round text-primary me-2">
                                                    {{ $attachment->type === 'image' ? 'image' : 'description' }}
                                                </span>
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-1">{{ $attachment->name }}</h6>
                                                    <small class="text-muted">{{ $attachment->size }}</small>
                                                </div>
                                                <a href="{{ $attachment->url }}" class="btn btn-sm btn-outline-primary"
                                                    target="_blank" download>
                                                    <span class="material-icons-round"
                                                        style="font-size: 16px;">download</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Right Column - Sidebar -->
            <div class="col-lg-4 col-12">
                <!-- Report Status -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Report Status</h5>
                    </div>
                    <div class="card-body">
                        <div class="status-timeline">
                            <div class="timeline-item {{ $report->created_at ? 'active' : '' }}">
                                <div class="timeline-marker"></div>
                                <div class="timeline-content">
                                    <h6 class="mb-1">Report Created</h6>
                                    <small class="text-muted">{{ $report->created_at->format('M d, Y H:i') }}</small>
                                </div>
                            </div>
                            <div class="timeline-item {{ $report->submitted_at ? 'active' : '' }}">
                                <div class="timeline-marker"></div>
                                <div class="timeline-content">
                                    <h6 class="mb-1">Report Submitted</h6>
                                    <small class="text-muted">
                                        {{ $report->submitted_at ? $report->submitted_at->format('M d, Y H:i') : 'Pending' }}
                                    </small>
                                </div>
                            </div>
                            <div class="timeline-item {{ $report->reviewed_at ? 'active' : '' }}">
                                <div class="timeline-marker"></div>
                                <div class="timeline-content">
                                    <h6 class="mb-1">Under Review</h6>
                                    <small class="text-muted">
                                        {{ $report->reviewed_at ? $report->reviewed_at->format('M d, Y H:i') : 'Pending' }}
                                    </small>
                                </div>
                            </div>
                            <div class="timeline-item {{ $report->approved_at ? 'active' : '' }}">
                                <div class="timeline-marker"></div>
                                <div class="timeline-content">
                                    <h6 class="mb-1">Approved</h6>
                                    <small class="text-muted">
                                        {{ $report->approved_at ? $report->approved_at->format('M d, Y H:i') : 'Pending' }}
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Quick Actions</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-grid gap-2">
                            <button class="btn btn-outline-primary d-flex align-items-center justify-content-center py-2"
                                onclick="window.location.href='{{ route('site_reports.edit', $report->id) }}'">
                                <span class="material-icons-round me-2">edit</span>
                                Edit Report
                            </button>
                            <button class="btn btn-outline-success d-flex align-items-center justify-content-center py-2"
                                onclick="shareReport()">
                                <span class="material-icons-round me-2">share</span>
                                Share Report
                            </button>
                            <button class="btn btn-outline-warning d-flex align-items-center justify-content-center py-2"
                                onclick="addComment()">
                                <span class="material-icons-round me-2">comment</span>
                                Add Comment
                            </button>
                            <button class="btn btn-outline-info d-flex align-items-center justify-content-center py-2"
                                onclick="generateSummary()">
                                <span class="material-icons-round me-2">summarize</span>
                                Generate Summary
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Approval Section -->
                @if (auth()->user()->can('approve', $report))
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Approval Actions</h5>
                        </div>
                        <div class="card-body">
                            <div class="d-grid gap-2">
                                @if ($report->status === 'submitted' || $report->status === 'under_review')
                                    <button class="btn btn-success d-flex align-items-center justify-content-center py-2"
                                        onclick="approveReport()">
                                        <span class="material-icons-round me-2">check_circle</span>
                                        Approve Report
                                    </button>
                                    <button class="btn btn-warning d-flex align-items-center justify-content-center py-2"
                                        onclick="requestRevision()">
                                        <span class="material-icons-round me-2">edit_note</span>
                                        Request Revision
                                    </button>
                                    <button class="btn btn-danger d-flex align-items-center justify-content-center py-2"
                                        onclick="rejectReport()">
                                        <span class="material-icons-round me-2">cancel</span>
                                        Reject Report
                                    </button>
                                @elseif($report->status === 'approved')
                                    <div class="alert alert-success">
                                        <div class="d-flex align-items-center">
                                            <span class="material-icons-round me-2">verified</span>
                                            <div>
                                                <h6 class="mb-1">Report Approved</h6>
                                                <small class="text-muted">By: {{ $report->approved_by }}</small>
                                                <br>
                                                <small class="text-muted">On:
                                                    {{ $report->approved_at->format('M d, Y') }}</small>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Related Reports -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Related Reports</h5>
                    </div>
                    <div class="card-body">
                        <div class="related-reports">
                            @foreach ($relatedReports as $relatedReport)
                                <div class="related-report-item mb-3 p-2 border rounded">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div>
                                            <h6 class="mb-1">{{ $relatedReport->title }}</h6>
                                            <small
                                                class="text-muted">{{ $relatedReport->report_date->format('M d, Y') }}</small>
                                        </div>
                                        <span
                                            class="badge bg-{{ $relatedReport->status_color }}">{{ $relatedReport->status }}</span>
                                    </div>
                                    <div class="mt-2">
                                        <a href="{{ route('site_reports.view', $relatedReport->id) }}"
                                            class="btn btn-sm btn-outline-primary">
                                            View
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Share Modal -->
    <div class="modal fade" id="shareModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Share Report</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="shareLink" class="form-label">Shareable Link</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="shareLink"
                                value="{{ route('site_reports.view', $report->id) }}" readonly>
                            <button class="btn btn-outline-secondary" type="button" onclick="copyShareLink()">
                                <span class="material-icons-round">content_copy</span>
                            </button>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Share via</label>
                        <div class="d-flex gap-2">
                            <button class="btn btn-outline-primary flex-fill" onclick="shareViaEmail()">
                                <span class="material-icons-round me-1">email</span>
                                Email
                            </button>
                            <button class="btn btn-outline-info flex-fill" onclick="shareViaWhatsApp()">
                                <span class="material-icons-round me-1">chat</span>
                                WhatsApp
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .status-timeline {
            position: relative;
            padding-left: 20px;
        }

        .timeline-item {
            position: relative;
            padding: 10px 0;
            border-left: 2px solid #e9ecef;
        }

        .timeline-item.active {
            border-left-color: #3b82f6;
        }

        .timeline-item:last-child {
            border-left: 2px solid transparent;
        }

        .timeline-marker {
            position: absolute;
            left: -11px;
            top: 15px;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: #e9ecef;
            border: 3px solid white;
        }

        .timeline-item.active .timeline-marker {
            background: #3b82f6;
        }

        .timeline-content {
            padding-left: 15px;
        }

        .rating-value {
            font-size: 2rem;
            font-weight: bold;
            color: #f59e0b;
        }

        .stars .material-icons-round {
            font-size: 24px;
        }

        .attachment-card {
            transition: all 0.3s ease;
        }

        .attachment-card:hover {
            border-color: #3b82f6 !important;
            background-color: #f8f9fa;
        }

        .related-report-item {
            transition: all 0.3s ease;
        }

        .related-report-item:hover {
            border-color: #3b82f6 !important;
            background-color: #f8f9fa;
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

            .container-xxl {
                max-width: 100% !important;
            }
        }
    </style>

    <script>
        function downloadPDF() {
            console.log('Downloading PDF for report:', {{ $report->id }});
            // Implement PDF download functionality
            // window.location.href = `/site_reports/{{ $report->id }}/download-pdf`;
        }

        function shareReport() {
            const shareModal = new bootstrap.Modal(document.getElementById('shareModal'));
            shareModal.show();
        }

        function copyShareLink() {
            const shareLink = document.getElementById('shareLink');
            shareLink.select();
            document.execCommand('copy');

            // Show toast notification
            showToast('Link copied to clipboard!', 'success');
        }

        function shareViaEmail() {
            const subject = `Site Report: {{ $report->title }}`;
            const body = `Please find the site report at: {{ route('site_reports.view', $report->id) }}`;
            window.location.href = `mailto:?subject=${encodeURIComponent(subject)}&body=${encodeURIComponent(body)}`;
        }

        function shareViaWhatsApp() {
            const text = `Site Report: {{ $report->title }}\n\nView at: {{ route('site_reports.view', $report->id) }}`;
            window.open(`https://wa.me/?text=${encodeURIComponent(text)}`, '_blank');
        }

        function addComment() {
            const comment = prompt('Enter your comment:');
            if (comment) {
                console.log('Adding comment:', comment);
                // Implement comment functionality
                // fetch(`/site_reports/{{ $report->id }}/comments`, {
                //     method: 'POST',
                //     body: JSON.stringify({ comment: comment }),
                //     headers: { 'Content-Type': 'application/json' }
                // });
            }
        }

        function generateSummary() {
            console.log('Generating summary for report:', {{ $report->id }});
            // Implement summary generation
        }

        function approveReport() {
            if (confirm('Are you sure you want to approve this report?')) {
                console.log('Approving report:', {{ $report->id }});
                // Implement approval functionality
                // fetch(`/site_reports/{{ $report->id }}/approve`, { method: 'POST' })
                // .then(response => response.json())
                // .then(data => {
                //     if (data.success) {
                //         location.reload();
                //     }
                // });
            }
        }

        function requestRevision() {
            const reason = prompt('Please specify the reason for revision:');
            if (reason) {
                console.log('Requesting revision:', reason);
                // Implement revision request
            }
        }

        function rejectReport() {
            const reason = prompt('Please specify the reason for rejection:');
            if (reason) {
                if (confirm('Are you sure you want to reject this report? This action cannot be undone.')) {
                    console.log('Rejecting report:', reason);
                    // Implement rejection functionality
                }
            }
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
                    case 'p':
                        e.preventDefault();
                        window.print();
                        break;
                    case 's':
                        e.preventDefault();
                        downloadPDF();
                        break;
                    case 'e':
                        e.preventDefault();
                        window.location.href = '{{ route('site_reports.edit', $report->id) }}';
                        break;
                }
            }
        });

        // Add to favorites
        function toggleFavorite() {
            console.log('Toggling favorite for report:', {{ $report->id }});
            // Implement favorite functionality
        }
    </script>
@endsection
