@extends('layouts.app')

@section('title', 'Add Equipment')
@section('page_title', 'Register New Equipment')

@section('content')
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0"><i class="bi bi-plus-circle"></i> Add New Equipment</h4>
                <a href="{{ url('/cuns_admin/equipment/index') }}" class="btn btn-light btn-sm">
                    <i class="bi bi-arrow-left-circle"></i> Back to List
                </a>
            </div>
            <div class="card-body">
                <p class="text-muted mb-4">
                    Use this form to register new construction equipment into the system. Make sure all details are accurate
                    for proper asset management and maintenance scheduling.
                </p>

                <!-- Equipment Form -->
                <form>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Equipment Name</label>
                            <input type="text" class="form-control" placeholder="e.g. Excavator, Concrete Mixer">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Equipment ID / Serial Number</label>
                            <input type="text" class="form-control" placeholder="e.g. EQP-2025-0012">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label fw-bold">Category</label>
                            <select class="form-select">
                                <option>Heavy Machinery</option>
                                <option>Electrical Tools</option>
                                <option>Safety Equipment</option>
                                <option>Transport Vehicle</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-bold">Current Project</label>
                            <input type="text" class="form-control" placeholder="e.g. Bridge Expansion Project">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-bold">Assigned Supervisor</label>
                            <input type="text" class="form-control" placeholder="e.g. Ali Khan">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label fw-bold">Purchase Date</label>
                            <input type="date" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-bold">Initial Condition</label>
                            <select class="form-select">
                                <option>Excellent</option>
                                <option>Good</option>
                                <option>Fair</option>
                                <option>Poor</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-bold">Status</label>
                            <select class="form-select">
                                <option>Active</option>
                                <option>Under Maintenance</option>
                                <option>Inactive</option>
                            </select>
                        </div>
                    </div>

                    <!-- Maintenance Schedule -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Last Service Date</label>
                            <input type="date" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Next Scheduled Maintenance</label>
                            <input type="date" class="form-control">
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="mb-3">
                        <label class="form-label fw-bold">Description / Notes</label>
                        <textarea class="form-control" rows="3" placeholder="Enter any additional information about this equipment..."></textarea>
                    </div>

                    <!-- File Upload -->
                    <div class="mb-3">
                        <label class="form-label fw-bold">Upload Equipment Image or Document</label>
                        <input type="file" class="form-control">
                    </div>

                    <!-- Buttons -->
                    <div class="d-flex justify-content-end mt-4">
                        <button type="reset" class="btn btn-outline-secondary me-2">
                            <i class="bi bi-x-circle"></i> Reset
                        </button>
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-check-circle"></i> Save Equipment
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Info Section -->
        <div class="alert alert-info mt-4 shadow-sm">
            <i class="bi bi-lightbulb-fill"></i>
            <strong>Tip:</strong> Always verify serial numbers and attach a clear image for each machine to improve tracking
            and reduce loss or theft.
        </div>
    </div>
@endsection
