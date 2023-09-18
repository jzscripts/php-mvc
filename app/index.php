<?php
	//Definimos constantes para "embellecer" las URLs
	define('DS', DIRECTORY_SEPARATOR);
	define('ROOT', realpath(dirname(__FILE__)) . DS);
	define('URL', "http://localhost/Martin_Final/app/");

	//Cargamos las clases
	require_once "Config/Autoload.php";
	Config\Autoload::run();
	//Cargamos el template de la aplicacion
	require_once "Views/template.php";
	//Llamamos al metodo run de la clase statica Enrutador, que se encargara de procesar las peticiones
	Config\Enrutador::run(new Config\Request());
?>