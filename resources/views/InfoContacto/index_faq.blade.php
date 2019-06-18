@extends('layoutGeneral')
@section('content')
    <div class="col-sm-8">
        <p></p>
        <h2>
            Listado de Preguntas y Respuestas
        </h2>
        <a href="{{route('faq.create')}}" class="btn btn-primary pull-right active" >Agregar Preguntas y Respuestas &nbsp;<i class="fas fa-plus"></i></a>
        <table class = "table table-hover table-striped">
            <thead>

            <tr>
                <th width="20px">ID
                <th></th>
                <th>Tipo</th>
                <th>Preguntas</th>
                <th>Respuestas</th>
                <th colspan="3">&nbsp;</th>
            </tr>
            </thead>
            <tbody>

            @foreach($pregunta as $p)
                <tr>
                    <td>{{$p->id}}</td>
                    <td>{{$p->Pregunta}}</td>
                    <td>{{$p->Respuesta}}</td>
                    <td>
                        <a href="{{action('FaqController@edit', $p->id)}}"
                           class="btn btn-sm btn-primary active" title="Editar Preguntas y Respuestas">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                    </td>

                    <td>
                        <a href="{{action('FaqController@destroy', $p->id)}}"
                           class="btn btn-sm btn-danger active"  title="Eliminar Preguntas y Respuestas">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>

                </tr>
            @endforeach

            </tbody>
        </table>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="/js/web.js" type="text/javascript" charset="utf-8" async defer></script>

@endsection
