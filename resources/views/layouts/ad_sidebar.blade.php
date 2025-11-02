<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!-- Sidebar Brand -->
    <div class="sidebar-brand">
        <a href="{{ url('/cuns_admin/dashboard') }}" class="brand-link">
            <img src="{{ asset('cuns_admin/dist/assets/img/user2-160x160.jpg') }}" alt="Admin Logo"
                class="brand-image rounded-circle opacity-75 shadow" />
            <span class="brand-text fw-light">Admin Panel</span>
        </a>
    </div>

    <!-- Sidebar Wrapper -->
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">

                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="{{ url('/cuns_admin/dashboard') }}"
                        class="nav-link {{ request()->is('cuns_admin/dashboard*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-speedometer"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <!-- Projects -->
                <li class="nav-item">
                    <a href="#" class="nav-link {{ request()->is('cuns_admin/projects*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-kanban-fill"></i>
                        <p>
                            Projects
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('/cuns_admin/projects') }}" class="nav-link">
                                <i class="nav-icon bi bi-list-ul"></i>
                                <p>All Projects</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/cuns_admin/projects/create') }}" class="nav-link">
                                <i class="nav-icon bi bi-plus-circle"></i>
                                <p>Create Project</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/cuns_admin/projects/milestones') }}" class="nav-link">
                                <i class="nav-icon bi bi-flag-fill"></i>
                                <p>Project Milestones</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/cuns_admin/projects/reports') }}" class="nav-link">
                                <i class="nav-icon bi bi-file-earmark-text-fill"></i>
                                <p>Project Reports</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/cuns_admin/projects/show') }}" class="nav-link">
                                <i class="nav-icon bi bi-eye-fill"></i>
                                <p>Project Details</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Employees -->
                <li class="nav-item">
                    <a href="#" class="nav-link {{ request()->is('cuns_admin/employees*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-people-fill"></i>
                        <p>
                            Employees
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('/cuns_admin/employees') }}" class="nav-link">
                                <i class="nav-icon bi bi-person-badge-fill"></i>
                                <p>All Employees</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/cuns_admin/employees/attendance') }}" class="nav-link">
                                <i class="nav-icon bi bi-clock-fill"></i>
                                <p>Attendance</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/cuns_admin/employees/create') }}" class="nav-link">
                                <i class="nav-icon bi bi-person-plus-fill"></i>
                                <p>Create / Assign (Employee)</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/cuns_admin/employees/payroll') }}" class="nav-link">
                                <i class="nav-icon bi bi-cash-stack"></i>
                                <p>Payroll</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/cuns_admin/employees/performance') }}" class="nav-link">
                                <i class="nav-icon bi bi-bar-chart-line-fill"></i>
                                <p>Performance</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Inventory -->
                <li class="nav-item">
                    <a href="#" class="nav-link {{ request()->is('cuns_admin/inventory*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-box-seam"></i>
                        <p>
                            Inventory
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('/cuns_admin/inventory') }}" class="nav-link">
                                <i class="nav-icon bi bi-card-list"></i>
                                <p>Inventory List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/cuns_admin/inventory/create') }}" class="nav-link">
                                <i class="nav-icon bi bi-plus-square"></i>
                                <p>Add Material</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/cuns_admin/inventory/inventory_orders') }}" class="nav-link">
                                <i class="nav-icon bi bi-receipt-cutoff"></i>
                                <p>Purchase Orders</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/cuns_admin/inventory/inventory_suppliers') }}" class="nav-link">
                                <i class="nav-icon bi bi-truck"></i>
                                <p>Suppliers</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/cuns_admin/inventory/inventory_alerts') }}" class="nav-link">
                                <i class="nav-icon bi bi-exclamation-triangle-fill"></i>
                                <p>Stock Alerts</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Finance (note folder name: 'finance' in your tree) -->
                <li class="nav-item">
                    <a href="#" class="nav-link {{ request()->is('cuns_admin/finance*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-wallet2"></i>
                        <p>
                            Finance
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('/cuns_admin/finance') }}" class="nav-link">
                                <i class="nav-icon bi bi-list-check"></i>
                                <p>Transactions</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/cuns_admin/finance/budget') }}" class="nav-link">
                                <i class="nav-icon bi bi-pie-chart-fill"></i>
                                <p>Budget</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/cuns_admin/finance/invoices') }}" class="nav-link">
                                <i class="nav-icon bi bi-receipt"></i>
                                <p>Invoices</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/cuns_admin/finance/payments') }}" class="nav-link">
                                <i class="nav-icon bi bi-credit-card-2-back-fill"></i>
                                <p>Payments</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/cuns_admin/finance/reports') }}" class="nav-link">
                                <i class="nav-icon bi bi-file-earmark-bar-graph-fill"></i>
                                <p>Finance Reports</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Equipment -->
                <li class="nav-item">
                    <a href="#" class="nav-link {{ request()->is('cuns_admin/equipment*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-tools"></i>
                        <p>
                            Equipment
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('/cuns_admin/equipment') }}" class="nav-link">
                                <i class="nav-icon bi bi-list-ol"></i>
                                <p>All Equipment</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/cuns_admin/equipment/create') }}" class="nav-link">
                                <i class="nav-icon bi bi-plus-circle-dotted"></i>
                                <p>Add Equipment</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/cuns_admin/equipment/maintenance') }}" class="nav-link">
                                <i class="nav-icon bi bi-tools"></i>
                                <p>Maintenance</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/cuns_admin/equipment/logs') }}" class="nav-link">
                                <i class="nav-icon bi bi-journal-text"></i>
                                <p>Usage Logs</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Clients -->
                <li class="nav-item">
                    <a href="#" class="nav-link {{ request()->is('cuns_admin/clients*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-person-lines-fill"></i>
                        <p>
                            Clients
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('/cuns_admin/clients') }}" class="nav-link">
                                <i class="nav-icon bi bi-people-fill"></i>
                                <p>All Clients</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/cuns_admin/clients/create') }}" class="nav-link">
                                <i class="nav-icon bi bi-person-plus-fill"></i>
                                <p>Create Client</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/cuns_admin/clients/contracts') }}" class="nav-link">
                                <i class="nav-icon bi bi-file-earmark-text"></i>
                                <p>Contracts</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/cuns_admin/clients/feedback') }}" class="nav-link">
                                <i class="nav-icon bi bi-chat-dots-fill"></i>
                                <p>Feedback</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Documents -->
                <li class="nav-header">DOCUMENTATION</li>
                <li class="nav-item">
                    <a href="{{ url('/cuns_admin/documents/installation_guide') }}" class="nav-link">
                        <i class="nav-icon bi bi-download"></i>
                        <p>Installation</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/cuns_admin/documents/faq') }}" class="nav-link">
                        <i class="nav-icon bi bi-question-circle-fill"></i>
                        <p>FAQ</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/cuns_admin/documents/license') }}" class="nav-link">
                        <i class="nav-icon bi bi-patch-check-fill"></i>
                        <p>License</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/cuns_admin/documents/upload') }}" class="nav-link">
                        <i class="nav-icon bi bi-cloud-upload-fill"></i>
                        <p>Upload Document</p>
                    </a>
                </li>

                <!-- Reports / Analytics -->

                <li class="nav-header">Analytics</li>
                <li class="nav-item">
                    <a href="#" class="nav-link {{ request()->is('cuns_admin/report*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-graph-up-arrow"></i>
                        <p>
                            Reports & Analytics
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('/cuns_admin/report/projects') }}" class="nav-link">
                                <i class="nav-icon bi bi-kanban-fill"></i>
                                <p>Project Reports</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/cuns_admin/report/finance') }}" class="nav-link">
                                <i class="nav-icon bi bi-wallet2"></i>
                                <p>Finance Reports</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/cuns_admin/report/employees') }}" class="nav-link">
                                <i class="nav-icon bi bi-people"></i>
                                <p>Employee Reports</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Settings -->
                <li class="nav-header">Settings</li>
                <li class="nav-item">
                    <a href="{{ url('/cuns_admin/settings/company') }}" class="nav-link">
                        <i class="nav-icon bi bi-building"></i>
                        <p>Company Profile</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/cuns_admin/settings/roles') }}" class="nav-link">
                        <i class="nav-icon bi bi-person-badge"></i>
                        <p>Roles & Permissions</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/cuns_admin/settings/backup') }}" class="nav-link">
                        <i class="nav-icon bi bi-hdd-rack-fill"></i>
                        <p>Backup & Restore</p>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
</aside>
