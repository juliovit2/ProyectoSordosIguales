@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="wrapper fadeInDown">
                    <div class="card" >
                        <div class="card-header">{{ __('Portal Alumnos FSI') }}</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}
                                @csrf

                                <div class="form-group row">
                                    <label for="correo" class="col-md-4 col-form-label text-md-right">{{ __('Correo Electrónico:') }}</label>
                                    <div class="col-md-6">
                                        <input id="correo" type="email" class="form-control @error('correo') is-invalid @enderror" name="correo" value="{{ old('correo') }}" required autocomplete="correo" autofocus placeholder="Correo">
                                        {!! $errors->first('email','<span class="help-block">:message</span>') !!}
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        @if($errors->any())
                                            <div class="alert alert-danger" >
                                                <strong>{{ $errors->first() }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="clave" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña:') }}</label>

                                    <div class="col-md-6">
                                        <input id="clave" type="password" class="form-control @error('clave') is-invalid @enderror" name="clave" required autocomplete="clave_actual" placeholder="Contraseña">
                                        {!! $errors->first('password','<span class="help-block">:message</span>') !!}
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Recordarme') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Ingresar') }}
                                        </button>
                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('¿Ha olvidado su contraseña?') }}
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection