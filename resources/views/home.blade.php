@extends('layoutGeneral')

@section('content')
    <div class="container">
        <div id="demo" style="margin: 15px" class="carousel slide" data-ride="carousel">

            <!-- Indicators -->
            <ul class="carousel-indicators">
                <li data-target="#demo" data-slide-to="0" class="active"></li>
                <li data-target="#demo" data-slide-to="1"></li>
                <li data-target="#demo" data-slide-to="2"></li>
            </ul>

            <!-- The slideshow -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="/storage/1.jpg" width="1040" height="550" alt="Los Angeles">
                </div>
                <div class="carousel-item">
                    <img src="/storage/2.jpg" width="1040" height="550" alt="Chicago">
                </div>
                <div class="carousel-item">
                    <img src="/storage/3.jpg" width="1040" height="550" alt="New York">
                </div>
            </div>

            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>

        </div>

        <div class="container" >
            <div class="row">
                <div class="col-12 mt-4 mb-4">
                    <h1>Ultimas Noticias</h1>
                </div>
                @foreach($noticias as $noticia)
                    <div id="item-container" class="col-lg-6">
                        <a style="color: black; text-decoration: none;" href="noticias/{{$noticia->id}}">
                            <div  class="container p-2 mb-3">
                                <div class="row">
                                    <div class="col-4">
                                        <div id="carousel" class="carousel slide" data-ride="carousel" data-interval="2000">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <div class="item banner-height-400">
                                                        <img src="{{ asset('storage/logo_fundacion.png')}}" class="d-block w-100" alt="...">
                                                    </div>
                                                </div>
                                                @foreach($imagenes_noticia as $var_imagenes_noticia)
                                                    @if($var_imagenes_noticia->noticiaid == $noticia->id)
                                                        <div class="carousel-item">
                                                            <div class="item banner-height-400">
                                                                <img src="{{ asset('storage/'.$var_imagenes_noticia->imagen)}}" class="d-block w-100" style="height: 115px" alt="...">
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach</div>

                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <h5 class="text-center text-truncate">{{$noticia->titulo}}</h5>
                                        <div class="col-12">
                                            <p class="text-justify">{{$noticia->getSummary(120)}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                @endforeach
            </div>
        </div>
    </div>



    <style>
        .carousel-inner img {
            object-fit: contain !important;
        }
        .pagination {
            display: flex;
            justify-content: center;
        }

        .pagination li {
            display: block;
        }
        #item-container .container {
            background-color: ghostwhite;
            border: 0.20px solid #972329;
            height: 135px;
            width: 520px;
        }
        #item-container .container:hover {
            background-color: ghostwhite;
            border: 0.20px solid #2980b9;
            height: 135px;
            width: 520px;
        }

    </style>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="/js/web.js" type="text/javascript" charset="utf-8" async defer></script>
@endsection