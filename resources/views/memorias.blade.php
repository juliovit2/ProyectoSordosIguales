<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">


    <title>Starter Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/starter-template.css') }}" rel="stylesheet">
</head>

<style>
    body {
        margin: 0;
        padding: 0;
    }
    /* navbar */
    .navbar-default {
        background-color: #3460C7;
        border-color: #E7E7E7;
    }
    /* Title */
    .navbar-default .navbar-brand {
        color: #ffffff;
    }
    .navbar-default .navbar-brand:hover,
    .navbar-default .navbar-brand:focus {
        color: #5E5E5E;
    }
    /* Link */
    .navbar-default .navbar-nav > li > a {
        color: #ffffff;
    }
    .navbar-default .navbar-nav > li > a:hover,
    .navbar-defau lt .navbar-nav > li > a:focus {
        color: #333;
    }
    .navbar-default .navbar-nav > .active > a,
    .navbar-default .navbar-nav > .active > a:hover,
    .navbar-default .navbar-nav > .active > a:focus {
        color: #555;
        background-color: #E7E7E7;
    }
    .navbar-default .navbar-nav > .open > a,
    .navbar-default .navbar-nav > .open > a:hover,
    .navbar-default .navbar-nav > .open > a:focus {
        color: #555;
        background-color: #D5D5D5;
    }
    /* Caret */
    .navbar-default .navbar-nav > .dropdown > a .caret {
        border-top-color: #777;
        border-bottom-color: #777;
    }
    .navbar-default .navbar-nav > .dropdown > a:hover .caret,
    .navbar-default .navbar-nav > .dropdown > a:focus .caret {
        border-top-color: #333;
        border-bottom-color: #333;
    }
    .navbar-default .navbar-nav > .open > a .caret,
    .navbar-default .navbar-nav > .open > a:hover .caret,
    .navbar-default .navbar-nav > .open > a:focus .caret {
        border-top-color: #555;
        border-bottom-color: #555;
    }
    /* Mobile version */
    .navbar-default .navbar-toggle {
        border-color: #DDD;
    }
    .navbar-default .navbar-toggle:hover,
    .navbar-default .navbar-toggle:focus {
        background-color: #DDD;
    }
    .navbar-default .navbar-toggle .icon-bar {
        background-color: #CCC;
    }
    @media (max-width: 767px) {
        .navbar-default .navbar-nav .open .dropdown-menu > li > a {
            color: #777;
        }
        .navbar-default .navbar-nav .open .dropdown-menu > li > a:hover,
        .navbar-default .navbar-nav .open .dropdown-menu > li > a:focus {
            color: #333;
        }
    }
</style>

<header>
    <div class="container-fluid">
        <div class="row border">
            <div class="col-sm-2 border ">
                <img class = "img" src="{{"/storage/UL7hTO9G.jpg"}}" style ="width:150px;height: 150px;float: right;">
            </div>
            <div class="col-sm-8 border align-self-center" style="color:#3460C7;font-size: 14px;font-family: 'Oswald', sans-serif !important; font-style: italic;">
                <h1 align="center"  style="font-size: 70px">Fundacion Sordos iguales</h1>
            </div>
            <div class="col-sm-2 border align-self-center" style="font-size: 45px">
                <a href = "monkey.png"><i class="fab fa-twitter-square"></i></a>
                <a href = "monkey.png"><i class="fab fa-facebook"></i></a>
                <a href = "monkey.png"><i class="fab fa-instagram"></i></a>
                <a href = "monkey.png"><i class="fab fa-whatsapp"></i></a>

            </div>
        </div>
    </div>
</header>
<body>
<nav class="navbar-default navbar navbar-expand-md">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="#"><h4><i class="fas fa-home"></i>  Inicio</h4></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><h4><i class="fas fa-info-circle"></i>  ¿Quienes Somos?</h4></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><h4><i class="far fa-newspaper"></i>  Noticias y Articulos</h4></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><h4><i class="far fa-question-circle"></i>  Preguntas Frecuentes</h4></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><h4><i class="fas fa-phone"></i>  Contacto</h4></a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Busqueda" aria-label="Buscar">
            <button class="btn my-2 my-sm-0" type="submit">Buscar</button>
        </form>
    </div>
</nav>


<main role="main" class="container">

    <div class="container">
        <h1>WENA</h1>
    </div>
    <div class="container">
        <h1>WENA</h1>
    </div>
    <div class="container">
        <h1>WENA</h1>
    </div>
    <div class="container">
        <h1>WENA</h1>
    </div>
    <div class="container">
        <h1>WENA</h1>
    </div>
    <div class="container">
        <h1>WENA</h1>
    </div>


</main><!-- /.container -->

<section id="sec-footer">
    <div class="container-fluid pt-5" style="background-color:#3460C7">
        <div class="row">
            <div class = "container border col-sm" style="text-align: center">
                <img class = "img" src="{{"/storage/UL7hTO9G.jpg"}}" style ="width:100px;height: 100px">
            </div>
            <div class = "container border col-sm" style="text-align: center">
                <img class = "img" src="{{"/storage/UL7hTO9G.jpg"}}" style ="width:100px;height: 100px">
            </div>
            <div class = "container border col-sm" style="text-align: center">
                <img class = "img" src="{{"/storage/UL7hTO9G.jpg"}}" style ="width:100px;height: 100px">
            </div>
            <div class = "container border col-sm" style="text-align: center">
                <img class = "img" src="{{"/storage/UL7hTO9G.jpg"}}" style ="width:100px;height: 100px">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="ftr-below-names2"> Copyright &copy;2015 </div>
            </div>
        </div>
    </div>
</section>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="../../../../assets/js/vendor/popper.min.js"></script>
<script src="../../../../dist/js/bootstrap.min.js"></script>
</body>
</html>