<header class="header">
    <div class="logo">⚽ Sport Store</div>

    <nav>
        <a href="{{ url('/') }}">Home</a>
        <a href="{{ url('/home') }}">About</a>
        <a href="#">Products</a>
        <a href="#">Offers</a>
    </nav>

    <div class="auth-links">
        @auth
            <a href="{{ url('/dashboard') }}">Dashboard</a>
        @else
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
        @endauth
    </div>
</header>
