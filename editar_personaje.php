<?php
session_start();

// Verificar si el usuario está autenticado como administrador
if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
    // Si no es un administrador, redirigir a otra página
    header('Location: index.php');
    exit;
}

require 'database.php';

// actualizacion de personaje
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
            $sql = "UPDATE personajes SET nombre=?, descripcion=?, imagen=? WHERE id=?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$nombre, $descripcion, $destino, $id]);
        } else {
            echo "Error al mover la imagen.";
            exit;
        }
    } else {
        // No se ha subido una nueva imagen, actualizar solo nombre y descripción
        $sql = "UPDATE personajes SET nombre=?, descripcion=? WHERE id=?";
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
?>
