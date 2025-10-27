<!-- Sidebar Start -->
<div class="sidebar pe-4 pb-3 bg-light">
    <nav class="navbar navbar-light">
        <!-- Brand / Logo -->
        <a href="{{ route('dashboard.index') }}" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary">Icon cunstructions</h3>
        </a>

        <!-- User Info -->
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="{{ asset('manager/img/user.jpg') }}" alt="User"
                    style="width: 40px; height: 40px;">
                <div class="bg-success rounded-circle border-2 border-white position-absolute end-0 bottom-0 p-1">
                </div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">Manager</h6>
                {{-- <span>Admin</span> --}}
            </div>
        </div>

        <!-- Navigation Menu -->
        <div class="navbar-nav w-100">
            <a href="{{ route('dashboard.index') }}" class="nav-item nav-link active"><i
                    class="fa fa-tachometer-alt me-2"></i>Dashboard</a>

            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                        class="fa fa-laptop me-2"></i>Elements</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="#" class="dropdown-item">Buttons</a>
                    <a href="#" class="dropdown-item">Typography</a>
                    <a href="#" class="dropdown-item">Other Elements</a>
                </div>
            </div>

            <a href="#" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Widgets</a>
            <a href="#" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Forms</a>
            <a href="#" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Tables</a>
            <a href="#" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Charts</a>

            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                        class="far fa-file-alt me-2"></i>Pages</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="#" class="dropdown-item">Sign In</a>
                    <a href="#" class="dropdown-item">Sign Up</a>
                </div>
            </div>
        </div>
    </nav>
</div>
<!-- Sidebar End -->



{{-- <div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a href="{{ url('cuns_manager.dashboard.index') }}" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa fa-user-tie me-2"></i>Manager</h3>
        </a>
        <div class="navbar-nav w-100">
            <a href="{{ url('cuns_manager.dashboard.index') }}" class="nav-item nav-link active"><i
                    class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            <a href="{{ url('cuns_manager.projects') }}" class="nav-item nav-link"><i
                    class="fa fa-tasks me-2"></i>Projects</a>
            <a href="{{ url('cuns_manager.team') }}" class="nav-item nav-link"><i class="fa fa-users me-2"></i>Team</a>
            <a href="{{ url('cuns_manager.reports') }}" class="nav-item nav-link"><i
                    class="fa fa-file-alt me-2"></i>Reports</a>
            <a href="{{ url('cuns_manager.messages') }}" class="nav-item nav-link"><i
                    class="fa fa-envelope me-2"></i>Messages</a>
        </div>
    </nav>
</div> --}}
