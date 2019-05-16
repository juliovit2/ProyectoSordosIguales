@extends('layout')
@section('content')
    <div class="col-sm-8">
        <h2>
            {{$tabla_noticia->titulo}}
        </h2 >
<<<<<<< HEAD
    </div>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img width="400px" height="400px" src="/IMG_7185.jpg" class="d-block w-100" alt="...">
=======
        <h2>
            {{$tabla_noticia->created_at}}
        </h2>
    </div>
    <div class="col-sm-8">
        <div class="row">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img width="400px" height="400px" src="/IMG_7185.jpg" class="d-block w-100" alt="...">
                    </div>
                    @foreach($tabla_imagenes_noticia as $tabla_imagenes_noticia)
                        @if($tabla_imagenes_noticia->noticiaid == $tabla_noticia->id)
                            <div class="carousel-item">
                                <img width="400px" height="400px" src="{{ asset('storage/'.$tabla_imagenes_noticia->imagen)}}" class="d-block w-100" alt="...">
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
>>>>>>> parent of 8a4c774... UPDATED: - Apariencia ver noticia
            </div>
            @foreach($tabla_imagenes_noticia as $tabla_imagenes_noticia)
                @if($tabla_imagenes_noticia->noticiaid == $tabla_noticia->id)
                    <div class="carousel-item">
                        <img width="400px" height="400px" src="{{ asset('storage/'.$tabla_imagenes_noticia->imagen)}}" class="d-block w-100" alt="...">
                    </div>
                @endif
<<<<<<< HEAD
            @endforeach
=======
        <div class="row">
            <h3>
                {{$tabla_noticia->contenido}}
            </h3>
>>>>>>> parent of 8a4c774... UPDATED: - Apariencia ver noticia
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

    <div class="col-sm-4">
        <h2>
            {{$tabla_noticia->created_at}}
        </h2>
    </div>
    <h2>
        {{$tabla_noticia->contenido}}
    </h2>

    </div>
    <div class="container">

        <div class="container">
            <video id="sampleMovie" width="640" height="360" preload controls>
                <source src="{{ asset('storage/'.$tabla_noticia->video)}}"  />
            </video>
        </div>

    </div>




@endsection

