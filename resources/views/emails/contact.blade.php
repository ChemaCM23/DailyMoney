<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Contacto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #d2c3dc;
            margin: 0;
            padding: 0;
        }
        .contact-form-container {
            max-width: 500px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .title {
            text-align: center;
            color: #333;
            font-size: 24px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }
        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        textarea {
            resize: vertical;
            min-height: 100px;
            border-radius: 5px;
        }

        .error-message {
            color: #ff0000;
            font-size: 14px;
            margin-top: 5px;
        }
        .success-message {
            color: #008000;
            font-size: 16px;
            margin-top: 10px;
            text-align: center;
        }

        .btn-container {
            display: flex;
            justify-content: space-between;
        }

        .btnIzq,
        .btnDer {
            background-color: #490188;
            color: #fff;
            border: none;
            margin-top: 30px;
            padding: 10px 20px;
            border-radius: 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            transition: transform 0.3s;
        }

        .btnIzq:hover,
        .btnDer:hover {
            background-color: #2a004f;
            transform: translateY(-5px);
        }
    </style>
</head>
<body>

    <x-app-layout></x-app-layout>

    <div class="contact-form-container"> <!-- Contenedor del formulario de contacto -->
        <h1 class="title">Formulario de Contacto</h1>
        @if ($errors->any())
            <div class="error-message">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('contact.send') }}" method="POST">
            @csrf
            <div>
                <label for="name">Nombre:</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required>
            </div>
            <div>
                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
            </div>
            <div>
                <label for="message">Mensaje:</label>
                <textarea id="message" name="message" required>{{ old('message') }}</textarea>
            </div>
            <div class="btn-container">
                <a href="{{ route('dashboard') }}" class="btnIzq">Volver al inicio</a>
                <button class="btnDer" type="submit">Enviar Mensaje</button>
            </div>
        </form>
    </div>

    <x-footer></x-footer>
</body>
</html>
