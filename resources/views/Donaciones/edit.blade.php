@extends('layout')
@section('title')Administrar Donaciones
@endsection


@section('pre-body')
    @if ($errors->any())
        <!-- Errores de Validacion Modal -->
        <div class="modal fade" id="errorsModal" aria-label="Errores" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content" >
                    <div class="modal-header"style="background-color: #FFAAAA">
                        <h5 class="modal-title"><i class="fas fa-exclamation-triangle"></i> Por favor corregir los siguientes errores:</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary formButton" data-dismiss="modal">Entendido</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
@section('content')
    <?php
    $id = Auth::user()->id;
    $rol = DB::table('users')->where('id', $id)->value('rol');
    if($rol == 'Alumno'){?>
    <meta http-equiv='refresh' content='0; URL=/usuarios/{{ $id }}/'>
    <?php }else { ?>
    <br>
    <h1 class = "text-center">Editar Registro</h1>
    <div class="container containerForm">
        <h3> Elija uno o más atributos a modificar</h3>
        <br />
        <form id="formDonacion" autocomplete="off" method="POST" action="{{route('donaciones.update',$donaciones['id'])}} " enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT') }}

            <!-- Nombre -->

            <div class="form-group">

                <label for="name_donante">Nombre:</label>
                <input type="text" class="form-control" name="name_donante" placeholder="Ingrese nombre" class="form-control" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" value="{{ old('name_donante', $donaciones->name_donante) }}" />
            </div>

                <!-- Monto -->

                <div class="form-group">

                    <label for="name_donante">Monto donación:</label>
                    <input type="text" min="1" class="form-control" name="monto_donacion" placeholder="Ingrese monto donado (Pesos Chilenos)" class="form-control" pattern="[0-9]*"  value={{ $donaciones->monto_donacion }}   />
                </div>

                <!-- Fecha de la transacción -->

                <div class="form-group">

                    <label for="name_donante">Fecha donación:</label>

                    <?php
                    $timezone = "America/Santiago";
                    date_default_timezone_set($timezone);
                    $today = date("Y-m-d");
                    ?>

                    <input type="date" max="<?php echo $today; ?>" class="form-control" name="fecha_donacion" placeholder="Ingrese fecha en que se realizó la donación" class="form-control" value={{ $donaciones->fecha_donacion }} />
                </div>

            <div class="form-group row">
                <div class="col-sm-3">
                    <span class="border">
                        <button type="button" class="btn btn-secondary formButton"  data-toggle="modal" data-target="#confirmCancelModal"  role="button">Cancelar</button>
                    </span>
                </div>
                <div class="col-sm-2">
                    <span class="border">
                      <button type="button" class="btn btn-secondary formButton" data-toggle="modal" data-target="#confirmSubmitModal" >Confirmar</button>
                    </span>
                </div>
            </div>

            <!-- Cancel Modal -->
            <div class="modal fade" id="confirmCancelModal" tabindex="-1" role="dialog" aria-labelledby="confirmCancelModal" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmCancelModal">Confirmar cancelación</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            ¿Desea cancelar el registro y volver al menú de registros?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Volver al formulario</button>
                            <a type="button" class="btn btn-primary" href="{{route('donaciones.index')}}" role="button">Cancelar registro</a>
                        </div>
                    </div>
                </div>
            </div>

                <!-- Confirmar Modal -->
                <div class="modal fade" id="confirmSubmitModal" tabindex="-1" role="dialog" aria-labelledby="confirmSubmitModal" aria-hidden="true">
                    <div class="modal-dialog" role="document" >
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="confirmSubmitModal">Confirmar envio</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                ¿Está seguro que desea confirmar el registro?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Volver al formulario</button>
                                <button id ="submitButton" type="submit" class="btn btn-primary formButton">Confirmar</button>
                            </div>
                        </div>
                    </div>
                </div>



        </form>
    </div>

    <script>
        $(document).ready(function() {
            var errors = {!! json_encode($errors->toArray()) !!};
            if (!Array.isArray(errors)) {
                $('#errorsModal').modal('show')
            }
        });
    </script>
    <?php } ?>
@endsection