@extends('layoutGeneral')
@section('content')
    <div class="container" style="padding: 0 !important; margin-left: 0 !important;">
        <div class="row">

            <div id="panel_derecho" class="col-3">
                <ul>
                    <li>
                        <a href="#quienessomos">Quienes Somos</a>
                    </li>
                    <li>
                        <a href="#directiva">Directiva</a>
                    </li>
                </ul>
            </div>

            <div id="cuerpo" class="col-9 shadow" style="width: 100%">

                <section id="quienessomos">
                    <hr style="color: #0056b2;" />
                    <h1 id="title"> Quienes Somos</h1>
                    <hr style="color: #0056b2;" />

                    <div id="video" class="container">
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

                <section id="directiva">
                    <hr style="color: #0056b2;" />
                    <h1> Directiva</h1>
                    <hr style="color: #0056b2;" />

                    <div class="card-deck">

                        <div class="card" style="width: 18rem;">
                            <img src="https://pixabay.com/es/images/download/girl-919048_640.jpg?attachment" class="card-img-top" alt="...">
                            <h5 class="card-title" style="text-align: center">Lorem Yogurt</h5>
                        </div>

                        <div class="card" style="width: 18rem;">
                            <img src="https://pixabay.com/es/images/download/girl-919048_640.jpg?attachment" class="card-img-top" alt="...">
                            <h5 class="card-title" style="text-align: center">Lorem Yogurt</h5>
                        </div>

                        <div class="card" style="width: 18rem;">
                            <img src="https://pixabay.com/es/images/download/girl-919048_640.jpg?attachment" class="card-img-top" alt="...">
                            <h5 class="card-title" style="text-align: center">Lorem Yogurt</h5>
                        </div>
                    </div>

                    <div class="card-deck">
                        <div class="card" style="width: 18rem;">
                            <img src="https://pixabay.com/es/images/download/girl-919048_640.jpg?attachment" class="card-img-top" alt="...">
                            <h5 class="card-title" style="text-align: center">Lorem Yogurt</h5>
                        </div>
                        <div class="card" style="width: 18rem;">
                            <img src="https://pixabay.com/es/images/download/girl-919048_640.jpg?attachment" class="card-img-top" alt="...">
                            <h5 class="card-title" style="text-align: center">Lorem Yogurt</h5>
                        </div>
                        <div class="card" style="width: 18rem;">
                            <img src="https://pixabay.com/es/images/download/girl-919048_640.jpg?attachment" class="card-img-top" alt="...">
                            <h5 class="card-title" style="text-align: center">Lorem Yogurt</h5>
                        </div>
                    </div>

                </section>
            </div>

        </div>
    </div>
@endsection
