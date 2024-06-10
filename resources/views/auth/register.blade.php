<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
            display: flex;
            flex-wrap: wrap;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            width: 100%;
        }

        .form-group input[type="text"],
        .form-group input[type="email"],
        .form-group input[type="password"] {
            flex: 1;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            margin-right: 20px;
            margin-bottom: 10px;
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
            padding: 12px 24px;
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

        .espacio {
            margin-bottom: 20px;
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
                <h1>Registro</h1>
                <p>Registrate para poder ingresar a DailyMoney.</p>
            </div>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Nombre y apellido -->
                <div class="form-group">
                    <div>
                        <label for="name">Nombre</label>
                        <input id="name" type="text" name="name" required autofocus autocomplete="name">
                    </div>
                    <div>
                        <label for="surname">Apellido</label>
                        <input id="surname" type="text" name="surname" required autofocus autocomplete="surname">
                    </div>
                </div>

                <!-- Telefono y email -->
                <div class="form-group">
                    <div>
                        <label for="phone">Teléfono</label>
                        <input id="phone" type="text" name="phone" required autofocus autocomplete="phone">
                    </div>
                    <div>
                        <label for="email">Email</label>
                        <input id="email" type="email" name="email" required autocomplete="username">
                    </div>
                </div>

                <!-- Contraseña y confirmacion -->
                <div class="form-group">
                    <div>
                        <label for="password">Contraseña</label>
                        <input id="password" type="password" name="password" required autocomplete="new-password">
                    </div>
                    <div>
                        <label for="password_confirmation">Confirmar contraseña</label>
                        <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

                <!-- Link olvidar contraseña y boton registrar -->
                <div class="form-footer">
                    {{-- <a href="{{ route('welcome') }}"><button type="button">Volver a la página de bienvenida</button></a> --}}
                    <button type="submit">Registrar</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
