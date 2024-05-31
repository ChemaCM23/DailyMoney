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
            background-color: #f0f0f0;
            flex-direction: column;
            /* Para que la navbar quede arriba y el contenido abajo */
        }

        .navbar {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar-brand {
            font-size: 24px;
        }

        .navbar-nav {
            list-style-type: none;
            padding: 0;
            margin: 0;
            display: flex;
        }

        .nav-item {
            margin-right: 20px;
        }

        .nav-link {
            color: #fff;
            text-decoration: none;
            font-size: 18px;
            transition: color 0.3s ease;
        }

        .nav-link:hover {
            color: #ccc;
        }

        .content {
            flex-grow: 1;
            /* El contenido ocupará todo el espacio restante */
            padding: 20px;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin: 0 10px;
            /* Mantiene un margen entre contenedores */
        }

        .container-left {
            flex: 1 1 55%;
        }

        .container-right {
            flex: 1 1 20%;
        }

        .balance-container {
            background-color: #007bff;
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
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-right: 5px;
            /* Espacio entre botones */
        }

        .btn:hover,
        .btn-close:hover {
            background-color: #0056b3;
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

        .titulo {
            text-align: center;
            margin-top: 20px;
            margin-bottom: 20px;
            font-size: 36px;
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
            <div class="balance-container">
                <h2>Saldo</h2>
                <div class="balance-large">
                    @if(Auth::user())
                    {{ Auth::user()->balance }}
                    @endif
                </div>
            </div>
            <!-- Mostrar botón para editar saldo -->
            <button type="button" class="btn" id="editBalanceBtn">Editar Saldo</button>

            <!-- Formulario para editar saldo -->
            <div id="editBalanceForm" style="display: none;">
                <h2>Editar Saldo</h2>
                <form method="POST" action="{{ route('edit.balance') }}">
                    @csrf
                    <div class="input-group">
                        <label for="new-balance">Nuevo Saldo:</label>
                        <input type="number" id="new-balance" name="new-balance" placeholder="Nuevo saldo" required>
                    </div>
                    <button type="submit" class="btn">Guardar</button>
                    <button type="button" class="btn btn-close"
                        onclick="document.getElementById('editBalanceForm').style.display='none'; document.getElementById('editBalanceBtn').style.display='block';">Cerrar</button>
                </form>
            </div>
        </div>
        <div class="container container-right">
            <!-- Contenido del contenedor derecho -->
            <!-- Aquí podrías colocar la imagen y el texto animado que mencionaste anteriormente -->
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleMenu = document.getElementById('toggleMenu');
            const navbarNav = document.querySelector('.navbar-nav');

            toggleMenu.addEventListener('click', function() {
                navbarNav.classList.toggle('show');
            });

            const editBalanceBtn = document.getElementById('editBalanceBtn');
            editBalanceBtn.addEventListener('click', function() {
                document.getElementById('editBalanceForm').style.display = 'block';
                editBalanceBtn.style.display = 'none';
            });
        });
    </script>
</body>

</html>
