<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('Title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script></head>
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    @section('styles')
</head>
<body>
    <header>
        @yield('header')
    </header>

    <div class="d-flex">
        <div style="display:none; position: fixed; width: 280px; min-height: 100vh; z-index: 5;" class="bg-dark text-white">
            @include('layouts.sidebar')
        </div>

        <div style="position: fixed; z-index: 4;">
            <main class="flex-grow-1">
                @yield('content')
            </main>
        </div>
    </div>

</body>
</html>