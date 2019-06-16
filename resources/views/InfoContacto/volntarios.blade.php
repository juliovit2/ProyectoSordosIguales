@extends('layoutGeneral')
@section('content')
    <div class="col-sm-8">
        <p></p>
        <h2>
            Listado de voluntarios
        </h2>
        <a href="{{route('noticias.create')}}" class="btn btn-primary pull-right active" >Agregar Noticia &nbsp;<i class="fas fa-plus"></i></a>
        <table class = "table table-hover table-striped">
            <thead>

            <tr>
                <th width="20px">ID
                <th></th>
                <th>Nombre</th>
                <th>Telefono</th>
                <th>Rut</th>
                <th>Correo</th>
                <th>Certificado</th>
                <th>Rol</th>
            </tr>
            </thead>
            <tbody>
            @foreach($noticias as $tabla_noticia)
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
                        <a href="{{route('noticias.show',$tabla_noticia->id)}}"
                           class="btn btn-sm btn-primary active" title="Ver Noticia">
                            <i class="fas fa-eye"></i>

                        </a>
                    </td>
                    <td>
                        <a href="/noticia/edit/{{$tabla_noticia->id}}"
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


@endsection
