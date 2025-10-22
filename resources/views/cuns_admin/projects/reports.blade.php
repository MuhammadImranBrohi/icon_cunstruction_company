@extends('layouts.app')

@section('title', 'Project Reports')
@section('page_title', 'Projects - Reports')

@section('content')
    <div class="container-fluid">

        {{-- ========== PAGE HEADER ========== --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-primary">Project Reports</h2>
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createReportModal">
                <i class="fas fa-file-alt"></i> Create Report
            </button>
        </div>

        {{-- ========== REPORTS TABLE ========== --}}
        <div class="card shadow-sm">
            <div class="card-body table-responsive">
                <table class="table table-bordered align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Project Name</th>
                            <th>Client</th>
                            <th>Status</th>
                            <th>Completion %</th>
                            <th>Remarks</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>001</td>
                            <td>Highway Expansion</td>
                            <td>Ali Khan</td>
                            <td><span class="badge bg-success">Ongoing</span></td>
                            <td>65%</td>
                            <td>On schedule, no issues</td>
                            <td>
                                <button class="btn btn-sm btn-primary"><i class="fas fa-eye"></i> View</button>
                            </td>
                        </tr>
                        <tr>
                            <td>002</td>
                            <td>Commercial Complex</td>
                            <td>Fatima Builders</td>
                            <td><span class="badge bg-warning text-dark">Delayed</span></td>
                            <td>40%</td>
                            <td>Some tasks delayed due to weather</td>
                            <td>
                                <button class="btn btn-sm btn-primary"><i class="fas fa-eye"></i> View</button>
                            </td>
                        </tr>
                        <tr>
                            <td>003</td>
                            <td>Bridge Maintenance</td>
                            <td>Zahid Construction</td>
                            <td><span class="badge bg-info text-dark">Completed</span></td>
                            <td>100%</td>
                            <td>All work completed successfully</td>
                            <td>
                                <button class="btn btn-sm btn-primary"><i class="fas fa-eye"></i> View</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        {{-- ========== CREATE REPORT MODAL ========== --}}
        <div class="modal fade" id="createReportModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title">Create Project Report</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label class="form-label">Select Project</label>
                                <select class="form-select">
                                    <option>Highway Expansion</option>
                                    <option>Commercial Complex</option>
                                    <option>Bridge Maintenance</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Remarks</label>
                                <textarea class="form-control" rows="3" placeholder="Enter remarks for this report"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Generate Report</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
