@extends('layout')
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
                            <input type="text" id="correo" name="correo"  pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" class="form-control" value="{{$v->correo}}">
                        </div>

                        <div class=form-group">
                            <a href="#confirmation" class="btn btn-primary" data-toggle="modal">Editar</a>
                            <a href="{{ route('voluntarios.index') }}" class="btn btn-primary" >Atrás</a>
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



{{--    <script>--}}
{{--        function enviar() {--}}
{{--            $('alert').modal('show');--}}
{{--            jQuery.noConflict();--}}
{{--        }--}}
{{--    </script>--}}
@endsection