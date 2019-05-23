@extends('layoutGeneral')
@section('content')
<main role="main" class="container">

    <div class ="container p-5 border">


        <div class = "container pl-5 pr-5" style = "text-align: left">
            <h1 style="font-weight: lighter;font-size: 60px">Memorias Anuales</h1>
            <hr class = "bluered">
        </div>

        @if($memorias)
                @foreach($memorias as $memoria)
                    <div class ="container p-5">
                        <div class="container memoriaContainer row p-3" style="margin: auto;">
                            <div class = "col-sm-3 align-items-center d-flex justify-content-center  ">
                                @if($memoria['portada'])
                                    <img class = "img-thumbnail" src="{{$memoria['portada']}}" onerror="this.onerror=null;this.src='{{"/storage/Test logo UCN.png"}}';" />
                                @else
                                    <i class="fas fa-file-pdf" style="font-size: 1000%;color: #972329"></i>
                                @endif
                            </div>
                            <div class = "col-sm-7 align-self-center d-flex justify-content-center" >
                                <h1 style="color: #2980b9">Memoria {{$memoria['year']}}</h1>
                            </div>
                            <div class = "col-sm-2 ">
                                <div class="row align-items-center d-flex justify-content-center" style="height: 100%">
                                    <a class = "redlink" href = "{{$memoria['pdf']}}" target="_blank" style="font-size: 50px"><i class="fas fa-download"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
        @else
            <p> No hay Memorias registradas </p>
        @endif

    </div>



</main><!-- /.container -->

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="../../../../assets/js/vendor/popper.min.js"></script>
<script src="../../../../dist/js/bootstrap.min.js"></script>
@endsection