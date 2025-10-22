@extends('layouts.app')

@section('title', 'Create Inventory')
@section('page_title', 'Inventory - Create New Item')

@section('content')
    <div class="container-fluid">

        {{-- ========== PAGE HEADER ========== --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-primary">Add New Inventory Item</h2>
            <button class="btn btn-success" data-bs-toggle="collapse" data-bs-target="#newItemForm">
                <i class="fas fa-plus-circle"></i> Show/Hide Form
            </button>
        </div>

        {{-- ========== SUMMARY CARDS (Inventory Specific) ========== --}}
        <div class="row mb-4">
            <div class="col-md-3 mb-3">
                <div class="card shadow-sm border-start border-primary border-3">
                    <div class="card-body">
                        <h6 class="text-muted">Total Items</h6>
                        <h3 class="fw-bold text-primary">45</h3>
                        <p class="text-secondary mb-0"><i class="fas fa-boxes text-primary"></i> Items in inventory</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card shadow-sm border-start border-success border-3">
                    <div class="card-body">
                        <h6 class="text-muted">In-Stock</h6>
                        <h3 class="fw-bold text-success">30</h3>
                        <p class="text-secondary mb-0"><i class="fas fa-check-circle text-success"></i> Ready for use</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card shadow-sm border-start border-warning border-3">
                    <div class="card-body">
                        <h6 class="text-muted">Low Stock</h6>
                        <h3 class="fw-bold text-warning">10</h3>
                        <p class="text-secondary mb-0"><i class="fas fa-exclamation-triangle text-warning"></i> Need
                            replenishment</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card shadow-sm border-start border-danger border-3">
                    <div class="card-body">
                        <h6 class="text-muted">Out of Stock</h6>
                        <h3 class="fw-bold text-danger">5</h3>
                        <p class="text-secondary mb-0"><i class="fas fa-times-circle text-danger"></i> Reorder immediately
                        </p>
                    </div>
                </div>
            </div>
        </div>

        {{-- ========== INVENTORY CHART ========== --}}
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-primary text-white d-flex justify-content-between">
                <h5 class="mb-0"><i class="fas fa-chart-pie me-2"></i>Stock Status Distribution</h5>
                <select class="form-select w-auto">
                    <option>Current Month</option>
                    <option>Previous Month</option>
                </select>
            </div>
            <div class="card-body">
                <canvas id="stockChart" height="120"></canvas>
            </div>
        </div>

        {{-- ========== NEW INVENTORY ITEM FORM ========== --}}
        <div class="collapse mb-4" id="newItemForm">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="fas fa-plus-circle me-2"></i>Add New Item</h5>
                </div>
                <div class="card-body">
                    <form>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Item Name</label>
                                <input type="text" class="form-control" placeholder="Enter item name">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Category</label>
                                <input type="text" class="form-control" placeholder="Enter category">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label class="form-label">Quantity</label>
                                <input type="number" class="form-control" placeholder="Enter quantity">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Supplier</label>
                                <input type="text" class="form-control" placeholder="Enter supplier name">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Status</label>
                                <select class="form-select">
                                    <option>In-Stock</option>
                                    <option>Low Stock</option>
                                    <option>Out of Stock</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Remarks</label>
                            <textarea class="form-control" rows="3" placeholder="Additional notes"></textarea>
                        </div>
                        <button class="btn btn-primary">Add Item</button>
                    </form>
                </div>
            </div>
        </div>

        {{-- ========== INVENTORY TABLE ========== --}}
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-light">
                <h5 class="fw-bold mb-0"><i class="fas fa-list me-2"></i>All Inventory Items</h5>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Item Name</th>
                            <th>Category</th>
                            <th>Quantity</th>
                            <th>Supplier</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>001</td>
                            <td>Cement Bags</td>
                            <td>Construction Material</td>
                            <td>20</td>
                            <td>ABC Suppliers</td>
                            <td><span class="badge bg-success">In-Stock</span></td>
                            <td>
                                <button class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></button>
                                <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>002</td>
                            <td>Steel Rods</td>
                            <td>Construction Material</td>
                            <td>10</td>
                            <td>XYZ Traders</td>
                            <td><span class="badge bg-warning text-dark">Low Stock</span></td>
                            <td>
                                <button class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></button>
                                <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>003</td>
                            <td>Paint Cans</td>
                            <td>Finishing</td>
                            <td>0</td>
                            <td>Paint World</td>
                            <td><span class="badge bg-danger">Out of Stock</span></td>
                            <td>
                                <button class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></button>
                                <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    {{-- ======== CHART SCRIPT ======== --}}
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const ctx = document.getElementById('stockChart').getContext('2d');
            new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ['In-Stock', 'Low Stock', 'Out of Stock'],
                    datasets: [{
                        data: [30, 10, 5],
                        backgroundColor: ['#198754', '#ffc107', '#dc3545']
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'right'
                        }
                    }
                }
            });
        </script>
    @endpush
@endsection
