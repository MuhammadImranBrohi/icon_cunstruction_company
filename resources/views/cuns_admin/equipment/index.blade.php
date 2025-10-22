@extends('layouts.app')

@section('title', 'Equipment Dashboard')
@section('page_title', 'All Equipment Overview')

@section('content')
    <div class="container-fluid">

        <!-- Summary Section -->
        <div class="row">
            <div class="col-md-3">
                <div class="card bg-primary text-white text-center">
                    <div class="card-body">
                        <h5>Total Equipment</h5>
                        <h2>158</h2>
                        <p>Registered items in the system</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-success text-white text-center">
                    <div class="card-body">
                        <h5>Active Equipment</h5>
                        <h2>132</h2>
                        <p>Currently in use at projects</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-warning text-dark text-center">
                    <div class="card-body">
                        <h5>Under Maintenance</h5>
                        <h2>15</h2>
                        <p>Equipment in repair center</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-danger text-white text-center">
                    <div class="card-body">
                        <h5>Inactive/Decommissioned</h5>
                        <h2>11</h2>
                        <p>Not in working condition</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Equipment Table -->
        <div class="card mt-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title mb-0">Equipment Inventory</h4>
                <div>
                    <a href="{{ url('/cuns_admin/equipment/create') }}" class="btn btn-primary btn-sm">
                        <i class="bi bi-plus-circle"></i> Add New
                    </a>
                    <a href="{{ url('/cuns_admin/equipment/logs') }}" class="btn btn-outline-secondary btn-sm">
                        <i class="bi bi-journal-text"></i> View Logs
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover table-bordered align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Equipment Name</th>
                            <th>Category</th>
                            <th>Project</th>
                            <th>Status</th>
                            <th>Last Service</th>
                            <th>Next Service Due</th>
                            <th>Condition</th>
                            <th>Assigned To</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Concrete Mixer</td>
                            <td>Heavy Machinery</td>
                            <td>Bridge Expansion</td>
                            <td><span class="badge bg-success">Active</span></td>
                            <td>2025-09-30</td>
                            <td>2025-11-15</td>
                            <td>Excellent</td>
                            <td>Supervisor - Ali Khan</td>
                            <td>
                                <button class="btn btn-sm btn-outline-primary">Edit</button>
                                <button class="btn btn-sm btn-outline-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Crane</td>
                            <td>Heavy Lift</td>
                            <td>Building B Tower</td>
                            <td><span class="badge bg-warning text-dark">Maintenance</span></td>
                            <td>2025-08-20</td>
                            <td>2025-10-30</td>
                            <td>Good</td>
                            <td>Manager - Umer</td>
                            <td>
                                <button class="btn btn-sm btn-outline-primary">Edit</button>
                                <button class="btn btn-sm btn-outline-danger">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Equipment Chart Section -->
        <div class="card mt-4">
            <div class="card-header">
                <h5 class="mb-0">Equipment Usage Statistics</h5>
            </div>
            <div class="card-body">
                <div style="height: 300px; border: 1px dashed #bbb;"
                    class="d-flex align-items-center justify-content-center">
                    <p class="text-muted">[Equipment Usage Chart Placeholder]</p>
                </div>
            </div>
        </div>

        <!-- Maintenance Alerts -->
        <div class="card mt-4 border-danger">
            <div class="card-header bg-danger text-white">
                <h5 class="mb-0">Upcoming Maintenance Alerts</h5>
            </div>
            <div class="card-body">
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Generator - Project Alpha
                        <span class="badge bg-warning text-dark">Service Due in 3 Days</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Excavator - Road Project
                        <span class="badge bg-danger">Overdue Service</span>
                    </li>
                </ul>
            </div>
        </div>

    </div>
@endsection
