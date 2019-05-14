@extends('layoutGeneral')
@section('content')
<main role="main" class="container">

    <div class ="container p-5 border">


        <div class = "container pl-5 pr-5" style = "text-align: left">
            <h1 style="font-weight: lighter;font-size: 60px">Memorias Anuales</h1>
            <hr class = "bluered">
        </div>


        <div class ="container p-5">
            <div class="container memoriaContainer row p-3" style="margin: auto;">
                <div class = "col-sm-3">
                    <div class = "container" style="background: #1c7430;height: 100%"></div>
                </div>
                <div class = "col-sm-7 align-self-center d-flex justify-content-center" >
                    <h1 style="color: #2980b9">Memoria 2019</h1>
                </div>
                <div class = "col-sm-2 ">
                        <div class="row align-items-center d-flex justify-content-center " style="height: 50%">
                            <a class = "redlink" href = "monkey.png" style="font-size: 50px"><i class="fas fa-download"></i></a>
                        </div>
                </div>
            </div>
        </div>

        <div class ="container p-5">
            <div class="container memoriaContainer row p-3" style="margin: auto;">
                <div class = "col-sm-3">
                    <div class = "container" style="background: #1c7430;height: 100%"></div>
                </div>
                <div class = "col-sm-7 align-self-center d-flex justify-content-center" >
                    <h1 style="color: #2980b9">Memoria 2018</h1>
                </div>
                <div class = "col-sm-2 ">
                    <div class="row align-items-center d-flex justify-content-center " style="height: 50%">
                        <a class = "redlink" href = "monkey.png" style="font-size: 50px"><i class="fas fa-download"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class ="container p-5">
            <div class="container memoriaContainer row p-3" style="margin: auto;">
                <div class = "col-sm-3">
                    <div class = "container" style="background: #1c7430;height: 100%"></div>
                </div>
                <div class = "col-sm-7 align-self-center d-flex justify-content-center" >
                    <h1 style="color: #2980b9">Memoria 2017</h1>
                </div>
                <div class = "col-sm-2 ">
                    <div class="row align-items-center d-flex justify-content-center " style="height: 50%">
                        <a class = "redlink" href = "monkey.png" style="font-size: 50px"><i class="fas fa-download"></i></a>
                    </div>
                </div>
            </div>
        </div>


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