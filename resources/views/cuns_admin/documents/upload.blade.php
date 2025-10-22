@extends('layouts.app')

@section('title', 'Upload Documents')
@section('page_title', 'Upload Project Documents')

@section('content')
    <div class="container-fluid">

        <!-- Header -->
        <div class="mb-4">
            <h4 class="fw-bold text-primary">Upload Documents</h4>
            <p class="text-muted">Upload project blueprints, material invoices, or site reports for manager review.</p>
        </div>

        <!-- Upload Form -->
        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Project Name</label>
                        <input type="text" class="form-control" placeholder="Enter project name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Document Type</label>
                        <select class="form-select">
                            <option>Blueprint</option>
                            <option>Invoice</option>
                            <option>Site Photo</option>
                            <option>Contract</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Upload File</label>
                        <input type="file" class="form-control">
                        <small class="text-muted">Accepted formats: PDF, DOCX, JPG, PNG (max 10MB)</small>
                    </div>
                    <button class="btn btn-primary">Upload</button>
                </form>
            </div>
        </div>

        <!-- Uploaded Documents Table -->
        <div class="card shadow-sm">
            <div class="card-header bg-secondary text-white">
                <h5 class="mb-0">Uploaded Files</h5>
            </div>
            <div class="card-body">
                <table class="table table-striped align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>File Name</th>
                            <th>Type</th>
                            <th>Uploaded By</th>
                            <th>Status</th>
                            <th>Uploaded On</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>ProjectA_Blueprint.pdf</td>
                            <td>Blueprint</td>
                            <td>Supervisor Ali</td>
                            <td><span class="badge bg-success">Approved</span></td>
                            <td>Oct 20, 2025</td>
                            <td>
                                <button class="btn btn-sm btn-info">View</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Site_Inspection_Report.docx</td>
                            <td>Report</td>
                            <td>Manager Sara</td>
                            <td><span class="badge bg-warning text-dark">Pending</span></td>
                            <td>Oct 21, 2025</td>
                            <td>
                                <button class="btn btn-sm btn-info">View</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
