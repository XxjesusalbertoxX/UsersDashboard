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
<div class="container d-flex justify-content-center">
    <table id="usersTable" class="display">
        <thead>
            <tr>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Rol</th>
            <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->role }}</td>
            <td>
                <a href="{{ route('users.edit', $user) }}" class="btn btn-warning btn-sm">Editar</a>
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

</div>
    

    <script>
    $(document).ready(function() {
    $('#usersTable').DataTable();
    });
    </script>


@endsection