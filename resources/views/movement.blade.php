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
            max-width: 800px;
            margin-top: 30px;
            margin-left: auto;
            margin-right: auto;
            padding: 20px;
            background-color: #f1f1f1;
            border-radius: 10px;
            box-shadow: 0 7px 10px rgba(0, 0, 0, 0.1);
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

        .titulo {
            text-align: center;
            margin-top: 20px;
            font-size: 24px;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <x-app-layout></x-app-layout>

    <div class="movement-form-container">
        <h1 class="titulo">Registrar Movimiento</h1>
        <form action="{{ route('movements.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="type">Tipo:</label>
                <select name="type" id="type">
                    <option value="expense">Gasto</option>
                    <option value="income">Ingreso</option>
                </select>
            </div>
            {{-- <div class="form-group">
                <label for="category_id">Categoría:</label>
                <select name="category_id" id="category_id">
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div> --}}
            <div class="form-group">
                <label for="description">Descripción:</label>
                <input type="text" name="description" id="description">
            </div>
            <div class="form-group">
                <label for="amount">Cantidad:</label>
                <input type="number" name="amount" id="amount">
            </div>
            <button type="submit">Guardar Movimiento</button>
        </form>
    </div>

</body>

</html>
