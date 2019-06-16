@extends('layoutGeneral')
@section('content')


    <!-- Lo siguiente es necesario para el editor HTML WYSIWYG -->
    <!-- include libraries(jQuery, bootstrap) -->
    <script type="text/javascript" src="{{ URL::asset('js/summernote-es-ES.js') }}"></script>
    <div class="container mt-5 mb-5 containerForm">
        <div class="row">
            <div class="col-md">

                @include('InfoContacto.error_faq')
                <form id="form" action="" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    <div class="form-group">
                        <label for="Titulo"><h4>Pregunta</h4></label>
                        <input type="text" id="titulo" name="titulo" class="form-control">
                    </div>
                    <div class="form-group mt-3">
                        <label for="video"><h4>Video</h4></label>
                        <input type="file" id="video" name="video">
                    </div>
                    <div class=form-group">
                        <input id="but" type="button" value="Agregar Preguntas y Respuestas" class="btn btn-primary">
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


        function isVideo(filename) {

            /*var ext = getExtension(filename);
            switch (ext.toLowerCase()) {
                case 'm4v':
                case 'avi':
                case 'mpg':
                case 'mp4':
                case 'flv':
                case 'mpeg':
                    return true;
            }*/
            return true;
        }
        $(document).ready(function() {

            $('#but').click(function () {
                if($('#Pregunta').val().replace(" ","").length <= 0) {
                    alert("Debe contener una Pregunta.");
                    return;
                }
                let hayVideo = $('#video').val() != "";

                if(hayVideo && !isVideo($('#video').val())){
                    alert("El archivo " + $('#video').val() + " no es un video.");
                    return;
                }

                $('form#form').submit();

            });
        });
    </script>
@endsection