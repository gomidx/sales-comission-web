@extends('layouts.app-layout')
@section('resource-title', '')
@section('dashboard-content')

<div class="container">
    <div class="d-flex justify-content-center align-items-center custom">
        <div class="col-md-6">
        <h3 class="text-center mb-4">Cadastrar venda</h3>
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('dashboard.create-sale-post') }}">
                        @csrf

                        <div class="form-group">
                            <label for="seller_id">ID do vendedor</label>
                            <input id="seller_id" type="text" class="form-control @error('seller_id') is-invalid @enderror" name="seller_id" required autofocus>
                            @error('seller_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="total_value">Valor da venda</label>
                            <input id="total_value" type="number" class="form-control @error('total_value') is-invalid @enderror" name="total_value" required autofocus>
                            @error('total_value')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="date_of_sale">Data da venda</label>
                            <input id="date_of_sale" type="date" class="form-control @error('date_of_sale') is-invalid @enderror" name="date_of_sale" required autofocus>
                            @error('date_of_sale')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mt-2">
                            <button type="submit" class="btn btn-primary">
                                Cadastrar
                            </button>
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

<style>
    .custom {
        min-height: 90vh;
        margin-left: 300px;
        margin-top: -50px;
    }
</style>

@endsection