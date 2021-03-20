@extends('adminlte::page')

@section('title', 'Coders Free')

@section('content_header')
    <h1>Lista de Roles</h1>
@stop

@section('content')

    @if (session('info'))

        <div class="alert alert-primary" role="alert">
            <strong>Éxito!</strong> {{ session('info') }}
        </div>

    @endif

    <div class="card">
        <div class="card-header">
                <a class="btn btn-primary" href="{{ route('admin.roles.create') }}">Crear un rol</a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($roles as $role)
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->name }}</td>
                            <td width="10px" >
                                <a href="{{ route('admin.roles.edit', $role) }}" class="btn btn-success">Editar</a>
                            </td>
                            <td width="10px" >
                                <form action="{{ route('admin.roles.destroy', $role) }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger" type="submit">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                            <tr>
                                <td colspan="4"> No hay ningun registro</td>
                            </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
