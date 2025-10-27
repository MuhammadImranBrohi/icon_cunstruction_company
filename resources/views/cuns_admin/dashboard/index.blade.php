@extends('layouts.app')

@section('title', 'Dashboard')
@section('page_title', 'Admin Dashboard')

@section('content')
    <div class="container-fluid px-4">
        {{-- ===== Page Header ===== --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0 text-gray-800">Welcome back, Admin</h1>
            <button class="btn btn-primary"><i class="fas fa-plus-circle"></i> Add New Project</button>
        </div>

        {{-- ===== Statistics Cards ===== --}}
        <div class="row">
            <div class="col-md-3 mb-4">
                <div class="card shadow-sm border-left-primary py-2">
                    <div class="card-body">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Active Projects</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">12</div>
                        <small class="text-muted">3 new this month</small>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card shadow-sm border-left-success py-2">
                    <div class="card-body">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Completed Projects</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">27</div>
                        <small class="text-muted">+2 since last week</small>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card shadow-sm border-left-warning py-2">
                    <div class="card-body">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Approvals</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">8</div>
                        <small class="text-muted">2 new requests</small>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card shadow-sm border-left-danger py-2">
                    <div class="card-body">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Total Employees</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">35</div>
                        <small class="text-muted">5 on leave</small>
                    </div>
                </div>
            </div>
        </div>

        {{-- ===== Charts Section ===== --}}
        <div class="row">
            <div class="col-lg-8 mb-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-white py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Project Progress Overview</h6>
                    </div>
                    <div class="card-body">
                        <canvas id="projectProgressChart" height="120"></canvas>
                        <p class="mt-3 mb-0 small text-muted">This chart shows the monthly completion rate of active
                            projects.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-white py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Equipment Usage</h6>
                    </div>
                    <div class="card-body">
                        <canvas id="equipmentChart" height="200"></canvas>
                        <p class="mt-3 small text-muted">Excavators and Cranes are most utilized this month.</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- ===== Recent Activity Table ===== --}}
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-white py-3">
                <h6 class="m-0 font-weight-bold text-primary">Recent Activity</h6>
            </div>
            <div class="card-body">
                <table class="table table-hover table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Activity</th>
                            <th>Supervisor</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>01</td>
                            <td>2025-10-21</td>
                            <td>Concrete poured at Site A</td>
                            <td>Ahmed Khan</td>
                            <td><span class="badge bg-success">Completed</span></td>
                        </tr>
                        <tr>
                            <td>02</td>
                            <td>2025-10-20</td>
                            <td>Steel material delivered</td>
                            <td>Bilal Hussain</td>
                            <td><span class="badge bg-warning text-dark">Pending</span></td>
                        </tr>
                        <tr>
                            <td>03</td>
                            <td>2025-10-19</td>
                            <td>Inspection visit scheduled</td>
                            <td>Sana Malik</td>
                            <td><span class="badge bg-info text-dark">Scheduled</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        {{-- ===== Notifications & Messages ===== --}}
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-white py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Recent Notifications</h6>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Payment received for Project #12
                                <span class="badge bg-success">New</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Supervisor report uploaded
                                <span class="badge bg-info text-dark">Info</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Equipment maintenance overdue
                                <span class="badge bg-danger">Alert</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-white py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Recent Messages</h6>
                    </div>
                    <div class="card-body">
                        <div class="list-group">
                            <a href="#" class="list-group-item list-group-item-action">
                                <div class="d-flex w-100 justify-content-between">
                                    <h6 class="mb-1">Supervisor Ali Raza</h6>
                                    <small>10 mins ago</small>
                                </div>
                                <p class="mb-1">Updated project milestone details.</p>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action">
                                <div class="d-flex w-100 justify-content-between">
                                    <h6 class="mb-1">Client Zain Construction</h6>
                                    <small>30 mins ago</small>
                                </div>
                                <p class="mb-1">Requesting update on invoice #102.</p>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action">
                                <div class="d-flex w-100 justify-content-between">
                                    <h6 class="mb-1">Manager Hira Khan</h6>
                                    <small>1 hour ago</small>
                                </div>
                                <p class="mb-1">Meeting scheduled for project review tomorrow.</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ===== Chart.js Script Section ===== --}}
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const ctx1 = document.getElementById('projectProgressChart').getContext('2d');
            new Chart(ctx1, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug'],
                    datasets: [{
                        label: 'Projects Completed',
                        data: [5, 9, 7, 10, 14, 11, 17, 20],
                        borderColor: '#4e73df',
                        tension: 0.4,
                        fill: false
                    }]
                },
                options: {
                    responsive: true
                }
            });

            const ctx2 = document.getElementById('equipmentChart').getContext('2d');
            new Chart(ctx2, {
                type: 'doughnut',
                data: {
                    labels: ['Excavators', 'Cranes', 'Mixers', 'Trucks'],
                    datasets: [{
                        data: [45, 25, 15, 15],
                        backgroundColor: ['#1cc88a', '#36b9cc', '#f6c23e', '#e74a3b']
                    }]
                },
                options: {
                    responsive: true
                }
            });
        </script>
    @endpush
@endsection
