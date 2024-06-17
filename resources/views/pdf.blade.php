<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movimientos PDF</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <h1>Movimientos</h1>
    <table>
        <thead>
            <tr>
                <th>Categoría</th>
                <th>Descripción</th>
                <th>Tipo</th>
                <th>Importe</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            @foreach($movement as $movements)
            <tr>
                <td>{{ $movements->category->name }}</td>
                <td>{{ $movements->description }}</td>
                <td>{{ $movements->type }}</td>
                <td>{{ $movements->amount }}</td>
                <td>{{ $movements->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <br><br>
    <h4>PDF descargado de la página DailyMoney</h4>
</body>
</html>
