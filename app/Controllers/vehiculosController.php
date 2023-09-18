<?php namespace Controllers;
	
	//Con los espacios de nombres se hace que Vehiculo sea igual a Models\Vehiculo.
	use Models\Vehiculo as Vehiculo;
	use Models\Cliente as Cliente;
	
           /* CONTROLADOR */
	class vehiculosController{
		//Definimos los atributos del controlador
		private $vehiculo;
		private $cliente;

		public function __construct(){
			//Instanciamos los modelos necesarios
			$this->vehiculo = new Vehiculo();
			$this->cliente = new Cliente();
		}
		
		public function listarClientes(){
			$datos = $this->cliente->listar();
			return $datos;
		}		
						/* METODO */
		public function index(){
			//Definimos el metodo index y retornamos los datos necesarios para aplicar la logica de negocio
			if($_POST){				
				$this->vehiculo->set("texto_buscado", $_POST['texto_buscar']);
				$this->vehiculo->set("texto_buscado_2", $_POST['texto_buscar_2']);
				$datos = $this->vehiculo->buscar();
				return $datos;
			}
 		}
						/* METODO */
		public function agregar(){
			//Definimos el metodo agregar y retornamos los datos necesarios para aplicar la logica de negocio
			//Si no hay $_POST, primer ingreso
			if(!$_POST){
				$datos = $this->cliente->listar();
				return $datos;
			}
			else{	
				//Preparamos los datos y seteamos los atributos del vehiculo para realizar el alta			
				$this->vehiculo->set("patente", $_POST['patente']);
				$this->vehiculo->set("modelo", $_POST['modelo']);
				$this->vehiculo->set("detalle", $_POST['detalle']);
				$this->vehiculo->set("id_cliente", $_POST['id_cliente']);
				$audit = "*INSERT*" . date("Y-m-d H:i:s");
				$this->vehiculo->set("audit", $audit);
				$this->vehiculo->agregar();
				header("Location: " . URL . "vehiculos/");
				}			
		}
						/* METODO *//* (ATRIBUTO) */
		public function editar($id){		
			//Definimos el metodo editar y retornamos los datos necesarios para aplicar la logica de negocio
			//Si no hay $_POST, primer ingreso
			if(!$_POST){
//Obtenemos los datos necesarios para editar un vehiculo
				$this->vehiculo->set("id_vehiculo", $id);
				$datos = $this->vehiculo->ver();
				return $datos;
			}else{
//Preparamos los datos y seteamos los atributos del vehiculo para realizar la edicion
				$this->vehiculo->set("id_vehiculo", $_POST['id']);
				$this->vehiculo->set("patente", $_POST['patente']);
				$this->vehiculo->set("modelo", $_POST['modelo']);
				$this->vehiculo->set("detalle", $_POST['detalle']);
				$this->vehiculo->set("id_cliente", $_POST['id_cliente']);
				$audit = "*UPDATE*" . date("Y-m-d H:i:s");
				$this->vehiculo->set("audit", $audit);
				$this->vehiculo->editar();
				header("Location: " . URL . "vehiculos/");
			}
		}
						/* METODO *//* (ATRIBUTO) */
		public function ver($id){
			//Definimos el metodo ver y retornamos los datos necesarios para aplicar la logica de negocio
//Obtenemos los datos necesarios para ver un vehiculo

			$this->vehiculo->set("id_vehiculo",$id);
			$datos = $this->vehiculo->ver();
			return $datos;

		}
						/* METODO *//* (ATRIBUTO) */
		public function eliminar($id){
			//Definimos el metodo eliminar y retornamos los datos necesarios para aplicar la logica de negocio
			$this->vehiculo->set("id_vehiculo",$id);
			$audit = "*DELETE*" . date("Y-m-d H:i:s");
			$this->vehiculo->set("audit", $audit);			
			$this->vehiculo->borrar();
			header("Location: " . URL . "vehiculos");
		}

//Metodos auxiliares, logica de negocio
/*Ejemplo		
		public function listarSecciones(){
			$datos = $this->seccion->listar();
			return $datos;
		}
*/		
}
	//Instanciamos la clase para usar el vehiculo en las vistas
	$vehiculos = new vehiculosController();

?>