@extends('layoutGeneral')
@section('content')
    <div class="col-sm-8">
        <p></p>
        <h2>
            Listado de noticias
        </h2>
        <a href="{{route('noticia.create')}}" class="btn btn-primary pull-right active" >Agregar Noticia &nbsp;<i class="fas fa-plus"></i></a>
        <table class = "table table-hover table-striped">
            <thead>

            <tr>
                <th width="20px">ID
                <th></th>
                <th>TÍtulo</th>
                <th>Fecha de publicación</th>
                <th colspan="3">&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            @foreach($noticias->reverse() as $tabla_noticia)
                <tr>

                    <td>{{$tabla_noticia->id}}</td>
                    <td>
                        <div id="carousel" class="carousel slide" data-ride="carousel" data-interval="2000">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img width="100px" height="100px" src="{{ asset('storage/logo_fundacion.png')}}" class="d-block w-100" alt="...">
                                </div>
                                @foreach($imagenes_noticia as $tabla_imagenes_noticia)
                                    @if($tabla_imagenes_noticia->noticiaid == $tabla_noticia->id)
                                        <div class="carousel-item">
                                            <img width="100px" height="100px" src="{{ asset('storage/'.$tabla_imagenes_noticia->imagen)}}" class="d-block w-100" alt="...">
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
                           class="btn btn-sm btn-primary active" title="Ver Noticia">
                            <i class="fas fa-eye"></i>

                        </a>
                    </td>
                    <td>
                        <a href="{{route('noticia.show',$tabla_noticia->id)}}"
                           class="btn btn-sm btn-primary active" title="Editar Noticia">
                            <i class="fas fa-pencil-alt"></i>

                        </a>
                    </td>

                    <td>
                        <a href="/noticia/delete/{{$tabla_noticia->id}}"
                           class="btn btn-sm btn-danger active"  title="Eliminar Noticia">
                            <i class="fas fa-trash-alt"></i>

                        </a>
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
        {!! $noticias->render()!!}
    </div>
    <div class="col-sm-4">

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="/js/web.js" type="text/javascript" charset="utf-8" async defer></script>
    </div>
@endsection
