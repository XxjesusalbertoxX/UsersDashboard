@extends('layouts.appadmin')
@section('Title', 'Agregar Usuario')

@section('titleheader')
    Agregar Usuario
@endsection

@section('content')
<div class="container py-4">
    <div class="card">
        <div class="card-header">
            <h4>Agregar Usuario</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('users.store') }}" method="POST">
                @csrf

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" 
                               id="name" name="name" value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="lastName" class="form-label">Apellido</label>
                        <input type="text" class="form-control @error('lastName') is-invalid @enderror" 
                               id="lastName" name="lastName" value="{{ old('lastName') }}">
                        @error('lastName')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="genre" class="form-label">Género</label>
                        <select name="genre" id="genre" 
                                class="form-select @error('genre') is-invalid @enderror">
                            <option value="">Seleccione...</option>
                            <option value="male" {{ old('genre') === 'male' ? 'selected' : '' }}>Hombre</option>
                            <option value="female" {{ old('genre') === 'female' ? 'selected' : '' }}>Mujer</option>
                        </select>
                        @error('genre')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="age" class="form-label">Edad</label>
                        <input type="number" class="form-control @error('age') is-invalid @enderror" 
                               id="age" name="age" value="{{ old('age') }}">
                        @error('age')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Correo electrónico</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" 
                           id="email" name="email" value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Campos de contraseña y confirmación -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="text" class="form-control @error('password') is-invalid @enderror fake-password"
                        id="password" name="password" value="{{ old('password') }}">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                        <input type="text" class="form-control fake-password"
                               id="password_confirmation" name="password_confirmation" value="{{ old('password_confirmation') }}">                    </div>
                </div>
                <!-- Fin campos contraseña -->

                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="is_admin" name="is_admin" value="1"
                           {{ old('is_admin') ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_admin">Administrador</label>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-success">Agregar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
document.querySelectorAll('.fake-password').forEach(function(input) {
    // Mostrar asteriscos en pantalla pero guardar el valor real
    let realValue = input.value;
    function mask() {
        input.value = '*'.repeat(realValue.length);
    }
    // Al escribir, actualizar el valor real y mostrar asteriscos
    input.addEventListener('input', function(e) {
        // Detectar si el usuario borró caracteres
        if (input.value.length < realValue.length) {
            realValue = realValue.substring(0, input.value.length);
        } else {
            // Agregar solo el nuevo caracter
            realValue += input.value[input.value.length - 1] || '';
        }
        mask();
    });
    // Al enfocar, mostrar asteriscos
    input.addEventListener('focus', mask);
    // Al desenfocar, mostrar asteriscos
    input.addEventListener('blur', mask);
    // Al enviar el formulario, poner el valor real
    input.form && input.form.addEventListener('submit', function() {
        input.value = realValue;
    });
    // Inicial
    mask();
});
</script>
@endsection
