@extends('layouts.default-layout')
@section('title', 'Login')
@section('content')

<div class="container">
    <div class="d-flex justify-content-center align-items-center" style="min-height: 90vh;">
        <div class="col-md-6">
        <h3 class="text-center mb-4">Sistema de controle de vendas e comissões</h3>
            <div class="card">
                <div class="card-header">Login</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('auth.login-post') }}">
                        @csrf

                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">Senha</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mt-2">
                            <button type="submit" class="btn btn-primary">
                                Login
                            </button>
                            <a href="{{ route('auth.register') }}" class="btn btn-primary">
                                Cadastre-se
                            </a>
                        </div>

                        @if (session('error'))
                            <div class="alert alert-danger mt-2">
                                {{ session('error') }}
                            </div>

                            {{ session()->forget('error') }}
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection