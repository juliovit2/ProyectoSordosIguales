@extends('layout')

@section('title', "Usuario {$user->id}")

@section('content')

    <div class="card">
        <h4 class="card-header">
            <div class="form-row">
                Detalles del Usuario #{{ $user->id }}
                <form action="{{ route('users.destroy', $user) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <a href="{{ route('users.edit', $user) }}" class="btn btn-link"><span class="oi oi-pencil"></span></a>
                    <button type="submit" class="btn btn-link"><span class="oi oi-trash"></span></button>
                </form>
            </div>
        </h4>

        <div class="card-body">

           <table class="table">
               <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">RUT</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">Curso</th>
                        <th scope="col">Asistencia</th>
                        <th scope="col">Dirección</th>
                        <th scope="col">Ciudad</th>


                    </tr>
               </thead>

               @php
               $idcurso = DB::table('tabla_usuario_cursos')->select('cursoid')->where('usuarioid', '=', $user->id)->first()->cursoid;
               $nomCurso = DB::table('tabla_cursos')->select('nombre')->where('id','=',$idcurso)->first()->nombre;
               $asistencia = DB::table('tabla_usuario_cursos')->select('asistencia')->where('usuarioid', '=', $user->id)->first()->asistencia;
               @endphp


               <tbody>
                    <tr>
                        <th>{{ $user->id }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->rut }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->telefono }}</td>
                        <td>{{ $nomCurso }}</td>
                        <td>{{ $asistencia }}</td>
                        <td>{{ $user->direccion }}</td>
                        <td>{{ $user->ciudad }}</td>

                    </tr>
               </tbody>
           </table>
            <a href=" {{route('users.index')}} " class="btn btn-link"> Regresar </a>

        </div>
    </div>

@endsection