<?php
	include_once 'libs/conexion.php';
	session_start();
	
    // *****         READ                        *********

	$sql_leer = 'SELECT * FROM alimento a INNER JOIN categoria c ON a.idCategoria=c.idCategoria order by nombreAli';

    // traigo todos los datos porque necesito también el id

	
    // gsent guarda la conexion
    $gsent = $pdo -> prepare($sql_leer);

    $gsent->execute();

	
    // guarda los datos de la consulta sql en un array
	$resultado_alimentosInicial = $gsent->fetchAll();
	
	//  ****   PAGINACION   **** //
    
    $datosPagina = 50;
    $totalDatosBD = $gsent->rowCount();

    $paginasTotal = ceil($totalDatosBD/ $datosPagina);

    $pagina=false;

    if (isset($_GET["pagina"])){
	    $pagina = $_GET["pagina"];
    }

    if(!$pagina){
        $iniciar =0;
        $pagina=1;
    } else{
        $iniciar = ($pagina-1) * $datosPagina;
    }
    
    //consulta de los alimentos con el nombre de la categoria

    $sql_muestroAlimento = 'SELECT * FROM alimento a INNER JOIN categoria c ON a.idCategoria=c.idCategoria order by nombreAli Limit :iniciar , :numRecetas';
    $muestroalimento= $pdo->prepare($sql_muestroAlimento);
    $muestroalimento->bindParam(':iniciar', $iniciar, PDO::PARAM_INT);
    $muestroalimento->bindParam(':numRecetas', $datosPagina, PDO::PARAM_INT);
    $muestroalimento->execute();

    $resultado_alimento = $muestroalimento->fetchAll();

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
			<hr>
			
            <br>
        <!-------  METER AQUI UN BUSCADOR DE ALIMENTOSSS      ------>
        <br>
	    <div class="row">

            <div class="col-lg-12 text-center">
                <h2 class="titulo">Alimentos</h2><br/>
				<h6>La información nutricional de esta tabla está basada en unos 100 gramos del alimento seleccionado.</h6>
                <br />
            </div>
			<table class="table text-center">
            
            <thead>
                <tr>

                <th scope="col"><div class=" alert alert-warning  ">Nombre</div></th>
				<th scope="col"><div class=" alert alert-warning  ">Calorías</div></th>
				<th scope="col"><div class=" alert alert-warning  ">Categoría</div></th>
				<th scope="col"><div class=" alert alert-warning  ">Proteinas</div></th>
				<th scope="col"> <div class=" alert alert-warning  ">Hidratos de Cabono</div></th>
				<th scope="col"><div class=" alert alert-warning  ">Lípidos(Grasas)</div></th>
				<th scope="col"><div class=" alert alert-warning  ">Fibra</div></th>

                </tr>
            </thead>
            <tbody>
				<?php foreach ($resultado_alimento as $dato) :  ?>
                <tr>
                <td><?php echo $dato['nombreAli']."<br>" ?></td>
				<td><?php echo $dato['calorias']."<br>" ?></td>
				<td><?php echo $dato['nombreCat']."<br>" ?></td>
				<td><?php echo $dato['proteinas']."<br>" ?></td>
				<td><?php echo $dato['hidratosCarbono']."<br>" ?></td>
				<td><?php echo $dato['lipidos']."<br>" ?></td>
				<td><?php echo $dato['fibra']."<br>" ?></td>
                </tr>
                <!-- Aqui podría mostrar más datos de los alimentos,porque los obtengo de la BD pero
                	lo incluiré más adelante-->             
                
                <?php endforeach ?>
			</tbody>
            </table>
        </div> <!--cierro div class row-->
         
	      <br>
			<!-- Paginado  -->
			<ul class="pagination justify-content-center">
		    <li class="page-item <?= $_GET['pagina']<=1 ? 'disabled':''?>"><a class="page-link" href="alimentos.php?pagina=<?=$_GET['pagina']-1 ?>">Anterior</a></li>
		    <?php for($i=1; $i<=$paginasTotal; $i++): ?>
            <li class="page-item <?= $_GET['pagina']==$i ? 'active':''?>"><a class="page-link" href="alimentos.php?pagina=<?=$i?>"><?=$i?></a></li>
            <?php endfor ?>
		    <li class="page-item <?= $_GET['pagina']>=$paginas ? 'disabled':''?>"><a class="page-link" href="alimentos.php?pagina=<?=$_GET['pagina']+1 ?>">Siguiente</a></li>
		  </ul>

		  <br>
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
    //cierro la conexion a la base de datos y la sentencia
    $pdo = null;
    $gsent= null;

?>