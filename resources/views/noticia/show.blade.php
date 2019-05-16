@extends('layout')
@section('content')
    <div class="col">
        <h2>
            {{$tabla_noticia->titulo}}
        </h2 >
        <h5>
            {{$tabla_noticia->created_at}}
        </h5>
    </div>
    <div class="col">
        <div class="row">
            <div class="col-md-10">
                <div class="container m-3 bg-dark mx-auto">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img style=" width:400px; height: 400px !important;" src="{{ asset('storage/logo_fundacion.png')}}" class="d-block w-100" alt="...">
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
                    </div>
                </div>
            </div>
        </div>
        @if($tabla_noticia->video != null)
            <div class="row">

                <div class="container">
                    <video id="sampleMovie" width="640" height="360" preload controls>
                        <source src="{{ asset('storage/'.$tabla_noticia->video)}}"  />
                    </video>
                </div>
                @endif
        <div class="row">
            <h4>
                {{$tabla_noticia->contenido}}
            </h4>
        </div>
    </div>



@endsection

