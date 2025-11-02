<!-- Menu -->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-dark" style="background-color: #1e293b !important;">
    <div class="app-brand demo">
        <a href="{{ route('cuns_manager.dashboard') }}" class="app-brand-link">
            {{-- <span class="app-brand-logo demo">
                <span class="material-icons-round" style="font-size: 2rem; color: #3b82f6;">construction</span>
            </span> --}}
            <span class="app-brand-text demo menu-text fw-bold ms-2 text-white">Icon Construction</span>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">

        <!-- 📊 Dashboard -->
        <li class="menu-item {{ request()->routeIs('cuns_manager.dashboard') ? 'active' : '' }}">
            <a href="{{ route('cuns_manager.dashboard') }}" class="menu-link text-white">
                <span class="material-icons-round menu-icon">dashboard</span>
                <div class="menu-text">Dashboard</div>
            </a>
        </li>

        <!-- 🏗️ PROJECT MANAGEMENT -->
        <li class="menu-item {{ request()->routeIs('cuns_manager.projects.*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle text-white">
                <span class="material-icons-round menu-icon">business</span>
                <div class="menu-text">Project Management</div>
                <span class="material-icons-round menu-arrow">chevron_right</span>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->routeIs('cuns_manager.projects.create') ? 'active' : '' }}">
                    <a href="{{ route('cuns_manager.projects.create') }}" class="menu-link text-white">
                        <span class="material-icons-round me-2">add_circle</span>
                        <div>New Project</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('cuns_manager.projects.index') ? 'active' : '' }}">
                    <a href="{{ route('cuns_manager.projects.index') }}" class="menu-link text-white">
                        <span class="material-icons-round me-2">list_alt</span>
                        <div>All Projects</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('cuns_manager.projects.show') ? 'active' : '' }}">
                    <a href="{{ route('cuns_manager.projects.show', ['id' => 1]) }}" class="menu-link text-white">
                        <span class="material-icons-round me-2">visibility</span>
                        <div>View Project</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('cuns_manager.projects.edit') ? 'active' : '' }}">
                    <a href="{{ route('cuns_manager.projects.edit', ['id' => 1]) }}" class="menu-link text-white">
                        <span class="material-icons-round me-2">edit</span>
                        <div>Edit Project</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('cuns_manager.projects.timeline') ? 'active' : '' }}">
                    <a href="{{ route('cuns_manager.projects.timeline', ['id' => 1]) }}" class="menu-link text-white">
                        <span class="material-icons-round me-2">schedule</span>
                        <div>Project Timeline</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- 👷 STAFF MANAGEMENT -->
        <li class="menu-item {{ request()->routeIs('cuns_manager.staff.*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle text-white">
                <span class="material-icons-round menu-icon">groups</span>
                <div class="menu-text">Staff Management</div>
                <span class="material-icons-round menu-arrow">chevron_right</span>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->routeIs('cuns_manager.staff.employees') ? 'active' : '' }}">
                    <a href="{{ route('cuns_manager.staff.employees') }}" class="menu-link text-white">
                        <span class="material-icons-round me-2">people</span>
                        <div>All Employees</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('cuns_manager.staff.attendance') ? 'active' : '' }}">
                    <a href="{{ route('cuns_manager.staff.attendance') }}" class="menu-link text-white">
                        <span class="material-icons-round me-2">event_available</span>
                        <div>Attendance</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('cuns_manager.staff.shifts') ? 'active' : '' }}">
                    <a href="{{ route('cuns_manager.staff.shifts') }}" class="menu-link text-white">
                        <span class="material-icons-round me-2">schedule</span>
                        <div>Shift Management</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('cuns_manager.staff.leaves') ? 'active' : '' }}">
                    <a href="{{ route('cuns_manager.staff.leaves') }}" class="menu-link text-white">
                        <span class="material-icons-round me-2">beach_access</span>
                        <div>Leave Management</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('cuns_manager.staff.performance') ? 'active' : '' }}">
                    <a href="{{ route('cuns_manager.staff.performance') }}" class="menu-link text-white">
                        <span class="material-icons-round me-2">trending_up</span>
                        <div>Performance</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- 📦 MATERIAL MANAGEMENT -->
        <li class="menu-item {{ request()->routeIs('cuns_manager.materials.*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle text-white">
                <span class="material-icons-round menu-icon">inventory</span>
                <div class="menu-text">Material Management</div>
                <span class="material-icons-round menu-arrow">chevron_right</span>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->routeIs('cuns_manager.materials.inventory') ? 'active' : '' }}">
                    <a href="{{ route('cuns_manager.materials.inventory') }}" class="menu-link text-white">
                        <span class="material-icons-round me-2">inventory_2</span>
                        <div>Inventory</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('cuns_manager.materials.orders') ? 'active' : '' }}">
                    <a href="{{ route('cuns_manager.materials.orders') }}" class="menu-link text-white">
                        <span class="material-icons-round me-2">shopping_cart</span>
                        <div>Material Orders</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('cuns_manager.materials.suppliers') ? 'active' : '' }}">
                    <a href="{{ route('cuns_manager.materials.suppliers') }}" class="menu-link text-white">
                        <span class="material-icons-round me-2">store</span>
                        <div>Suppliers</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('cuns_manager.materials.usage') ? 'active' : '' }}">
                    <a href="{{ route('cuns_manager.materials.usage') }}" class="menu-link text-white">
                        <span class="material-icons-round me-2">analytics</span>
                        <div>Material Usage</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- 💰 FINANCIAL MANAGEMENT -->
        <li class="menu-item {{ request()->routeIs('cuns_manager.finance.*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle text-white">
                <span class="material-icons-round menu-icon">payments</span>
                <div class="menu-text">Financial Management</div>
                <span class="material-icons-round menu-arrow">chevron_right</span>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->routeIs('cuns_manager.finance.budget') ? 'active' : '' }}">
                    <a href="{{ route('cuns_manager.finance.budget') }}" class="menu-link text-white">
                        <span class="material-icons-round me-2">account_balance_wallet</span>
                        <div>Project Budget</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('cuns_manager.finance.expenses') ? 'active' : '' }}">
                    <a href="{{ route('cuns_manager.finance.expenses') }}" class="menu-link text-white">
                        <span class="material-icons-round me-2">receipt_long</span>
                        <div>Expenses</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('cuns_manager.finance.payroll') ? 'active' : '' }}">
                    <a href="{{ route('cuns_manager.finance.payroll') }}" class="menu-link text-white">
                        <span class="material-icons-round me-2">credit_card</span>
                        <div>Payroll</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('cuns_manager.finance.reports') ? 'active' : '' }}">
                    <a href="{{ route('cuns_manager.finance.reports') }}" class="menu-link text-white">
                        <span class="material-icons-round me-2">bar_chart</span>
                        <div>Financial Reports</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- ✅ TASK MANAGEMENT -->
        <li class="menu-item {{ request()->routeIs('cuns_manager.tasks.*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle text-white">
                <span class="material-icons-round menu-icon">task</span>
                <div class="menu-text">Task Management</div>
                <span class="material-icons-round menu-arrow">chevron_right</span>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->routeIs('cuns_manager.tasks.index') ? 'active' : '' }}">
                    <a href="{{ route('cuns_manager.tasks.index') }}" class="menu-link text-white">
                        <span class="material-icons-round me-2">checklist</span>
                        <div>All Tasks</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('cuns_manager.tasks.create') ? 'active' : '' }}">
                    <a href="{{ route('cuns_manager.tasks.create') }}" class="menu-link text-white">
                        <span class="material-icons-round me-2">person_add</span>
                        <div>Assign Tasks</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('cuns_manager.tasks.progress') ? 'active' : '' }}">
                    <a href="{{ route('cuns_manager.tasks.progress') }}" class="menu-link text-white">
                        <span class="material-icons-round me-2">show_chart</span>
                        <div>Work Progress</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- 📊 REPORTS -->
        <li class="menu-item {{ request()->routeIs('cuns_manager.reports.*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle text-white">
                <span class="material-icons-round menu-icon">assessment</span>
                <div class="menu-text">Reports</div>
                <span class="material-icons-round menu-arrow">chevron_right</span>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->routeIs('cuns_manager.reports.daily') ? 'active' : '' }}">
                    <a href="{{ route('cuns_manager.reports.daily') }}" class="menu-link text-white">
                        <span class="material-icons-round me-2">today</span>
                        <div>Daily Reports</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('cuns_manager.reports.attendance') ? 'active' : '' }}">
                    <a href="{{ route('cuns_manager.reports.attendance') }}" class="menu-link text-white">
                        <span class="material-icons-round me-2">how_to_reg</span>
                        <div>Attendance Reports</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('cuns_manager.reports.financial') ? 'active' : '' }}">
                    <a href="{{ route('cuns_manager.reports.financial') }}" class="menu-link text-white">
                        <span class="material-icons-round me-2">savings</span>
                        <div>Financial Reports</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('cuns_manager.reports.performance') ? 'active' : '' }}">
                    <a href="{{ route('cuns_manager.reports.performance') }}" class="menu-link text-white">
                        <span class="material-icons-round me-2">trending_up</span>
                        <div>Performance Reports</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- 🎯 QUALITY & SAFETY -->
        <li class="menu-item {{ request()->routeIs('cuns_manager.quality.*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle text-white">
                <span class="material-icons-round menu-icon">verified</span>
                <div class="menu-text">Quality & Safety</div>
                <span class="material-icons-round menu-arrow">chevron_right</span>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->routeIs('cuns_manager.quality.inspections') ? 'active' : '' }}">
                    <a href="{{ route('cuns_manager.quality.inspections') }}" class="menu-link text-white">
                        <span class="material-icons-round me-2">fact_check</span>
                        <div>Quality Inspections</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('cuns_manager.quality.safety-reports') ? 'active' : '' }}">
                    <a href="{{ route('cuns_manager.quality.safety-reports') }}" class="menu-link text-white">
                        <span class="material-icons-round me-2">security</span>
                        <div>Safety Reports</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- 📢 COMMUNICATION -->
        <li class="menu-item {{ request()->routeIs('cuns_manager.communication.*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle text-white">
                <span class="material-icons-round menu-icon">chat</span>
                <div class="menu-text">Communication</div>
                <span class="material-icons-round menu-arrow">chevron_right</span>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->routeIs('cuns_manager.communication.index') ? 'active' : '' }}">
                    <a href="{{ route('cuns_manager.communication.index') }}" class="menu-link text-white">
                        <span class="material-icons-round me-2">forum</span>
                        <div>Communication</div>
                    </a>
                </li>
                <li
                    class="menu-item {{ request()->routeIs('cuns_manager.communication.announcement') ? 'active' : '' }}">
                    <a href="{{ route('cuns_manager.communication.announcement') }}" class="menu-link text-white">
                        <span class="material-icons-round me-2">campaign</span>
                        <div>Announcements</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- 🔔 NOTIFICATIONS -->
        <li class="menu-item {{ request()->routeIs('cuns_manager.notifications.*') ? 'active' : '' }}">
            <a href="{{ route('cuns_manager.notifications.index') }}" class="menu-link text-white">
                <span class="material-icons-round menu-icon">notifications</span>
                <div class="menu-text">Notifications</div>
            </a>
        </li>

    </ul>
</aside>

<style>
    /* Google Icons Font Include */
    @import url('https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200');

    .material-icons-round {
        font-family: 'Material Symbols Rounded';
        font-weight: normal;
        font-style: normal;
        font-size: 20px;
        line-height: 1;
        letter-spacing: normal;
        text-transform: none;
        display: inline-block;
        white-space: nowrap;
        word-wrap: normal;
        direction: ltr;
        -webkit-font-feature-settings: 'liga';
        -webkit-font-smoothing: antialiased;
    }

    /* Custom Dark Theme for Sidebar */
    .layout-menu {
        width: 280px;
        background: linear-gradient(180deg, #1e293b 0%, #0f172a 100%) !important;
        border-right: 1px solid #334155;
    }

    .menu-link.text-white {
        color: #e2e8f0 !important;
        transition: all 0.3s ease;
        border-radius: 8px;
        margin: 2px 8px;
        padding: 12px 16px;
    }

    .menu-link.text-white:hover {
        background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%) !important;
        color: #ffffff !important;
        transform: translateX(4px);
        box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
    }

    .menu-item.active>.menu-link {
        background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%) !important;
        color: #ffffff !important;
        box-shadow: 0 4px 12px rgba(59, 130, 246, 0.4);
    }

    .menu-sub {
        background: #1e293b !important;
        border-left: 3px solid #3b82f6;
        margin-left: 12px;
    }

    .menu-sub .menu-link {
        color: #cbd5e1 !important;
        padding: 10px 16px;
        margin: 1px 8px;
        border-radius: 6px;
    }

    .menu-sub .menu-link:hover {
        background: #334155 !important;
        color: #ffffff !important;
    }

    .app-brand-text {
        color: #ffffff !important;
        font-size: 1.25rem;
    }

    .menu-icon {
        margin-right: 12px;
        font-size: 22px;
        opacity: 0.9;
    }

    /* Hide the automatically generated arrow */
    .menu-link.menu-toggle::after {
        display: none !important;
    }

    /* Use our custom arrow instead */
    .menu-arrow {
        font-size: 18px;
        transition: transform 0.3s ease;
        margin-left: auto;
    }

    .menu-item.open .menu-arrow {
        transform: rotate(90deg);
    }

    .menu-text {
        font-weight: 500;
        font-size: 14px;
    }

    .app-brand-link {
        padding: 20px 16px;
        border-bottom: 1px solid #334155;
        margin-bottom: 8px;
    }

    .app-brand-logo {
        background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
        border-radius: 12px;
        padding: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
    }

    /* Smooth transitions */
    .menu-sub {
        transition: all 0.3s ease;
    }

    .menu-item {
        transition: all 0.3s ease;
    }
</style>
