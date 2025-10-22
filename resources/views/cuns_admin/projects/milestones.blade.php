@extends('layouts.app')

@section('title', 'Project Milestones')
@section('page_title', 'Projects - Milestones')

@section('content')
    <div class="container-fluid">

        {{-- PAGE HEADER --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-primary">Project Milestones</h2>
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addMilestoneModal">
                <i class="fas fa-plus-circle"></i> Add Milestone
            </button>
        </div>

        {{-- MILESTONES TABLE --}}
        <div class="card shadow-sm">
            <div class="card-body table-responsive">
                <table class="table table-bordered align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Milestone</th>
                            <th>Due Date</th>
                            <th>Status</th>
                            <th>Remarks</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>001</td>
                            <td>Foundation Complete</td>
                            <td>2025-05-10</td>
                            <td><span class="badge bg-success">Completed</span></td>
                            <td>Finished on time</td>
                            <td>
                                <button class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></button>
                                <button class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>002</td>
                            <td>Steel Framework</td>
                            <td>2025-06-15</td>
                            <td><span class="badge bg-warning text-dark">In Progress</span></td>
                            <td>Half completed, awaiting materials</td>
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

        {{-- ADD MILESTONE MODAL --}}
        <div class="modal fade" id="addMilestoneModal" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title">Add Milestone</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label class="form-label">Milestone Name</label>
                                <input type="text" class="form-control" placeholder="Enter milestone name">
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Due Date</label>
                                    <input type="date" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Status</label>
                                    <select class="form-select">
                                        <option>Pending</option>
                                        <option>In Progress</option>
                                        <option>Completed</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Remarks</label>
                                <textarea class="form-control" rows="3" placeholder="Enter remarks"></textarea>
                            </div>
                            <button class="btn btn-primary">Save Milestone</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
