<nav class="navbar navbar-expand-lg navbar-light py-lg-0 px-lg-5 wow fadeIn user-navbar" data-wow-delay="0.1s">
    <a href="{{ route('user.dashboard') }}" class="navbar-brand ms-4 ms-lg-0">
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
                    <li><a class="dropdown-item" href="{{ route('user.view.send.money') }}">Send
                            Now</a></li>
                    <li><a class="dropdown-item" href="{{ route('user.send.money.history') }}">Send Money History</a>
                    </li>
                </ul>
            </div>

            <div class="dropdown">
                <a href="" class="nav-item nav-link" id="dropdownMenuLink" data-bs-toggle="dropdown"
                    aria-expanded="false">Deposit Money</a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li>
                        <a class="dropdown-item" href="{{ route('user.view.deposit') }}">Deposit Money</a>
                    </li>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('user.deposit.history') }}">Deposit History</a>
                    </li>
                    </li>
                </ul>
            </div>
            <div class="dropdown">
                <a href="" class="nav-item nav-link" id="dropdownMenuLink" data-bs-toggle="dropdown"
                    aria-expanded="false">Withdraw Money</a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li>
                        <a class="dropdown-item" href="{{ route('user.withdraw.view') }}">Withdraw Now</a>
                    </li>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('user.withdraw.history') }}">Withdraw History</a>
                    </li>
                    </li>
                </ul>
            </div>

            <div class="dropdown">
                <a href="" class="nav-item nav-link" id="dropdownMenuLink" data-bs-toggle="dropdown"
                    aria-expanded="false">Money Request</a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li>
                        <a class="dropdown-item" href="{{ route('user.view.money.request') }}">Request Now</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('user.pending.money.request') }}">Pending money
                            request</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('user.money.request.history') }}">Money
                            request history</a>
                    </li>
                </ul>
            </div>

            <a href="{{ route('user.transaction') }}"
                class="nav-item nav-link {{ request()->routeIs('user.transaction') ? 'active' : '' }}">Transaction</a>
               

            <div class="dropdown">
                <a href="" class="nav-item nav-link" id="dropdownMenuLink" data-bs-toggle="dropdown"
                    aria-expanded="false">Dps</a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li>
                         <a href="{{ route('user.view.dps.plan') }}" class="dropdown-item">Dps</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('user.view.applied.dps.plan') }}">My dps</a>
                    </li>
                </ul>
            </div>

            <a href="{{ route('user.referral') }}"
                class="nav-item nav-link {{ request()->routeIs('user.transaction') ? 'active' : '' }}">Referral</a>
        </div>
    </div>
</nav>
