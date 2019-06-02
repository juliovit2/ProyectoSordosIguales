@extends('layoutGeneral')
@section('content')

{{--    se esta usando la version 4.0.0 de boostrap--}}
{{--<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">--}}
{{--<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>--}}
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
{{--ya esta agregardo el ajax en el header--}}
{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>--}}
{{--<!------ Include the above in your HEAD tag ---------->--}}

<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex, nofollow">
    <title>Custom toolbar</title>
    <script src="{{asset('\ckeditor\ckeditor.js')}}"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- style -->
    <style>
        /*body {font-family: Arial;}*/

        /* Style the tab */
        .tab {
            overflow: hidden;
            border: 1px solid #ccc;
            background-color: #2980b9;
            width: 100%;
        }

        /* Style the buttons inside the tab */
        .tab button {
            background-color: inherit;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            transition: 0.3s;
            font-size: 17px;
            width: 25%;
            color: white;
            font-weight: bold;
        }

        /* Change background color of buttons on hover */
        .tab button:hover {
            background-color: #296da6;
        }

        /* Create an active/current tablink class */
        .tab button.active {
            background-color: #2a4d87;
        }

        /* Style the tab content */
        .tabcontent {
            display: none;
            padding: 6px 12px;
            border: 1px solid #ccc;
            border-top: none;
        }

    </style>
</head>

<body>

<!--p>Click on the buttons inside the tabbed menu:</p-->
<!-- los botones del tab-->
<div class="tab">
    <button class="tablinks" onclick="openCity(event, 'Consulta')" id="defaultOpen">Consulta</button>
    <button class="tablinks" onclick="openCity(event, 'Voluntario')">Voluntario</button>
    <button class="tablinks" onclick="openCity(event, 'Denuncia')">Denuncia</button>
    <button class="tablinks" onclick="openCity(event, 'Otro')">Otro</button>
</div>
<!-- FORMS -->

<div id="Consulta" class="tabcontent">
    <div class="container" align="center">
        <div class="col-md-6 col-md-offset-3">
            <div class="well well-sm">
                <div class="card-header">
                    <h3>Consulta</h3>
                </div>
                <div class="card" >
                    <div class="card-body">

                    <!-- Envía al usuario al FAQ para no repetir su pregunta-->
                    <p>Verifique que su consulta no se encuentre en <a href="enlacepagina.html">Preguntas Frecuentes</a></p>

                    <!-- Campos obligatorios-->
                    <div id="obligatorio">
                        <!-- Name input-->
                        <div class="form-group">
                            <p align="left">Nombre</p>
                            <div>
                                <input id="name" name="name" type="text" placeholder="Ingrese nombre" class="form-control" pattern="([A-z]|ñ)*">
                            </div>
                        </div>

                        <!-- Email input-->
                        <div class="form-group">
                            <p align="left">Correo</p>
                            <div>
                                <input id="email" name="email" type="text" placeholder="Ingrese email" class="form-control" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}">
                            </div>
                        </div>

                        <!-- Message input-->
                        <div>
                            <p align="left">Mensaje</p>
                            <textarea cols="53" id="editor1" name="mensaje" rows="10"></textarea>
                        </div>

                        <div class="form-group" align="left">
                            <p align="left">Sube tu video (opcional)</p>
                            <input  name="file" type="file" />
                        </div>

                        <!-- Form actions -->
                        <br>
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary btn-lg text-reset">Enviar</button>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="Voluntario" class="tabcontent">

            <div class="container" align="center">
                <div class="col-md-6 col-md-offset-3">
                    <div class="well well-sm">
                        <div class="card-header">
                            <h3>Voluntario</h3>
                        </div>
                        <!-- Name input-->
                        <div class="card" >
                            <div class="card-body">
                        <div class="form-group">
                            <p align="left">Nombre</p>
                            <div>
                                <input id="name" name="name" type="text" placeholder="Ingrese nombre" class="form-control" pattern="([A-z]|ñ)*">
                            </div>
                        </div>
                        <!-- Rut input-->
                        <div class="form-group">
                            <p align="left">Rut</p>
                            <div>
                                <input required oninput="checkRut(this)" id="rut" name="rut" type="text" placeholder="Ingrese Rut" class="form-control">
                            </div>
                        </div>
                        <!-- Email input-->
                        <div class="form-group">
                            <p align="left">Correo</p>
                            <div>
                                <input id="email" name="email" type="text" placeholder="Ingrese email" class="form-control" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}">
                            </div>
                        </div>

                        <!-- Ciudad input-->
                        <div class="form-group">
                            <p align="left">Ciudad</p>
                            <div>
                                <input id="ciudad" name="ciudad" type="text" placeholder="Ingrese ciudad" class="form-control" pattern="([A-z]|ñ)*">
                            </div>
                        </div>

                        <!-- phone input-->
                        <div class="form-group">
                            <p align="left">Telefono (Ej. 12345678)</p>
                            <div>
                                {{--                                                    <input id="phone" name="phone" type="tel" placeholder="Ingrese Telefono" pattern="+569[0-9]{8}" required class="form-control">--}}
                                <input id="phone" name="phone" type="tel" placeholder="Ingrese Telefono" class="form-control" pattern="[0-9]{8}">
                            </div>
                        </div>

                        <!-- Profesion input-->
                        <div class="form-group">
                            <p align="left">Profesion</p>
                            <div>
                                <input id="profesion" name="profesion" type="text" placeholder="Ingrese profesion" class="form-control" pattern="([A-z]|ñ)*">
                            </div>
                        </div>

                        <!-- upload file -->
                        <div class="form-group" align="left">
                            <p align="left">Certificados o Curriculum</p>
                            <input  name="file" type="file" />

                        </div>
                        <!-- Form actions -->
                        <div class="form-group">
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-lg">Enviar</button>
                            </div>
                        </div>
                            </div>
                      </div>
                    </div>
                </div>
            </div>

</div>

<div id="Denuncia" class="tabcontent">

    <div class="container" align="center">
        <div class="col-md-6 col-md-offset-3">
            <div class="well well-sm">
                <div class="card-header">
                    <h3>Denuncia</h3>
                </div>
                <!-- Campos obligatorios-->
                <div class="card" >
                    <div class="card-body">
                <div id="obligatorio">
                    <!-- Name input-->
                    <div class="form-group">
                        <p align="left">Nombre (opcional)</p>
                        <div>
                            <input id="name" name="name" type="text" placeholder="Ingrese nombre" class="form-control" pattern="([A-z]|ñ)*">
                        </div>
                    </div>

                    <!-- Email input-->
                    <div class="form-group">
                        <p align="left">Correo</p>
                        <div>
                            <input id="email" name="email" type="text" placeholder="Ingrese email" class="form-control" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}">
                        </div>
                    </div>

                    <!-- Message input-->
                    <div>
                        <p align="left">Mensaje</p>
                        <textarea cols="53" id="editor1" name="mensaje" rows="10"></textarea>
                    </div>

                    <div class="form-group" align="left">
                        <p align="left">Sube tu video (opcional)</p>
                        <input  name="file" type="file" />
                    </div>

                    <!-- Form actions -->
                    <br>
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary btn-lg text-reset">Enviar</button>
                    </div>
                </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </fieldset>
</div>

<div id="Otro" class="tabcontent">

    <div class="container" align="center">
        <div class="col-md-6 col-md-offset-3">
            <div class="well well-sm">
                <div class="card-header">
                    <h3>Otro</h3>
                </div>
                <!-- Campos obligatorios-->
                <div class="card" >
                    <div class="card-body">
                <div id="obligatorio">
                    <!-- Name input-->
                    <div class="form-group">
                        <p align="left">Nombre</p>
                        <div>
                            <input id="name" name="name" type="text" placeholder="Ingrese nombre" class="form-control" pattern="([A-z]|ñ)*">
                        </div>
                    </div>

                    <!-- Email input-->
                    <div class="form-group">
                        <p align="left">Correo</p>
                        <div>
                            <input id="email" name="email" type="text" placeholder="Ingrese email" class="form-control" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}">
                        </div>
                    </div>

                    <!-- Message input-->
                    <div>
                        <p align="left">Mensaje</p>
                        <textarea cols="53" id="editor1" name="mensaje" rows="10"></textarea>
                    </div>

                    <div class="form-group" align="left">
                        <p align="left">Sube tu video (opcional)</p>
                        <input  name="file" type="file" />
                    </div>

                    <!-- Form actions -->
                    <br>
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary btn-lg text-reset">Enviar</button>
                    </div>
                </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }
    document.getElementById("defaultOpen").click();
</script>

</body>



<script>
    function checkRut(rut) {
        // Despejar Puntos
        var valor = rut.value.replace('.','');
        // Despejar Guión
        valor = valor.replace('-','');

        // Aislar Cuerpo y Dígito Verificador
        cuerpo = valor.slice(0,-1);
        dv = valor.slice(-1).toUpperCase();

        // Formatear RUN
        rut.value = cuerpo + '-'+ dv

        // Si no cumple con el mínimo ej. (n.nnn.nnn)
        if(cuerpo.length < 7) { rut.setCustomValidity("RUT Incompleto"); return false;}

        // Calcular Dígito Verificador
        suma = 0;
        multiplo = 2;

        // Para cada dígito del Cuerpo
        for(i=1;i<=cuerpo.length;i++) {

            // Obtener su Producto con el Múltiplo Correspondiente
            index = multiplo * valor.charAt(cuerpo.length - i);

            // Sumar al Contador General
            suma = suma + index;

            // Consolidar Múltiplo dentro del rango [2,7]
            if(multiplo < 7) { multiplo = multiplo + 1; } else { multiplo = 2; }

        }

        // Calcular Dígito Verificador en base al Módulo 11
        dvEsperado = 11 - (suma % 11);

        // Casos Especiales (0 y K)
        dv = (dv == 'K')?10:dv;
        dv = (dv == 0)?11:dv;

        // Validar que el Cuerpo coincide con su Dígito Verificador
        if(dvEsperado != dv) { rut.setCustomValidity("RUT Inválido"); return false; }

        // Si todo sale bien, eliminar errores (decretar que es válido)
        rut.setCustomValidity('');
    }
</script>
@endsection
