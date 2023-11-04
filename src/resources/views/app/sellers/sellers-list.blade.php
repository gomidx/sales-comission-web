@extends('layouts.app-layout')
@section('resource-title', 'Vendedores')
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
                <th class="text-center">Nome</th>
                <th class="text-center">Email</th>
                <th class="text-center">Ações</th>
            </tr>
        </thead>
        <tbody>
            @if (! empty($sellers))
                @foreach ($sellers as $seller)
                    <tr>
                        <td class="text-center">{{ $seller['id'] }}</td>
                        <td class="text-center">{{ $seller['name'] }}</td>
                        <td class="text-center">{{ $seller['email'] }}</td>
                        <td class="text-center">
                            <form action="{{ route('dashboard.delete-seller', $seller['id']) }}" method="POST">
                                <a href="{{ route('dashboard.sales-by-seller', $seller['id']) }}" class="btn btn-info">Vendas</a>
                                <a href="{{ route('dashboard.send-seller-email', ['id' => $seller['id'], 'email' => $seller['email']]) }}" class="btn btn-success">Enviar relatório por e-mail</a>
                                <a href="{{ route('dashboard.edit-seller', $seller['id']) }}" class="btn btn-primary">Editar</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>

    @if (empty($sellers))
        <div class="alert alert-danger mt-2">
            Não existem vendedores cadastrados.
        </div>
    @endif
</div>

<style>
    .full-width {
        width: 121.5%;
    }
</style>

@endsection