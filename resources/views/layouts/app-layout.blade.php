@extends('layouts.default-layout')
@section('title', 'Dashboard')
@section('content')

<div class="container">
    <div class="row">
        <nav class="col-md-3 col-lg-2 d-md-block bg-light sidebar align-nav">
            <div class="position-sticky">
                <ul class="nav flex-column custom-nav">
                    <h3 class="mb-3">Dashboard</h3>

                    <li class="nav-item custom-nav-item">
                        <a class="nav-link active" href="{{ route('dashboard.sellers') }}">
                            Vendedores
                        </a>
                    </li>

                    <li class="nav-item custom-nav-item">
                        <a class="nav-link active" href="{{ route('dashboard.create-seller') }}">
                            Cadastrar vendedor
                        </a>
                    </li>

                    <li class="nav-item custom-nav-item">
                        <a class="nav-link" href="{{ route('dashboard.sales') }}">
                            Vendas
                        </a>
                    </li>

                    <li class="nav-item custom-nav-item">
                        <a class="nav-link active" href="{{ route('dashboard.create-sale') }}">
                            Cadastrar venda
                        </a>
                    </li>

                    <li class="nav-item custom-nav-item">
                        <a class="nav-link active" href="{{ route('dashboard.send-administrator-email', session('email')) }}">
                            Relatório de vendas
                        </a>
                    </li>

                    <li class="nav-item custom-nav-item">
                        <a class="nav-link" href="{{ route('auth.logout') }}">
                            Sair
                        </a>
                    </li>

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>

                        {{ session()->forget('success') }}
                    @endif
                </ul>
            </div>
        </nav>

        <div class="container" style="margin-left: 20px;">
            <h3 class="text-center mb-5 mt-2 margin-h3">@yield('resource-title')</h3>
            @yield('dashboard-content')
        </div>
    </div>
</div>

<style>

    .align-nav {
        height: 1000vh;
        position: fixed;
        top: 0;
        left: 0;
        background-color: #dcddde !important;
    }

    .custom-nav {
        padding: 10px;
    }

    .margin-h3 {
        margin-left: 250px;
    }

    .custom-nav-item {
        border-radius: 10px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        background-color: white;
        margin-bottom: 10px;
    }

    .custom-nav-item a {
        color: #333;
    }

</style>

@endsection