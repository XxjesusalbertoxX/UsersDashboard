@extends('layouts.appadmin')
@section('Title', 'Editar Usuario')

@section('titleheader')
    Editar Usuario
@endsection

@section('content')
<div class="container py-4">
    <div class="card">
        <div class="card-header">
            <h4>Editar Usuario</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('users.update', $user->id_user) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                               id="name" name="name" value="{{ old('name', $user->name) }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="lastName" class="form-label">Apellido</label>
                        <input type="text" class="form-control @error('lastName') is-invalid @enderror"
                               id="lastName" name="lastName" value="{{ old('lastName', $user->lastName) }}" required>
                        @error('lastName')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="genre" class="form-label">Género</label>
                        <select name="genre" id="genre" class="form-select @error('genre') is-invalid @enderror" required>
                            <option value="">Seleccione...</option>
                            <option value="male" {{ old('genre', $user->genre) === 'male' ? 'selected' : '' }}>Hombre</option>
                            <option value="female" {{ old('genre', $user->genre) === 'female' ? 'selected' : '' }}>Mujer</option>
                        </select>
                        @error('genre')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="age" class="form-label">Edad</label>
                        <input type="number" class="form-control @error('age') is-invalid @enderror"
                               id="age" name="age" value="{{ old('age', $user->age) }}" required>
                        @error('age')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Correo electrónico</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                           id="email" name="email" value="{{ old('email', $user->email) }}" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Opcional: campos de contraseña solo si quieres permitir cambiarla -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="password" class="form-label">Contraseña (dejar en blanco para no cambiar)</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                               id="password" name="password">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                        <input type="password" class="form-control"
                               id="password_confirmation" name="password_confirmation">
                    </div>
                </div>
                <!-- Fin campos contraseña -->

                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="is_admin" name="is_admin" value="1"
                           {{ old('is_admin', $user->is_admin) ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_admin">Administrador</label>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('users') }}" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection