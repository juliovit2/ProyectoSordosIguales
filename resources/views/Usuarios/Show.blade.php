@extends('layout')

@section('title', "Usuario {$user->name}")

@section('content')
    <?php
    $id = Auth::user()->id;
    $rol = DB::table('users')->where('id', $id)->value('rol');
    if($rol == 'Alumno' && $id != $user->id){?>
        <meta http-equiv='refresh' content='0; URL=/usuarios/{{ $id }}/'>
    <?php }else{ ?>
    <br>


        <div class="card-body">
            <div class="form-row">
                <h1 class="pb-1">Detalles del Usuario {{ $user->name }}</h1>

                <a href="{{ route('users.edit', $user) }}" class="btn btn-link"><span class="oi oi-pencil"></span></a>
                @if($rol == 'Administrador')
                    <form action="{{ route('users.destroy', $user) }}" method="POST">

                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="btn btn-link"><span class="oi oi-trash"></span></button>
                @endif
                </form>
            </div>
            <h4 class="text-primary">
                <div class="form-row">
                    Informacion Personal
                </div>
            </h4>

           <table class="table">
               <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">RUT</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">Dirección</th>
                        <th scope="col">Ciudad</th>
                    </tr>
               </thead>

               @php
                   try {
                        $idcurso = DB::table('tabla_usuario_cursos')->select('cursoid')->where('usuarioid', '=', $user->id)->first()->cursoid;
                        $nomCurso = DB::table('tabla_cursos')->select('nombre')->where('id','=',$idcurso)->first()->nombre;
                        $asistencia = DB::table('tabla_usuario_cursos')->select('asistencia')->where('usuarioid', '=', $user->id)->first()->asistencia;
                        $notas =  DB::table('tabla_usuario_notas')->where('usuarioid', '=', $user->id)->avg('nota')*0.1;
                        $notas = number_format($notas, 1);
                    } catch (Exception $e) {
                        $idcurso = null;
                    }
               @endphp

               <tbody>
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td scope="row">{{ $user->name }}</td>
                        <td scope="row">{{ $user->rut }}</td>
                        <td scope="row">{{ $user->email }}</td>
                        <td scope="row">{{ $user->telefono }}</td>
                        <td scope="row">{{ $user->direccion }}</td>
                        <td scope="row">{{ $user->ciudad }}</td>
                    </tr>
               </tbody>
           </table>

            <h4 class="text-primary">
                <div class="form-row">
                    Historico de Cursos del Estudiante
                </div>
            </h4>

            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Nombre del Curso</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Asistencia</th>
                    <th scope="col">Promedio</th>
                </tr>
                </thead>

                @php
                    try {
                         $idcurso = DB::table('tabla_usuario_cursos')->select('cursoid')->where('usuarioid', '=', $user->id)->get('cursoid');
                         //dd($idcurso[0]->cursoid);
                         $i = 0;
                         $max = 0;
                         foreach ($idcurso as $id){
                             $nomCurso = DB::table('tabla_cursos')->select('nombre')->where('id' ,'=', $id->cursoid)->first()->nombre;
                             $asistencia = DB::table('tabla_usuario_cursos')->select('asistencia')->where('usuarioid', '=', $user->id)->where('cursoid' ,'=', $id->cursoid)->first()->asistencia;
                             $notas =  DB::table('tabla_usuario_notas')->where('usuarioid', '=', $user->id)->where('cursoid' ,'=', $id->cursoid)->avg('nota')*0.1;
                             $estado = DB::table('tabla_usuario_cursos')->select('estado')->where('usuarioid', '=', $user->id)->where('cursoid' ,'=', $id->cursoid)->first()->estado;
                             $Historicos[$i]['nomCurso'] = $nomCurso;
                             $Historicos[$i]['asistencia'] = $asistencia;
                             $Historicos[$i]['notas'] = $notas;
                             $Historicos[$i]['estado'] = $estado;
                             $i = $i + 1;
                             $max = $i;
                         }

                     } catch (Exception $e) {
                         $idcurso = null;
                         $max = 1;
                         $Historicos[0]['nomCurso'] = "No existen cursos anteriores";
                         $Historicos[0]['asistencia'] = "-";
                         $Historicos[0]['notas'] = "-";
                         $Historicos[0]['estado'] = "-";
                         //$Historicos = [$nomCurso, $asistencia, $notas, $estado];
                     }
                @endphp

                <tbody>
                @for($i = 0; $i<$max; $i = $i + 1)
                    <tr>
                        <td scope="row">{{ $Historicos[$i]['nomCurso'] }}</td>
                        <td scope="row">{{ $Historicos[$i]['estado'] }}</td>
                        <td scope="row">{{ $Historicos[$i]['asistencia'] }}</td>
                        <td scope="row">{{ $Historicos[$i]['notas'] }}</td>
                    </tr>
                @endfor
                </tbody>
            </table>
            <a href=" {{route('users.index')}} " class="btn btn-primary"> Regresar </a>

        </div>
    <?php } ?>

@endsection