@extends('layoutGeneral')
@section('content')

    <style>
        #volver:hover {
            background-color: #555; /* Add a dark-grey background on hover */
        }

        #volver {
            position: fixed; /* Fixed/sticky position */
            bottom: 20px; /* Place the button at the bottom of the page */
            right: 30px; /* Place the button 30px from the right */
            z-index: 99; /* Make sure it does not overlap */
            border: none; /* Remove borders */
            outline: none; /* Remove outline */
            background-color: red; /* Set a background color */
            color: white; /* Text color */
            cursor: pointer; /* Add a mouse pointer on hover */
            padding: 15px; /* Some padding */
            border-radius: 10px; /* Rounded corners */
            font-size: 18px; /* Increase font size */
        }

    </style>

    <div class="container">
        <h1 align="center">{{$noticia['titulo']}}</h1 >

        <div class="carousel slide" data-ride="carousel" data-interval="3000" width="100%" max-height="460px">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="item banner-height-400">
                        <img width="400px" height="400px" src="{{ asset('storage/logo_fundacion.png')}}" class="d-block w-100" alt="...">
                    </div>
                </div>
                @foreach($imagenes as $imagen)
                        <div class="carousel-item">
                            <div class="item banner-height-400">
                                <img width="400px" height="400px"  src="{!! $imagen !!}" class="d-block w-100" alt="...">
                            </div>
                        </div>
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

        <div align="justify" class="form-group">
            <h3>
                {!! $noticia['contenido'] !!}
            </h3>
        </div>
            @if($noticia['video'] != null)
                <div align="center">
                    <video  id="sampleMovie" width="640" height="360" preload controls>
                        <source src="{{ asset('storage/'.$noticia->video)}}"  />
                    </video>
                </div>
            @endif

        <button onclick="javascript:history.back()" id="volver">Volver a editar noticia</button>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="/js/web.js" type="text/javascript" charset="utf-8" async defer></script>

@endsection

