@extends('cuns_manager.layouts.main')

@section('title', 'Create Site Report - Construction Manager')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <!-- Page Header -->
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="fw-bold py-3 mb-0">
                        <span class="text-muted fw-light">Site Reports /</span> Create New Report
                    </h4>
                    <button class="btn btn-outline-secondary"
                        onclick="window.location.href='{{ route('site_reports.index') }}'">
                        <span class="material-icons-round me-2">arrow_back</span>
                        Back to Reports
                    </button>
                </div>
            </div>
        </div>

        <!-- Create Report Form -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Site Report Information</h5>
                    </div>
                    <div class="card-body">
                        <form id="createReportForm" action="{{ route('site_reports.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <!-- Basic Information Section -->
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h6 class="mb-3 text-primary">Basic Information</h6>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="reportTitle" class="form-label">Report Title <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="reportTitle" name="title"
                                        placeholder="Enter report title" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="reportDate" class="form-label">Report Date <span
                                            class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="reportDate" name="report_date"
                                        value="{{ date('Y-m-d') }}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="projectSelect" class="form-label">Project <span
                                            class="text-danger">*</span></label>
                                    <select class="form-select" id="projectSelect" name="project_id" required>
                                        <option value="">Select Project</option>
                                        @foreach ($projects as $project)
                                            <option value="{{ $project['id'] }}">{{ $project['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="siteLocation" class="form-label">Site Location <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="siteLocation" name="site_location"
                                        placeholder="Enter site location" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="reportSummary" class="form-label">Executive Summary</label>
                                    <textarea class="form-control" id="reportSummary" name="summary" rows="3"
                                        placeholder="Brief summary of the site report..."></textarea>
                                </div>
                            </div>

                            <!-- Weather & Conditions Section -->
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h6 class="mb-3 text-primary">Weather & Site Conditions</h6>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="weatherCondition" class="form-label">Weather Condition</label>
                                    <select class="form-select" id="weatherCondition" name="weather_condition">
                                        <option value="">Select Weather</option>
                                        <option value="sunny">Sunny</option>
                                        <option value="cloudy">Cloudy</option>
                                        <option value="rainy">Rainy</option>
                                        <option value="windy">Windy</option>
                                        <option value="stormy">Stormy</option>
                                        <option value="foggy">Foggy</option>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="temperature" class="form-label">Temperature (°C)</label>
                                    <input type="number" class="form-control" id="temperature" name="temperature"
                                        placeholder="e.g., 25">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="windSpeed" class="form-label">Wind Speed (km/h)</label>
                                    <input type="number" class="form-control" id="windSpeed" name="wind_speed"
                                        placeholder="e.g., 15">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="siteCondition" class="form-label">Site Condition</label>
                                    <select class="form-select" id="siteCondition" name="site_condition">
                                        <option value="">Select Condition</option>
                                        <option value="excellent">Excellent</option>
                                        <option value="good">Good</option>
                                        <option value="fair">Fair</option>
                                        <option value="poor">Poor</option>
                                        <option value="very_poor">Very Poor</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Progress & Work Details -->
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h6 class="mb-3 text-primary">Work Progress & Details</h6>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="workDescription" class="form-label">Work Description <span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control" id="workDescription" name="work_description" rows="4"
                                        placeholder="Describe the work completed today..." required></textarea>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="workProgress" class="form-label">Overall Progress (%)</label>
                                    <div class="d-flex align-items-center">
                                        <input type="range" class="form-range flex-grow-1 me-3" id="workProgress"
                                            name="progress" min="0" max="100" value="0">
                                        <span id="progressValue" class="fw-bold" style="min-width: 40px;">0%</span>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="workHours" class="form-label">Work Hours Today</label>
                                    <input type="number" class="form-control" id="workHours" name="work_hours"
                                        min="0" max="24" step="0.5" placeholder="e.g., 8">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="workersPresent" class="form-label">Workers Present</label>
                                    <input type="number" class="form-control" id="workersPresent"
                                        name="workers_present" min="0" placeholder="e.g., 15">
                                </div>
                            </div>

                            <!-- Ratings Section -->
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h6 class="mb-3 text-primary">Site Ratings</h6>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Safety Rating</label>
                                    <div class="rating-stars">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <input type="radio" id="safety{{ $i }}" name="safety_rating"
                                                value="{{ $i }}" class="d-none">
                                            <label for="safety{{ $i }}" class="star-label"
                                                onclick="setRating('safety', {{ $i }})">
                                                <span class="material-icons-round">star</span>
                                            </label>
                                        @endfor
                                    </div>
                                    <small class="text-muted">Rate site safety conditions</small>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Progress Rating</label>
                                    <div class="rating-stars">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <input type="radio" id="progress{{ $i }}" name="progress_rating"
                                                value="{{ $i }}" class="d-none">
                                            <label for="progress{{ $i }}" class="star-label"
                                                onclick="setRating('progress', {{ $i }})">
                                                <span class="material-icons-round">star</span>
                                            </label>
                                        @endfor
                                    </div>
                                    <small class="text-muted">Rate work progress quality</small>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Quality Rating</label>
                                    <div class="rating-stars">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <input type="radio" id="quality{{ $i }}" name="quality_rating"
                                                value="{{ $i }}" class="d-none">
                                            <label for="quality{{ $i }}" class="star-label"
                                                onclick="setRating('quality', {{ $i }})">
                                                <span class="material-icons-round">star</span>
                                            </label>
                                        @endfor
                                    </div>
                                    <small class="text-muted">Rate work quality standards</small>
                                </div>
                            </div>

                            <!-- Issues & Challenges -->
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h6 class="mb-3 text-primary">Issues & Challenges</h6>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="issuesEncountered" class="form-label">Issues Encountered</label>
                                    <textarea class="form-control" id="issuesEncountered" name="issues_encountered" rows="3"
                                        placeholder="Describe any issues or challenges faced during work..."></textarea>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="solutionsApplied" class="form-label">Solutions Applied</label>
                                    <textarea class="form-control" id="solutionsApplied" name="solutions_applied" rows="3"
                                        placeholder="Describe solutions applied to resolve issues..."></textarea>
                                </div>
                                <div class="col-12">
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" id="criticalIssue"
                                            name="has_critical_issue">
                                        <label class="form-check-label" for="criticalIssue">
                                            This report contains critical issues that require immediate attention
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="delayReport"
                                            name="has_delay">
                                        <label class="form-check-label" for="delayReport">
                                            Work progress is delayed due to issues
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Materials & Equipment -->
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h6 class="mb-3 text-primary">Materials & Equipment</h6>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="materialsUsed" class="form-label">Materials Used Today</label>
                                    <textarea class="form-control" id="materialsUsed" name="materials_used" rows="3"
                                        placeholder="List materials used during the day..."></textarea>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="equipmentStatus" class="form-label">Equipment Status</label>
                                    <textarea class="form-control" id="equipmentStatus" name="equipment_status" rows="3"
                                        placeholder="Status of equipment and machinery..."></textarea>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Material Delivery Status</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="material_delivery"
                                            id="deliveryOntime" value="ontime">
                                        <label class="form-check-label" for="deliveryOntime">Materials delivered on
                                            time</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="material_delivery"
                                            id="deliveryDelayed" value="delayed">
                                        <label class="form-check-label" for="deliveryDelayed">Material delivery
                                            delayed</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="material_delivery"
                                            id="deliveryPending" value="pending">
                                        <label class="form-check-label" for="deliveryPending">Materials pending
                                            delivery</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Safety & Compliance -->
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h6 class="mb-3 text-primary">Safety & Compliance</h6>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="safetyObservations" class="form-label">Safety Observations</label>
                                    <textarea class="form-control" id="safetyObservations" name="safety_observations" rows="3"
                                        placeholder="Safety observations and compliance checks..."></textarea>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="incidentsReport" class="form-label">Incidents Report</label>
                                    <textarea class="form-control" id="incidentsReport" name="incidents_report" rows="3"
                                        placeholder="Report any safety incidents or near misses..."></textarea>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-md-4 mb-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="safetyMeeting"
                                                    name="safety_meeting_held">
                                                <label class="form-check-label" for="safetyMeeting">Safety meeting
                                                    held</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="ppeCompliance"
                                                    name="ppe_compliance">
                                                <label class="form-check-label" for="ppeCompliance">PPE compliance
                                                    verified</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="safetyAudit"
                                                    name="safety_audit_done">
                                                <label class="form-check-label" for="safetyAudit">Safety audit
                                                    conducted</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Attachments Section -->
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h6 class="mb-3 text-primary">Attachments</h6>
                                </div>
                                <div class="col-12">
                                    <div class="border rounded p-3">
                                        <div id="attachmentArea" class="text-center">
                                            <div class="mb-3">
                                                <span class="material-icons-round text-muted"
                                                    style="font-size: 48px;">cloud_upload</span>
                                            </div>
                                            <p class="text-muted mb-2">Drag & drop photos, documents, or other files here
                                            </p>
                                            <p class="text-muted small mb-3">Supports JPG, PNG, PDF, DOC (Max: 10MB per
                                                file)</p>
                                            <input type="file" id="reportAttachments" name="attachments[]" multiple
                                                class="d-none" accept=".jpg,.jpeg,.png,.pdf,.doc,.docx">
                                            <button type="button" class="btn btn-outline-primary"
                                                onclick="document.getElementById('reportAttachments').click()">
                                                <span class="material-icons-round me-2"
                                                    style="font-size: 16px;">upload</span>
                                                Choose Files
                                            </button>
                                        </div>
                                        <div id="fileList" class="mt-3"></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Next Day Plan -->
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h6 class="mb-3 text-primary">Next Day Plan</h6>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="nextDayPlan" class="form-label">Plan for Next Day</label>
                                    <textarea class="form-control" id="nextDayPlan" name="next_day_plan" rows="3"
                                        placeholder="Outline the work plan for the next day..."></textarea>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="requiredMaterials" class="form-label">Materials Required Tomorrow</label>
                                    <textarea class="form-control" id="requiredMaterials" name="required_materials" rows="2"
                                        placeholder="List materials needed for tomorrow..."></textarea>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="specialInstructions" class="form-label">Special Instructions</label>
                                    <textarea class="form-control" id="specialInstructions" name="special_instructions" rows="2"
                                        placeholder="Any special instructions or requirements..."></textarea>
                                </div>
                            </div>

                            <!-- Form Actions -->
                            <div class="row mt-4">
                                <div class="col-12">
                                    <div class="d-flex justify-content-between">
                                        <button type="button" class="btn btn-outline-secondary"
                                            onclick="window.location.href='{{ route('site_reports.index') }}'">
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
                                                <span class="material-icons-round me-2">check_circle</span>
                                                Submit Report
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
                    <h5 class="modal-title">Report Preview</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="previewContent">
                    <!-- Preview content will be inserted here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="submitForm()">Confirm & Submit</button>
                </div>
            </div>
        </div>
    </div>

    <style>
        .rating-stars {
            display: flex;
            gap: 4px;
        }

        .star-label {
            cursor: pointer;
            color: #d1d5db;
            transition: color 0.2s ease;
        }

        .star-label:hover,
        .star-label.active {
            color: #f59e0b;
        }

        .star-label .material-icons-round {
            font-size: 24px;
        }

        #attachmentArea {
            border: 2px dashed #dee2e6;
            border-radius: 8px;
            padding: 30px;
            transition: all 0.3s ease;
        }

        #attachmentArea.drag-over {
            border-color: #3b82f6;
            background-color: #eff6ff;
        }

        .file-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            background: #f8f9fa;
            border-radius: 6px;
            margin-bottom: 8px;
            border: 1px solid #e9ecef;
        }

        .file-info {
            display: flex;
            align-items: center;
            flex-grow: 1;
        }

        .file-icon {
            margin-right: 10px;
            color: #3b82f6;
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
            const progressSlider = document.getElementById('workProgress');
            const progressValue = document.getElementById('progressValue');

            if (progressSlider) {
                progressSlider.addEventListener('input', function() {
                    progressValue.textContent = this.value + '%';
                });
            }

            // File upload handling
            const attachmentArea = document.getElementById('attachmentArea');
            const fileInput = document.getElementById('reportAttachments');
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

            // Set default report date to today
            document.getElementById('reportDate').value = new Date().toISOString().split('T')[0];
        });

        let currentRatings = {
            safety: 0,
            progress: 0,
            quality: 0
        };

        function setRating(type, rating) {
            currentRatings[type] = rating;

            // Update star display
            for (let i = 1; i <= 5; i++) {
                const star = document.querySelector(`label[for="${type}${i}"]`);
                if (i <= rating) {
                    star.classList.add('active');
                } else {
                    star.classList.remove('active');
                }
            }

            // Update hidden input
            document.querySelector(`input[name="${type}_rating"][value="${rating}"]`).checked = true;
        }

        function handleFiles(files) {
            const fileList = document.getElementById('fileList');
            fileList.innerHTML = '';

            for (let file of files) {
                const fileItem = document.createElement('div');
                fileItem.className = 'file-item';
                fileItem.innerHTML = `
            <div class="file-info">
                <span class="material-icons-round file-icon">description</span>
                <div>
                    <div class="fw-medium">${file.name}</div>
                    <small class="text-muted">${(file.size / (1024 * 1024)).toFixed(2)} MB</small>
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

        function saveAsDraft() {
            const form = document.getElementById('createReportForm');
            const draftInput = document.createElement('input');
            draftInput.type = 'hidden';
            draftInput.name = 'is_draft';
            draftInput.value = '1';
            form.appendChild(draftInput);

            form.submit();
        }

        function previewReport() {
            const form = document.getElementById('createReportForm');
            if (form.checkValidity()) {
                const formData = new FormData(form);
                const previewContent = document.getElementById('previewContent');

                let previewHTML = `
            <div class="row">
                <div class="col-12">
                    <h4>${document.getElementById('reportTitle').value}</h4>
                    <p class="text-muted">${document.getElementById('reportSummary').value || 'No summary provided'}</p>
                    
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <h6>Basic Information</h6>
                            <table class="table table-sm">
                                <tr>
                                    <td><strong>Project:</strong></td>
                                    <td>${document.getElementById('projectSelect').options[document.getElementById('projectSelect').selectedIndex].text}</td>
                                </tr>
                                <tr>
                                    <td><strong>Site Location:</strong></td>
                                    <td>${document.getElementById('siteLocation').value}</td>
                                </tr>
                                <tr>
                                    <td><strong>Report Date:</strong></td>
                                    <td>${document.getElementById('reportDate').value}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <h6>Weather & Conditions</h6>
                            <table class="table table-sm">
                                <tr>
                                    <td><strong>Weather:</strong></td>
                                    <td>${document.getElementById('weatherCondition').value || 'Not specified'}</td>
                                </tr>
                                <tr>
                                    <td><strong>Temperature:</strong></td>
                                    <td>${document.getElementById('temperature').value || 'N/A'}°C</td>
                                </tr>
                                <tr>
                                    <td><strong>Site Condition:</strong></td>
                                    <td>${document.getElementById('siteCondition').value || 'Not specified'}</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-12">
                            <h6>Work Progress</h6>
                            <p>${document.getElementById('workDescription').value}</p>
                            <div class="d-flex align-items-center">
                                <strong>Progress: </strong>
                                <div class="progress flex-grow-1 mx-3" style="height: 8px;">
                                    <div class="progress-bar bg-success" style="width: ${document.getElementById('workProgress').value}%"></div>
                                </div>
                                <span>${document.getElementById('workProgress').value}%</span>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-12">
                            <h6>Ratings</h6>
                            <div class="row text-center">
                                <div class="col-4">
                                    <small>Safety: ${currentRatings.safety}/5</small>
                                </div>
                                <div class="col-4">
                                    <small>Progress: ${currentRatings.progress}/5</small>
                                </div>
                                <div class="col-4">
                                    <small>Quality: ${currentRatings.quality}/5</small>
                                </div>
                            </div>
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

        function submitForm() {
            document.getElementById('createReportForm').submit();
        }

        // Auto-save draft every 2 minutes
        setInterval(function() {
            const form = document.getElementById('createReportForm');
            const title = document.getElementById('reportTitle').value;
            const description = document.getElementById('workDescription').value;

            if (title || description) {
                console.log('Auto-saving draft...');
                // Implement auto-save functionality
                // saveDraftLocally();
            }
        }, 120000);

        function saveDraftLocally() {
            const formData = new FormData(document.getElementById('createReportForm'));
            const draftData = {};

            for (let [key, value] of formData.entries()) {
                draftData[key] = value;
            }

            localStorage.setItem('siteReportDraft', JSON.stringify(draftData));
        }

        function loadDraft() {
            const draft = localStorage.getItem('siteReportDraft');
            if (draft) {
                const draftData = JSON.parse(draft);

                // Populate form fields with draft data
                for (let key in draftData) {
                    const element = document.querySelector(`[name="${key}"]`);
                    if (element) {
                        element.value = draftData[key];
                    }
                }

                // Restore ratings
                if (draftData.safety_rating) {
                    setRating('safety', parseInt(draftData.safety_rating));
                }
                if (draftData.progress_rating) {
                    setRating('progress', parseInt(draftData.progress_rating));
                }
                if (draftData.quality_rating) {
                    setRating('quality', parseInt(draftData.quality_rating));
                }

                // Restore progress slider
                if (draftData.progress) {
                    document.getElementById('workProgress').value = draftData.progress;
                    document.getElementById('progressValue').textContent = draftData.progress + '%';
                }

                console.log('Draft loaded successfully');
            }
        }

        // Load draft when page loads
        window.addEventListener('load', loadDraft);
    </script>
@endsection
    