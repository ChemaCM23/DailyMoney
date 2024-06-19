<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movimientos - DailyMoney</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-color: #d2c3dc;
        }

        .movement-form-container {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin-top: 50px;
            margin-left: auto;
            margin-right: auto;
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
            background-color: #490188;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .movement-form-container button:hover {
            background-color: #2a004f;
        }

        .movement-form-container .btn-secondary {
            background-color: #490188;
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 20px;
            transition: background-color 0.3s ease;
            display: inline-flex;
            align-items: center;
        }

        .movement-form-container .btn-secondary:hover {
            background-color: #2a004f;
        }

        .alert {
            padding: 15px;
            background-color: #4CAF50;
            color: white;
            margin-bottom: 20px;
            border-radius: 20px;
        }

        .history-container {
            margin-top: 40px;
            max-width: 1000px;
            margin: 40px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .history-container table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .history-container th,
        .history-container td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .history-container th {
            background-color: #f2f2f2;
        }

        .history-container .btn-warning,
        .history-container .btn-danger {
            display: inline-block;
            padding: 8px 12px;
            font-size: 14px;
            border: none;
            cursor: pointer;
            border-radius: 20px;
            transition: background-color 0.3s ease;
            text-decoration: none;
            text-align: center;
            margin-right: 5px;
        }

        .history-container .btn-warning {
            background-color: #490188;
            color: #ffffff;
        }

        .history-container .btn-warning:hover {
            background-color: #2a004f;
        }

        .history-container .btn-danger {
            background-color: #dc3545;
            color: white;
        }

        .history-container .btn-danger:hover {
            background-color: #c82333;
        }

        .titulo {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            font-weight: bold;
        }

        /* Estilos para las ventanas modales */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .modal-content h2 {
            margin-bottom: 15px;
        }

        .modal-content button {
            background-color: #490188;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin: 5px;
        }

        .modal-content button:hover {
            background-color: #2a004f;
        }

        .modal-content .btn-danger {
            background-color: #dc3545;
        }

        .modal-content .btn-danger:hover {
            background-color: #c82333;
        }

        /* Boton pdf */

        .button-container {
            text-align: center;
            margin-top: 20px;
        }


        .btn-pdf {
            background-color: #490188;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 10px;
        }

        .btn-pdf:hover {
            background-color: #2a004f;
        }
    </style>
</head>

<body>

    <x-app-layout></x-app-layout>

    <div class="movement-form-container">
        <h1 class="titulo">Registrar Movimiento</h1>
        @if(session('success'))
        <div class="alert">
            {{ session('success') }}
        </div>
        @endif
        <form id="movementForm" action="{{ route('movement.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="type">Tipo:</label>
                <select name="type" id="type" required>
                    <option value="expense">Gasto</option>
                    <option value="income">Ingreso</option>
                </select>
            </div>
            <div class="form-group">
                <label for="category_id">Categoría:</label>
                <select name="category_id" id="category_id" required>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="description">Descripción:</label>
                <input type="text" name="description" id="description" required>
            </div>
            <div class="form-group">
                <label for="amount">Cantidad:</label>
                <input type="number" name="amount" id="amount" step="0.01" min="0" required>
            </div>
            <div class="button-container">
                <button type="button" onclick="openSaveModal()">Guardar Movimiento</button>
                <a href="{{ route('dashboard') }}" class="btn-secondary">Ver saldo</a>
            </div>
        </form>
    </div>

    <!-- Ventana Modal para Confirmar Guardar Movimiento -->
    <div id="confirmSaveModal" class="modal">
        <div class="modal-content">
            <h2>Confirmar Guardar Movimiento</h2>
            <p>¿Estás seguro de que quieres guardar este movimiento?</p>
            <button onclick="saveMovement()">Guardar</button>
            <button onclick="closeSaveModal()">Cancelar</button>
        </div>
    </div>

    <!-- Ventana Modal para Confirmar Borrar Movimiento -->
    <div id="confirmDeleteModal" class="modal">
        <div class="modal-content">
            <h2>Confirmar Borrar Movimiento</h2>
            <p>¿Estás seguro de que quieres borrar este movimiento?</p>
            <button class="btn-danger" id="confirmDeleteButton">Borrar</button>
            <button onclick="closeDeleteModal()">Cancelar</button>
        </div>
    </div>

    <div class="history-container">
        <h1 class="titulo">Historial de Movimientos</h1>
        <table>
            <thead>
                <tr>
                    <th>Categoría</th>
                    <th>Descripción</th>
                    <th>Cantidad</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($history as $movement)
                <tr>
                    <td>{{ $movement->category->name ?: '-' }}</td>
                    <td>{{ $movement->description ?: '-' }}</td>
                    <td>{{ $movement->amount }}</td>
                    <td>{{ $movement->created_at->format('d-m-Y H:i') }}</td>
                    <td>
                        <a href="{{ route('movement.edit', $movement->id) }}" class="btn-warning">Editar</a>
                        <button class="btn-danger" onclick="openDeleteModal({{ $movement->id }})">Borrar</button>
                        <form id="deleteForm-{{ $movement->id }}" action="{{ route('movement.destroy', $movement->id) }}" method="POST" style="display:none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="button-container">
            @if ($movements->count() > 0)
            <a href="{{ route('generate-pdf', $movement->id) }}" class="btn-pdf">Generar PDF de tu historial</a>
            @endif
        </div>
    </div>

    <x-footer></x-footer>

    <script>
        //Modal guardar movimiento
        function openSaveModal() {
            document.getElementById('confirmSaveModal').style.display = 'block';
        }

        function closeSaveModal() {
            document.getElementById('confirmSaveModal').style.display = 'none';
        }

        function saveMovement() {
            if (validateForm()) {
                document.getElementById('movementForm').submit();
            }
        }

        //Modal borrar movimiento
        function openDeleteModal(id) {
            document.getElementById('confirmDeleteModal').style.display = 'block';
            document.getElementById('confirmDeleteButton').onclick = function () {
                document.getElementById('deleteForm-' + id).submit();
            };
        }

        function closeDeleteModal() {
            document.getElementById('confirmDeleteModal').style.display = 'none';
        }

        // Validar formulario
        function validateForm() {
            const type = document.getElementById('type').value;
            const category_id = document.getElementById('category_id').value;
            const description = document.getElementById('description').value.trim();
            const amount = document.getElementById('amount').value;

            if (!type) {
                alert('El campo "Tipo" es obligatorio.');
                return false;
            }
            if (!category_id) {
                alert('El campo "Categoría" es obligatorio.');
                return false;
            }
            if (!description) {
                alert('El campo "Descripción" es obligatorio.');
                return false;
            }
            if (!amount || parseFloat(amount) <= 0) {
                alert('El campo "Cantidad" es obligatorio y debe ser mayor a 0.');
                return false;
            }

            return true;
        }
    </script>

</body>

</html>
