<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body, html {

            height: 100%;
            font-family: Arial, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #d2c3dc;
        }

        .container {
            display: flex;
            width: 100%;
            max-width: 1400px;
            height: 90vh;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        .image-side {
            width: 40%;
            background-color: #edcdfd;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .image-side img {
            max-width: 80%;
            max-height: 80%;
            border-radius: 10px;
            animation: float 3s ease-in-out infinite;
        }

        .form-side {
            width: 60%;
            padding: 80px;
            background-color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .form-group {
            margin-bottom: 20px;
            display: flex;
            flex-wrap: wrap;
            gap: 20px; /* Espacio entre los grupos de campos */
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            width: 100%;
        }

        .form-group input[type="text"],
        .form-group input[type="email"],
        .form-group input[type="password"],
        .form-group select {
            flex: 1;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            width: 100%; /* Ajuste para que los campos ocupen todo el ancho disponible */
        }

        .form-group .third-width {
            flex: 0 0 calc(33.33% - 10px); /* Ajuste para tres columnas, restando el espacio entre ellos */
        }

        .form-group .half-width {
            flex: 0 0 calc(50% - 10px); /* Ajuste para dos columnas, restando el espacio entre ellos */
        }

        .inline-flex {
            display: flex;
            align-items: center;
        }

        .inline-flex input[type="checkbox"] {
            margin-right: 10px;
        }

        .form-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #ccc;
        }

        .form-footer a {
            text-decoration: none;
            color: #2a004f;
            font-weight: bold;
            transition: transform 0.3s;
        }

        .form-footer a:hover {
            text-decoration: none;
            transform: translateY(-5px);
        }

        .form-footer button {
            padding: 12px 24px;
            background-color: #490188;
            border: none;
            border-radius: 20px;
            color: white;
            cursor: pointer;
        }

        .form-footer button:hover {
            background-color: #2a004f;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-20px);
            }
        }

        .espacio {
            margin-bottom: 20px;
            font-size: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Parte izquierda -->
        <div class="image-side">
            <img src="{{ asset('storage/images/logoSinFondo.png') }}" alt="Register Image">
        </div>

        <!-- Parte derecha -->
        <div class="form-side">
            <div class="espacio">
                <h1>Rellena tus datos para crea una cuenta en DailyMoney</h1>

            </div>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Nombre, Apellido -->
                <div class="form-group">
                    <div class="half-width">
                        <label for="name">Nombre</label>
                        <input id="name" type="text" name="name" required autofocus autocomplete="name">
                    </div>
                    <div class="half-width">
                        <label for="surname">Apellido</label>
                        <input id="surname" type="text" name="surname" required autofocus autocomplete="surname">
                    </div>
                </div>

                <!-- Moneda -->
                <div class="form-group">
                    <div class="third-width">
                        <label for="currency">Moneda</label>
                        <select id="currency" name="currency" required>
                            <option value="EUR">Euro (€)</option>
                            <option value="USD">Dólar ($)</option>
                            <option value="GBP">Libra (£)</option>
                        </select>
                    </div>
                </div>


                <!-- Telefono y email -->
                <div class="form-group">
                    <div class="half-width">
                        <label for="phone">Teléfono</label>
                        <input id="phone" type="text" name="phone" required autofocus autocomplete="phone">
                    </div>
                    <div class="half-width">
                        <label for="email">Email</label>
                        <input id="email" type="email" name="email" required autocomplete="username">
                    </div>
                </div>

                <!-- Contraseña y confirmacion -->
                <div class="form-group">
                    <div class="half-width">
                        <label for="password">Contraseña</label>
                        <input id="password" type="password" name="password" required autocomplete="new-password">
                    </div>
                    <div class="half-width">
                        <label for="password_confirmation">Confirmar contraseña</label>
                        <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

                <!-- Link olvidar contraseña y boton registrar -->
                <div class="form-footer">
                    <a href="{{ route('login') }}" class="btn-secondary">¿Ya tienes una cuenta?</a>
                    <button type="submit">Registrar</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
