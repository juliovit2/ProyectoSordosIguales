@extends('layout')

@section('head')
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="/js/web.js" type="text/javascript" charset="utf-8" async defer></script>
@endsection
@section('content')


    <?php
    $id = Auth::user()->id;
    $rol = DB::table('users')->where('id', $id)->value('rol');
    if($rol == 'Alumno'){?>
    <meta http-equiv='refresh' content='0; URL=/usuarios/{{ $id }}/'>
    <?php }else { ?>
    <div class="modal uploading-modal" id="loadingModal"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content spinnerModal">
                <div class="modal-body">
                    <h1 class="text-center modal-header" style="color: white">Eliminando</h1>
                    <div class='row text-center'>
                        <div class="col col-12 text-center">
                            <div class="loader"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="continer bg-light">
        <div>
            <div align="justify" class="col-sm-12">
                <p></p>
                <h2>
                    Listado de noticias
                </h2>
                <a href="{{route('noticias.create')}}" class="btn btn-primary pull-right active" >Agregar Noticia &nbsp;<i class="fas fa-plus"></i></a>
                <table class = "table table-hover table-striped table-bordered">
                    <thead>

                    <tr>
                        <th width="20px">ID
                        <th></th>
                        <th>TÍtulo</th>
                        <th>Fecha de publicación</th>
                        <th colspan="3">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($noticias as $tabla_noticia)
                        <tr>

                            <td>{{$tabla_noticia->id}}</td>
                            <td>
                                <div id="carousel" class="carousel slide" data-ride="carousel" data-interval="2000">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img width="100px" height="100px" src="{{ asset('storage/logo_fundacion.png')}}" class="d-block w-100" alt="...">
                                        </div>
                                        @foreach($imagenes_noticia as $tabla_imagenes_noticia)
                                            @if($tabla_imagenes_noticia->noticiaid == $tabla_noticia->id)
                                                <div class="carousel-item">
                                                    <img width="100px" height="100px" src="{{ asset('storage/'.$tabla_imagenes_noticia->imagen)}}" class="d-block w-100" alt="...">
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </td>
                            <td>{{$tabla_noticia->titulo}}</td>
                            <td>{{$tabla_noticia->created_at}}</td>
                            <td>
                                <a href="{{route('noticias.show',$tabla_noticia->id)}}"
                                   class="btn btn-sm btn-primary active" title="Ver Noticia">
                                    <i class="fas fa-eye"></i>

                                </a>
                            </td>
                            <td>
                                <a href="noticias/edit/{{$tabla_noticia->id}}"
                                   class="btn btn-sm btn-primary active" title="Editar Noticia">
                                    <i class="fas fa-pencil-alt"></i>

                                </a>
                            </td>

                            <td>
                                <a href="/noticias/delete/{{$tabla_noticia->id}}"
                                   class="btn btn-sm btn-danger active" id="delete-btn"  title="Eliminar Noticia">
                                    <i class="fas fa-trash-alt"></i>

                                </a>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {!! $noticias->render()!!}
            </div>
        </div>
    </div>

    <?php } ?>

    <style>
        .carousel-inner img {
            object-fit: contain !important;
        }
        .uploading-modal {
            background-color: rgba(0,0,0,0.5);
        }

        .spinnerModal {
            background: rgba(0,0,0,0);
            border: 0;
            -webkit-box-shadow: 0 3px 9px rgba(0, 0, 0, 0);
            box-shadow: 0 3px 9px rgba(0, 0, 0, 0);
        }

        .modal-header {
            bottom: 121%;
            left: -24%;
            color: white;
            position: fixed;
        }

        .modal-dialog {

            position: fixed;
            z-index: 1031;
            top: 30%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .loader {
            border: 16px solid #f3f3f3; /* Light grey */
            border-top: 16px solid #3498db; /* Blue */
            border-radius: 50%;
            width: 120px;
            height: 120px;
            animation: spin 2s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
    <script>
        $('#loadingModal').modal({backdrop: 'static', keyboard: false, show: false});

        $('#delete-btn').click(function () {
            $('#loadingModal').modal({backdrop: 'static', keyboard: false, show: true});
        });
    </script>



@endsection
