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
        body {
        font-family: Arial, sans-serif;
        
    }
        .plainlinks1 {
        background-image: url('imagenes/eiichiro.jpg');
        background-color: rgba(203, 239, 244, 0.6); /* Ajusta el último valor para cambiar la opacidad */
        background-blend-mode: overlay;
        background-size: cover; /* Hace que la imagen cubra todo el área visible */
        background-repeat: no-repeat; /* Evita que la imagen se repita */
        border-radius: 25px;
    }

    </style>
    <script>
        function principal() {
            window.location.href = "index.php";
        }
    </script>
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
    <div class="plainlinks1">
        <div id="globalWrapper">
            <div id="column-content">
                <div id="content" class="mw-body" role="main">
                    <a id="top"></a>
                    <h1 id="firstHeading" class="firstHeading mw-first-heading"><span
                            class="mw-page-title-main">Eiichiro Oda</span></h1>
                    <div id="bodyContent" class="monobook-body">
                        <div id="mw-content-text" class="mw-body-content mw-content-ltr" lang="es" dir="ltr">
                            <div class="mw-parser-output">
                                <div class="seccionportada">
                                <div class="tituloprincipal">
                                        <div><b>Bibliografía de Eiichiro Oda</b></div>
                                        <div>El Mangaka creador de One piece</div>
                                    </div>
                                    <div class="plainlinks" style=" background-position: center; font-weight: bold; padding: 20px;">
                                    <p>Eiichiro Oda nació el 1 de enero de 1975 en la ciudad de Kumamoto, Japón. Comenzó su primer trabajo a la temprana edad de 17 años cuando envió su proyecto Wanted 
                                        inspirandose en los vaqueros del oeste y que le supuso obtener reconocimiento debido al gran número de premios que ganó sirviendole de tranpolín para trabajar en la prestigiosa revista Weekly Shonen Jump.
                                        En el año 1994, ya en la ciudad de Tokio Oda desarrolló un par de historias de piratas a modo de episodios pilotos con el título de Romance Dawn, donde veríamos por primera vez a Luffy, historietas que fueron publicadas en 1996.
                                        Ya en el 1997, se publica en la revista Shonen Jump los primeros capitulos de One Piece, que recibiría nuevamente varios premios y conserguir una recaudación de 100 Millones de tomos en el año 2005. En el año 2007 Oda y Akira Toriyama
                                        realizan un crossover con personajes de One Piece y Dragón Ball por la celebración de los 10 años del anime de Eiichiro.
                                        Oda se inición en el mundo del dibujo de mangas por que no quería tener un trabajo normal de persona adulta y vaya si lo consiguió. Su inspiración por los piratas le viene desde pequeño por ver la famosa serie de animación Viky el vikingo, 
                                        además de estar influenciado por obras como Dragon Ball. Eiichiro mantientiene muy buena relación con Masashi Kishimoto, dibujante creador del Mítico Naruto.
                </p>
                </body>
</html>