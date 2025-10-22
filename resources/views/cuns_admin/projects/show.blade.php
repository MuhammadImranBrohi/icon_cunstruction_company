@extends('layouts.app')

@section('title', 'Project Details show')
@section('page_title', 'Show Projects - Details')

@section('content')
    <div class="container-fluid">

        {{-- ========== PAGE HEADER ========== --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-primary">Project Details</h2>
            <a href="{{ route('projects.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Back to Projects
            </a>
        </div>

        {{-- ========== PROJECT INFO CARD ========== --}}
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-light">
                <h5 class="fw-bold mb-0"><i class="fas fa-info-circle me-2"></i>Project Information</h5>
            </div>
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-md-4"><strong>Project Name:</strong> Highway Expansion</div>
                    <div class="col-md-4"><strong>Client:</strong> Ali Khan</div>
                    <div class="col-md-4"><strong>Project Manager:</strong> Mr. Ahmed</div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-4"><strong>Start Date:</strong> 2025-01-10</div>
                    <div class="col-md-4"><strong>End Date:</strong> 2025-10-31</div>
                    <div class="col-md-4"><strong>Status:</strong> <span class="badge bg-success">Ongoing</span></div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-12"><strong>Remarks:</strong> Project progressing well, no major issues.</div>
                </div>
            </div>
        </div>

        {{-- ========== PROJECT TASKS TABLE ========== --}}
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-light d-flex justify-content-between align-items-center">
                <h5 class="fw-bold mb-0"><i class="fas fa-tasks me-2"></i>Tasks for This Project</h5>
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addTaskModal">
                    <i class="fas fa-plus-circle"></i> Add New Task
                </button>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Task Name</th>
                            <th>Assigned To</th>
                            <th>Deadline</th>
                            <th>Status</th>
                            <th>Remarks</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>001</td>
                            <td>Foundation Laying</td>
                            <td>Ali Khan</td>
                            <td>2025-05-10</td>
                            <td><span class="badge bg-success">Completed</span></td>
                            <td>Finished ahead of schedule</td>
                            <td>
                                <button class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></button>
                                <button class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>002</td>
                            <td>Steel Framework</td>
                            <td>Sara Ahmed</td>
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

        {{-- ========== ADD TASK MODAL ========== --}}
        <div class="modal fade" id="addTaskModal" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title">Add New Task</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Task Name</label>
                                    <input type="text" class="form-control" placeholder="Enter task name">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Assigned To</label>
                                    <input type="text" class="form-control" placeholder="Enter employee name">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Deadline</label>
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
                                <textarea class="form-control" rows="3" placeholder="Enter notes or instructions"></textarea>
                            </div>
                            <button class="btn btn-primary">Add Task</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
