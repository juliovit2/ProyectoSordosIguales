@extends('layoutGeneral')
@section('content')

    <div class ="container p-5 border">


        <div class = "container pl-5 pr-5" style = "text-align: left">
            <h1 style="font-weight: lighter;font-size: 60px">Preguntas Frecuentes</h1>
            <hr class = "bluered">
        </div>

    </div>


    <div class="container">


        @foreach($pregunta as $p)
           {{--dd("https://www.youtube.com/embed/".$p->respuesta)--}}
            <h1 align="center">{{$p->pregunta}}</h1 >

            <iframe width="560" height="315" src="https://www.youtube.com/embed/".{{$p->respuesta}} frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

{{--            <div align="center">--}}
{{--                <video  id="sampleMovie" width="640" height="360" preload controls>--}}
{{--                    <source src="{{ asset('storage/'.$p->respuesta)}}"  />--}}
{{--                </video>--}}
{{--            </div>--}}
        @endforeach

    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../../../assets/js/vendor/popper.min.js"></script>
    <script src="../../../../dist/js/bootstrap.min.js"></script>
@endsection