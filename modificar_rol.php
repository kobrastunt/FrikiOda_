<?php
include 'conexion.php';

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar y limpiar los datos del formulario
    $user_id = mysqli_real_escape_string($conexion, $_POST['user_id']);
    $nuevo_rol = mysqli_real_escape_string($conexion, $_POST['nuevo_rol']);

    // Actualizar el rol del usuario en la base de datos
    $actualizar_rol = "UPDATE users SET role_id = '$nuevo_rol' WHERE id = '$user_id'";
    $sql = mysqli_query($conexion, $actualizar_rol);

    // Verificar si la actualización fue exitosa
    if ($sql) {
        header('Location: manage_users.php'); // Redireccionar a la página principal
        exit;
    } else {
        echo "Error al actualizar el rol del usuario: " . mysqli_error($conexion);
    }
} else {
    echo "Error: El formulario no se ha enviado correctamente.";
}
?>

