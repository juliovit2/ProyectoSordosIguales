@extends('layoutGeneral')
@section('content')

{{--    se esta usando la version 4.0.0 de boostrap--}}
{{--<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">--}}
{{--<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>--}}
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
{{--ya esta agregardo el ajax en el header--}}
{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>--}}
{{--<!------ Include the above in your HEAD tag ---------->--}}

    <div class="col-md-4">
        <div class="col-md-6">
            <h4>Radio Buttons</h4>
            <!-- MENU con checkbox-->
            <div class="funkyradio">

                <div class="funkyradio-default">


                    <input type="radio" name="radio" class="consulta" id="radio1" value="1"  />
                    <label for="radio1">First Option default</label>
                    <!-- Form -->
                    <div id="content" style="display: none;">
                        <!-- Lo que se muestra del formulario en la página -->
                        <div class="container">
                            <h2>Horizontal form</h2>
                            <form class="form-horizontal" action="/action_page.php">
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="email">Email:</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="pwd">Password:</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <div class="checkbox">
                                            <label><input type="checkbox" name="remember"> Remember me</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-default">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <div class="funkyradio-primary">
                    <input type="radio" name="radio" class="consulta" id="radio2" value="2" />
                    <label for="radio2">Second Option primary</label>
                    <!-- Form -->
                    <div id="content2" style="display: none;">
                        bla bla bla
                    </div>
                </div>
                <div class="funkyradio-success">
                    <input type="radio" name="radio" id="radio3" />
                    <label for="radio3">Third Option success</label>
                </div>
                <div class="funkyradio-danger">
                    <input type="radio" name="radio" id="radio4" />
                    <label for="radio4">Fourth Option danger</label>
                </div>
                <div class="funkyradio-warning">
                    <input type="radio" name="radio" id="radio5" />
                    <label for="radio5">Fifth Option warning</label>
                </div>
                <div class="funkyradio-info">
                    <input type="radio" name="radio" id="radio6" />
                    <label for="radio6">Sixth Option info</label>
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
                }else {
                    $("#content").css("display","none");
                    $("#content2").css("display","block");
                }
            })

        })

    </script>
@endsection
