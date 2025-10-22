@extends('layouts.app')

@section('title', 'Clients')
@section('page_title', 'Client Management')

@section('content')
    <div class="container-fluid px-4">

        {{-- Page header --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h3 mb-0 text-gray-800">Clients</h1>
                <small class="text-muted">Manage clients, contracts, payments and feedback</small>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ url('/cuns_admin/clients/create') }}" class="btn btn-primary">
                    <i class="fas fa-user-plus me-1"></i> Add New Client
                </a>
                <div class="dropdown">
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="bulkActions"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Bulk Actions
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="bulkActions">
                        <li><a class="dropdown-item" href="#">Export Selected (CSV)</a></li>
                        <li><a class="dropdown-item" href="#">Export Selected (Excel)</a></li>
                        <li><a class="dropdown-item text-danger" href="#">Delete Selected</a></li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- KPI Cards --}}
        <div class="row gy-3 mb-4">
            <div class="col-xl-3 col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="me-3">
                                <i class="fas fa-users fa-2x text-primary"></i>
                            </div>
                            <div>
                                <small class="text-uppercase text-muted">Total Clients</small>
                                <div class="h4 mb-0">128</div>
                                <small class="text-muted">+8 this month</small>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent border-0 small text-muted">
                        Active: 102 • Inactive: 18 • Pending: 8
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="me-3">
                                <i class="fas fa-file-contract fa-2x text-success"></i>
                            </div>
                            <div>
                                <small class="text-uppercase text-muted">Active Contracts</small>
                                <div class="h4 mb-0">54</div>
                                <small class="text-muted">Worth PKR 456M</small>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent border-0 small text-muted">
                        Avg contract: PKR 8.4M
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="me-3">
                                <i class="fas fa-money-bill-wave fa-2x text-warning"></i>
                            </div>
                            <div>
                                <small class="text-uppercase text-muted">Outstanding Invoices</small>
                                <div class="h4 mb-0">23</div>
                                <small class="text-muted">PKR 12,450,000</small>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent border-0 small text-muted">
                        Overdue >30 days: PKR 3,200,000
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="me-3">
                                <i class="fas fa-star fa-2x text-danger"></i>
                            </div>
                            <div>
                                <small class="text-uppercase text-muted">Avg Client Rating</small>
                                <div class="h4 mb-0">4.6 / 5</div>
                                <small class="text-muted">From 124 feedbacks</small>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent border-0 small text-muted">
                        Positive feedback: 79%
                    </div>
                </div>
            </div>
        </div>

        {{-- Filters & controls --}}
        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                <form id="clientFilterForm" class="row g-3 align-items-end">
                    <div class="col-lg-4">
                        <label class="form-label small">Search</label>
                        <input type="text" name="q" class="form-control"
                            placeholder="Search by client name, email, phone or project">
                    </div>

                    <div class="col-lg-2">
                        <label class="form-label small">Status</label>
                        <select name="status" class="form-select">
                            <option value="">All Statuses</option>
                            <option value="active">Active</option>
                            <option value="pending">Pending</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>

                    <div class="col-lg-2">
                        <label class="form-label small">Min Contract Value (PKR)</label>
                        <input type="number" name="min_value" class="form-control" placeholder="0">
                    </div>

                    <div class="col-lg-2">
                        <label class="form-label small">Sort By</label>
                        <select name="sort" class="form-select">
                            <option value="recent">Recently Added</option>
                            <option value="value_desc">Value (High → Low)</option>
                            <option value="value_asc">Value (Low → High)</option>
                        </select>
                    </div>

                    <div class="col-lg-2 text-end">
                        <button type="submit" class="btn btn-primary me-2"><i class="fas fa-filter me-1"></i>
                            Apply</button>
                        <button type="button" class="btn btn-outline-secondary" id="resetFilters"><i
                                class="fas fa-undo me-1"></i> Reset</button>
                    </div>
                </form>
            </div>
        </div>

        {{-- Main content row: table + side panels --}}
        <div class="row g-4">
            {{-- Clients table --}}
            <div class="col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-header d-flex justify-content-between align-items-center bg-white">
                        <h6 class="m-0 fw-bold">Client Records</h6>
                        <div class="d-flex gap-2">
                            <button class="btn btn-sm btn-outline-secondary" id="exportCsv"><i
                                    class="fas fa-file-csv me-1"></i> CSV</button>
                            <button class="btn btn-sm btn-outline-secondary" id="exportExcel"><i
                                    class="fas fa-file-excel me-1"></i> Excel</button>
                        </div>
                    </div>

                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th style="width:40px;"><input type="checkbox" id="checkAll"></th>
                                        <th style="width:60px;">#</th>
                                        <th>Client</th>
                                        <th>Primary Contact</th>
                                        <th>Projects</th>
                                        <th>Active Contracts</th>
                                        <th>Outstanding (PKR)</th>
                                        <th>Status</th>
                                        <th style="width:150px;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- Dummy rows --}}
                                    <tr>
                                        <td><input type="checkbox" class="row-check"></td>
                                        <td>1</td>
                                        <td>
                                            <strong>Ali Construction Ltd.</strong>
                                            <div class="small text-muted">Reg: ALI-2021 • Sector: Infrastructure</div>
                                        </td>
                                        <td>
                                            <div>Mr. Ali Raza</div>
                                            <div class="small text-muted">ali@alicorp.com • 0300-1234567</div>
                                        </td>
                                        <td>5</td>
                                        <td>2</td>
                                        <td>2,450,000</td>
                                        <td><span class="badge bg-success">Active</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-info viewClientBtn" data-bs-toggle="modal"
                                                data-bs-target="#viewClientModal" data-id="1">View</button>
                                            <button class="btn btn-sm btn-warning editClientBtn" data-bs-toggle="modal"
                                                data-bs-target="#editClientModal" data-id="1">Edit</button>
                                            <button class="btn btn-sm btn-danger deleteClientBtn" data-bs-toggle="modal"
                                                data-bs-target="#deleteConfirmModal" data-id="1">Delete</button>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><input type="checkbox" class="row-check"></td>
                                        <td>2</td>
                                        <td>
                                            <strong>BuildWell Pvt. Ltd.</strong>
                                            <div class="small text-muted">Reg: BW-088 • Sector: Residential</div>
                                        </td>
                                        <td>
                                            <div>Ms. Hina Ahmed</div>
                                            <div class="small text-muted">hina@buildwell.pk • 0321-9876543</div>
                                        </td>
                                        <td>3</td>
                                        <td>1</td>
                                        <td>520,000</td>
                                        <td><span class="badge bg-warning text-dark">Pending</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-info viewClientBtn" data-bs-toggle="modal"
                                                data-bs-target="#viewClientModal" data-id="2">View</button>
                                            <button class="btn btn-sm btn-warning editClientBtn" data-bs-toggle="modal"
                                                data-bs-target="#editClientModal" data-id="2">Edit</button>
                                            <button class="btn btn-sm btn-danger deleteClientBtn" data-bs-toggle="modal"
                                                data-bs-target="#deleteConfirmModal" data-id="2">Delete</button>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><input type="checkbox" class="row-check"></td>
                                        <td>3</td>
                                        <td>
                                            <strong>GreenField Developers</strong>
                                            <div class="small text-muted">Reg: GF-332 • Sector: Commercial</div>
                                        </td>
                                        <td>
                                            <div>Mr. Umar Siddiqui</div>
                                            <div class="small text-muted">umar@greenfield.com • 0345-7778899</div>
                                        </td>
                                        <td>2</td>
                                        <td>2</td>
                                        <td>0</td>
                                        <td><span class="badge bg-secondary">Inactive</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-info viewClientBtn" data-bs-toggle="modal"
                                                data-bs-target="#viewClientModal" data-id="3">View</button>
                                            <button class="btn btn-sm btn-warning editClientBtn" data-bs-toggle="modal"
                                                data-bs-target="#editClientModal" data-id="3">Edit</button>
                                            <button class="btn btn-sm btn-danger deleteClientBtn" data-bs-toggle="modal"
                                                data-bs-target="#deleteConfirmModal" data-id="3">Delete</button>
                                        </td>
                                    </tr>

                                    {{-- ... more dummy rows ... --}}
                                </tbody>
                            </table>
                        </div>

                        {{-- Table footer: pagination & showing info --}}
                        <div class="d-flex justify-content-between align-items-center p-3 border-top">
                            <div class="small text-muted">Showing 1 to 10 of 128 clients</div>
                            <nav>
                                <ul class="pagination pagination-sm mb-0">
                                    <li class="page-item disabled"><a class="page-link" href="#">«</a></li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">»</a></li>
                                </ul>
                            </nav>
                        </div>

                    </div>
                </div>
            </div>

            {{-- Right column: Activity feed + Recent contracts + Charts --}}
            <div class="col-lg-4">
                {{-- Recent Contracts --}}
                <div class="card shadow-sm mb-3">
                    <div class="card-header bg-white d-flex justify-content-between align-items-center">
                        <h6 class="m-0">Recent Contracts</h6>
                        <a href="{{ url('/cuns_admin/clients/contracts') }}" class="small">View all</a>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <strong>Road Construction Phase 1</strong>
                                        <div class="small text-muted">Ali Construction Ltd. • PKR 12,000,000</div>
                                    </div>
                                    <div class="text-end">
                                        <span class="badge bg-success">Active</span>
                                        <div class="small text-muted">Ends: 2025-08-30</div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <strong>Bridge Reinforcement</strong>
                                        <div class="small text-muted">BuildWell • PKR 8,500,000</div>
                                    </div>
                                    <div class="text-end">
                                        <span class="badge bg-warning text-dark">Pending</span>
                                        <div class="small text-muted">Start: 2024-11-15</div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="small text-muted">View latest 5 contracts for quick reference</div>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- Client Distribution Chart --}}
                <div class="card shadow-sm mb-3">
                    <div class="card-header bg-white">
                        <h6 class="m-0">Client Distribution</h6>
                    </div>
                    <div class="card-body">
                        <canvas id="clientDistributionChart" height="220"></canvas>
                        <div class="small text-muted mt-2">Projects per sector: Infrastructure, Residential, Commercial,
                            Industrial</div>
                    </div>
                </div>

                {{-- Activity Feed --}}
                <div class="card shadow-sm">
                    <div class="card-header bg-white">
                        <h6 class="m-0">Recent Client Activity</h6>
                    </div>
                    <div class="card-body">
                        <div class="timeline">
                            <div class="mb-3">
                                <div class="small text-muted">2025-10-21 • 09:32</div>
                                <div><strong>Ali Construction</strong> paid invoice #INV-102 (PKR 1,200,000)</div>
                            </div>

                            <div class="mb-3">
                                <div class="small text-muted">2025-10-20 • 14:20</div>
                                <div><strong>BuildWell</strong> requested contract amendment for Bridge project</div>
                            </div>

                            <div class="mb-3">
                                <div class="small text-muted">2025-10-19 • 11:00</div>
                                <div><strong>GreenField</strong> uploaded final handover docs for Project GF-02</div>
                            </div>

                            <div class="small text-muted">See all recent activity in the Reports section.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- ================= MODALS ================= --}}
    {{-- View Client Modal --}}
    <div class="modal fade" id="viewClientModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">View Client</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{-- Content will be filled by JS (dummy shown) --}}
                    <div id="viewClientContent">
                        <div class="row mb-3">
                            <div class="col-md-8">
                                <h4 id="vc-name">Ali Construction Ltd.</h4>
                                <div class="small text-muted" id="vc-reg">Reg: ALI-2021 • Sector: Infrastructure</div>
                                <p class="mt-2" id="vc-address">123 Industrial Area, Lahore</p>
                            </div>
                            <div class="col-md-4 text-end">
                                <div class="small text-muted">Status</div>
                                <h5><span class="badge bg-success">Active</span></h5>
                                <div class="small text-muted">Clients since: 2021</div>
                            </div>
                        </div>

                        <hr>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <h6>Primary Contact</h6>
                                <p id="vc-contact">Mr. Ali Raza • ali@alicorp.com • 0300-1234567</p>
                            </div>
                            <div class="col-md-6">
                                <h6>Financial Summary</h6>
                                <p id="vc-fin">Total Contract Value: PKR 14,500,000<br>Outstanding: PKR 2,450,000</p>
                            </div>
                            <div class="col-md-12">
                                <h6>Recent Notes</h6>
                                <ul id="vc-notes">
                                    <li>2025-10-10: Final stage structural inspection completed.</li>
                                    <li>2025-09-14: Partial payment received PKR 1,200,000.</li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" id="vc-open-contracts" class="btn btn-outline-secondary">View Contracts</a>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="#" class="btn btn-primary">Open Client Profile</a>
                </div>
            </div>
        </div>
    </div>

    {{-- Edit Client Modal --}}
    <div class="modal fade" id="editClientModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <form id="editClientForm">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Client</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        {{-- Example editable fields (dummy) --}}
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Client Name</label>
                                <input type="text" class="form-control" id="ec-name" value="Ali Construction Ltd.">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Primary Email</label>
                                <input type="email" class="form-control" id="ec-email" value="info@alicorp.com">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Primary Phone</label>
                                <input type="text" class="form-control" id="ec-phone" value="0300-1234567">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Status</label>
                                <select id="ec-status" class="form-select">
                                    <option value="active" selected>Active</option>
                                    <option value="pending">Pending</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Address</label>
                                <textarea id="ec-address" class="form-control" rows="3">123 Industrial Area, Lahore</textarea>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Default Payment Terms</label>
                                <input type="text" class="form-control" id="ec-terms" value="30 days">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Account Manager</label>
                                <select class="form-select" id="ec-manager">
                                    <option>-- Select Manager --</option>
                                    <option selected>Hira Khan</option>
                                    <option>Bilal Hussain</option>
                                </select>
                            </div>

                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Delete Confirmation Modal --}}
    <div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <form id="deleteClientForm">
                    <div class="modal-header">
                        <h5 class="modal-title text-danger">Confirm Delete</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete this client? This action cannot be undone.</p>
                        <input type="hidden" id="delete-client-id" value="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Yes, Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Push scripts for charts and small interactions --}}
    @push('scripts')
        <!-- Chart.js -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {

                // Check / uncheck all
                const checkAll = document.getElementById('checkAll');
                if (checkAll) {
                    checkAll.addEventListener('change', function() {
                        document.querySelectorAll('.row-check').forEach(ch => ch.checked = this.checked);
                    });
                }

                // Reset filters
                document.getElementById('resetFilters')?.addEventListener('click', function() {
                    document.getElementById('clientFilterForm').reset();
                });

                // Dummy: View client modal populate (in real app, fetch via AJAX)
                document.querySelectorAll('.viewClientBtn').forEach(btn => {
                    btn.addEventListener('click', function() {
                        const id = this.dataset.id;
                        // Example: set modal content based on id (here static for demo)
                        // You would call fetch('/api/clients/'+id) and fill fields
                        document.getElementById('vc-name').textContent = id === '1' ?
                            'Ali Construction Ltd.' : (id === '2' ? 'BuildWell Pvt. Ltd.' :
                                'GreenField Developers');
                        document.getElementById('vc-contact').textContent = id === '1' ?
                            'Mr. Ali Raza • ali@alicorp.com • 0300-1234567' :
                            'contact@client.com • 03xx-xxxxxxx';
                        document.getElementById('vc-fin').textContent = id === '1' ?
                            'Total Contract Value: PKR 14,500,000\\nOutstanding: PKR 2,450,000' :
                            'Total Contract Value: PKR 8,500,000\\nOutstanding: PKR 520,000';
                        // ... more dynamic filling if needed
                    });
                });

                // Dummy: Edit modal prefill
                document.querySelectorAll('.editClientBtn').forEach(btn => {
                    btn.addEventListener('click', function() {
                        const id = this.dataset.id;
                        // Set sample values
                        document.getElementById('ec-name').value = id === '1' ?
                            'Ali Construction Ltd.' : (id === '2' ? 'BuildWell Pvt. Ltd.' :
                                'GreenField Developers');
                        document.getElementById('ec-email').value = id === '1' ? 'info@alicorp.com' :
                            'contact@client.com';
                        document.getElementById('ec-phone').value = '0300-0000000';
                        document.getElementById('ec-address').value = 'Sample address for client #' +
                            id;
                        document.getElementById('ec-status').value = id === '2' ? 'pending' : 'active';
                    });
                });

                // Delete modal: capture id
                document.querySelectorAll('.deleteClientBtn').forEach(btn => {
                    btn.addEventListener('click', function() {
                        document.getElementById('delete-client-id').value = this.dataset.id;
                    });
                });

                // Charts
                const ctx = document.getElementById('clientDistributionChart')?.getContext('2d');
                if (ctx) {
                    new Chart(ctx, {
                        type: 'doughnut',
                        data: {
                            labels: ['Infrastructure', 'Residential', 'Commercial', 'Industrial'],
                            datasets: [{
                                data: [42, 35, 28, 23],
                                backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#f6c23e']
                            }]
                        },
                        options: {
                            responsive: true,
                            plugins: {
                                legend: {
                                    position: 'bottom'
                                }
                            }
                        }
                    });
                }

                // Optional: handlers for export buttons (demo)
                document.getElementById('exportCsv')?.addEventListener('click', function() {
                    alert('Export CSV - implement server-side export to return actual CSV file.');
                });
                document.getElementById('exportExcel')?.addEventListener('click', function() {
                    alert('Export Excel - implement server-side export to return actual XLSX file.');
                });

                // Submit handlers for modals (demo only - prevent default)
                document.getElementById('editClientForm')?.addEventListener('submit', function(e) {
                    e.preventDefault();
                    // In real app: send AJAX / form submit to update client
                    alert('Client updated (demo). In real app send AJAX/POST to server.');
                    var modal = bootstrap.Modal.getInstance(document.getElementById('editClientModal'));
                    modal.hide();
                });

                document.getElementById('deleteClientForm')?.addEventListener('submit', function(e) {
                    e.preventDefault();
                    const id = document.getElementById('delete-client-id').value;
                    // In real app: call DELETE endpoint
                    alert('Client #' + id + ' deleted (demo). Implement server-side delete.');
                    var modal = bootstrap.Modal.getInstance(document.getElementById('deleteConfirmModal'));
                    modal.hide();
                });

            });
        </script>
    @endpush

@endsection




{{-- genrated 1st  --}}
{{-- @extends('layouts.app')

@section('title', 'Clients')
@section('page_title', 'Client Management')

@section('content')
    <div class="container-fluid px-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0 text-gray-800">All Clients</h1>
            <a href="{{ route('admin.clients.create') }}" class="btn btn-primary"><i class="fas fa-user-plus"></i> Add New
                Client</a>
        </div>

        {{-- Search + Filter --}}
<div class="card shadow-sm mb-4">
    <div class="card-body">
        <form class="row g-3">
            <div class="col-md-4">
                <input type="text" class="form-control" placeholder="Search by name or email">
            </div>
            <div class="col-md-3">
                <select class="form-select">
                    <option selected>All Statuses</option>
                    <option>Active</option>
                    <option>Inactive</option>
                    <option>Pending</option>
                </select>
            </div>
            <div class="col-md-2">
                <button class="btn btn-success w-100"><i class="fas fa-search"></i> Search</button>
            </div>
        </form>
    </div>
</div>

{{-- Client Table --}}
<div class="card shadow-sm">
    <div class="card-header bg-white">
        <h6 class="m-0 font-weight-bold text-primary">Client Records</h6>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Client Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Projects</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Ali Construction Ltd.</td>
                    <td>info@alicorp.com</td>
                    <td>0312-4567890</td>
                    <td>5</td>
                    <td><span class="badge bg-success">Active</span></td>
                    <td>
                        <a href="#" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                        <a href="#" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                        <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>BuildWell Pvt. Ltd.</td>
                    <td>contact@buildwell.pk</td>
                    <td>0321-9876543</td>
                    <td>3</td>
                    <td><span class="badge bg-warning text-dark">Pending</span></td>
                    <td>
                        <a href="#" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                        <a href="#" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                        <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</div>
@endsection --}}
