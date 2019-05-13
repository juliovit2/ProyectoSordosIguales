@extends('layout')
@section('content')

    <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" data-interval="10000">
                <img src="..." class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item" data-interval="2000">
                <img src="..." class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="..." class="d-block w-100" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
        <h2>
        {{$tabla_imagenes_noticia->imagen}}
        </h2>
        <h2>
        {{$tabla_noticia->titulo}}
        </h2>
            <h2>
            {{$tabla_noticia->created_at}}
            </h2>
        <h2>
            {{$tabla_noticia->contenido}}
        </h2>
        <p>
            {{$tabla_noticia->short}}
        </p>

            {!! $tabla_noticia->body !!}
    </div>
    <div class="col-sm-4">

    </div>

@endsection