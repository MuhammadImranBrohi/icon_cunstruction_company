{{-- 2nd genrate  --}}
@extends('layouts.app')

@section('title', 'Add New Client')
@section('page_title', 'Create Client Profile')

@section('content')
    <div class="container-fluid">
        {{-- Page Header --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="mb-0"><i class="fas fa-user-plus"></i> Register a New Client</h4>
            <a href="{{ route('clients.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Back to Clients
            </a>
        </div>

        {{-- Client Registration Form --}}
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0"><i class="fas fa-id-card-alt"></i> Client Information</h5>
            </div>
            <div class="card-body">
                <form action="#" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{-- Personal Details --}}
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label for="client_name" class="form-label fw-bold">Full Name</label>
                            <input type="text" id="client_name" name="client_name" class="form-control"
                                placeholder="Enter client's full name">
                        </div>
                        <div class="col-md-6">
                            <label for="company_name" class="form-label fw-bold">Company Name</label>
                            <input type="text" id="company_name" name="company_name" class="form-control"
                                placeholder="Enter company name">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label for="email" class="form-label fw-bold">Email Address</label>
                            <input type="email" id="email" name="email" class="form-control"
                                placeholder="example@company.com">
                        </div>
                        <div class="col-md-6">
                            <label for="phone" class="form-label fw-bold">Phone Number</label>
                            <input type="text" id="phone" name="phone" class="form-control"
                                placeholder="+92 300 0000000">
                        </div>
                    </div>

                    {{-- Address --}}
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <label for="address" class="form-label fw-bold">Address</label>
                            <textarea id="address" name="address" class="form-control" rows="3" placeholder="Enter complete address"></textarea>
                        </div>
                    </div>

                    {{-- Contract & Project Details --}}
                    <div class="card border-secondary mb-4">
                        <div class="card-header bg-light fw-bold">
                            <i class="fas fa-briefcase"></i> Contract & Project Details
                        </div>
                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <label for="contract_type" class="form-label fw-bold">Contract Type</label>
                                    <select id="contract_type" name="contract_type" class="form-select">
                                        <option selected disabled>Select type</option>
                                        <option>Residential</option>
                                        <option>Commercial</option>
                                        <option>Infrastructure</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="project_name" class="form-label fw-bold">Project Name</label>
                                    <input type="text" id="project_name" name="project_name" class="form-control"
                                        placeholder="e.g. Skyline Tower Project">
                                </div>
                                <div class="col-md-4">
                                    <label for="contract_value" class="form-label fw-bold">Contract Value (₨)</label>
                                    <input type="number" id="contract_value" name="contract_value" class="form-control"
                                        placeholder="e.g. 5000000">
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label for="start_date" class="form-label fw-bold">Start Date</label>
                                    <input type="date" id="start_date" name="start_date" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="end_date" class="form-label fw-bold">Estimated Completion</label>
                                    <input type="date" id="end_date" name="end_date" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- File Uploads --}}
                    <div class="card border-info mb-4">
                        <div class="card-header bg-light fw-bold">
                            <i class="fas fa-file-upload"></i> Upload Documents
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="contract_doc" class="form-label fw-bold">Upload Contract Document
                                    (PDF)</label>
                                <input type="file" id="contract_doc" name="contract_doc" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="profile_image" class="form-label fw-bold">Client Photo (optional)</label>
                                <input type="file" id="profile_image" name="profile_image" class="form-control">
                            </div>
                        </div>
                    </div>

                    {{-- Additional Info --}}
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <label for="notes" class="form-label fw-bold">Additional Notes</label>
                            <textarea id="notes" name="notes" class="form-control" rows="3"
                                placeholder="Enter any special requirements or notes..."></textarea>
                        </div>
                    </div>

                    {{-- Submit Button --}}
                    <div class="text-end">
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-save"></i> Save Client
                        </button>
                        <button type="reset" class="btn btn-outline-secondary">
                            <i class="fas fa-undo"></i> Reset Form
                        </button>
                    </div>
                </form>
            </div>
        </div>

        {{-- Quick Help Section --}}
        <div class="card mt-4 border-info">
            <div class="card-header bg-info text-white">
                <i class="fas fa-info-circle"></i> Quick Tips
            </div>
            <div class="card-body">
                <ul class="mb-0">
                    <li>Ensure the email address and phone number are verified before saving.</li>
                    <li>Attach the official signed contract document (PDF only).</li>
                    <li>Each client must be linked with a valid project name and contract type.</li>
                </ul>
            </div>
        </div>
    </div>
@endsection



{{--  first genrate  --}}
{{-- @extends('layouts.app')

@section('title', 'Add New Client')
@section('page_title', 'Create Client')

@section('content')
    <div class="container-fluid px-4">

        <h1 class="h3 mb-4 text-gray-800">Add New Client</h1>

        <div class="card shadow-sm">
            <div class="card-body">
                <form method="POST" action="{{ route('admin.clients.store') }}">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Client Name</label>
                            <input type="text" class="form-control" placeholder="Enter client name">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" placeholder="Enter email address">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Phone</label>
                            <input type="text" class="form-control" placeholder="03XX-XXXXXXX">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Company Name</label>
                            <input type="text" class="form-control" placeholder="Enter company name">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Address</label>
                        <textarea class="form-control" rows="3" placeholder="Enter full address"></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select class="form-select">
                            <option selected>Active</option>
                            <option>Inactive</option>
                            <option>Pending</option>
                        </select>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Save Client</button>
                        <a href="{{ route('admin.clients.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection --}}
