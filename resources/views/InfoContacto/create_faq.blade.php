@extends('layoutGeneral')
@section('content')

    <div class="container mt-5 mb-5 containerForm">
        <div class="row">
            <div class="col-md">

                @include('InfoContacto.error_faq')
                <form id="form" action="" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    <div class="form-group">
                        <label for="Titulo"><h4>Pregunta</h4></label>
                        <input type="text" id="titulo" name="pregunta" class="form-control">
                    </div>

                    <div class="form-group mt-3">
                        <label for="respuesta"><h4>Video</h4></label>
                        <input  id="video" onchange="getId(this.value)" name="video" placeholder="Ingrese link del video" class="form-control" >
                    </div>
                    <div class=form-group">
                        <button id="agregar" type="submit"  href="faq/show" value="store" class="btn btn-primary"> Agregar Preguntas y Respuestas </button>
                        <a href="{{ route('faq.index') }}" class="btn btn-primary" >Atrás</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

   <!-- <script>
        function enviar() {
            $('form').ajaxForm({
                complete: function(xhr) {
                    alert(xhr.responseText);///recibe el return del controlador
                    window.location.href = "show_faq";
                }
            });
        }-->
<script>
    function getId(url) {
        var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
        var match = String(url).match(regExp);
        debugger;
        if (match && match[2].length == 11) {
            document.getElementById("video").value=match[2];
        } else {
            return 'error';
        }
    }

</script>
@endsection