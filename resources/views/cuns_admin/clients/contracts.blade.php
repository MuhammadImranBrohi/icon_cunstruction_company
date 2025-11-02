{{-- 2nd genrated this  --}}
@extends('layouts.app')

@section('title', 'Client Contracts')
@section('page_title', 'Manage Client Contracts')

@section('content')
    <div class="container-fluid">

        {{-- Page Header --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="mb-0"><i class="fas fa-file-contract"></i> Client Contracts Overview</h4>
            <a href="{{ url('/cuns_admin/clients/create') }}" class="btn btn-primary">
                <i class="fas fa-plus-circle"></i> Add New Contract
            </a>
        </div>

        {{-- Filter & Search Section --}}
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-secondary text-white">
                <i class="fas fa-filter"></i> Filter Contracts
            </div>
            <div class="card-body">
                <form action="#" method="GET" class="row g-3">
                    <div class="col-md-3">
                        <label class="form-label fw-bold">Client Name</label>
                        <input type="text" name="client_name" class="form-control" placeholder="Search by name">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-bold">Project Type</label>
                        <select class="form-select">
                            <option selected>All</option>
                            <option>Residential</option>
                            <option>Commercial</option>
                            <option>Infrastructure</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-bold">Status</label>
                        <select class="form-select">
                            <option selected>All</option>
                            <option>Active</option>
                            <option>Completed</option>
                            <option>Pending</option>
                            <option>Terminated</option>
                        </select>
                    </div>
                    <div class="col-md-3 d-flex align-items-end">
                        <button type="submit" class="btn btn-success w-100">
                            <i class="fas fa-search"></i> Apply Filters
                        </button>
                    </div>
                </form>
            </div>
        </div>

        {{-- Stats Cards --}}
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card border-success shadow-sm">
                    <div class="card-body text-center">
                        <i class="fas fa-check-circle text-success fa-2x mb-2"></i>
                        <h5>Active Contracts</h5>
                        <h3>24</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-primary shadow-sm">
                    <div class="card-body text-center">
                        <i class="fas fa-hourglass-half text-primary fa-2x mb-2"></i>
                        <h5>Pending Contracts</h5>
                        <h3>10</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-warning shadow-sm">
                    <div class="card-body text-center">
                        <i class="fas fa-clipboard-check text-warning fa-2x mb-2"></i>
                        <h5>Completed Contracts</h5>
                        <h3>18</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-danger shadow-sm">
                    <div class="card-body text-center">
                        <i class="fas fa-ban text-danger fa-2x mb-2"></i>
                        <h5>Terminated Contracts</h5>
                        <h3>4</h3>
                    </div>
                </div>
            </div>
        </div>

        {{-- Contracts Table --}}
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <span><i class="fas fa-list"></i> Contract Records</span>
                <button class="btn btn-light btn-sm"><i class="fas fa-download"></i> Export CSV</button>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped mb-0 align-middle">
                        <thead class="table-dark text-center">
                            <tr>
                                <th>#</th>
                                <th>Client Name</th>
                                <th>Project Name</th>
                                <th>Contract Value (₨)</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Status</th>
                                <th>Last Updated</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 1; $i <= 6; $i++)
                                <tr class="text-center">
                                    <td>{{ $i }}</td>
                                    <td>Client {{ $i }}</td>
                                    <td>Project {{ $i }}</td>
                                    <td>{{ number_format(rand(2000000, 10000000)) }}</td>
                                    <td>{{ date('Y-m-d', strtotime('-' . rand(10, 90) . ' days')) }}</td>
                                    <td>{{ date('Y-m-d', strtotime('+' . rand(10, 90) . ' days')) }}</td>
                                    <td>
                                        @php
                                            $statuses = ['Active', 'Pending', 'Completed', 'Terminated'];
                                            $status = $statuses[array_rand($statuses)];
                                            $badgeColors = [
                                                'Active' => 'success',
                                                'Pending' => 'warning',
                                                'Completed' => 'primary',
                                                'Terminated' => 'danger',
                                            ];
                                        @endphp
                                        <span class="badge bg-{{ $badgeColors[$status] }}">{{ $status }}</span>
                                    </td>
                                    <td>{{ now()->subDays(rand(1, 20))->format('Y-m-d') }}</td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                            <a href="#" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                            <a href="#" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- Analytics Summary --}}
        <div class="card mt-4 border-info">
            <div class="card-header bg-info text-white">
                <i class="fas fa-chart-line"></i> Contract Summary
            </div>
            <div class="card-body">
                <ul>
                    <li><strong>Total Contracts:</strong> 56</li>
                    <li><strong>Ongoing Projects:</strong> 22</li>
                    <li><strong>Average Project Value:</strong> ₨ 4,250,000</li>
                    <li><strong>Next Contract Expiry:</strong> {{ date('Y-m-d', strtotime('+15 days')) }}</li>
                </ul>
            </div>
        </div>
    </div>
@endsection
