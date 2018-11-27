<?php
	require_once "libs/navbar.php";
	require_once "libs/conexion.php";
	
	// La siguiente línea muestra de manera formateada el contenido de $_POST
	//echo "<pre>".print_r($_POST, true)."</pre>" ; 

	
	//  datos del formulario 
	// El operador de fusión (??) solo podrá utilizarse a partir de PHP7
	$nom = $_POST["nom"]??"" ;
	$ape = $_POST["ape"]??"" ;
	$usr = $_POST["usr"]??"" ;
	$ema = $_POST["ema"]??"" ;
	$sex = $_POST["sex"]??"" ;	  	
	$alt = $_POST["alt"]??"" ;
	$peso = $_POST["peso"]??"" ;

	// comprobación de que el usuario que se está registrando no existe ya
	$sql_comprobarUsu ='SELECT * FROM usuarios WHERE usuario = ?';
	$sentencia_comprobarUsu = $pdo->prepare($sql_comprobarUsu);
	$sentencia_comprobarUsu->execute(array($usr));
	$resultado_comprobacion = $sentencia_comprobarUsu->fetch();

	if ($resultado_comprobacion) {
		//existe el usuario que se está registrando
		echo "<br><br><br> Este usuario ya existe";
		die();
	}


	// Comprobamos ahora el valor del flag: si es FALSE inserto en la base de datos la información del formulario. 
	//En otro caso, muestro el formulario de registro.
	if (isset($_POST["flag"]) && ($_POST["flag"]==="false")):

		// Guardamos la contraseña

		$pwd =md5($_POST['pwd']);

		// Construimos la sentencia SQL
		
		$sql_insertUsu = "INSERT INTO usuario
		 	    (usuario,password,email,nombre,apellidos, sexo, altura, peso) VALUES
		 	    ('$usr','$pwd','$ema','$nom','$ape','$sex', '$alt', '$peso') ;" ;

		$insertarUsuario = $pdo->prepare($sql_insertUsu);
		//$insertarUsuario->execute();
		
		if ($insertarUsuario->execute()):
		//if($lnk->query($sql)):
				echo "<br><br><br>Tu registro se ha realizado con éxito";
				header('Location: login.php');
			
		else :
			$err = "<br><br><br>Se ha producido un error en el registro." ;
			require_once("libs/form-registro.php") ;
		endif ;

	else:

		// Accedemos por primera vez al formulario 
		require_once("libs/form-registro.php") ;

	endif ;

	
	// Cerramos la conexión con el motor de bases de datos
	$pdo = null;
    $sentencia_comprobarUsu= null;