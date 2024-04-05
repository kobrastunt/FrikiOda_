<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Insertar personaje</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f7f7f7;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    form {
        background-color: #ffffff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
    }

    label {
        display: block;
        margin-bottom: 5px;
    }

    input[type="text"],
    input[type="file"] {
        width: calc(100% - 12px);
        padding: 8px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    input[type="file"] {
        cursor: pointer;
    }

    button[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }

    button[type="submit"]:hover {
        background-color: #45a049;
    }
</style>
</head>
<body>

<form action="insertar.php" enctype="multipart/form-data" method="POST">
    <label for="nombre">Personaje:</label>
    <input type="text" id="nombre" name="nombre" required> <br>
    <label for="descripcion">Descripción:</label>
    <input type="text" id="descripcion" name="descripcion" required> <br>
    <label for="imagen">Imagen:</label>
    <input type="file" id="imagen" name="imagen" required> <br><br>
    <button type="submit" name="registrar">Registrar</button>
</form>

</body>
</html>
