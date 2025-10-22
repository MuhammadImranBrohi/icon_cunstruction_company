@extends('layouts.app')

@section('title', 'Equipment Logs')
@section('page_title', 'Equipment Logs Management')

@section('content')
    <div class="container-fluid px-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-primary">Equipment Activity Logs</h2>
            <a href="#" class="btn btn-outline-primary btn-sm"><i class="fas fa-download"></i> Export Logs</a>
        </div>

        <div class="card shadow-sm mb-4">
            <div class="card-header bg-secondary text-white">
                <i class="fas fa-clock"></i> Log Filters
            </div>
            <div class="card-body">
                <form class="row g-3">
                    <div class="col-md-3">
                        <label class="form-label fw-semibold">Equipment Type</label>
                        <select class="form-select">
                            <option selected>All</option>
                            <option>Excavator</option>
                            <option>Bulldozer</option>
                            <option>Crane</option>
                            <option>Loader</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-semibold">Date Range</label>
                        <input type="date" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-semibold">Status</label>
                        <select class="form-select">
                            <option selected>All</option>
                            <option>Operational</option>
                            <option>Under Maintenance</option>
                            <option>Idle</option>
                        </select>
                    </div>
                    <div class="col-md-3 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary w-100"><i class="fas fa-search"></i> Filter
                            Logs</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <i class="fas fa-list"></i> Recent Equipment Activity Logs
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Equipment ID</th>
                            <th>Equipment Name</th>
                            <th>Activity Type</th>
                            <th>Performed By</th>
                            <th>Date</th>
                            <th>Duration (hrs)</th>
                            <th>Remarks</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>EQ-101</td>
                            <td>Excavator A2</td>
                            <td>Operation</td>
                            <td>Ali Khan</td>
                            <td>2025-10-20</td>
                            <td>8</td>
                            <td>Routine earth removal task</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>EQ-202</td>
                            <td>Crane C5</td>
                            <td>Maintenance</td>
                            <td>Ahmed Raza</td>
                            <td>2025-10-19</td>
                            <td>2</td>
                            <td>Oil filter replaced</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>EQ-305</td>
                            <td>Loader L1</td>
                            <td>Operation</td>
                            <td>Fatima Noor</td>
                            <td>2025-10-18</td>
                            <td>6</td>
                            <td>Material transfer to section B</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-4">
            <h5 class="text-muted"><i class="fas fa-chart-line"></i> Log Summary Insights</h5>
            <div class="row">
                <div class="col-md-4">
                    <div class="card text-center shadow-sm">
                        <div class="card-body">
                            <h3 class="text-success">72%</h3>
                            <p class="text-muted">Equipment Operational Rate</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-center shadow-sm">
                        <div class="card-body">
                            <h3 class="text-danger">5</h3>
                            <p class="text-muted">Maintenance Alerts This Week</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-center shadow-sm">
                        <div class="card-body">
                            <h3 class="text-warning">3 hrs</h3>
                            <p class="text-muted">Average Downtime</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
