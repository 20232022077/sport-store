<!DOCTYPE html>
<html>
<head>
    <title>Sport Store</title>
</head>
<body>

<h1>🏀 Welcome to Sport Store</h1>
<p>First page is working successfully 🎉</p>

@if (Route::has('login'))
    <div>
        @auth
            <a href="{{ url('/dashboard') }}">Dashboard</a>
        @else
            <a href="{{ route('login') }}">Login</a>
            @if (Route::has('register'))
                <a href="{{ route('register') }}">Register</a>
            @endif
        @endauth
    </div>
@endif

</body>
</html>
