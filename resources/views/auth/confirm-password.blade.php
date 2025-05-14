<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba</title>
</head>
<body>
    <h1>Confirm Password</h1>
    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required autofocus>
        </div>
        <button type="submit">Confirm Password</button>
    </form>

    @if (session('status'))
        <div>{{ session('status') }}</div>
    @endif
    
</body>
</html>