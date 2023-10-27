<!DOCTYPE html>
<html>
<head>
    <title>Relatório de vendas do dia</title>
</head>
<body>
    <h2>Relatório de Vendas do Dia</h2>

    <p>Data: {{ $date }}</p>

    <table>
        <thead>
            <tr>
                <th>Quantidade de Vendas</th>
                <th>Valor Total das Vendas</th>
                <th>Valor Total da Comissão</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $salesQuantity }}</td>
                <td>R$ {{ $totalSales }}</td>
                <td>R$ {{ $totalComission }}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>