<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Fruta</title>
</head>
<body>
<?php
session_start();

// Verificar si el usuario está autenticado como administrador
if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
    // Si no es un administrador, redirigir a otra página
    header('Location: index.php');
    exit;
}

// Aquí puedes incluir la funcionalidad para gestionar usuarios, roles, contenido, etc.

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edición</title>
    <link rel="stylesheet" href="assets\css\astyle.css">
    
</head>
<body>

    <!-- Encabezado -->
    <header>
        <h1>Admin Panel</h1>
        <nav>
            <ul>
            <li><a href="admin_panel.php">Dashboard</a></li>
                <li><a href="manage_users.php">Manage Users</a></li>
                <li><a href="manage_roles.php">Manage Roles</a></li>
                <li><a href="wiki.php">principal</a></li>
                <li><a href="edicion.php">characters create</a></li>
                <li><a href="ediciondf.php">devil fruit create</a></li>
                <li><a href="editar_personajes.php">characters editing</a></li>
                <li><a href="editar_frutas.php">Fruit editing</a></li>
                <!-- Agrega más enlaces de navegación según sea necesario -->
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
<div class="admin-content">
    <h2>Welcome, <?php echo $_SESSION['user_email']; ?>!</h2>
    <!-- Aquí puedes mostrar estadísticas, resúmenes, etc. -->
    <h2>Añadir Fruta Diablo:</h2>

    <!-- Formulario para insertar frutas diablo -->
    <form action="insertar_frutadiablo.php" enctype="multipart/form-data" method="POST" style="margin-top: 20px;">
        <div style="margin-bottom: 10px;">
            <label for="tipo" style="display: block; font-weight: bold;">Tipo de Fruta Diablo:</label>
            <input type="text" id="tipo" name="tipo" required style="width: 50%; padding: 8px; border-radius: 5px; border: 1px solid #ccc;">
        </div>
        <div style="margin-bottom: 10px;">
            <label for="nombre" style="display: block; font-weight: bold;">Nombre de la Fruta Diablo:</label>
            <input type="text" id="nombre" name="nombre" required style="width: 50%; padding: 8px; border-radius: 5px; border: 1px solid #ccc;">
        </div>
        <div style="margin-bottom: 10px;">
            <label for="descripcion" style="display: block; font-weight: bold;">Descripción:</label>
            <textarea id="descripcion" name="descripcion" rows="4" required style="width: 50%; padding: 8px; border-radius: 5px; border: 1px solid #ccc;"></textarea>
        </div>
        <div style="margin-bottom: 10px;">
            <label for="imagen" style="display: block; font-weight: bold;">Imagen:</label>
            <input type="file" id="imagen" name="imagen" required style="border: none;">
        </div>
        <button type="submit" name="registrar" style="padding: 10px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer;">Registrar</button>
    </form>
</div>
    <!-- Pie de página -->
    <footer>
        <p>&copy; 2024 FrikiOda</p>
    </footer>

</body>
</html>