@extends('cuns_manager.layouts.main')

@section('title', 'Edit Project - Construction Manager')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <!-- Page Header -->
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="fw-bold py-3 mb-0">
                        <span class="text-muted fw-light">Projects /</span> Edit Project
                    </h4>
                    <div class="d-flex gap-2">
                        <a href="{{ route('cuns_manager.projects.show', ['id' => $project['id'] ?? 1]) }}"
                            class="btn btn-outline-primary">
                            <span class="material-icons-round me-2">visibility</span>
                            View Project
                        </a>
                        <a href="{{ route('cuns_manager.projects.index') }}" class="btn btn-outline-secondary">
                            <span class="material-icons-round me-2">arrow_back</span>
                            Back to Projects
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Project Edit Form -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Edit Project Information</h5>
                        <p class="text-muted mb-0">Update the project details below</p>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="row">
                                <!-- Basic Information -->
                                <div class="col-md-6 mb-3">
                                    <label for="projectName" class="form-label">Project Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="projectName"
                                        value="{{ $project['name'] ?? 'Office Building Construction' }}" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="projectCode" class="form-label">Project Code</label>
                                    <input type="text" class="form-control" id="projectCode" value="PROJ-001" readonly>
                                </div>

                                <div class="col-12 mb-3">
                                    <label for="projectDescription" class="form-label">Project Description</label>
                                    <textarea class="form-control" id="projectDescription" rows="3">{{ $project['description'] ?? 'Construction of 10-story office building with parking facility' }}</textarea>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="clientName" class="form-label">Client Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="clientName"
                                        value="{{ $project['client'] ?? 'ABC Corporation' }}" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="projectManager" class="form-label">Project Manager</label>
                                    <select class="form-select" id="projectManager">
                                        <option value="1"
                                            {{ ($project['manager'] ?? 'Rajesh Kumar') == 'Rajesh Kumar' ? 'selected' : '' }}>
                                            Rajesh Kumar</option>
                                        <option value="2"
                                            {{ ($project['manager'] ?? 'Rajesh Kumar') == 'Priya Sharma' ? 'selected' : '' }}>
                                            Priya Sharma</option>
                                        <option value="3"
                                            {{ ($project['manager'] ?? 'Rajesh Kumar') == 'Amit Singh' ? 'selected' : '' }}>
                                            Amit Singh</option>
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="projectStatus" class="form-label">Project Status</label>
                                    <select class="form-select" id="projectStatus">
                                        <option value="planning"
                                            {{ ($project['status'] ?? 'In Progress') == 'Planning' ? 'selected' : '' }}>
                                            Planning</option>
                                        <option value="in_progress"
                                            {{ ($project['status'] ?? 'In Progress') == 'In Progress' ? 'selected' : '' }}>
                                            In Progress</option>
                                        <option value="on_hold"
                                            {{ ($project['status'] ?? 'In Progress') == 'On Hold' ? 'selected' : '' }}>On
                                            Hold</option>
                                        <option value="completed"
                                            {{ ($project['status'] ?? 'In Progress') == 'Completed' ? 'selected' : '' }}>
                                            Completed</option>
                                        <option value="cancelled"
                                            {{ ($project['status'] ?? 'In Progress') == 'Cancelled' ? 'selected' : '' }}>
                                            Cancelled</option>
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="projectProgress" class="form-label">Progress (%)</label>
                                    <input type="number" class="form-control" id="projectProgress"
                                        value="{{ $project['progress'] ?? 65 }}" min="0" max="100">
                                    <div class="form-text">Current completion percentage</div>
                                </div>
                            </div>

                            <!-- Location Information -->
                            <div class="row mt-4">
                                <div class="col-12">
                                    <h6 class="mb-3 text-muted">Location Information</h6>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" class="form-control" id="address" value="Sector 62"
                                        placeholder="Street address">
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="city" class="form-label">City</label>
                                    <input type="text" class="form-control" id="city" value="Noida"
                                        placeholder="City">
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="state" class="form-label">State</label>
                                    <input type="text" class="form-control" id="state" value="Uttar Pradesh"
                                        placeholder="State">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="pincode" class="form-label">Pincode</label>
                                    <input type="text" class="form-control" id="pincode" value="201309"
                                        placeholder="Pincode">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="country" class="form-label">Country</label>
                                    <input type="text" class="form-control" id="country" value="India" readonly>
                                </div>
                            </div>

                            <!-- Timeline Information -->
                            <div class="row mt-4">
                                <div class="col-12">
                                    <h6 class="mb-3 text-muted">Timeline & Budget</h6>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="startDate" class="form-label">Start Date <span
                                            class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="startDate" value="2024-01-15"
                                        required>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="endDate" class="form-label">End Date <span
                                            class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="endDate" value="2024-06-30"
                                        required>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="estimatedDuration" class="form-label">Estimated Duration</label>
                                    <input type="text" class="form-control" id="estimatedDuration"
                                        value="5 months 15 days" readonly>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="totalBudget" class="form-label">Total Budget (₹) <span
                                            class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="totalBudget" value="25000000"
                                        required>
                                </div>
                            </div>

                            <!-- Project Specifications -->
                            <div class="row mt-4">
                                <div class="col-12">
                                    <h6 class="mb-3 text-muted">Project Specifications</h6>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="projectType" class="form-label">Project Type</label>
                                    <select class="form-select" id="projectType">
                                        <option value="residential">Residential</option>
                                        <option value="commercial" selected>Commercial</option>
                                        <option value="industrial">Industrial</option>
                                        <option value="infrastructure">Infrastructure</option>
                                    </select>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="buildingType" class="form-label">Building Type</label>
                                    <select class="form-select" id="buildingType">
                                        <option value="apartment">Apartment Building</option>
                                        <option value="villa">Villa</option>
                                        <option value="office" selected>Office Building</option>
                                        <option value="mall">Shopping Mall</option>
                                        <option value="hospital">Hospital</option>
                                    </select>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="floors" class="form-label">Number of Floors</label>
                                    <input type="number" class="form-control" id="floors" value="10"
                                        placeholder="e.g., 10">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="totalArea" class="form-label">Total Area (sq. ft.)</label>
                                    <input type="number" class="form-control" id="totalArea" value="50000"
                                        placeholder="Total area in square feet">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="builtUpArea" class="form-label">Built-up Area (sq. ft.)</label>
                                    <input type="number" class="form-control" id="builtUpArea" value="45000"
                                        placeholder="Built-up area in square feet">
                                </div>
                            </div>

                            <!-- Additional Information -->
                            <div class="row mt-4">
                                <div class="col-12">
                                    <h6 class="mb-3 text-muted">Additional Information</h6>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="contactPerson" class="form-label">Client Contact Person</label>
                                    <input type="text" class="form-control" id="contactPerson" value="Mr. Sharma"
                                        placeholder="Contact person name">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="contactPhone" class="form-label">Contact Phone</label>
                                    <input type="tel" class="form-control" id="contactPhone" value="+91 9876543210"
                                        placeholder="Phone number">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="contactEmail" class="form-label">Contact Email</label>
                                    <input type="email" class="form-control" id="contactEmail"
                                        value="contact@abccorp.com" placeholder="Email address">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="priority" class="form-label">Priority Level</label>
                                    <select class="form-select" id="priority">
                                        <option value="low">Low</option>
                                        <option value="medium" selected>Medium</option>
                                        <option value="high">High</option>
                                        <option value="urgent">Urgent</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Risk Assessment -->
                            <div class="row mt-4">
                                <div class="col-12">
                                    <h6 class="mb-3 text-muted">Risk Assessment</h6>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="riskLevel" class="form-label">Risk Level</label>
                                    <select class="form-select" id="riskLevel">
                                        <option value="low">Low</option>
                                        <option value="medium" selected>Medium</option>
                                        <option value="high">High</option>
                                    </select>
                                </div>

                                <div class="col-md-8 mb-3">
                                    <label for="riskNotes" class="form-label">Risk Notes</label>
                                    <textarea class="form-control" id="riskNotes" rows="2" placeholder="Any specific risks or concerns...">Weather delays possible during monsoon season</textarea>
                                </div>
                            </div>

                            <!-- Submit Buttons -->
                            <div class="row mt-4">
                                <div class="col-12">
                                    <div class="d-flex gap-2 justify-content-end">
                                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal">
                                            <span class="material-icons-round me-2">delete</span>
                                            Delete Project
                                        </button>
                                        <button type="reset" class="btn btn-outline-secondary">
                                            <span class="material-icons-round me-2">clear</span>
                                            Reset Changes
                                        </button>
                                        <button type="submit" class="btn btn-primary">
                                            <span class="material-icons-round me-2">save</span>
                                            Update Project
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <span class="material-icons-round text-danger" style="font-size: 64px;">warning</span>
                        <h4 class="mt-3">Are you sure?</h4>
                        <p class="text-muted">You are about to delete the project
                            "{{ $project['name'] ?? 'Office Building Construction' }}". This action cannot be undone.</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger">Delete Project</button>
                </div>
            </div>
        </div>
    </div>

    <style>
        .form-label {
            font-weight: 600;
            color: #374151;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 0.2rem rgba(59, 130, 246, 0.25);
        }

        .card {
            border: 1px solid #e2e8f0;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .text-muted h6 {
            color: #64748b !important;
            font-weight: 600;
        }

        .modal-header {
            border-bottom: 1px solid #e2e8f0;
        }

        .modal-footer {
            border-top: 1px solid #e2e8f0;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Calculate estimated duration
            const startDate = document.getElementById('startDate');
            const endDate = document.getElementById('endDate');
            const estimatedDuration = document.getElementById('estimatedDuration');

            function calculateDuration() {
                if (startDate.value && endDate.value) {
                    const start = new Date(startDate.value);
                    const end = new Date(endDate.value);
                    const diffTime = Math.abs(end - start);
                    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                    const months = Math.floor(diffDays / 30);
                    const days = diffDays % 30;

                    if (months > 0) {
                        estimatedDuration.value = `${months} months${days > 0 ? ` ${days} days` : ''}`;
                    } else {
                        estimatedDuration.value = `${diffDays} days`;
                    }
                }
            }

            startDate.addEventListener('change', calculateDuration);
            endDate.addEventListener('change', calculateDuration);

            // Initialize duration calculation
            calculateDuration();
        });
    </script>
@endsection
