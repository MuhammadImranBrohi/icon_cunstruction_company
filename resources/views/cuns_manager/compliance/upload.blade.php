@extends('cuns_manager.layouts.main')

@section('title', 'Upload Document - Construction Manager')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <!-- Page Header -->
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="fw-bold py-3 mb-0">
                        <span class="text-muted fw-light">Compliance /</span> Upload New Document
                    </h4>
                    <button class="btn btn-outline-secondary"
                        onclick="window.location.href='{{ route('compliance.index') }}'">
                        <span class="material-icons-round me-2">arrow_back</span>
                        Back to Compliance
                    </button>
                </div>
            </div>
        </div>

        <!-- Upload Form -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Document Details</h5>
                    </div>
                    <div class="card-body">
                        <form id="uploadForm" action="{{ route('compliance.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <!-- Document Information -->
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h6 class="mb-3 text-primary">Document Information</h6>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="docName" class="form-label">Document Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="docName" name="name"
                                        placeholder="Enter document name" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="docType" class="form-label">Document Type <span
                                            class="text-danger">*</span></label>
                                    <select class="form-select" id="docType" name="type" required>
                                        <option value="">Select Type</option>
                                        <option value="license">Business License</option>
                                        <option value="permit">Construction Permit</option>
                                        <option value="certificate">Safety Certificate</option>
                                        <option value="insurance">Insurance Policy</option>
                                        <option value="tax">Tax Registration</option>
                                        <option value="environmental">Environmental Clearance</option>
                                        <option value="labor">Labor Compliance</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="referenceNo" class="form-label">Reference Number</label>
                                    <input type="text" class="form-control" id="referenceNo" name="reference_number"
                                        placeholder="Enter document reference number">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="issuingAuthority" class="form-label">Issuing Authority</label>
                                    <input type="text" class="form-control" id="issuingAuthority"
                                        name="issuing_authority" placeholder="Enter issuing authority">
                                </div>
                            </div>

                            <!-- Dates & Validity -->
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h6 class="mb-3 text-primary">Dates & Validity</h6>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="issueDate" class="form-label">Issue Date</label>
                                    <input type="date" class="form-control" id="issueDate" name="issue_date">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="expiryDate" class="form-label">Expiry Date</label>
                                    <input type="date" class="form-control" id="expiryDate" name="expiry_date">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="renewalDate" class="form-label">Renewal Date</label>
                                    <input type="date" class="form-control" id="renewalDate" name="renewal_date">
                                </div>
                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="noExpiry" name="no_expiry">
                                        <label class="form-check-label" for="noExpiry">
                                            This document does not expire
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Site & Category -->
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h6 class="mb-3 text-primary">Site & Category</h6>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="siteSelect" class="form-label">Site <span
                                            class="text-danger">*</span></label>
                                    <select class="form-select" id="siteSelect" name="site_id" required>
                                        <option value="">Select Site</option>
                                        <option value="site1">Site A - Commercial Complex</option>
                                        <option value="site2">Site B - Residential Tower</option>
                                        <option value="all">All Sites</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="category" class="form-label">Category</label>
                                    <select class="form-select" id="category" name="category">
                                        <option value="">Select Category</option>
                                        <option value="legal">Legal</option>
                                        <option value="safety">Safety</option>
                                        <option value="financial">Financial</option>
                                        <option value="environmental">Environmental</option>
                                        <option value="labor">Labor</option>
                                        <option value="quality">Quality Assurance</option>
                                    </select>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="3"
                                        placeholder="Provide document description..."></textarea>
                                </div>
                            </div>

                            <!-- File Upload -->
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h6 class="mb-3 text-primary">Document Upload</h6>
                                </div>
                                <div class="col-12">
                                    <div class="border rounded p-4">
                                        <div id="uploadArea" class="text-center">
                                            <div class="mb-3">
                                                <span class="material-icons-round text-muted"
                                                    style="font-size: 64px;">cloud_upload</span>
                                            </div>
                                            <h5 class="mb-2">Drop your files here or click to browse</h5>
                                            <p class="text-muted mb-3">Supports PDF, DOC, DOCX, JPG, PNG (Max: 25MB per
                                                file)</p>
                                            <input type="file" id="documentFile" name="document" class="d-none"
                                                accept=".pdf,.doc,.docx,.jpg,.jpeg,.png">
                                            <button type="button" class="btn btn-primary btn-lg"
                                                onclick="document.getElementById('documentFile').click()">
                                                <span class="material-icons-round me-2">upload</span>
                                                Choose Files
                                            </button>
                                        </div>
                                        <div id="filePreview" class="mt-4 text-center" style="display: none;">
                                            <div class="alert alert-success">
                                                <div class="d-flex align-items-center">
                                                    <span
                                                        class="material-icons-round text-success me-2">check_circle</span>
                                                    <div>
                                                        <h6 class="alert-heading mb-1">File Selected</h6>
                                                        <p class="mb-0" id="fileName">document.pdf</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-outline-danger btn-sm"
                                                onclick="removeFile()">
                                                <span class="material-icons-round me-1"
                                                    style="font-size: 16px;">delete</span>
                                                Remove File
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Additional Settings -->
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h6 class="mb-3 text-primary">Additional Settings</h6>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-md-4 mb-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="requireApproval"
                                                    name="require_approval" checked>
                                                <label class="form-check-label" for="requireApproval">
                                                    Require Approval
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="sendNotifications"
                                                    name="send_notifications" checked>
                                                <label class="form-check-label" for="sendNotifications">
                                                    Send Expiry Notifications
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="isConfidential"
                                                    name="is_confidential">
                                                <label class="form-check-label" for="isConfidential">
                                                    Confidential Document
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Form Actions -->
                            <div class="row mt-4">
                                <div class="col-12">
                                    <div class="d-flex justify-content-between">
                                        <button type="button" class="btn btn-outline-secondary"
                                            onclick="window.location.href='{{ route('compliance.index') }}'">
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
                                                <span class="material-icons-round me-2">upload</span>
                                                Upload Document
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

    <style>
        #uploadArea {
            border: 2px dashed #dee2e6;
            border-radius: 12px;
            padding: 40px 20px;
            transition: all 0.3s ease;
            background: #fafafa;
        }

        #uploadArea.drag-over {
            border-color: #3b82f6;
            background-color: #eff6ff;
        }

        #uploadArea:hover {
            border-color: #3b82f6;
            background-color: #f8f9fa;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            initializeFileUpload();

            // Set today's date as default for issue date
            document.getElementById('issueDate').value = new Date().toISOString().split('T')[0];
        });

        function initializeFileUpload() {
            const uploadArea = document.getElementById('uploadArea');
            const fileInput = document.getElementById('documentFile');

            uploadArea.addEventListener('dragover', function(e) {
                e.preventDefault();
                this.classList.add('drag-over');
            });

            uploadArea.addEventListener('dragleave', function() {
                this.classList.remove('drag-over');
            });

            uploadArea.addEventListener('drop', function(e) {
                e.preventDefault();
                this.classList.remove('drag-over');
                handleFileSelect(e.dataTransfer.files);
            });

            fileInput.addEventListener('change', function() {
                handleFileSelect(this.files);
            });
        }

        function handleFileSelect(files) {
            if (files.length > 0) {
                const file = files[0];
                const filePreview = document.getElementById('filePreview');
                const uploadArea = document.getElementById('uploadArea');

                // Validate file type
                const validTypes = ['application/pdf', 'application/msword',
                    'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                    'image/jpeg', 'image/png'
                ];

                if (!validTypes.includes(file.type)) {
                    alert('Please select a valid file type (PDF, DOC, DOCX, JPG, PNG)');
                    return;
                }

                // Validate file size (25MB)
                if (file.size > 25 * 1024 * 1024) {
                    alert('File size must be less than 25MB');
                    return;
                }

                document.getElementById('fileName').textContent = file.name;
                uploadArea.style.display = 'none';
                filePreview.style.display = 'block';
            }
        }

        function removeFile() {
            const fileInput = document.getElementById('documentFile');
            const filePreview = document.getElementById('filePreview');
            const uploadArea = document.getElementById('uploadArea');

            fileInput.value = '';
            filePreview.style.display = 'none';
            uploadArea.style.display = 'block';
        }

        function saveAsDraft() {
            const form = document.getElementById('uploadForm');
            const draftInput = document.createElement('input');
            draftInput.type = 'hidden';
            draftInput.name = 'is_draft';
            draftInput.value = '1';
            form.appendChild(draftInput);

            if (validateForm()) {
                form.submit();
            }
        }

        function validateForm() {
            const requiredFields = ['docName', 'docType', 'siteSelect'];
            let isValid = true;

            requiredFields.forEach(fieldId => {
                const field = document.getElementById(fieldId);
                if (!field.value.trim()) {
                    field.classList.add('is-invalid');
                    isValid = false;
                } else {
                    field.classList.remove('is-invalid');
                }
            });

            // Check if file is selected
            const fileInput = document.getElementById('documentFile');
            if (!fileInput.files.length) {
                alert('Please select a document file to upload');
                isValid = false;
            }

            return isValid;
        }

        // Auto-save draft
        setInterval(function() {
            const docName = document.getElementById('docName').value;
            if (docName) {
                saveDraftLocally();
            }
        }, 60000);

        function saveDraftLocally() {
            const formData = new FormData(document.getElementById('uploadForm'));
            const draftData = {};

            for (let [key, value] of formData.entries()) {
                if (key !== 'document') {
                    draftData[key] = value;
                }
            }

            localStorage.setItem('complianceDraft', JSON.stringify(draftData));
            console.log('Draft saved locally');
        }

        function loadDraft() {
            const draft = localStorage.getItem('complianceDraft');
            if (draft) {
                const draftData = JSON.parse(draft);

                for (let key in draftData) {
                    const element = document.querySelector(`[name="${key}"]`);
                    if (element) {
                        element.value = draftData[key];
                    }
                }

                if (confirm('A saved draft was found. Do you want to restore it?')) {
                    console.log('Draft restored');
                } else {
                    localStorage.removeItem('complianceDraft');
                }
            }
        }

        // Load draft on page load
        window.addEventListener('load', loadDraft);

        // Add event listeners for auto-save
        document.querySelectorAll('#uploadForm input, #uploadForm select, #uploadForm textarea').forEach(element => {
            element.addEventListener('change', saveDraftLocally);
            element.addEventListener('input', saveDraftLocally);
        });
    </script>
@endsection
