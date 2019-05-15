@extends('layout')
@section('content')
    <div class="col-sm-8">

        <h2>
            Listado de noticias
            <a href="{{route('noticia.create')}}" class="btn btn-primary pull-right"> Nuevo</a>
        </h2>
        <table class = "table table-hover table-striped">
            <thead>

                <tr>
                    <th width="20px">ID
                    <th>video noticia</th>
                    <th>Titulo Noticia</th>
                    <th>Contenido Noticia</th>
                    <th>fecha de publicación</th>
                    <th colspan="3">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @foreach($noticias as $tabla_noticia)
                    <tr>

                        <td>{{$tabla_noticia->id}}</td>
                        <td>{{$tabla_noticia->video}}</td>
                        <td>{{$tabla_noticia->titulo}}</td>
                        <td>{{$tabla_noticia->contenido}}</td>
                        <td>{{$tabla_noticia->created_at}}</td>
                        <td>
                            <a href="{{route('noticia.show',$tabla_noticia->id)}}">ver</a>
                        </td>
                        <td>editar</td>
                        <td>borrar</td>

                    </tr>
                    @endforeach
            </tbody>
        </table>
        {!! $noticias->render()!!}
    </div>
    <div class="col-sm-4">




    </div>
@endsection
