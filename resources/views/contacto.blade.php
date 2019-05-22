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
</head>


<div class="mx-auto" style="width: 1000px;">
    <div>
        <div>
            @if(!empty($successMsg))
                <div class="alert alert-success"> {{ $successMsg }}</div>
            @endif
            <h4 style="text-align: center">Contacto</h4>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
            @endif
            <!-- MENU con checkbox-->
                <div class="funkyradio" align="center">
                    <form action="/contacto" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="funkyradio-default">

                            <input type="radio" name="opcion" class="consulta" id="radio1" value="1" checked />
                            <label for="radio1">Consulta</label>
                            <!-- Form -->

                            <!--Formulario de Voluntario -->

                            <input type="radio" name="opcion" class="consulta" id="radio2" value="2" />
                            <label for="radio2">Voluntario</label>
                            <!-- Form -->



                            <!-- Formulario de Denuncias-->

                            <input type="radio" name="opcion" class="consulta" id="radio3" value="3" />
                            <label for="radio3">Denuncias</label>
                            <!-- FORM -->


                            <!-- Formulario de Otros-->

                            <input type="radio" name="opcion" class="consulta" id="Otros" value="4" />
                            <label for="radio4">Otros</label>
                            <!-- FORM -->

                        </div>
                        <!-- Formularios -->
                        <div id="content" style="display: none;">
                            <!-- Envía al usuario al FAQ para no repetir su pregunta-->
                            <p>Verifique que su consulta no se encuentre en <a href="enlacepagina.html">Preguntas Frecuentes</a></p>
                        </div>

                        <!-- Campos obligatorios-->
                        <div align="center" style="width: 50%;" id="obligatorio">
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
                    </form>


                    <!--Voluntario-->
                    <form action="/contacto" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <input type="hidden" name="opcion" class="consulta" id="radio2" value="2" />
                        <div id="content2" style="display: none;">
                            <div class="container" align="center">
                                <div class="col-md-6 col-md-offset-3">
                                    <div class="well well-sm">
                                        <!-- Name input-->
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
                    </form>
                </div>



        </div>
    </div>
</div>



    <!-- Script que hace la funcion de show and hide -->
    <script type="text/javascript">
        $(document).ready(function () {
            $(".consulta").click(function (evento) {
                var valor = $(this).val();
                if(valor == 1){
                    $("#content").css("display","block");
                    $("#content2").css("display","none");
                    $("#obligatorio").css("display","block");
                }else if(valor == '2') {
                    $("#content").css("display","none");
                    $("#content2").css("display","block");
                    $("#obligatorio").css("display","none");
                }else{
                    $("#content").css("display","none");
                    $("#content2").css("display","none");
                    $("#obligatorio").css("display","block");
                }
            })

        })


        CKEDITOR.replace('editor1', {
            // Define the toolbar groups as it is a more accessible solution.
            toolbarGroups: [{
                "name": "basicstyles",
                "groups": ["basicstyles"]
            },
                {
                    "name": "links",
                    "groups": ["links"]
                },
                {
                    "name": "paragraph",
                    "groups": ["list", "blocks"]
                },
            ],
            // Remove the redundant buttons from toolbar groups defined above.
            removeButtons: 'Underline,Strike,Subscript,Superscript,Anchor,Styles,Specialchar,About,Styles,Insert,Document'
        });

    </script>

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
