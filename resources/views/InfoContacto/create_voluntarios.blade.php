@extends('layout')
@section('title')
    Administrar Voluntarios
@endsection
@section('content')


    <script type="text/javascript" src="{{ URL::asset('js/summernote-es-ES.js') }}"></script>
    <br>
    <div class="card">
        @include('InfoContacto.error_faq')
        <h1>Agregar voluntario</h1>
        <div class="row">
            <div class="col-md">
                <form id="form" action="" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    @if(isset($v))
                        <div class="form-group">
                            <label for="Nombre">Nombre</label>
                            <input type="text" id="nombre" name="nombre" class="form-control" pattern="([A-z]|ñ|\s)*" value="{{$v->nombre}}">
                        </div>

                        <div class="form-group">
                            <label for="Telefono">Telefono</label>
                            <input type="text" id="telefono" name="telefono" class="form-control" pattern="[0-9]{8}" value="{{$v->telefono}}">
                        </div>

                        <div class="form-group">
                            <label for="Rut">Rut</label>
                            <input required oninput="checkRut(this)" type="text" id="rut" name="rut" class="form-control" value="{{$v->rut}}">
                        </div>

                        <div class="form-group">
                            <label for="Correo">Correo</label>
                            <input type="text" id="correo" name="correo"  pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" class="form-control" value="{{$v->correo}}">
                        </div>

                        <div class=form-group">
                            <a href="#confirmation" class="btn btn-primary" data-toggle="modal">Editar</a>
                            <a href="{{ route('voluntarios.index') }}" class="btn btn-primary" >Atrás</a>
                        </div>
                    @else
                        <div class="form-group">
                            <label for="Nombre">Nombre</label>
                            <input type="text" id="nombre" name="nombre" class="form-control" pattern="([A-z]|ñ|\s)*">
                        </div>

                        <div class="form-group">
                            <label for="Telefono">Telefono</label>
                            <input type="text" id="telefono" name="telefono" class="form-control" pattern="[0-9]{8}">
                        </div>

                        <div class="form-group">
                            <label for="Rut">Rut</label>
                            <input required oninput="checkRut(this)" type="text" id="rut" name="rut" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="Correo">Correo</label>
                            <input type="text" id="correo"  pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" name="correo" class="form-control">
                        </div>

                        <div class=form-group">
                            <a href="#confirmation" class="btn btn-primary" data-toggle="modal">Agregar </a>
                            <a href="{{ route('voluntarios.index') }}" class="btn btn-primary" >Atrás</a>
                        </div>
                    @endif

                <!--pop up confirmacion -->
                    <div class="modal fade" id="confirmation">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Confirmacion</h5>
                                    <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <p>Si presiona cancelar, los cambios seran descartados</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                                    <button type="submit"  value="store" class="btn btn-primary">Guardar Cambios</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- endf pop up-->


                </form>
            </div>
        </div>
    </div>


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

{{--    <script>--}}
{{--        function enviar() {--}}
{{--            $('alert').modal('show');--}}
{{--            jQuery.noConflict();--}}
{{--        }--}}
{{--    </script>--}}
@endsection
