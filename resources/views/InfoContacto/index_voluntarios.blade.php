@extends('layout')
@section('content')
    <div class="col-sm-8">
        <p></p>
        <h2>
            Listado de voluntarios
        </h2>
        <a href="{{route('voluntarios.create')}}" class="btn btn-primary pull-right active" >Agregar Voluntario &nbsp;<i class="fas fa-plus"></i></a>
        <table class = "table table-hover table-striped">
            <thead>

            <tr>
                <th width="20px">ID</th>
                <th>Nombre</th>
                <th>Telefono</th>
                <th>Rut</th>
                <th>Correo</th>
                <th>Fecha de creacion</th>
            </tr>
            </thead>
            <tbody>
            @foreach($voluntarios as $v)
                @if ($v->rol == 'Voluntario')
                    <tr>
                        <td>{{$v->id}}</td>
                        <td>{{$v->nombre}}</td>
                        <td>{{$v->telefono}}</td>
                        <td>{{$v->rut}}</td>
                        <td>{{$v->correo}}</td>
                        <td>{{$v->created_at}}</td>
                        <td>
                            <a href="{{action('VoluntariosController@edit', $v->id)}}"
                               class="btn btn-sm btn-primary active" title="Editar Voluntario">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                        </td>

                        <td>
                            <a href="#delete" class="btn btn-danger active float-right" data-toggle="modal" title="Eliminar Voluntario">
                                <i   class="fas fa-trash-alt"></i>
                            </a>

                            <!--pop up confirmacion -->
                            <div class="modal fade" id="delete">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Confirmacion</h5>
                                            <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Si presiona cancelar, no se eliminaran los cambios</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                                            <a href="{{action('VoluntariosController@destroy',$v->id)}}"  class="btn btn-primary">Eliminar</a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- endf pop up-->
                        </td>
                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>
    </div>


@endsection
