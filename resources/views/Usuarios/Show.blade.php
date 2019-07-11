@extends('layout')

@section('title', "Usuario {$user->name}")

@section('content')
    <?php
    $id = Auth::user()->id;
    $rol = DB::table('users')->where('id', $id)->value('rol');
    if($rol == 'Alumno' && $id != $user->id){?>
        <meta http-equiv='refresh' content='0; URL=/usuarios/{{ $id }}/'>
    <?php }else{ ?>
    <div class="card">
        <h4 class="card-header">
            <div class="form-row">
                Detalles del Usuario {{ $user->name }}
                <form action="{{ route('users.destroy', $user) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <a href="{{ route('users.edit', $user) }}" class="btn btn-link"><span class="oi oi-pencil"></span></a>
                    <button type="submit" class="btn btn-link"><span class="oi oi-trash"></span></button>
                </form>
            </div>
        </h4>

        <div class="card-body">

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
                    } catch (Exception $e) {
                        $idcurso = null;
                    }
               @endphp

               <tbody>
                    <tr>
                        <th>{{ $user->id }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->rut }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->telefono }}</td>
                        <td>{{ $user->direccion }}</td>
                        <td>{{ $user->ciudad }}</td>
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
                             $asistencia = DB::table('tabla_usuario_cursos')->select('asistencia')->where('usuarioid', '=', $user->id)->first()->asistencia;
                             $notas =  DB::table('tabla_usuario_notas')->where('usuarioid', '=', $user->id)->avg('nota')*0.1;
                             $estado = DB::table('tabla_usuario_cursos')->select('estado')->where('usuarioid', '=', $user->id)->first()->estado;
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
                        <td>{{ $Historicos[$i]['nomCurso'] }}</td>
                        <td>{{ $Historicos[$i]['estado'] }}</td>
                        <td>{{ $Historicos[$i]['asistencia'] }}</td>
                        <td>{{ $Historicos[$i]['notas'] }}</td>
                    </tr>
                @endfor
                </tbody>
            </table>
            <a href=" {{route('users.index')}} " class="btn btn-link"> Regresar </a>

        </div>
    </div>
    <?php } ?>

@endsection