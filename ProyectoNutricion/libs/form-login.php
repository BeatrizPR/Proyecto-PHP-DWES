<?php
		include_once 'conexion.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />
     <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script> 

	<!-- icons from fontawesome -->
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    
</head>
<body>
    <?php //require_once 'navbar.php';    ?>
<br>
<br>
<br>
<br>
	<div class="row justify-content-center align-items-center h-100">
        <div class="col col-sm-6 col-md-8 col-lg-4 col-xl-4">
        <h2 class="titulo text-center">Login</h2>
        <br>
            <form class="form" action="../login.php" role="form" method="POST">
                <div class="form-group">
                <input id="UsuarioInput" placeholder="Usuario" class="form-control form-control-sm" type="text" name="usu" required>
                </div>
                <div class="form-group">
                <input id="passwordInput" placeholder="Password" class="form-control form-control-sm" type="password" name="pass" required>
                </div>
                <div class="form-group">
                <button type="submit" class="btn  btn-block">Login</button>
                </div>
                <div class="form-group text-center">
                    <small><a href="#" data-toggle="modal" data-target="#modalPassword">Forgot password?</a></small>
                </div>
            </form>
        </div>
    </div>
</body>
</html>