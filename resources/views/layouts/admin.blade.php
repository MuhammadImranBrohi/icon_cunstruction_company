<!Doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title', 'Alumni Admin Page')</title>
    <meta name="description" content="Alumni Admin Page">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{ asset('alumni_admin/vendors/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('alumni_admin/vendors/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('alumni_admin/vendors/themify-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('alumni_admin/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('alumni_admin/vendors/selectFX/css/cs-skin-elastic.css') }}">
    <link rel="stylesheet" href="{{ asset('alumni_admin/vendors/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('alumni_admin/assets/css/style.css') }}">
</head>

<body>
    <!-- Sidebar -->
    @include('partials.sidebar')

    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">

        <!-- Header -->
        @include('partials.header')

        <!-- Content -->
        <div class="content mt-3">
            @yield('content')
        </div>

        <!-- Footer -->
        @include('partials.footer')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('alumni_admin/vendors/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('alumni_admin/vendors/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('alumni_admin/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('alumni_admin/assets/js/main.js') }}"></script>
    <script src="{{ asset('alumni_admin/vendors/chart.js/dist/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('alumni_admin/assets/js/dashboard.js') }}"></script>
    <script src="{{ asset('alumni_admin/assets/js/widgets.js') }}"></script>
</body>

</html>
