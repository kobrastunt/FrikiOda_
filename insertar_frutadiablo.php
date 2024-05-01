<?php
include 'conexion.php';

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar y limpiar los datos del formulario
    $tipo = mysqli_real_escape_string($conexion, $_POST['tipo']);
    $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
    $descripcion = mysqli_real_escape_string($conexion, $_POST['descripcion']);

    // Verificar si se ha subido una imagen
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $imagen = $_FILES['imagen']['name'];
        $ruta = $_FILES['imagen']['tmp_name'];
        $destino = "imagenes/" . $imagen;

        // Mover la imagen al directorio de destino
        if (move_uploaded_file($ruta, $destino)) {
            // Insertar los datos en la base de datos
            $insertar = "INSERT INTO frutadiablo (tipo, nombre, descripcion, imagen) VALUES ('$tipo', '$nombre', '$descripcion', '$destino')";
            $sql = mysqli_query($conexion, $insertar);

            // Verificar si la inserción fue exitosa
            if ($sql) {
                header('Location: frutadiablo.php');
                exit;
            } else {
                echo "Error al insertar datos en la base de datos: " . mysqli_error($conexion);
            }
        } else {
            echo "Error al subir la imagen.";
        }
    } else {
        echo "No se ha seleccionado ninguna imagen.";
    }
} else {
    echo "Error: El formulario no se ha enviado correctamente.";
}
?>
