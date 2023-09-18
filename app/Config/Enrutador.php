<?php namespace Config;
//Los espacios de nombres[namespace] sirven para encapsular los elementos, en nuestro caso las clases.
	class Enrutador{
		//Definimos la clase Enrutaror, y un metodo publico estatico run(Request $request) que se encargara de ejecutar el controlador, metodo y en caso de ser necesario un argumento.
		public static function run(Request $request){
			//Este metodo recibe un objeto de la clase Request, $request

			//Obtenemos el controlador, mediante getControlador() y le concatenamos "Controller".
			$controlador = $request->getControlador() . "Controller";
			//Preparamos la ruta donde se encuentra el controlador solicitado
			$ruta = ROOT . "Controllers" . DS . $controlador .".php";
			//Obtenemos el metodo, mediante getMetodo().
			$metodo = $request->getMetodo();

			//En caso de ser ser el metodo "index.php" se asigna "index"
			if($metodo == "index.php"){
				$metodo = "index";
			}
			//Obtenemos el argumento, mediante getArgumento().
			$argumento = $request->getArgumento();
			if(is_readable($ruta)){
				//Si la ruta existe se procede a incluirla
				require_once $ruta;
				//Preparamos la ruta del la clase controladora
				$mostrar = "Controllers\\" . $controlador;
				//Instanciamos el controlador solicitado
				$controlador = new $mostrar;
				//Validaremos si existe o no el argumento para llamar a call_user_func() con o sin $argumento.
				/*					
								+-------------------------------------------------------------------------------+
								|	mixed call_user_func(callable $callback[,mixed $parameter[,mixed $... ]])	|
								+-------------------------------------------------------------------------------+					
					Llama a la llamada de retorno dada por el primer parámetro callback y pasa los parámetros restantes como argumentos.

					Ej.

								class miclase {
								    static function saludar()
								    {
								        echo "¡Hola!\n";
								    }
								}

								$nombreclase = "miclase";

								call_user_func(array($nombreclase, 'saludar'));

																					@http://php.net/manual/es/function.call-user-func.php
				*/				
				if(!isset($argumento)){
					$datos = call_user_func(array($controlador, $metodo));
				}else{
					$datos = call_user_func_array(array($controlador, $metodo), $argumento);
				}
			}


			//Procedemos a preparar la ruta para la vista que se va a necesitar incluir.
			$ruta = ROOT . "Views" . DS . $request->getControlador() . DS . $request->getMetodo() . ".php";
			//Verifica si se inicio sesion
			if (!isset($_SESSION['sesion_user'])){
				$ruta = ROOT . "Views" . DS . "sesiones" . DS . "index.php";
			}		

			if(is_readable($ruta)){
				require_once $ruta;
			}else{
				echo $ruta;
				print "No se encontro la vista";
			}
		}

	}
?>