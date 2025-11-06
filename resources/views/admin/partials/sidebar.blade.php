    <!-- Sidebar Start -->
    <aside class="left-sidebar">
        <!-- Sidebar scroll-->
        <div>
            <div class="brand-logo d-flex align-items-center justify-content-between">
                <a href="./index.html" class="text-nowrap logo-img">
                    <img src="{{ asset('assets/admin/images/dark-logo.svg') }}" width="180" alt="" />
                </a>
                <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                    <i class="ti ti-x fs-8"></i>
                </div>
            </div>
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                <ul id="sidebarnav">
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('admin.dashboard') }}">
                            <span>
                                <i class="fa fa-home"></i>
                            </span>
                            <span class="hide-menu">Dashboard</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('admin.section.list') }}" aria-expanded="false">
                            <span>
                                <i class="fas fa-layer-group"></i>
                            </span>
                            <span class="hide-menu">Sections</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('admin.user.list') }}" aria-expanded="false">
                            <span>
                                <i class="fas fa-user"></i>
                            </span>
                            <span class="hide-menu">Users</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="#" aria-expanded="false" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <span>
                                <i class="fas fa-user"></i>
                            </span>
                            <span class="hide-menu">Deposits</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('admin.all.deposit') }}">All Deposits</a></li>
                            <li><a class="dropdown-item" href="{{ route('admin.deposit.pending') }}">Pending Deposits</a></li>
                            <li><a class="dropdown-item" href="{{ route('admin.deposit.success') }}">Successful Depostis</a></li>
                            <li><a class="dropdown-item" href="{{ route('admin.show.reject.deposit') }}">Reject Depostis</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="#" aria-expanded="false" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <span>
                                <i class="fas fa-user"></i>
                            </span>
                            <span class="hide-menu">Withdraws</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('admin.allWithdraw') }}">All Withdraws</a></li>
                            <li><a class="dropdown-item" href="{{ route('admin.pending.withdraw') }}">Pending Withdraws</a></li>
                            <li><a class="dropdown-item" href="{{ route('admin.success.withdraw') }}">Success Withdraws</a></li>
                            <li><a class="dropdown-item" href="{{ route('admin.reject.withdraw') }}">Rejected Withdraws</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
