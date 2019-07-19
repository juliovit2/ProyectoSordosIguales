@extends('layout')

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
            <div class ="container p-5">
                <div class = "container containerForm">
                    <h1 class = "text-center">REGISTRAR NUEVA DONACIÓN</h1>
                    <form id="formDonacion" autocomplete="off" method="POST" action="{{route('donaciones.store')}} " enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <!-- Nombre -->
                        <div class="form-group">
                            <p align="left">Nombre (opcional)</p>
                            <div>
                                <input id="name_donante" name="name_donante" type="text" placeholder="Ingrese nombre" class="form-control" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+">
                            </div>
                        </div>

                        <!-- Monto -->

                        <div class="form-group">
                            <p align="left">Monto donación</p>
                            <div>
                                <input required id="monto_donacion" name="monto_donacion" type="text" min="1" placeholder="Ingrese monto donado (Pesos Chilenos)" class="form-control" pattern="[0-9]*">
                            </div>
                        </div>

                        <!-- Fecha de la transacción -->

                        <div class="form-group">
                            <p align="left">Fecha donación</p>
                            <div>

                                <?php
                                $timezone = "America/Santiago";
                                date_default_timezone_set($timezone);
                                $today = date("Y-m-d");
                                ?>

                                <input id="fecha_donacion" name="fecha_donacion" type="date" max="<?php echo $today; ?>" placeholder="Ingrese fecha en que se realizó la donación" class="form-control">
                            </div>
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


            </div>
    <script>
        $(document).ready(function() {
            var errors = {!! json_encode($errors->toArray()) !!};
            if (!Array.isArray(errors)) {
                $('#errorsModal').modal('show')
            }
        });
    </script>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../../../assets/js/vendor/popper.min.js"></script>
    <script src="../../../../dist/js/bootstrap.min.js"></script>
    <?php } ?>
@endsection