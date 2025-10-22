@extends('layouts.app')

@section('title', 'Inventory Management')
@section('page_title', 'Inventory Dashboard')

@section('content')
    <div class="container-fluid">

        {{-- ========== PAGE HEADER ========== --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-primary">Inventory Overview</h2>
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addInventoryModal">
                <i class="fas fa-plus-circle"></i> Add New Item
            </button>
        </div>

        {{-- ========== SUMMARY CARDS ========== --}}
        <div class="row">
            <div class="col-md-3 mb-3">
                <div class="card shadow-sm border-start border-primary border-3">
                    <div class="card-body">
                        <h6 class="text-muted">Total Inventory Items</h6>
                        <h3 class="fw-bold text-primary">50</h3>
                        <p class="text-secondary mb-0"><i class="fas fa-boxes text-primary"></i> All items in stock</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card shadow-sm border-start border-danger border-3">
                    <div class="card-body">
                        <h6 class="text-muted">Low Stock Items</h6>
                        <h3 class="fw-bold text-danger">8</h3>
                        <p class="text-secondary mb-0"><i class="fas fa-exclamation-triangle text-danger"></i> Need reorder
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card shadow-sm border-start border-success border-3">
                    <div class="card-body">
                        <h6 class="text-muted">Suppliers</h6>
                        <h3 class="fw-bold text-success">12</h3>
                        <p class="text-secondary mb-0"><i class="fas fa-truck text-success"></i> Connected suppliers</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card shadow-sm border-start border-warning border-3">
                    <div class="card-body">
                        <h6 class="text-muted">Categories</h6>
                        <h3 class="fw-bold text-warning">5</h3>
                        <p class="text-secondary mb-0"><i class="fas fa-tags text-warning"></i> Item categories</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- ========== INVENTORY CHARTS ========== --}}
        <div class="row mb-4">
            <div class="col-md-6">
                <div class="card shadow-sm p-3">
                    <h5 class="mb-3"><i class="fas fa-chart-pie me-2"></i>Stock Status</h5>
                    <canvas id="stockStatusChart" height="120"></canvas>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card shadow-sm p-3">
                    <h5 class="mb-3"><i class="fas fa-chart-bar me-2"></i>Items by Category</h5>
                    <canvas id="categoryChart" height="120"></canvas>
                </div>
            </div>
        </div>

        {{-- ========== INVENTORY TABLE ========== --}}
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-light d-flex justify-content-between align-items-center">
                <h5 class="fw-bold mb-0"><i class="fas fa-list me-2"></i>All Inventory Items</h5>
                <div class="d-flex gap-2">
                    <input type="text" class="form-control" placeholder="Search by item or supplier...">
                    <select class="form-select">
                        <option>All Categories</option>
                        <option>Building Material</option>
                        <option>Reinforcement</option>
                        <option>Finishing Material</option>
                    </select>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Item Name</th>
                            <th>Quantity</th>
                            <th>Supplier</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>001</td>
                            <td>Cement Bags</td>
                            <td>50</td>
                            <td>ABC Suppliers</td>
                            <td>Building Material</td>
                            <td><span class="badge bg-success">Available</span></td>
                            <td>
                                <button class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></button>
                                <button class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>002</td>
                            <td>Steel Rods</td>
                            <td>3</td>
                            <td>XYZ Traders</td>
                            <td>Reinforcement</td>
                            <td><span class="badge bg-danger">Low Stock</span></td>
                            <td>
                                <button class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></button>
                                <button class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>003</td>
                            <td>Paint Cans</td>
                            <td>25</td>
                            <td>Paint World</td>
                            <td>Finishing Material</td>
                            <td><span class="badge bg-success">Available</span></td>
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

        {{-- ========== ADD INVENTORY MODAL ========== --}}
        <div class="modal fade" id="addInventoryModal" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title">Add New Inventory Item</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Item Name</label>
                                    <input type="text" class="form-control" placeholder="Enter item name">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Supplier</label>
                                    <input type="text" class="form-control" placeholder="Enter supplier name">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label class="form-label">Category</label>
                                    <select class="form-select">
                                        <option>Building Material</option>
                                        <option>Reinforcement</option>
                                        <option>Finishing Material</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Quantity</label>
                                    <input type="number" class="form-control" placeholder="Enter quantity">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Status</label>
                                    <select class="form-select">
                                        <option>Available</option>
                                        <option>Low Stock</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Remarks</label>
                                <textarea class="form-control" rows="3" placeholder="Enter notes or description"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary">Add Item</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- ======== CHART SCRIPT ======== --}}
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            // Stock Status Pie Chart
            const ctx1 = document.getElementById('stockStatusChart').getContext('2d');
            new Chart(ctx1, {
                type: 'pie',
                data: {
                    labels: ['Available', 'Low Stock'],
                    datasets: [{
                        data: [2, 1], // Static counts
                        backgroundColor: ['#198754', '#dc3545']
                    }]
                },
                options: {
                    responsive: true
                }
            });

            // Items by Category Bar Chart
            const ctx2 = document.getElementById('categoryChart').getContext('2d');
            new Chart(ctx2, {
                type: 'bar',
                data: {
                    labels: ['Building Material', 'Reinforcement', 'Finishing Material'],
                    datasets: [{
                        label: 'Number of Items',
                        data: [2, 1, 1],
                        backgroundColor: ['#0d6efd', '#ffc107', '#198754']
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
    @endpush
@endsection
