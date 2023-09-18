<?php namespace Controllers;
	
	//Con los espacios de nombres se hace que Cliente sea igual a Models\Cliente.
	use Models\Cliente as Cliente;

           /* CONTROLADOR */
	class clientesController{
		//Definimos los atributos del controlador
		private $cliente;

		public function __construct(){
			//Instanciamos los modelos necesarios
			$this->cliente = new Cliente();
		}
						/* METODO */
		public function index(){
			//Definimos el metodo index y retornamos los datos necesarios para aplicar la logica de negocio
			if($_POST){				
				$this->cliente->set("texto_buscado", strtolower($_POST['texto_buscar']));
				$datos = $this->cliente->buscar();				
				return $datos;
			}
 		}
						/* METODO */
		public function agregar(){
			//Definimos el metodo agregar y retornamos los datos necesarios para aplicar la logica de negocio
			//Si no hay $_POST, primer ingreso
			if($_POST){
				//Preparamos los datos y seteamos los atributos del cliente para realizar el alta			
				$this->cliente->set("nombre", $_POST['nombre']);
				$this->cliente->set("apellido", $_POST['apellido']);
				$this->cliente->set("dni", $_POST['dni']);
				$this->cliente->set("domicilio", $_POST['domicilio']);
				$this->cliente->set("telefono", $_POST['telefono']);
				$this->cliente->set("mail", $_POST['mail']);
				$audit = "*INSERT*" . date("Y-m-d H:i:s");;
				$this->cliente->set("audit", $audit);
				$this->cliente->agregar();
				header("Location: " . URL . "clientes/");
				}			
		}
						/* METODO *//* (ATRIBUTO) */
		public function editar($id){		
			//Definimos el metodo editar y retornamos los datos necesarios para aplicar la logica de negocio
			//Si no hay $_POST, primer ingreso
			if(!$_POST){
//Obtenemos los datos necesarios para editar un cliente
				$this->cliente->set("id_cliente", $id);
				$datos = $this->cliente->ver();
				return $datos;
			}else{
//Preparamos los datos y seteamos los atributos del cliente para realizar la edicion
				$this->cliente->set("id_cliente", $_POST['id']);
				$this->cliente->set("nombre", $_POST['nombre']);
				$this->cliente->set("apellido", $_POST['apellido']);
				$this->cliente->set("dni", $_POST['dni']);
				$this->cliente->set("domicilio", $_POST['domicilio']);
				$this->cliente->set("telefono", $_POST['telefono']);
				$this->cliente->set("mail", $_POST['mail']);
				$audit = "*UPDATE*" . date("Y-m-d H:i:s");
				$this->cliente->set("audit", $audit);				
				$this->cliente->editar();
				header("Location: " . URL . "clientes/");
			}
		}
						/* METODO *//* (ATRIBUTO) */
		public function ver($id){
			//Definimos el metodo ver y retornamos los datos necesarios para aplicar la logica de negocio
//Obtenemos los datos necesarios para ver un cliente

			$this->cliente->set("id_cliente",$id);
			$datos = $this->cliente->ver();
			return $datos;

		}
						/* METODO *//* (ATRIBUTO) */
		public function eliminar($id){
			//Definimos el metodo eliminar y retornamos los datos necesarios para aplicar la logica de negocio
			$this->cliente->set("id_cliente",$id);
			$audit = "*DELETE*" . date("Y-m-d H:i:s");;
			$this->cliente->set("audit", $audit);			
			$this->cliente->borrar();
			header("Location: " . URL . "clientes");
		}

//Metodos auxiliares, logica de negocio
/*Ejemplo		
		public function listarSecciones(){
			$datos = $this->seccion->listar();
			return $datos;
		}
*/		
}
	//Instanciamos la clase para usar el cliente en las vistas
	$clientes = new clientesController();

?>