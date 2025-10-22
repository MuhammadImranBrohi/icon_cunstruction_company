@extends('layouts.app')

@section('title', 'Add Project')
@section('page_title', 'Projects - Add New')

@section('content')
    <div class="container-fluid">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-primary">Add New Project</h2>
            <a href="{{ route('projects.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back to
                Projects</a>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <form>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Project Name</label>
                            <input type="text" class="form-control" placeholder="Enter project name">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Client Name</label>
                            <input type="text" class="form-control" placeholder="Enter client name">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Project Manager</label>
                            <input type="text" class="form-control" placeholder="Enter manager name">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Start Date</label>
                            <input type="date" class="form-control">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">End Date</label>
                            <input type="date" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Status</label>
                            <select class="form-select">
                                <option>Ongoing</option>
                                <option>Delayed</option>
                                <option>Completed</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Remarks</label>
                        <textarea class="form-control" rows="4" placeholder="Additional notes about the project"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary"><i class="fas fa-save me-1"></i> Save Project</button>
                </form>
            </div>
        </div>

    </div>
@endsection
