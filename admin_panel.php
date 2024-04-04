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
    <title>Admin Panel</title>
    <link rel="stylesheet" href="styles.css">
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
                <!-- Agrega más enlaces de navegación según sea necesario -->
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <!-- Contenido del panel de administrador -->
    <div class="admin-content">
        <h2>Welcome, <?php echo $_SESSION['user_email']; ?>!</h2>
        <!-- Aquí puedes mostrar estadísticas, resúmenes, etc. -->
    </div>

    <!-- Pie de página -->
    <footer>
        <p>&copy; 2024 Your Website</p>
    </footer>

</body>
</html>
