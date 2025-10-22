{{-- 2nd genrted --}}
@extends('layouts.app')

@section('title', 'Client Feedback')
@section('page_title', 'Client Feedback & Satisfaction Reports')

@section('content')
    <div class="container-fluid">

        {{-- Page Header --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="mb-0"><i class="fas fa-comments"></i> Client Feedback Management</h4>
            <a href="{{ url('/cuns_admin/clients/create') }}" class="btn btn-primary">
                <i class="fas fa-user-plus"></i> Add New Client
            </a>
        </div>

        {{-- Feedback Overview --}}
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card border-success shadow-sm">
                    <div class="card-body text-center">
                        <i class="fas fa-smile text-success fa-2x mb-2"></i>
                        <h6>Positive Feedback</h6>
                        <h3>128</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-warning shadow-sm">
                    <div class="card-body text-center">
                        <i class="fas fa-meh text-warning fa-2x mb-2"></i>
                        <h6>Neutral Feedback</h6>
                        <h3>45</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-danger shadow-sm">
                    <div class="card-body text-center">
                        <i class="fas fa-frown text-danger fa-2x mb-2"></i>
                        <h6>Negative Feedback</h6>
                        <h3>23</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-info shadow-sm">
                    <div class="card-body text-center">
                        <i class="fas fa-chart-line text-info fa-2x mb-2"></i>
                        <h6>Average Satisfaction</h6>
                        <h3>84%</h3>
                    </div>
                </div>
            </div>
        </div>

        {{-- Feedback Form --}}
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-primary text-white">
                <i class="fas fa-pen"></i> Submit New Feedback
            </div>
            <div class="card-body">
                <form action="#" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="client_name" class="form-label fw-bold">Client Name</label>
                            <input type="text" id="client_name" name="client_name" class="form-control"
                                placeholder="Enter client name">
                        </div>
                        <div class="col-md-4">
                            <label for="project_name" class="form-label fw-bold">Project Name</label>
                            <input type="text" id="project_name" name="project_name" class="form-control"
                                placeholder="Enter project name">
                        </div>
                        <div class="col-md-4">
                            <label for="rating" class="form-label fw-bold">Rating (1–5)</label>
                            <select id="rating" name="rating" class="form-select">
                                <option value="" disabled selected>Select rating</option>
                                @for ($i = 1; $i <= 5; $i++)
                                    <option value="{{ $i }}">{{ $i }} Star{{ $i > 1 ? 's' : '' }}
                                    </option>
                                @endfor
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="feedback" class="form-label fw-bold">Feedback Message</label>
                        <textarea id="feedback" name="feedback" class="form-control" rows="4"
                            placeholder="Write client feedback or remarks..."></textarea>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-paper-plane"></i> Submit Feedback
                        </button>
                    </div>
                </form>
            </div>
        </div>

        {{-- Feedback Table --}}
        <div class="card shadow-sm">
            <div class="card-header bg-secondary text-white d-flex justify-content-between align-items-center">
                <span><i class="fas fa-list"></i> Recent Feedbacks</span>
                <button class="btn btn-light btn-sm"><i class="fas fa-download"></i> Export to CSV</button>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered mb-0">
                        <thead class="table-dark text-center">
                            <tr>
                                <th>#</th>
                                <th>Client Name</th>
                                <th>Project</th>
                                <th>Feedback</th>
                                <th>Rating</th>
                                <th>Date Submitted</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 1; $i <= 6; $i++)
                                @php
                                    $ratings = [5, 4, 3, 2, 1];
                                    $rating = $ratings[array_rand($ratings)];
                                    $ratingColor =
                                        $rating >= 4 ? 'text-success' : ($rating == 3 ? 'text-warning' : 'text-danger');
                                @endphp
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>Client {{ $i }}</td>
                                    <td>Project {{ $i }}</td>
                                    <td>Great experience working with your team. Will recommend again.</td>
                                    <td class="{{ $ratingColor }}">
                                        @for ($star = 1; $star <= 5; $star++)
                                            <i class="fas fa-star{{ $star <= $rating ? '' : '-o' }}"></i>
                                        @endfor
                                    </td>
                                    <td>{{ now()->subDays(rand(1, 15))->format('Y-m-d') }}</td>
                                    <td class="text-center">
                                        <div class="btn-group btn-group-sm">
                                            <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                            <a href="#" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- Insights Section --}}
        <div class="card mt-4 border-info">
            <div class="card-header bg-info text-white">
                <i class="fas fa-chart-pie"></i> Feedback Insights
            </div>
            <div class="card-body">
                <ul>
                    <li><strong>Most Satisfied Clients:</strong> Skyline Builders, Alpha Construction, UrbanTech Ltd.</li>
                    <li><strong>Common Praise:</strong> “On-time delivery and excellent communication.”</li>
                    <li><strong>Common Issues:</strong> “Delayed material supply in one or two cases.”</li>
                    <li><strong>Overall Satisfaction:</strong> 4.3/5 Average Rating</li>
                </ul>
            </div>
        </div>

    </div>
@endsection


{{-- 1st genrated  --}}

{{-- @extends('layouts.app')

@section('title', 'Client Feedback')
@section('page_title', 'Client Feedback and Reviews')

@section('content')
    <div class="container-fluid px-4">

        <h1 class="h3 mb-4 text-gray-800">Client Feedback</h1>

        {{-- Feedback Summary --}}
<div class="row mb-4">
    <div class="col-md-3">
        <div class="card shadow-sm text-center py-3">
            <h6 class="text-primary">Total Feedback</h6>
            <h3>124</h3>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card shadow-sm text-center py-3">
            <h6 class="text-success">Positive</h6>
            <h3>98</h3>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card shadow-sm text-center py-3">
            <h6 class="text-warning">Neutral</h6>
            <h3>15</h3>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card shadow-sm text-center py-3">
            <h6 class="text-danger">Negative</h6>
            <h3>11</h3>
        </div>
    </div>
</div>

{{-- Feedback Table --}}
<div class="card shadow-sm">
    <div class="card-header bg-white">
        <h6 class="m-0 font-weight-bold text-primary">Recent Client Feedback</h6>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Client</th>
                    <th>Project</th>
                    <th>Rating</th>
                    <th>Comments</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>01</td>
                    <td>Ali Construction Ltd.</td>
                    <td>Housing Project A</td>
                    <td><span class="text-success">★★★★★</span></td>
                    <td>Excellent communication and project delivery!</td>
                    <td>2025-10-20</td>
                </tr>
                <tr>
                    <td>02</td>
                    <td>BuildWell Pvt. Ltd.</td>
                    <td>Bridge Phase 2</td>
                    <td><span class="text-warning">★★★☆☆</span></td>
                    <td>Good work but some delay in final inspection.</td>
                    <td>2025-10-18</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

</div>
@endsection --}}
