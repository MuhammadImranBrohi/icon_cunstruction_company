@extends('layouts.app')

@section('title', 'Payments Management')
@section('page_title', 'Finance - Payments')

@section('content')
    <div class="container-fluid">

        {{-- ========== PAGE HEADER ========== --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-primary">Payments Overview</h2>
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addPaymentModal">
                <i class="fas fa-plus-circle"></i> Record New Payment
            </button>
        </div>

        {{-- ========== SUMMARY CARDS ========== --}}
        <div class="row">
            <div class="col-md-3 mb-3">
                <div class="card shadow-sm border-start border-success border-3">
                    <div class="card-body">
                        <h6 class="text-muted">Total Payments Received</h6>
                        <h3 class="fw-bold text-success">$124,800</h3>
                        <p class="text-secondary mb-0"><i class="fas fa-arrow-up text-success"></i> +8% this month</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card shadow-sm border-start border-warning border-3">
                    <div class="card-body">
                        <h6 class="text-muted">Pending Payments</h6>
                        <h3 class="fw-bold text-warning">$15,200</h3>
                        <p class="text-secondary mb-0"><i class="fas fa-clock text-warning"></i> Awaiting confirmation</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card shadow-sm border-start border-danger border-3">
                    <div class="card-body">
                        <h6 class="text-muted">Failed Transactions</h6>
                        <h3 class="fw-bold text-danger">$2,350</h3>
                        <p class="text-secondary mb-0"><i class="fas fa-times-circle text-danger"></i> Needs review</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card shadow-sm border-start border-info border-3">
                    <div class="card-body">
                        <h6 class="text-muted">Refunded</h6>
                        <h3 class="fw-bold text-info">$1,020</h3>
                        <p class="text-secondary mb-0"><i class="fas fa-sync text-info"></i> Processed refunds</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- ========== PAYMENTS CHART ========== --}}
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-primary text-white d-flex justify-content-between">
                <h5 class="mb-0"><i class="fas fa-chart-line me-2"></i>Monthly Payment Trends</h5>
                <select class="form-select w-auto">
                    <option>Current Year</option>
                    <option>Previous Year</option>
                </select>
            </div>
            <div class="card-body">
                <canvas id="paymentsChart" height="110"></canvas>
            </div>
        </div>

        {{-- ========== PAYMENTS TABLE ========== --}}
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-light">
                <h5 class="fw-bold mb-0"><i class="fas fa-list me-2"></i>All Payments</h5>
            </div>
            <div class="card-body">
                <div class="d-flex mb-3 justify-content-between">
                    <input type="text" class="form-control w-25" placeholder="Search by client or project...">
                    <select class="form-select w-25">
                        <option>All Payment Modes</option>
                        <option>Cash</option>
                        <option>Bank Transfer</option>
                        <option>Online Gateway</option>
                    </select>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Client</th>
                                <th>Project</th>
                                <th>Mode</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>001</td>
                                <td>Ali Khan</td>
                                <td>Road Extension Phase 3</td>
                                <td>Bank Transfer</td>
                                <td>$12,500</td>
                                <td><span class="badge bg-success">Paid</span></td>
                                <td>Oct 10, 2025</td>
                                <td>
                                    <button class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></button>
                                    <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>002</td>
                                <td>Fatima Builders</td>
                                <td>Commercial Complex</td>
                                <td>Cash</td>
                                <td>$8,300</td>
                                <td><span class="badge bg-warning text-dark">Pending</span></td>
                                <td>Oct 15, 2025</td>
                                <td>
                                    <button class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></button>
                                    <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>003</td>
                                <td>Zahid Construction</td>
                                <td>Bridge Maintenance</td>
                                <td>Online</td>
                                <td>$5,200</td>
                                <td><span class="badge bg-danger">Failed</span></td>
                                <td>Oct 17, 2025</td>
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

        {{-- ========== ADD PAYMENT MODAL ========== --}}
        <div class="modal fade" id="addPaymentModal" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title">Record New Payment</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Client Name</label>
                                    <input type="text" class="form-control" placeholder="Enter client name">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Project</label>
                                    <input type="text" class="form-control" placeholder="Enter project name">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label class="form-label">Payment Mode</label>
                                    <select class="form-select">
                                        <option>Cash</option>
                                        <option>Bank Transfer</option>
                                        <option>Online Gateway</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Amount</label>
                                    <input type="number" class="form-control" placeholder="$0.00">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Status</label>
                                    <select class="form-select">
                                        <option>Paid</option>
                                        <option>Pending</option>
                                        <option>Failed</option>
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
                        <button class="btn btn-primary">Save Payment</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- ======== CHART SCRIPT ======== --}}
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const ctx = document.getElementById('paymentsChart').getContext('2d');
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
                    datasets: [{
                            label: 'Payments Received',
                            data: [12000, 15000, 14000, 16000, 17500, 19000, 20000, 18500, 21000, 22000],
                            borderColor: 'rgba(40, 167, 69, 0.9)',
                            fill: false,
                            tension: 0.3
                        },
                        {
                            label: 'Payments Pending',
                            data: [3000, 2500, 2800, 2700, 2600, 2900, 3100, 3300, 3500, 3700],
                            borderColor: 'rgba(255, 193, 7, 0.9)',
                            fill: false,
                            tension: 0.3
                        }
                    ]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top'
                        },
                        tooltip: {
                            mode: 'index',
                            intersect: false
                        }
                    },
                    interaction: {
                        mode: 'nearest',
                        intersect: false
                    },
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
