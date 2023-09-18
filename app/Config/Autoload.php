<?php namespace Config; 
//Los espacios de nombres[namespace] sirven para encapsular los elementos, en nuestro caso las clases.
	class Autoload{
		//Definimos la clase Autoload, con su metodo publico estatico run(). Para registrar todos los archivos[clases] necesarias de manera automatica.
		public static function run(){
			//Se registran las funciones dadas, como implementación de __autoload()[intenta cargar una clase sin definir].
			spl_autoload_register(function($class){
				//Se prepara la ruta
				$ruta = str_replace("\\", "/", $class) . ".php";
				//Se incluye la ruta
				include_once $ruta;
			});
		}
	}
?>