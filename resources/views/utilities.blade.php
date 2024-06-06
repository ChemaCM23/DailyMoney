<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Utilidades</title>
    <style>
        /* Estilos previamente definidos */
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }
        .utilities-container {
            display: flex;
            justify-content: space-between;
            padding: 20px;
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

        /* Nuevos estilos para el conversor de divisas */
        .currency-converter {
            margin-top: 20px;
            text-align: center;
        }
        .currency-converter input[type="number"],
        .currency-converter select {
            width: 80%;
            margin-bottom: 10px;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .currency-converter button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .currency-converter button:hover {
            background-color: #0056b3;
        }
        .conversion-result {
            font-size: 16px;
            margin-top: 10px;
            text-align: center;
        }
    </style>
</head>
<body>

    <x-app-layout></x-app-layout>

    <h1 class="titulo">Herramientas a tu alcance</h1>
    <div class="utilities-container">
        <div class="left-section">
            <h2 class="titulo2">¿Quién te debe dinero?</h2>
            <p>Contenido de la sección izquierda...</p>
        </div>

        <!-- Sección derecha conversos de monedas -->
        <div class="right-section">
            <h2 class="titulo2">Conversor de divisas</h2>
            <div class="currency-converter">
                <input id="amount" type="number" placeholder="Cantidad" step="0.01">
                <select id="fromCurrency">
                    <option value="USD">Dólares ($)</option>
                    <option value="EUR">Euros (€)</option>
                    <option value="GBP">Libras (£)</option>
                </select>
                <h3>Convertir a:</h3>
                <select id="toCurrency">
                    <option value="USD">Dólares ($)</option>
                    <option value="EUR">Euros (€)</option>
                    <option value="GBP">Libras (£)</option>
                </select>
                <button id="convertButton">Convertir</button>
                <div class="conversion-result" id="conversionResult"></div>
            </div>
        </div>
    </div>

    <script>
        const convertButton = document.getElementById('convertButton');
        const conversionResult = document.getElementById('conversionResult');

        convertButton.addEventListener('click', async () => {
            const amount = document.getElementById('amount').value;
            const fromCurrency = document.getElementById('fromCurrency').value;
            const toCurrency = document.getElementById('toCurrency').value;

            // Aquí deberías hacer una llamada a la API para obtener las tasas de cambio y realizar la conversión
            // Ejemplo de cómo hacer la llamada a la API usando fetch:
            const response = await fetch(`https://api.exchangerate-api.com/v4/latest/${fromCurrency}`);
            const data = await response.json();
            const exchangeRate = data.rates[toCurrency];
            const convertedAmount = amount * exchangeRate;

            // Mostrar el resultado de la conversión en el campo de entrada conversionResult
            conversionResult.textContent = `${amount} ${fromCurrency} equivale a ${convertedAmount.toFixed(2)} ${toCurrency}`;
        });
    </script>

</body>
</html>
