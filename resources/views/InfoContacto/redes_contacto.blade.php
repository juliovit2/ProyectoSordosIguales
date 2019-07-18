@extends('layoutGeneral')
@section('content')
    <style xmlns="http://www.w3.org/1999/html">
        #myDIV {
            display: none;
        }
        #myDIV2 {
            display: none;
        }
        #myDIV2 {
            display: none;
        }
        #myDIV3 {
            display: none;
        }
        #myDIV4 {
            display: none;
        }
        #myDIV5 {
            display: none;
        }
        #myDIVRM {
            display: none;
        }
        #myDIV6 {
            display: none;
        }
        #myDIV7 {
            display: none;
        }
        #myDIV8 {
            display: none;
        }
        #myDIV9 {
            display: none;
        }
        #myDIV10 {
            display: none;
        }
        #myDIV11 {
            display: none;
        }
        #myDIV12 {
            display: none;
        }
        #myDIV14 {
            display: none;
        }
        #myDIV15 {
            display: none;
        }
        .column {
            float: left;
            width: 50%;
            height: 100%;
        }
        .legendbox{
            display: none;
            width: 50%;
            height: 100%;
            border: 3px solid #040404;
            margin-top: 5%;
        }
        .row:after {
            content: "";
            display: table;
            clear: both;
        }
        .margen{
            margin-top: 10%;
            padding-left: 3%;
        }
        .margen2{
            margin-top: 2%;
            margin-bottom: 2%;
            margin-left: 5%;
            margin-right: 5%;
        }
    </style>
<div class="row">
    <div class="column " >
        <div class="margen2" style="background-color: #FFFFFF">
        <div class="nav-item"
             align="center"
            data-toggle="popover"
            data-img="http://placehold.it/100x100"
            data-trigger="hover"
            data-placement="top">
            <input align="center" id="15" type="image"  src="{{"/storage/regiones/arica.png"}}" width="66%" height="66%" onclick="myFunction(15)" ></input>

           <!-- <a class="nav-link" href={{'/'}}><h4><span class="textoHeader"><i class="fas fa-home"></i>  Inicio</span></h4></a>-->
        </div>
        <div class="nav-item"
             align="center"
            data-toggle="popover"
            data-img="http://placehold.it/100x100"
            data-trigger="hover"
            data-placement="top">
            <input align="center" id="1" type="image" src="{{"/storage/regiones/tarapacá.png"}}"  width="66%" height="66%" onclick="myFunction(1)"></input>
        </div>
        <div class="nav-item"
             align="center"
        data-toggle="popover"
        data-img="http://placehold.it/100x100"
        data-trigger="hover"
        data-placement="top">
            <input  align="center" id="2" type="image" src="{{"/storage/regiones/antofa.png"}}"   width="66%" height="66%" onclick="myFunction(2)"></input>
        </div>
        <div class="nav-item"
             align="center"
             data-toggle="popover"
             data-img="http://placehold.it/100x100"
             data-trigger="hover"
             data-placement="top">
            <input  align="center" id="3" type="image" src="{{"/storage/regiones/atacama.png"}}"  width="66%" height="66%" onclick="myFunction(3)"></input>

        </div>
        <div class="nav-item"
             align="center"
             data-toggle="popover"
             data-img="http://placehold.it/100x100"
             data-trigger="hover"
             data-placement="top">
            <input  align="center" id="4" type="image" src="{{"/storage/regiones/coquimbo.png"}}"  width="66%" height="66%" onclick="myFunction(4)"></input>

        </div>
        <div class="nav-item"
             align="center"
             data-toggle="popover"
             data-img="http://placehold.it/100x100"
             data-trigger="hover"
             data-placement="top">
            <input  align="center" id="5"type="image" src="{{"/storage/regiones/valpo.png"}}"  width="67%" height="69%" onclick="myFunction(5)"></input>

        </div>
        <div class="nav-item"
             align="center"
             data-toggle="popover"
             data-img="http://placehold.it/100x100"
             data-trigger="hover"
             data-placement="top">
            <input  align="center" id="rm" type="image" src="{{"/storage/regiones/rm.png"}}"  width="70%" height="70%" onclick="myFunction('rm')"></input>

        </div>
        <div class="nav-item"
             align="center"
             data-toggle="popover"
             data-img="http://placehold.it/100x100"
             data-trigger="hover"
             data-placement="top">
            <input  align="center" id="6" type="image" src="{{"/storage/regiones/ohiggins.png"}}"  width="70%" height="300%" onclick="myFunction(6)"></input>

        </div>
        <div class="nav-item"
             align="center"
             data-toggle="popover"
             data-img="http://placehold.it/100x100"
             data-trigger="hover"
             data-placement="top">
            <input  align="center" id="7" type="image" src="{{"/storage/regiones/maule.png"}}"  width="66%" height="66%" onclick="myFunction(7)"></input>

        </div>
        <div class="nav-item"
             align="center"
             data-toggle="popover"
             data-img="http://placehold.it/100x100"
             data-trigger="hover"
             data-placement="top">
            <input  align="center" id="8" type="image" src="{{"/storage/regiones/biobio.png"}}"  width="66%" height="66%" onclick="myFunction(8)"></input>

        </div>
        <div class="nav-item"
             align="center"
             data-toggle="popover"
             data-img="http://placehold.it/100x100"
             data-trigger="hover"
             data-placement="top">
            <input  align="center" id="9" type="image" src="{{"/storage/regiones/araucania.png"}}"  width="66%" height="66%" onclick="myFunction(9)"></input>

        </div>
        <div class="nav-item"
             align="center"
             data-toggle="popover"
             data-img="http://placehold.it/100x100"
             data-trigger="hover"
             data-placement="top">
            <input  align="center" id="14" type="image" src="{{"/storage/regiones/los rios.png"}}"  width="66%" height="66%" onclick="myFunction(14)"></input>

        </div>
        <div class="nav-item"
             align="center"
             data-toggle="popover"
             data-img="http://placehold.it/100x100"
             data-trigger="hover"
             data-placement="top">
            <input  align="center" id="10" type="image" src="{{"/storage/regiones/los lagos.png"}}"  width="66%" height="66%" onclick="myFunction(10)"></input>

        </div>
        <div class="nav-item"
             align="center"
             data-toggle="popover"
             data-img="http://placehold.it/100x100"
             data-trigger="hover"
             data-placement="top">
            <input  align="center" id="11" type="image" src="{{"/storage/regiones/aysen.png"}}"  width="66%" height="66%" onclick="myFunction(11)"></input>

        </div>
        <div class="nav-item"
             align="center"
             data-toggle="popover"
             data-img="http://placehold.it/100x100"
             data-trigger="hover"
             data-placement="top">
            <input  align="center" id="12" type="image" src="{{"/storage/regiones/magallanes.png"}}"  width="66%" height="66%" onclick="myFunction(12)"></input>

        </div>
        </div>
    </div>


    <div class="column legendbox" id="legendbox">
        <h1 align="center">Aquí se desplegará la información seleccionada</h1>
        <div class="margen">

        <div id="myDIV15" align="center">

            <!--hr style="color: #0056b2;" /-->
            <h2>{{$texto[0]->nombre}}</h2>
            <!--hr style="color: #0056b2;" /-->
            <div align="left">
                {!!html_entity_decode($texto[0]->texto)!!}

            </div>
        </div>
        <div id="myDIV" align="center">
            <h2>{{$texto[1]->nombre}}</h2>
            <div align="left">
                {!!html_entity_decode($texto[1]->texto)!!}

            </div>
        </div>
        <div id="myDIV2" align="center">
            <h2>{{$texto[2]->nombre}}</h2>
            <div align="left">
                {!!html_entity_decode($texto[2]->texto)!!}

            </div>
        </div>
        <div id="myDIV3" align="center">
            <h2>{{$texto[3]->nombre}}</h2>
            <div align="left">
                {!!html_entity_decode($texto[3]->texto)!!}

            </div>
        </div>
        <div id="myDIV4" align="center">
            <h2>{{$texto[4]->nombre}}</h2>
            <div align="left">
                {!!html_entity_decode($texto[4]->texto)!!}

            </div>
        </div>
        <div id="myDIV5" align="center">
            <h2>{{$texto[5]->nombre}}</h2>
            <div align="left">
                {!!html_entity_decode($texto[5]->texto)!!}

            </div>
        </div>
        <div id="myDIVRM" align="center">
            <h2>{{$texto[6]->nombre}}</h2>
            <div align="left">
                {!!html_entity_decode($texto[6]->texto)!!}

            </div>
        </div>
        <div id="myDIV6" align="center">
            <h2>{{$texto[7]->nombre}}</h2>
            <div align="left">
                {!!html_entity_decode($texto[7]->texto)!!}

            </div>
        </div>
        <div id="myDIV7" align="center">
            <h2>{{$texto[8]->nombre}}</h2>
            <div align="left">
                {!!html_entity_decode($texto[8]->texto)!!}

            </div>
        </div>
        <div id="myDIV8" align="center">
            <h2>{{$texto[9]->nombre}}</h2>
            <div align="left">
                {!!html_entity_decode($texto[9]->texto)!!}

            </div>
        </div>
        <div id="myDIV9" align="center">
            <h2>{{$texto[10]->nombre}}</h2>
            <div align="left">
                {!!html_entity_decode($texto[10]->texto)!!}

            </div>
        </div>
        <div id="myDIV14" align="center">
            <h2>{{$texto[11]->nombre}}</h2>
            <div align="left">
                {!!html_entity_decode($texto[11]->texto)!!}

            </div>
        </div>
        <div id="myDIV10" align="center">
            <h2>{{$texto[12]->nombre}}</h2>
            <div align="left">
                {!!html_entity_decode($texto[12]->texto)!!}

            </div>
        </div>
        <div id="myDIV11" align="center">
            <h2>{{$texto[13]->nombre}}</h2>
            <div align="left">
                {!!html_entity_decode($texto[13]->texto)!!}

            </div>
        </div>
        <div id="myDIV12" align="center">
            <h2>{{$texto[14]->nombre}}</h2>
            <div align="left">
                {!!html_entity_decode($texto[14]->texto)!!}

            </div>
        </div>
        </div>
    </div>

</div>

    <script>
        $('[data-toggle="popover"]').popover({
            html: true,
            trigger: 'hover',
            placement: 'left',
            content: function () { return '<img src="' + $(this).data('img') + '" />'; }
        });

    </script>
    <script>
        function myFunction(opcion) {
            var x = "";
            var y = document.getElementById("legendbox");
            switch (opcion) {
                case 1:
                    x = document.getElementById("myDIV");
                    break;
                case 2:
                    x = document.getElementById("myDIV2");
                    break;
                case 3:
                    x = document.getElementById("myDIV3");
                    break;
                case 4:
                    x = document.getElementById("myDIV4");
                    break;
                case 5:
                    x = document.getElementById("myDIV5");
                    break;
                case 'rm':
                    x = document.getElementById("myDIVRM");
                    break;
                case 6:
                    x = document.getElementById("myDIV6");
                    break;
                case 7:
                    x = document.getElementById("myDIV7");
                    break;
                case 8:
                    x = document.getElementById("myDIV8");
                    break;
                case 9:
                    x = document.getElementById("myDIV9");
                    break;
                case 10:
                    x = document.getElementById("myDIV10");
                    break;
                case 11:
                    x = document.getElementById("myDIV11");
                    break;
                case 12:
                    x = document.getElementById("myDIV12");
                    break;
                case 14:
                    x = document.getElementById("myDIV14");
                    break;
                case 15:
                    x = document.getElementById("myDIV15");
                    break;
            }
            if (x.style.display == "block") {
                x.style.display = "none";
                /*y.style.display = "none";*/
            } else {
                x.style.display = "block";
                y.style.display = "block";
            }
        }

    </script>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../../../assets/js/vendor/popper.min.js"></script>
    <script src="../../../../dist/js/bootstrap.min.js"></script>

@endsection