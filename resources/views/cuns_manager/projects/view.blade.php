@extends('cuns_manager.layouts.main')

@section('title', 'View Project - Construction Manager')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    
    <!-- Page Header -->
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="fw-bold py-3 mb-0">
                    <span class="text-muted fw-light">Projects /</span> Project Details
                </h4>
                <div class="d-flex gap-2">
                    <a href="{{ route('cuns_manager.projects.edit', ['id' => $project['id'] ?? 1]) }}" class="btn btn-outline-secondary">
                        <span class="material-icons-round me-2">edit</span>
                        Edit Project
                    </a>
                    <a href="{{ route('cuns_manager.projects.index') }}" class="btn btn-outline-primary">
                        <span class="material-icons-round me-2">arrow_back</span>
                        Back to Projects
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Project Overview -->
    <div class="row">
        <!-- Project Details -->
        <div class="col-lg-8 mb-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Project Overview</h5>
                    <span class="badge bg-warning">In Progress</span>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted">Project Name</label>
                            <h6>{{ $project['name'] ?? 'Office Building Construction' }}</h6>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted">Project Code</label>
                            <h6>PROJ-001</h6>
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label text-muted">Description</label>
                            <p class="mb-0">{{ $project['description'] ?? 'Construction of 10-story office building with parking facility' }}</p>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label text-muted">Client</label>
                            <h6>{{ $project['client'] ?? 'ABC Corporation' }}</h6>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label text-muted">Project Manager</label>
                            <h6>{{ $project['manager'] ?? 'Rajesh Kumar' }}</h6>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label text-muted">Location</label>
                            <h6>{{ $project['location'] ?? 'Sector 62, Noida' }}</h6>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Progress & Timeline -->
            <div class="row mt-4">
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title mb-0">Project Progress</h6>
                        </div>
                        <div class="card-body text-center">
                            <div class="progress-circle mb-3">
                                <div class="position-relative d-inline-block">
                                    <svg width="120" height="120" viewBox="0 0 120 120">
                                        <circle cx="60" cy="60" r="54" fill="none" stroke="#e2e8f0" stroke-width="8"/>
                                        <circle cx="60" cy="60" r="54" fill="none" stroke="#3b82f6" stroke-width="8" 
                                                stroke-dasharray="339.292" stroke-dashoffset="{{ 339.292 * (1 - {{ $project['progress'] ?? 65 }}/100) }}"
                                                stroke-linecap="round" transform="rotate(-90 60 60)"/>
                                    </svg>
                                    <div class="position-absolute top-50 start-50 translate-middle">
                                        <h3 class="mb-0">{{ $project['progress'] ?? 65 }}%</h3>
                                        <small class="text-muted">Complete</small>
                                    </div>
                                </div>
                            </div>
                            <div class="progress-bars">
                                <div class="d-flex justify-content-between mb-2">
                                    <span>Site Preparation</span>
                                    <span>100%</span>
                                </div>
                                <div class="progress mb-3" style="height: 6px;">
                                    <div class="progress-bar bg-success" style="width: 100%"></div>
                                </div>
                                
                                <div class="d-flex justify-content-between mb-2">
                                    <span>Foundation</span>
                                    <span>100%</span>
                                </div>
                                <div class="progress mb-3" style="height: 6px;">
                                    <div class="progress-bar bg-success" style="width: 100%"></div>
                                </div>
                                
                                <div class="d-flex justify-content-between mb-2">
                                    <span>Structure</span>
                                    <span>65%</span>
                                </div>
                                <div class="progress mb-3" style="height: 6px;">
                                    <div class="progress-bar bg-primary" style="width: 65%"></div>
                                </div>
                                
                                <div class="d-flex justify-content-between mb-2">
                                    <span>Electrical & Plumbing</span>
                                    <span>0%</span>
                                </div>
                                <div class="progress mb-3" style="height: 6px;">
                                    <div class="progress-bar bg-secondary" style="width: 0%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title mb-0">Timeline</h6>
                        </div>
                        <div class="card-body">
                            <div class="timeline">
                                <div class="timeline-item mb-3">
                                    <div class="d-flex">
                                        <div class="timeline-badge bg-success">
                                            <span class="material-icons-round" style="font-size: 16px;">check</span>
                                        </div>
                                        <div class="timeline-content ms-3">
                                            <h6 class="mb-1">Site Preparation</h6>
                                            <p class="mb-1 text-muted">Completed</p>
                                            <small class="text-muted">Jan 30, 2024</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="timeline-item mb-3">
                                    <div class="d-flex">
                                        <div class="timeline-badge bg-success">
                                            <span class="material-icons-round" style="font-size: 16px;">check</span>
                                        </div>
                                        <div class="timeline-content ms-3">
                                            <h6 class="mb-1">Foundation Work</h6>
                                            <p class="mb-1 text-muted">Completed</p>
                                            <small class="text-muted">Feb 28, 2024</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="timeline-item mb-3">
                                    <div class="d-flex">
                                        <div class="timeline-badge bg-primary">
                                            <span class="material-icons-round" style="font-size: 16px;">build</span>
                                        </div>
                                        <div class="timeline-content ms-3">
                                            <h6 class="mb-1">Structure Construction</h6>
                                            <p class="mb-1 text-muted">In Progress</p>
                                            <small class="text-muted">Due: Apr 15, 2024</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="d-flex">
                                        <div class="timeline-badge bg-secondary">
                                            <span class="material-icons-round" style="font-size: 16px;">schedule</span>
                                        </div>
                                        <div class="timeline-content ms-3">
                                            <h6 class="mb-1">Finishing Work</h6>
                                            <p class="mb-1 text-muted">Pending</p>
                                            <small class="text-muted">Due: Jun 15, 2024</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar Information -->
        <div class="col-lg-4 mb-4">
            <!-- Budget Summary -->
            <div class="card mb-4">
                <div class="card-header">
                    <h6 class="card-title mb-0">Budget Summary</h6>
                </div>
                <div class="card-body">
                    <div class="budget-item mb-3">
                        <div class="d-flex justify-content-between mb-1">
                            <span class="text-muted">Total Budget</span>
                            <span class="fw-bold">₹2,50,00,000</span>
                        </div>
                    </div>
                    <div class="budget-item mb-3">
                        <div class="d-flex justify-content-between mb-1">
                            <span class="text-muted">Utilized</span>
                            <span class="text-success">₹1,60,00,000</span>
                        </div>
                    </div>
                    <div class="budget-item mb-3">
                        <div class="d-flex justify-content-between mb-1">
                            <span class="text-muted">Remaining</span>
                            <span class="text-primary">₹90,00,000</span>
                        </div>
                    </div>
                    <div class="progress mb-2" style="height: 8px;">
                        <div class="progress-bar bg-success" style="width: 64%"></div>
                    </div>
                    <small class="text-muted">64% of budget utilized</small>
                </div>
            </div>

            <!-- Key Metrics -->
            <div class="card mb-4">
                <div class="card-header">
                    <h6 class="card-title mb-0">Key Metrics</h6>
                </div>
                <div class="card-body">
                    <div class="metric-item d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <span class="material-icons-round text-primary me-2">groups</span>
                            <span>Team Size</span>
                        </div>
                        <span class="fw-bold">25</span>
                    </div>
                    <div class="metric-item d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <span class="material-icons-round text-success me-2">assignment</span>
                            <span>Total Tasks</span>
                        </div>
                        <span class="fw-bold">156</span>
                    </div>
                    <div class="metric-item d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <span class="material-icons-round text-warning me-2">warning</span>
                            <span>Issues</span>
                        </div>
                        <span class="fw-bold">3</span>
                    </div>
                    <div class="metric-item d-flex justify-content-between align-items-center">
                        <div>
                            <span class="material-icons-round text-info me-2">description</span>
                            <span>Documents</span>
                        </div>
                        <span class="fw-bold">12</span>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title mb-0">Quick Actions</h6>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <button class="btn btn-outline-primary btn-sm">
                            <span class="material-icons-round me-2">assignment</span>
                            View Tasks
                        </button>
                        <button class="btn btn-outline-success btn-sm">
                            <span class="material-icons-round me-2">assessment</span>
                            Generate Report
                        </button>
                        <button class="btn btn-outline-warning btn-sm">
                            <span class="material-icons-round me-2">chat</span>
                            Send Update
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<style>
.progress-circle {
    position: relative;
}

.timeline-badge {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
}

.timeline-content {
    flex: 1;
}

.budget-item {
    padding-bottom: 8px;
    border-bottom: 1px solid #e2e8f0;
}

.budget-item:last-child {
    border-bottom: none;
}

.metric-item {
    padding: 8px 0;
    border-bottom: 1px solid #f1f5f9;
}

.metric-item:last-child {
    border-bottom: none;
}
</style>
@endsection