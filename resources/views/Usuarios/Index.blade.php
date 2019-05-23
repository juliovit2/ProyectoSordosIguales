@extends('layout')

@section('title', 'Usuarios')

@section('content')
    <div class="d-flex justify-content-between align-items-end mb-3">
        <h1 class="pb-1">{{ $title }}</h1>
        <p>
            <a href="{{ route('users.create') }}" class="btn btn-primary">Nuevo usuario</a>
        </p>
    </div>

    @if ($users->isNotEmpty())
        @php $contadorEstudiantes=0 @endphp

        <table class="table table-striped table-sm">
            <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">RUT</th>
                <th scope="col">Correo</th>
                <th scope="col">Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                @if ($user->rol == 'Alumno')
                    @php $contadorEstudiantes=$contadorEstudiantes+1 @endphp
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->rut }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <form action="{{ route('users.destroy', $user) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <a href="{{ route('users.show', $user) }}" class="btn btn-link"><span class="oi oi-eye"></span></a>
                                <a href="{{ route('users.edit', $user) }}" class="btn btn-link"><span class="oi oi-pencil"></span></a>
                                <button type="submit" class="btn btn-link"><span class="oi oi-trash"></span></button>
                            </form>
                        </td>
                    </tr>
                @endif
            @endforeach

            @if ($contadorEstudiantes == 0)
                <p>No hay estudiantes registrados.</p>
            @endif
            </tbody>
        </table>
    @else
        <p>No hay estudiantes registrados.</p>
    @endif
@endsection

@section('sidebar')
    @parent
@endsection


