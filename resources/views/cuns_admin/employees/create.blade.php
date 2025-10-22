@extends('layouts.app')

@section('title', 'Create New Project')
@section('page_title', 'Project Creation & Assignment')

@section('content')
    <div class="container-fluid">

        <!-- Page Header -->
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <h4><i class="fas fa-plus-circle"></i> Create New Project</h4>
            </div>
            <div class="card-body">
                <p class="text-muted">Fill out the details below to add a new project and assign relevant employees,
                    supervisors, and timelines.</p>
            </div>
        </div>

        <!-- Project Creation Form -->
        <div class="card shadow-sm">
            <div class="card-body">
                <form>
                    <!-- Basic Info -->
                    <h5 class="mb-3 text-primary">Project Information</h5>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label>Project Name</label>
                            <input type="text" class="form-control" placeholder="Enter project name">
                        </div>
                        <div class="col-md-6">
                            <label>Project Code</label>
                            <input type="text" class="form-control" placeholder="Auto-generated or custom code">
                        </div>
                    </div>

                    <!-- Timeline -->
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label>Start Date</label>
                            <input type="date" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label>End Date</label>
                            <input type="date" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label>Project Duration (auto)</label>
                            <input type="text" class="form-control" value="120 Days" readonly>
                        </div>
                    </div>

                    <!-- Location & Type -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label>Project Location</label>
                            <input type="text" class="form-control" placeholder="e.g. Karachi Site Area B">
                        </div>
                        <div class="col-md-6">
                            <label>Project Type</label>
                            <select class="form-select">
                                <option>Building Construction</option>
                                <option>Road Infrastructure</option>
                                <option>Bridge</option>
                                <option>Electrical</option>
                                <option>Interior Design</option>
                            </select>
                        </div>
                    </div>

                    <!-- Budget Section -->
                    <h5 class="mb-3 text-primary">Budget & Financials</h5>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label>Total Budget (PKR)</label>
                            <input type="number" class="form-control" placeholder="Enter total budget">
                        </div>
                        <div class="col-md-4">
                            <label>Advance Payment</label>
                            <input type="number" class="form-control" placeholder="Advance issued">
                        </div>
                        <div class="col-md-4">
                            <label>Payment Mode</label>
                            <select class="form-select">
                                <option>Bank Transfer</option>
                                <option>Cash</option>
                                <option>Cheque</option>
                            </select>
                        </div>
                    </div>

                    <!-- Assign Employees -->
                    <h5 class="mb-3 text-primary">Assign Employees</h5>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label>Supervisor</label>
                            <select class="form-select">
                                <option>Select Supervisor</option>
                                <option>Ali Raza</option>
                                <option>Ahmed Khan</option>
                                <option>Imran Malik</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Employees</label>
                            <select multiple class="form-select">
                                <option>Worker 1</option>
                                <option>Worker 2</option>
                                <option>Worker 3</option>
                                <option>Electrician</option>
                                <option>Site Engineer</option>
                            </select>
                            <small class="text-muted">Hold CTRL (or CMD) to select multiple employees.</small>
                        </div>
                    </div>

                    <!-- Equipment Requirements -->
                    <h5 class="mb-3 text-primary">Equipment Requirements</h5>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <textarea class="form-control" rows="3" placeholder="List required machinery, materials, or tools..."></textarea>
                        </div>
                    </div>

                    <!-- Notes -->
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <label>Project Notes</label>
                            <textarea class="form-control" rows="3" placeholder="Any additional information about the project..."></textarea>
                        </div>
                    </div>

                    <!-- Submit Buttons -->
                    <div class="d-flex justify-content-end">
                        <button type="reset" class="btn btn-secondary me-2">Reset</button>
                        <button type="submit" class="btn btn-success">Create Project</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Preview Table -->
        <div class="card mt-4">
            <div class="card-header bg-light">
                <h5 class="mb-0">Recent Created Projects</h5>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>Project ID</th>
                            <th>Name</th>
                            <th>Supervisor</th>
                            <th>Start Date</th>
                            <th>Status</th>
                            <th>Budget (PKR)</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>PRJ-001</td>
                            <td>Bridge Site C</td>
                            <td>Ali Raza</td>
                            <td>2025-09-01</td>
                            <td><span class="badge bg-success">Active</span></td>
                            <td>8,500,000</td>
                            <td><button class="btn btn-sm btn-primary">View</button></td>
                        </tr>
                        <tr>
                            <td>PRJ-002</td>
                            <td>Housing Project A</td>
                            <td>Ahmed Khan</td>
                            <td>2025-08-15</td>
                            <td><span class="badge bg-warning text-dark">Pending</span></td>
                            <td>12,300,000</td>
                            <td><button class="btn btn-sm btn-primary">View</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
