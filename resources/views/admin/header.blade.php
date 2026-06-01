<header class="admin-navbar">

    <div class="navbar-left">
        <h5>@yield('page_title', 'Dashboard')</h5>
    </div>

    <div class="navbar-right">
        <div class="user-info">
            <div class="avatar">
                {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
            </div>
            <span>{{ auth()->user()->name ?? 'Admin' }}</span>
        </div>

        <a href="{{ route('admin.logoutadmin') }}" class="btn-logout">
            <i class="fa-solid fa-right-from-bracket"></i> Logout
        </a>
    </div>

</header>
