<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Utilidades</title>
    <style>
        body {
            font-family: Arial;
            background-color: #d2c3dc;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .utilities-container {
            display: flex;
            justify-content: space-between;
            padding: 20px;
            flex: 1;
        }
        .left-section, .right-section {
            width: calc(50% - 10px);
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .left-section {
            margin-right: 10px;
        }
        .right-section {
            margin-left: 10px;
        }
        .titulo {
            font-size: 36px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
            margin-top: 20px;
        }
        .titulo2 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
            margin-top: 10px;
            text-align: center;
        }
        .titulo3 {
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 10px;
            margin-top: 10px;
            text-align: center;
        }
        .currency-converter {
            margin-top: 20px;
            text-align: center;
        }
        .currency-converter input,
        .currency-converter select {
            width: 30%;
            margin-bottom: 10px;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
            display: inline-block;
        }
        .currency-converter select {
            width: 22%;
        }
        .currency-converter button {
            background-color: #490188;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .currency-converter button:hover {
            background-color: #2a004f;
        }
        .conversion-result {
            font-size: 16px;
            margin-top: 10px;
            text-align: center;
        }
        .debtors-table-container {
            width: 30%;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 20px auto;
        }
        .debtors-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .debtors-table th, .debtors-table td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }
        .debtors-table th {
            background-color: #f2f2f2;
        }
        .btn-paid {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 8px 12px;
            font-size: 14px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .btn-paid:hover {
            background-color: #218838;
        }
        x-footer {
            color: white;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            width: 100%;
            bottom: 0;
        }

        .debt-form-container {
            text-align: center;
            margin-top: 20px;
        }
        .debt-form-container label {
            font-size: 16px;
            display: block;
            margin-bottom: 5px;
            text-align: left;
            margin-left: 10%;
        }
        .debt-form-container input {
            width: 80%;
            margin-bottom: 20px; /* Espacio entre campos */
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
            display: block;
            margin: 0 auto;
        }
        .debt-form-container button {
            background-color: #490188;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            display: block;
            margin: 20px auto 0; /* Espacio antes del botón */
        }
        .debt-form-container button:hover {
            background-color: #2a004f;
        }

        .spacelabel{
            margin-top: 20px;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<x-app-layout></x-app-layout>

<h1 class="titulo">Herramientas a tu alcance</h1>
<div class="utilities-container">
    <!-- Sección izquierda personas con deudas -->
    <div class="left-section">
        <h2 class="titulo2">¿Quién te debe dinero?</h2>
        <div class="debt-form-container">
            <form id="debtForm" action="{{ route('debt.add') }}" method="POST">
                @csrf
                <div class="input-group">
                    <label for="newDebtorName">Nombre del deudor</label>
                    <input type="text" id="newDebtorName" name="newDebtorName" placeholder="Nombre" required>
                </div>
                <div class="input-group">
                    <label class="spacelabel" for="debtAmount">Cantidad adeudada</label>
                    <input type="number" id="debtAmount" name="debtAmount" placeholder="Cantidad" step="0.01" required>
                </div>
                <button type="submit">Añadir Deuda</button>
            </form>
        </div>
    </div>

    <!-- Sección derecha conversor de monedas -->
    <div class="right-section">
        <h2 class="titulo2">Conversor de divisas</h2>
        <div class="currency-converter">
            <input id="amount" type="number" placeholder="Cantidad" step="0.01">
            <select id="fromCurrency">
                <option value="USD">Dólares ($)</option>
                <option value="EUR">Euros (€)</option>
                <option value="GBP">Libras (£)</option>
            </select>
            <h3 class="titulo3">Convertir a:</h3>
            <select id="toCurrency">
                <option value="USD">Dólares ($)</option>
                <option value="EUR">Euros (€)</option>
                <option value="GBP">Libras (£)</option>
            </select><br>
            <button id="convertButton">Convertir</button>
            <div class="conversion-result" id="conversionResult"></div>
        </div>
    </div>
</div>

<!-- Tabla de los deudores -->
<div class="debtors-table-container">
    <table class="debtors-table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Cantidad adeudada</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            @foreach($deudores as $deudor)
            <tr>
                <td>{{ $deudor->person_name }}</td>
                <td>${{ $deudor->amount_due }}</td>
                <td>
                    <form class="markAsPaidForm" action="{{ route('debt.markAsPaid', $deudor->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('PATCH')
                        <button type="button" class="btn-paid"> Marcar como pagado</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    // Conversor de divisas
    const convertButton = document.getElementById('convertButton');
    const conversionResult = document.getElementById('conversionResult');

    convertButton.addEventListener('click', async () => {
        const amount = document.getElementById('amount').value;
        const fromCurrency = document.getElementById('fromCurrency').value;
        const toCurrency = document.getElementById('toCurrency').value;


        // Uso de la API para obtener las tasas de cambio y realizar la conversión
        const response = await fetch(`https://api.exchangerate-api.com/v4/latest/${fromCurrency}`);
        const data = await response.json();
        const exchangeRate = data.rates[toCurrency];
        const convertedAmount = amount * exchangeRate;

        conversionResult.textContent = `${amount} ${fromCurrency} equivale a ${convertedAmount.toFixed(2)} ${toCurrency}`;
    });

    // Manejar el botón "Pagado"
    document.querySelectorAll('.btn-paid').forEach(button => {
        button.addEventListener('click', function() {
            const form = this.closest('form');
            const actionUrl = form.action;

            Swal.fire({
                title: '¿Estás seguro?',
                text: "Esta acción marcará la deuda como pagada.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, marcar como pagada'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();  // Enviar el formulario
                    Swal.fire(
                        '¡Marcada!',
                        'La deuda ha sido marcada como pagada.',
                        'success'
                    ).then(() => {
                        location.reload();
                    });
                }
            });
        });
    });
</script>

<x-footer></x-footer>
</body>
</html>
