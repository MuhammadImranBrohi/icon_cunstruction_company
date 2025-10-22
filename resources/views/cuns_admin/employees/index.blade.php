@extends('layouts.app')

@section('title', 'Employees Directory')
@section('page_title', 'Employee Management Dashboard')

@section('content')
    <div class="container-fluid">

        <!-- Header Row -->
        <div class="row mb-3">
            <div class="col-12">
                <h4 class="fw-bold text-primary"><i class="bi bi-people-fill"></i> Employees Directory</h4>
                <p class="text-muted">Manage all employees, view their status, and perform HR operations efficiently.</p>
            </div>
        </div>

        <!-- Analytics Cards -->
        <div class="row">
            <div class="col-md-3">
                <div class="card text-bg-primary">
                    <div class="card-body">
                        <h5>Total Employees</h5>
                        <h3>120</h3>
                        <p class="mb-0"><small>+8 New This Month</small></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-bg-success">
                    <div class="card-body">
                        <h5>Active Projects</h5>
                        <h3>25</h3>
                        <p class="mb-0"><small>12 Under Construction</small></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-bg-warning">
                    <div class="card-body">
                        <h5>On Leave</h5>
                        <h3>7</h3>
                        <p class="mb-0"><small>Last Updated 2 hrs ago</small></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-bg-danger">
                    <div class="card-body">
                        <h5>Performance Alerts</h5>
                        <h3>3</h3>
                        <p class="mb-0"><small>Low attendance rate</small></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Employee Table -->
        <div class="card mt-4 shadow">
            <div class="card-header bg-secondary text-white">
                <h5 class="card-title mb-0"><i class="bi bi-list-task"></i> Employee List</h5>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between mb-3">
                    <input type="text" class="form-control w-25" placeholder="Search Employee...">
                    <button class="btn btn-primary"><i class="bi bi-person-plus-fill"></i> Add Employee</button>
                </div>

                <table class="table table-hover table-bordered align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Designation</th>
                            <th>Project</th>
                            <th>Contact</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>#E001</td>
                            <td>Ahmed Khan</td>
                            <td>Site Engineer</td>
                            <td>Bridge Project A1</td>
                            <td>0321-1234567</td>
                            <td><span class="badge bg-success">Active</span></td>
                            <td>
                                <button class="btn btn-info btn-sm"><i class="bi bi-eye"></i></button>
                                <button class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i></button>
                                <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>#E002</td>
                            <td>Hassan Raza</td>
                            <td>Electrician</td>
                            <td>Building Site B3</td>
                            <td>0300-9876543</td>
                            <td><span class="badge bg-warning text-dark">On Leave</span></td>
                            <td>
                                <button class="btn btn-info btn-sm"><i class="bi bi-eye"></i></button>
                                <button class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i></button>
                                <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Modal for Employee Details -->
        <div class="modal fade" id="employeeDetailsModal" tabindex="-1" aria-labelledby="employeeDetailsLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title" id="employeeDetailsLabel">Employee Details</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Name:</strong> Ahmed Khan</p>
                        <p><strong>Role:</strong> Site Engineer</p>
                        <p><strong>Assigned Project:</strong> Bridge Project A1</p>
                        <p><strong>Performance:</strong> Excellent</p>
                        <p><strong>Contact:</strong> 0321-1234567</p>
                        <p><strong>Remarks:</strong> Responsible for on-site supervision and quality control.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
