<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Inicia sesión para acceder, por favor');</script>";
    echo "<script>window.location.href = 'wiki.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html class="client-nojs" lang="es" dir="ltr">

<head>
    <meta charset="UTF-8" />
    <title>WikiOda, la enciclopedia de One piece </title>
    <link rel="stylesheet" type="text/css" href="assets\css\pstyle.css" />
    <style>
        body{
            background-image: url('imagenes/One_Piecee.webp');
    background-color: #cbeff4(255, 255, 255, 1); /* Ajusta el último valor para cambiar la opacidad */
    background-blend-mode: overlay;
        }
    </style>
    <script>
        function principal() {
            window.location.href = "wiki.php";
        }
    </script>
    <style>
    body {
        font-family: Arial, sans-serif;
    }

    table {
        border-collapse: collapse;
        width: 100%;
        margin-bottom: 20px;
    }

    th, td {
        border: 1px solid #0000FF;
        text-align: left;
        padding: 8px;
    }

    td {
        color: #140b81; /* Color de texto predeterminado */
    }

    tr:nth-child(odd) td {
        color: #FF0000; /* Cambia el color de texto para filas impares */
    }

    th {
        background-color: #ccccff;
        color: #333333;
    }

    tr:nth-child(even) {
        background-color: #f5f5f5; /* Color de fondo para filas pares */
    }

    tr:hover {
        background-color: #ccccff; /* Color de fondo al pasar el ratón */
    }

    td img {
        display: block;
        margin-left: auto;
        margin-right: auto;
        max-width: 100px;
        height: 120px;
        border-radius: 5px;
    }
</style>
</head>

</head>

<body>
    <header>
        <img src="imagenes\titulo.png" alt="Imagen cabecera One Piece" onclick="principal()">
    </header>

    <div class="menu">
        <ul>
            <li><a href="personajes.php" style="background-image: url('imagenes/one-piece.webp')">Personajes</a></li>
            <li><a href="frutadiablo.php" style="background-image: url('imagenes/One-piece-frutas-del-diablo.webp')">Fruta del diablo</a></li>
            <li><a href="curiosidades.php" style="background-image: url('imagenes/curiosidades.jpg')">Curiosidades</a></li>
            <li><a href="eichirooda.php" style="background-image: url('imagenes/oda.jpg')">Eiichirō Oda</a></li>
            <li><a href="tienda.php" style="background-image: url('imagenes/mugiwara-store.jpg')">Tienda Online</a></li>
        </ul>
    </div>

    <div class="columna-izquierda">
    <div class="formulario">
        <?php
                
                if (!isset($_SESSION['user_id'])) {
                    // Mostrar el formulario de inicio de sesión solo si el usuario no está autenticado
            ?>
            <h2>Iniciar sesión</h2>
            <form action="login.php" method="POST">
                <input type="text" name="email" placeholder="Correo electrónico">
                <input type="password" name="password" placeholder="Contraseña">
                <input type="submit" value="Iniciar sesión">
            </form>
            <span>¿No tienes una cuenta? <a href="signup.php">Regístrate</a></span>
            <?php
                } else {
                    // Si el usuario ya está autenticado, muestra un mensaje de bienvenida y el botón de cierre de sesión
                    ?>
                    <h2>¡BIENVENIDO/A <?php echo strtoupper($_SESSION['user_email']); ?>!!!</h2>
                    <form action="logout.php" method="POST">
                        <input type="submit" value="Cerrar sesión">
                    </form>
                    <?php
                }
            ?>
        </div>
    </div>
    <script src="script.js"></script>
    <div class="plainlinks">
        <div id="globalWrapper">
            <div id="column-content">
                <div id="content" class="mw-body" role="main">
                    <a id="top"></a>
                    <h1 id="firstHeading" class="firstHeading mw-first-heading"><span class="mw-page-title-main">Frutas
                            del Diablo</span></h1>
                    <div id="bodyContent" class="monobook-body">
                        <div id="mw-content-text" class="mw-body-content mw-content-ltr" lang="es" dir="ltr">
                            <div class="mw-parser-output">
                                <div class="seccionportada">
                                <div class="tituloprincipal">
                                        <div><b>La fascinante sección de las Frutas del Diablo</b></div>
                                        <div>Que tipo de Fruta del Diablo elegirías tu</div>
                                    </div>
                                    <div class="plainlinks">
                                    <p>En el magnífico universo pirata de One Piece, estas frutas son elementos legendarios que otorgan diferentes poderes y habilidades realmente extraordinarias con la condición de pagar un alto precio.
                                    Quien consume una de estas frutas tiene las desgracia de no poder nadar, algo muy a tener en cuenta si tus aventuras transcurren en un barco surcando los mares del mundo.
                                    <br>
                                    Hay Frutas de diferentes tipos con las que puedes adquirir poderes elementales hielo, fuego o otras que pueden manipular la percepcion del espacio/tiempo, convertirte en una bestia animal con una fuerza
                                    sobrehumana o manipular la propia gravedad.
                                    y con diferentes habilidades es el lugar ideal para explorar y disfrutar todo sobre One
                                    "Descubre, vive y participa en frikioda"</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <table border="1px">
    <tr>
        <th>ID</th>
        <th>TIPO</th>
        <th>NOMBRE</th>
        <th>DESCRIPCION</th>
        <th>IMAGEN</th>
    </tr>
        <?php
        include 'mostrarp.php';
        ?>
    </table>

</body>