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
            gap: 20px;
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
            width: 100%;
        }

        .form-group .third-width {
            flex: 0 0 calc(33.33% - 10px);
        }

        .form-group .half-width {
            flex: 0 0 calc(50% - 10px);
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

        .error-message {
            color: red;
            font-size: 0.875em;
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
                <h1>Rellena tus datos para crear una cuenta en DailyMoney</h1>
            </div>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Nombre, Apellido -->
                <div class="form-group">
                    <div class="half-width">
                        <label for="name">Nombre</label>
                        <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
                        @error('name')
                            <span class="error-message">{{ 'El nombre debe contener 50 digitos' }}</span>
                        @enderror
                    </div>
                    <div class="half-width">
                        <label for="surname">Apellido</label>
                        <input id="surname" type="text" name="surname" value="{{ old('surname') }}" required autofocus autocomplete="surname">
                        @error('surname')
                            <span class="error-message">{{ 'El apellido debe contener 50 digitos' }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Moneda -->
                <div class="form-group">
                    <div class="third-width">
                        <label for="currency">Moneda</label>
                        <select id="currency" name="currency" required>
                            <option value="EUR" {{ old('currency') == 'EUR' ? 'selected' : '' }}>Euro (€)</option>
                            <option value="USD" {{ old('currency') == 'USD' ? 'selected' : '' }}>Dólar ($)</option>
                            <option value="GBP" {{ old('currency') == 'GBP' ? 'selected' : '' }}>Libra (£)</option>
                        </select>
                        @error('currency')
                            <span class="error-message">{{ 'Debes elegir una moneda del desplegable' }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Teléfono y email -->
                <div class="form-group">
                    <div class="half-width">
                        <label for="phone">Teléfono</label>
                        <input id="phone" type="text" name="phone" value="{{ old('phone') }}" required autofocus autocomplete="phone">
                        @error('phone')
                            <span class="error-message">{{ 'El teléfono debe contener 9 digitos' }}</span>
                        @enderror
                    </div>
                    <div class="half-width">
                        <label for="email">Email</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username">
                        @error('email')
                            <span class="error-message">{{ 'El email debe tener un formato de email' }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Contraseña y confirmación -->
                <div class="form-group">
                    <div class="half-width">
                        <label for="password">Contraseña</label>
                        <input id="password" type="password" name="password" required autocomplete="new-password">
                        @error('password')
                            <span class="error-message">{{ 'La contraseña debe contener mínimo 8 caracteres' }}</span>
                        @enderror
                    </div>
                    <div class="half-width">
                        <label for="password_confirmation">Confirmar contraseña</label>
                        <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

                <!-- Link olvidar contraseña y botón registrar -->
                <div class="form-footer">
                    <a href="{{ route('login') }}" class="btn-secondary">¿Ya tienes una cuenta?</a>
                    <button type="submit">Registrar</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
