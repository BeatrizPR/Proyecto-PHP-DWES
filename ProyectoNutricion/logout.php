<?php
    // Inicializar la sesión.
    session_start();

    session_unset();

    // Destruir la sesión.
    session_destroy();


    header('Location: index.php');

?>
