<?php
session_start();


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Exitoso</title>
    <style>
        /* Estilos generales */
        body {
            font-family: Arial, sans-serif;
            background-color: #000000; /* Negro */
            color: #ffffff; /* Blanco */
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #1e90ff; /* Azul */
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            text-align: center;
        }

        h1 {
            color: #ffffff; /* Blanco */
        }

        p {
            margin-bottom: 20px;
        }

        a {
            color: #ffffff; /* Blanco */
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        /* Estilos para el botón */
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #000000; /* Negro */
            color: #ffffff; /* Blanco */
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-decoration: none;
        }

        .button:hover {
            background-color: #1e90ff; /* Azul */
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>¡Registro Exitoso!</h1>
        <p>Gracias por registrarte en nuestra aplicación web. Tu cuenta ha sido creada con éxito.</p>
        <p>Tu cuenta será revisada y autorizada próximamente por nuestro equipo. Una vez que tu cuenta sea aprobada, podrás acceder a todas las características de nuestra aplicación.</p>
        <p>Mientras tanto, si tienes alguna pregunta o necesitas ayuda, no dudes en <a href="contacto.html">contactarnos</a>.</p>
        <p><a href="wiki.php" class="button">Volver a la página principal</a></p>
    </div>
</body>

</html>
