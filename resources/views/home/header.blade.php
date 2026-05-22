<header class="header">
    <div class="logo"><i class="fa-solid fa-store"></i> Sport Store</div>

    <nav>
        <a href="{{ url('/') }}">Home</a>
        <a href="{{ url('/home') }}">About</a>
        <a href="#">Products</a>
        <a href="#">Offers</a>
    </nav>

    <div class="auth-links">
        @auth
            <a href="{{ url('/dashboard') }}"><i class="fa-solid fa-gauge"></i> Dashboard</a>
        @else
            <a href="{{ route('login') }}"><i class="fa-solid fa-right-to-bracket"></i> Login</a>
            <a href="{{ route('register') }}"><i class="fa-solid fa-user-plus"></i> Register</a>
        @endauth
    </div>
</header>
