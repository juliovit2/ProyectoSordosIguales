@extends('layout')

@section('title', "Profesor {$profesor->nombre}")

@section('content')
    <?php
    $id = Auth::user()->id;
    $rol = DB::table('users')->where('id', $id)->value('rol');
    if($rol == 'Alumno'){?>
        <meta http-equiv='refresh' content='0; URL=/usuarios/{{ $id }}/'>
    <?php }else{ ?>
    <br>


        <div class="card-body">
            <div class="form-row">
                <h1 class="pb-1">Detalles del Profesor {{ $profesor->nombre }}</h1>

                <a href="{{ route('profesores.edit', $profesor) }}" class="btn btn-link"><span class="oi oi-pencil"></span></a>
                <form action="{{ route('profesores.destroy', $profesor) }}" method="POST">

                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit" class="btn btn-link"><span class="oi oi-trash"></span></button>

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
                    </tr>
               </thead>

               <tbody>
                    <tr>
                        <th scope="row">{{ $profesor->id }}</th>
                        <td scope="row">{{ $profesor->nombre }}</td>
                        <td scope="row">{{ $profesor->rut }}</td>
                        <td scope="row">{{ $profesor->correo }}</td>
                        <td scope="row">{{ $profesor->telefono }}</td>
                    </tr>
               </tbody>
           </table>

            <a href=" {{route('profesores.index')}} " class="btn btn-primary"> Regresar </a>

        </div>
    <?php } ?>
@endsection