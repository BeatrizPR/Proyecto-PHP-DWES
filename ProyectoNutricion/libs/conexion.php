<?php

    // Indico a PHP que use cadenas UTF-8 hasta el final
    mb_internal_encoding('UTF-8');
 
    // Con esto PHP que generará cadenas UTF-8
    mb_http_output('UTF-8');

    //[PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"]    - 

    //conexion a la base de datos
    $bd ='mysql:host=localhost; dbname=nutricion; charset=utf8mb4';
    $usuario = "root";
    $pass = "";

    // establecimiento de la conexión con la base de datos
    try {
        $pdo = new PDO($bd, $usuario,$pass);
        
        //echo "Conectado<br>";

    } catch (PDOEXception $error){
        print "Error: ".$error->getMessage()."<br>";
        die();
    }

   

    




?>