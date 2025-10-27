<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>cuns_Manager Panel</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- CSS Libraries -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('manager/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('manager/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('manager/css/style.css') }}" rel="stylesheet">

    <style>
        /* Smooth fade-out for spinner */
        #spinner {
            transition: opacity 0.5s ease, visibility 0.5s ease;
        }

        #spinner.show {
            opacity: 1;
            visibility: visible;
        }

        #spinner:not(.show) {
            opacity: 0;
            visibility: hidden;
        }
    </style>
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Sidebar Start -->
        @include('cuns_manager.layouts.sidebar')
        <!-- Sidebar End -->

        <!-- Content Start -->
        <div class="content">

            <!-- Header Start -->
            @include('cuns_manager.layouts.header')
            <!-- Header End -->

            <!-- Page Content -->
            @yield('content')
            <!-- Page Content End -->

            <!-- Footer Start -->
            @include('cuns_manager.layouts.footer')
            <!-- Footer End -->
        </div>

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('manager/lib/chart/chart.min.js') }}"></script>
    <script src="{{ asset('manager/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('manager/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('manager/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('manager/lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('manager/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('manager/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <script src="{{ asset('manager/js/main.js') }}"></script>

    <!-- Spinner Script -->
    <script>
        window.addEventListener('load', function() {
            const spinner = document.getElementById('spinner');
            if (spinner) spinner.classList.remove('show');
        });
    </script>
</body>

</html>
