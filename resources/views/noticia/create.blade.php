
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

    <style>
        .border-red{
            border: 1px solid red !important;
        }
    </style>
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md">

                @include('noticia.error')
                <form id="form" action="" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    <div class="form-group">
                        <label for="Titulo"><h4>Título</h4></label>
                        <input type="text" id="titulo" name="titulo" class="form-control">
                    </div>

                    <!-- Iniciamos el editor WYSIWYG aka. summernote-->
                    <textarea id="contenido" name="contenidoHTML" value="{{ old('title') }}"></textarea>

                   <!-- <div class="form-group">
                        <label for="contenido"><h4>Contenido</h4></label>
                        <textarea class="form-control" id="contenido" name="contenido"></textarea>
                    </div>-->
                    <div class="form-group">
                        <label for="video"><h4>Video</h4></label>
                        <input type="file" id="video" name="video">
                    </div>
                    <div class="form-group">
                        <label for="imagenes"><h4>Imágenes</h4></label>
                        <!-- <input multiple="multiple" type="file" name="imagen" id="imagen"> -->
                        <input multiple="multiple" type="file" name="imagenes[]" id="imagenes">
                    </div>
                    <div class=form-group">
                        <input id="but" type="button" value="Agregar Noticia" class="btn btn-primary">
                        <!-- <input value="Agregar Noticia" class="btn btn-primary" onclick="actualizarContenido()"> -->
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- La script tag es necesaria para iniciar summernote-->
    <script>
    function getExtension(filename) {
        var parts = filename.split('.');
        return parts[parts.length - 1];
    }

    function isImage(filename) {
        var ext = getExtension(filename);
        switch (ext.toLowerCase()) {
            case 'jpg':
            case 'gif':
            case 'bmp':
            case 'png':
                //etc
                return true;
        }
        return false;
    }

    function isVideo(filename) {
        var ext = getExtension(filename);
        switch (ext.toLowerCase()) {
            case 'm4v':
            case 'avi':
            case 'mpg':
            case 'mp4':
                // etc
                return true;
        }
        return false;
    }
    $(document).ready(function() {
        $('#contenido').summernote();
        @isset($data)
        @if ($data['is_edit'])
        $('#contenido').summernote('code', {!! json_encode($data['noticia_a_editar']['contenido']) !!});
        window.onload = function(){
            document.getElementById("titulo").value = "{!! $data['noticia_a_editar']['titulo'] !!}";
        }
        @endif
        @endisset
        $('#but').click(function () {
           if($('#titulo').val().replace(" ","").length <= 0) {
               return;
           }
           let hayVideo = $('#video').val() != "";

           var imagenes = document.getElementById('imagenes');
           let hayImagen = imagenes.files.length > 0;


            let contenido = $('#contenido').summernote('code');
            let contenidoElement = document.createElement('contenidoElement');
            contenidoElement.innerHTML = contenido;
            let hayContenido = contenidoElement.textContent.replace(" ", "").length > 0;

            if(!hayImagen && !hayVideo && !hayContenido){
                alert("Debe ingresar al menos un tipo de contenido (video, imagen. o texto).");
                return;
            }

            for (var i=0; i<imagenes.files.length; i++) {
                var ext = imagenes.files[i].name.substr(-3)
                if(ext != "jpg" && imagenes.files[i].name.substr(-4) != "jpeg" && ext != "png" && ext != "gif" && ext != "raw" && ext != "svg")  {
                    alert("El archivo " + imagenes.files[i].name + " no es una imagen.");
                    return;
                }
            }
            let videoExt = $('#video').val().substr(-3);
            if( hayVideo && videoExt != "avi" && videoExt != "mp4" && $('#video').val().substr(-4) != "mpeg" && videoExt != "flv"){
                alert("El archivo " + $('#video').val() + " no es un video.");
                return;
            }

            $('form#form').submit();

        });
    });
    </script>
@endsection