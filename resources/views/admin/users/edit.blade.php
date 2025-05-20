@extends('layouts.appadmin')
@section('Title', 'Editar Usuario')

@section('content')
<div class="container py-4">
    <div class="card">
        <div class="card-header">
            <h4>Editar Usuario</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('users.update', $user->id_user) }}" method="POST">
                @csrf
                @method('PUT') {{-- importante para método PUT en actualización --}}

                <div class="mb-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                </div>

                <div class="mb-3">
                    <label for="lastName" class="form-label">Apellido</label>
                    <input type="text" class="form-control" id="lastName" name="lastName" value="{{ old('lastName', $user->lastName) }}" required>
                </div>

                <div class="mb-3">
                    <label for="genre" class="form-label">Género</label>
                    <select name="genre" id="genre" class="form-select" required>
                        <option value="male" {{ $user->genre === 'male' ? 'selected' : '' }}>Hombre</option>
                        <option value="female" {{ $user->genre === 'female' ? 'selected' : '' }}>Mujer</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="age" class="form-label">Edad</label>
                    <input type="number" class="form-control" id="age" name="age" value="{{ old('age', $user->age) }}" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Correo electrónico</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                </div>

                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="is_admin" name="is_admin" value="1" {{ $user->is_admin ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_admin">Administrador</label>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
