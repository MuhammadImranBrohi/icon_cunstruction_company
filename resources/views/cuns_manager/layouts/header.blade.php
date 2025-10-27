<head>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>

<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top px-4 py-2">

    <!-- Sidebar Toggler for Mobile -->
    <a href="#" class="navbar-brand d-flex d-lg-none me-3">
        <h2 class="text-primary mb-0"><i class="fa-solid fa-user-cog"></i></h2>
    </a>
    <button class="btn btn-light d-lg-none me-2" type="button" id="sidebarToggle">
        <i class="fa-solid fa-bars"></i>
    </button>

    <!-- Navbar Collapse -->
    <div class="collapse navbar-collapse" id="navbarNav">
        <!-- Left Side (Search Bar) -->
        <ul class="navbar-nav me-auto">
            <li class="nav-item d-none d-lg-block">
                <form class="d-flex">
                    <input class="form-control form-control-sm me-2" type="search" placeholder="Search...">
                    <button class="btn btn-sm btn-primary" type="submit"><i
                            class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </li>
        </ul>

        <!-- Right Side -->
        <ul class="navbar-nav ms-auto align-items-center">

            <!-- Notifications -->
            <li class="nav-item dropdown me-3">
                <a class="nav-link position-relative" href="#" id="notificationsDropdown" role="button"
                    data-bs-toggle="dropdown">
                    <i class="fa-solid fa-bell fa-lg"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        3
                    </span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end shadow-sm mt-2">
                    <li><a class="dropdown-item" href="#">New message received</a></li>
                    <li><a class="dropdown-item" href="#">Server rebooted</a></li>
                    <li><a class="dropdown-item" href="#">Task completed</a></li>
                </ul>
            </li>

            <!-- User Profile -->
            <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown">
                    <img class="rounded-circle me-2" src="{{ asset('manager/img/user.jpg') }}" alt="User"
                        style="width: 40px; height: 40px;">
                    <span class="d-none d-lg-inline-flex fw-semibold">Manager</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end shadow-sm mt-2">
                    <li><a class="dropdown-item" href="#">My Profile</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item text-danger" href="#">Log Out</a></li>
                </ul>
            </li>

        </ul>
    </div>

</nav>
<!-- Navbar End -->

<!-- Sidebar Toggle Script -->
<script>
    const sidebarToggle = document.getElementById('sidebarToggle');
    const sidebar = document.querySelector('.sidebar');

    sidebarToggle?.addEventListener('click', () => {
        sidebar?.classList.toggle('d-none'); // toggle sidebar visibility
    });
</script>
