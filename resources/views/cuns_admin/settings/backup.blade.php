@extends('layouts.app')

@section('title', 'System Backup')
@section('page_title', 'Settings - Backup')

@section('content')
    <div class="container-fluid">

        {{-- PAGE HEADER --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-primary">System Backup Management</h2>
            <button class="btn btn-success"><i class="fas fa-cloud-upload-alt me-1"></i> Create Backup</button>
        </div>

        {{-- BACKUP HISTORY TABLE --}}
        <div class="card shadow-sm">
            <div class="card-body table-responsive">
                <table class="table table-bordered align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Backup Name</th>
                            <th>Created On</th>
                            <th>Size</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>001</td>
                            <td>Backup-Jan-2025</td>
                            <td>2025-01-31</td>
                            <td>1.2 GB</td>
                            <td><span class="badge bg-success">Completed</span></td>
                            <td>
                                <button class="btn btn-sm btn-primary"><i class="fas fa-download"></i></button>
                                <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>002</td>
                            <td>Backup-Feb-2025</td>
                            <td>2025-02-28</td>
                            <td>1.5 GB</td>
                            <td><span class="badge bg-success">Completed</span></td>
                            <td>
                                <button class="btn btn-sm btn-primary"><i class="fas fa-download"></i></button>
                                <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>003</td>
                            <td>Backup-Mar-2025</td>
                            <td>2025-03-31</td>
                            <td>1.3 GB</td>
                            <td><span class="badge bg-warning text-dark">Pending</span></td>
                            <td>
                                <button class="btn btn-sm btn-primary"><i class="fas fa-download"></i></button>
                                <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
