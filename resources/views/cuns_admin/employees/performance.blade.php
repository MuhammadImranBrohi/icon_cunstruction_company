@extends('layouts.app')

@section('title', 'Project Performance')
@section('page_title', 'Employee Performance Evaluation')

@section('content')
    <div class="container-fluid">
        <!-- Header Section -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="mb-0">Project Performance Dashboard</h4>
        </div>

        <!-- KPI Cards -->
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card text-center shadow-sm border-0">
                    <div class="card-body">
                        <h6>Average Productivity</h6>
                        <h3 class="fw-bold text-success">92%</h3>
                        <small class="text-muted">This month performance</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center shadow-sm border-0">
                    <div class="card-body">
                        <h6>Attendance Rate</h6>
                        <h3 class="fw-bold text-info">95%</h3>
                        <small class="text-muted">Across all projects</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center shadow-sm border-0">
                    <div class="card-body">
                        <h6>Completed Tasks</h6>
                        <h3 class="fw-bold text-primary">1,247</h3>
                        <small class="text-muted">In October 2025</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center shadow-sm border-0">
                    <div class="card-body">
                        <h6>Late Submissions</h6>
                        <h3 class="fw-bold text-danger">18</h3>
                        <small class="text-muted">Need follow-up</small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Project Performance Chart Placeholder -->
        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-light">
                <h5 class="mb-0">Project Performance Summary</h5>
            </div>
            <div class="card-body">
                <canvas id="performanceChart" height="200"></canvas>
            </div>
        </div>

        <!-- Employee Performance Table -->
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-light d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Individual Employee Performance</h5>
                <div>
                    <input id="performanceSearch" type="search" class="form-control form-control-sm d-inline w-auto"
                        placeholder="Search employee...">
                    {{-- <button id="exportPerformance" class="btn btn-primary"><i class="fas fa-download me-2"></i>Export --}}
                    Report</button>

                </div>
            </div>
            <div class="card-body table-responsive">
                <table id="performanceTable" class="table table-striped align-middle">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Employee</th>
                            <th>Project</th>
                            <th>Productivity</th>
                            <th>Task Completion</th>
                            <th>Attendance</th>
                            <th>Supervisor Rating</th>
                            <th>Remarks</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Ali Hassan</td>
                            <td>Green City Apartments</td>
                            <td>96%</td>
                            <td>98%</td>
                            <td>100%</td>
                            <td><span class="badge bg-success">Excellent</span></td>
                            <td>Reliable and punctual</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Fatima Noor</td>
                            <td>Metro Expansion</td>
                            <td>89%</td>
                            <td>92%</td>
                            <td>95%</td>
                            <td><span class="badge bg-info">Very Good</span></td>
                            <td>Great teamwork and leadership</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Usman Khan</td>
                            <td>Highway Bridge</td>
                            <td>75%</td>
                            <td>80%</td>
                            <td>90%</td>
                            <td><span class="badge bg-warning">Needs Improvement</span></td>
                            <td>Improve task timeliness</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Top Performers Section -->
        <div class="card shadow-sm">
            <div class="card-header bg-light">
                <h5 class="mb-0">Top Performers of the Month</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card border-success shadow-sm text-center">
                            <div class="card-body">
                                <img src="https://via.placeholder.com/100" class="rounded-circle mb-3" alt="Employee Photo">
                                <h6 class="fw-bold mb-0">Ali Hassan</h6>
                                <small class="text-muted">Project Engineer</small>
                                <p class="mt-2 text-success">Performance: 98%</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card border-info shadow-sm text-center">
                            <div class="card-body">
                                <img src="https://via.placeholder.com/100" class="rounded-circle mb-3" alt="Employee Photo">
                                <h6 class="fw-bold mb-0">Maria Khan</h6>
                                <small class="text-muted">Site Supervisor</small>
                                <p class="mt-2 text-info">Performance: 95%</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card border-primary shadow-sm text-center">
                            <div class="card-body">
                                <img src="https://via.placeholder.com/100" class="rounded-circle mb-3" alt="Employee Photo">
                                <h6 class="fw-bold mb-0">Bilal Ahmed</h6>
                                <small class="text-muted">Safety Officer</small>
                                <p class="mt-2 text-primary">Performance: 93%</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @push('scripts')
        <!-- DataTables Buttons extension for export (only for this view) -->
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.bootstrap5.min.css">
        <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.bootstrap5.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Initialize Chart.js chart
                const ctx = document.getElementById('performanceChart').getContext('2d');
                new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
                        datasets: [{
                            label: 'Average Productivity (%)',
                            data: [88, 90, 92, 92],
                            borderColor: 'rgba(54, 162, 235, 1)',
                            backgroundColor: 'rgba(54, 162, 235, 0.15)',
                            tension: 0.3,
                            fill: true
                        }, {
                            label: 'Attendance Rate (%)',
                            data: [94, 95, 95, 95],
                            borderColor: 'rgba(40, 167, 69, 1)',
                            backgroundColor: 'rgba(40, 167, 69, 0.12)',
                            tension: 0.3,
                            fill: true
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'top'
                            },
                            title: {
                                display: true,
                                text: 'Project Performance Summary (Monthly)'
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                max: 100
                            }
                        }
                    }
                });

                // Initialize DataTable (must be before handlers that use `table`)
                var table = $('#performanceTable').DataTable({
                    dom: 'Bfrtip',
                    // buttons: [{
                    //     extend: 'excelHtml5',
                    //     title: 'Performance Report',
                    //     text: 'Export',
                    //     className: 'buttons-excel btn btn-md btn-primary'
                    // }]
                });

                // Wire search input to DataTable
                $('#performanceSearch').on('input', function() {
                    table.search(this.value).draw();
                });

                // Export button in header triggers DataTable excel button if available,
                // otherwise fall back to CSV export using existing button.
                function fallbackExportCSV(filename) {
                    filename = filename || 'performance_report.csv';
                    var rows = [];
                    $('#performanceTable thead tr').each(function() {
                        var cols = [];
                        $(this).find('th').each(function() {
                            cols.push('"' + $(this).text().trim().replace(/"/g, '""') + '"');
                        });
                        rows.push(cols.join(','));
                    });
                    $('#performanceTable tbody tr:visible').each(function() {
                        var cols = [];
                        $(this).find('td').each(function() {
                            cols.push('"' + $(this).text().trim().replace(/"/g, '""') + '"');
                        });
                        rows.push(cols.join(','));
                    });
                    var csv = rows.join('\n');
                    var blob = new Blob([csv], {
                        type: 'text/csv;charset=utf-8;'
                    });
                    if (navigator.msSaveBlob) { // IE 10+
                        navigator.msSaveBlob(blob, filename);
                    } else {
                        var link = document.createElement('a');
                        if (link.download !== undefined) {
                            var url = URL.createObjectURL(blob);
                            link.setAttribute('href', url);
                            link.setAttribute('download', filename);
                            link.style.visibility = 'hidden';
                            document.body.appendChild(link);
                            link.click();
                            document.body.removeChild(link);
                        }
                    }
                }

                $('#exportPerformance').on('click', function(e) {
                    e.preventDefault();
                    var triggered = false;
                    try {
                        if (table && typeof table.button === 'function') {
                            // try to trigger DataTables excel button
                            var btns = table.buttons();
                            if (btns && btns.count() > 0) {
                                // find excel button index
                                table.button('.buttons-excel').trigger();
                                triggered = true;
                            }
                        }
                    } catch (err) {
                        console.warn('DataTables export failed, falling back to CSV:', err);
                    }
                    if (!triggered) {
                        fallbackExportCSV('performance_report.csv');
                    }
                });
            });
        </script>
    @endpush

@endsection
