<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mi Aplicación')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="bg-[#1F1F1F] text-[#E5E5E5]">

    {{-- Navbar global --}}
    <nav class="bg-[#2C2C2C] p-4 flex justify-between items-center">
        <div class="text-white font-bold text-xl">
            Mi App
        </div>
        <ul class="flex gap-4">
            @include('layouts.navigation')
            <li><a href="{{ route('home') }}" class="hover:text-blue-400">Inicio</a></li>
            <li><a href="{{ route('users.index') }}" class="hover:text-blue-400">Usuarios</a></li>
            <li><a href="{{ route('register') }}" class="hover:text-blue-400">Registrar</a></li>
        </ul>
    </nav>

    {{-- Contenido dinámico --}}
    <main class="p-6">
        @yield('content')
    </main>

</body>
</html>
