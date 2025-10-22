@extends('layouts.app')

@section('title', 'Role Management')
@section('page_title', 'Settings - Roles')

@section('content')
    <div class="container-fluid">

        {{-- PAGE HEADER --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-primary">User Roles</h2>
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addRoleModal">
                <i class="fas fa-plus-circle me-1"></i> Add New Role
            </button>
        </div>

        {{-- ROLES TABLE --}}
        <div class="card shadow-sm">
            <div class="card-body table-responsive">
                <table class="table table-bordered align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Role Name</th>
                            <th>Permissions</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>001</td>
                            <td>Admin</td>
                            <td>All Permissions</td>
                            <td><span class="badge bg-success">Active</span></td>
                            <td>
                                <button class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></button>
                                <button class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>002</td>
                            <td>Project Manager</td>
                            <td>Manage Projects & Tasks</td>
                            <td><span class="badge bg-success">Active</span></td>
                            <td>
                                <button class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></button>
                                <button class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>003</td>
                            <td>Employee</td>
                            <td>View Assigned Tasks</td>
                            <td><span class="badge bg-warning text-dark">Limited</span></td>
                            <td>
                                <button class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></button>
                                <button class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        {{-- ADD ROLE MODAL --}}
        <div class="modal fade" id="addRoleModal" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title">Add New Role</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label class="form-label">Role Name</label>
                                <input type="text" class="form-control" placeholder="Enter role name">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Permissions</label>
                                <textarea class="form-control" rows="3" placeholder="Enter permissions"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Add Role</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
