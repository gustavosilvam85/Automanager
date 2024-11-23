@extends('layouts.app')

@section('content')
<div class="login">
    <div class="row justify-content-center align-items-center login" style="background-color: #1B1B1B">
        <div class="col-md-4">
            <div class="card m-5" style="background-color: #9E0E15">
                <div class="card-body">
                    <form method="POST" action="{{ route('login.submit') }}">
                        @csrf
                        <h3 class="text-center p-4 text-light">Login</h3>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Senha') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="offset-md-2">
                                <div>
                                    <a href="{{ route('workshops.create') }}" class="btn btn-link">
                                        {{ __('Ainda não tem Conta? Cadastre-se') }}
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="offset-md-5">
                                <button type="submit" class="btn btn-dark">
                                    {{ __('Entrar') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Esqueceu sua senha?') }}
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
@endsection
