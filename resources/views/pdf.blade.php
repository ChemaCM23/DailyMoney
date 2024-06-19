<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movimientos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            margin: 20px;
        }

        .header, .footer {
            text-align: center;
        }

        .content {
            margin-top: 20px;
        }

        .movement-table {
            width: 100%;
            border-collapse: collapse;
        }

        .movement-table th, .movement-table td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .movement-table th {
            background-color: #f2f2f2;
            text-align: left;
        }

        .movement-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .movement-table tr:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Historial de Movimientos</h1>
        </div>

        <div class="content">
            <table class="movement-table">
                <thead>
                    <tr>
                        <th>Categoría</th>
                        <th>Tipo</th>
                        <th>Descripción</th>
                        <th>Cantidad</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($movements as $movement)
                        <tr>
                            <td>{{ $movement->category->name }}</td>
                            <td>{{ $movement->type }}</td>
                            <td>{{ $movement->description }}</td>
                            <td>{{ $movement->amount }}</td>
                            <td>{{ $movement->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="footer">
            <p>Generado por DailyMoney</p>
        </div>
    </div>
</body>
</html>
