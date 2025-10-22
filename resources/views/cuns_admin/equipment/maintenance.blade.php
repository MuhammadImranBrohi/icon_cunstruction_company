@extends('layouts.app')

@section('title', 'Equipment Maintenance')
@section('page_title', 'Equipment Maintenance Management')

@section('content')
    <div class="container-fluid px-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-primary">Equipment Maintenance Center</h2>
            <a href="#" class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Add New Maintenance</a>
        </div>

        {{-- Maintenance Overview --}}
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card shadow-sm text-center p-3 border-start border-success border-4">
                    <h5 class="text-success fw-bold">Total Equipment</h5>
                    <h3>124</h3>
                    <small class="text-muted">Including all project sites</small>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm text-center p-3 border-start border-warning border-4">
                    <h5 class="text-warning fw-bold">Due for Maintenance</h5>
                    <h3>9</h3>
                    <small class="text-muted">Next 7 days</small>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm text-center p-3 border-start border-danger border-4">
                    <h5 class="text-danger fw-bold">Under Repair</h5>
                    <h3>5</h3>
                    <small class="text-muted">Workshop ongoing</small>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm text-center p-3 border-start border-info border-4">
                    <h5 class="text-info fw-bold">Maintenance Completed</h5>
                    <h3>110</h3>
                    <small class="text-muted">Last 30 days</small>
                </div>
            </div>
        </div>

        {{-- Maintenance Filter --}}
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-secondary text-white">
                <i class="fas fa-filter"></i> Maintenance Filter
            </div>
            <div class="card-body">
                <form class="row g-3">
                    <div class="col-md-3">
                        <label class="form-label fw-semibold">Equipment Type</label>
                        <select class="form-select">
                            <option selected>All Types</option>
                            <option>Excavator</option>
                            <option>Loader</option>
                            <option>Bulldozer</option>
                            <option>Crane</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-semibold">Maintenance Status</label>
                        <select class="form-select">
                            <option selected>All</option>
                            <option>Scheduled</option>
                            <option>In Progress</option>
                            <option>Completed</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-semibold">Date Range</label>
                        <input type="date" class="form-control">
                    </div>
                    <div class="col-md-3 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary w-100"><i class="fas fa-search"></i> Filter</button>
                    </div>
                </form>
            </div>
        </div>

        {{-- Maintenance Records --}}
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-primary text-white">
                <i class="fas fa-tools"></i> Maintenance Records
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Equipment ID</th>
                            <th>Equipment Name</th>
                            <th>Type</th>
                            <th>Last Maintenance</th>
                            <th>Next Due</th>
                            <th>Status</th>
                            <th>Technician</th>
                            <th>Remarks</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>EQ-101</td>
                            <td>Excavator A1</td>
                            <td>Excavator</td>
                            <td>2025-09-28</td>
                            <td>2025-11-01</td>
                            <td><span class="badge bg-success">Completed</span></td>
                            <td>Ali Raza</td>
                            <td>Replaced hydraulic filter</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>EQ-204</td>
                            <td>Bulldozer B3</td>
                            <td>Bulldozer</td>
                            <td>2025-09-15</td>
                            <td>2025-10-25</td>
                            <td><span class="badge bg-warning text-dark">Scheduled</span></td>
                            <td>Umer Khan</td>
                            <td>Routine inspection planned</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>EQ-305</td>
                            <td>Loader L2</td>
                            <td>Loader</td>
                            <td>2025-09-30</td>
                            <td>2025-10-30</td>
                            <td><span class="badge bg-danger">In Progress</span></td>
                            <td>Hassan Ali</td>
                            <td>Engine repair in progress</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Maintenance Summary --}}
        <div class="card shadow-sm">
            <div class="card-header bg-info text-white">
                <i class="fas fa-chart-bar"></i> Maintenance Summary
            </div>
            <div class="card-body">
                <p class="text-muted">Below is a quick summary of the maintenance performance and schedule adherence rate
                    across all construction sites.</p>

                <div class="row">
                    <div class="col-md-6">
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between">
                                <span>On-Time Maintenance</span>
                                <span class="badge bg-success">89%</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Delayed Maintenance</span>
                                <span class="badge bg-danger">11%</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Average Downtime</span>
                                <span class="badge bg-warning text-dark">2.5 hrs</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Total Maintenance Tasks Completed</span>
                                <span class="badge bg-primary">217</span>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <div class="bg-light border rounded p-3 text-center">
                            <h5 class="fw-bold text-primary">Next Scheduled Maintenance</h5>
                            <p><i class="fas fa-calendar-alt text-warning"></i> <strong>Loader L2</strong> - 2025-10-25</p>
                            <p><i class="fas fa-wrench text-secondary"></i> <strong>Technician:</strong> Umer Khan</p>
                            <button class="btn btn-outline-primary btn-sm mt-2"><i class="fas fa-eye"></i> View
                                Details</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
