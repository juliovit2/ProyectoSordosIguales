@extends('layout')

@section('title', 'Profesores')

@section('content')
    <?php
    $id = Auth::user()->id;
    $rol = DB::table('users')->where('id', $id)->value('rol');
    if($rol == 'Alumno'){?>
    <meta http-equiv='refresh' content='0; URL=/usuarios/{{ $id }}/'>
    <?php }else{ ?>
    <br>
    <div class="d-flex justify-content-between align-items-end mb-3">
        <h1 class="pb-1">{{ $title }}</h1>
        <p>
            <a href="{{ route('profesores.create') }}" class="btn btn-primary">Nuevo Profesor</a>
        </p>
    </div>

    @if ($profesores->isNotEmpty())
        @php $contador=0 @endphp

        <table class="table table-striped table-sm">
            <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">RUT</th>
                <th scope="col">Correo</th>
                <th scope="col">N° teléfono</th>
                <th scope="col">Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($profesores as $profesor)
                @if ($profesor->rol == 'Profesor')
                    @php $contador=$contador+1 @endphp
                    <tr>
                        <th scope="row">{{ $profesor->id }}</th>
                        <td>{{ $profesor->nombre }}</td>
                        <td>{{ $profesor->rut }}</td>
                        <td>{{ $profesor->correo }}</td>
                        <td>{{ $profesor->telefono }}</td>
                        <td>
                            <form action="{{ route('profesores.destroy', $profesor) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <a href="{{ route('profesores.show', $profesor) }}" class="btn btn-link"><span class="oi oi-eye"></span></a>
                                <a href="{{ route('profesores.edit', $profesor) }}" class="btn btn-link"><span class="oi oi-pencil"></span></a>
                                <button type="submit" class="btn btn-link" onclick="return confirm('¿Está seguro de eliminar al profesor de los registros?')"><span class="oi oi-trash"></span></button>
                            </form>
                        </td>
                    </tr>
                @endif
            @endforeach

            @if ($contador == 0)
                <p>No hay profesores registrados.</p>
            @endif
            </tbody>
        </table>
        <a href="/PortalAlumnos" class="btn btn-primary "> Regresar </a>
    @else
        <p>No hay profesores registrados.</p>
    @endif
    <?php } ?>
@endsection

@section('sidebar')
    @parent
@endsection


