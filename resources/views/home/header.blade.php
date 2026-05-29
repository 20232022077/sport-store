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
            <a href="{{ url('/dashboard') }}"><i class="fa-solid fa-gauge"></i> Dashboard</a>
        @else
            <a href="{{ route('login') }}"><i class="fa-solid fa-right-to-bracket"></i> Login</a>
            <a href="{{ route('register') }}"><i class="fa-solid fa-user-plus"></i> Register</a>
        @endauth
    </div>
</header>
