@extends('layouts.app')

@section('title', 'Inventory Alerts')
@section('page_title', 'Inventory - Alerts')

@section('content')
    <div class="container-fluid">

        {{-- ========== PAGE HEADER ========== --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-primary">Inventory Alerts</h2>
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#resolveAlertModal">
                <i class="fas fa-check-circle"></i> Resolve Alert
            </button>
        </div>

        {{-- ========== SUMMARY CARDS (Alerts Specific) ========== --}}
        <div class="row mb-4">
            <div class="col-md-3 mb-3">
                <div class="card shadow-sm border-start border-primary border-3">
                    <div class="card-body">
                        <h6 class="text-muted">Total Alerts</h6>
                        <h3 class="fw-bold text-primary">15</h3>
                        <p class="text-secondary mb-0"><i class="fas fa-exclamation-circle text-primary"></i> Active alerts
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card shadow-sm border-start border-danger border-3">
                    <div class="card-body">
                        <h6 class="text-muted">Critical Items</h6>
                        <h3 class="fw-bold text-danger">5</h3>
                        <p class="text-secondary mb-0"><i class="fas fa-bolt text-danger"></i> Immediate attention</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card shadow-sm border-start border-warning border-3">
                    <div class="card-body">
                        <h6 class="text-muted">Low Stock</h6>
                        <h3 class="fw-bold text-warning">7</h3>
                        <p class="text-secondary mb-0"><i class="fas fa-box-open text-warning"></i> Stock below minimum</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card shadow-sm border-start border-info border-3">
                    <div class="card-body">
                        <h6 class="text-muted">Reorder Needed</h6>
                        <h3 class="fw-bold text-info">3</h3>
                        <p class="text-secondary mb-0"><i class="fas fa-truck-loading text-info"></i> Ready for
                            replenishment</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- ========== ALERTS CHART ========== --}}
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-primary text-white d-flex justify-content-between">
                <h5 class="mb-0"><i class="fas fa-chart-pie me-2"></i>Alerts Distribution</h5>
                <select class="form-select w-auto">
                    <option>Current Month</option>
                    <option>Previous Month</option>
                </select>
            </div>
            <div class="card-body">
                <canvas id="alertsChart" height="120"></canvas>
            </div>
        </div>

        {{-- ========== ALERTS TABLE ========== --}}
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-light d-flex justify-content-between align-items-center">
                <h5 class="fw-bold mb-0"><i class="fas fa-exclamation-triangle me-2"></i>Active Alerts</h5>
                <div class="d-flex gap-2">
                    <input type="text" class="form-control" placeholder="Search by item or status...">
                    <select class="form-select">
                        <option>All Severity</option>
                        <option>Critical</option>
                        <option>Low Stock</option>
                        <option>Reorder</option>
                    </select>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Item Name</th>
                            <th>Current Stock</th>
                            <th>Minimum Stock</th>
                            <th>Status</th>
                            <th>Alert Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>001</td>
                            <td>Cement Bags</td>
                            <td>8</td>
                            <td>20</td>
                            <td><span class="badge bg-danger">Critical</span></td>
                            <td>Oct 20, 2025</td>
                            <td>
                                <button class="btn btn-sm btn-success"><i class="fas fa-check"></i></button>
                                <button class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>002</td>
                            <td>Steel Rods</td>
                            <td>12</td>
                            <td>15</td>
                            <td><span class="badge bg-warning text-dark">Low Stock</span></td>
                            <td>Oct 18, 2025</td>
                            <td>
                                <button class="btn btn-sm btn-success"><i class="fas fa-check"></i></button>
                                <button class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>003</td>
                            <td>Paint Cans</td>
                            <td>5</td>
                            <td>10</td>
                            <td><span class="badge bg-info text-dark">Reorder</span></td>
                            <td>Oct 22, 2025</td>
                            <td>
                                <button class="btn btn-sm btn-success"><i class="fas fa-check"></i></button>
                                <button class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        {{-- ========== RESOLVE ALERT MODAL ========== --}}
        <div class="modal fade" id="resolveAlertModal" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title">Resolve Inventory Alert</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label class="form-label">Select Item</label>
                                <select class="form-select">
                                    <option>Cement Bags</option>
                                    <option>Steel Rods</option>
                                    <option>Paint Cans</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Remarks</label>
                                <textarea class="form-control" rows="3" placeholder="Enter resolution notes"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary">Resolve Alert</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- ======== CHART SCRIPT ======== --}}
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const ctx = document.getElementById('alertsChart').getContext('2d');
            new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ['Critical', 'Low Stock', 'Reorder'],
                    datasets: [{
                        data: [5, 7, 3],
                        backgroundColor: ['#dc3545', '#ffc107', '#0dcaf0']
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
