<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel - Sport Store')</title>
    <link rel="stylesheet" href="{{ asset('assets/admin/dist/css/admin.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    @yield('styles')
    @yield('head')
</head>
<body>

<div class="admin-wrapper">

    @include('admin.sidebar')

    <div class="admin-main">

        @include('admin.header')

        <div class="admin-content">
            @yield('content')
        </div>

        @include('admin.footer')

    </div>

</div>

<script src="{{ asset('assets/admin/dist/js/admin.js') }}"></script>
@yield('scripts')
@yield('footer')

</body>
</html>
