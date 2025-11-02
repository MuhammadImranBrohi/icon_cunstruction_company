@extends('cuns_manager.layouts.main')

@section('title', 'Task Progress - Construction Manager')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <!-- Page Header -->
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="fw-bold py-3 mb-0">
                        <span class="text-muted fw-light">Tasks /</span> Progress Tracking
                    </h4>
                    <div class="d-flex gap-2">
                        <button class="btn btn-outline-secondary" data-bs-toggle="modal"
                            data-bs-target="#progressFiltersModal">
                            <span class="material-icons-round me-2">filter_alt</span>
                            Filters
                        </button>
                        <button class="btn btn-primary" onclick="window.location.href='{{ route('tasks.assign') }}'">
                            <span class="material-icons-round me-2">add_task</span>
                            New Task
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Progress Overview Cards -->
        <div class="row mb-4">
            <div class="col-xl-2 col-lg-4 col-md-4 col-6 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="card-info">
                            <h6 class="card-title text-muted mb-2">Total Tasks</h6>
                            <h4 class="text-primary mb-0">{{ $progressStats['total_tasks'] }}</h4>
                            <small class="text-muted">All Projects</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-4 col-md-4 col-6 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="card-info">
                            <h6 class="card-title text-muted mb-2">In Progress</h6>
                            <h4 class="text-info mb-0">{{ $progressStats['in_progress'] }}</h4>
                            <small class="text-success">+{{ $progressStats['progress_increase'] }}% this week</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-4 col-md-4 col-6 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="card-info">
                            <h6 class="card-title text-muted mb-2">Completed</h6>
                            <h4 class="text-success mb-0">{{ $progressStats['completed'] }}</h4>
                            <small class="text-muted">{{ $progressStats['completion_rate'] }}% rate</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-4 col-md-4 col-6 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="card-info">
                            <h6 class="card-title text-muted mb-2">Behind Schedule</h6>
                            <h4 class="text-warning mb-0">{{ $progressStats['behind_schedule'] }}</h4>
                            <small class="text-danger">Needs attention</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-4 col-md-4 col-6 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="card-info">
                            <h6 class="card-title text-muted mb-2">Overdue</h6>
                            <h4 class="text-danger mb-0">{{ $progressStats['overdue'] }}</h4>
                            <small class="text-muted">Critical</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-4 col-md-4 col-6 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="card-info">
                            <h6 class="card-title text-muted mb-2">Avg. Progress</h6>
                            <h4 class="text-secondary mb-0">{{ $progressStats['avg_progress'] }}%</h4>
                            <small class="text-muted">All active tasks</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Progress Tracking Section -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Active Tasks Progress</h5>
                        <div class="d-flex gap-2">
                            <div class="input-group input-group-merge" style="width: 300px;">
                                <span class="input-group-text">
                                    <span class="material-icons-round">search</span>
                                </span>
                                <input type="text" class="form-control" placeholder="Search tasks..." id="searchTasks">
                            </div>
                            <div class="dropdown">
                                <button class="btn btn-outline-secondary dropdown-toggle" type="button"
                                    data-bs-toggle="dropdown">
                                    <span class="material-icons-round me-2">sort</span>
                                    Sort By
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#" onclick="sortTasks('progress')">Progress</a>
                                    </li>
                                    <li><a class="dropdown-item" href="#" onclick="sortTasks('due_date')">Due Date</a>
                                    </li>
                                    <li><a class="dropdown-item" href="#" onclick="sortTasks('priority')">Priority</a>
                                    </li>
                                    <li><a class="dropdown-item" href="#" onclick="sortTasks('project')">Project</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="progress-tracking-list">
                            @foreach ($activeTasks as $task)
                                <div class="progress-item card mb-3">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-md-3">
                                                <div class="task-info">
                                                    <h6 class="mb-1">{{ $task['title'] }}</h6>
                                                    <div class="d-flex align-items-center">
                                                        <span
                                                            class="badge bg-light text-dark me-2">{{ $task['project_name'] }}</span>
                                                        <small class="text-muted">#{{ $task['task_code'] }}</small>
                                                    </div>
                                                    <div class="d-flex align-items-center mt-2">
                                                        <div class="avatar avatar-sm me-2">
                                                            <img src="{{ $task['assigned_to_avatar'] }}" alt="Avatar"
                                                                class="rounded-circle">
                                                        </div>
                                                        <small class="text-muted">{{ $task['assigned_to_name'] }}</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="priority-info text-center">
                                                    @if ($task['priority'] == 'high')
                                                        <span class="badge bg-danger">High Priority</span>
                                                    @elseif($task['priority'] == 'medium')
                                                        <span class="badge bg-warning">Medium</span>
                                                    @else
                                                        <span class="badge bg-success">Low</span>
                                                    @endif
                                                    <div class="mt-1">
                                                        <small class="text-muted">{{ $task['category'] }}</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="progress-section">
                                                    <div class="d-flex justify-content-between align-items-center mb-1">
                                                        <small class="text-muted">Progress</small>
                                                        <small class="fw-bold">{{ $task['progress'] }}%</small>
                                                    </div>
                                                    <div class="progress" style="height: 8px;">
                                                        <div class="progress-bar bg-{{ $task['progress_color'] }}"
                                                            style="width: {{ $task['progress'] }}%"></div>
                                                    </div>
                                                    <div class="d-flex justify-content-between align-items-center mt-1">
                                                        <small class="text-muted">Started:
                                                            {{ $task['start_date'] }}</small>
                                                        <small class="text-{{ $task['due_date_color'] }}">Due:
                                                            {{ $task['due_date'] }}</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="status-info text-center">
                                                    <span
                                                        class="badge bg-{{ $task['status_color'] }} mb-2">{{ $task['status'] }}</span>
                                                    <div>
                                                        <small class="text-muted">
                                                            @if ($task['days_remaining'] > 0)
                                                                {{ $task['days_remaining'] }} days left
                                                            @elseif($task['days_remaining'] == 0)
                                                                Due today
                                                            @else
                                                                {{ abs($task['days_remaining']) }} days overdue
                                                            @endif
                                                        </small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="action-buttons d-flex justify-content-end gap-2">
                                                    <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                                        data-bs-target="#updateProgressModal"
                                                        onclick="loadTaskForUpdate({{ $task['id'] }})">
                                                        <span class="material-icons-round"
                                                            style="font-size: 16px;">update</span>
                                                    </button>
                                                    <button class="btn btn-sm btn-outline-info"
                                                        onclick="viewTaskDetails({{ $task['id'] }})">
                                                        <span class="material-icons-round"
                                                            style="font-size: 16px;">visibility</span>
                                                    </button>
                                                    <button class="btn btn-sm btn-outline-secondary"
                                                        onclick="editTask({{ $task['id'] }})">
                                                        <span class="material-icons-round"
                                                            style="font-size: 16px;">edit</span>
                                                    </button>
                                                    <div class="dropdown">
                                                        <button class="btn btn-sm btn-outline-secondary dropdown-toggle"
                                                            type="button" data-bs-toggle="dropdown">
                                                            <span class="material-icons-round"
                                                                style="font-size: 16px;">more_vert</span>
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item" href="#"
                                                                    onclick="addComment({{ $task['id'] }})">Add
                                                                    Comment</a></li>
                                                            <li><a class="dropdown-item" href="#"
                                                                    onclick="attachFile({{ $task['id'] }})">Attach
                                                                    File</a></li>
                                                            <li>
                                                                <hr class="dropdown-divider">
                                                            </li>
                                                            <li><a class="dropdown-item text-danger" href="#"
                                                                    onclick="deleteTask({{ $task['id'] }})">Delete</a>
                                                            </li>
                                                        </ul>
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

        <!-- Progress Charts -->
        <div class="row mb-4">
            <!-- Progress Distribution -->
            <div class="col-lg-6 col-12 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Progress Distribution</h5>
                    </div>
                    <div class="card-body">
                        <canvas id="progressDistributionChart" height="250"></canvas>
                    </div>
                </div>
            </div>

            <!-- Weekly Progress Trend -->
            <div class="col-lg-6 col-12 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Weekly Progress Trend</h5>
                    </div>
                    <div class="card-body">
                        <canvas id="weeklyProgressChart" height="250"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Progress Updates -->
        <div class="row">
            <div class="col-lg-8 col-12 mb-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Recent Progress Updates</h5>
                        <button class="btn btn-sm btn-outline-primary" onclick="showAllUpdates()">
                            View All
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="updates-timeline">
                            @foreach ($recentUpdates as $update)
                                <div class="update-item d-flex align-items-start mb-4">
                                    <div class="update-avatar me-3">
                                        <img src="{{ $update['user_avatar'] }}" alt="Avatar" class="rounded-circle"
                                            width="40" height="40">
                                    </div>
                                    <div class="update-content flex-grow-1">
                                        <div class="d-flex justify-content-between align-items-start mb-1">
                                            <h6 class="mb-0">{{ $update['user_name'] }}</h6>
                                            <small class="text-muted">{{ $update['time_ago'] }}</small>
                                        </div>
                                        <p class="mb-1">{{ $update['message'] }}</p>
                                        <div class="d-flex align-items-center">
                                            <span class="badge bg-light text-dark me-2">{{ $update['task_name'] }}</span>
                                            <small class="text-muted">Progress: {{ $update['old_progress'] }}% →
                                                {{ $update['new_progress'] }}%</small>
                                        </div>
                                        @if ($update['attachments'] && count($update['attachments']) > 0)
                                            <div class="mt-2">
                                                <small class="text-muted">Attachments:</small>
                                                @foreach ($update['attachments'] as $attachment)
                                                    <a href="{{ $attachment['url'] }}"
                                                        class="btn btn-sm btn-outline-secondary ms-1" target="_blank">
                                                        <span class="material-icons-round me-1"
                                                            style="font-size: 14px;">attachment</span>
                                                        {{ $attachment['name'] }}
                                                    </a>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Progress Actions -->
            <div class="col-lg-4 col-12 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Quick Actions</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-grid gap-2">
                            <button class="btn btn-outline-primary d-flex align-items-center justify-content-center py-3"
                                data-bs-toggle="modal" data-bs-target="#bulkProgressModal">
                                <span class="material-icons-round me-2">update</span>
                                Bulk Progress Update
                            </button>
                            <button class="btn btn-outline-success d-flex align-items-center justify-content-center py-3"
                                onclick="generateProgressReport()">
                                <span class="material-icons-round me-2">summarize</span>
                                Generate Progress Report
                            </button>
                            <button class="btn btn-outline-warning d-flex align-items-center justify-content-center py-3"
                                data-bs-toggle="modal" data-bs-target="#scheduleReviewModal">
                                <span class="material-icons-round me-2">schedule</span>
                                Schedule Progress Review
                            </button>
                            <button class="btn btn-outline-info d-flex align-items-center justify-content-center py-3"
                                onclick="exportProgressData()">
                                <span class="material-icons-round me-2">download</span>
                                Export Progress Data
                            </button>
                        </div>

                        <!-- Upcoming Deadlines -->
                        <div class="mt-4">
                            <h6 class="mb-3">Upcoming Deadlines</h6>
                            <div class="deadlines-list">
                                @foreach ($upcomingDeadlines as $deadline)
                                    <div
                                        class="deadline-item d-flex align-items-center justify-content-between p-2 border rounded mb-2">
                                        <div>
                                            <h6 class="mb-0" style="font-size: 0.9rem;">{{ $deadline['task_name'] }}
                                            </h6>
                                            <small class="text-muted">{{ $deadline['project_name'] }}</small>
                                        </div>
                                        <div class="text-end">
                                            <small
                                                class="text-{{ $deadline['urgency_color'] }} fw-bold">{{ $deadline['days_left'] }}
                                                days</small>
                                            <br>
                                            <small class="text-muted">{{ $deadline['due_date'] }}</small>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Update Progress Modal -->
    <div class="modal fade" id="updateProgressModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Task Progress</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="updateProgressForm">
                        <input type="hidden" id="updateTaskId" name="task_id">
                        <div class="mb-3">
                            <label for="taskName" class="form-label">Task</label>
                            <input type="text" class="form-control" id="taskName" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="currentProgress" class="form-label">Current Progress</label>
                            <div class="d-flex align-items-center">
                                <input type="range" class="form-range flex-grow-1 me-3" id="currentProgress"
                                    min="0" max="100" step="5" value="0">
                                <span id="progressValue" class="fw-bold" style="min-width: 40px;">0%</span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="progressComment" class="form-label">Progress Comment</label>
                            <textarea class="form-control" id="progressComment" rows="3"
                                placeholder="Describe what has been completed..."></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="progressAttachments" class="form-label">Attachments</label>
                            <input type="file" class="form-control" id="progressAttachments" multiple
                                accept=".jpg,.jpeg,.png,.pdf,.doc,.docx">
                            <small class="text-muted">Upload photos, documents, or other supporting files</small>
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="markAsComplete">
                                <label class="form-check-label" for="markAsComplete">
                                    Mark task as completed when progress reaches 100%
                                </label>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="saveProgressUpdate()">Save Progress</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bulk Progress Modal -->
    <div class="modal fade" id="bulkProgressModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Bulk Progress Update</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="selectAllTasks">
                                        </div>
                                    </th>
                                    <th>Task</th>
                                    <th>Current Progress</th>
                                    <th>New Progress</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($activeTasks as $task)
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input task-checkbox" type="checkbox"
                                                    value="{{ $task['id'] }}">
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <h6 class="mb-0" style="font-size: 0.9rem;">{{ $task['title'] }}</h6>
                                                <small class="text-muted">{{ $task['project_name'] }}</small>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="progress" style="height: 6px; width: 80px;">
                                                <div class="progress-bar bg-{{ $task['progress_color'] }}"
                                                    style="width: {{ $task['progress'] }}%"></div>
                                            </div>
                                            <small>{{ $task['progress'] }}%</small>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control form-control-sm"
                                                style="width: 80px;" min="0" max="100"
                                                value="{{ $task['progress'] }}">
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="saveBulkProgress()">Update Selected</button>
                </div>
            </div>
        </div>
    </div>

    <style>
        .progress-item {
            transition: all 0.3s ease;
            border: 1px solid #e2e8f0;
        }

        .progress-item:hover {
            border-color: #3b82f6;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .update-item {
            padding: 15px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .update-item:hover {
            background-color: #f8f9fa;
        }

        .deadline-item {
            transition: all 0.3s ease;
        }

        .deadline-item:hover {
            border-color: #3b82f6 !important;
            background-color: #f8f9fa;
        }

        .progress-section .progress {
            background-color: #e2e8f0;
        }

        .avatar {
            width: 32px;
            height: 32px;
        }

        .avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .action-buttons .btn {
            padding: 4px 8px;
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize charts
            initializeProgressCharts();

            // Progress slider
            const progressSlider = document.getElementById('currentProgress');
            const progressValue = document.getElementById('progressValue');

            if (progressSlider) {
                progressSlider.addEventListener('input', function() {
                    progressValue.textContent = this.value + '%';
                });
            }

            // Search functionality
            const searchInput = document.getElementById('searchTasks');
            if (searchInput) {
                searchInput.addEventListener('input', function() {
                    const searchTerm = this.value.toLowerCase();
                    const items = document.querySelectorAll('.progress-item');

                    items.forEach(item => {
                        const text = item.textContent.toLowerCase();
                        item.style.display = text.includes(searchTerm) ? '' : 'none';
                    });
                });
            }

            // Select all functionality for bulk update
            const selectAll = document.getElementById('selectAllTasks');
            if (selectAll) {
                selectAll.addEventListener('change', function() {
                    const checkboxes = document.querySelectorAll('.task-checkbox');
                    checkboxes.forEach(checkbox => {
                        checkbox.checked = this.checked;
                    });
                });
            }
        });

        function initializeProgressCharts() {
            // Progress Distribution Chart
            const distributionCtx = document.getElementById('progressDistributionChart').getContext('2d');
            new Chart(distributionCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Not Started (0%)', 'Just Started (1-25%)', 'In Progress (26-75%)',
                        'Almost Done (76-99%)', 'Completed (100%)'
                    ],
                    datasets: [{
                        data: {!! json_encode($progressDistribution) !!},
                        backgroundColor: [
                            '#ef4444', '#f59e0b', '#3b82f6', '#8b5cf6', '#10b981'
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

            // Weekly Progress Chart
            const weeklyCtx = document.getElementById('weeklyProgressChart').getContext('2d');
            new Chart(weeklyCtx, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($weeklyProgress['weeks']) !!},
                    datasets: [{
                        label: 'Tasks Completed',
                        data: {!! json_encode($weeklyProgress['completed']) !!},
                        backgroundColor: '#10b981'
                    }, {
                        label: 'Tasks Started',
                        data: {!! json_encode($weeklyProgress['started']) !!},
                        backgroundColor: '#3b82f6'
                    }]
                },
                options: {
                    responsive: true,
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
        }

        function loadTaskForUpdate(taskId) {
            // In a real application, this would fetch task data from the server
            const task = {!! json_encode($activeTasks[0] ?? []) !!}; // Example task

            document.getElementById('updateTaskId').value = taskId;
            document.getElementById('taskName').value = task.title || 'Task #' + taskId;
            document.getElementById('currentProgress').value = task.progress || 0;
            document.getElementById('progressValue').textContent = (task.progress || 0) + '%';
        }

        function saveProgressUpdate() {
            const form = document.getElementById('updateProgressForm');
            const taskId = document.getElementById('updateTaskId').value;
            const progress = document.getElementById('currentProgress').value;
            const comment = document.getElementById('progressComment').value;

            console.log('Saving progress update:', {
                taskId,
                progress,
                comment
            });
            // Implement API call to save progress

            const modal = bootstrap.Modal.getInstance(document.getElementById('updateProgressModal'));
            modal.hide();

            // Show success message
            showToast('Progress updated successfully!', 'success');
        }

        function saveBulkProgress() {
            const selectedTasks = document.querySelectorAll('.task-checkbox:checked');
            const updates = [];

            selectedTasks.forEach(checkbox => {
                const taskId = checkbox.value;
                const progressInput = checkbox.closest('tr').querySelector('input[type="number"]');
                const newProgress = progressInput.value;

                updates.push({
                    taskId,
                    progress: newProgress
                });
            });

            console.log('Bulk progress update:', updates);
            // Implement bulk update API call

            const modal = bootstrap.Modal.getInstance(document.getElementById('bulkProgressModal'));
            modal.hide();

            showToast(`Progress updated for ${updates.length} tasks`, 'success');
        }

        function sortTasks(criteria) {
            console.log('Sorting tasks by:', criteria);
            // Implement sorting logic
        }

        function viewTaskDetails(taskId) {
            window.location.href = `/tasks/view/${taskId}`;
        }

        function editTask(taskId) {
            window.location.href = `/tasks/edit/${taskId}`;
        }

        function addComment(taskId) {
            // Implement add comment functionality
            console.log('Adding comment to task:', taskId);
        }

        function attachFile(taskId) {
            // Implement file attachment functionality
            console.log('Attaching file to task:', taskId);
        }

        function deleteTask(taskId) {
            if (confirm('Are you sure you want to delete this task?')) {
                console.log('Deleting task:', taskId);
                // Implement delete API call
            }
        }

        function generateProgressReport() {
            console.log('Generating progress report');
            // Implement report generation
        }

        function exportProgressData() {
            console.log('Exporting progress data');
            // Implement export functionality
        }

        function showAllUpdates() {
            window.location.href = '/tasks/updates';
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
    </script>
@endsection
