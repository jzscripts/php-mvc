<?php namespace Views;

	$template = new Template();

	class Template{

		public function __construct(){
//			header("Content-Type: text/html;charset=utf-8");
			session_start();
?>
	<!DOCTYPE html>
	<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Administración S I</title>
		<link rel="stylesheet" href="<?php echo URL; ?>Views/template/css/bootstrap.css">
		<link rel="stylesheet" href="<?php echo URL; ?>Views/template/css/general.css">
		<link rel="stylesheet" href="<?php echo URL; ?>Views/template/css/font-awesome.css">
		<link rel="stylesheet" href="<?php echo URL; ?>Views/template/css/bootstrap-select.min.css">
		<link rel="stylesheet" href='<?php echo URL; ?>Views/template/css/fullcalendar.css'>
		<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
		<script src="<?php echo URL; ?>Views/template/js/bootstrap.js"></script>
		<script src="<?php echo URL; ?>Views/template/js/bootstrap-select.min.js"></script>
		<script src="<?php echo URL; ?>Views/template/js/moment.js"></script>
		<script src="<?php echo URL; ?>Views/template/js/fullcalendar.js"></script>
		<script src="<?php echo URL; ?>Views/template/js/es.js"></script>
	</head>
	<body>
		<nav class="navbar navbar-inverse navbar-fixed-top">
  		<div class="container-fluid">
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
		        <span class="sr-only"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="http://localhost/Martin_Final_6/">Serví Independencia</a>
		    </div>

		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
		      <ul class="nav navbar-nav">
		        <li>
		          <a href="<?php echo URL; ?>turnos">Turnos</a>
		        </li>

		        <li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Clientes<span class="caret"></span></a>
		          <ul class="dropdown-menu" role="menu">
		            <li><a href="<?php echo URL; ?>clientes">Buscar</a></li>
		            <li><a href="<?php echo URL; ?>clientes/agregar">Agregar</a></li>
		          </ul>
		        </li>
		        
		        <li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Vehiculos<span class="caret"></span></a>
		          <ul class="dropdown-menu" role="menu">
		            <li><a href="<?php echo URL; ?>vehiculos">Buscar</a></li>
		            <li><a href="<?php echo URL; ?>vehiculos/agregar">Agregar</a></li>
		          </ul>
		        </li>

		        <li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Empleados<span class="caret"></span></a>
		          <ul class="dropdown-menu" role="menu">
		            <li><a href="<?php echo URL; ?>empleados">Buscar</a></li>
		            <li><a href="<?php echo URL; ?>empleados/agregar">Agregar</a></li>
		          </ul>
		        </li>

		        <li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Trabajos<span class="caret"></span></a>
		          <ul class="dropdown-menu" role="menu">
		            <li><a href="<?php echo URL; ?>trabajos">Ver</a></li>
		            <li><a href="<?php echo URL; ?>trabajos/agregar">Agregar</a></li>
		          </ul>
		        </li>
		        <li>
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Departamentos<span class="caret"></span></a>
		          <ul class="dropdown-menu" role="menu">
		            <li><a href="<?php echo URL; ?>departamentos">Buscar</a></li>
		            <li><a href="<?php echo URL; ?>departamentos/agregar">Agregar</a></li>
		          </ul>
		        </li>
		      </ul>
		      
		      <ul class="nav navbar-nav navbar-right">
				<?php 
					if (isset($_SESSION['sesion_user'])){?>
						<li><a href="<?php echo URL; ?>empleados/cerrarSesion"><?php echo ucfirst($_SESSION['sesion_user']); ?> | Cerrar sesion <span class="fa fa-fw fa-power-off text-center"></span></a></li>
					<?php }else{?>
						<li><a href="<?php echo URL; ?>sesiones/">Iniciar sesion <span class="fa fa-fw fa-power-off"></span></a></li>
				<?php };?>		       
		      </ul>
		    </div>
		  </div>
		</nav>
<?php
		}

		public function __destruct(){
?>
	<footer class="navbar-fixed-bottom">
		Todos los derechos reservados &copy 2016 <br>
		<b> | Servi Independencia | </b>
	</footer>

	</body>
	</html>
<?php
		}

	}

?>