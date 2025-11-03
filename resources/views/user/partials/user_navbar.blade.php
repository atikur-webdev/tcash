<nav class="navbar navbar-expand-lg navbar-light py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
    <a href="{{ route('home') }}" class="navbar-brand ms-4 ms-lg-0">
        <h1 class="display-5 text-primary m-0">Finanza</h1>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="{{ route('user.dashboard') }}"
                class="nav-item nav-link {{ request()->routeIs('user.dashboard') ? 'active' : '' }}">Dashboard</a>
            <div class="dropdown">
                <a href="" class="nav-item nav-link" id="dropdownMenuLink" data-bs-toggle="dropdown"
                    aria-expanded="false">Send Money</a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li><a class="dropdown-item" href="#">Send Now</a></li>
                    <li><a class="dropdown-item" href="#">Send Money History</a></li>
                </ul>
            </div>

            <a href="" class="nav-item nav-link">Deposit Money</a>
            <a href="{{ route('user.transaction') }}"
                class="nav-item nav-link {{ request()->routeIs('user.transaction') ? 'active' : '' }}">Transaction</a>
        </div>
    </div>
</nav>
