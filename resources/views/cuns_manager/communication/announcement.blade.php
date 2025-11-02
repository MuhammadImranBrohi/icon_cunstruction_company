@extends('cuns_manager.layouts.main')

@section('title', 'Announcements - Construction Manager')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <!-- Page Header -->
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="fw-bold py-3 mb-0">
                        <span class="text-muted fw-light">Communication /</span> Announcements
                    </h4>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newAnnouncementModal">
                        <span class="material-icons-round me-2">campaign</span>
                        New Announcement
                    </button>
                </div>
            </div>
        </div>

        <!-- Announcement Filters -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 mb-2">
                                <label class="form-label">Status</label>
                                <select class="form-select" id="statusFilter">
                                    <option value="">All Status</option>
                                    <option value="active">Active</option>
                                    <option value="expired">Expired</option>
                                    <option value="draft">Draft</option>
                                </select>
                            </div>
                            <div class="col-md-3 mb-2">
                                <label class="form-label">Priority</label>
                                <select class="form-select" id="priorityFilter">
                                    <option value="">All Priorities</option>
                                    <option value="high">High</option>
                                    <option value="medium">Medium</option>
                                    <option value="low">Low</option>
                                </select>
                            </div>
                            <div class="col-md-3 mb-2">
                                <label class="form-label">Site</label>
                                <select class="form-select" id="siteFilter">
                                    <option value="">All Sites</option>
                                    <option value="site1">Site A</option>
                                    <option value="site2">Site B</option>
                                </select>
                            </div>
                            <div class="col-md-3 mb-2 d-flex align-items-end">
                                <button class="btn btn-outline-primary w-100" onclick="applyFilters()">
                                    <span class="material-icons-round me-2">filter_alt</span>
                                    Apply Filters
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Announcements List -->
        <div class="row">
            <div class="col-12">
                @foreach ($announcements as $announcement)
                    <div
                        class="card mb-4 announcement-card {{ $announcement['priority'] == 'high' ? 'border-danger' : '' }}">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title mb-0">{{ $announcement['title'] }}</h5>
                                <div class="d-flex align-items-center mt-1">
                                    @if ($announcement['priority'] == 'high')
                                        <span class="badge bg-danger me-2">High Priority</span>
                                    @elseif($announcement['priority'] == 'medium')
                                        <span class="badge bg-warning me-2">Medium Priority</span>
                                    @else
                                        <span class="badge bg-secondary me-2">Low Priority</span>
                                    @endif
                                    <small class="text-muted">
                                        <span class="material-icons-round" style="font-size: 16px;">schedule</span>
                                        {{ $announcement['created_at'] }}
                                    </small>
                                </div>
                            </div>
                            <div class="dropdown">
                                <button class="btn btn-outline-secondary btn-sm dropdown-toggle" data-bs-toggle="dropdown">
                                    <span class="material-icons-round">more_vert</span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Edit</a></li>
                                    <li><a class="dropdown-item" href="#">Duplicate</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item text-danger" href="#">Delete</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="card-text">{{ $announcement['content'] }}</p>

                            @if ($announcement['attachments'])
                                <div class="mt-3">
                                    <h6 class="mb-2">Attachments:</h6>
                                    <div class="d-flex flex-wrap gap-2">
                                        @foreach ($announcement['attachments'] as $attachment)
                                            <div class="border rounded p-2">
                                                <div class="d-flex align-items-center">
                                                    <span class="material-icons-round text-primary me-2">description</span>
                                                    <div>
                                                        <small class="fw-medium d-block">{{ $attachment['name'] }}</small>
                                                        <small class="text-muted">{{ $attachment['size'] }}</small>
                                                    </div>
                                                    <button class="btn btn-sm btn-outline-primary ms-2">
                                                        <span class="material-icons-round"
                                                            style="font-size: 16px;">download</span>
                                                    </button>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif

                            <div class="mt-3 pt-3 border-top">
                                <div class="row">
                                    <div class="col-md-6">
                                        <small class="text-muted">
                                            <strong>Target Audience:</strong> {{ $announcement['audience'] }}
                                        </small>
                                    </div>
                                    <div class="col-md-6 text-end">
                                        <small class="text-muted">
                                            <strong>Expires:</strong> {{ $announcement['expires_at'] }}
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-light">
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-muted">
                                    Published by: {{ $announcement['author'] }}
                                </small>
                                <div class="d-flex align-items-center">
                                    <span class="material-icons-round text-muted me-1"
                                        style="font-size: 16px;">visibility</span>
                                    <small class="text-muted">{{ $announcement['views'] }} views</small>
                                    <span class="material-icons-round text-muted mx-2"
                                        style="font-size: 16px;">thumb_up</span>
                                    <small class="text-muted">{{ $announcement['likes'] }} acknowledgments</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>

    <!-- New Announcement Modal -->
    <div class="modal fade" id="newAnnouncementModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create New Announcement</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="announcementForm">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label class="form-label">Title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="Enter announcement title"
                                    required>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label">Content <span class="text-danger">*</span></label>
                                <textarea class="form-control" rows="5" placeholder="Type your announcement..." required></textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Priority</label>
                                <select class="form-select">
                                    <option value="low">Low</option>
                                    <option value="medium" selected>Medium</option>
                                    <option value="high">High</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Target Sites</label>
                                <select class="form-select" multiple>
                                    <option value="all" selected>All Sites</option>
                                    <option value="site1">Site A</option>
                                    <option value="site2">Site B</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Expiry Date</label>
                                <input type="date" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Attachments</label>
                                <input type="file" class="form-control" multiple>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="requireAck">
                                    <label class="form-check-label" for="requireAck">
                                        Require acknowledgment from recipients
                                    </label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Publish Announcement</button>
                </div>
            </div>
        </div>
    </div>

    <style>
        .announcement-card:hover {
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
        }
    </style>

    <script>
        function applyFilters() {
            // Implement filter functionality
            console.log('Applying filters...');
        }
    </script>
@endsection
