<?php
session_start();

// Verificar si el usuario está autenticado como administrador
if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
    // Si no es un administrador, redirigir a otra página
    header('Location: index.php');
    exit;
}

require 'database.php';

// Operación para crear un nuevo registro
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['create'])) {
    $tipo = $_POST['tipo'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];

    // Manejar la imagen
    if ($_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $imagen = $_FILES['imagen']['name'];
        $ruta = $_FILES['imagen']['tmp_name'];
        $destino = "imagenes/" . $imagen;

        // Mover la imagen al directorio de destino
        if (move_uploaded_file($ruta, $destino)) {
            // Insertar nuevo registro en la base de datos
            $sql = "INSERT INTO frutadiablo (tipo, nombre, descripcion, imagen) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$tipo, $nombre, $descripcion, $destino]);
        } else {
            echo "Error al mover la imagen.";
            exit;
        }
    } else {
        echo "Error: No se ha subido ninguna imagen.";
        exit;
    }

    if ($stmt->rowCount() > 0) {
        echo "Registro creado con éxito";
    } else {
        $errorInfo = $stmt->errorInfo();
        echo "Error al crear el registro: " . $errorInfo[2];
    }
}

// Operación para actualizar un registro existente
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $id = $_POST['id'];
    $tipo = $_POST['tipo'];
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
            $sql = "UPDATE frutadiablo SET tipo=?, nombre=?, descripcion=?, imagen=? WHERE id=?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$tipo, $nombre, $descripcion, $destino, $id]);
        } else {
            echo "Error al mover la imagen.";
            exit;
        }
    } else {
        // No se ha subido una nueva imagen, actualizar solo tipo, nombre y descripción
        $sql = "UPDATE frutadiablo SET tipo=?, nombre=?, descripcion=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$tipo, $nombre, $descripcion, $id]);
    }

    if ($stmt->rowCount() > 0) {
        echo "Registro actualizado con éxito";
    } else {
        $errorInfo = $stmt->errorInfo();
        echo "Error al actualizar el registro: " . $errorInfo[2];
    }
}

// Operación para eliminar un registro existente
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    $id = $_POST['id'];

    // Obtener la imagen actual para eliminarla del servidor si existe
    $sql_select_imagen = "SELECT imagen FROM frutadiablo WHERE id=?";
    $stmt_select_imagen = $conn->prepare($sql_select_imagen);
    $stmt_select_imagen->execute([$id]);
    $imagen_row = $stmt_select_imagen->fetch(PDO::FETCH_ASSOC);
    $imagen_a_borrar = $imagen_row['imagen'];

    // Eliminar el registro de la base de datos
    $sql_delete = "DELETE FROM frutadiablo WHERE id=?";
    $stmt_delete = $conn->prepare($sql_delete);
    $stmt_delete->execute([$id]);

    if ($stmt_delete->rowCount() > 0) {
        // Borrar la imagen del servidor si existe
        if (file_exists($imagen_a_borrar)) {
            unlink($imagen_a_borrar);
        }
        echo "Registro eliminado con éxito";
    } else {
        $errorInfo = $stmt_delete->errorInfo();
        echo "Error al eliminar el registro: " . $errorInfo[2];
    }
}

// Operación para obtener todos los registros
$sql_select_all = "SELECT * FROM frutadiablo";
$stmt_select_all = $conn->query($sql_select_all);
$frutas = $stmt_select_all->fetchAll(PDO::FETCH_ASSOC);
?>
