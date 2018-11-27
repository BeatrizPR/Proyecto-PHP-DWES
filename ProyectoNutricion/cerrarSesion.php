<?php
    // Inicialicio la sesión.
    session_start();

    // Destruir todas las variables de sesión.
    $_SESSION = array();

    session_destroy();

    //vuelvo al index
    header('Location: index.php');
?>



?>