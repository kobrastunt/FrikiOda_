<?php
include 'conexion.php';

$mostrar = "SELECT * FROM frutadiablo";
$sql = mysqli_query($conexion, $mostrar);
while ($ver = mysqli_fetch_array($sql)) {
?>
    <div class="character">
        <div class="character_info">
            <h3>ID: <?php echo $ver['id']; ?></h3>
            <h3>Nombre: <?php echo $ver['nombre']; ?></h3>
            <p>Descripción: <?php echo $ver['descripcion']; ?></p>
        </div>
        <img src="<?php echo $ver['imagen']; ?>" alt="imagen de personaje no encontrada">
    </div>
<?php
}
?>
