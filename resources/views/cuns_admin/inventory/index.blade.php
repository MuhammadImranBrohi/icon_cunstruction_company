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
                    <div style="height:300px;">
                        <canvas id="stockStatusChart" style="max-height:100%; width:100%;"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card shadow-sm p-3">
                    <h5 class="mb-3"><i class="fas fa-chart-bar me-2"></i>Items by Category</h5>
                    <div style="height:300px;">
                        <canvas id="categoryChart" style="max-height:100%; width:100%;"></canvas>
                    </div>
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
                <table id="inventoryTable" class="table table-bordered align-middle">
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
                        <form id="addInventoryForm" method="POST" action="">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Item Name</label>
                                    <input type="text" name="item_name" class="form-control" required
                                        placeholder="Enter item name">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Supplier</label>
                                    <input type="text" name="supplier" class="form-control" required
                                        placeholder="Enter supplier name">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label class="form-label">Category</label>
                                    <select name="category" class="form-select" required>
                                        <option value="">Select Category</option>
                                        <option value="Building Material">Building Material</option>
                                        <option value="Reinforcement">Reinforcement</option>
                                        <option value="Finishing Material">Finishing Material</option>
                                        <option value="Tools">Tools</option>
                                        <option value="Safety Equipment">Safety Equipment</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Quantity</label>
                                    <input type="number" name="quantity" class="form-control" required min="0"
                                        placeholder="Enter quantity">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Status</label>
                                    <select name="status" class="form-select" required>
                                        <option value="">Select Status</option>
                                        <option value="Available">Available</option>
                                        <option value="Low Stock">Low Stock</option>
                                        <option value="Out of Stock">Out of Stock</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Remarks</label>
                                <textarea name="remarks" class="form-control" rows="3" placeholder="Enter notes or description"></textarea>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Unit Price</label>
                                    <input type="number" name="unit_price" class="form-control" required min="0"
                                        step="0.01" placeholder="Enter unit price">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Reorder Level</label>
                                    <input type="number" name="reorder_level" class="form-control" required
                                        min="0" placeholder="Enter reorder level">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" form="addInventoryForm" class="btn btn-primary">Add Item</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- ======== SCRIPTS ======== --}}
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Initialize DataTable
                if (typeof $ !== 'undefined' && $.fn.dataTable) {
                    $('#inventoryTable').DataTable({
                        responsive: true,
                        dom: 'Bfrtip',
                        buttons: [
                            'copy', 'csv', 'excel', 'pdf', 'print'
                        ],
                        order: [
                            [0, 'asc']
                        ]
                    });

                    // Form submission handler
                    $('#addInventoryForm').on('submit', function() {
                        // Add loading state to submit button
                        $(this).find('[type="submit"]').prop('disabled', true).html(
                            '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Adding...'
                        );
                    });
                }

                // Charts: ensure Chart.js is loaded
                if (typeof Chart === 'undefined') {
                    console.warn('Chart.js not loaded yet');
                    return;
                }

                // Stock Status Pie Chart
                const ctx1 = document.getElementById('stockStatusChart').getContext('2d');
                new Chart(ctx1, {
                    type: 'pie',
                    data: {
                        labels: ['Available', 'Low Stock', 'Out of Stock'],
                        datasets: [{
                            data: [{{ $availableCount ?? 2 }}, {{ $lowStockCount ?? 1 }},
                                {{ $outOfStockCount ?? 0 }}
                            ],
                            backgroundColor: ['#198754', '#ffc107', '#dc3545']
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                position: 'bottom'
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        let label = context.label || '';
                                        let value = context.raw || 0;
                                        let total = context.dataset.data.reduce((a, b) => a + b, 0);
                                        let percentage = Math.round((value * 100) / total);
                                        return `${label}: ${value} (${percentage}%)`;
                                    }
                                }
                            }
                        }
                    }
                });

                // Items by Category Bar Chart
                const ctx2 = document.getElementById('categoryChart').getContext('2d');
                new Chart(ctx2, {
                    type: 'bar',
                    data: {
                        labels: ['Building Material', 'Reinforcement', 'Finishing Material', 'Tools',
                            'Safety Equipment'
                        ],
                        datasets: [{
                            label: 'Number of Items',
                            data: [{{ $buildingMaterialCount ?? 2 }}, {{ $reinforcementCount ?? 1 }},
                                {{ $finishingMaterialCount ?? 1 }}, {{ $toolsCount ?? 0 }},
                                {{ $safetyEquipmentCount ?? 0 }}
                            ],
                            backgroundColor: ['#0d6efd', '#ffc107', '#198754', '#6f42c1', '#fd7e14']
                        }, {
                            label: 'Total Value',
                            data: [{{ $buildingMaterialValue ?? 5000 }},
                                {{ $reinforcementValue ?? 3000 }},
                                {{ $finishingMaterialValue ?? 2000 }}, {{ $toolsValue ?? 1000 }},
                                {{ $safetyEquipmentValue ?? 500 }}
                            ],
                            backgroundColor: ['rgba(13, 110, 253, 0.5)', 'rgba(255, 193, 7, 0.5)',
                                'rgba(25, 135, 84, 0.5)', 'rgba(111, 66, 193, 0.5)',
                                'rgba(253, 126, 20, 0.5)'
                            ],
                            type: 'bar',
                            yAxisID: 'y1'
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            y: {
                                beginAtZero: true,
                                title: {
                                    display: true,
                                    text: 'Number of Items'
                                }
                            },
                            y1: {
                                beginAtZero: true,
                                position: 'right',
                                title: {
                                    display: true,
                                    text: 'Total Value ($)'
                                },
                                grid: {
                                    drawOnChartArea: false
                                }
                            }
                        },
                        plugins: {
                            legend: {
                                position: 'bottom'
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        let label = context.dataset.label || '';
                                        let value = context.raw || 0;
                                        if (context.datasetIndex === 1) {
                                            return `${label}: $${value.toLocaleString()}`;
                                        }
                                        return `${label}: ${value}`;
                                    }
                                }
                            }
                        }
                    }
                });
            });
        </script>
    @endpush
@endsection
