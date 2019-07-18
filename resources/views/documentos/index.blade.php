@extends('layoutGeneral')
@section('title')Administrar Documentos
@endsection


@section('pre-body')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection
@section('content')
    <div class = "container">
        <table class="table table-bordered  table-striped table-hover" id="MyTable">
            <div style="text-align: center" >
                <h2>
                Listado de Documentos
                </h2>
                <a href="{{route('documentos.create')}}" role="button" class="btn btn-primary pull-right" >Agregar nuevo documento <i class="fas fa-plus"></i></a>
            </div>
            <thead>
            <tr>
                <th class="text-center">ID</th>
                <th class="text-center">Portada</th>
                <th class="text-center">Titulo</th>
                <th class="text-center">Fecha de publicación</th>
                <th class="text-center">Acciones</th>
            </tr>
            </thead>
            <tbody>
            @if($documentos)
                <ul>
                    @foreach($documentos as  $key=>$item)
                        <tr>
                            <td class="text-center" id="{{ $item->id }}">{{ $item->id }}</td>
                            <td class="text-center">
                                @if($documentos[$key]['portada'])
                                    <img class = "img-thumbnail" src="{{$documentos[$key]['portada']}}" width="250px" height="250px">
                                @else
                                    <i class="fas fa-file-pdf" style="font-size: 1000%;color: #972329"></i>
                                @endif
                            </td>
                            <td class="text-center">{{ $documentos[$key]['titulo'] }}</td>
                            <td class="text-center">{{$documentos[$key]->created_at}}</td>
                            <td class="text-center" width="20%">
                                <div class = "btn-group">
                                    <form action="{{route('documentos.destroy',$item->id)}}" method="POST">
                                        {{csrf_field()}}
                                        <a class="btn btn-sm btn-primary" href = "{{$documentos[$key]['pdf']}}" target="_blank">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a class = "btn btn-sm btn-primary" title = "Abrir el video del documento" data-toggle="modal" data-video="{{$documentos[$key]['video']}}" data-title="{{$documentos[$key]['titulo']}}" href="#videoModal">
                                            <i class="far fa-play-circle"></i>
                                        </a>
                                        <a class="btn btn-sm btn-primary" role="button"href="{{route('documentos.edit',$item->id)}}" >
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>

                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal{{ $item->id }}" ><i class="fas fa-trash-alt"></i></button>



                                        <!-- Modals --->

                                        <div class="modal fade" id="modal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modal{{ $item->id }}" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="confirmSubmitModal">Confirmar Eliminación</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        ¿Está seguro que desea eliminar este documento?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Volver</button>
                                                        <button type="submit" class="btn btn-primary">Confirmar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </ul>
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
            @else
                <p> No hay Documentos registrados </p>
            @endif
            </tbody>
        </table>
    </div>


    </body>
    </form>
    </div>

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
