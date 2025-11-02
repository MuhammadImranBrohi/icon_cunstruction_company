@extends('cuns_manager.layouts.main')

@section('title', 'Tasks - Construction Manager')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <!-- Page Header -->
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="fw-bold py-3 mb-0">
                        <span class="text-muted fw-light">Tasks /</span> All Tasks
                    </h4>
                    <div class="d-flex gap-2">
                        <button class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#taskFiltersModal">
                            <span class="material-icons-round me-2">filter_alt</span>
                            Filters
                        </button>
                        <button class="btn btn-primary" onclick="window.location.href='{{ route('tasks.assign') }}'">
                            <span class="material-icons-round me-2">add_task</span>
                            Assign Task
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Task Statistics -->
        <div class="row mb-4">
            <div class="col-xl-2 col-lg-4 col-md-4 col-6 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="card-info">
                            <h6 class="card-title text-muted mb-2">Total</h6>
                            <h4 class="text-primary mb-0">{{ $stats['total_tasks'] }}</h4>
                            <small class="text-muted">All Tasks</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-4 col-md-4 col-6 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="card-info">
                            <h6 class="card-title text-muted mb-2">Pending</h6>
                            <h4 class="text-warning mb-0">{{ $stats['pending_tasks'] }}</h4>
                            <small class="text-muted">To Do</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-4 col-md-4 col-6 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="card-info">
                            <h6 class="card-title text-muted mb-2">In Progress</h6>
                            <h4 class="text-info mb-0">{{ $stats['in_progress_tasks'] }}</h4>
                            <small class="text-muted">Working</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-4 col-md-4 col-6 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="card-info">
                            <h6 class="card-title text-muted mb-2">Completed</h6>
                            <h4 class="text-success mb-0">{{ $stats['completed_tasks'] }}</h4>
                            <small class="text-muted">Done</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-4 col-md-4 col-6 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="card-info">
                            <h6 class="card-title text-muted mb-2">Overdue</h6>
                            <h4 class="text-danger mb-0">{{ $stats['overdue_tasks'] }}</h4>
                            <small class="text-muted">Delayed</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-4 col-md-4 col-6 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="card-info">
                            <h6 class="card-title text-muted mb-2">This Week</h6>
                            <h4 class="text-secondary mb-0">{{ $stats['this_week_tasks'] }}</h4>
                            <small class="text-muted">Due Soon</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Filters -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-wrap gap-2">
                            <button class="btn btn-outline-primary active" onclick="filterTasks('all')">
                                All Tasks ({{ $stats['total_tasks'] }})
                            </button>
                            <button class="btn btn-outline-warning" onclick="filterTasks('pending')">
                                Pending ({{ $stats['pending_tasks'] }})
                            </button>
                            <button class="btn btn-outline-info" onclick="filterTasks('in_progress')">
                                In Progress ({{ $stats['in_progress_tasks'] }})
                            </button>
                            <button class="btn btn-outline-success" onclick="filterTasks('completed')">
                                Completed ({{ $stats['completed_tasks'] }})
                            </button>
                            <button class="btn btn-outline-danger" onclick="filterTasks('overdue')">
                                Overdue ({{ $stats['overdue_tasks'] }})
                            </button>
                            <div class="ms-auto d-flex gap-2">
                                <button class="btn btn-outline-secondary" onclick="exportTasks()">
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
                                        <li><a class="dropdown-item" href="#" onclick="changeTaskView('list')">List
                                                View</a></li>
                                        <li><a class="dropdown-item" href="#" onclick="changeTaskView('board')">Board
                                                View</a></li>
                                        <li><a class="dropdown-item" href="#"
                                                onclick="changeTaskView('calendar')">Calendar View</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tasks List View -->
        <div class="card" id="tasksListView">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">Tasks List</h5>
                <div class="d-flex gap-2">
                    <div class="input-group input-group-merge" style="width: 300px;">
                        <span class="input-group-text">
                            <span class="material-icons-round">search</span>
                        </span>
                        <input type="text" class="form-control" placeholder="Search tasks..." id="searchTasks">
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="tasksTable">
                        <thead>
                            <tr>
                                <th>Task Details</th>
                                <th>Project</th>
                                <th>Assigned To</th>
                                <th>Priority</th>
                                <th>Status</th>
                                <th>Due Date</th>
                                <th>Progress</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $task)
                                <tr class="task-row" data-status="{{ $task['status'] }}">
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="task-icon me-3">
                                                <span
                                                    class="material-icons-round text-{{ $task['priority_color'] }}">task</span>
                                            </div>
                                            <div>
                                                <h6 class="mb-0">{{ $task['title'] }}</h6>
                                                <small
                                                    class="text-muted">{{ Str::limit($task['description'], 50) }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-light text-dark">{{ $task['project_name'] }}</span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar avatar-sm me-2">
                                                <img src="{{ $task['assigned_to_avatar'] }}" alt="Avatar"
                                                    class="rounded-circle">
                                            </div>
                                            <span>{{ $task['assigned_to_name'] }}</span>
                                        </div>
                                    </td>
                                    <td>
                                        @if ($task['priority'] == 'high')
                                            <span class="badge bg-danger">High</span>
                                        @elseif($task['priority'] == 'medium')
                                            <span class="badge bg-warning">Medium</span>
                                        @else
                                            <span class="badge bg-success">Low</span>
                                        @endif
                                    </td>
                                    <td>
                                        <span
                                            class="badge bg-{{ $task['status_color'] }}">{{ ucfirst($task['status']) }}</span>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <small class="{{ $task['is_overdue'] ? 'text-danger' : 'text-muted' }}">
                                                {{ \Carbon\Carbon::parse($task['due_date'])->format('M d, Y') }}
                                            </small>
                                            @if ($task['is_overdue'])
                                                <small class="text-danger">Overdue</small>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="progress w-100 me-2" style="height: 6px;">
                                                <div class="progress-bar bg-{{ $task['progress_color'] }}"
                                                    style="width: {{ $task['progress'] }}%"></div>
                                            </div>
                                            <small>{{ $task['progress'] }}%</small>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex gap-1">
                                            <button class="btn btn-sm btn-outline-primary"
                                                onclick="viewTask({{ $task['id'] }})">
                                                <span class="material-icons-round"
                                                    style="font-size: 16px;">visibility</span>
                                            </button>
                                            <button class="btn btn-sm btn-outline-secondary"
                                                onclick="editTask({{ $task['id'] }})">
                                                <span class="material-icons-round" style="font-size: 16px;">edit</span>
                                            </button>
                                            <button class="btn btn-sm btn-outline-success"
                                                onclick="updateTaskProgress({{ $task['id'] }})">
                                                <span class="material-icons-round" style="font-size: 16px;">update</span>
                                            </button>
                                            <button class="btn btn-sm btn-outline-danger"
                                                onclick="deleteTask({{ $task['id'] }})">
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

        <!-- Tasks Board View (Hidden by default) -->
        <div class="d-none" id="tasksBoardView">
            <div class="row">
                <!-- Pending Column -->
                <div class="col-xl-3 col-lg-6 col-12 mb-4">
                    <div class="card">
                        <div class="card-header bg-warning text-white">
                            <h6 class="card-title mb-0">Pending ({{ $stats['pending_tasks'] }})</h6>
                        </div>
                        <div class="card-body">
                            <div class="task-board-column" data-status="pending">
                                @foreach ($tasks->where('status', 'pending') as $task)
                                    <div class="card task-card mb-3" data-task-id="{{ $task['id'] }}">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-start mb-2">
                                                <h6 class="card-title mb-0">{{ $task['title'] }}</h6>
                                                <span
                                                    class="badge bg-{{ $task['priority_color'] }}">{{ $task['priority'] }}</span>
                                            </div>
                                            <p class="text-muted small mb-2">{{ Str::limit($task['description'], 80) }}
                                            </p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <small class="text-muted">{{ $task['project_name'] }}</small>
                                                <small
                                                    class="text-muted">{{ \Carbon\Carbon::parse($task['due_date'])->format('M d') }}</small>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="avatar-group">
                                                    <div class="avatar avatar-sm">
                                                        <img src="{{ $task['assigned_to_avatar'] }}" alt="Avatar"
                                                            class="rounded-circle">
                                                    </div>
                                                </div>
                                                <div class="task-actions">
                                                    <button class="btn btn-sm btn-outline-primary"
                                                        onclick="viewTask({{ $task['id'] }})">
                                                        <span class="material-icons-round"
                                                            style="font-size: 14px;">visibility</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <!-- In Progress Column -->
                <div class="col-xl-3 col-lg-6 col-12 mb-4">
                    <div class="card">
                        <div class="card-header bg-info text-white">
                            <h6 class="card-title mb-0">In Progress ({{ $stats['in_progress_tasks'] }})</h6>
                        </div>
                        <div class="card-body">
                            <div class="task-board-column" data-status="in_progress">
                                @foreach ($tasks->where('status', 'in_progress') as $task)
                                    <div class="card task-card mb-3" data-task-id="{{ $task['id'] }}">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-start mb-2">
                                                <h6 class="card-title mb-0">{{ $task['title'] }}</h6>
                                                <span
                                                    class="badge bg-{{ $task['priority_color'] }}">{{ $task['priority'] }}</span>
                                            </div>
                                            <div class="progress mb-2" style="height: 6px;">
                                                <div class="progress-bar bg-info"
                                                    style="width: {{ $task['progress'] }}%"></div>
                                            </div>
                                            <p class="text-muted small mb-2">{{ Str::limit($task['description'], 80) }}
                                            </p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <small class="text-muted">{{ $task['project_name'] }}</small>
                                                <small
                                                    class="text-muted">{{ \Carbon\Carbon::parse($task['due_date'])->format('M d') }}</small>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="avatar-group">
                                                    <div class="avatar avatar-sm">
                                                        <img src="{{ $task['assigned_to_avatar'] }}" alt="Avatar"
                                                            class="rounded-circle">
                                                    </div>
                                                </div>
                                                <div class="task-actions">
                                                    <button class="btn btn-sm btn-outline-primary"
                                                        onclick="viewTask({{ $task['id'] }})">
                                                        <span class="material-icons-round"
                                                            style="font-size: 14px;">visibility</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Completed Column -->
                <div class="col-xl-3 col-lg-6 col-12 mb-4">
                    <div class="card">
                        <div class="card-header bg-success text-white">
                            <h6 class="card-title mb-0">Completed ({{ $stats['completed_tasks'] }})</h6>
                        </div>
                        <div class="card-body">
                            <div class="task-board-column" data-status="completed">
                                @foreach ($tasks->where('status', 'completed') as $task)
                                    <div class="card task-card mb-3" data-task-id="{{ $task['id'] }}">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-start mb-2">
                                                <h6 class="card-title mb-0">{{ $task['title'] }}</h6>
                                                <span class="badge bg-success">Completed</span>
                                            </div>
                                            <p class="text-muted small mb-2">{{ Str::limit($task['description'], 80) }}
                                            </p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <small class="text-muted">{{ $task['project_name'] }}</small>
                                                <small class="text-success">Done</small>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="avatar-group">
                                                    <div class="avatar avatar-sm">
                                                        <img src="{{ $task['assigned_to_avatar'] }}" alt="Avatar"
                                                            class="rounded-circle">
                                                    </div>
                                                </div>
                                                <div class="task-actions">
                                                    <button class="btn btn-sm btn-outline-primary"
                                                        onclick="viewTask({{ $task['id'] }})">
                                                        <span class="material-icons-round"
                                                            style="font-size: 14px;">visibility</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Overdue Column -->
                <div class="col-xl-3 col-lg-6 col-12 mb-4">
                    <div class="card">
                        <div class="card-header bg-danger text-white">
                            <h6 class="card-title mb-0">Overdue ({{ $stats['overdue_tasks'] }})</h6>
                        </div>
                        <div class="card-body">
                            <div class="task-board-column" data-status="overdue">
                                @foreach ($tasks->where('is_overdue', true) as $task)
                                    <div class="card task-card mb-3" data-task-id="{{ $task['id'] }}">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-start mb-2">
                                                <h6 class="card-title mb-0">{{ $task['title'] }}</h6>
                                                <span class="badge bg-danger">Overdue</span>
                                            </div>
                                            <p class="text-muted small mb-2">{{ Str::limit($task['description'], 80) }}
                                            </p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <small class="text-muted">{{ $task['project_name'] }}</small>
                                                <small class="text-danger">Late</small>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center mt-2">
                                                <div class="avatar-group">
                                                    <div class="avatar avatar-sm">
                                                        <img src="{{ $task['assigned_to_avatar'] }}" alt="Avatar"
                                                            class="rounded-circle">
                                                    </div>
                                                </div>
                                                <div class="task-actions">
                                                    <button class="btn btn-sm btn-outline-primary"
                                                        onclick="viewTask({{ $task['id'] }})">
                                                        <span class="material-icons-round"
                                                            style="font-size: 14px;">visibility</span>
                                                    </button>
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
        </div>

    </div>

    <!-- Task Filters Modal -->
    <div class="modal fade" id="taskFiltersModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Task Filters</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="taskFiltersForm">
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
                                <label for="filterPriority" class="form-label">Priority</label>
                                <select class="form-select" id="filterPriority">
                                    <option value="">All Priorities</option>
                                    <option value="high">High</option>
                                    <option value="medium">Medium</option>
                                    <option value="low">Low</option>
                                </select>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="filterAssignedTo" class="form-label">Assigned To</label>
                                <select class="form-select" id="filterAssignedTo">
                                    <option value="">All Team Members</option>
                                    @foreach ($teamMembers as $member)
                                        <option value="{{ $member['id'] }}">{{ $member['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="filterDueDate" class="form-label">Due Date</label>
                                <select class="form-select" id="filterDueDate">
                                    <option value="">Any Time</option>
                                    <option value="today">Today</option>
                                    <option value="tomorrow">Tomorrow</option>
                                    <option value="this_week">This Week</option>
                                    <option value="next_week">Next Week</option>
                                    <option value="overdue">Overdue</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="applyTaskFilters()">Apply Filters</button>
                </div>
            </div>
        </div>
    </div>

    <style>
        .task-card {
            cursor: move;
            transition: all 0.3s ease;
            border: 1px solid #e2e8f0;
        }

        .task-card:hover {
            border-color: #3b82f6;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .task-board-column {
            min-height: 400px;
        }

        .avatar {
            width: 32px;
            height: 32px;
        }

        .avatar-group {
            display: flex;
        }

        .avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .task-row:hover {
            background-color: #f8f9fa;
        }

        .progress {
            background-color: #e2e8f0;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Search functionality
            const searchInput = document.getElementById('searchTasks');
            if (searchInput) {
                searchInput.addEventListener('input', function() {
                    const searchTerm = this.value.toLowerCase();
                    const rows = document.querySelectorAll('#tasksTable tbody tr');

                    rows.forEach(row => {
                        const text = row.textContent.toLowerCase();
                        row.style.display = text.includes(searchTerm) ? '' : 'none';
                    });
                });
            }

            // Initialize drag and drop for board view
            initializeTaskDragDrop();
        });

        function filterTasks(status) {
            const rows = document.querySelectorAll('.task-row');
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

        function changeTaskView(viewType) {
            const listView = document.getElementById('tasksListView');
            const boardView = document.getElementById('tasksBoardView');

            if (viewType === 'list') {
                listView.classList.remove('d-none');
                boardView.classList.add('d-none');
            } else if (viewType === 'board') {
                listView.classList.add('d-none');
                boardView.classList.remove('d-none');
            }
        }

        function applyTaskFilters() {
            const project = document.getElementById('filterProject').value;
            const priority = document.getElementById('filterPriority').value;
            const assignedTo = document.getElementById('filterAssignedTo').value;
            const dueDate = document.getElementById('filterDueDate').value;

            console.log('Applying filters:', {
                project,
                priority,
                assignedTo,
                dueDate
            });
            // Implement actual filter logic here

            const modal = bootstrap.Modal.getInstance(document.getElementById('taskFiltersModal'));
            modal.hide();
        }

        function viewTask(taskId) {
            window.location.href = `/tasks/view/${taskId}`;
        }

        function editTask(taskId) {
            window.location.href = `/tasks/edit/${taskId}`;
        }

        function updateTaskProgress(taskId) {
            // Implement progress update modal
            console.log('Update progress for task:', taskId);
        }

        function deleteTask(taskId) {
            if (confirm('Are you sure you want to delete this task?')) {
                console.log('Deleting task:', taskId);
                // Implement delete API call
            }
        }

        function exportTasks() {
            console.log('Exporting tasks data');
            // Implement export functionality
        }

        function initializeTaskDragDrop() {
            const taskCards = document.querySelectorAll('.task-card');
            const columns = document.querySelectorAll('.task-board-column');

            taskCards.forEach(card => {
                card.setAttribute('draggable', true);

                card.addEventListener('dragstart', function(e) {
                    e.dataTransfer.setData('text/plain', card.dataset.taskId);
                    card.classList.add('dragging');
                });

                card.addEventListener('dragend', function() {
                    card.classList.remove('dragging');
                });
            });

            columns.forEach(column => {
                column.addEventListener('dragover', function(e) {
                    e.preventDefault();
                    column.classList.add('drag-over');
                });

                column.addEventListener('dragleave', function() {
                    column.classList.remove('drag-over');
                });

                column.addEventListener('drop', function(e) {
                    e.preventDefault();
                    column.classList.remove('drag-over');

                    const taskId = e.dataTransfer.getData('text/plain');
                    const newStatus = column.dataset.status;

                    console.log(`Moving task ${taskId} to ${newStatus}`);
                    // Implement status update API call
                });
            });
        }
    </script>
@endsection
