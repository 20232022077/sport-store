<header class="header">
    <div class="logo"><i class="fa-solid fa-store"></i> {{ $setting?->title ?? 'Sport Store' }}</div>

    <nav>
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('about') }}">About</a>
        <a href="{{ route('references') }}">References</a>
        <a href="{{ route('contact') }}">Contact</a>
    </nav>

    <div class="auth-links">
        @auth
            <div class="user-menu">
                <span class="user-greeting">
                    <i class="fa-solid fa-circle-user"></i> {{ Auth::user()->name }}
                </span>
                <div class="user-dropdown">
                    <a href="{{ route('userpanel.index') }}"><i class="fa-solid fa-gauge"></i> My Account</a>
                    <a href="{{ route('userpanel.profile') }}"><i class="fa-solid fa-user"></i> My Profile</a>
                    <a href="{{ route('userpanel.reviews') }}"><i class="fa-solid fa-star"></i> My Reviews</a>
                    <a href="{{ route('userpanel.orders') }}"><i class="fa-solid fa-bag-shopping"></i> My Orders</a>
                    <a href="{{ route('logoutuser') }}" style="color:#e74c3c;"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
                </div>
            </div>
        @else
            <a href="{{ route('login') }}"><i class="fa-solid fa-right-to-bracket"></i> Login</a>
            <a href="{{ route('register') }}"><i class="fa-solid fa-user-plus"></i> Register</a>
        @endauth
    </div>
</header>
