<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/styl.css') }}">
</head>
<body>

    <div class="loggin-box">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <h2>Login</h2>

            <div class="input-box">
                <x-form.input type="email" name="email" label="Email" icon="mail-outline" />
                <x-form.input type="password" name="password" label="Password" icon="lock-closed-outline" />
            </div>


            <div class="remember-forgot">
                <label for="remember_me">
                    <input type="checkbox" id="remember_me" name="remember">
                    {{ __('Remember me') }}
                </label>
            </div>

                <x-button.small type="submit">Login</x-button.small>

            <div class="register-link">
                <p>{{ __("Don't have an account?") }} <a href="{{ route('register') }}">{{ __("Register")}}</a></p>
            </div>
        </form>

        @if (session('status'))
            <div>{{ session('status') }}</div>
        @endif

        @if ($errors->any())
            <div class="errors">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
