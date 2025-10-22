@extends('layouts.app')

@section('title', 'Inventory Suppliers')
@section('page_title', 'Inventory - Suppliers')

@section('content')
    <div class="container-fluid">

        {{-- ========== PAGE HEADER ========== --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-primary">Inventory Suppliers</h2>
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addSupplierModal">
                <i class="fas fa-plus-circle"></i> Add New Supplier
            </button>
        </div>

        {{-- ========== SUMMARY CARDS (Suppliers Specific) ========== --}}
        <div class="row mb-4">
            <div class="col-md-3 mb-3">
                <div class="card shadow-sm border-start border-primary border-3">
                    <div class="card-body">
                        <h6 class="text-muted">Total Suppliers</h6>
                        <h3 class="fw-bold text-primary">12</h3>
                        <p class="text-secondary mb-0"><i class="fas fa-truck text-primary"></i> Registered suppliers</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card shadow-sm border-start border-success border-3">
                    <div class="card-body">
                        <h6 class="text-muted">Active Suppliers</h6>
                        <h3 class="fw-bold text-success">9</h3>
                        <p class="text-secondary mb-0"><i class="fas fa-check-circle text-success"></i> Currently supplying
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card shadow-sm border-start border-danger border-3">
                    <div class="card-body">
                        <h6 class="text-muted">Inactive Suppliers</h6>
                        <h3 class="fw-bold text-danger">3</h3>
                        <p class="text-secondary mb-0"><i class="fas fa-times-circle text-danger"></i> Not supplying</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card shadow-sm border-start border-info border-3">
                    <div class="card-body">
                        <h6 class="text-muted">Top Supplier</h6>
                        <h3 class="fw-bold text-info">XYZ Traders</h3>
                        <p class="text-secondary mb-0"><i class="fas fa-star text-info"></i> Most orders fulfilled</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- ========== SUPPLIERS CHART ========== --}}
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-primary text-white d-flex justify-content-between">
                <h5 class="mb-0"><i class="fas fa-chart-bar me-2"></i>Supplier Order Contribution</h5>
                <select class="form-select w-auto">
                    <option>Current Month</option>
                    <option>Previous Month</option>
                </select>
            </div>
            <div class="card-body">
                <canvas id="suppliersChart" height="120"></canvas>
            </div>
        </div>

        {{-- ========== SUPPLIERS TABLE ========== --}}
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-light d-flex justify-content-between align-items-center">
                <h5 class="fw-bold mb-0"><i class="fas fa-users me-2"></i>All Suppliers</h5>
                <div class="d-flex gap-2">
                    <input type="text" class="form-control" placeholder="Search by name or contact...">
                    <select class="form-select">
                        <option>All Status</option>
                        <option>Active</option>
                        <option>Inactive</option>
                    </select>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Supplier Name</th>
                            <th>Contact Person</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Total Orders</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>001</td>
                            <td>ABC Suppliers</td>
                            <td>Ali Khan</td>
                            <td>+92 300 1234567</td>
                            <td>abc@suppliers.com</td>
                            <td><span class="badge bg-success">Active</span></td>
                            <td>18</td>
                            <td>
                                <button class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></button>
                                <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>002</td>
                            <td>XYZ Traders</td>
                            <td>Fatima Siddiqui</td>
                            <td>+92 300 7654321</td>
                            <td>xyz@traders.com</td>
                            <td><span class="badge bg-success">Active</span></td>
                            <td>25</td>
                            <td>
                                <button class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></button>
                                <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>003</td>
                            <td>Paint World</td>
                            <td>Zahid Ali</td>
                            <td>+92 300 9876543</td>
                            <td>paint@world.com</td>
                            <td><span class="badge bg-danger">Inactive</span></td>
                            <td>5</td>
                            <td>
                                <button class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></button>
                                <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        {{-- ========== ADD SUPPLIER MODAL ========== --}}
        <div class="modal fade" id="addSupplierModal" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title">Add New Supplier</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Supplier Name</label>
                                    <input type="text" class="form-control" placeholder="Enter supplier name">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Contact Person</label>
                                    <input type="text" class="form-control" placeholder="Enter contact person">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label class="form-label">Phone</label>
                                    <input type="text" class="form-control" placeholder="Enter phone number">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" placeholder="Enter email">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Status</label>
                                    <select class="form-select">
                                        <option>Active</option>
                                        <option>Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Remarks</label>
                                <textarea class="form-control" rows="3" placeholder="Additional notes"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary">Add Supplier</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- ======== CHART SCRIPT ======== --}}
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const ctx = document.getElementById('suppliersChart').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['ABC Suppliers', 'XYZ Traders', 'Paint World'],
                    datasets: [{
                        label: 'Orders Fulfilled',
                        data: [18, 25, 5],
                        backgroundColor: ['#0d6efd', '#198754', '#dc3545']
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true
                        },
                        x: {
                            ticks: {
                                autoSkip: false
                            }
                        }
                    }
                }
            });
        </script>
    @endpush
@endsection
