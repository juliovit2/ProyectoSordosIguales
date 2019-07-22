@extends('layoutGeneral')
@section('title')
    Contacto
@endsection
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
                            <p>Verifique que su consulta no se encuentre en <a href="/faq/show">Preguntas Frecuentes</a><br>o</p>
                            <a href="skype:live:cnr_118?call">
                                <img alt="ERROR" src="{{asset("skype.png")}}" style="height: 30px; width: 30px" >
                                <a href="skype:live:cnr_118?call">Llamanos via Skype</a>
                            </a>
                            <form action="/contacto" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <!-- Campos obligatorios-->
                                    <input type="hidden" name="opcion" value="1">
                                    <div id="obligatorio">
                                        <!-- Name input-->
                                        <div class="form-group">
                                            <p align="left">Nombre</p>
                                            <div>
                                                <input required id="name" name="name" type="text" placeholder="Ingrese nombre" class="form-control" pattern="([A-z]|ñ|\s)*">
                                            </div>
                                        </div>

                                        <!-- Email input-->
                                        <div class="form-group">
                                            <p align="left">Correo</p>
                                            <div>
                                                <input required id="email" name="email" type="text" placeholder="Ingrese email" class="form-control" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}">
                                            </div>
                                        </div>

                                        <!-- Message input-->
                                        <div>
                                            <p align="left">Mensaje</p>
                                            <textarea cols="53" id="editor1" name="mensaje" rows="10"></textarea>
                                        </div>

                                        <div class="form-group" align="left">
                                            <input id="archivo1" type="hidden" name="archivo">
                                            <p align="left">Sube tu video (opcional)</p>
                                            <input name="archivo" id="file" type="file" accept="video/mp4"/>
                                            <div class="progress" style="height: 5%">
                                                <div class="bar"></div >
                                                <div class="percent">0%</div >
                                            </div>
                                        </div>
                                        <!-- Form actions -->
                                        <br>
                                        <div class="col-md-12 text-center">
                                            <button id="consulta" onclick="revisarv2(1)" type="button" class="btn btn-primary btn-lg text-reset">Enviar</button>
                                        </div>
                                    </div>
                            </form>
                            <br>


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
                                        <input required id="name2" name="name" type="text" placeholder="Ingrese nombre" class="form-control" pattern="([A-z]|ñ|\s)*">
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
                                        <input required id="email2" name="email" type="text" placeholder="Ingrese email" class="form-control" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}">
                                    </div>
                                </div>

                                <!-- Ciudad input-->
                                <div class="form-group">
                                    <p align="left">Ciudad</p>
                                    <div>
                                        <input required id="ciudad" name="ciudad" type="text" placeholder="Ingrese ciudad" class="form-control" pattern="([A-z]|ñ|\s)*">
                                    </div>
                                </div>

                                <!-- phone input-->
                                <div class="form-group">
                                    <p align="left">Telefono (Ej. 12345678)</p>
                                    <div>
                                        {{--                                                    <input id="phone" name="phone" type="tel" placeholder="Ingrese Telefono" pattern="+569[0-9]{8}" required class="form-control">--}}
                                        <input required id="phone" name="phone" type="tel" placeholder="Ingrese Telefono" class="form-control" pattern="[0-9]{8}">
                                    </div>
                                </div>

                                <!-- Profesion input-->
                                <div class="form-group">
                                    <p align="left">Profesion</p>
                                    <div>
                                        <input required id="profesion" name="profesion" type="text" placeholder="Ingrese profesion" class="form-control" pattern="([A-z]|ñ|\s)*">
                                    </div>
                                </div>

                                <!-- upload file -->
                                <div class="form-group" align="left">
                                    <p align="left">Certificados o Curriculum</p>
                                    <input id="file2" name="archivo" type="file" accept="application/pdf" />
{{--                                    <input id="file2" name="archivo" onchange="subidav2(this,2)" type="file" accept="application/pdf" />--}}
{{--                                    <input id="archivo2" type="hidden" name="archivo">--}}
{{--                                    <input id="file2" onchange="subidav2(this,2)" type="file" accept="application/pdf" />--}}
{{--                                    <div class="progress" style="height: 5%">--}}
{{--                                        <div class="bar"></div >--}}
{{--                                        <div class="percent">0%</div >--}}
{{--                                    </div>--}}
                                </div>
                                <!-- Form actions -->
                                <div class="form-group">
                                    <div class="text-center">
                                        <button id="voluntario" onclick="revisar(2)" type="button" class="btn btn-primary btn-lg text-reset">Enviar</button>
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
                                <p>Envia tu denuncia <br>o</p>
                                <a href="skype:live:cnr_118?call">
                                    <img alt="ERROR" src="{{asset("skype.png")}}" style="height: 30px; width: 30px" >
                                    <a href="skype:live:cnr_118?call">Llamanos via Skype</a>
                                </a>
                                <div id="obligatorio">
                                    <div class="form-group">
                                        <p align="left">Tipo de denuncia</p>
                                        <div align="left">
                                            <select id="denunciaId" name="tipoDenuncia">
                                                <option disabled selected value=""> -- Seleccione una opcion -- </option>
                                                <option value="Discriminacion">Discriminacion</option>
                                                <option value="Salud">Salud</option>
                                                <option value="Laboral">Laboral</option>
                                                <option value="Judicial">Educacion</option>
                                                <option value="Violencia en el pololeo">Violencia en el pololeo</option>
                                                <option value="Violencia en el intrefamiliar">Violencia en el intrefamiliar</option>
                                                <option value="Otro">Otro</option>
                                            </select>
                                        </div>
                                    </div>
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
                                            <input required id="email3" name="email" type="text" placeholder="Ingrese email" class="form-control" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}">
                                        </div>
                                    </div>

                                    <!-- Message input-->
                                    <div>
                                        <p align="left">Mensaje</p>
                                        <textarea cols="53" id="editor3" name="mensaje" rows="10"></textarea>
                                    </div>

                                    <div class="form-group" align="left">
                                        <p align="left">Sube tu video (opcional)</p>
{{--                                        <input id="archivo3" type="hidden" name="archivo">--}}
{{--                                        <input id="file3" onchange="subidav2(this,3)" type="file" accept="video/mp4"/>--}}
                                        <input id="file3" name="archivo" type="file" accept="video/mp4"/>
                                        <div class="progress" style="height: 5%">
                                            <div class="bar"></div >
                                            <div class="percent">0%</div >
                                        </div>
                                    </div>

                                    <!-- Form actions -->
                                    <br>
                                    <div class="col-md-12 text-center">
                                        <button id="denuncia" onclick="revisarv2(3)" type="button" class="btn btn-primary btn-lg text-reset">Enviar</button>
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
                                <p>Cuentanos mas<br>o</p>
                                <a href="skype:live:cnr_118?call">
                                    <img alt="ERROR" src="{{asset("skype.png")}}" style="height: 30px; width: 30px" >
                                    <a href="skype:live:cnr_118?call">Llamanos via Skype</a>
                                </a>
                                <div id="obligatorio">
                                    <!-- Name input-->
                                    <div class="form-group">
                                        <p align="left">Nombre</p>
                                        <div>
                                            <input required id="name4" name="name" type="text" placeholder="Ingrese nombre" class="form-control" pattern="([A-z]|ñ|\s)*">
                                        </div>
                                    </div>

                                    <!-- Email input-->
                                    <div class="form-group">
                                        <p align="left">Correo</p>
                                        <div>
                                            <input required id="email4" name="email" type="text" placeholder="Ingrese email" class="form-control" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}">
                                        </div>
                                    </div>

                                    <!-- Message input-->
                                    <div>
                                        <p align="left">Mensaje</p>
                                        <textarea cols="53" id="editor4" name="mensaje" rows="10"></textarea>
                                    </div>

                                    <div class="form-group" align="left">
                                        <p align="left">Sube tu video (opcional)</p>
{{--                                        <input id="archivo4" type="hidden" name="archivo">--}}
                                        <input id="file4" name="archivo" type="file" accept="video/mp4"/>
                                        <div class="progress" style="height: 5%">
                                            <div class="bar"></div >
                                            <div class="percent">0%</div >
                                        </div>
                                    </div>

                                    <!-- Form actions -->
                                    <br>
                                    <div class="col-md-12 text-center">
                                        <button id="otro" onclick="revisarv2(4)" type="button" class="btn btn-primary btn-lg text-reset">Enviar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!--pop up confirmacion voluntario -->
    <div class="modal fade" id="confirmVoluntario">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirmacion</h5>
                    <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>¿Esta seguro de enviar el correo?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                    <button id="btnCon2" onclick="enviarVoluntario(2)" data-dismiss="modal" type="button" class="btn btn-primary">Enviar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- endf pop up-->

    <!--pop up confirmacion -->
    <div class="modal fade" id="confirm">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirmacion</h5>
                    <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>¿Esta seguro de enviar el correo?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                    <button id="btnCon" onclick="enviar()" type="button" data-dismiss="modal" class="btn btn-primary">Enviar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- endf pop up-->

    <!--pop up alerta -->
    <div class="modal fade" id="alert">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Error</h5>
                    <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p id="mensaje"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- endf pop up-->

    <!--pop up success -->
    {{--    undismiss modal--}}
    <div class="modal fade" id="success" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Correo enviado</h5>
                    <button tyle="button" class="close" onclick="refresh()" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p id="mensajeSuccess"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="refresh()" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- endf pop up-->

    </body>
    {{--    subida de archivo(barra de progreso)--}}
    <script src="http://malsup.github.com/jquery.form.js"></script>
    {{--    script para consulta,denuncia y otro--}}
    <script type="text/javascript" src="{{asset('js/bootstrap.js')}}"></script>

    <script type="text/javascript">
        var opcion="";
        var $this="";

        //funciona con la funcion de enviarVoluntario() en la otra etiqueta
        function revisar(op) {//voluntario
            jQuery.noConflict();//existe mas de jQuery, por lo que existe conflicto al utilizar la funcion
            opcion=op;
            var name=document.getElementById("name2").value;;
            var email=document.getElementById("email2").value;;
            var rut=document.getElementById("rut").value;
            var city=document.getElementById("ciudad").value;
            var numero=document.getElementById("phone").value;
            var profesion=document.getElementById("profesion").value;;
            if(name=="" || rut=="" || email=="" || city=="" || numero=="" || profesion==""){
                msnVal="Los siguientes campos no han sido completados:<br> <br>";
                if(name==""){
                    msnVal+="nombre <br>";
                }
                if(rut==""){
                    msnVal+="rut <br>";
                }
                if(email==""){
                    msnVal+="correo <br>";
                }
                if(city==""){
                    msnVal+="ciudad <br>";
                }
                if(numero==""){
                    msnVal+="telefono <br>";
                }
                if(profesion==""){
                    msnVal+="profesion <br>";
                }
                document.getElementById("mensaje").innerHTML=msnVal;
                $("#alert").modal('show');
                return false;
            }
            var archivo=$('#file2').val();
            if(archivo==""){
                document.getElementById("mensaje").innerHTML="Debe subir un Certificados o Curriculum";
                $("#alert").modal('show');
                return false;
            }
            $("#confirmVoluntario").modal('show');
        }

        function revisarv2(op) {
            var msnVal="";
            //valida los campos que no esten vacios, de estarlos los botones se restablecen y se envia un mensaje
            opcion=op;
            jQuery.noConflict();//existe mas de jQuery, por lo que existe conflicto al utilizar la funcion
            switch (op) {
                case 1:
                    var name=$('#name').val();
                    var email=$('#email').val();
                    if(name=="" || email==""){
                        msnVal="Los siguientes campos no han sido completados:<br> <br>";
                        if(name==""){
                            msnVal+="nombre <br>";
                        }
                        if(email==""){
                            msnVal+="correo";
                        }
                        document.getElementById("mensaje").innerHTML=msnVal;
                        $("#alert").modal('show');
                        return false;
                    }
                    //var textArea=$('#cke_editor1').val();
                    var textArea=CKEDITOR.instances.editor1.getData();
                    var archivo=$('#file').val();
                    if(textArea=="" && archivo==""){
                        document.getElementById("mensaje").innerHTML="El correo debe contener un mensaje o un video.";
                        $("#alert").modal('show');
                        return false;
                    }
                    break;
                case 3:
                    var denun=$('#denunciaId').val();
                    if(denun==null){
                        document.getElementById("mensaje").innerHTML="El debe seleccionar el tipo de denuncia";
                        $("#alert").modal('show');
                        return false;
                    }
                    var email=$('#email3').val();
                    if(email==""){
                        document.getElementById("mensaje").innerHTML="El mensaje debe contener su email";
                        $("#alert").modal('show');
                        return false;
                    }
                    var textArea=CKEDITOR.instances.editor3.getData();
                    var archivo=$('#file3').val();
                    if(textArea=="" && archivo==""){
                        document.getElementById("mensaje").innerHTML="El correo debe contener un mensaje o un video";
                        $("#alert").modal('show');
                        return false;
                    }

                    break;
                case 4:
                    var name=$('#name4').val();
                    var email=$('#email4').val();
                    if(name=="" || email==""){
                        msnVal="Los siguientes campos no han sido completados:<br> <br>";
                        if(name==""){
                            msnVal+="nombre <br>";
                        }
                        if(email==""){
                            msnVal+="correo";
                        }
                        document.getElementById("mensaje").innerHTML=msnVal;
                        $("#alert").modal('show');
                        return false;
                        //return false;
                    }
                    //var textArea=$('#editor4').val();
                    var textArea=CKEDITOR.instances.editor4.getData();
                    var archivo=$('#file4').val();
                    if(textArea=="" && archivo==""){
                        document.getElementById("mensaje").innerHTML="El correo debe contener un mensaje o un video.";
                        $("#alert").modal('show');
                        return false;
                    }
                    break;
            }
            $("#confirm").modal('show');
        }

        //boton de carga
        $(document).ready(function() {
            $('#btnCon').on('click', function() {
                switch (opcion) {
                    case 1:
                        $this=$('#consulta');
                        break;
                    case 3:
                        $this=$('#denuncia');
                        break;
                    case 4:
                        $this=$('#otro');
                        break;
                }
                var loadingText = '<i class="fa fa-circle-o-notch fa-spin"></i> enviando...';
                if ($(this).html() !== loadingText) {
                    $this.data('original-text', $(this).html());
                    $this.html(loadingText);
                }
                $this.attr('disabled','disabled');
            });
            $('#btnCon2').on('click', function() {
                $this=$('#voluntario');
                var loadingText = '<i class="fa fa-circle-o-notch fa-spin"></i> enviando...';
                if ($(this).html() !== loadingText) {
                    $this.data('original-text', $(this).html());
                    $this.html(loadingText);
                }
                $this.attr('disabled','disabled');
            });
        });
        //enviar funcion enviar para consulta, denuncia y otros
        function enviar() {
            var img;
            var name;
            var email;
            var msn;
            var tdenun="";//tipo de denuncia
            var vacios;//indica si los campos name y email estan vacios
            switch (opcion) {
                case 1:
                    name=document.getElementById("name").value;
                    email= document.getElementById("email").value;
                    msn=CKEDITOR.instances.editor1.getData();
                    img=document.getElementById("file");
                    $('#consulta').attr('disabled','disabled');
                    break;
                case 3:
                    tdenun=document.getElementById("denunciaId").value;
                    name=document.getElementById("name3").value;
                    email= document.getElementById("email3").value;
                    msn=CKEDITOR.instances.editor3.getData();
                    img=document.getElementById("file3");
                    $('#denuncia').attr('disabled','disabled');
                    break;
                case 4:
                    name=document.getElementById("name4").value;
                    email= document.getElementById("email4").value;
                    msn=CKEDITOR.instances.editor4.getData();
                    img=document.getElementById("file4");
                    $('#otro').attr('disabled','disabled');
                    break;
            }
            var bar = $('.bar');
            var percent = $('.percent');
            var form_data = new FormData();
            if(img.value!=""){
                form_data.append('archivo', img.files[0]);
            }else{
                form_data.append('archivo', "");
                img="";
            }
            form_data.append('op', opcion);
            form_data.append('name', name);
            form_data.append('email', email);
            form_data.append('mensaje', msn);
            form_data.append('tipoDenuncia', tdenun);
            form_data.append('_token', '{{csrf_token()}}');

            $.ajax({
                xhr: function() {
                    var xhr = new window.XMLHttpRequest();
                    if(img!="") {
                        xhr.upload.addEventListener("progress", function (evt) {//proceso de carga
                            if (evt.lengthComputable) {
                                var percentComplete = (evt.loaded / evt.total) * 100;
                                var percentVal = percentComplete + '%';
                                bar.width(percentVal);
                                percent.html(percentVal);
                            }
                        }, false);
                    }
                    return xhr;
                },
                url: "{{url('contacto')}}",
                data: form_data,
                type: 'POST',
                contentType: false,
                processData: false,
                success: function (data) {
                    if (data.fail) {
                        alert(data.errors['file']);
                    }
                    $this.html("Enviar");
                    $this.removeAttr('disabled');
                },
                error: function (xhr, status, error) {
                    var percentVal='0%';
                    bar.width(percentVal);
                    percent.html(percentVal);
                    switch (opcion) {
                        case 1:
                            name=$('#name').val();
                            email=$('#email').val();
                            break;
                        case 3:
                            name="anonymous"
                            email=$('#email3').val();
                            break;
                        case 4:
                            name=$('#name4').val();
                            email=$('#email4').val();
                            break;
                    }
                    if(name!="" && email!=""){
                        if(error=="Unprocessable Entity" && img!=""){
                            jQuery.noConflict();
                            document.getElementById("mensaje").innerHTML="El formato invalido o el archivo supera los 30mb";
                            $("#alert").modal('show');
                        }
                    }else{
                        vacios=true;
                    }
                    $this.html("Enviar");
                    $this.removeAttr('disabled');
                },
                complete: function(xhr) {
                    jQuery.noConflict();
                    if(!vacios){
                        if(msn!="" || img!=""){
                            document.getElementById("mensajeSuccess").innerHTML=xhr.responseText;
                            $("#success").modal('show');
                            //alert(xhr.responseText);//recibe el return del controlador
                            //window.location.href = "/contacto";
                        }
                    }else{
                        document.getElementById("mensaje").innerHTML="por favor complete los campos";
                        $("#alert").modal('show');
                    }
                    $this.html("Enviar");
                    $this.removeAttr('disabled');
                }
            });
        }
    </script>
    {{--    script para voluntario--}}
    <script>
        function enviarVoluntario(op) {
            var refresh=true;
            var form_data = new FormData();

            var name=document.getElementById("name2").value;;
            var email=document.getElementById("email2").value;;
            var rut=document.getElementById("rut").value;
            var city=document.getElementById("ciudad").value;
            var numero=document.getElementById("phone").value;
            var profesion=document.getElementById("profesion").value;;
            var file=document.getElementById("file2");
            form_data.append('opcion', op);
            form_data.append('name', name);
            form_data.append('email', email);
            form_data.append('rut', rut);
            form_data.append('ciudad', city);
            form_data.append('phone', numero);
            form_data.append('profesion', profesion);
            form_data.append('archivo', file.files[0]);
            form_data.append('_token', '{{csrf_token()}}');

            $.ajax({
                url: "{{url('contacto')}}",
                data: form_data,
                type: 'POST',
                contentType: false,
                processData: false,
                success: function (data) {
                    if (data.fail) {
                        alert(data.errors['file']);
                    }
                    $this.html("Enviar");
                    $this.removeAttr('disabled');
                },
                error: function (xhr, status, error) {
                    if(error=="Unprocessable Entity"){
                        refresh=false;
                        alert("improcesable");
                    }
                },
                complete: function(xhr) {
                    if(refresh){
                        document.getElementById("mensajeSuccess").innerHTML=xhr.responseText;
                        $("#success").modal('show');
                        //window.location.href = "/contacto";
                    }else{
                        $this.html("Enviar");
                        $this.removeAttr('disabled');
                        alert("Debe subir un Certificados o Curriculum");
                    }

                }
            });
        }

        function refresh() {
            window.location.href = "/contacto";
        }
    </script>

    {{--    iconos para el boton enviar...--}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

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
