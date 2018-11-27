<?php
    
    require_once "libs/conexion.php";

    $usuarioLogin = 'SELECT * FROM usuario WHERE usuario = :usuario AND password= :pass';

    $resultado = $pdo->prepare($usuarioLogin);

    // para evitar inyecciones de código sql uso htmlentities y addslashes
    $usuario=htmlentities(addslashes($_POST['usu']));

    $pass=md5($_POST["pass"]);

    $resultado->bindValue(':usuario', $usuario);
    $resultado->bindValue(':pass', $pass);

    $resultado->execute();

    // // si rowcount me devuelve 1 existirá el usuario y si devuelve 0 no existirá el usuario
    $numeroRegistro=$resultado->rowcount();

    if ($numeroRegistro !=0) {
        session_start();
        $_SESSION['usuario']=$_POST['usu'];
        //echo "hola, has iniciado sesion correctamente";
        header('Location:index.php');
    } else{
        //echo "Los datos son incorrectos";
        header('Location:index.php');
    }
 
    //cierro la conexion a la base de datos y la sentencia
    $pdo = null;
    $resultado= null;

?>