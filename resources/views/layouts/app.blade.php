<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <title>{{ config('app.name') }} | prueba de pagina</title>
    <meta name="description" content="Breve descripción del sitio para buscadores.">
    <meta name="keywords" content="laravel, docker, proyecto, palabras clave">
    <meta name="author" content="Tu nombre o nombre del equipo">
    <meta name="robots" content="index, follow">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<header>
  @include('layouts.navigation')
</header>
<body class="overflow-x-hidden">

    <main>
      @yield('content')
    </main>
    
</body>
</html>
