@extends('layoutGeneral')
@section('title')Lista de Donaciones
@endsection


@section('pre-body')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @endsection
        @section('content')
        </div>
        <div class = "container">
            <table class="table table-bordered  table-striped table-hover" id="MyTable">
                <h2><center>Listado de Donaciones </center></h2>

                <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">Monto</th>
                    <th class="text-center">Fecha-Hora</th>
                </tr>
                </thead>
                <tbody>

                @if($donaciones)
                    <ul>
                        @foreach($donaciones as  $key=>$item)
                            <tr>
                                <td class="text-center" id="{{ $item->id }}">{{ $item->id }}</td>
                                <td class="text-center">{{$item->name_donante}}</td>
                                <td class="text-center">{{$item->monto_donacion}}</td>
                                <td class="text-center">{{$donaciones[$key]->created_at}}</td>
                            </tr>
                        @endforeach
                    </ul>
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
                    <p> No hay Memorias registradas </p>
                @endif





                </tbody>
            </table>
        </div>


        </body>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
                crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
                crossorigin="anonymous"></script>


        </form>
        </div>

@endsection
