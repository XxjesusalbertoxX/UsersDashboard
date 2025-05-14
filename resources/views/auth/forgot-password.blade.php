<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>¿Olvidaste tu contraseña?</title>
</head>
<body>
    <h1>¿Olvidaste tu contraseña?</h1>
    <p>Ingresa tu dirección de correo electrónico y te enviaremos un enlace para restablecer tu contraseña.</p>

    @if (session('status'))
        <div>{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div>
            <label for="email">Correo electrónico:</label>
            <input type="email" id="email" name="email" required autofocus>
        </div>
        <button type="submit">Enviar enlace de restablecimiento</button>
    </form>
</body>
</html>