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

        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit" class="btn-logout">Logout</button>
        </form>
    </div>

</header>
