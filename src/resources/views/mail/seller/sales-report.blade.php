<!DOCTYPE html>
<html>
<head>
    <title>Relatório</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fff;
            text-align: center;
            margin: 0;
            padding: 0;
        }

        h2 {
            color: #000;
            text-align: center;
        }

        p {
            color: #000;
            text-align: center;
        }

        table {
            margin: 0 auto;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #000;
            padding: 10px 20px;
        }

        th {
            background-color: #000;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:nth-child(odd) {
            background-color: #fff;
        }
    </style>
</head>
<body>
    <h2>Relatório de vendas do dia</h2>

    <p>Olá! Segue abaixo o relatório de suas vendas do dia {{ date('d/m/Y') }}.</p>

    <table>
        <thead>
            <tr>
                <th>Quantidade de vendas</th>
                <th>Valor total das vendas</th>
                <th>Valor total da comissão</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $sales['totalSales'] }}</td>
                <td>R$ {{ $sales['totalValue'] }}</td>
                <td>R$ {{ $sales['totalComission'] }}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>