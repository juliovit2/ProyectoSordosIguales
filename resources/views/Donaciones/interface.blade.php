@extends('layoutGeneral')

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
    <main role="main" class="container">
        <div class ="container p-5">
            <div class = "container containerForm">
                <h2 class = "text-center">DONAR A LA FUNDACIÓN</h2>

            </div>


        </div>


        </div>
        </div>
        </div>

        </div>
    </main>


@endsection