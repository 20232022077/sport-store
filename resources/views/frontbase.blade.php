<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('meta')
    <title>@yield('title', 'Sport Store')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    {{-- Header --}}
    <header style="background:#1a1a2e; color:white; padding:15px 30px; display:flex; justify-content:space-between; align-items:center;">
        @section('header')
            <h1 style="margin:0; font-size:1.5rem;">Sport Store</h1>
            <nav>
                <a href="/" style="color:white; margin:0 10px; text-decoration:none;">Home</a>
                <a href="/home" style="color:white; margin:0 10px; text-decoration:none;">About</a>
                @auth
                    <a href="/dashboard" style="color:#f0a500; margin:0 10px; text-decoration:none;">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" style="color:#f0a500; margin:0 10px; text-decoration:none;">Login</a>
                    <a href="{{ route('register') }}" style="color:#f0a500; margin:0 10px; text-decoration:none;">Register</a>
                @endauth
            </nav>
        @show
    </header>

    {{-- Main wrapper --}}
    <div style="display:flex; min-height:calc(100vh - 120px);">

        {{-- Sidebar --}}
        @hasSection('sidebar')
        <aside style="width:220px; background:#f5f5f5; padding:20px; border-right:1px solid #ddd;">
            @yield('sidebar')
        </aside>
        @endif

        {{-- Main Content --}}
        <main style="flex:1; padding:30px;">
            @yield('content')
        </main>

    </div>

    {{-- Footer --}}
    <footer style="background:#1a1a2e; color:#aaa; text-align:center; padding:15px;">
        &copy; {{ date('Y') }} Sport Store. All rights reserved.
    </footer>

</body>
</html>
