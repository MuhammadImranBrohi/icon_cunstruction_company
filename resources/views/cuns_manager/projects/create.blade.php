@extends('cuns_manager.layouts.main')

@section('title', 'Create New Project - Construction Manager')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <!-- Page Header -->
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="fw-bold py-3 mb-0">
                        <span class="text-muted fw-light">Projects /</span> Create New Project
                    </h4>
                    <a href="{{ route('cuns_manager.projects.index') }}" class="btn btn-outline-secondary">
                        <span class="material-icons-round me-2">arrow_back</span>
                        Back to Projects
                    </a>
                </div>
            </div>
        </div>

        <!-- Project Form -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Project Information</h5>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="row">
                                <!-- Basic Information -->
                                <div class="col-md-6 mb-3">
                                    <label for="projectName" class="form-label">Project Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="projectName"
                                        placeholder="Enter project name" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="projectCode" class="form-label">Project Code</label>
                                    <input type="text" class="form-control" id="projectCode"
                                        placeholder="e.g., PROJ-001">
                                </div>

                                <div class="col-12 mb-3">
                                    <label for="projectDescription" class="form-label">Project Description</label>
                                    <textarea class="form-control" id="projectDescription" rows="3" placeholder="Describe the project..."></textarea>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="clientName" class="form-label">Client Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="clientName"
                                        placeholder="Enter client name" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="projectManager" class="form-label">Project Manager</label>
                                    <select class="form-select" id="projectManager">
                                        <option selected>Select Project Manager</option>
                                        <option value="1">Rajesh Kumar</option>
                                        <option value="2">Priya Sharma</option>
                                        <option value="3">Amit Singh</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Location Information -->
                            <div class="row mt-4">
                                <div class="col-12">
                                    <h6 class="mb-3 text-muted">Location Information</h6>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" class="form-control" id="address" placeholder="Street address">
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="city" class="form-label">City</label>
                                    <input type="text" class="form-control" id="city" placeholder="City">
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="state" class="form-label">State</label>
                                    <input type="text" class="form-control" id="state" placeholder="State">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="pincode" class="form-label">Pincode</label>
                                    <input type="text" class="form-control" id="pincode" placeholder="Pincode">
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
                                    <input type="date" class="form-control" id="startDate" required>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="endDate" class="form-label">End Date <span
                                            class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="endDate" required>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="estimatedDuration" class="form-label">Estimated Duration</label>
                                    <input type="text" class="form-control" id="estimatedDuration"
                                        placeholder="e.g., 6 months" readonly>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="totalBudget" class="form-label">Total Budget (₹) <span
                                            class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="totalBudget"
                                        placeholder="Enter budget" required>
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
                                        <option selected>Select Type</option>
                                        <option value="residential">Residential</option>
                                        <option value="commercial">Commercial</option>
                                        <option value="industrial">Industrial</option>
                                        <option value="infrastructure">Infrastructure</option>
                                    </select>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="buildingType" class="form-label">Building Type</label>
                                    <select class="form-select" id="buildingType">
                                        <option selected>Select Building Type</option>
                                        <option value="apartment">Apartment Building</option>
                                        <option value="villa">Villa</option>
                                        <option value="office">Office Building</option>
                                        <option value="mall">Shopping Mall</option>
                                        <option value="hospital">Hospital</option>
                                    </select>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="floors" class="form-label">Number of Floors</label>
                                    <input type="number" class="form-control" id="floors" placeholder="e.g., 10">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="totalArea" class="form-label">Total Area (sq. ft.)</label>
                                    <input type="number" class="form-control" id="totalArea"
                                        placeholder="Total area in square feet">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="builtUpArea" class="form-label">Built-up Area (sq. ft.)</label>
                                    <input type="number" class="form-control" id="builtUpArea"
                                        placeholder="Built-up area in square feet">
                                </div>
                            </div>

                            <!-- Document Upload -->
                            <div class="row mt-4">
                                <div class="col-12">
                                    <h6 class="mb-3 text-muted">Documents & Files</h6>
                                </div>

                                <div class="col-12 mb-3">
                                    <label for="projectDocuments" class="form-label">Upload Documents</label>
                                    <input class="form-control" type="file" id="projectDocuments" multiple>
                                    <div class="form-text">Upload project plans, drawings, and related documents (PDF, JPG,
                                        PNG)</div>
                                </div>
                            </div>

                            <!-- Submit Buttons -->
                            <div class="row mt-4">
                                <div class="col-12">
                                    <div class="d-flex gap-2 justify-content-end">
                                        <button type="reset" class="btn btn-outline-secondary">
                                            <span class="material-icons-round me-2">clear</span>
                                            Reset
                                        </button>
                                        <button type="submit" class="btn btn-primary">
                                            <span class="material-icons-round me-2">save</span>
                                            Create Project
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
        });
    </script>
@endsection
