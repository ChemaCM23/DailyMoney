<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre Nosotros - DailyMoney</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* Estilos para el contenido */
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .section {
            margin-bottom: 40px;
            background: #f8f9fa;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .section h2 {
            color: #007bff; /* Color azul para los títulos de sección */
            font-size: 24px;
            margin-bottom: 10px;
        }

        .section p {
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .contact-btn {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 20px; /* Más redondeado */
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .contact-btn:hover {
            background-color: #0056b3; /* Cambio de color al pasar el ratón */
            transform: translateY(-5px); /* Mueve el botón hacia arriba */
        }
    </style>
</head>

<body>

    <x-app-layout></x-app-layout>

    <!-- Contenido -->
    <div class="container">
        <div class="section">
            <h2>Registro de Gastos e Ingresos</h2>
            <p>Permite a los usuarios registrar sus transacciones financieras, incluyendo gastos e ingresos, para mantener un seguimiento preciso de sus finanzas personales.</p>
        </div>

        <div class="section">
            <h2>Categorización de Gastos e Ingresos</h2>
            <p>Facilita la organización de transacciones financieras mediante la asignación de categorías específicas, como alimentos, transporte, entretenimiento, etc.</p>
        </div>

        <div class="section">
            <h2>Visualización de Saldo</h2>
            <p>Ofrece a los usuarios una vista clara y concisa de su saldo actual, lo que les permite tomar decisiones financieras informadas en tiempo real.</p>
        </div>

        <div class="section">
            <h2>Historial de Transacciones</h2>
            <p>Proporciona un registro detallado de todas las transacciones pasadas, permitiendo a los usuarios revisar y analizar su historial financiero.</p>
        </div>

        <div class="section">
            <h2>Análisis de Gastos</h2>
            <p>Ofrece herramientas y gráficos para analizar los patrones de gasto de los usuarios, identificar áreas de mejora y establecer metas financieras.</p>
        </div>

        <div class="section">
            <h2>Contacta con Nosotros</h2>
            <p>Para consultas, sugerencias o asistencia, no dudes en ponerte en contacto con nuestro equipo. Estamos aquí para ayudarte.</p>
            <button class="contact-btn">Contactar</button>
        </div>

        <div class="section">
            <h2>Seguridad y Privacidad</h2>
            <p>Nos comprometemos a proteger la seguridad y privacidad de los datos de nuestros usuarios mediante medidas de seguridad avanzadas y políticas estrictas de privacidad.</p>
        </div>

        <div class="section">
            <h2>Exportación de Datos</h2>
            <p>Permite a los usuarios exportar sus datos financieros en formatos compatibles para su análisis adicional o para facilitar la migración a otros servicios.</p>
        </div>
    </div>
</body>

</html>
