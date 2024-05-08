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
    <title>Frikioda-curiosidades</title>
    <link rel="stylesheet" type="text/css" href="assets\css\pstyle.css" />
    <style>
        body{
            background-image: url('imagenes/curiosidades.jpg');
            background-color: #cbeff4(255, 255, 255, 0,7); /* Ajusta el último valor para cambiar la opacidad */
            background-blend-mode: overlay;
            background-size: cover; /* Hace que la imagen cubra todo el área visible */
            /* background-repeat: no-repeat; Evita que la imagen se repita */
        }
        .otracosa {
        position: absolute;
        top: 880px;
        left: 120px;
        cursor: pointer;
        }
        .otracosa1 {
        position: absolute;
        top: 880px;
        left: 800px;
        cursor: pointer;
        }
        .otracosa2 {
        position: absolute;
        top: 1100px;
        left: 120px;
        cursor: pointer;
        }
        .otracosa3 {
            position: absolute;
            top: 1100px;
            left: 800px;
            cursor: pointer;
        }
        .otracosa4 {
            position: absolute;
            top: 1320px;
            left: 120px;
            cursor: pointer;
        }
        .otracosa5 {
            position: absolute;
            top: 1320px;
            left: 800px;
            cursor: pointer;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 70%; /* Colocar el texto a la derecha de la imagen */
            transform: translateX(-100%); /* Ocultar el texto inicialmente */
            transition: transform 0.3s ease;
            display: none;
            width: 400px;
            text-align: left;
        }

        .otracosa:hover .overlay {
            transform: translateX(0); /* Mostrar el texto al pasar el ratón sobre la imagen */
            display: block;
        }
        .otracosa1:hover .overlay {
            transform: translateX(0); /* Mostrar el texto al pasar el ratón sobre la imagen */
            display: block;
        }
        .otracosa2:hover .overlay {
            transform: translateX(0); /* Mostrar el texto al pasar el ratón sobre la imagen */
            display: block;
        }
        .otracosa3:hover .overlay {
            transform: translateX(0); /* Mostrar el texto al pasar el ratón sobre la imagen */
            display: block;
        }
        .otracosa4:hover .overlay {
            transform: translateX(0); /* Mostrar el texto al pasar el ratón sobre la imagen */
            display: block;
        }
        .otracosa5:hover .overlay {
            transform: translateX(0); /* Mostrar el texto al pasar el ratón sobre la imagen */
            display: block;
        }

        .text {
            background-color: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 10px;
            border-radius: 5px;
        }

        #imagen {
            border-radius: 50%;
            width: 150px; /* Tamaño de la imagen */
            height: 150px; /* Tamaño de la imagen */
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
                <h1 id="firstHeading" class="firstHeading mw-first-heading"><span class="mw-page-title-main">Curiosidades</span></h1>
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
                                    </br>
                                    <b>Para descubrir los secretos y curiosidades, dirige el cursor sobre la imagen que desees revelar.</b>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="otracosa" onclick="showText()">
                    <img src="imagenes\sanji-naruto.webp" alt="Imagen" id="imagen">
                    <div class="overlay" id="overlay">
                        <div class="text">El creador de One Piece pensó que Sanji se iba a llamar naruto, pero debido al comienzo de la serie del mismo nombre, Eiichiro tuvo que descartar esta opción por los derechos de autor adquiridos por Masashi Kishimoto.</div>
                    </div>
                    <div class="texto-fijo"><b>¿Como crees que se iba a llamar originalmente Sanji?</b></div>
                </div>
                <div class="otracosa1" onclick="showText()">
                    <img src="imagenes\oliver levasseur.jpg" alt="Imagen" id="imagen">
                    <div class="overlay" id="overlay">
                        <div class="text">La ejecución de este personaje está basada en la muerte del pirata Olivier Levasseur que antes de su deceso, tiró al publico un collar con un mensaje encriptado que indicaba la ubicación de sus tesoros.</div>
                    </div>
                    <div class="texto-fijo1"><b>La muerte de Gol D. Roger está basada en hechos reales</b></div>
                </div>
                <div class="otracosa2" onclick="showText()">
                    <img src="imagenes\cumple.jpg" alt="Imagen" id="imagen">
                    <div class="overlay" id="overlay">
                        <div class="text">Casi todos los personajes cumplen años siguiendo una norma, haciendo su fecha significativa, Ace es el personaje de One piece que cumple años exactamente el mismo día que Eiichiro Oda.</div>
                    </div>
                    <div class="texto-fijo1"><b>¿Que personaje cumple años el mismo día que Eiichiro?</b></div>
                </div>

                <div class="otracosa3" onclick="showText()">
                    <img src="imagenes\enel.webp" alt="Imagen" id="imagen">
                    <div class="overlay" id="overlay">
                        <div class="text">El mangaca es muy fan de unos de los artistas musicales más famosos del mundo, estamos hablando efectivamente del rapero Eminen que tanto gusta al creador del anime.</div>
                    </div>
                    <div class="texto-fijo1"><b>¿Que famoso rapero inspiró a Oda para crear a dios Enel?</b></div>
                </div>
                <div class="otracosa4" onclick="showText()">
                    <img src="imagenes\One_Piecee.webp" alt="Imagen" id="imagen">
                    <div class="overlay" id="overlay">
                        <div class="text">Tu texto aquí</div>
                    </div>
                    <div class="texto-fijo1">La muerte de Gol D. Roger está basada en echos reales</div>
                </div>
                <div class="otracosa5" onclick="showText()">
                    <img src="imagenes\One_Piecee.webp" alt="Imagen" id="imagen">
                    <div class="overlay" id="overlay">
                        <div class="text">Tu texto aquí</div>
                    </div>
                    <div class="texto-fijo1">La muerte de Gol D. Roger está basada en echos reales</div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
//     function showText() {
//     var overlay = document.getElementById("overlay");
//     overlay.style.display = "block";
// }
function hideText() {
            var overlay = document.getElementById("overlay");
            overlay.style.display = "none";
        }
</script>
</body>   

</body>
</html>