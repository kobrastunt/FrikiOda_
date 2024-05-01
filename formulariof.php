<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Personaje</title>
    <link rel="stylesheet" href="assets\css\astyle.css">
</head>
<body>
    <!-- Encabezado -->
    <header>
        <h1>Modificar fruta</h1>
        <nav>
            <ul>
                <li><a href="admin_panel.php">Dashboard</a></li>
                <li><a href="manage_users.php">Manage Users</a></li>
                <li><a href="manage_roles.php">Manage Roles</a></li>
                <!-- Agrega más enlaces de navegación según sea necesario -->
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <h2>Modificar Datos frutas</h2>
    <form action="editar_frutas.php" method="post" enctype="multipart/form-data">
        <!-- Campo oculto para el ID del personaje -->
        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">

        <label for="nombre">Nuevo Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" required><br>

        <label for="descripcion">Nueva Descripción:</label><br>
        <textarea id="descripcion" name="descripcion" required></textarea><br>

        <label for="imagen">Nueva Imagen:</label><br>
        <input type="file" id="imagen" name="imagen" accept="image/*"><br>

        <button type="submit">Modificar Fruta</button>
    </form>
    <!-- Pie de página -->
    <footer>
        <p>&copy; 2024 FrikiOda</p>
    </footer>
</body>
</html>
