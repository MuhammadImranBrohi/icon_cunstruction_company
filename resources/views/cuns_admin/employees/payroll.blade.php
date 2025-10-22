@extends('layouts.app')

@section('title', 'Project Payroll Management')
@section('page_title', 'Employee Payroll - Construction Projects')

@section('content')
    <div class="container-fluid">

        <!-- Header -->
        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                <h4><i class="fas fa-money-check-alt"></i> Project Payroll Management</h4>
                {{-- <button id="exportPayroll" class="btn btn-success btn-sm"><i class="fas fa-file-excel"></i> Export Payroll
                    Report</button> --}}
            </div>
            <div class="card-body">
                <p class="text-muted">Manage all salary-related details for employees working under various construction
                    projects. Track attendance, generate payslips, and approve payments.</p>
            </div>
        </div>

        <!-- Summary Cards -->
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card text-center border-start border-success border-4">
                    <div class="card-body">
                        <h6>Total Employees</h6>
                        <h3>124</h3>
                        <small class="text-muted">Across all projects</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center border-start border-primary border-4">
                    <div class="card-body">
                        <h6>Paid This Month</h6>
                        <h3>89</h3>
                        <small class="text-muted">Fully cleared salaries</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center border-start border-warning border-4">
                    <div class="card-body">
                        <h6>Pending Payments</h6>
                        <h3>21</h3>
                        <small class="text-muted">Awaiting approval</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center border-start border-danger border-4">
                    <div class="card-body">
                        <h6>Total Payroll (PKR)</h6>
                        <h3>5,850,000</h3>
                        <small class="text-muted">For this month</small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Payroll Filters -->
        <div class="card shadow-sm mb-4">
            <form id="payrollFilterForm" class="row g-3">
                <div class="col-md-3">
                    <label>Project</label>
                    <select id="filterProject" class="form-select">
                        <option value="All Projects">All Projects</option>
                        <option value="Housing Site A">Housing Site A</option>
                        <option value="Bridge Site C">Bridge Site C</option>
                        <option value="Road Project B">Road Project B</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label>Month</label>
                    <select id="filterMonth" class="form-select">
                        <option value="October 2025">October 2025</option>
                        <option value="September 2025">September 2025</option>
                        <option value="August 2025">August 2025</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label>Status</label>
                    <select id="filterStatus" class="form-select">
                        <option value="All">All</option>
                        <option value="Paid">Paid</option>
                        <option value="Pending">Pending</option>
                        <option value="Hold">Hold</option>
                    </select>
                </div>
                <div class="col-md-3 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary w-100"><i class="fas fa-search"></i> Search</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Payroll Table -->
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5><i class="fas fa-table"></i> Payroll Details</h5>
        </div>
        <div class="card-body table-responsive">
            <table id="payrollTable" class="table table-bordered table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Employee</th>
                        <th>Project</th>
                        <th>Working Days</th>
                        <th>Basic Pay (PKR)</th>
                        <th>Overtime (Hrs)</th>
                        <th>Deductions</th>
                        <th>Net Pay (PKR)</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>01</td>
                        <td>Ali Raza</td>
                        <td>Bridge Site C</td>
                        <td>26</td>
                        <td>45,000</td>
                        <td>12</td>
                        <td>1,500</td>
                        <td>49,200</td>
                        <td><span class="badge bg-success">Paid</span></td>
                        <td>
                            <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                data-bs-target="#viewSlipModal">View</button>
                        </td>
                    </tr>
                    <tr>
                        <td>02</td>
                        <td>Ahmed Khan</td>
                        <td>Housing Site A</td>
                        <td>24</td>
                        <td>42,000</td>
                        <td>5</td>
                        <td>0</td>
                        <td>43,250</td>
                        <td><span class="badge bg-warning text-dark">Pending</span></td>
                        <td>
                            <button class="btn btn-sm btn-outline-success">Approve</button>
                        </td>
                    </tr>
                    <tr>
                        <td>03</td>
                        <td>Imran Malik</td>
                        <td>Road Project B</td>
                        <td>28</td>
                        <td>50,000</td>
                        <td>8</td>
                        <td>2,000</td>
                        <td>53,600</td>
                        <td><span class="badge bg-danger">Hold</span></td>
                        <td>
                            <button class="btn btn-sm btn-outline-info">Edit</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Payroll Slip Modal -->
    <div class="modal fade" id="viewSlipModal" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header bg-dark text-white">
                    <h5 class="modal-title"><i class="fas fa-file-invoice"></i> Payroll Slip - Ali Raza</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <strong>Employee Name:</strong> Ali Raza <br>
                            <strong>Project:</strong> Bridge Site C <br>
                            <strong>Designation:</strong> Site Engineer
                        </div>
                        <div class="col-md-6">
                            <strong>Pay Month:</strong> October 2025 <br>
                            <strong>Pay Date:</strong> 31 Oct 2025 <br>
                            <strong>Status:</strong> <span class="badge bg-success">Paid</span>
                        </div>
                    </div>
                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>Description</th>
                                <th>Amount (PKR)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Basic Salary</td>
                                <td>45,000</td>
                            </tr>
                            <tr>
                                <td>Overtime</td>
                                <td>3,600</td>
                            </tr>
                            <tr>
                                <td>Bonus</td>
                                <td>2,000</td>
                            </tr>
                            <tr>
                                <td>Deductions</td>
                                <td>-1,400</td>
                            </tr>
                            <tr class="table-success">
                                <td><strong>Net Pay</strong></td>
                                <td><strong>49,200</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary"><i class="fas fa-print"></i> Print Slip</button>
                </div>
            </div>
        </div>
    </div>

    </div>
    @push('scripts')
        <!-- DataTables Buttons extension for export -->
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.bootstrap5.min.css">
        <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.bootstrap5.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>

        <script>
            $(document).ready(function() {
                var table = $('#payrollTable').DataTable({
                    dom: 'Bfrtip',
                    buttons: [{
                        extend: 'excelHtml5',
                        text: '<i class="fas fa-file-excel"></i> Export Payroll Report',
                        className: 'btn btn-success btn-sm',
                        title: 'Payroll Report',
                        exportOptions: {
                            columns: ':visible'
                        }
                    }]
                });

                // Move export button to header
                $('#exportPayroll').on('click', function() {
                    table.button('.buttons-excel').trigger();
                });

                // Payroll filter form logic
                $('#payrollFilterForm').on('submit', function(e) {
                    e.preventDefault();
                    var project = $('#filterProject').val();
                    var month = $('#filterMonth').val();
                    var status = $('#filterStatus').val();

                    table.rows().every(function() {
                        var data = this.data();
                        var show = true;
                        // Project filter
                        if (project !== 'All Projects' && data[2] !== project) {
                            show = false;
                        }
                        // Month filter (assume all rows are for October 2025 in sample, adapt if you add month column)
                        // Status filter
                        if (status !== 'All' && $(data[8]).text().trim() !== status) {
                            show = false;
                        }
                        if (show) {
                            $(this.node()).show();
                        } else {
                            $(this.node()).hide();
                        }
                    });
                });
            });
        </script>
    @endpush
@endsection
