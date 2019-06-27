@extends('layoutGeneral')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <br>
            <div class="card">
                <div class="cardHeader">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    ¡Estás loggeado!
                </div>
            </div>
            <br>
        </div>
    </div>
</div>
@endsection
