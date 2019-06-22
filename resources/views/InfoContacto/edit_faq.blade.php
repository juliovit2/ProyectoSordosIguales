@extends('layoutGeneral')

@section('content')
    <div class="row">
        <section class="content">
            <div class="col-md-8 col-md-offset-2">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Error!</strong> Revise los campos obligatorios.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(Session::has('success'))
                    <div class="alert alert-info">
                        {{Session::get('success')}}
                    </div>
                @endif

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Nueva Pregunta</h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-container">

                            <form method="POST" action="{{ route('faq.update',$pregunta->id) }}"  role="form">
                                {{ csrf_field() }}
                                <input name="_method" type="hidden" value="PATCH">
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="pregunta" id="pregunta" class="form-control input-sm" value="{{$pregunta->pregunta}}">
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                           <input name="respuesta" onchange="getId(this.value)" id="respuesta"  class="form-control input-sm" value="{{$pregunta->respuesta}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        
                                        <a href="#edit" class="btn btn-primary" data-toggle="modal">Actualizar</a>
                                        <a href="{{ route('faq.index') }}" class="btn btn-sm btn-primary active" >Atrás</a>

                                        <!--pop up confirmacion -->
                                        <div class="modal fade" id="edit">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Confirmacion</h5>
                                                        <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Si presiona cancelar, no se guardaran los cambios</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                                                        <button type="submit" value="Actualizar" class="btn btn-primary active">Guardar Cambios</button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- endf pop up-->

                                    </div>

                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- Bootstrap core JavaScript
    ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
        <script src="../../../../assets/js/vendor/popper.min.js"></script>
        <script src="../../../../dist/js/bootstrap.min.js"></script>

        <script>
            function getId(url) {
                debugger;
                var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
                var match = String(url).match(regExp);
                debugger;
                if (match && match[2].length == 11) {
                    document.getElementById("respuesta").value=match[2];
                } else {
                    return 'error';
                }
            }

        </script>
@endsection
