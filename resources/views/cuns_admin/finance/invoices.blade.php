@extends('layouts.app')

@section('title', 'Invoices')
@section('page_title', 'Finance - Invoices Management')

@section('content')
    <div class="container-fluid py-4">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold">Invoices</h4>
            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addInvoiceModal">
                <i class="fas fa-plus-circle"></i> New Invoice
            </button>
        </div>

        <!-- Summary Cards -->
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card shadow-sm border-start border-success border-3">
                    <div class="card-body">
                        <h6 class="text-muted mb-1">Paid Invoices</h6>
                        <h4 class="fw-bold">32</h4>
                        <small class="text-success">+$4,500 this month</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm border-start border-warning border-3">
                    <div class="card-body">
                        <h6 class="text-muted mb-1">Pending Invoices</h6>
                        <h4 class="fw-bold">14</h4>
                        <small class="text-muted">Awaiting client approval</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm border-start border-danger border-3">
                    <div class="card-body">
                        <h6 class="text-muted mb-1">Overdue Invoices</h6>
                        <h4 class="fw-bold">6</h4>
                        <small class="text-danger">Due more than 10 days</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm border-start border-primary border-3">
                    <div class="card-body">
                        <h6 class="text-muted mb-1">Total Billed</h6>
                        <h4 class="fw-bold">$128,400</h4>
                        <small class="text-primary">For 52 total invoices</small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filters -->
        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                <form class="row g-3">
                    <div class="col-md-3">
                        <label class="form-label">Client</label>
                        <select class="form-select">
                            <option selected>All Clients</option>
                            <option>ABC Developers</option>
                            <option>BuildRight Ltd</option>
                            <option>Highway Authority</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Status</label>
                        <select class="form-select">
                            <option selected>All</option>
                            <option>Paid</option>
                            <option>Pending</option>
                            <option>Overdue</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Date From</label>
                        <input type="date" class="form-control" />
                    </div>
                    <div class="col-md-3 d-flex align-items-end">
                        <button class="btn btn-dark w-100"><i class="fas fa-filter"></i> Filter</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Invoices Table -->
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                <h6 class="fw-bold mb-0">Invoice List</h6>
                <button class="btn btn-outline-secondary btn-sm"><i class="fas fa-download"></i> Export CSV</button>
            </div>
            <div class="card-body">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Invoice No.</th>
                            <th>Client</th>
                            <th>Project</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Issued Date</th>
                            <th>Due Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>INV-001</td>
                            <td>ABC Developers</td>
                            <td>Residential Tower</td>
                            <td>$12,500</td>
                            <td><span class="badge bg-success">Paid</span></td>
                            <td>2025-09-12</td>
                            <td>2025-09-30</td>
                            <td>
                                <button class="btn btn-sm btn-outline-primary"><i class="fas fa-eye"></i></button>
                                <button class="btn btn-sm btn-outline-warning"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>INV-002</td>
                            <td>Highway Authority</td>
                            <td>Bridge Maintenance</td>
                            <td>$8,200</td>
                            <td><span class="badge bg-warning text-dark">Pending</span></td>
                            <td>2025-09-18</td>
                            <td>2025-10-05</td>
                            <td>
                                <button class="btn btn-sm btn-outline-primary"><i class="fas fa-eye"></i></button>
                                <button class="btn btn-sm btn-outline-warning"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>INV-003</td>
                            <td>BuildRight Ltd</td>
                            <td>Office Complex</td>
                            <td>$15,750</td>
                            <td><span class="badge bg-danger">Overdue</span></td>
                            <td>2025-09-01</td>
                            <td>2025-09-20</td>
                            <td>
                                <button class="btn btn-sm btn-outline-primary"><i class="fas fa-eye"></i></button>
                                <button class="btn btn-sm btn-outline-warning"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Add Invoice Modal -->
        <div class="modal fade" id="addInvoiceModal" tabindex="-1" aria-labelledby="addInvoiceModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fw-bold">Create New Invoice</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Client Name</label>
                                <input type="text" class="form-control" placeholder="Enter client name" />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Project</label>
                                <input type="text" class="form-control" placeholder="Enter project name" />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Invoice Date</label>
                                <input type="date" class="form-control" />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Due Date</label>
                                <input type="date" class="form-control" />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Amount ($)</label>
                                <input type="number" class="form-control" placeholder="0.00" />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Status</label>
                                <select class="form-select">
                                    <option>Pending</option>
                                    <option>Paid</option>
                                    <option>Overdue</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" rows="3" placeholder="Enter invoice details"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary">Save Invoice</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
