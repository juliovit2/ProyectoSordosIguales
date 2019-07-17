<div class="paged_index">
    @foreach($noticias as $noticia)
        <div id="item-container" class="col-sm-12 col-lg-6">
            <a style="color: black; text-decoration: none;" href="noticias/{{$noticia->id}}">
                <div  class="container p-2 mb-3">
                    <div class="row">
                        <div class="col-4">
                            <div id="carousel" class="carousel p-2 slide" data-ride="carousel" data-interval="2000">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <div class="item banner-height-400">
                                            <img src="{{ asset('storage/logo_fundacion.png')}}" class="d-block w-100" alt="...">
                                        </div>
                                    </div>
                                    @foreach($imagenes_noticia as $var_imagenes_noticia)
                                        @if($var_imagenes_noticia->noticiaid == $noticia->id)
                                            <div class="carousel-item">
                                                <div class="item banner-height-400">
                                                    <img src="{{ asset('storage/'.$var_imagenes_noticia->imagen)}}" class="d-block w-100" alt="...">
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach</div>

                            </div>
                        </div>
                        <div class="col-8">
                            <h5 class="text-center">{{$noticia->titulo}}</h5>
                            <div class="col-12">
                                <p class="text-justify">{{$noticia->getSummary(140)}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

    @endforeach
</div>