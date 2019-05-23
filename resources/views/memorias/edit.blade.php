@extends('layoutGeneral')
@section('title')Administrar Memorias
@endsection


@section('pre-body')
    @if ($errors->any())
        <div class="alert alert-danger">
            <p><strong>ERROR:</strong> Por favor corregir los siguientes errores</p>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection
@section('content')
    <h1 class = "text-center">Editar Memoria</h1>
    <br />
    <br />
    <h3 class = "text-center">Memoria Actual:</h3>
    <div class ="container">
        <div class="container memoriaContainer row p-3" style="margin: auto;">
            <div class = "col-sm-3 align-items-center d-flex justify-content-center  ">
                @if($memoria['portada'])
                    <img class = "img-thumbnail" src="{{$memoria['portada']}}" onerror="this.onerror=null;this.src='{{"/storage/Test logo UCN.png"}}';" />
                @else
                    <i class="fas fa-file-pdf" style="font-size: 1000%;color: #972329"></i>
                @endif
            </div>
            <div class = "col-sm-7 align-self-center d-flex justify-content-center" >
                <h1 style="color: #2980b9">Memoria {{$memoria['year']}}</h1>
            </div>
            <div class = "col-sm-2 ">
                <div class="row align-items-center d-flex justify-content-center" style="height: 100%">
                    <a class = "redlink" href = "{{$memoria['pdf']}}" target="_blank" style="font-size: 50px"><i class="fas fa-download"></i></a>
                </div>
            </div>
        </div>
    </div>

        <br />
        <br />
        <br />

    <div class="container">
        <h2> Elija uno o más atributos a modificar</h2>
        <br />
        <form autocomplete="off" method="POST" action="{{route('memorias.update',$memoria['id'])}} " enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="form-group row d-flex align-items-center">
                <label for="anio_memoria_select" class="col-sm-2 col-form-label">Año de Memoria</label>
                <div class="col-sm-3">
                    <select class="form-control" name = "anio_memoria" id="anio_memoria_select">
                        <option value="" disabled selected>Seleccione año</option>
                        @foreach($yearList as $year)
                                <option value= {{$year}}>{{$year}}</option>
                        @endforeach
                    </select>
                </div>
            </div>


            <div class="form-group row d-flex align-items-center">
                <label for="inputPortada" class="col-sm-2 col-form-label">Foto de Portada</label>
                <div class="col-sm-3">
                    <input type="file" class="form-control file" name="inputPortada" id="inputPortada">
                </div>
            </div>
            <div class="form-group row border">
                <label for="inputMemoria" class="col-sm-2 col-form-label">Documento de Memoria</label>
                <div class="col-sm-3 d-flex align-items-center">
                    <input type="file" class="form-control file" name="inputMemoria" id="inputMemoria">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-3">
                    <span class="border">
                        <button type="button" class="btn btn-secondary"  data-toggle="modal" data-target="#confirmCancelModal"  role="button">Cancelar</button>
                    </span>
                </div>
                <div class="col-sm-2">
                    <span class="border">
                      <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#confirmSubmitModal" >Confirmar</button>
                    </span>
                </div>
            </div>

            <!-- Cancel Modal -->
            <div class="modal fade" id="confirmCancelModal" tabindex="-1" role="dialog" aria-labelledby="confirmCancelModal" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmCancelModal">Confirmar cancelación</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            ¿Desea cancelar el registro y volver al menú de registros?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Volver al formulario</button>
                            <a type="button" class="btn btn-primary" href="{{route('memorias.index')}}" role="button">Cancelar registro</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Confirmar Modal -->
            <div class="modal fade" id="confirmSubmitModal" tabindex="-1" role="dialog" aria-labelledby="confirmSubmitModal" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmSubmitModal">Confirmar envio</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            ¿Está seguro que desea confirmar el registro?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Volver al formulario</button>
                            <button type="submit" class="btn btn-primary">Confirmar</button>
                        </div>
                    </div>
                </div>
            </div>


            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
                    crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
                    crossorigin="anonymous"></script>



        </form>
    </div>


    <!-- Optional JavaScript -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{asset('https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo')}}" crossorigin="anonymous"></script>
    <script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut')}}" crossorigin="anonymous"></script>
    <script src="{{asset('https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k')}}" crossorigin="anonymous"></script>

@endsection
