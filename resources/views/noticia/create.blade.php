
@extends('layoutGeneral')
@section('content')
    <!-- Lo siguiente es necesario para el editor HTML WYSIWYG -->
    <!-- include libraries(jQuery, bootstrap) -->
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>

    <!-- include summernote css/js -->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md">

                @include('noticia.error')
                <form action="" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    <div class="form-group">
                        <label for="Titulo"><h4>Título</h4></label>
                        <input type="text" id="titulo" name="titulo" class="form-control">
                    </div>

                    <!-- Iniciamos el editor WYSIWYG aka. summernote-->
                    <textarea id="summernote" name="contenidoHTML"></textarea>

                    <div class="form-group">
                        <label for="contenido"><h4>Contenido</h4></label>
                        <textarea class="form-control" id="contenido" name="contenido"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="video"><h4>Video</h4></label>
                        <input type="file" id="video" name="video">
                    </div>
                    <div class="form-group">
                        <label for="imagenes"><h4>Imágenes</h4></label>
                        <!-- <input multiple="multiple" type="file" name="imagen" id="imagen"> -->
                        <input multiple="multiple" type="file" name="imagenes[]" id="imagen">
                    </div>
                    <div class=form-group">
                        <input type="submit" value="Agregar Noticia" class="btn btn-primary">
                        <!-- <input value="Agregar Noticia" class="btn btn-primary" onclick="actualizarContenido()"> -->
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- La script tag es necesaria para iniciar summernote-->
    <script>
    $(document).ready(function() {
        $('#summernote').summernote();
        @if ($data['is_edit'])
            $('#summernote').summernote('code', {!! json_encode($data['noticia_a_editar']['contenido']) !!});
            window.onload = function(){
                document.getElementById("titulo").value = "{!! $data['noticia_a_editar']['titulo'] !!}";
            }
        @endif
    });


    </script>
@endsection