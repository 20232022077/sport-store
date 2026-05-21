<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sport Store')</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    @yield('styles')
</head>
<body>

    @include('home.header')

    @yield('sliders')

    <div class="wrapper">

        @include('home.sidebar')

        <main class="main-content">
            @yield('content')
        </main>

    </div>

    @include('home.footer')

    <script src="{{ asset('assets/js/main.js') }}"></script>
    @yield('scripts')

</body>
</html>
