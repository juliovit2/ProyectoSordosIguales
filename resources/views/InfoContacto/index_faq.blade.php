@extends('layoutGeneral')
@section('content')

    <div class="container" align="center">
    <div class="col-sm-8">
        <p></p>
        <h2>
            Listado de Preguntas y Respuestas
        </h2>
        <a href="{{route('faq.create')}}" class="btn btn-primary pull-right active" >Agregar Preguntas y Respuestas &nbsp;<i class="fas fa-plus"></i></a>
        <table class = "table table-hover table-striped">
            <thead>

            <tr>
                <th>ID</th>
                <th>Preguntas</th>
                <th>Respuestas</th>
                <th>Editar</th>
                <th>Eliminar</th>

                <th colspan="4">&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            @foreach($pregunta as $p)
                <tr align-text="center">
                    <td>{{$p->id}}</td>
                    <td>{{$p->pregunta}}</td>
                    <td>{{$p->respuesta}}</td>

                    <td>
                        <a href="{{action('FaqController@edit', $p->id)}}"
                           class="btn btn-primary " title="Editar Preguntas y Respuestas">
                            <i  class="fas fa-pencil-alt" ></i>
                        </a>
                    </td>

                    <td>
                        <button type="button" class="btn btn-danger" data-toggle="modal"  data-target="#{{$p->id}}" title="Eliminar Preguntas y Respuestas">
                            <i   class="fas fa-trash-alt"></i>
                        </button>

                        <!--pop up confirmacion -->
                        <div class="modal fade" id="{{$p->id}}" aria-labelledby="{{ $p->id }}" aria-hidden="true">
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
                                        <a href="{{action('FaqController@destroy',$p->id)}}"  class="btn btn-primary">Eliminar</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- endf pop up-->
                    </td>

                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="/js/web.js" type="text/javascript" charset="utf-8" async defer></script>

@endsection
