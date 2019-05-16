@extends('layout')
@section('content')
    <div class="col-sm-8">

        <h2>
            Listado de noticias
            <a href="{{route('noticia.create')}}" class="btn btn-primary pull-right active"> <i class="glyphicon glyphicon-plus" ></i></a>
        </h2>
        <table class = "table table-hover table-striped">
            <thead>

            <tr>
                <th width="20px">ID
                <th>Imagen noticia</th>
                <th>Titulo Noticia</th>
                <th>fecha de publicación</th>
                <th colspan="3">&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            @foreach($noticias as $tabla_noticia)
                <tr>

                    <td>{{$tabla_noticia->id}}</td>
                    <td>
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img width="400px" height="400px" src="/IMG_7185.jpg" class="d-block w-100" alt="...">
                                </div>
                                @foreach($imagenes_noticia as $tabla_imagenes_noticia)
                                    @if($tabla_imagenes_noticia->noticiaid == $tabla_noticia->id)
                                        <div class="carousel-item">
                                            <img width="400px" height="400px" src="{{$tabla_imagenes_noticia->imagen}}" class="d-block w-100" alt="...">
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </td>
                    <td>{{$tabla_noticia->titulo}}</td>
                    <td>{{$tabla_noticia->created_at}}</td>
                    <td>
                        <a href="{{route('noticia.show',$tabla_noticia->id)}}"
                           class="btn btn-sm btn-primary active">
                            <i class="glyphicon glyphicon-eye-open" ></i>

                        </a>
                    </td>
                    <td>
                        <a href="{{route('noticia.show',$tabla_noticia->id)}}"
                           class="btn btn-sm btn-primary active">
                            <i class="glyphicon glyphicon-pencil" ></i>

                        </a>
                    </td>

                    <td>
                        <a href="{{route('noticia.show',$tabla_noticia->id)}}"
                           class="btn btn-sm btn-danger active">
                            <i class="glyphicon glyphicon-trash" ></i>

                        </a>
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
        {!! $noticias->render()!!}
    </div>
    <div class="col-sm-4">




    </div>
@endsection
