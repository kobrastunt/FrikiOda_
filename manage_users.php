<?php
session_start();

// Verificar si el usuario está autenticado como administrador
if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
    // Si no es un administrador, redirigir a otra página
    header('Location: index.php');
    exit;
}

require 'database.php';

// Operación de eliminación de usuario
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $stmt = $conn->prepare('DELETE FROM users WHERE id = :id');
    $stmt->bindParam(':id', $delete_id);
    $stmt->execute();
    // Redirigir a la página de gestión de usuarios después de eliminar
    header('Location: manage_users.php');
    exit;
}

// Obtener la lista de usuarios
$stmt = $conn->query('SELECT id, email, role_id FROM users');
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
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

    <!-- Contenido de gestión de usuarios -->
    <div class="admin-content">
        <h2>Users</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?php echo $user['id']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td><?php echo $user['role_id']; ?></td>
                        <td>
                            <a href="formularioroles.php?id=<?php echo $user['id']; ?>"><button>Edit</button></a>
                            <a href="manage_users.php?delete_id=<?php echo $user['id']; ?>" onclick="return confirm('Are you sure you want to delete this user?')"><button>Delete</button></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Pie de página -->
    <footer>
        <p>&copy; 2024 FrikiOda</p>
    </footer>

</body>
</html>
