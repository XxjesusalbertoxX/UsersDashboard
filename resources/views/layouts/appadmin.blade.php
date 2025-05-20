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
    <style>
        #sidebar {
  transition: margin-left 0.3s;
}

#main-content {
  /* si tienes un header, ajusta padding-top en consecuencia */
  padding-top: 20px;
  box-sizing: border-box;
}

/* opcional: ocultar scroll del body y usar solo el interno */
body {
  overflow: hidden;
}

    </style>
</head>
<body style="overflow-x: hidden; overflow-y: auto;">
    <div class="">
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
</html>