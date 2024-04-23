<?php
session_start();

// Verificar si el usuario está autenticado como administrador
if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
    // Si no es un administrador, redirigir a otra página
    header('Location: index.php');
    exit;
}

require 'database.php';

// Operación de eliminación de rol
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $stmt = $conn->prepare('DELETE FROM roles WHERE id = :id');
    $stmt->bindParam(':id', $delete_id);
    $stmt->execute();
    // Redirigir a la página de gestión de roles después de eliminar
    header('Location: manage_roles.php');
    exit;
}

// Obtener la lista de roles
$stmt = $conn->query('SELECT id, name FROM roles');
$roles = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Roles</title>
    <link rel="stylesheet" href="assets\css\astyle.css">
</head>
<body>

    <!-- Encabezado -->
    <header>
        <h1>Manage Roles</h1>
        <nav>
            <ul>
            <li><a href="admin_panel.php">Dashboard</a></li>
                <li><a href="manage_users.php">Manage Users</a></li>
                <li><a href="manage_roles.php">Manage Roles</a></li>
                <li><a href="wiki.php">principal</a></li>
                <li><a href="edicion.php">characters create</a></li>
                <li><a href="ediciondf.php">devil fruit create</a></li>
                <li><a href="editar_personajes.php">characters editing</a></li>
                <!-- Agrega más enlaces de navegación según sea necesario -->
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <!-- Contenido de gestión de roles -->
    <div class="admin-content">
        <h2>Roles</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($roles as $role): ?>
                    <tr>
                        <td><?php echo $role['id']; ?></td>
                        <td><?php echo $role['name']; ?></td>
                        <td>
                            <a href="edit_role.php?id=<?php echo $role['id']; ?>"><button>Edit</button></a>
                            <a href="manage_roles.php?delete_id=<?php echo $role['id']; ?>" onclick="return confirm('Are you sure you want to delete this role?')"><button>Delete</button></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Pie de página -->
    <footer>
        <p>&copy; 2024  FrikiOda</p>
    </footer>

</body>
</html>
