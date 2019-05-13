<!DOCTYPE html>
<html lang="es_ES">
<head>
    <title>Agregar Noticia</title>
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>

    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="Titulo">Título</label>
                    <input type="text" id="titulo" name="titulo" class="form-control">
                </div>
                <div class="form-group">
                    <label for="summernote">Contenido</label>
                    <textarea id="summernote" name="editordata"></textarea>
                </div>
                <div class=form-group">
                    <!--<input type="submit" value="Agregar Noticia" class="btn btn-primary" onclick="actualizarContenido()">-->
                    <input value="Agregar Noticia" class="btn btn-primary" onclick="actualizarContenido()">
                </div>
                <div id="contenido">

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

    function actualizarContenido(){
        $("#contenido").html($('#summernote').summernote('code'));
    }
</script>
</body>
</html>