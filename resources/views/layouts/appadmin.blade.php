<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('Title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script></head>
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    @section('styles')
</head>
<body style="overflow-x: hidden; overflow-y: auto; background-color: #29333c; color: white">
  <!-- Sidebar -->
  <nav id="sidebar"
       style="position: fixed; width: 280px; height: 100vh; z-index: 1000;"
       class="bg-dark text-white">
    @include('layouts.sidebar')
  </nav>
  <header class="d-flex justify-content-center ">
    <h3>
        <b>
            @yield('titleheader')
        </b>
    </h3>
  </header>
  <!-- Contenido principal -->
  <div id="main-content"
       style="position: relative; z-index: 1; height: 100vh; overflow-y: auto; padding: 20px;">
    <main>
      @yield('content')
    </main>
  </div>
</div>


</body>
<script>
@if(session('success'))
    toastr.success("{{ session('success') }}");
@endif

@if(session('error'))
    toastr.error("{{ session('error') }}");
@endif

@if(session('info'))
    toastr.info("{{ session('info') }}");
@endif

@if(session('warning'))
    toastr.warning("{{ session('warning') }}");
@endif

toastr.options = {
    "closeButton": true,
    "progressBar": true,
    "positionClass": "toast-top-right", // Cambia a "toast-bottom-left", etc. si quieres
    "timeOut": "4000", // milisegundos
    "extendedTimeOut": "1000",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
};
</script>
</html>