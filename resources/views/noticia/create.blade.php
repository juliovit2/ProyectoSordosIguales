
@extends('layoutGeneral')

@section('content')
    <!-- Lo siguiente es necesario para el editor HTML WYSIWYG -->
    <!-- include libraries(jQuery, bootstrap) -->
    <script type="text/javascript" src="{{ URL::asset('js/summernote-es-ES.js') }}"></script>
    <div class="container mt-5 mb-5 containerForm">
        <div class="modal fade uploading-modal" id="loadingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content spinnerModal">
                    <div class="modal-body">
                        <h1 class="text-center modal-header" style="color: white">Subiendo Contenido</h1>
                        <div class='row text-center'>
                            <div class="col col-12 text-center">
                                <div class="loader"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col col-12">
                @include('noticia.error')
                <form id="form" action="" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    <div class="form-group">
                        <label for="Titulo"><h4>Título</h4></label>
                        <input type="text" id="titulo" name="titulo" class="form-control">
                    </div>


                    @if ($is_edit)
                    <div id="carousel" class="carousel slide bg-dark" data-ride="carousel" data-interval="4000" width="100%" max-height="460px">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="item banner-height-400">
                                <img width="400px" height="400px" src="{{ asset('storage/logo_fundacion.png')}}" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        @foreach($tabla_imagenes_noticia as $tabla_imagenes_noticia)
                            @if($tabla_imagenes_noticia->noticiaid == $tabla_noticia->id)
                                <div class="carousel-item">
                                    <div class="item banner-height-400">
                                        <img width="400px" height="400px"  src="{{ asset('storage/'.$tabla_imagenes_noticia->imagen)}}" class="d-block w-100" alt="...">
                                    </div>
                                </div>
                            @endif
                        @endforeach
                        @if($tabla_noticia->video != "0")
                            <div class="carousel-item">
                                <div class="item banner-height-400">
                                    <div align="center">
                                        <video  id="sampleMovie" width="640" height="360" preload controls>
                                            <source src="{{ asset('storage/'.$tabla_noticia->video)}}"  />
                                        </video>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                @endif


                <br>
                    <!-- Iniciamos el editor WYSIWYG aka. summernote-->
                    <textarea id="contenido" name="contenidoHTML" value="{{ old('title') }}"></textarea>

                   <!-- <div class="form-group">
                        <label for="contenido"><h4>Contenido</h4></label>
                        <textarea class="form-control" id="contenido" name="contenido"></textarea>
                    </div>-->
                    <div class="form-group mt-3">
                        @if($is_edit)
                            <label for="video"><h4>Reemplazar Video</h4></label>
                        @else
                            <label for="video"><h4>Video</h4></label>
                        @endif

                        <input type="file" id="video" name="video">
                    </div>
                    <div class="form-group">
                        @if($is_edit)
                            <label for="imagenes"><h4>Reemplazar imagenes</h4></label>
                        @else
                            <label for="imagenes"><h4>Imagenes</h4></label>
                        @endif
                        <!-- <input multiple="multiple" type="file" name="imagen" id="imagen"> -->
                        <input multiple="multiple" type="file" name="imagenes[]" id="imagenes">
                    </div>
                    <div class=form-group">
                        @if($is_edit)
                            <input id="but" type="button" value="Editar Noticia" class="btn btn-primary">
                        @else
                            <input id="but" type="button" value="Agregar Noticia" class="btn btn-primary">
                        @endif

                        <input id="but2" type="submit" formaction="/admin/noticias/previsualizar" value="Previsualizar" class="btn btn-primary"/>
                        <p>*Previsualizar no incluye videos</p>

                        <!-- <input value="Agregar Noticia" class="btn btn-primary" onclick="actualizarContenido()"> -->
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>

    <style>
        .uploading-modal {
            background-color: rgba(0,0,0,0.5);
        }

        .spinnerModal {
            background: rgba(0,0,0,0);
            border: 0;
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

    <!-- La script tag es necesaria para iniciar summernote-->
    <script>
    function getExtension(filename) {
        filename = '' + filename;
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
            case 'jpeg':
            case 'svg':
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
            case 'flv':
            case 'mpeg':
                return true;
        }
        return false;
    }
    $(document).ready(function() {
        $('#loadingModal').modal({backdrop: 'static', keyboard: false, show: false});

        $('#contenido').summernote({
            lang: 'es-ES',
            fontNames:['Source Sans Pro'],
            toolbar: [
                ['style', ['style', 'bold', 'underline', 'italic', 'paragraph']],
                ['look', ['font', 'forecolor', 'backcolor']],
                ['lists', ['ol', 'ul']],
                ['insert', ['table', 'link', 'picture', 'video']],
                ['misc', ['fullscreen', 'help']]
            ],
            maximumImageFileSize: 10485760
        });

        // $('#contenido').on('summernote.image.upload', function(we, files) {
        //        //upload image to server and create imgNode...
        //        //ejemplo de url generada por la funcion asset() de laravel: http://localhost:8000/storage/imagenes/noticias/imagen.png
        //        console.log("funciona");
        //         console.log(files);
        //         var imgNode = document.createElement("img");
        //         elem.setAttribute("src", "http://localhost:8000/storage/imagenes/noticias/imagen.png");
        //         $summernote.summernote('insertNode', imgNode);
        //  });


        //En el caso de estar editando una noticia se sube el contenido html en summernote y en la barra de titulo       
        $('#contenido').summernote('fontName', 'Source Sans Pro');
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
               alert("Debe contener un título.");
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
                if(!isImage(imagenes.files[i].name)) {
                    alert("El archivo " + imagenes.files[i].name + " no es una imagen.");
                    return;
                }
            }

            if(hayVideo && !isVideo($('#video').val())){
                alert("El archivo " + $('#video').val() + " no es un video.");
                return;
            }

            $('form#form').submit();
            $('#loadingModal').modal({backdrop: 'static', keyboard: false, show: true});

        });
    });
    </script>
@endsection