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
        background-image: url('imagenes/One-piece-frutas-del-diablo.webp');
        background-color: rgba(203, 239, 244, 1); /* Ajusta el último valor para cambiar la opacidad */
        background-blend-mode: overlay;
        background-size: cover; /* Hace que la imagen cubra todo el área visible */
        background-repeat: no-repeat; /* Evita que la imagen se repita */
    }

    .container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
    }

    .character {
        width: 30%; /* Ajusta el ancho del cuadro del personaje */
        margin: 10px;
        padding: 10px;
        background-color: rgba(255, 255, 255, 0.8);
        background-blend-mode: overlay;/* Color de fondo del cuadro del personaje */
        border: 1px solid #0000FF;
        border-radius: 75px;
        box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.9);
        text-align: center;
    }

    .character img {
        display: block;
        margin: 0 auto;
        max-width: 100px;
        height: 120px;
        border-radius: 5px;
        cursor: pointer; /* Cambia el cursor al hacer hover sobre la imagen */
    }

    .character img:hover {
        transform: scale(1.8); /* Aplica un efecto de escala al hacer hover sobre la imagen */
    }
    .character h2 {
        color: rgba(29, 227, 187); /* Color de texto del nombre */
    }
    .character h3 {
        color: #140b81; /* Color de texto del nombre */
    }

    .character p {
        color: #000000; /* Color de texto de la descripción */
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
                                        <div>¿Que tipo de Fruta del Diablo elegirías tú?</div>
                                    </div>
                                    <div class="plainlinks">
                                    <p>En el magnífico universo pirata de One Piece, estas frutas son elementos legendarios que otorgan diferentes poderes y habilidades realmente extraordinarias con la condición de pagar un alto precio.
                                    Quien consume una de estas frutas tiene las desgracia de no poder nadar, algo muy a tener en cuenta si tus aventuras transcurren en un barco surcando los mares del mundo.
                                    <br>
                                    Hay Frutas de diferentes tipos con las que puedes adquirir poderes elementales hielo, fuego o otras que pueden manipular la percepcion del espacio/tiempo, convertirte en una bestia animal con una fuerza
                                    sobrehumana o manipular la propia gravedad.</p>
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
    <div class="container">
    <?php
    include 'mostrarp.php';
    foreach ($frutadiablo as $frutasdiablo) {
        echo '<div class="character">';
        echo '<img src="' . $frutasdiablo['imagen'] . '" alt="' . $frutasdiablo['nombre'] . '">';
        echo '<h2>' . $frutasdiablo['tipo'] . '</h3>';
        echo '<h3>' . $frutasdiablo['nombre'] . '</h3>';
        echo '<p>' . $frutasdiablo['descripcion'] . '</p>';
        echo '</div>';
    }
    ?>
</div>

</body>