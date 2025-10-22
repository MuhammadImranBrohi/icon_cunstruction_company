@extends('layouts.app')

@section('title', 'Inventory Orders')
@section('page_title', 'Inventory - Orders')

@section('content')
    <div class="container-fluid">

        {{-- ========== PAGE HEADER ========== --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-primary">Inventory Orders</h2>
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addOrderModal">
                <i class="fas fa-plus-circle"></i> Create New Order
            </button>
        </div>

        {{-- ========== SUMMARY CARDS (Orders-Specific) ========== --}}
        <div class="row mb-4">
            <div class="col-md-3 mb-3">
                <div class="card shadow-sm border-start border-primary border-3">
                    <div class="card-body">
                        <h6 class="text-muted">Total Orders</h6>
                        <h3 class="fw-bold text-primary">25</h3>
                        <p class="text-secondary mb-0"><i class="fas fa-boxes text-primary"></i> Orders created</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card shadow-sm border-start border-warning border-3">
                    <div class="card-body">
                        <h6 class="text-muted">Pending Orders</h6>
                        <h3 class="fw-bold text-warning">6</h3>
                        <p class="text-secondary mb-0"><i class="fas fa-clock text-warning"></i> Awaiting delivery</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card shadow-sm border-start border-success border-3">
                    <div class="card-body">
                        <h6 class="text-muted">Completed Orders</h6>
                        <h3 class="fw-bold text-success">17</h3>
                        <p class="text-secondary mb-0"><i class="fas fa-check-circle text-success"></i> Successfully
                            delivered</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card shadow-sm border-start border-danger border-3">
                    <div class="card-body">
                        <h6 class="text-muted">Cancelled Orders</h6>
                        <h3 class="fw-bold text-danger">2</h3>
                        <p class="text-secondary mb-0"><i class="fas fa-times-circle text-danger"></i> Cancelled orders</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- ========== ORDERS CHART (Related Data) ========== --}}
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-primary text-white d-flex justify-content-between">
                <h5 class="mb-0"><i class="fas fa-chart-pie me-2"></i>Order Status Distribution</h5>
                <select class="form-select w-auto">
                    <option>Current Month</option>
                    <option>Previous Month</option>
                </select>
            </div>
            <div class="card-body">
                <canvas id="ordersStatusChart" height="120"></canvas>
            </div>
        </div>

        {{-- ========== ORDERS TABLE ========== --}}
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-light d-flex justify-content-between align-items-center">
                <h5 class="fw-bold mb-0"><i class="fas fa-list me-2"></i>All Orders</h5>
                <div class="d-flex gap-2">
                    <input type="text" class="form-control" placeholder="Search by item or supplier...">
                    <select class="form-select">
                        <option>All Status</option>
                        <option>Pending</option>
                        <option>Completed</option>
                        <option>Cancelled</option>
                    </select>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Order ID</th>
                            <th>Item Name</th>
                            <th>Quantity</th>
                            <th>Supplier</th>
                            <th>Status</th>
                            <th>Expected Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>001</td>
                            <td>ORD001</td>
                            <td>Cement Bags</td>
                            <td>20</td>
                            <td>ABC Suppliers</td>
                            <td><span class="badge bg-warning text-dark">Pending</span></td>
                            <td>Oct 28, 2025</td>
                            <td>
                                <button class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></button>
                                <button class="btn btn-sm btn-success"><i class="fas fa-check"></i></button>
                                <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>002</td>
                            <td>ORD002</td>
                            <td>Steel Rods</td>
                            <td>10</td>
                            <td>XYZ Traders</td>
                            <td><span class="badge bg-success">Completed</span></td>
                            <td>Oct 25, 2025</td>
                            <td>
                                <button class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></button>
                                <button class="btn btn-sm btn-success" disabled><i class="fas fa-check"></i></button>
                                <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>003</td>
                            <td>ORD003</td>
                            <td>Paint Cans</td>
                            <td>15</td>
                            <td>Paint World</td>
                            <td><span class="badge bg-danger">Cancelled</span></td>
                            <td>Oct 20, 2025</td>
                            <td>
                                <button class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></button>
                                <button class="btn btn-sm btn-success" disabled><i class="fas fa-check"></i></button>
                                <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        {{-- ========== ADD ORDER MODAL ========== --}}
        <div class="modal fade" id="addOrderModal" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title">Create New Inventory Order</h5>
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
                                    <label class="form-label">Quantity</label>
                                    <input type="number" class="form-control" placeholder="Enter quantity">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Status</label>
                                    <select class="form-select">
                                        <option>Pending</option>
                                        <option>Completed</option>
                                        <option>Cancelled</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Expected Date</label>
                                    <input type="date" class="form-control">
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
                        <button class="btn btn-primary">Create Order</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- ======== CHART SCRIPT ======== --}}
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const ctx = document.getElementById('ordersStatusChart').getContext('2d');
            new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['Pending', 'Completed', 'Cancelled'],
                    datasets: [{
                        data: [6, 17, 2], // Related data only
                        backgroundColor: ['#ffc107', '#198754', '#dc3545']
                    }]
                },
                options: {
                    responsive: true
                }
            });
        </script>
    @endpush
@endsection
