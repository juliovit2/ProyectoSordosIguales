@extends('layoutGeneral')
@section('title')Lista de Donaciones
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
                <center>
                <h2>Listado de Donaciones
                    <a class="btn btn-secondary" href="{{route('donaciones.create')}}" role="button"><i class="fas fa-plus"></i></a>
                </center>
                </h2>
                <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">Monto</th>
                    <th class="text-center">Fecha</th>
                    <th class="text-center">Acciones</th>
                </tr>
                </thead>
                <tbody>

                @if($donaciones)
                    <ul>
                        @foreach($donaciones as  $key=>$item)
                            <tr>
                                <td class="text-center" id="{{ $item->id }}">{{ $item->id }}</td>
                                <td class="text-center">{{$item->name_donante}}</td>
                                <td class="text-center">{{$item->monto_donacion}}</td>
                                <td class="text-center">{{$item->fecha_donacion}}</td>
                            <td class="text-center" width="20%">
                            <div class = "btn-group">
                                <form action="{{route('donaciones.destroy',$item->id)}}" method="POST">
                                    {{csrf_field()}}
                                    <a class="btn btn-secondary" role="button"href="{{route('donaciones.edit',$item->id)}}" >
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
                                                    ¿Está seguro que desea eliminar esta donación?
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
                @else
                    <p> No hay donaciones registradas </p>
                @endif
                </tbody>
            </table>
        </div>


        </body>
        </form>
        </div>

@endsection
