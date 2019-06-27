@extends('layoutGeneral')
@section('title')Administrar Memorias
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
    </div>
    <div class = "container">
        <table class="table table-bordered  table-striped table-hover" id="MyTable">
            <h2>
                Listado de Memorias
                <a class="btn btn-secondary" href="{{route('memorias.create')}}" role="button"><i class="fas fa-plus"></i></a>
            </h2>
            <thead>
            <tr>
                <th class="text-center">ID</th>
                <th class="text-center">Portada</th>
                <th class="text-center">Memoria</th>
                <th class="text-center">Fecha de publicación</th>
                <th class="text-center">Acciones</th>
            </tr>
            </thead>
            <tbody>
            @if($memorias)
                <ul>
                    @foreach($memorias as  $key=>$item)
                        <tr>
                            <td class="text-center" id="{{ $item->id }}">{{ $item->id }}</td>
                            <td class="text-center">
                                @if($memorias[$key]['portada'])
                                    <img class = "img-thumbnail" src="{{$memorias[$key]['portada']}}" width="250px" height="250px">
                                @else
                                    <i class="fas fa-file-pdf" style="font-size: 1000%;color: #972329"></i>
                                @endif
                            </td>
                            <td class="text-center">Memoria {{ $memorias[$key]['year'] }}</td>
                            <td class="text-center">{{$memorias[$key]->created_at}}</td>
                            <td class="text-center" width="20%">
                                <div class = "btn-group">
                                    <form action="{{route('memorias.destroy',$item->id)}}" method="POST">
                                        {{csrf_field()}}
                                        <a class="btn btn-secondary" href = "{{$memorias[$key]['pdf']}}" target="_blank">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a class = "btn btn-secondary" title = "Abrir el video de la memoria" data-toggle="modal" data-video="{{$memorias[$key]['video']}}" data-title="{{$memorias[$key]['year']}}" href="#videoModal">
                                            <i class="far fa-play-circle"></i>
                                        </a>
                                        <a class="btn btn-secondary" role="button"href="{{route('memorias.edit',$item->id)}}" >
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>

                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal{{ $item->id }}" ><i class="fas fa-trash-alt"></i></button>



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
                                                        ¿Está seguro que desea eliminar esta memoria?
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
                <p> No hay Memorias registradas </p>
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
                var year = button.data('title')
                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                var modal = $(this)
                modal.find('.modal-title').text('Memoria ' + year)
                document.getElementById('iframeVideo').src = recipient;
            })

            $("#videoModal").on('hidden.bs.modal', function (e) {
                $("#videoModal iframe").attr("src", $("#videoModal iframe").attr("src"));
            });
        })
    </script>
@endsection
