@extends('layoutGeneral')
@section('content')

{{--    se esta usando la version 4.0.0 de boostrap--}}
{{--<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">--}}
{{--<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>--}}
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
{{--ya esta agregardo el ajax en el header--}}
{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>--}}
{{--<!------ Include the above in your HEAD tag ---------->--}}



    <div class="col-md-8" >
        <div class="col-md-12">

            <h4>Contacto</h4>
            <!-- MENU con checkbox-->

            <div class="funkyradio">

                <div class="funkyradio-default">
                    <input type="radio" name="radio" class="consulta" id="radio1" value="1"  />
                    <label for="radio1">Consulta</label>
                    <!-- Form -->
                    <div id="content" style="display: none;">
                        <!-- Lo que se muestra del formulario de consulta-->
                        <p>Verifique que su consulta no se encuentre en <a href="enlacepagina.html">Preguntas Frecuentes</a></p>
                        <div class="container">

                            <div class="col-md-6 col-md-offset-3" >
                                <div class="well well-sm">
                                    <form class="form-horizontal" action="" method="post">

                                        <fieldset>
                                            <!-- Name input-->
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="name">Nombre</label>
                                                <div class="col-md-9">
                                                    <input id="name" name="name" type="text" placeholder="Ingrese nombre" class="form-control">
                                                </div>
                                            </div>

                                            <!-- Email input-->
                                            <div class="form-group">
                                                <label class="col-md-3 control-label " for="email">Correo</label>
                                                <div class="col-md-9">
                                                    <input id="email" name="email" type="text" placeholder="Ingrese email" class="form-control">
                                                </div>
                                            </div>

                                            <!-- Message body -->
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="message">Consulta</label>
                                                <div class="col-md-9">
                                                    <textarea class="form-control" id="message" name="message" placeholder="Ingrese consulta aqui..." rows="5"></textarea>
                                                </div>
                                            </div>

                                            <!-- Form actions -->
                                            <div class="form-group">
                                                <div class="col-md-12 text-center">
                                                    <button type="submit" class="btn btn-primary btn-lg">Enviar</button>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Formulario de Voluntario -->
                <div class="funkyradio-primary">
                    <input type="radio" name="radio" class="consulta" id="radio2" value="2" />
                    <label for="radio2">Voluntario</label>
                    <!-- Form -->
                    <div id="content2" style="display: none;">
                        <div class="container">
                            <div class="col-md-6 col-md-offset-3">
                                <div class="well well-sm">
                                    <div class="form-horizontal" action="" method="post">

                                        <fieldset>
                                            <!-- Name input-->
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="name">Nombre</label>
                                                <div class="col-md-9">
                                                    <input id="name" name="name" type="text" placeholder="Ingrese nombre" class="form-control">
                                                </div>
                                            </div>

                                            <!-- Rut input-->

                                            <!-- Email input-->
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="email">Correo</label>
                                                <div class="col-md-9">
                                                    <input id="email" name="email" type="text" placeholder="Ingrese email" class="form-control">
                                                </div>
                                            </div>

                                            <!-- Ciudad input-->
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="name">Ciudad</label>
                                                <div class="col-md-9">
                                                    <input id="ciudad" name="ciudad" type="text" placeholder="Ingrese ciudad" class="form-control">
                                                </div>
                                            </div>

                                            <!-- phone input-->
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="email">Telefono (+56912345678)</label>
                                                <div class="col-md-9">
                                                     <input id="phone" name="phone" type="tel" placeholder="Ingrese Telefono" pattern="+569[0-9]{8}" required class="form-control">
                                                </div>
                                            </div>

                                            <!-- Direccion input-->
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="name">Direccion</label>
                                                <div class="col-md-9">
                                                    <input id="name" name="name" type="text" placeholder="Ingrese nombre" class="form-control">
                                                </div>
                                            </div>

                                            <!-- Profesion input-->
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="name">Profesion</label>
                                                <div class="col-md-9">
                                                    <input id="profesion" name="profesion" type="text" placeholder="Ingrese profesion" class="form-control">
                                                </div>
                                            </div>

                                            <!-- Form actions -->
                                            <div class="form-group">
                                                <div class="col-md-12 text-right">
                                                    <button type="submit" class="btn btn-primary btn-lg">Enviar</button>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>

                <!-- Formulario de Denuncias-->
                <div class="funkyradio-success">
                    <input type="radio" name="radio" class="consulta" id="radio3" value="3" />
                    <label for="radio3">Denuncias</label>
                    <!-- FORM -->
                    <div id="content3" style="display: none;">
                        denuncias
                    </div>
                </div>

                <!-- Formulario de Otros-->
                <div class="funkyradio-danger">
                    <input type="radio" name="radio" class="consulta" id="Otros" value="4" />
                    <label for="radio4">Otros</label>
                    <!-- FORM -->
                    <div id="content4" style="display: none;">
                        otrooooos
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Script que hace la funcion de show and hide -->
    <script type="text/javascript">
        $(document).ready(function () {
            $(".consulta").click(function (evento) {
                var valor = $(this).val();

                if (valor == '1'){
                    $("#content").css("display","block");
                    $("#content2").css("display","none");
                    $("#content3").css("display","none");
                    $("#content4").css("display","none");
                }else if(valor == '2') {
                    $("#content").css("display","none");
                    $("#content2").css("display","block");
                    $("#content3").css("display","none");
                    $("#content4").css("display","none");
                }else if(valor == '3'){
                    $("#content").css("display","none");
                    $("#content2").css("display","none");
                    $("#content3").css("display","block");
                    $("#content4").css("display","none");
                }else if(valor == '4'){
                    $("#content").css("display","none");
                    $("#content2").css("display","none");
                    $("#content3").css("display","none");
                    $("#content4").css("display","block");
                }
            })

        })

    </script>
@endsection
