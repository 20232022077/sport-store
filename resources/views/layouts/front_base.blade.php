<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', $setting?->title ?? 'Sport Store')</title>
    <meta name="keywords" content="{{ $setting?->keywords }}">
    <meta name="description" content="{{ $setting?->description }}">
    @if($setting?->icon)
        <link rel="icon" href="{{ \Illuminate\Support\Facades\Storage::url($setting->icon) }}">
    @endif
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
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
