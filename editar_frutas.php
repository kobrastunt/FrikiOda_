<?php
session_start();

// Verificar si el usuario está autenticado como administrador
if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
    // Si no es un administrador, redirigir a otra página
    header('Location: index.php');
    exit;
}

require 'database.php';

// Operación para actualizar un registro existente
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];

    // Manejar la imagen (si se ha subido una nueva)
    if ($_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $imagen = $_FILES['imagen']['name'];
        $ruta = $_FILES['imagen']['tmp_name'];
        $destino = "imagenes/" . $imagen;

        // Mover la imagen al directorio de destino
        if (move_uploaded_file($ruta, $destino)) {
            // Actualizar los datos en la base de datos con la nueva imagen
            $sql = "UPDATE frutadiablo SET nombre=?, descripcion=?, imagen=? WHERE id=?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$nombre, $descripcion, $destino, $id]);
        } else {
            echo "Error al mover la imagen.";
            exit;
        }
    } else {
        // No se ha subido una nueva imagen, actualizar solo nombre y descripción
        $sql = "UPDATE frutadiablo SET nombre=?, descripcion=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$nombre, $descripcion, $id]);
    }

    if ($stmt->rowCount() > 0) {
        echo "Registro actualizado con éxito";
    } else {
        $errorInfo = $stmt->errorInfo();
        echo "Error al actualizar el registro: " . $errorInfo[2];
    }
}
// Obtener la lista de frutas del diablo
$stmt = $conn->query('SELECT id, tipo, nombre, descripcion, imagen FROM frutadiablo');
$frutas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Frutas del Diablo</title>
    <link rel="stylesheet" href="assets/css/astyle.css">
</head>
<body>

    <!-- Encabezado -->
    <header>
        <h1>Editar Frutas del Diablo</h1>
        <nav>
            <ul>
                <li><a href="admin_panel.php">Dashboard</a></li>
                <li><a href="manage_users.php">Manage Users</a></li>
                <li><a href="manage_roles.php">Manage Roles</a></li>
                <li><a href="wiki.php">Principal</a></li>
                <li><a href="edicion.php">Characters Create</a></li>
                <li><a href="ediciondf.php">Devil Fruit Create</a></li>
                <li><a href="editar_personajes.php">Characters Editing</a></li>
                <!-- Agrega más enlaces de navegación según sea necesario -->
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <!-- Contenido de gestión de frutas del diablo -->
    <div class="admin-content">
        <h2>Frutas del Diablo</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tipo</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($frutas as $fruta): ?>
                    <tr>
                        <td><?php echo $fruta['id']; ?></td>
                        <td><?php echo $fruta['tipo']; ?></td>
                        <td><?php echo $fruta['nombre']; ?></td>
                        <td><?php echo $fruta['descripcion']; ?></td>
                        <td><img src="<?php echo $fruta['imagen']; ?>" alt="<?php echo $fruta['nombre']; ?>" style="width: 100px;"></td>
                        <td>
                            <a href="formulariof.php?id=<?php echo $fruta['id']; ?>"><button>Editar</button></a>
                            <a href="editar_frutas.php?delete_id=<?php echo $fruta['id']; ?>" onclick="return confirm('¿Estás seguro de que quieres eliminar esta fruta del diablo?')"><button>Eliminar</button></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Pie de página
    <footer>
        <p>&copy; 2024 FrikiOda</p>
    </footer> -->

</body>
</html>
