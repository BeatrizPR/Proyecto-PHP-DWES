<?php

// *****  EDITAR Receta  ****//

$id = $_GET['id'];
$nombre =$_GET['nombre'];
$descripcion = $_GET['descripcion'];
$tiempo = $_GET['tiempo'];

include_once 'conexion.php';

// query
$sql_update = 'UPDATE receta SET  nombre=?, descripcion=?, tiempo=?  WHERE idReceta = ?;';

$sentencia_update= $pdo->prepare($sql_update);

$sentencia_update->execute(array($nombre,$descripcion, $tiempo, $id));

//echo("$id <br> $nombre <br> $descripcion <br> $tiempo");
header('Location:../recetas.php');
?>