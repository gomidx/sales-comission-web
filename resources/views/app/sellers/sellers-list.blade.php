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
                                <a href="{{ route('dashboard.send-seller-email', $seller['id']) }}" class="btn btn-success">Enviar e-mail</a>
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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    function confirmDelete(route) {
		Swal.fire({
			title: 'Atenção!',
			text: 'Esta ação excluirá esse vendedor permanentemente.',
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#641ce4',
			cancelButtonColor: '#fb7474',
			confirmButtonText: '<b>Confirmar exclusão</b>',
			cancelButtonText: '<b>Cancelar</b>',
		}).then((result) => {
			if (result.isConfirmed) {
                console.log('{{ csrf_token() }}');

                fetch(route, {
                    method: 'DELETE',
                    headers: {
                        '_token': '{{ csrf_token() }}'
                    }
                }).then(function (response) {
                    if (response.data) {
                        Swal.fire('Sucesso!', 'Vendedor excluído.', 'success');

                        setTimeout(() => {
                            window.location.reload();
                        }, 1500);
                    } else {
                        Swal.fire('Erro!', response.error, 'error');
                    }
                }).catch(function (error) {
                    console.log(error,'asdnas');
                });
				/*$.ajax({
					type: 'DELETE',
					data: {
						_token: '{{ csrf_token() }}'
					},
					url: route,
					success: function (response) {
						if (response.data) {
							Swal.fire('Sucesso!', 'Vendedor excluído.', 'success');

							setTimeout(() => {
								window.location.reload();
							}, 1500);
						} else {
							Swal.fire('Erro!', response.error, 'error');
						}
					},
					error: function (error) {
						Swal.fire('Erro!', 'Ocorreu um erro interno. Entre em contato com o administrador do sistema.', 'error');
						console.log(error);
					}
            	});*/
			}
		})
    }
</script>

<style>
    .full-width {
        width: 121.5%;
    }
</style>

@endsection