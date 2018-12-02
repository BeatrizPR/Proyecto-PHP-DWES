<?php
    include_once 'libs/conexion.php';

    session_start();

    // *****         READ                        *********

    // query muestra categorías ordenado por nombre
    $sql_leer = 'SELECT * FROM receta order by nombre';

    //Traigo todo porque necesito también el id

    // gsent guarda la conexion
    $gsent = $pdo -> prepare($sql_leer);

    $gsent->execute();


    // guarda los datos de la consulta sql en un array
    $resultado = $gsent->fetchAll();

            //var_dump($resultado);


    //  ****   PAGINACION   **** //
    
    $datosPagina = 4;
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
    
    //  *****    READ   ******

    // muestro las recetas con un límite de 4 recetas por página
    $sql_muestroReceta = 'SELECT * FROM receta order by nombre Limit :iniciar , :numRecetas';
    $muestroRecetas= $pdo->prepare($sql_muestroReceta);
    $muestroRecetas->bindParam(':iniciar', $iniciar, PDO::PARAM_INT);
    $muestroRecetas->bindParam(':numRecetas', $datosPagina, PDO::PARAM_INT);
    $muestroRecetas->execute();

    $resultado_recetas = $muestroRecetas->fetchAll();


    // ****         INSERT                      ****
    
    // tengo que comprobar que en $POST no haya algo vacío
    if(!empty($_POST)){
        
        $nombreReceta = $_POST['nombre'];
        $descripcion =$_POST['descripcion'];
        $tiempo = $_POST['tiempo'];
        
        $sqlInsertar ='INSERT INTO receta (nombre, descripcion, tiempo) VALUES (?,?,?)';

        $sentenciaInsertar = $pdo->prepare($sqlInsertar);
        $sentenciaInsertar->execute(array($nombreReceta, $descripcion, $tiempo));

        header('location: recetas.php');
    } 


    // *********  UPDATE        *****

    if (isset($_GET['idReceta'])) {
        $id=$_GET['idReceta'];
        $sql_unico= 'SELECT * FROM receta WHERE idReceta=?';
        $gsent_unico = $pdo -> prepare($sql_unico);
        $gsent_unico->execute(array($id));
        $resultado_unico = $gsent_unico->fetch();
        //echo("<br> <br><br><br>");
        //var_dump($resultado_unico);
    }

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
        if (isset($_SESSION['usuario'])) :
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

        <?php  if (isset($_SESSION['usuario'])) :
        if (!isset($_GET['idReceta'])):  ?> <!--cuando no haya un id pasado por get se muestra para añadir elementos nuevos-->
        <h2 class="titulo col-md-12 text-center">Incluye recetas nuevas</h2>
        <br>
            <form class="text-center" method="POST">
                <div class="form-group row ">
                    <label for="nombre" class="col-md-4 col-form-label">Nombre: </label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="nombre" placeholder="Nombre de la receta" required>
                    </div>
                    
                </div>
                <div class="form-group row">
                    <label class="col-md-4 col-form-label">Tiempo: </label>
                    <div class="col-md-8">
                        <input type="time" class="form-control" name="tiempo" placeholder="Tiempo de elaboración" required>
                    </div>   
                </div>
                <div class="form-group row">
                    <label class="col-md-4 col-form-label">Elaboración: </label>
                    <div class="col-md-8">
                    <input type="text" class="form-control" name="descripcion" placeholder="Elaboración" required>
                    </div>  
                </div>  
                <button class="btn ">Anadir nueva receta</button>
            </form>
            <?php   endif  ?> <!--termina incluir la receta-->
        <!--modificamos la receta-->
        <?php  
        if (isset($_GET['idReceta'])):  ?> 
        <h2 class="titulo col-md-12 text-center">Modifica la receta</h2>
        <br>
            <form class="text-center" method="GET" action="libs/editarReceta.php">
                <div class="form-group row ">
                    <label for="nombre" class="col-md-4 col-form-label">Nombre: </label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="nombre" placeholder="Nombre de la receta" value="<?php echo $resultado_unico['nombre']?>" required>
                    </div>
                    
                </div>
                <div class="form-group row">
                    <label class="col-md-4 col-form-label">Tiempo: </label>
                    <div class="col-md-8">
                        <input type="time" class="form-control" name="tiempo" placeholder="Tiempo de elaboración" value="<?php echo $resultado_unico['tiempo']?>" required>
                    </div>   
                </div>
                <div class="form-group row">
                    <label class="col-md-4 col-form-label">Elaboración: </label>
                    <div class="col-md-8">
                    <input type="text" class="form-control" name="descripcion" placeholder="Elaboración" value="<?php echo $resultado_unico['descripcion']?>" required>
                    </div>  
                    <input type="hidden" class="d-none" name="id" value="<?php echo $resultado_unico['idReceta']?>">
                </div>  
                <button class="btn ">Modificar receta</button>
            </form>
        <?php   endif  ?> <!--termina modificar la receta-->
        <!--confirmación para borrar la receta-->
        <?php  
            if (isset($_GET['idReceta']) ):  ?> 
            <h2 class="titulo col-md-12 text-center">¿Quieres borrar la receta?</h2>
            <br>
                <div class="col-12 col-md-8 col-lg-12   text-center">
                <a href="libs/eliminarReceta.php?idReceta=<?php echo $id = $_GET['idReceta']?>" ><button class="btn btn-borrar m-3">Eliminar</button></a>
                <a href="recetas.php"><button class="btn btn-cancelar">Cancelar</button></a>
                </div>
            <?php   endif ; 
            endif; //de la comprobacion del usuario loguado
            ?> <!--termina confirmacion de borrado-->
        <br>
	    <div class="row">

	      <div class="col-lg-12 text-center">
	        <h2 class="titulo">Recetas</h2>
	        <br />
          </div>
          <!-- OBTENGO 4 RECETAS POR CADA PAGINA  -->

	        <?php foreach ($resultado_recetas as $dato) :  ?>
            <div class=" alert alert-warning col-lg-6 col-md-4 col-xs-6 ">
                <div class="text-center text-uppercase">
                    <?php echo $dato['nombre']."<br>" ?>
                    
                </div>
                <div text-justify>
                    <?php echo $dato['tiempo']."<br>" ?>      
                    <?php echo $dato['descripcion']."<br>" ?>
                    
                </div> 
                <?php if (isset($_SESSION['usuario'])) :  ?> 
                <a href="recetas.php?idReceta=<?php echo $dato['idReceta']?>" class="float-right ml-3"><i class="fa fa-trash"></i></a>
                <a id="modificar" href="recetas.php?idReceta=<?php echo $dato['idReceta']?>" class="float-right"><i class="fa fa-pencil"></i></a>
                <?php endif  ?>
            </div> <!--cierro div class alert-->
                
                <?php endforeach ?>
        </div> <!--cierro div class row-->
        
          
	      <br>
          
			<br>
			<!--
				Sección de paginado
            -->
            
			<ul class="pagination justify-content-center">
		    <li class="page-item <?= $_GET['pagina']<=1 ? 'disabled':''?>"><a class="page-link" href="recetas.php?pagina=<?=$_GET['pagina']-1 ?>">Anterior</a></li>
		    <?php for($i=1; $i<=$paginasTotal; $i++): ?>
            <li class="page-item <?= $_GET['pagina']==$i ? 'active':''?>"><a class="page-link" href="recetas.php?pagina=<?=$i?>"><?=$i?></a></li>
            <?php endfor ?>
		    <li class="page-item <?= $_GET['pagina']>=$paginas ? 'disabled':''?>"><a class="page-link" href="recetas.php?pagina=<?=$_GET['pagina']+1 ?>">Siguiente</a></li>
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
    //endif; // cierro el if que comprueba que el usuario está logueado
    //cierro la conexion a la base de datos y las sentencias de consulta y de insertar
    $pdo = null;
    $gsent= null;
    $sentenciaInsertar = null;

?>
