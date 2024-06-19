<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>DailyMoney</title>

    <style>
        /* Estilo de letra titulo principal*/
        @import url("https://fonts.googleapis.com/css?family=Raleway:400,400i,700");

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            background: #d2c3dc;
            margin-top: 50px;
            margin-bottom: 20px;
            color: rgb(0, 0, 0);
        }

        .reveal {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: #000000;
            font-size: 5em;
            font-family: Raleway, sans-serif;
            letter-spacing: 3px;
            text-transform: uppercase;
            white-space: pre;

            span {
                opacity: 0;
                transform: scale(0);
                animation: fadeIn 4s forwards;
            }

            &::before,
            &::after {
                position: absolute;
                content: "";
                top: 0;
                bottom: 0;
                width: 2px;
                height: 100%;
                background: rgb(0, 0, 0);
                opacity: 0;
                transform: scale(0);
            }

            &::before {
                left: 50%;
                animation: slideLeft 3s cubic-bezier(0.7, -0.6, 0.3, 1.5) forwards;
            }

            &::after {
                right: 50%;
                animation: slideRight 3s cubic-bezier(0.7, -0.6, 0.3, 1.5) forwards;
            }
        }

        @keyframes fadeIn {
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        @keyframes slideLeft {
            to {
                left: -6%;
                opacity: 1;
                transform: scale(0.9);
            }
        }

        @keyframes slideRight {
            to {
                right: -6%;
                opacity: 1;
                transform: scale(0.9);
            }
        }

        .buttons {
            margin-top: 20px;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #490188;
            color: white;
            text-decoration: none;
            border-radius: 30px;
            transition: background-color 0.3s;
            transition: transform 0.3s;
        }

        .button1 {
            margin-right: 10px;
        }

        .button2 {
            margin-left: 10px;
        }

        .button:hover {
            background-color: #2a004f;
            transform: translateY(-5px);
        }

        /* Estilos de cards */
        .card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .card {
            width: 200px;
            margin: 30px;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.4);
            transition: transform 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);

        }

        .card img {
            width: 100%;
            height: auto;
            border-bottom: 1px solid #000000;
        }

        .card-text {
            padding: 10px;
            text-align: center;
            font-size: 18px;
        }

        /* Textos */
        .descripcion {
            font-size: 18px;
            font-weight: bold;
        }

        .register{
            font-size: 24px;
            font-weight: bolder;
        }

        /* Estilos para el modo oscuro */
        .dark-mode {
            background-color: #333;
            color: #fff;
        }

        /* Recuadro */
        .recuadro {
            border-radius: 15px;
            background-color: #ffffff89;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 30px;
        }

        /* Espacio */
        .espacio {
            margin-top: 80px;
        }

        /* Logo */
        .logo img {
            width: 150px;
            height: auto;
        }

        /* Media queries para moviles */
        @media screen and (max-width: 768px) {
            body {
                margin-top: 100px;
                margin-bottom: 20px;
            }

            .reveal {
                font-size: 3em;
            }

            .descripcion {
                font-size: 14px;
            }

            .register {
                font-size: 14px;
            }

            .button {
                padding: 8px 15px;
                font-size: 14px;
            }

            .card {
                width: 150px;
                margin: 20px;
            }

            .card-text {
                font-size: 14px;
            }

            .recuadro {
                padding: 15px;
                width: 300px;
            }

            .espacio {
                margin-top: 40px;
            }
        }

        /* Media queries adicionales para otros elementos */
        @media screen and (max-width: 768px) {
            .recuadro {
                margin-top: 20px; /* Ajustar margen superior del recuadro */
            }
        }

        /* Logo media queries */
        @media screen and (min-width: 768px) {
            .logo img {
                width: 200px;
                }
            }

    </style>
</head>

<body>
    <div
        class="relative sm:flex sm:justify-center sm:items-center min-h-screen
        bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter
        dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        <div class="reveal">Descubre DailyMoney</div>

        <div class="logo"><img src="{{ asset('storage/images/logoSinFondo.png') }}" alt="Descripción de la imagen">
        </div>

        <div class="descripcion">DailyMoney es una nueva web con una app para móvil
            con diversas funciones para controlar los gastos en tu día a día</div>

        <!-- Cuadro texto y botones -->
        <div class="recuadro">
            <div class="register">Regístrate o inicia sesión para utilizar todos los servicios</div>

            <div class="buttons">
                @if (Route::has('login'))
                <a href="{{ route('login') }}" class="button button1">Inicia Sesión</a>
                @endif
                @if (Route::has('register'))
                <a href="{{ route('register') }}" class="button button2">Regístrate</a>
                @endif
            </div>
        </div>

        <!-- Cards -->
        <h1 class="espacio">SERVICIOS QUE OFRECEMOS</h1>
        <div class="card-container">
            <!-- Primera fila -->
            <div class="card">
                <a href="{{ route('aboutUs') }}">
                    <img src="{{ asset('storage/images/registroGastosIngresos.jpeg') }}" alt="Registro de gastos e ingresos">
                </a>
                <div class="card-text">
                    Registro de gastos e ingresos
                </div>
            </div>
            <div class="card">
                <a href="{{ route('aboutUs') }}">
                    <img src="{{ asset('storage/images/categoriasGastosIngresos.jpeg') }}" alt="Categoriías gastos e ingresos">
                </a>
                <div class="card-text">
                    Categorización de gastos e ingresos
                </div>
            </div>
            <div class="card">
                <a href="{{ route('aboutUs') }}">
                    <img src="{{ asset('storage/images/visuSaldo.jpeg') }}" alt="Visualización de saldo">
                </a>
                <div class="card-text">
                    Visualización de saldo
                </div>
            </div>
            <div class="card">
                <a href="{{ route('aboutUs') }}">
                    <img src="{{ asset('storage/images/historialTransacciones.jpeg') }}" alt="Historial de transacciones">
                </a>
                <div class="card-text">
                    Historial de transacciones
                </div>
            </div>
        </div>
        <!-- Segunda fila -->
        <div class="card-container">
            <div class="card">
                <a href="{{ route('aboutUs') }}">
                    <img src="{{ asset('storage/images/analisisGastos.jpeg') }}" alt="Analisis de gastos">
                </a>
                <div class="card-text">
                    Análisis de gastos
                </div>
            </div>
            <div class="card">
                <a href="{{ route('aboutUs') }}">
                    <img src="{{ asset('storage/images/contacta.jpeg') }}" alt="Alertas y recordatorios">
                </a>
                <div class="card-text">
                    Contacta con nosotros
                </div>
            </div>
            <div class="card">
                <a href="{{ route('aboutUs') }}">
                    <img src="{{ asset('storage/images/seguridad.jpeg') }}" alt="Seguridad  y privacidad">
                </a>
                <div class="card-text">
                    Seguridad y privacidad
                </div>
            </div>
            <div class="card">
                <a href="{{ route('aboutUs') }}">
                    <img src="{{ asset('storage/images/exportarDatos.jpeg') }}" alt="Exportación de datos">
                </a>
                <div class="card-text">
                    Exportación de datos
                </div>
            </div>
        </div>


    </div>

    <script>

        /* Texto principal */
        let duration = 0.8;
        let delay = 0.3;
        let revealText = document.querySelector(".reveal");
        let letters = revealText.textContent.split("");
        revealText.textContent = "";
        let middle = letters.filter(e => e !== " ").length / 2;
        letters.forEach((letter, i) => {
            let span = document.createElement("span");
            span.textContent = letter;
            span.style.animationDelay = `${delay + Math.abs(i - middle) * 0.1}s`;
            revealText.append(span);
        });
    </script>
</body>

</html>
