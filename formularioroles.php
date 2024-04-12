<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar_rol</title>
    <link rel="stylesheet" href="assets\css\astyle.css">
</head>
<body>
    <!-- Encabezado -->
    <header>
        <h1>Manage Users</h1>
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
    <h2>Modificar Rol de Usuario</h2>
    <form action="modificar_rol.php" method="post">
        <label for="user_id">ID de Usuario:</label><br>
        <input type="text" id="user_id" name="user_id" required><br>

        <label for="nuevo_rol">Nuevo Rol:</label><br>
        <select id="nuevo_rol" name="nuevo_rol" required>
            <option value="1">Administrador</option>
            <option value="2">Moderador</option>
            <option value="3">Usuario</option>
        </select><br>

        <button type="submit">Modificar Rol</button>
    </form>
    <!-- Pie de página -->
    <footer>
        <p>&copy; 2024 FrikiOda</p>
    </footer>

</body>
</html>
