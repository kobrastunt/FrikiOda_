<?php
    session_start();
?>

<!DOCTYPE html>
<html class="client-nojs" lang="es" dir="ltr">

<head>
    <meta charset="UTF-8" />
    <title>WikiOda, la enciclopedia de One piece </title>
    <link rel="stylesheet" type="text/css" href="assets\css\pstyle.css"/>
    <style>
    body{
        background-image: url('imagenes/One_Piecee.webp');
        background-color: #cbeff4(203,239,244, 0,8); /* Ajusta el último valor para cambiar la opacidad */
        background-blend-mode: overlay;
        background-size: cover; /* Hace que la imagen cubra todo el área visible */
        background-repeat: no-repeat; /* Evita que la imagen se repita */
        }
    </style>
    <script>
        function principal() {
            window.location.href = "wiki.php";
        }
    </script>
</head>

<body>
    <header>
        <img src="imagenes\titulo.png" alt="Imagen cabecera One Piece" onclick="principal()">
    </header>

    <div class="menu">
        <ul>
        
            <li><?php if(isset($_SESSION['user_role'])) { ?><a href="personajes.php" style="background-image: url('imagenes/one-piece.webp')">Personajes</a><?php } else { ?>Personajes<?php } ?></li>
            <li><?php if(isset($_SESSION['user_role'])) { ?><a href="frutadiablo.php" style="background-image: url('imagenes/One-piece-frutas-del-diablo.webp')">Fruta del diablo</a><?php } else { ?>Fruta del diablo<?php } ?></li>
            <li><?php if(isset($_SESSION['user_role'])) { ?><a href="curiosidades.php" style="background-image: url('imagenes/curiosidades.jpg')">Curiosidades</a><?php } else { ?>Curiosidades<?php } ?></li>
            <li><?php if(isset($_SESSION['user_role'])) { ?><a href="eichirooda.php" style="background-image: url('imagenes/oda.jpg')">Eiichirō Oda</a><?php } else { ?>Eiichirō Oda<?php } ?></li>
            <li><?php if(isset($_SESSION['user_role'])) { ?><a href="tienda.php" style="background-image: url('imagenes/mugiwara-store.jpg')">Tienda Online</a><?php } else { ?>Tienda Online<?php } ?></li>
            
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
                    // Si el usuario ya está autenticado, verificar si tiene un rol asignado
                    if (isset($_SESSION['user_role'])) {
                        // Si el usuario tiene un rol asignado, mostrar el contenido de la página
                        ?>
                        <h2>¡BIENVENIDO/A <?php echo strtoupper($_SESSION['user_email']); ?>!!!</h2>
                        <!-- Aquí va el contenido de la página -->
                        <form action="logout.php" method="POST">
                        <input type="submit" value="Cerrar sesión">
                        <?php
                    } else {
                        // Si el usuario no tiene un rol asignado, mostrar un mensaje de advertencia
                        ?>
                        <h2>¡BIENVENIDO/A <?php echo strtoupper($_SESSION['user_email']); ?>!!!</h2>
                        <form action="logout.php" method="POST">
                        <input type="submit" value="Cerrar sesión">
                        <p>Lo sentimos, no tienes permiso para acceder al contenido de esta página. Por favor, espera a que un administrador te asigne un rol.</p>
                        <?php
                    }
                }
            ?>
        </div>
        <audio controls autoplay style="padding: 22px;">
            <source src="one piece cancion de pelea_VBG3VLthdpg.mp3" type="audio/mpeg">
        </audio>
    </div>
    <div class="plainlinks">
        <div id="globalWrapper">
            <div id="column-content">
                <div id="content" class="mw-body" role="main">
                    <a id="top"></a>
                    <h1 id="firstHeading" class="firstHeading mw-first-heading"><span
                            class="mw-page-title-main">FRIKIODA</span></h1>
                            
                                <div class="seccionportada">
                                    <div class="tituloprincipal">
                                        <div><b>Bienvenido/a a FrikiOda</b></div>
                                        <div>La enciclopedia de One Piece en español</div>
                                    </div>
                                    <div class="plainlinks">
                                    <p>"Bienvenido a Frikioda: Tu aplicación web sobre One Piece.
                                    Frikioda es el lugar ideal para explorar y disfrutar todo sobre One Piece, la icónica serie de anime y manga del legendario <a href="eichirooda.php" title="autor Eiichiro">Eiichiro Oda</a>.
                                    Esta aplicación te permitirá explorar el apasionante mundo de One Piece.
                                    <br></br>
                                    Frikioda tiene todo lo que necesitas para satisfacer tu pasión por la serie, desde información detallada sobre los <a href="personajes.php" title="personajes"> personajes principales</a> y las 
                                    misteriosas <a href="frutadiablo.php" title="las frutas del diablo">Frutas del Diablo</a> hasta <a href="curiosidades.php" title="curiosidades"> fascinantes curiosidades</a> sobre la serie y una conmovedora biografía del autor.
                                    No te pierdas nuestra exclusiva tienda online con una selección de artículos de alta calidad especialmente para los fans de One Piece.
                                    Descubre, vive y participa en frikioda"</p>
                                    <a href="https://api.whatsapp.com/send/?phone=34667810705&text&type=phone_number&app_absent=0" class="boton">Ir al enlace</a>
                                    
                                    
</body>