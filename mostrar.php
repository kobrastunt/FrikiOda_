<?php
include 'conexion.php'; 

$mostrar = "SELECT nombre, descripcion, imagen, gif FROM personajes"; // Modificamos la consulta para incluir la columna gif
$sql = mysqli_query($conexion, $mostrar);
$personajes = array(); // Inicializamos un array para almacenar los personajes

while ($ver = mysqli_fetch_array($sql)) {
    // Almacenamos cada fila de la consulta en un array asociativo
    $personaje = array(
        'nombre' => $ver['nombre'],
        'descripcion' => $ver['descripcion'],
        'imagen' => $ver['imagen'],
        'gif' => $ver['gif'] // Agregamos la URL del GIF al array del personaje
    );
    // Agregamos el array del personaje al array de personajes
    $personajes[] = $personaje;
}
?>
