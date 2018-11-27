<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Registro</title>
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
	<!-- --------MENU SUPERIOR--------- -->
	
	<?php
        require_once "libs/navbar.php";

    ?>
	<!--  -------TERMINA EL NAV--------  -->
	<br>
	<br>

	<!---  ---------FORM REGISTRO---------  -->
	<div id="container"  class="container-fluid h-100 bg-light text-dark registro-formulario">
		<div class="row justify-content-center align-items-center" >
		<h3>Registro</h3>
		</div>
		<br>
		<div class="row justify-content-center align-items-center h-100">
    	<div class="col col-sm-6 col-md-8 col-lg-4 col-xl-4">
		<form id="registro" method="post" class="form justify-content-center">

			<input type="hidden" id="flag" name="flag" value="false" />
			<!--
				NOMBRE Y APELLIDOS *****************************************************
				La longitud de ambos no deberá exceder los 100 caracteres.
			-->
			<div class="form-group">
				<label>Nombre*: </label>
				<input type="text" class="form-control" name="nom" value="<?= $nom ?>" maxlength="50" required />
			</div>
			<div class="form-group">
				<label>Apellidos*: </label>
				<input type="text" class="form-control" name="ape" value="<?= $ape ?>" maxlength="50" required />
			</div>
			<!--
				NOMBRE DE USUARIO ******************************************************
			-->

			<div class="form-group">
				<label>Nombre de usuario*: </label>
				<input type="text" class="form-control" name="usr" value="<?= $usr ?>" required />
			</div>
			<!--
				CONTRASEÑA *************************************************************
			-->

			<div class="form-group">
				<label>Contraseña*: </label>
				<input type="password" class="form-control" name="pwd" required /> <!--pattern="[A-Za-z0-9]{8}"  -->
			</div>


			<!--
				EMAIL ******************************************************************
			-->

			<div class="form-group">
				<label>Email*: </label>
				<input type="email" class="form-control" name="ema" value="<?= $ema ?>" />
			</div>

			<!--
				SEXO **************************************************************
			-->
			<div class="form-group">
				<label>Sexo:</label>
				<select name="sex" class="form-control" value="<?= $sex ?>">
					<option>Mujer</option>
					<option>Hombre</option>
				</select>
			</div>
			<!--
				ALTURA ******************************************************************
			-->
			<div class="form-group">
				<label>Altura: </label>
				<input type="text" class="form-control" name="alt" value="<?= $alt ?>" placeholder=" en centímetros"/>
			</div>
			<!--
				PESO ******************************************************************
			-->
			<div class="form-group">
				<label>Peso: </label>
				<input type="text" class="form-control" name="peso" value="<?= $peso ?>" placeholder=" en kilogramos"/>
			</div>
			<!--
				FECHA DE NACIMIENTO ******************************************************************
			-->
			<div class="form-group">
				<label>Fecha de nacimiento: </label>
				<input type="date" class="form-control" name="fechNac" value="<?= $fechNac ?>"/>
			</div> <br>
			<!--
				************************************************************************
			-->

			<button type="submit" class="btn btn-outline-success btn-registro ">Registrar</button>

			<p style="color:red; font-weight: bold">
				<?= isset($err)?$err:"" ?>
			</p>

		</form>
		</div>
		</div>
		
		<!-- Copyright -->
		<!-- <footer class="page-footer font-small blue">
		  
		  <div class="footer text-center py-3">© 2018 Copyright:
		    <a href="https://github.com/BeatrizPR"> Beatriz</a>
		  </div>

		</footer> -->
	</div>  <!-- termina el div del container -->
</body>
</html>