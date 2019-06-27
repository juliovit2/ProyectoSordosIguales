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
                <h2><center>Listado de Donaciones </center>
                </h2>
                <thead>
                <tr>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">Rut</th>
                    <th class="text-center">Correo</th>
                    <th class="text-center">Monto</th>
                    <th class="text-center">ID Transacción</th>
                </tr>
                </thead>
                <tbody>
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
