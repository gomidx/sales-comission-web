@extends('layouts.app-layout')
@section('resource-title', 'Vendas')
@section('dashboard-content')

<div class="table-responsive full-width">
    @if (session('error'))
        <div class="alert alert-danger mt-2">
            {{ session('error') }}
        </div>

        {{ session()->forget('error') }}
    @endif

    @if (session('success'))
        <div class="alert alert-success mt-2">
            {{ session('success') }}
        </div>

        {{ session()->forget('success') }}
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th class="text-center">ID</th>
                <th class="text-center">Vendedor</th>
                <th class="text-center">Data da venda</th>
                <th class="text-center">Valor da venda</th>
                <th class="text-center">Valor da comissão</th>
            </tr>
        </thead>
        <tbody>
            @if (! empty($sales))
                @foreach ($sales as $sale)
                    <tr>
                        <td class="text-center">{{ $sale['id'] }}</td>
                        <td class="text-center">{{ $sale['seller_name'] }}</td>
                        <td class="text-center">{{ date('d-m-Y', strtotime($sale['date_of_sale'])) }}</td>
                        <td class="text-center">R$ {{ $sale['total_value'] }}</td>
                        <td class="text-center">R$ {{ $sale['comission_value'] }}</td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>

    @if (empty($sales))
        <div class="alert alert-danger mt-2" role="alert">
            Não existem vendas cadastradas.
        </div>
    @endif
</div>

<style>
    .full-width {
        width: 121.5%;
    }
</style>

@endsection