@extends('layout')

@section('title', 'Cursos')

@section('content')
    <br>
    <div class="d-flex justify-content-between align-items-end mb-3">
        <h1 class="pb-1">{{ $title }}</h1>
        <p>
            <a href="{{ route('cursos.create') }}" class="btn btn-primary">Nuevo Curso</a>
        </p>
    </div>

    @if ($cursos->isNotEmpty())
        @php $contadorCursos=0 @endphp

        <table class="table table-striped table-sm">
            <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Profesor Encargado</th>
                <th scope="col">Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($cursos as $curso)
                @php $contadorCursos=$contadorCursos+1 @endphp
                <tr>
                    <th scope="row">{{ $curso->id }}</th>
                    <td>{{ $curso->nombre }}</td>
                    @php
                    $profesor = DB::table('tabla_personas')->where('id', $curso->profesorid)->value('nombre');
                    @endphp
                    <td>{{ $profesor }}</td>
                    <td>
                        <form action="{{ route('cursos.destroy', $curso) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <a href = 'añadirAlumno/{{ $curso->id}}'class="btn btn-link"><span class="oi oi-person"></span></a>
                            <a href = 'visualizarCursos/{{ $curso->id}}'class="btn btn-link"><span class="oi oi-eye"></span></a>
                            <a href="{{ route('cursos.edit', $curso) }}" class="btn btn-link"><span class="oi oi-pencil"></span></a>
                            <button type="submit" class="btn btn-link" onclick="return confirm('¿Está seguro de eliminar el curso de los registros?')"><span class="oi oi-trash"></span></button>
                        </form>
                    </td>
                </tr>

            @endforeach

            @if ($contadorCursos == 0)
                <p>No hay cursos registrados.</p>
            @endif
            </tbody>
        </table>
        <a href="/PortalAlumnos" class="btn btn-link"> Regresar </a>
    @else
        <p>No hay cursos registrados de momento.</p>
    @endif
@endsection

@section('sidebar')
    @parent
@endsection
