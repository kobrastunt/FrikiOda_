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
        .video-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Hace que el contenedor ocupe toda la altura de la ventana */
        }

        .video-wrapper {
            border: 5px solid rgba(87, 150, 234, 0.8);/* Ajuste del borde */
            border-radius: 25px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 80%; /* Ajusta el ancho para que sea responsive */
            max-width: 1280px; /* Ancho máximo */
            aspect-ratio: 16 / 9; /* Mantiene la proporción del video */
        }

        .video-wrapper iframe {
            width: 100%;
            height: 100%;
            border: none;
        }

        .plainlinks1 {
        background-image: url('imagenes/One_Piecee.webp');
        background-color: rgba(203, 239, 244, 0.4); /* Ajusta el último valor para cambiar la opacidad */
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
                        <p>Lo sentimos, no tienes permiso para acceder al contenido de esta página. Por favor, espera a que un administrador te autorice.</br> <b>Más abajo puedes ver el primer episodio de One piece mientras damos acceso.</b></p>
                        <?php
                    }
                }
            ?>
        </div>
        <audio id="miAudio" controls autoplay style="padding: 22px;">
            <source src="One Piece OST — The Very, Very, Strongest_nUBWp89ATE8.mp3" type="audio/mpeg">
        </audio>
    </div>
    <script>
        // Espera a que la página se haya cargado completamente
        document.addEventListener('DOMContentLoaded', function() {
            // Obtiene el elemento de audio
            var audio = document.getElementById('miAudio');
            // Establece el volumen por defecto (entre 0.0 y 1.0)
            audio.volume = 0.1; // 50% del volumen máximo
        });
    </script>
    <div class="plainlinks1">
    <div id="globalWrapper">
        <div id="column-content">
            <div id="content" class="mw-body" role="main">
                <a id="top"></a>
                <h1 id="firstHeading" class="firstHeading mw-first-heading"><span class="">FRIKIODA</span></h1>

                <div class="seccionportada">
                    <div class="tituloprincipal">
                        <div><b>Bienvenido/a a FrikiOda</b></div>
                        <div>La enciclopedia de One Piece en español</div>
                    </div>
                    <div class="plainlinks">
                        <p><b>"Bienvenido a Frikioda: Tu aplicación web sobre One Piece.
                        Frikioda es el lugar ideal para explorar y disfrutar todo sobre One Piece, la icónica serie de anime y manga del legendario<?php if(isset($_SESSION['user_role'])) { ?><a href="eichirooda.php" title="autor Eiichiro"> Eiichiro Oda<?php } else { ?> Eiichiro Oda<?php } ?></a>.
                        Esta aplicación te permitirá explorar el apasionante mundo de One Piece.
                        <br></br>
                        Frikioda tiene todo lo que necesitas para satisfacer tu pasión por la serie, desde información detallada sobre los <?php if(isset($_SESSION['user_role'])) { ?><a href="personajes.php" title="personajes"> personajes principales<?php } else { ?>personajes principales <?php } ?></a> y las 
                        misteriosas <?php if(isset($_SESSION['user_role'])) { ?><a href="frutadiablo.php" title="las frutas del diablo">Frutas del Diablo,<?php } else { ?>Frutas del diablo, <?php } ?></a> hasta <?php if(isset($_SESSION['user_role'])) { ?><a href="curiosidades.php" title="curiosidades"> fascinantes curiosidades<?php } else { ?> fancinantes curiosidades<?php } ?></a> sobre la serie y una conmovedora biografía del autor.
                        No te pierdas nuestra exclusiva tienda online con una selección de artículos de alta calidad especialmente para los fans de One Piece.
                        Descubre, vive y participa en frikioda"</b></p>
                        <a href="https://api.whatsapp.com/send/?phone=34667810705&text=Hola%20tengo%20una%20consulta%20o%20teoría%20que%20me%20gustaría%20compartir&type=phone_number&app_absent=0" class="boton">Si tienes alguna consulta o teoría escríbenos por WhatsApp</a>
                    </div> 
                </div> 
            </div> 
        </div> 
    </div> 
</div> 
    <div class="video-container">
        <div class="video-wrapper">
            <iframe src="https://www.facebook.com/plugins/video.php?height=420&href=https%3A%2F%2Fwww.facebook.com%2F109639904083556%2Fvideos%2F203746857263155%2F&show_text=false&width=560&t=0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
        </div>
    </div>
</body>

</body>