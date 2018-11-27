<?php
    include_once 'conexion.php';

    // ******   DELETE   receta   ******//

    $id = $_GET['idReceta'];
    $sql_delete = 'DELETE FROM receta WHERE idReceta=?';
    $sentencia_delete = $pdo->prepare($sql_delete);
    $sentencia_delete->execute(array($id));

    header('location: ../recetas.php');



?>