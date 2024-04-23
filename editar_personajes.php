<?php
session_start();

// Verificar si el usuario está autenticado como administrador
if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
    // Si no es un administrador, redirigir a otra página
    header('Location: index.php');
    exit;
}

require 'database.php';

// Operación de eliminación de personaje
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $stmt = $conn->prepare('DELETE FROM personajes WHERE id = :id');
    $stmt->bindParam(':id', $delete_id);
    $stmt->execute();
    // Redirigir a la página de gestión de personajes después de eliminar
    header('Location: editar_personajes.php');
    exit;
}
// actualizacion de personaje
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$imagen = $_POST['imagen'];

$sql = "UPDATE personajes SET nombre='$nombre', descripcion='$descripcion', imagen='$imagen' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Registro actualizado con éxito";
} else {
    echo "Error al actualizar el registro: " . $conn->error;
}
}


// Obtener la lista de personajes
$stmt = $conn->query('SELECT id, nombre, descripcion, imagen FROM personajes');
$personajes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Personajes</title>
    <link rel="stylesheet" href="assets\css\astyle.css">
</head>
<body>

    <!-- Encabezado -->
    <header>
        <h1>Editar Personajes</h1>
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

    <!-- Contenido de gestión de personajes -->
    <div class="admin-content">
        <h2>Personajes</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($personajes as $personaje): ?>
                    <tr>
                        <td><?php echo $personaje['id']; ?></td>
                        <td><?php echo $personaje['nombre']; ?></td>
                        <td><?php echo $personaje['descripcion']; ?></td>
                        <td><img src="<?php echo $personaje['imagen']; ?>" alt="<?php echo $personaje['nombre']; ?>" style="width: 100px;"></td>
                        <td>
                            <a href="formulario_ep.php?id=<?php echo $personaje['id']; ?>"><button>Editar</button></a>
                            <a href="editar_personajes.php?delete_id=<?php echo $personaje['id']; ?>" onclick="return confirm('¿Estás seguro de que quieres eliminar este personaje?')"><button>Eliminar</button></a>
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
