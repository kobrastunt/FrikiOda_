<?php
include 'conexion.php' ; 

$mostrar="SELECT * FROM personajes";
$sql=mysqli_query($conexion, $mostrar);
while ($ver=mysqli_fetch_array($sql)) {
    ?>
    <tr>
        <td><?php echo $ver['id'];?></td>
        <td><?php echo $ver['nombre'];?></td>
        <td><?php echo $ver['descripcion'];?></td>
        <td><img src="<?php echo $ver['imagen'];?>" alt=""></td>
    </tr>    

<?php
}

?>