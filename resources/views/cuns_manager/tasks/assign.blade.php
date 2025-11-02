@extends('cuns_manager.layouts.main')

@section('title', 'Assign Task - Construction Manager')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <!-- Page Header -->
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="fw-bold py-3 mb-0">
                        <span class="text-muted fw-light">Tasks /</span> Assign New Task
                    </h4>
                    <button class="btn btn-outline-secondary" onclick="window.location.href='{{ route('tasks.index') }}'">
                        <span class="material-icons-round me-2">arrow_back</span>
                        Back to Tasks
                    </button>
                </div>
            </div>
        </div>

        <!-- Assign Task Form -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Task Information</h5>
                    </div>
                    <div class="card-body">
                        <form id="assignTaskForm" action="{{ route('tasks.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <!-- Basic Information -->
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-12 mb-3">
                                            <label for="taskTitle" class="form-label">Task Title <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="taskTitle" name="title"
                                                placeholder="Enter task title" required>
                                        </div>

                                        <div class="col-12 mb-3">
                                            <label for="taskDescription" class="form-label">Task Description <span
                                                    class="text-danger">*</span></label>
                                            <textarea class="form-control" id="taskDescription" name="description" rows="4"
                                                placeholder="Describe the task in detail..." required></textarea>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="taskProject" class="form-label">Project <span
                                                    class="text-danger">*</span></label>
                                            <select class="form-select" id="taskProject" name="project_id" required>
                                                <option value="">Select Project</option>
                                                @foreach ($projects as $project)
                                                    <option value="{{ $project['id'] }}">{{ $project['name'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="taskCategory" class="form-label">Task Category</label>
                                            <select class="form-select" id="taskCategory" name="category">
                                                <option value="">Select Category</option>
                                                <option value="excavation">Excavation</option>
                                                <option value="foundation">Foundation</option>
                                                <option value="structural">Structural Work</option>
                                                <option value="electrical">Electrical</option>
                                                <option value="plumbing">Plumbing</option>
                                                <option value="finishing">Finishing</option>
                                                <option value="safety">Safety</option>
                                                <option value="quality">Quality Check</option>
                                                <option value="other">Other</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- Task Details Sidebar -->
                                <div class="col-md-4">
                                    <div class="card bg-light">
                                        <div class="card-body">
                                            <h6 class="card-title mb-3">Task Details</h6>

                                            <div class="mb-3">
                                                <label for="taskPriority" class="form-label">Priority <span
                                                        class="text-danger">*</span></label>
                                                <select class="form-select" id="taskPriority" name="priority" required>
                                                    <option value="low">Low</option>
                                                    <option value="medium" selected>Medium</option>
                                                    <option value="high">High</option>
                                                    <option value="urgent">Urgent</option>
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label for="taskStatus" class="form-label">Status</label>
                                                <select class="form-select" id="taskStatus" name="status">
                                                    <option value="pending" selected>Pending</option>
                                                    <option value="in_progress">In Progress</option>
                                                    <option value="on_hold">On Hold</option>
                                                    <option value="completed">Completed</option>
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label for="taskProgress" class="form-label">Initial Progress</label>
                                                <div class="d-flex align-items-center">
                                                    <input type="range" class="form-range flex-grow-1 me-2"
                                                        id="taskProgress" name="progress" min="0" max="100"
                                                        value="0">
                                                    <span id="progressValue" class="text-muted">0%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Assignment Section -->
                            <div class="row mt-4">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Assignment & Timeline</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="assignedTo" class="form-label">Assign To <span
                                                            class="text-danger">*</span></label>
                                                    <select class="form-select" id="assignedTo" name="assigned_to"
                                                        required>
                                                        <option value="">Select Team Member</option>
                                                        @foreach ($teamMembers as $member)
                                                            <option value="{{ $member['id'] }}"
                                                                data-avatar="{{ $member['avatar'] }}">
                                                                {{ $member['name'] }} - {{ $member['role'] }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <div id="assigneePreview" class="mt-2 d-none">
                                                        <div class="d-flex align-items-center p-2 bg-light rounded">
                                                            <img id="assigneeAvatar" src="" alt="Avatar"
                                                                class="rounded-circle me-2" width="32"
                                                                height="32">
                                                            <div>
                                                                <h6 id="assigneeName" class="mb-0"></h6>
                                                                <small id="assigneeRole" class="text-muted"></small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <label for="assignedTeam" class="form-label">Assign to Team</label>
                                                    <select class="form-select" id="assignedTeam" name="team_id">
                                                        <option value="">Select Team (Optional)</option>
                                                        @foreach ($teams as $team)
                                                            <option value="{{ $team['id'] }}">{{ $team['name'] }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-md-4 mb-3">
                                                    <label for="startDate" class="form-label">Start Date <span
                                                            class="text-danger">*</span></label>
                                                    <input type="date" class="form-control" id="startDate"
                                                        name="start_date" min="{{ date('Y-m-d') }}" required>
                                                </div>

                                                <div class="col-md-4 mb-3">
                                                    <label for="dueDate" class="form-label">Due Date <span
                                                            class="text-danger">*</span></label>
                                                    <input type="date" class="form-control" id="dueDate"
                                                        name="due_date" required>
                                                </div>

                                                <div class="col-md-4 mb-3">
                                                    <label for="estimatedHours" class="form-label">Estimated Hours</label>
                                                    <input type="number" class="form-control" id="estimatedHours"
                                                        name="estimated_hours" min="1" placeholder="e.g., 8">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Requirements & Attachments -->
                            <div class="row mt-4">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Requirements & Attachments</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12 mb-3">
                                                    <label for="taskRequirements" class="form-label">Specific
                                                        Requirements</label>
                                                    <textarea class="form-control" id="taskRequirements" name="requirements" rows="3"
                                                        placeholder="Any specific requirements, materials needed, or special instructions..."></textarea>
                                                </div>

                                                <div class="col-12 mb-3">
                                                    <label for="safetyInstructions" class="form-label">Safety
                                                        Instructions</label>
                                                    <textarea class="form-control" id="safetyInstructions" name="safety_instructions" rows="2"
                                                        placeholder="Safety precautions and instructions..."></textarea>
                                                </div>

                                                <div class="col-12">
                                                    <label class="form-label">Attachments</label>
                                                    <div class="border rounded p-3">
                                                        <div id="attachmentArea" class="text-center">
                                                            <div class="mb-3">
                                                                <span class="material-icons-round text-muted"
                                                                    style="font-size: 48px;">cloud_upload</span>
                                                            </div>
                                                            <p class="text-muted mb-2">Drag & drop files here or click to
                                                                upload</p>
                                                            <input type="file" id="taskAttachments"
                                                                name="attachments[]" multiple class="d-none"
                                                                accept=".pdf,.doc,.docx,.jpg,.jpeg,.png">
                                                            <button type="button" class="btn btn-outline-primary btn-sm"
                                                                onclick="document.getElementById('taskAttachments').click()">
                                                                <span class="material-icons-round me-1"
                                                                    style="font-size: 16px;">upload</span>
                                                                Choose Files
                                                            </button>
                                                            <div id="fileList" class="mt-3"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Checklist Section -->
                            <div class="row mt-4">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <h5 class="card-title mb-0">Task Checklist</h5>
                                            <button type="button" class="btn btn-sm btn-outline-primary"
                                                onclick="addChecklistItem()">
                                                <span class="material-icons-round me-1"
                                                    style="font-size: 16px;">add</span>
                                                Add Item
                                            </button>
                                        </div>
                                        <div class="card-body">
                                            <div id="checklistItems">
                                                <div class="checklist-item d-flex align-items-center mb-2">
                                                    <input type="checkbox" class="form-check-input me-2" disabled>
                                                    <input type="text" class="form-control" name="checklist[]"
                                                        placeholder="Enter checklist item...">
                                                    <button type="button" class="btn btn-sm btn-outline-danger ms-2"
                                                        onclick="removeChecklistItem(this)">
                                                        <span class="material-icons-round"
                                                            style="font-size: 16px;">delete</span>
                                                    </button>
                                                </div>
                                            </div>
                                            <small class="text-muted">Add step-by-step instructions or requirements for
                                                this task.</small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Form Actions -->
                            <div class="row mt-4">
                                <div class="col-12">
                                    <div class="d-flex justify-content-between">
                                        <button type="button" class="btn btn-outline-secondary"
                                            onclick="window.location.href='{{ route('tasks.index') }}'">
                                            <span class="material-icons-round me-2">cancel</span>
                                            Cancel
                                        </button>
                                        <div class="d-flex gap-2">
                                            <button type="button" class="btn btn-outline-primary"
                                                onclick="saveAsDraft()">
                                                <span class="material-icons-round me-2">save</span>
                                                Save as Draft
                                            </button>
                                            <button type="submit" class="btn btn-primary">
                                                <span class="material-icons-round me-2">assignment</span>
                                                Assign Task
                                            </button>
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
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Task Preview</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="previewContent">
                    <!-- Preview content will be inserted here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="submitForm()">Confirm & Assign</button>
                </div>
            </div>
        </div>
    </div>

    <style>
        .checklist-item {
            transition: all 0.3s ease;
        }

        .checklist-item:hover {
            background-color: #f8f9fa;
            border-radius: 4px;
            padding: 4px;
        }

        #attachmentArea {
            border: 2px dashed #dee2e6;
            border-radius: 8px;
            padding: 20px;
            transition: all 0.3s ease;
        }

        #attachmentArea.drag-over {
            border-color: #3b82f6;
            background-color: #eff6ff;
        }

        .file-item {
            display: flex;
            justify-content: between;
            align-items: center;
            padding: 8px;
            background: #f8f9fa;
            border-radius: 4px;
            margin-bottom: 4px;
        }

        .form-range::-webkit-slider-thumb {
            background: #3b82f6;
        }

        .form-range::-moz-range-thumb {
            background: #3b82f6;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Progress slider
            const progressSlider = document.getElementById('taskProgress');
            const progressValue = document.getElementById('progressValue');

            progressSlider.addEventListener('input', function() {
                progressValue.textContent = this.value + '%';
            });

            // Assignee preview
            const assignedToSelect = document.getElementById('assignedTo');
            const assigneePreview = document.getElementById('assigneePreview');

            assignedToSelect.addEventListener('change', function() {
                if (this.value) {
                    const selectedOption = this.options[this.selectedIndex];
                    document.getElementById('assigneeAvatar').src = selectedOption.dataset.avatar;
                    document.getElementById('assigneeName').textContent = selectedOption.text.split(' - ')[
                        0];
                    document.getElementById('assigneeRole').textContent = selectedOption.text.split(' - ')[
                        1];
                    assigneePreview.classList.remove('d-none');
                } else {
                    assigneePreview.classList.add('d-none');
                }
            });

            // Date validation
            const startDate = document.getElementById('startDate');
            const dueDate = document.getElementById('dueDate');

            startDate.addEventListener('change', function() {
                dueDate.min = this.value;
                if (dueDate.value && dueDate.value < this.value) {
                    dueDate.value = this.value;
                }
            });

            // File upload handling
            const attachmentArea = document.getElementById('attachmentArea');
            const fileInput = document.getElementById('taskAttachments');
            const fileList = document.getElementById('fileList');

            attachmentArea.addEventListener('dragover', function(e) {
                e.preventDefault();
                this.classList.add('drag-over');
            });

            attachmentArea.addEventListener('dragleave', function() {
                this.classList.remove('drag-over');
            });

            attachmentArea.addEventListener('drop', function(e) {
                e.preventDefault();
                this.classList.remove('drag-over');
                handleFiles(e.dataTransfer.files);
            });

            fileInput.addEventListener('change', function() {
                handleFiles(this.files);
            });

            // Set minimum dates to today
            const today = new Date().toISOString().split('T')[0];
            startDate.min = today;
            dueDate.min = today;
        });

        function handleFiles(files) {
            const fileList = document.getElementById('fileList');
            fileList.innerHTML = '';

            for (let file of files) {
                const fileItem = document.createElement('div');
                fileItem.className = 'file-item';
                fileItem.innerHTML = `
            <div class="d-flex align-items-center flex-grow-1">
                <span class="material-icons-round me-2 text-primary">description</span>
                <div class="flex-grow-1">
                    <div class="fw-medium">${file.name}</div>
                    <small class="text-muted">${(file.size / 1024).toFixed(2)} KB</small>
                </div>
            </div>
            <button type="button" class="btn btn-sm btn-outline-danger" onclick="removeFile(this)">
                <span class="material-icons-round" style="font-size: 16px;">delete</span>
            </button>
        `;
                fileList.appendChild(fileItem);
            }
        }

        function removeFile(button) {
            button.closest('.file-item').remove();
        }

        function addChecklistItem() {
            const checklistItems = document.getElementById('checklistItems');
            const newItem = document.createElement('div');
            newItem.className = 'checklist-item d-flex align-items-center mb-2';
            newItem.innerHTML = `
        <input type="checkbox" class="form-check-input me-2" disabled>
        <input type="text" class="form-control" name="checklist[]" placeholder="Enter checklist item...">
        <button type="button" class="btn btn-sm btn-outline-danger ms-2" onclick="removeChecklistItem(this)">
            <span class="material-icons-round" style="font-size: 16px;">delete</span>
        </button>
    `;
            checklistItems.appendChild(newItem);
        }

        function removeChecklistItem(button) {
            if (document.querySelectorAll('.checklist-item').length > 1) {
                button.closest('.checklist-item').remove();
            }
        }

        function saveAsDraft() {
            const form = document.getElementById('assignTaskForm');
            const draftButton = form.querySelector('button[type="button"]');

            // Add draft indicator
            const draftInput = document.createElement('input');
            draftInput.type = 'hidden';
            draftInput.name = 'is_draft';
            draftInput.value = '1';
            form.appendChild(draftInput);

            form.submit();
        }

        function previewTask() {
            const form = document.getElementById('assignTaskForm');
            if (form.checkValidity()) {
                // Collect form data for preview
                const formData = new FormData(form);
                const previewContent = document.getElementById('previewContent');

                let previewHTML = `
            <div class="row">
                <div class="col-12">
                    <h4>${document.getElementById('taskTitle').value}</h4>
                    <p class="text-muted">${document.getElementById('taskDescription').value}</p>
                    
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <h6>Details</h6>
                            <table class="table table-sm">
                                <tr>
                                    <td><strong>Project:</strong></td>
                                    <td>${document.getElementById('taskProject').options[document.getElementById('taskProject').selectedIndex].text}</td>
                                </tr>
                                <tr>
                                    <td><strong>Priority:</strong></td>
                                    <td><span class="badge bg-${getPriorityColor(document.getElementById('taskPriority').value)}">${document.getElementById('taskPriority').value}</span></td>
                                </tr>
                                <tr>
                                    <td><strong>Category:</strong></td>
                                    <td>${document.getElementById('taskCategory').value || 'Not specified'}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <h6>Timeline</h6>
                            <table class="table table-sm">
                                <tr>
                                    <td><strong>Start Date:</strong></td>
                                    <td>${document.getElementById('startDate').value}</td>
                                </tr>
                                <tr>
                                    <td><strong>Due Date:</strong></td>
                                    <td>${document.getElementById('dueDate').value}</td>
                                </tr>
                                <tr>
                                    <td><strong>Estimated Hours:</strong></td>
                                    <td>${document.getElementById('estimatedHours').value || 'Not specified'}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        `;

                previewContent.innerHTML = previewHTML;
                const previewModal = new bootstrap.Modal(document.getElementById('previewModal'));
                previewModal.show();
            } else {
                form.reportValidity();
            }
        }

        function getPriorityColor(priority) {
            const colors = {
                'low': 'success',
                'medium': 'warning',
                'high': 'danger',
                'urgent': 'dark'
            };
            return colors[priority] || 'secondary';
        }

        function submitForm() {
            document.getElementById('assignTaskForm').submit();
        }
    </script>
@endsection
