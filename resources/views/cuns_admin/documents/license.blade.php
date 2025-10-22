@extends('layouts.app')

@section('title', 'License')
@section('page_title', 'Software License & Usage Policy')

@section('content')
    <div class="container-fluid">
        <div class="card shadow-sm">
            <div class="card-header bg-dark text-white">
                <h5>License Agreement</h5>
            </div>
            <div class="card-body">
                <p><strong>License Type:</strong> Company Internal Use Only</p>
                <p><strong>Issued To:</strong> ABC Construction Pvt. Ltd.</p>
                <p><strong>Valid Until:</strong> December 31, 2030</p>

                <h6 class="mt-4">Terms & Conditions:</h6>
                <ul>
                    <li>Software cannot be redistributed or resold.</li>
                    <li>Modifications are allowed for internal business use only.</li>
                    <li>Unauthorized access, duplication, or sharing will result in license termination.</li>
                    <li>Support and updates are available for active license holders only.</li>
                </ul>

                <div class="alert alert-warning mt-4">
                    <strong>Note:</strong> For license renewal, contact our technical team at <a
                        href="mailto:support@construction.com">support@construction.com</a>.
                </div>
            </div>
        </div>
    </div>
@endsection
