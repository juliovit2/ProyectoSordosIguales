@extends('layoutGeneral')
@section('content')
    <div class="container" style="padding: 0 !important; margin-left: 0 !important;">
        <div class="row">

            <div id="panel_izquierdo-qsomos" class="col-3">
                <nav>
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a id="button-side" class="nav-link" href="#quienessomos" role="tab">Quienes Somos</a>
                        <hr id="separador-sidebar"/>
                        <a id="button-side" class="nav-link" href="#vision" role="tab">Vision</a>
                        <hr id="separador-sidebar"/>
                        <a id="button-side" class="nav-link" href="#objetivo" role="tab">Objetivo</a>
                        <hr id="separador-sidebar"/>
                        <a id="button-side" class="nav-link" href="#mision" role="tab">Mision</a>
                        <hr id="separador-sidebar"/>
                        <a id="button-side" class="nav-link" href="#historia" role="tab">Historia</a>
                    </div>
                </nav>
            </div>

            <div id="cuerpo-qsomos" class="col-9 shadow" style="width: 100%">

                <section id="quienessomos">
                    <hr style="color: #0056b2;" />
                    <h1 id="title-qsomos"> Quienes somos</h1>
                    <hr style="color: #0056b2;" />

                    <div id="video-qsomos" class="container">
                        <iframe id="ytplayer" type="text/html" width="720" height="300"
                                src="https://www.youtube.com/embed/8AkvNVUXiUw?rel=0&autoplay=1&disablekb=1&fs=0&loop=1&modestbranding=1"
                                frameborder="0" allowfullscreen></iframe>
                    </div>

                    <article id="text_main">
                        <p align="justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In aliquam finibus risus id euismod. Praesent vitae augue sollicitudin, congue leo nec, ultricies eros.
                            Ut quis nulla cursus nulla semper mollis. Donec blandit ipsum a consequat consequat. Proin nibh lacus, ornare et facilisis ac, fermentum a sapien.
                            Integer id lectus condimentum, aliquet lorem in, posuere diam. In facilisis nulla et condimentum volutpat.
                            Suspendisse ac dapibus purus. Phasellus euismod neque tempor, sodales risus sit amet, gravida velit.
                            Vivamus id purus ac sem ornare finibus. Cras mollis ante diam, ac bibendum mauris ultricies ac.
                            Quisque eleifend eros ac turpis rutrum, vel imperdiet justo aliquet. Nulla laoreet augue sed egestas rhoncus.
                            Integer in mi ullamcorper, cursus massa at, tristique urna. Mauris ut massa imperdiet, venenatis lacus ac, euismod felis. Praesent ipsum felis, hendrerit eget orci vel, varius eleifend justo.
                            Sed eu nulla gravida, facilisis mi et, imperdiet quam. Nam nisi augue, rutrum ac nunc a, hendrerit ullamcorper sem.
                            Nunc accumsan quam in lacus pretium lobortis. Donec luctus vel est sed iaculis. Maecenas pellentesque mattis sagittis.
                            Nunc tempus, nunc in sagittis imperdiet, quam sapien ornare eros, eget luctus erat lorem faucibus turpis.
                            Proin in mauris a diam vulputate consequat. Quisque a leo varius, imperdiet neque ut, sollicitudin ante.
                            Aliquam euismod, ipsum ut pellentesque feugiat, lectus ante facilisis diam, id congue sapien tortor euismod orci.</p>
                    </article>
                </section>

                <section id="vision">
                    <hr style="color: #0056b2;" />
                    <h1 id="title">Vision</h1>
                    <hr style="color: #0056b2;" />

                    <div id="video-qsomos" class="container">
                        <iframe id="ytplayer" type="text/html" width="720" height="300"
                                src="https://www.youtube.com/embed/8AkvNVUXiUw?rel=0&disablekb=1&fs=0&loop=1&modestbranding=1"
                                frameborder="0" allowfullscreen></iframe>
                    </div>

                    <article id="text_main">
                        <p align="justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In aliquam finibus risus id euismod. Praesent vitae augue sollicitudin, congue leo nec, ultricies eros.
                            Ut quis nulla cursus nulla semper mollis. Donec blandit ipsum a consequat consequat. Proin nibh lacus, ornare et facilisis ac, fermentum a sapien.
                            Integer id lectus condimentum, aliquet lorem in, posuere diam. In facilisis nulla et condimentum volutpat.
                            Suspendisse ac dapibus purus. Phasellus euismod neque tempor, sodales risus sit amet, gravida velit.
                            Vivamus id purus ac sem ornare finibus. Cras mollis ante diam, ac bibendum mauris ultricies ac.
                            Quisque eleifend eros ac turpis rutrum, vel imperdiet justo aliquet. Nulla laoreet augue sed egestas rhoncus.
                            Integer in mi ullamcorper, cursus massa at, tristique urna. Mauris ut massa imperdiet, venenatis lacus ac, euismod felis. Praesent ipsum felis, hendrerit eget orci vel, varius eleifend justo.
                            Sed eu nulla gravida, facilisis mi et, imperdiet quam. Nam nisi augue, rutrum ac nunc a, hendrerit ullamcorper sem.
                            Nunc accumsan quam in lacus pretium lobortis. Donec luctus vel est sed iaculis. Maecenas pellentesque mattis sagittis.
                            Nunc tempus, nunc in sagittis imperdiet, quam sapien ornare eros, eget luctus erat lorem faucibus turpis.
                            Proin in mauris a diam vulputate consequat. Quisque a leo varius, imperdiet neque ut, sollicitudin ante.
                            Aliquam euismod, ipsum ut pellentesque feugiat, lectus ante facilisis diam, id congue sapien tortor euismod orci.</p>
                    </article>
                </section>


                <section id="objetivo">
                    <hr style="color: #0056b2;" />
                    <h1 id="title"> Objetivo</h1>
                    <hr style="color: #0056b2;" />

                    <div id="video-qsomos" class="container">
                        <iframe id="ytplayer" type="text/html" width="720" height="300"
                                src="https://www.youtube.com/embed/8AkvNVUXiUw?rel=0&disablekb=1&fs=0&loop=1&modestbranding=1"
                                frameborder="0" allowfullscreen></iframe>
                    </div>

                    <article id="text_main">
                        <p align="justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In aliquam finibus risus id euismod. Praesent vitae augue sollicitudin, congue leo nec, ultricies eros.
                            Ut quis nulla cursus nulla semper mollis. Donec blandit ipsum a consequat consequat. Proin nibh lacus, ornare et facilisis ac, fermentum a sapien.
                            Integer id lectus condimentum, aliquet lorem in, posuere diam. In facilisis nulla et condimentum volutpat.
                            Suspendisse ac dapibus purus. Phasellus euismod neque tempor, sodales risus sit amet, gravida velit.
                            Vivamus id purus ac sem ornare finibus. Cras mollis ante diam, ac bibendum mauris ultricies ac.
                            Quisque eleifend eros ac turpis rutrum, vel imperdiet justo aliquet. Nulla laoreet augue sed egestas rhoncus.
                            Integer in mi ullamcorper, cursus massa at, tristique urna. Mauris ut massa imperdiet, venenatis lacus ac, euismod felis. Praesent ipsum felis, hendrerit eget orci vel, varius eleifend justo.
                            Sed eu nulla gravida, facilisis mi et, imperdiet quam. Nam nisi augue, rutrum ac nunc a, hendrerit ullamcorper sem.
                            Nunc accumsan quam in lacus pretium lobortis. Donec luctus vel est sed iaculis. Maecenas pellentesque mattis sagittis.
                            Nunc tempus, nunc in sagittis imperdiet, quam sapien ornare eros, eget luctus erat lorem faucibus turpis.
                            Proin in mauris a diam vulputate consequat. Quisque a leo varius, imperdiet neque ut, sollicitudin ante.
                            Aliquam euismod, ipsum ut pellentesque feugiat, lectus ante facilisis diam, id congue sapien tortor euismod orci.</p>
                    </article>
                </section>


                <section id="mision">
                    <hr style="color: #0056b2;" />
                    <h1 id="title"> Misión</h1>
                    <hr style="color: #0056b2;" />

                    <div id="video-qsomos" class="container">
                        <iframe id="ytplayer" type="text/html" width="720" height="300"
                                src="https://www.youtube.com/embed/8AkvNVUXiUw?rel=0&disablekb=1&fs=0&loop=1&modestbranding=1"
                                frameborder="0" allowfullscreen></iframe>
                    </div>

                    <article id="text_main">
                        <p align="justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In aliquam finibus risus id euismod. Praesent vitae augue sollicitudin, congue leo nec, ultricies eros.
                            Ut quis nulla cursus nulla semper mollis. Donec blandit ipsum a consequat consequat. Proin nibh lacus, ornare et facilisis ac, fermentum a sapien.
                            Integer id lectus condimentum, aliquet lorem in, posuere diam. In facilisis nulla et condimentum volutpat.
                            Suspendisse ac dapibus purus. Phasellus euismod neque tempor, sodales risus sit amet, gravida velit.
                            Vivamus id purus ac sem ornare finibus. Cras mollis ante diam, ac bibendum mauris ultricies ac.
                            Quisque eleifend eros ac turpis rutrum, vel imperdiet justo aliquet. Nulla laoreet augue sed egestas rhoncus.
                            Integer in mi ullamcorper, cursus massa at, tristique urna. Mauris ut massa imperdiet, venenatis lacus ac, euismod felis. Praesent ipsum felis, hendrerit eget orci vel, varius eleifend justo.
                            Sed eu nulla gravida, facilisis mi et, imperdiet quam. Nam nisi augue, rutrum ac nunc a, hendrerit ullamcorper sem.
                            Nunc accumsan quam in lacus pretium lobortis. Donec luctus vel est sed iaculis. Maecenas pellentesque mattis sagittis.
                            Nunc tempus, nunc in sagittis imperdiet, quam sapien ornare eros, eget luctus erat lorem faucibus turpis.
                            Proin in mauris a diam vulputate consequat. Quisque a leo varius, imperdiet neque ut, sollicitudin ante.
                            Aliquam euismod, ipsum ut pellentesque feugiat, lectus ante facilisis diam, id congue sapien tortor euismod orci.</p>
                    </article>
                </section>

                <section id="historia">
                    <hr style="color: #0056b2;" />
                    <h1 id="title"> Historia</h1>
                    <hr style="color: #0056b2;" />

                    <div id="video-qsomos" class="container">
                        <iframe id="ytplayer" type="text/html" width="720" height="300"
                                src="https://www.youtube.com/embed/8AkvNVUXiUw?rel=0&disablekb=1&fs=0&loop=1&modestbranding=1"
                                frameborder="0" allowfullscreen></iframe>
                    </div>

                    <article id="text_main">
                        <p align="justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In aliquam finibus risus id euismod. Praesent vitae augue sollicitudin, congue leo nec, ultricies eros.
                            Ut quis nulla cursus nulla semper mollis. Donec blandit ipsum a consequat consequat. Proin nibh lacus, ornare et facilisis ac, fermentum a sapien.
                            Integer id lectus condimentum, aliquet lorem in, posuere diam. In facilisis nulla et condimentum volutpat.
                            Suspendisse ac dapibus purus. Phasellus euismod neque tempor, sodales risus sit amet, gravida velit.
                            Vivamus id purus ac sem ornare finibus. Cras mollis ante diam, ac bibendum mauris ultricies ac.
                            Quisque eleifend eros ac turpis rutrum, vel imperdiet justo aliquet. Nulla laoreet augue sed egestas rhoncus.
                            Integer in mi ullamcorper, cursus massa at, tristique urna. Mauris ut massa imperdiet, venenatis lacus ac, euismod felis. Praesent ipsum felis, hendrerit eget orci vel, varius eleifend justo.
                            Sed eu nulla gravida, facilisis mi et, imperdiet quam. Nam nisi augue, rutrum ac nunc a, hendrerit ullamcorper sem.
                            Nunc accumsan quam in lacus pretium lobortis. Donec luctus vel est sed iaculis. Maecenas pellentesque mattis sagittis.
                            Nunc tempus, nunc in sagittis imperdiet, quam sapien ornare eros, eget luctus erat lorem faucibus turpis.
                            Proin in mauris a diam vulputate consequat. Quisque a leo varius, imperdiet neque ut, sollicitudin ante.
                            Aliquam euismod, ipsum ut pellentesque feugiat, lectus ante facilisis diam, id congue sapien tortor euismod orci.</p>
                    </article>
                </section>

                <section id="directiva">
                    <hr style="color: #0056b2;" />
                    <h1> Directiva</h1>
                    <hr style="color: #0056b2;" />

                    <div id="card-deck" class="card-deck">

                        <div id="card" class="card" style="width: 18rem;">
                            <img src="{{'/storage/Directivos/DIRECTORIO - ALEXI GODOY GONZÁLEZ.gif'}} " class="card-img-top" alt="...">
                            <h5 class="card-title" style="text-align: center">Lorem Yogurt</h5>
                        </div>

                        <div id="card" class="card" style="width: 18rem;">
                            <img src="{{'/storage/Directivos/DIRECTORIO - CARLOS SÁNCHEZ CLIFT.gif'}} " class="card-img-top" alt="...">
                            <h5 class="card-title" style="text-align: center">Lorem Yogurt</h5>
                        </div>

                        <div id="card" class="card" style="width: 18rem;">
                            <img src="{{'/storage/Directivos/DIRECTORIO - HUGO ÁLVAREZ REINOSO.gif'}} " class="card-img-top" alt="...">
                            <h5 class="card-title" style="text-align: center">Lorem Yogurt</h5>
                        </div>
                    </div>

                    <div id="card-deck" class="card-deck">
                        <div id="card" class="card" style="width: 18rem;">
                            <img src="{{'/storage/Directivos/EQUIPO - CARLOS QUIROZ QUIROZ.gif'}} " class="card-img-top" alt="...">
                            <h5 class="card-title" style="text-align: center">Lorem Yogurt</h5>
                        </div>
                        <div id="card" class="card" style="width: 18rem;">
                            <img src="{{'/storage/Directivos/Equipo - Fracis Tobar Moreno.gif'}} " class="card-img-top" alt="...">
                            <h5 class="card-title" style="text-align: center">Lorem Yogurt</h5>
                        </div>
                        <div id="card" class="card" style="width: 18rem;">
                            <img src="{{'/storage/Directivos/Equipo -  Lenka Obilinovic Martinez.gif'}} " class="card-img-top" alt="...">
                            <h5 class="card-title" style="text-align: center">Lorem Yogurt</h5>
                        </div>
                    </div>

                </section>
            </div>

        </div>
    </div>
@endsection
