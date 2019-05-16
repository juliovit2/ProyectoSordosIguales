
@extends('layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md">

                @include('noticia.error')
                <form action="" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    <div class="form-group">
                        <label for="Titulo">Título</label>
                        <input type="text" id="titulo" name="titulo" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="contenido">Contenido</label>
                        <textarea class="form-control" id="contenido" name="contenido"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="video">Video</label>
                        <input type="file" id="video" name="video">
                    </div>
                    <div class="form-group">
                        <label for="imagenes">Imágenes</label>
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