<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DailyMoney</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            background-color: #d2c3dc;
            flex-direction: column;
        }

        .content {
            flex-grow: 1;
            padding: 20px;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: flex-start;
        }

        .container {
            background-color: #ffffffa8;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin: 0 10px;

        }

        .container-left {
            flex: 50%;
        }

        .container-right {
            flex: 40%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;

        }

        .balance-container {
            background-color: #490188;
            color: #fff;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            margin-bottom: 20px;
        }

        .balance-large {
            font-size: 32px;
            font-weight: bold;
        }

        .btn,
        .btn-close {
            background-color: #490188;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-right: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s;

        }

        .btn:hover,
        .btn-close:hover {
            background-color: #2a004f;
            transform: translateY(-5px);
        }

        .input-group {
            margin-bottom: 20px;
        }

        .input-group label {
            display: block;
            margin-bottom: 5px;
        }

        .input-group input {
            width: calc(100% - 20px);
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        .success-msg {
            color: #28a745;
            margin-top: 10px;
        }

        .error-msg {
            color: #dc3545;
            margin-top: 10px;
        }

        @media screen and (max-width: 768px) {
            .toggle-menu {
                display: flex;
                align-items: center;
            }

            .navbar-nav {
                display: none;
                flex-direction: column;
                position: absolute;
                top: 50px;
                left: 0;
                background-color: #333;
                width: 100%;
            }

            .navbar-nav.show {
                display: flex;
            }

            .navbar-nav li {
                margin-bottom: 10px;
            }
        }

        /* Estilos para los titulos */

        .titulo {
            text-align: center;
            margin-top: 20px;
            margin-bottom: 20px;
            font-size: 36px;
        }

        .tituloIntermedio {
            text-align: center;
            margin-top: 10px;
            margin-bottom: 10px;
            font-size: 24px;
        }

        .tituloSaldo {
            text-align: center;
            font-size: 30px;
            color: white;
        }

        /* Estilos para el contenido del contenedor derecho */
        .right-content {
            text-align: center;
        }

        .right-content img {
            max-width: 125px;
            margin-bottom: 20px;
            margin-left: auto;
            margin-right: auto;
        }

        .right-content .row {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;

            margin-bottom: 20px;

        }

        .right-content h3 {
            font-size: 24px;
            margin-bottom: 5px;
        }

        .right-content .btn {
            margin-bottom: 10px;
        }

        /* Estilos para las cards */
        .card-container {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .card {
            background-color: #ffffffa8;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
            text-align: center;
        }

        .card img {
            max-width: 100px;
            border-radius: 50%;
            margin-bottom: 10px;
            margin-left: auto;
            margin-right: auto;
        }

        .card h3 {
            font-size: 20px;
            margin-bottom: 10px;
        }

        .card p {
            margin-bottom: 10px;
        }

        .card-btn {
            background-color: #490188;
            color: #fff;
            border: none;
            border-radius: 20px;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            transition: transform 0.3s;
            margin-top: 10px;
        }

        .card-btn:hover {
            background-color: #2a004f;
            transform: translateY(-5px);
        }

        .colorLineas {
            color: black;
        }

    </style>
</head>

<body>
    <!-- Navbar -->
    <x-app-layout></x-app-layout>

    <!-- Contenido -->
    <h1 class="titulo">¡Bienvenido a DailyMoney, @if(Auth::user())
        {{ Auth::user()->name }} @endif! <br> Es hora de gestionar tus gastos.
    </h1>
    <div class="content">
        <div class="container container-left">
            <h2 class="tituloIntermedio">Edita tu saldo</h2>
            <div class="balance-container">
                <h2 class="tituloSaldo">Saldo</h2>
                <div class="balance-large">
                    @if(Auth::user())
                    @switch(Auth::user()->currency)
                        @case('EUR')
                            € {{ Auth::user()->balance }}
                            @break
                        @case('USD')
                            $ {{ Auth::user()->balance }}
                            @break
                        @case('GBP')
                            £ {{ Auth::user()->balance }}
                            @break
                    @endswitch
                    @endif
                </div>
            </div>

            <button type="button" class="btn" id="editBalanceBtn">Editar Saldo</button>

            <!-- Formulario para editar saldo -->
            <div id="editBalanceForm" style="display: none;">

                <form method="POST" action="{{ route('edit.balance') }}">
                    @csrf
                    <div class="input-group">
                        <label for="new-balance">Introduce un nuevo saldo:</label>
                        <input type="number" id="new-balance" name="new-balance" placeholder="Nuevo saldo" required>
                    </div>
                    <button type="submit" class="btn">Guardar</button>
                    <button type="button" class="btn btn-close"
                        onclick="document.getElementById('editBalanceForm').style.display='none'; document.getElementById('editBalanceBtn').style.display='inline-block';">Cerrar</button>
                </form>
            </div>
        </div>
        <div class="container container-right">
            <!-- Contenido del contenedor derecho -->
            <div class="right-content">
                <img src="{{ asset('storage/images/logoSinFondo.png') }}" alt="Descripción de la imagen">
                <hr class="colorLineas">
                <div class="row">
                    <h3>Añade tus movimientos</h3>
                    <a href="{{ route('movement.index') }}" class="btn">Añadir</a>
                </div>
                <hr>
                <div class="row">
                    <h3>Ver historial de movimientos</h3>
                    <a href="{{ route('movement.index') }}" class="btn">Ver historial</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Cards -->
    <h1 class="titulo">Tambien pueder ver  otros servicios</h1>
    <div class="card-container">

        <div class="card">
            <img src="{{ asset('storage/images/sobreNosotros.jpeg') }}" alt="Descripción de la imagen">
            <hr>
            <h3>Nosotros</h3>
            <p>Aquí encontrarás los servicios que ofrecemos detalladamente</p>
            <a href="{{ route('aboutUs') }}" class="card-btn">Ver Más</a>
        </div>
        <div class="card">
            <img src="{{ asset('storage/images/utilidades.jpeg') }}" alt="Descripción de la imagen">
            <hr>
            <h3>Utilidades</h3>
            <p>Descubre nuestras herramientas útiles en el día a día</p>
                <a href="{{ route('utilities.index') }}" class="card-btn">Ver Más</a>
        </div>
        <div class="card">
            <img src="{{ asset('storage/images/contacto.jpeg') }}" alt="Descripción de la imagen">
            <hr>
            <h3>Contacto</h3>
            <p>Contacta con nosotros para cualquier duda o problema</p>
            <a href="{{ route('contact') }}" class="card-btn">Ver Más</a>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const editBalanceBtn = document.getElementById('editBalanceBtn');
            editBalanceBtn.addEventListener('click', function() {
                const editBalanceForm = document.getElementById('editBalanceForm');
                if (editBalanceForm.style.display === 'none') {
                    editBalanceForm.style.display = 'block';
                    editBalanceBtn.style.display = 'none';
                } else {
                    editBalanceForm.style.display = 'none';
                    editBalanceBtn.style.display = 'inline-block';
                }
            });
        });
    </script>

<x-footer />

</body>

</html>
