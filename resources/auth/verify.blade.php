@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifique su direccion de Correo') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Un nuevo enlace de verificacion ha sido enviado a su Correo') }}
                        </div>
                    @endif

                    {{ __('Antes de continuar, porfavor busque en su correo el enlace de verificacion.') }}
                    {{ __('Si no ha recibido el Correo') }}, <a href="{{ route('verification.resend') }}">{{ __('click aqui para solicitar otro') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
