<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Email</title>
</head>

<body>
    <p>¡Hola!</p>
    <p>Has recibido un nuevo mensaje de contacto:</p>
    <ul>
        <li><strong>Nombre:</strong> {{ $data['name'] }}</li>
        <li><strong>Correo electrónico:</strong> {{ $data['email'] }}</li>
        <li><strong>Mensaje:</strong> {{ $data['message'] }}</li>
    </ul>
    <p>¡Gracias!</p>
</body>

</html>
