<?php namespace Config;
//Los espacios de nombres[namespace] sirven para encapsular los elementos, en nuestro caso las clases.
	class Request{
		//Definimos la clase Request, con los siguientes atributos para guardar en ellos la accion a ejecutar, con sus respetivos datos.
		private $controlador;
		private $metodo;
		private $argumento;

		public function __construct(){
			//Preparamos el __construct() para capturar la URL en caso de existir
			if(isset($_GET['url'])){
				//Preparamos y dividimos la url. El formato de la URL recibida sera www.[dominio].com/[controlador]/[metodo]/[argumento], por ejemplo www.localhost.com/empleados/ver/2, se estaria ejecutando del controlador de Empleados, el metodo ver(). El cual requiere un argumento, en este caso el id del empleado que se desea visualizar.
				$ruta = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL);
				$ruta = explode("/", $ruta);
				$ruta = array_filter($ruta);
				//Asignamos un controlador por defecto en caso de que se ingrese al "index.php"
				if($ruta[0] == "index.php"){
					$this->controlador = "trabajos";
				}else{
					$this->controlador = strtolower(array_shift($ruta));
				}


				//Guardamos el metodo, en caso de no existir se asigna uno por defecto, en este caso "index"
				$this->metodo = strtolower(array_shift($ruta));
				if(!$this->metodo){
					$this->metodo = "index";
				}
				//Lo que queda de la ruta luego del array_shift() seria nuestro argumento, existiese o no
				$this->argumento = $ruta;
			}else{				
				$this->controlador = "trabajos";
				$this->metodo = "index";
			}
		}

		public function getControlador(){
			//Metodo que retornara el controlador
			return $this->controlador;
		}

		public function getMetodo(){
			//Metodo que retornara el metodo
			return $this->metodo;
		}

		public function getArgumento(){
			//Metodo que retornara el argumento
			return $this->argumento;
		}
	}
?>