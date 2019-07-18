@extends('layoutGeneral')
@section('title')Administrar colaboradores y alianzas
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
            <h2>
                Listado de colaboradores y alianzas
                <a class="btn btn-secondary" href="{{route('colaboradores.create')}}" role="button"><i class="fas fa-plus"></i></a>
            </h2>
            <thead>
            <tr>
                <th class="text-center">ID</th>
                <th class="text-center">Logo</th>
                <th class="text-center">Nombre</th>
                <th class="text-center">Fecha de publicación</th>
                <th class="text-center">Acciones</th>
            </tr>
            </thead>
            <tbody>
            @if($colabs)
                <ul>
                    @foreach($colabs as  $key=>$item)
                        <tr>
                            <td class="text-center" id="{{ $item->id }}">{{ $item->id }}</td>
                            <td class="text-center">
                                <img class = "img-thumbnail" src="{{$colabs[$key]['logo']}}" width="250px" height="250px">
                            </td>
                            <td class="text-center">{{ $colabs[$key]['nombre'] }}</td>
                            <td class="text-center">{{$colabs[$key]->created_at}}</td>
                            <td class="text-center" width="20%">
                                <div class = "btn-group">
                                    <form action="{{route('colaboradores.destroy',$item->id)}}" method="POST">
                                        {{csrf_field()}}
                                        <a class="btn btn-secondary" title = "Abrir la pagina de este colaborador" href = "//{{$colabs[$key]['url']}}" target="_blank">
                                            <i class="fas fa-eye"></i>
                                        </a>

                                        <a class="btn btn-secondary" role="button"href="{{route('colaboradores.edit',$item->id)}}" >
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
                                                        ¿Está seguro que desea eliminar este colaborador?
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
                <p> No hay colaboradores registrados </p>
            @endif
            </tbody>
        </table>
    </div>


    </body>
    </form>
    </div>

@endsection
