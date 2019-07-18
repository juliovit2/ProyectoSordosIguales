@extends('layoutGeneral')
@section('title')Documentos
@endsection

@section('content')
    <main role="main" class="container">

        <div class ="container p-5 border">


            <div class = "container pl-5 pr-5" style = "text-align: left">
                <h1 style="font-weight: lighter;font-size: 60px">Documentos</h1>
                <hr class = "redHR">
            </div>

            @if($documentos)
                @foreach($documentos as $documento)
                    <div class ="container p-5">
                        <div class="container documentoContainer row p-3" style="margin: auto;">
                            <div class = "col-sm-3 align-items-center d-flex justify-content-center  ">
                                @if($documento['portada'])
                                    <img class = "img-thumbnail" src="{{$documento['portada']}}" onerror="this.onerror=null;this.src='{{"/storage/Test logo UCN.png"}}';" />
                                @else
                                    <i class="fas fa-file-pdf" style="font-size: 1000%;color: #972329"></i>
                                @endif
                            </div>
                            <div class = "col-sm-7 align-self-center d-flex justify-content-center" >
                                <h2 style="color: #2980b9">{{$documento['titulo']}}</h2>
                            </div>
                            <div class = "col-sm-2">
                                <div class="row align-items-center d-flex justify-content-center" style="height: 50%">
                                    <a class = "redlink" title = "Abrir el archivo PDF del documento" href = "{{$documento['pdf']}}" target="_blank" style="font-size: 50px"><i class="fas fa-download"></i></a>
                                </div>
                                @if($documento['video']!='None')
                                <div class="row align-items-center d-flex justify-content-center" style="height: 50%">
                                    <a class = "redlink" title = "Abrir el video del documento" data-toggle="modal" data-video="{{$documento['video']}}" data-title="{{$documento['titulo']}}" href="#videoModal" style="font-size: 50px"><i class="far fa-play-circle"></i></a>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach

            <!-- Video Modal -->
                <div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title"></h1>
                                <button type="button"  class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">X</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe id="iframeVideo" class="embed-responsive-item" width="800" height="450" src="" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <p> No hay Documentos registrados </p>
            @endif

        </div>

    </main><!-- /.container -->
    <script>
        $(document).ready(function() {
            $('#videoModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var recipient = button.data('video') // Extract info from data-* attributes
                var title = button.data('title')
                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                var modal = $(this)
                modal.find('.modal-title').text(title)
                document.getElementById('iframeVideo').src = recipient;
            })

            $("#videoModal").on('hidden.bs.modal', function (e) {
                $("#videoModal iframe").attr("src", $("#videoModal iframe").attr("src"));
            });
        })

    </script>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

@endsection