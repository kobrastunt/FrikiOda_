<?php
include 'conexion.php'; 

$mostrar = "SELECT * FROM frutadiablo";
$sql = mysqli_query($conexion, $mostrar);
$frutadiablo = array(); // Inicializamos un array para almacenar los personajes

while ($ver = mysqli_fetch_array($sql)) {
    // Almacenamos cada fila de la consulta en un array asociativo
    $frutasdiablo = array(
        'tipo' => $ver['tipo'],
        'nombre' => $ver['nombre'],
        'descripcion' => $ver['descripcion'],
        'imagen' => $ver['imagen']
    );
    // Agregamos el array del personaje al array de personajes
    $frutadiablo[] = $frutasdiablo;
}
?>
