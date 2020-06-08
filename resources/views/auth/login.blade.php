@extends('layouts.app')

@section('content')
<!-- Page Container -->
<div class="page-container">
    <!-- Page Inner -->
    <div class="page-inner login-page">
        <div id="main-wrapper" class="container-fluid">
            <div class="row">
                <div class="col-sm-6 col-md-3 login-box">
                    <h4 class="login-title">{{ __('Inicia sesión en tú tienda') }}</h4>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label for="email">{{ __('Correo Electronico') }}</label>
                            <input  id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">{{ __('Contraseña') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ __('Recuérdame') }}
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            {{ __('Login') }}
                        </button>
                        @if (Route::has('register'))
                            <a class="btn btn-default" href="{{ route('register') }}">{{ __('Registrarse') }}</a><br>
                        @endif
                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('¿Olvidaste tú contraseña?') }}
                            </a>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div><!-- /Page Content -->
</div><!-- /Page Container -->

@endsection
