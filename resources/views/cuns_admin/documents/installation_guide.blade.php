@extends('layouts.app')

@section('title', 'Installation Guide')
@section('page_title', 'System Installation & Setup Guide')

@section('content')
    <div class="container-fluid">

        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Installation Overview</h5>
            </div>
            <div class="card-body">
                <p>This guide helps users set up the Construction Company Management System on their devices.</p>
                <ul>
                    <li>Ensure PHP ≥ 8.2, MySQL ≥ 8.0, and Node.js are installed.</li>
                    <li>Clone the repository or download the zip file.</li>
                    <li>Run <code>composer install</code> and <code>npm install</code>.</li>
                    <li>Configure your <code>.env</code> file with the database credentials.</li>
                    <li>Run migrations with <code>php artisan migrate --seed</code>.</li>
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-success text-white">Frontend Setup</div>
                    <div class="card-body">
                        <p>Steps to configure the client interface:</p>
                        <ol>
                            <li>Open terminal inside <code>/frontend</code>.</li>
                            <li>Run <code>npm run dev</code> to build the UI.</li>
                            <li>Access via <code>http://localhost:8000</code>.</li>
                        </ol>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-info text-white">Backend Configuration</div>
                    <div class="card-body">
                        <p>Steps for configuring backend services:</p>
                        <ol>
                            <li>Setup your database in <code>.env</code>.</li>
                            <li>Assign admin role via seeder command.</li>
                            <li>Enable file storage: <code>php artisan storage:link</code>.</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
