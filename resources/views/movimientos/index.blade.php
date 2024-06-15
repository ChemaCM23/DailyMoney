<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movimientos - DailyMoney</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* Estilos específicos para el formulario de movimientos */
        .movement-form-container {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .movement-form-container .form-group {
            margin-bottom: 20px;
        }

        .movement-form-container label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #333;
        }

        .movement-form-container select,
        .movement-form-container input[type="text"],
        .movement-form-container input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .movement-form-container .button-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
        }

        .movement-form-container button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .movement-form-container button:hover {
            background-color: #0056b3;
        }

        .movement-form-container .btn-secondary {
            background-color: #6c757d;
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            display: inline-flex;
            align-items: center;
        }

        .movement-form-container .btn-secondary:hover {
            background-color: #5a6268;
        }

        .alert {
            padding: 15px;
            background-color: #4CAF50;
            color: white;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        .history-container {
            margin-top: 40px;
        }

        .history-container table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .history-container th, .history-container td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .history-container th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>

    <x-app-layout></x-app-layout>

    <div class="movement-form-container">
        <h2>Registrar Movimiento</h2>
        @if(session('success'))
            <div class="alert">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('movement.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="type">Tipo:</label>
                <select name="type" id="type">
                    <option value="expense">Gasto</option>
                    <option value="income">Ingreso</option>
                </select>
            </div>
            <div class="form-group">
                <label for="category_id">Categoría:</label>
                <select name="category_id" id="category_id">
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="description">Descripción:</label>
                <input type="text" name="description" id="description">
            </div>
            <div class="form-group">
                <label for="amount">Cantidad:</label>
                <input type="number" name="amount" id="amount">
            </div>
            <div class="button-container">
                <button type="submit">Guardar Movimiento</button>
                <a href="{{ route('dashboard') }}" class="btn-secondary">Volver al Dashboard</a>
            </div>
        </form>
    </div>

    <div class="history-container">
        <h2>Historial de Movimientos</h2>
        <table>
            <thead>
                <tr>
                    <th>Tipo</th>
                    <th>Categoría</th>
                    <th>Descripción</th>
                    <th>Cantidad</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($history as $movement)
                <tr>
                    <td>{{ ucfirst($movement->type) }}</td>
                    <td>{{ optional($movement->category)->name ?: '-' }}</td>
                    <td>{{ $movement->description ?: '-' }}</td>
                    <td>{{ $movement->amount }}</td>
                    <td>{{ $movement->created_at->format('d-m-Y H:i') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <x-footer></x-footer>

</body>

</html>
