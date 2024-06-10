<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: Arial, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f0f0f0;
        }

        .container {
            display: flex;
            width: 90%;
            max-width: 1400px;
            height: 80vh;
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
            padding: 40px;
            background-color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group input[type="email"],
        .form-group input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
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
        }

        .form-footer a {
            text-decoration: none;
            color: #007BFF;
            font-weight: bold;
            transition: transform 0.3s;
        }

        .form-footer a:hover {
            text-decoration: none;
            transform: translateY(-5px);
        }

        .form-footer button {
            padding: 10px 20px;
            background-color: #007BFF;
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
        }

        .form-footer button:hover {
            background-color: #0056b3;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-20px);
            }
        }

        .espacio{
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Parte izquierda -->
        <div class="image-side">
            <img src="{{ asset('storage/images/logoSinFondo.png') }}" alt="Login Image">
        </div>

        <!-- Parte derecha -->
        <div class="form-side">

            <div class="espacio">
                <h1>Inicio de sesión</h1>
                <p>Bienvenido, inicia sesión para ingresar a DailyMoney.</p>
            </div>

            <form method="POST" action="{{ route('login') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <!-- Email -->
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" name="email" required autofocus autocomplete="username">
                    <!-- Aquí puedes mostrar los errores del email -->
                </div>

                <!-- Contraseña -->
                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input id="password" type="password" name="password" required autocomplete="current-password">
                    <!-- Aquí puedes mostrar los errores del password -->
                </div>

                <!-- Recuerdame -->
                <div class="form-group inline-flex">
                    <input id="remember_me" type="checkbox" name="remember">
                    <label for="remember_me">Recuérdame</label>
                </div>

                <!-- Olvidar contraseña y boton registrar -->
                <div class="form-footer">
                    <a href="{{ route('password.request') }}">¿Olvidaste la contraseña?</a>
                    <button type="submit">Iniciar sesión</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
