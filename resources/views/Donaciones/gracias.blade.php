

@extends('layoutGeneral')

@section('pre-body')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection

@section('content')
    <main role="main" class="container">

        <div class ="container p-5 border">
            <div class = "container pl-5 pr-5" style = "text-align: left">
                <h1 style="font-weight: lighter;font-size: 60px">Donaciones</h1>
                <hr class = "blue">
            </div>
            <div class ="container p-5">

                <div class = "container containerForm">

                    <center> <h1 style="font-weight: lighter;font-size: 20px">FORMULARIO DONACION</h1> </center>


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