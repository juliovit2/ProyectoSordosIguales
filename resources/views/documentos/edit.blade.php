@extends('layoutGeneral')
@section('title')Administrar Documentos
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

    <h1 class = "text-center">Editar documento</h1>
    <br />
    <br />
    <h3 class = "text-center">Documento actual:</h3>
    <div class ="container">
        <div class="container documentoContainer row p-3" style="margin: auto;">
            <div class = "col-sm-3 align-items-center d-flex justify-content-center  ">
                @if($documento['portada'])
                    <img class = "img-thumbnail" src="{{$documento['portada']}}" />
                @else
                    <i class="fas fa-file-pdf" style="font-size: 1000%;color: #972329"></i>
                @endif
            </div>
            <div class = "col-sm-7 align-self-center d-flex justify-content-center" >
                <h1 style="color: #2980b9">{{$documento['titulo']}}</h1>
            </div>
            <div class = "col-sm-2 ">
                <div class="row align-items-center d-flex justify-content-center" style="height: 50%">
                    <a class = "redlink" href = "{{$documento['pdf']}}" target="_blank" style="font-size: 50px"><i class="fas fa-download"></i></a>
                </div>
                <div class="row align-items-center d-flex justify-content-center" style="height: 50%">
                    <a class = "redlink" title = "Abrir el video del documento" data-toggle="modal" data-video="{{$documento['video']}}" data-title="{{$documento['titulo']}}" href="#videoModal" style="font-size: 50px"><i class="far fa-play-circle"></i></a>
                </div>
            </div>

        </div>
    </div>

    <br />
    <br />
    <br />

    <div class="container containerForm">
        <form id="formDocumento" autocomplete="off" method="POST" action="{{route('documentos.update',$documento['id'])}} " enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="form-group row">
                <label for="inputTitulo" class="col-sm-2 col-form-label">Titulo de documento</label>
                <div class="col-sm-3">
                    <input class="form-control" style="background: #EEF2FC;" name="inputTitulo" id="inputTitulo" value="{{$documento['titulo']}}">
                </div>
            </div>

            <div class="form-group row">
                <label for="inputVideo" class="col-sm-2 col-form-label">URL de video (Youtube)</label>
                <div class="col-sm-3">
                    <input class="form-control" style="background: #EEF2FC;" name="inputVideo" id="inputVideo" value="{{$documento['video']}}">
                </div>
            </div>

            <div class="form-group row">
                <label for="inputDocumento" class="col-sm-2 col-form-label">PDF de Documento</label>
                <div class="col-sm-3">
                    <input type="file" class="form-control file" style="background: #EEF2FC;" name="inputDocumento" id="inputDocumento">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPortada" class="col-sm-2 col-form-label">Foto de Portada (Opcional) </label>
                <div class="col-sm-3">
                    <input type="file" class="form-control file" style="background: #EEF2FC;" name="inputPortada" id="inputPortada">
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
                            <a type="button" class="btn btn-primary" href="{{route('documentos.index')}}" role="button">Cancelar registro</a>
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
    <!-- Video Modal -->
    <div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title"></h1>
                    <button type="button"  class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">X</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe id="iframeVideo" class="embed-responsive-item" width="800" height="450" src="" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            var errors = {!! json_encode($errors->toArray()) !!};
            if (!Array.isArray(errors)) {
                $('#errorsModal').modal('show')
            }
        })
        $("#formDocumento").on("submit", function (e) {
            if (document.getElementById("inputVideo").value){
                e.preventDefault();//stop submit event
                var url = document.getElementById("inputVideo").value
                var idMatch;
                var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
                var match = url.match(regExp);

                if (match && match[2].length == 11) {
                    idMatch = match[2];
                } else {
                    idMatch ='error';
                }
                var self = $(this);//this form
                var fullEmbed = "https://www.youtube.com/embed/" + idMatch;
                $("#inputVideo").val(fullEmbed);//change input
                $("#formDocumento").off("submit");//need form submit event off.
                self.submit();//submit form
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#videoModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var recipient = button.data('video') // Extract info from data-* attributes
                var title = button.data('title')
                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                var modal = $(this)
                modal.find('.modal-title').text(title)
                document.getElementById('iframeVideo').src = recipient;
            })

            $("#videoModal").on('hidden.bs.modal', function (e) {
                $("#videoModal iframe").attr("src", $("#videoModal iframe").attr("src"));
            });
        })

    </script>

@endsection
