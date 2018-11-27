<?php
	require 'conexion.php';
?>
<nav class="navbar navbar-expand-md navbar-light bg-light fixed-top" role="navigation">
		<a class="navbar-brand" href="index.php">Nutrición</a>
      	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
       	<span class="navbar-toggler-icon"></span>
      	</button>
	  	
	  	<div class="collapse navbar-collapse" id="exCollapsingNavbar">
        <ul class="navbar-nav mr-auto">
        	<li class="nav-item active">
            	<a class="nav-link" href="index.php">Inicio <span class="sr-only">(current)</span></a>
	        </li>
	        <li class="nav-item">
	        	<a class="nav-link" href="alimentos.php">Alimentos</a>
	        </li>
	        <li class="nav-item">
	        	<a class="nav-link" href="#">Noticias</a>
	        </li>
          	<li class="nav-item dropdown">
            	<a class="nav-link dropdown-toggle" href="https://example.com" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Más recursos</a>
	            <div class="dropdown-menu" aria-labelledby="dropdown04">
	              <a class="dropdown-item" href="#">Calculadora IMC</a>
	              <a class="dropdown-item" href="recetas.php">Recetas</a>
	              <a class="dropdown-item" href="#">Test</a>
	            </div>
          	</li>
        </ul>
        <ul class="nav navbar-nav flex-row justify-content-between ml-auto">
			<li class="nav-item order-2 order-md-1 mr-3"><i class="fa fa-user"></i> Hola <?= $_SESSION['usuario']; ?> </li>
				<li class="dropdown order-1 ml-1">
				<button type="button" id="dropdownMenu1" data-toggle="dropdown" class="btn btn-outline-secondary dropdown-toggle"> Configuración<span class="caret"></span></button>
				<ul class="dropdown-menu dropdown-menu-right mt-2">
					<li class="px-3 py-2">
	                    
	                        <div class="form-group">
							<a href="#"><button type="submit" class="btn  btn-block">Editar perfil</button></a>
							</div>               
	                        <div class="form-group">
	                        <a href="logout.php"><button type="submit" class="btn  btn-block">Cerrar sesión</button></a>
	                        </div>

	                    </form>
	                </li>
	            </ul>
        </ul>
        </div>
    	
	</nav>
		
	<!--  -------TERMINA EL NAV DEL USUARIO LOGEADO--------  -->