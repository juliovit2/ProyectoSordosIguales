@extends('layoutGeneral')
@section('content')
    <div class="col-sm-8">
        <p></p>
        <h2>
            Listado de voluntarios
        </h2>
        <a href="{{route('voluntarios.create')}}" class="btn btn-primary pull-right active" >Agregar Voluntario &nbsp;<i class="fas fa-plus"></i></a>
        <table class = "table table-hover table-striped">
            <thead>

            <tr>
                <th width="20px">ID
                <th></th>
                <th>Nombre</th>
                <th>Telefono</th>
                <th>Rut</th>
                <th>Correo</th>
            </tr>
            </thead>
            <tbody>
            @foreach($voluntarios as $v)
                <tr>
                    <td>{{$v->id}}</td>
                    <td>{{$v->nombre}}</td>
                    <td>{{$v->telefono}}</td>
                    <td>{{$v->rut}}</td>
                    <td>{{$v->correo}}</td>
                    <td>{{$v->created_at}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>


@endsection
