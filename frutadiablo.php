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
    <script>
        function principal() {
            window.location.href = "wiki.php";
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
                                        <div><b>Bienvenido a WikiOda</b></div>
                                        <div>La enciclopedia de One Piece en español</div>
                                        <div><a href="personajes.html"
                                                title="WikiDex:WikiDex ya no forma parte de FANDOOM"
                                                style="color: #FFCA2B;">Voy a ser el
                                                pr&oacute;ximo rey de los piratas</a>
                                        </div>
                                    </div>
                                    <div class="plainlinks">
                                        <p><b><a href="/wiki/WikiDex:Acerca_de" title="WikiDex:Acerca de"
                                                    style="color: #FFCA2B;">WikiOda</a></b>
                                            aquí iran todas las frutas que aparecen en la serie <a
                                                href="/wiki/Pok%C3%A9mon" title="Pokémon" style="color: #FFCA2B;">One
                                                piece</a> con especial atención a los nakamas del pirata luffy y<b><a
                                                    href="/wiki/Especial:Estad%C3%ADsticas"
                                                    title="Especial:Estadísticas" style="color: #FFCA2B;">todos los
                                                    personajes de tu serie de anime
                                                    favorita, luffy, zoro, namy, chopper,
                                                    usuf, sanji ,,,</a></b> artículos, que
                                            abarca toda
                                            la información oficial de los <a href="/wiki/Videojuegos"
                                                title="Videojuegos" style="color: #FFCA2B;">videojuegos</a>, <a
                                                href="/wiki/Anime" title="Anime" style="color: #FFCA2B;">anime</a>, <a
                                                href="/wiki/Manga" title="Manga" style="color: #FFCA2B;">manga</a> y <a
                                                href="/wiki/Juego_de_Cartas_Coleccionables_Pok%C3%A9mon"
                                                title="Juego de Cartas Coleccionables Pokémon"
                                                style="color: #FFCA2B;">Juego
                                                de Cartas Coleccionables</a>.</p>
                                        <p>Tú también puedes <a href="/wiki/WikiDex:C%C3%B3mo_colaborar"
                                                title="WikiDex:Cómo colaborar" style="color: #FFCA2B;">colaborar con
                                                nosotros</a> corrigiendo o ampliando el
                                            contenido. Para información básica
                                            sobre cómo editar en un wiki, puedes consultar
                                            nuestras
</body>