<!DOCTYPE html>
<html lang="es_ES">
<head>
    <title>Agregar Noticia</title>
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.js') }}"></script>

    <link href="{{ asset('summernote/summernote.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('summernote/lang/summernote-es-ES.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('summernote/summernote.js') }}"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md">
                <form action="" method="POST">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    <div class="form-group">
                        <label for="Titulo">Título</label>
                        <input type="text" id="titulo" name="titulo" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="summernote">Contenido</label>
                        <textarea id="summernote" name="contenido"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="video">Video</label>
                        <input type="text" class="form-control" id="video" name="video" placeholder="https://www.youtube.com/watch?v=gsqY8vAdN1ww">
                    </div>
                    <div class=form-group">
                        <input type="submit" value="Agregar Noticia" class="btn btn-primary">
                        <!-- <input value="Agregar Noticia" class="btn btn-primary" onclick="actualizarContenido()"> -->
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                lang: 'es-ES',
                toolbar:[
                    ['style', ['style']],
                    ['font-style', ['bold', 'italic', 'underline', 'color']],
                    ['font-style-2', ['fontname', 'fontsize']],
                    ['paragraph-style', ['paragraph', 'ul', 'ol', 'height']],
                    ['misc', ['fullscreen']]
                ]
            });
        });
    </script>
</body>
</html>