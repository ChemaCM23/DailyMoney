<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Movimiento - DailyMoney</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* Estilos específicos para el formulario de edición */

        body {
            font-family: Arial;
            background-color: #d2c3dc;
        }

        .edit-movement-container {
            font-family: Arial;
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .edit-movement-container .form-group {
            margin-bottom: 20px;
        }

        .edit-movement-container label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #333;
        }

        .edit-movement-container select,
        .edit-movement-container input[type="text"],
        .edit-movement-container input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .edit-movement-container .btn-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .edit-movement-container button {
            background-color: #490188;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .edit-movement-container button:hover {
            background-color: #2a004f;
        }

        .title {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
        }
        .buttonVolver {
            background-color: #490188;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            display: inline-flex;
            align-items: center;
        }

        .buttonVolver:hover {
            background-color: #2a004f;
        }
    </style>
</head>

<body>

    <x-app-layout></x-app-layout>

    <div class="edit-movement-container">
        <h1 class="title">Editar Movimiento</h1>
        <form action="{{ route('movement.update', $movement->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="type">Tipo:</label>
                <select name="type" id="type">
                    <option value="expense" {{ $movement->type === 'expense' ? 'selected' : '' }}>Gasto</option>
                    <option value="income" {{ $movement->type === 'income' ? 'selected' : '' }}>Ingreso</option>
                </select>
            </div>
            <div class="form-group">
                <label for="category_id">Categoría:</label>
                <select name="category_id" id="category_id">
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $movement->category_id === $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="description">Descripción:</label>
                <input type="text" name="description" id="description" value="{{ $movement->description }}">
            </div>
            <div class="form-group">
                <label for="amount">Cantidad:</label>
                <input type="number" name="amount" id="amount" value="{{ $movement->amount }}">
            </div>
            <div class="btn-container">
                <button type="submit">Guardar Cambios</button>
                <a href="{{ route('movement.index') }}" class="buttonVolver">Volver</a>
            </div>
        </form>
    </div>

    <x-footer></x-footer>

</body>

</html>
