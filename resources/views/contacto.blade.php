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
{{--       barra de progreso--}}
        <style>
            .progress { position:relative; width:100%; border: 1px solid #7F98B2; padding: 1px; border-radius: 3px; }
            .bar { background-color: #B4F5B4; width:0%; height:30px; border-radius: 3px; }
            .percent { position:absolute; display:inline-block; top:3px; left:48%; color: #7F98B2;}
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

    <input type="hidden" id="op" name="opcion" value="1">
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

                            <form action="/contacto" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <!-- Campos obligatorios-->
                                    <input type="hidden" name="opcion" value="1">
                                    <div id="obligatorio">
                                        <!-- Name input-->
                                        <div class="form-group">
                                            <p align="left">Nombre</p>
                                            <div>
                                                <input id="name" name="name" type="text" placeholder="Ingrese nombre" class="form-control" pattern="([A-z]|ñ|\s)*">
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
                                            <input id="file"  name="archivo" type="file" accept="video/mp4"/>
                                            <div class="progress" style="height: 5%">
                                                <div class="bar"></div >
                                                <div class="percent">0%</div >
                                            </div>
                                        </div>

                                        <!-- Form actions -->
                                        <br>
                                        <div class="col-md-12 text-center">
                                            <button id="consulta" onclick="subirArchivo(1)" type="submit" class="btn btn-primary btn-lg text-reset">Enviar</button>
                                        </div>
                                    </div>
                            </form>
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
                    <form action="/contacto" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                        <input type="hidden" name="opcion" value="2">
                    <!-- Name input-->
                        <div class="card" >
                            <div class="card-body">
                                <div class="form-group">
                                    <p align="left">Nombre</p>
                                    <div>
                                        <input id="name2" name="name" type="text" placeholder="Ingrese nombre" class="form-control" pattern="([A-z]|ñ|\s)*">
                                    </div>
                                </div>
                                <!-- Rut input-->
                                <div class="form-group">
                                    <p align="left">Rut</p>
                                    <div>
                                        <input oninput="checkRut(this)" id="rut" name="rut" type="text" placeholder="Ingrese Rut" class="form-control">
                                    </div>
                                </div>
                                <!-- Email input-->
                                <div class="form-group">
                                    <p align="left">Correo</p>
                                    <div>
                                        <input id="email2" name="email" type="text" placeholder="Ingrese email" class="form-control" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}">
                                    </div>
                                </div>

                                <!-- Ciudad input-->
                                <div class="form-group">
                                    <p align="left">Ciudad</p>
                                    <div>
                                        <input id="ciudad" name="ciudad" type="text" placeholder="Ingrese ciudad" class="form-control" pattern="([A-z]|ñ|\s)*">
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
                                        <input id="profesion" name="profesion" type="text" placeholder="Ingrese profesion" class="form-control" pattern="([A-z]|ñ|\s)*">
                                    </div>
                                </div>

                                <!-- upload file -->
                                <div class="form-group" align="left">
                                    <p align="left">Certificados o Curriculum</p>
                                    <input id="file2" name="archivo" type="file" accept="application/pdf" />
                                    <div class="progress" style="height: 5%">
                                        <div class="bar"></div >
                                        <div class="percent">0%</div >
                                    </div>
                                </div>
                                <!-- Form actions -->
                                <div class="form-group">
                                    <div class="text-center">
                                        <button id="voluntario" onclick="subirArchivo(2)" type="submit" class="btn btn-primary btn-lg text-reset">Enviar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
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
                    <form action="/contacto" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <input type="hidden" name="opcion" value="3">
                        <!-- Campos obligatorios-->
                        <div class="card" >
                            <div class="card-body">
                                <div id="obligatorio">
                                    <!-- Name input-->
                                    <div class="form-group">
                                        <p align="left">Nombre (opcional)</p>
                                        <div>
                                            <input id="name3" name="name" type="text" placeholder="Ingrese nombre" class="form-control" pattern="([A-z]|ñ|\s)*">
                                        </div>
                                    </div>

                                    <!-- Email input-->
                                    <div class="form-group">
                                        <p align="left">Correo</p>
                                        <div>
                                            <input id="email3" name="email" type="text" placeholder="Ingrese email" class="form-control" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}">
                                        </div>
                                    </div>

                                    <!-- Message input-->
                                    <div>
                                        <p align="left">Mensaje</p>
                                        <textarea cols="53" id="editor3" name="mensaje" rows="10"></textarea>
                                    </div>

                                    <div class="form-group" align="left">
                                        <p align="left">Sube tu video (opcional)</p>
                                        <input id="file3" name="archivo" type="file" accept="video/mp4"/>
                                        <div class="progress" style="height: 5%">
                                            <div class="bar"></div >
                                            <div class="percent">0%</div >
                                        </div>
                                    </div>

                                    <!-- Form actions -->
                                    <br>
                                    <div class="col-md-12 text-center">
                                        <button id="denuncia" onclick="subirArchivo(3)" type="submit" class="btn btn-primary btn-lg text-reset">Enviar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
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
                    <form action="/contacto" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <input type="hidden" name="opcion" value="4">
                        <div class="card" >
                            <div class="card-body">
                                <div id="obligatorio">
                                    <!-- Name input-->
                                    <div class="form-group">
                                        <p align="left">Nombre</p>
                                        <div>
                                            <input id="name4" name="name" type="text" placeholder="Ingrese nombre" class="form-control" pattern="([A-z]|ñ|\s)*">
                                        </div>
                                    </div>

                                    <!-- Email input-->
                                    <div class="form-group">
                                        <p align="left">Correo</p>
                                        <div>
                                            <input id="email4" name="email" type="text" placeholder="Ingrese email" class="form-control" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}">
                                        </div>
                                    </div>

                                    <!-- Message input-->
                                    <div>
                                        <p align="left">Mensaje</p>
                                        <textarea cols="53" id="editor4" name="mensaje" rows="10"></textarea>
                                    </div>

                                    <div class="form-group" align="left">
                                        <p align="left">Sube tu video (opcional)</p>
                                        <input id="file4" name="archivo" type="file" accept="video/mp4"/>
                                        <div class="progress" style="height: 5%">
                                            <div class="bar"></div >
                                            <div class="percent">0%</div >
                                        </div>
                                    </div>

                                    <!-- Form actions -->
                                    <br>
                                    <div class="col-md-12 text-center">
                                        <button id="otro" onclick="subirArchivo(4)" type="submit" class="btn btn-primary btn-lg text-reset">Enviar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    </body>

{{--    boton de enviando...--}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script>
        $(document).ready(function() {
            $('.btn').on('click', function() {
                var $this = $(this);
                var loadingText = '<i class="fa fa-circle-o-notch fa-spin"></i> enviando...';
                if ($(this).html() !== loadingText) {
                    $this.data('original-text', $(this).html());
                    $this.html(loadingText);
                }
                var op=parseInt($('#op').val());
                //valida los campos que no esten vacios, de estarlos los botones se restablecen y se envia un mensaje
                switch (op) {
                    case 1:
                        var name=$('#name').val();
                        var email=$('#email').val();
                        if(name=="" || email==""){
                            //alert("");
                            $('#consulta').html($('#consulta').data('original-text'));
                            return false;
                        }
                        //var textArea=$('#cke_editor1').val();
                        var textArea=CKEDITOR.instances.editor1.getData();
                        var archivo=$('#file').val();
                        if(textArea=="" && archivo==""){
                            alert("El correo debe contener un mensaje o un video.");
                            $('#consulta').html($('#consulta').data('original-text'));
                            return false;
                        }
                        break;
                    case 2:
                        var name=$('#name2').val();
                        var rut=$('#rut').val();
                        var email=$('#email2').val();
                        var ciudad=$('#ciudad').val();
                        var phone=$('#phone').val();
                        var profesion=$('#profesion').val();
                        if(name=="" || email=="" || rut=="" || ciudad=="" || phone=="" || profesion==""){
                            $('#voluntario').html($('#voluntario').data('original-text'));
                            return false;
                        }
                        var archivo=$('#file2').val();
                        if(archivo==""){
                            alert("El correo debe contener un mensaje o un video.");
                            $('#voluntario').html($('#voluntario').data('original-text'));
                            return false;
                        }
                        break;
                    case 3:
                        //var name=$('#name3').val();
                        var email=$('#email3').val();
                        if(email==""){
                            $('#denuncia').html($('#denuncia').data('original-text'));
                            return false;
                        }
                        //var textArea=$('#editor3').val();
                        var textArea=CKEDITOR.instances.editor3.getData();
                        var archivo=$('#file3').val();
                        if(textArea=="" && archivo==""){
                            alert("El correo debe contener un mensaje o un video.");
                            $('#denuncia').html($('#denuncia').data('original-text'));
                            return false;
                        }
                        break;
                    case 4:
                        var name=$('#name4').val();
                        var email=$('#email4').val();
                        if(name=="" || email==""){
                            $('#otro').html($('#otro').data('original-text'));
                            return false;
                        }
                        //var textArea=$('#editor4').val();
                        var textArea=CKEDITOR.instances.editor4.getData();
                        var archivo=$('#file4').val();
                        if(textArea=="" && archivo==""){
                            alert("El mensaje debe contener un mensaje o un video.");
                            $('#otro').html($('#otro').data('original-text'));
                            return false;
                        }
                        break;
                }

                // setTimeout(function() {
                //     $this.html($this.data('original-text'));
                // }, 2000);
            });
        })
    </script>

{{--    subida de archivo(barra de progreso)--}}
    <script src="http://malsup.github.com/jquery.form.js"></script>
    <script type="text/javascript">

        // function validate(formData, jqForm, options) {
        //     var form = jqForm[0];
        //     if (!form.archivo.value) {
        //         alert('File not found');
        //         return false;
        //     }
        // }
        //codigo repetido
        // function checkmsn() {
        //     //var op=$('#op').val();
        //     var op=parseInt($('#op').val());
        //     switch (op) {
        //         case 1:
        //             var textArea=$('#editor1').val();
        //             var archivo=$('#file').val();
        //             if(textArea=="" && archivo==""){
        //                 alert("El mensaje debe contener un mensaje o un video.");
        //                 //$('#consulta').html($('#consulta').data('original-text'));
        //                 return false;
        //             }
        //             break;
        //         case 2:
        //             var archivo=$('#file2').val();
        //             if(archivo==""){
        //                 alert("El mensaje debe contener un archivo pdf");
        //                 //$('#voluntario').html($('#voluntario').data('original-text'));
        //                 return false;
        //             }
        //             break;
        //         case 3:
        //             var textArea=$('#editor3').val();
        //             var archivo=$('#file3').val();
        //             if(textArea=="" && archivo==""){
        //                 alert("El mensaje debe contener un mensaje o un video.");
        //                 //$('#denuncia').html($('#denuncia').data('original-text'));
        //                 return false;
        //             }
        //             break;
        //         case 4:
        //             var textArea=$('#editor4').val();
        //             var archivo=$('#file4').val();
        //             if(textArea=="" && archivo==""){
        //                 alert("El mensaje debe contener un mensaje o un video.");
        //                 //$('#otro').html($('#otro').data('original-text'));
        //                 return false;
        //             }
        //             break;
        //     }
        //
        // }
        function restablecerBotones() {
            $('#consulta').html($('#consulta').data('original-text'));
            $('#voluntario').html($('#voluntario').data('original-text'));
            $('#denuncia').html($('#denuncia').data('original-text'));
            $('#otro').html($('#otro').data('original-text'));
            $('#consulta').removeAttr('disabled');
            $('#voluntario').removeAttr('disabled');
            $('#denuncia').removeAttr('disabled');
            $('#otro').removeAttr('disabled');
            var bar = $('.bar');
            var percent = $('.percent');
            var percentVal = '0%';
            bar.width(percentVal);
            percent.html(percentVal);
        }
        function subirArchivo(op) {
            var bar = $('.bar');
            var percent = $('.percent');
            var status = $('#status');
            var percentVal = '0%';
            //se guarda la opcion en el input op del inicio
            document.getElementById("op").value = op;
            $('form').ajaxForm({
                //beforeSubmit: validate,
                //beforeSubmit: checkmsn,
                beforeSend: function() {
                    $('#consulta').attr('disabled','disabled');
                    $('#voluntario').attr('disabled','disabled');
                    $('#denuncia').attr('disabled','disabled');
                    $('#otro').attr('disabled','disabled');
                    status.empty();
                    percentVal = '0%';
                    var posterValue = $('input[name=archivo]').fieldValue();
                    bar.width(percentVal);
                    percent.html(percentVal);
                },
                uploadProgress: function(event, position, total, percentComplete) {
                    var file="";
                    switch (op) {
                        case 1:
                            file=$('#file').val();
                            break;
                        case 2:
                            file=$('#file2').val();
                            break;
                        case 3:
                            file=$('#file3').val();
                            break;
                        case 4:
                            file=$('#file4').val();
                            break;
                    }
                    if(file!=""){
                        var percentVal = percentComplete + '%';
                        bar.width(percentVal);
                        percent.html(percentVal);
                    }
                },
                success: function() {
                    bar.width(percentVal);
                    percent.html(percentVal);
                },
                complete: function(xhr) {
                    debugger;
                    var percentVal = 'Wait, Saving';
                    status.html(xhr.responseText);
                    var aux=xhr.responseText;
                    if(aux=='error'){
                        alert('Error inténtelo mas tarde');
                        restablecerBotones();
                        return false;
                    }else{
                        if(aux=="{\"message\":\"The given data was invalid.\",\"errors\":{\"name\":[\"El campo name es obligatorio.\"]}}" ||
                        aux=="{\"message\":\"The given data was invalid.\",\"errors\":{\"archivo\":[\"El campo archivo debe ser un archivo de tipo: pdf.\"]}}" ||
                        aux=="{\"message\":\"The given data was invalid.\",\"errors\":{\"archivo\":[\"El campo archivo debe ser un archivo de tipo: mp4.\"]}}"){
                            alert('Formato invalido');
                            restablecerBotones();
                            return false;
                        }else{
                            alert('Mensaje enviado');
                        }
                    }
                    restablecerBotones()
                    window.location.href = "/contacto";
                }
            });
        }
    </script>

{{--    tabs--}}
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

{{--    ckeditor--}}
    <script>
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
        CKEDITOR.replace('editor3', {
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
        CKEDITOR.replace('editor4', {
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

{{--    validar rut--}}
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
