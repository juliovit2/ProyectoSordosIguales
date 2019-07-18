@extends('layout')
@section('title', "Notas")
@section('content')
    <?php
    $id = Auth::user()->id;
    $rol = DB::table('users')->where('id', $id)->value('rol');
    if($rol == 'Alumno'){?>
    <meta http-equiv='refresh' content='0; URL=/usuarios/{{ $id }}/'>
    <?php }else { ?>
    <br>
    <?php
    $id = Auth::user()->id;
    $rol = DB::table('users')->where('id', $id)->value('rol');
    if($rol == 'Alumno'){?>
    <meta http-equiv='refresh' content='0; URL=/usuarios/{{ $id }}/'>
    <?php }else { }?>
    <div class="d-flex justify-content-between align-items-end mb-3">
        <h1 class="pb-1">{{ $title }}</h1>
        <p>
            <a href="IngresarNotas" class="btn btn-primary">Añadir Nota</a>
        </p>
    </div>
    <body>
    @if ($users->isNotEmpty())
        @php $contadorEstudiantes=0 @endphp
    <table class="table table-striped table-sm">
        <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">RUT</th>
            <th scope="col">Nombre</th>
            <th scope="col">Curso Actual</th>
            <th scope="col">Promedio</th>
            <th scope="col">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            @if ($user->rol == 'Alumno')
                @php $contadorEstudiantes=$contadorEstudiantes+1 @endphp
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->rut }}</td>
                    <td>{{ $user->name }}</td>
                    @php
                        try {
                            $idcurso = DB::table('tabla_usuario_cursos')->select('cursoid')->where('usuarioid', '=', $user->id)->where('estado', '=', 'Cursando')->first()->cursoid;
                            $nomCurso = DB::table('tabla_cursos')->select('nombre')->where('id','=',$idcurso)->first()->nombre;
                            $notas = DB::table('tabla_usuario_notas')->where('usuarioid', '=', $user->id)->where('cursoid', '=', $idcurso)->avg('nota')*0.1;
                            $notas = number_format($notas, 1);

                        } catch (Exception $e) {
                            $idcurso = null;
                            $nomCurso = "No aplica";
                            $notas = 'No aplica';
                        }
                    @endphp
                    <td>{{ $nomCurso }}</td>
                    @if($notas != '0')
                        <td>{{ $notas }} </td>
                    @else
                        <td>Sin notas</td>
                    @endif
                    <td>
                        <a href="{{ route('IndiceNotas', $user) }}" class="btn btn-link"><span class="oi oi-eye"></span></a>
                    </td>
                </tr>
            @endif
        @endforeach
        @if ($contadorEstudiantes == 0)
            <p>No hay estudiantes registrados.</p>
        @endif

        </tbody>
    </table>
        <a href="/PortalAlumnos" class="btn btn-primary"> Regresar </a>
    @else
        <p>No hay estudiantes registrados.</p>
    @endif
    </body>
    <?php } ?>
@endsection
