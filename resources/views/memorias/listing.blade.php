@extends('layoutGeneral')
@section('title')Administrar Memorias
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

    <style>
        .column{
            widh: 30%;
            float:left;
        }
    </style>
@endsection
@section('content')
    <H1 style="text-align: center">Administrar Memorias</H1>

    <div class="container pb-5" style = "text-align: center; ">
        <a class="btn btn-secondary" href="{{route('memorias.create')}}" role="button"><font size="6">Agregar nueva memoria</font></a>
    </div>
    <div class = "container">
        <table class="table table-bordered  table-striped table-hover" id="MyTable">
            <thead>
            <tr>
                <th class="text-center">ID</th>
                <th class="text-center">Memoria</th>
                <th class="text-center">Acciones</th>
            </tr>
            </thead>
            <tbody>
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