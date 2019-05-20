
@extends('layoutGeneral')
@section('content')
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
@endsection