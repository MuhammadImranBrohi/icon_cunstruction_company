<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="{{ asset('cuns_manager/assets') }}/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>@yield('ICON', 'Icon-Constructions')</title>

    <meta name="description" content="@yield('description', 'Default description')" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('cuns_manager/assets/img/favicon/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('cuns_manager/assets/vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('cuns_manager/assets/vendor/css/core.css') }}"
        class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('cuns_manager/assets/vendor/css/theme-default.css') }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('cuns_manager/assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet"
        href="{{ asset('cuns_manager/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('cuns_manager/assets/vendor/libs/apex-charts/apex-charts.css') }}" />

    <!-- Page-specific CSS -->
    @stack('styles')

    <!-- Helpers -->
    <script src="{{ asset('cuns_manager/assets/vendor/js/helpers.js') }}"></script>

    <!-- Config -->
    <script src="{{ asset('cuns_manager/assets/js/config.js') }}"></script>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">

            <!-- Sidebar -->
            @include('cuns_manager.layouts.sidebar')
            <!-- / Sidebar -->

            <!-- Layout container -->
            <div class="layout-page">

                <!-- Header -->
                @include('cuns_manager.layouts.header')
                <!-- / Header -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <!-- Page Title -->
                        @if (isset($pageTitle))
                            <div class="row">
                                <div class="col-12">
                                    <h4 class="fw-bold py-3 mb-4">
                                        <span class="text-muted fw-light">@yield('breadcrumb', 'Home') /</span>
                                        {{ $pageTitle }}
                                    </h4>
                                </div>
                            </div>
                        @endif

                        <!-- Flash Messages -->
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        <!-- Main Content -->
                        @yield('content')
                    </div>
                    <!-- / Content -->

                    <!-- Footer -->
                    @include('cuns_manager.layouts.footer')
                    <!-- / Footer -->

                    {{-- <div class="content-backdrop fade"></div> --}}
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    {{-- <!-- Buy Now Button (Optional) -->
    <div class="buy-now">
        <a href="https://themeselection.com/products/sneat-bootstrap-html-admin-template/" target="_blank"
            class="btn btn-danger btn-buy-now">Upgrade to Pro</a>
    </div> --}}

    <!-- Core JS -->
    <script src="{{ asset('cuns_manager/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('cuns_manager/assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('cuns_manager/assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('cuns_manager/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('cuns_manager/assets/vendor/js/menu.js') }}"></script>

    <!-- Vendors JS -->
    <script src="{{ asset('cuns_manager/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('cuns_manager/assets/js/main.js') }}"></script>

    <!-- Page-specific JS -->
    @stack('scripts')

    <!-- GitHub buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>
