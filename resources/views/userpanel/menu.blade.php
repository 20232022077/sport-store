<div class="userpanel-sidebar">

    <div class="userpanel-user">
        <div class="userpanel-avatar">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
        <div>
            <div style="font-weight:700; color:#1a1a2e;">{{ Auth::user()->name }}</div>
            <div style="font-size:0.8rem; color:#888;">{{ Auth::user()->email }}</div>
        </div>
    </div>

    <nav class="userpanel-nav">
        <a href="{{ route('userpanel.index') }}" class="{{ request()->routeIs('userpanel.index') ? 'active' : '' }}">
            <i class="fa-solid fa-gauge"></i> Dashboard
        </a>
        <a href="{{ route('userpanel.profile') }}" class="{{ request()->routeIs('userpanel.profile') ? 'active' : '' }}">
            <i class="fa-solid fa-user"></i> My Profile
        </a>
        <a href="{{ route('userpanel.reviews') }}" class="{{ request()->routeIs('userpanel.reviews') ? 'active' : '' }}">
            <i class="fa-solid fa-star"></i> My Reviews
        </a>
        <a href="{{ route('userpanel.orders') }}" class="{{ request()->routeIs('userpanel.orders') ? 'active' : '' }}">
            <i class="fa-solid fa-bag-shopping"></i> My Orders
        </a>
        <a href="{{ route('userpanel.products') }}" class="{{ request()->routeIs('userpanel.products') ? 'active' : '' }}">
            <i class="fa-solid fa-box"></i> My Products
        </a>
        <a href="{{ route('logoutuser') }}" style="color:#e74c3c; margin-top:10px;">
            <i class="fa-solid fa-right-from-bracket"></i> Logout
        </a>
    </nav>

</div>
