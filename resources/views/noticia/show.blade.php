@extends('layoutGeneral')
@section('content')

    <div class="container">
    <h1 align="center">{{$tabla_noticia->titulo}}</h1 >

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" width="100%" max-height="460px">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="item banner-height-400">
                <img width="400px" height="400px" src="{{ asset('storage/logo_fundacion.png')}}" class="d-block w-100" alt="...">
                </div>
                </div>
            @foreach($tabla_imagenes_noticia as $tabla_imagenes_noticia)
                @if($tabla_imagenes_noticia->noticiaid == $tabla_noticia->id)
                    <div class="carousel-item">
                        <div class="item banner-height-400">
                        <img width="400px" height="400px"  src="{{ asset('storage/'.$tabla_imagenes_noticia->imagen)}}" class="d-block w-100" alt="...">
                        </div>
                        </div>
                @endif
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="form-group">
        <h5 align="right">
            {{$tabla_noticia->created_at}}
        </h5>
    </div>

    <div align="justify" class="form-group">
        <h3>
            {{$tabla_noticia->contenido}}
        </h3>
    </div>
        @if($tabla_noticia->video != null)
        <div align="center">
        <video  id="sampleMovie" width="640" height="360" preload controls>
            <source src="{{ asset('storage/'.$tabla_noticia->video)}}"  />
        </video>
        </div>
        @endif
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="/js/web.js" type="text/javascript" charset="utf-8" async defer></script>

@endsection

