<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Inicia sesión para acceder, por favor');</script>";
    echo "<script>window.location.href = 'index.php';</script>";
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
            background-image: url('imagenes/curiosidades.jpg');
            background-color: #cbeff4(255, 255, 255, 1); /* Ajusta el último valor para cambiar la opacidad */
            background-blend-mode: overlay;
            background-size: cover; /* Hace que la imagen cubra todo el área visible */
            background-repeat: no-repeat; /* Evita que la imagen se repita */
        }
    </style>
    <script>
        function principal() {
            window.location.href = "index.php";
        }
    </script>
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
    <div class="plainlinks">
        <div id="globalWrapper">
            <div id="column-content">
                <div id="content" class="mw-body" role="main">
                    <a id="top"></a>
                    <h1 id="firstHeading" class="firstHeading mw-first-heading"><span
                            class="mw-page-title-main">Curiosidades</span></h1>
                    <div id="bodyContent" class="monobook-body">
                        <div id="mw-content-text" class="mw-body-content mw-content-ltr" lang="es" dir="ltr">
                            <div class="mw-parser-output">
                                <div class="seccionportada">
                                <div class="tituloprincipal">
                                        <div><b>Datos curiosos y teorías</b></div>
                                        <div>Esta información ha sido recabada por nakamas</div>
                                    </div>
                                    <div class="plainlinks">
                                    <p>Esta sección nos mostrará los misterios e intringulis de la serie, las más viriopintas teorías que te dejarán sin aliento,
                                    One Piece, una obra que lleva alegrando nuestros corazones más de 25 años y con más de 1000 capítulos, pero, a que no sabias que
                                    Eiichiro Oda calculó que la serie duraría 5 años y que conforme iba transcuriendo ese tiempo comprobó que no había argumentado ni 
                                    la mitad de la trama.
                                    
                                    En nuestra sección de tienda tienes también nuestro contacto de whatsapp para escribir tus teorías, ¡ANÍMATE! incluiremos en esta sección 
                                    las más originales y argumentadas. 
                                    
                                    

</body>
