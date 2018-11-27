<?php
		include_once 'libs/conexion.php';
		

    // *****         READ                        *********

    // query buscar categorías 
    $sql_leer = 'SELECT * FROM categoria';

    // gsent guarda la conexion
    $gsent = $pdo -> prepare($sql_leer);

    $gsent->execute();

    // guarda los datos de la consulta sql en un array
    $resultado = $gsent->fetchAll();

    //var_dump($resultado);

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Nutrición</title>
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
			session_start();

			if(isset($_SESSION['usuario'])):
				require_once "libs/navbarLogueado.php";
				//require_once "libs/navbar.php";
			else:
				require_once "libs/navbar.php";
			endif;
        

    ?>
	<!--  -------TERMINA EL NAV--------  -->
	
	<!-- ----------HEADER  -PORTADA PRESENTACIÓN------------- -->
   
  	<div class="jumbotron">
  	<div class="container">
	    <h1>Nutrición</h1>      
	    <p>Proyecto web sobre nutrición para mejorar la alimentación y vida saludable.</p>
	  	</div>
	</div>	
    <header>

	</header>
    <!-- -------------MAIN--------------- -->
	<!--<div class="container"> -->
		<div class="container mx-auto">
		<main id="centerMain">
			
			<span class="clearfix"></span>
			
			<h2 class="titulo col-12 text-center">Mens sana in corpore sano</h2>
			<p>En esta página encontrás diversas herramientas y dietas saludables para alimentarte mejor y sentirte de forma sana.
			Encontrarás ejercicios de deporte para mejorar la salud y otros consejos </p>
			<br>
			<hr>
			<br>
		

	    <div class="row">

	      <div class="col-lg-12 text-center">
	        <h2 class="titulo">Categorías de los alimentos</h2>
	        <br />
	      </div>
            
	        <?php foreach ($resultado as $dato) :  ?>
            <div class=" alert alert-info col-lg-3 col-md-4 col-xs-6 text-center text-uppercase">
            <div>
            <?php echo $dato['nombreCat']."<br>" ?>
            </div>
            </div>
            <?php endforeach ?>
	      
          <br>
	      <br>
          <div class="col-lg-12 text-center">
	        <h2 class="titulo">Imágenes</h2>
	        <br />
	      </div>
	      <div class="col-lg-3 col-md-4 col-xs-6">
	        <img class="image thumbnail" src="https://source.unsplash.com/nJZbmL6pvDY/400x300" alt="">
	      </div>
	      <div class="col-lg-3 col-md-4 col-xs-6">
	        <img class="image thumbnail" src="https://source.unsplash.com/TGYQVFiYpWw/400x300" alt="">
	      </div>
	      <div class="col-lg-3 col-md-4 col-xs-6">
	        <img class="image thumbnail" src="https://source.unsplash.com/Gf4WV2qyW2U/400x300" alt="">
	      </div>
	      <div class="col-lg-3 col-md-4 col-xs-6">
	        <img class="image thumbnail" src="https://source.unsplash.com/zG0_RnnxguY/400x300" alt="">
	      </div>
	    </div>
	    <!-- /.row -->
	    <br>
	    <hr>
    	<div class="col-12 col-md-8 col-lg-12">
			<p>

			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ut ultrices lorem. Nam tincidunt felis vitae orci luctus facilisis. Curabitur eget hendrerit velit. Nulla cursus viverra neque, in porta nunc venenatis at. Nunc feugiat, risus ac viverra cursus, sem lorem sodales massa, eget scelerisque arcu lectus a sapien. Duis pretium fermentum lacus in sollicitudin. Suspendisse pharetra justo erat, non vulputate felis viverra consequat. Aliquam placerat lacinia elit in tempor.

			Etiam eu nibh sodales, aliquet nisl et, ornare ex. Quisque turpis mauris, semper eu bibendum eu, ultricies sed nunc. Quisque tristique nibh sed venenatis tristique. In consequat eros sit amet velit iaculis cursus. Duis non vestibulum arcu, ornare sagittis purus. Maecenas eget lorem nunc. Cras ultricies, diam in interdum porta, purus risus facilisis diam, ut gravida augue orci in purus. Nulla facilisi. Nullam tincidunt est vitae sapien condimentum gravida.

			Pellentesque consequat turpis quis tellus feugiat consectetur. Nunc vehicula tincidunt nibh faucibus finibus. Donec velit nisi, commodo convallis lorem id, viverra ultrices dui. Quisque at cursus arcu, vitae aliquam turpis. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aliquam erat volutpat. Praesent rhoncus augue sed porttitor laoreet. Nullam mollis dui vitae felis interdum congue lobortis ut lectus. Etiam vehicula varius ullamcorper.

			Sed erat neque, egestas vitae semper eget, imperdiet a felis. Curabitur elementum bibendum ante nec sodales. Fusce nec sem posuere, congue nulla non, sodales nisl. In eget tincidunt nisl. Nunc ornare sagittis dapibus. Nunc nibh ante, lobortis vitae dapibus et, eleifend at augue. Aenean malesuada rutrum felis, eget tincidunt justo dictum a.

			In hac habitasse platea dictumst. Cras enim mi, ultrices ac erat iaculis, interdum laoreet leo. Duis in imperdiet leo, at commodo nulla. Phasellus vitae elementum justo. Sed fermentum sapien nec sapien malesuada, vel sagittis erat interdum. Suspendisse erat turpis, congue vitae velit non, porttitor pulvinar metus. Duis quis urna ut ante fermentum scelerisque. Sed vitae sapien libero. Nulla facilisi. Cras gravida consectetur ante quis porttitor. </p>
			</div>
			<br>
			<!--
				Sección de paginado
			-->
			<ul class="pagination justify-content-center">
		    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
		    <li class="page-item"><a class="page-link" href="#">1</a></li>
		    <li class="page-item"><a class="page-link" href="#">2</a></li>
		    <li class="page-item"><a class="page-link" href="#">Next</a></li>
		  </ul>
		</main>

		<footer class="page-footer font-small blue">
		  <!-- Copyright -->
		  <div class="footer text-center py-3">© 2018 Copyright:
		    <a href="https://github.com/BeatrizPR"> Beatriz</a>
		  </div>
		</footer>
	</div>
</body>
</html>
<?php 

	$pdo = null;
	$resultado = null;

?>