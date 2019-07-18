@extends('layout')
@section('title', "Notas")
@section('content')
    <?php
    $id = Auth::user()->id;
    $rol = DB::table('users')->where('id', $id)->value('rol');
    if($rol == 'Alumno'){?>
    <meta http-equiv='refresh' content='0; URL=/usuarios/{{ $id }}/'>
    <?php }else { ?>
    <html>
    <br>
    <div class="d-flex justify-content-between align-items-end mb-3">
        <h1 class="pb-1">Detalle Notas</h1>
    </div>
    <body>
        @php $contadorNotas=0 @endphp
            <table class="table table-striped table-sm">
                <thead class="thead-dark">
                <tr>
                    <!--<th scope="col">Tipo de evaluación</th>-->
                    <th scope="col">Nota</th>
                    <th scope="col">Curso</th>
                    <th scope="col">Acciones</th>
                </tr>
                </thead>
                @foreach ($usuarios as $usuario)
                    @if($usuario->rut == $user->rut)
                        @php $contadorNotas=$contadorNotas+1 @endphp
                        <tr>
                            <td>{{ $usuario->nota * 0.1}}</td>
                            <td>{{ $usuario->nombre}}</td>
                            <td>
                                <a href = 'edit/{{ $usuario->id }}'><span class="oi oi-pencil"></span></a>
                                <a href = 'delete/{{ $usuario->id }}' onclick="return confirm('¿Está seguro de eliminar esta nota?')"><span class="oi oi-trash"></span></a>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </table>
            @if ($contadorNotas == 0)
                <p>No hay notas registradas.</p>
            @endif
        <a href="/ModificarNotas" class="btn btn-primary"> Regresar </a>
    </body>
    </html>
    <?php } ?>
@endsection
