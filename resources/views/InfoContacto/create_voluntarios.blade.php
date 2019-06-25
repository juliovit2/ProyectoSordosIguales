@extends('layoutGeneral')
@section('content')
    <script type="text/javascript" src="{{ URL::asset('js/summernote-es-ES.js') }}"></script>
    <div class="container mt-5 mb-5 containerForm">
        <div class="row">
            <div class="col-md">
                <form id="form" action="" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    @if(isset($v))
                        <div class="form-group">
                            <label for="Nombre"><h4>Nombre *</h4></label>
                            <input type="text" id="nombre" name="nombre" class="form-control" value="{{$v->nombre}}">
                        </div>

                        <div class="form-group">
                            <label for="Telefono"><h4>Telefono *</h4></label>
                            <input type="text" id="telefono" name="telefono" class="form-control" value="{{$v->telefono}}">
                        </div>

                        <div class="form-group">
                            <label for="Rut"><h4>Rut *</h4></label>
                            <input type="text" id="rut" name="rut" class="form-control" value="{{$v->rut}}">
                        </div>

                        <div class="form-group">
                            <label for="Correo"><h4>Correo *</h4></label>
                            <input type="text" id="correo" name="correo" class="form-control" value="{{$v->correo}}">
                        </div>

                        <div class=form-group">
                            <input id="but" type="button" value="Editar Voluntario" class="btn btn-primary">
                        </div>
                    @else
                        <div class="form-group">
                            <label for="Nombre"><h4>Nombre *</h4></label>
                            <input type="text" id="nombre" name="nombre" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="Telefono"><h4>Telefono *</h4></label>
                            <input type="text" id="telefono" name="telefono" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="Rut"><h4>Rut *</h4></label>
                            <input type="text" id="rut" name="rut" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="Correo"><h4>Correo *</h4></label>
                            <input type="text" id="correo" name="correo" class="form-control">
                        </div>

                        <div class=form-group">
                            <input id="but" type="button" value="Agregar Voluntario" class="btn btn-primary">
                        </div>
                    @endif


                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#but').click(function () {
                if($('#nombre').val().replace(" ","").length <= 0) {
                    alert("El campo nombre es obligatorio.");
                    return;
                }

                if($('#telefono').val().replace(" ","").length <= 0) {
                    alert("El campo telefono es obligatorio.");
                    return;
                }

                if($('#rut').val().replace(" ","").length <= 0) {
                    alert("El campo rut es obligatorio.");
                    return;
                }

                if($('#correo').val().replace(" ","").length <= 0) {
                    alert("El campo correo es obligatorio.");
                    return;
                }


                $('form#form').submit();

            });
        });
    </script>
@endsection