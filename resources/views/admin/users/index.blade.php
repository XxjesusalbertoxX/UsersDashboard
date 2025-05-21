@extends('layouts.appadmin')
@section('Title', 'Usuarios')

@section('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
@endsection

@section('titleheader')
    Lista de Usuarios
@endsection

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('users.add.create') }}" class="btn btn-success">Agregar nuevo</a>
    </div>

    <div class="table-responsive">
        <table id="usersTable" class="display table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th class="px-3">Nombre</th>
                    <th class="px-3">Correo</th>
                    <th class="px-3">Edad</th>
                    <th class="px-3">Género</th>
                    <th class="px-3">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td class="px-3">{{ $user->name }} {{ $user->lastName }}</td>
                    <td class="px-3">{{ $user->email }}</td>
                    <td class="px-3">{{ $user->age }}</td>
                    <td class="px-3">
                        {{ $user->genre === 'male' ? 'Hombre' : 'Mujer' }}
                    </td>
                    <td class="px-3">
                        <a href="{{ route('users.edit', $user) }}" class="btn btn-warning btn-sm me-1">Editar</a>
                        <form action="{{ route('users.destroy', $user) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar usuario?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $users->links('pagination::bootstrap-5') }}    
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#usersTable').DataTable({
            language: {
                url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json"
            }
        });
    });
</script>
@endsection
