<?php namespace Controllers;
	
	//Con los espacios de nombres se hace que Vehiculo sea igual a Models\Vehiculo.
	use Models\Trabajo as Trabajo;
	use Models\Vehiculo as Vehiculo;
	use Models\Empleado as Empleado;
	use Models\Cliente as Cliente;
	use Models\Departamento as Departamento;
	
           /* CONTROLADOR */
	class trabajosController{
		//Definimos los atributos del controlador
		private $trabajo;
		private $vehiculo;
		private $empleado;
		private $cliente;
		private $departamento;

		public function __construct(){
			//Instanciamos los modelos necesarios
			$this->trabajo = new Trabajo();
			$this->vehiculo = new Vehiculo();
			$this->empleado = new Empleado();
			$this->cliente = new Cliente();
			$this->departamento = new Departamento();
		}
		
		public function listarVehiculos(){
			$datos = $this->vehiculo->listar();
			return $datos;
		}
		public function listarEmpleados(){
			$datos = $this->empleado->listar();
			return $datos;
		}
		public function listarClientes(){
			$datos = $this->cliente->listar();
			return $datos;
		}		
		public function listarDepartamentos(){
			$datos = $this->departamento->listar();
			return $datos;
		}		
						/* METODO */
		public function index(){
			//Definimos el metodo index y retornamos los datos necesarios para aplicar la logica de negocio
			if($_POST){				
				
				$fecha = date("d-m-Y", strtotime($_POST['fecha']));

				if (!empty($_POST['patente'])){
					$this->trabajo->set("texto_buscado", $_POST['patente']);
					$datos = $this->trabajo->buscarPorPatente();
					return $datos;
				}elseif ($fecha != "31-12-1969"){
					$this->trabajo->set("texto_buscado", $fecha);
					$datos = $this->trabajo->buscarPorFecha();
					return $datos;					
				}elseif ($_POST['cliente'] != 0){
					$this->trabajo->set("texto_buscado", $_POST['cliente']);
					$datos = $this->trabajo->buscarPorCliente();
					return $datos;					
				}elseif ($_POST['empleado'] != 0){
					$this->trabajo->set("texto_buscado", $_POST['empleado']);
					$datos = $this->trabajo->buscarPorEmpleado();
					return $datos;
				}else{
					$this->trabajo->set("texto_buscado", $_POST['departamento']);
					$datos = $this->trabajo->buscarPorDepartamento();
					return $datos;					
				}
			}else{
				$datos = $this->trabajo->listar();
				return $datos;
			}
 		}
						/* METODO */
		public function agregar(){
			//Definimos el metodo agregar y retornamos los datos necesarios para aplicar la logica de negocio
			//Si no hay $_POST, primer ingreso
			if($_POST){
				//Preparamos los datos y seteamos los atributos del trabajo para realizar el alta			
				$this->trabajo->set("id_vehiculo", $_POST['id_vehiculo']);
				$this->trabajo->set("id_empleado", $_POST['id_empleado']);
				$this->trabajo->set("detalle", $_POST['detalle']);
				$this->trabajo->set("ingreso", $_POST['ingreso']);
				$this->trabajo->set("egreso", $_POST['egreso']);
				$this->trabajo->set("egreso", $_POST['egreso']);
				$this->trabajo->set("estado", $_POST['estado']);
				$audit = "*INSERT*" . date("Y-m-d H:i:s");
				$this->trabajo->set("audit", $audit);
				$this->trabajo->agregar();
				header("Location: " . URL . "trabajos/");
				}			
		}
						/* METODO *//* (ATRIBUTO) */
		public function editar($id){		
			//Definimos el metodo editar y retornamos los datos necesarios para aplicar la logica de negocio
			//Si no hay $_POST, primer ingreso
			if(!$_POST){
//Obtenemos los datos necesarios para editar un trabajo
				$this->trabajo->set("id_trabajo", $id);
				$datos = $this->trabajo->ver();
				return $datos;
			}else{
//Preparamos los datos y seteamos los atributos del trabajo para realizar la edicion
				$this->trabajo->set("id_trabajo", $_POST['id']);
				$this->trabajo->set("id_vehiculo", $_POST['id_vehiculo']);
				$this->trabajo->set("id_empleado", $_POST['id_empleado']);
				$this->trabajo->set("detalle", $_POST['detalle']);
				$this->trabajo->set("ingreso", $_POST['ingreso']);
				$this->trabajo->set("egreso", $_POST['egreso']);
				$this->trabajo->set("egreso", $_POST['egreso']);
				$this->trabajo->set("estado", $_POST['estado']);
				$audit = "*UPDATE*" . date("Y-m-d H:i:s");
				$this->trabajo->set("audit", $audit);
				$this->trabajo->editar();
				header("Location: " . URL . "trabajos/");
			}
		}
						/* METODO *//* (ATRIBUTO) */
		public function ver($id){
			//Definimos el metodo ver y retornamos los datos necesarios para aplicar la logica de negocio
//Obtenemos los datos necesarios para ver un trabajo

			$this->trabajo->set("id_trabajo",$id);
			$datos = $this->trabajo->ver();
			return $datos;

		}
						/* METODO *//* (ATRIBUTO) */
		public function eliminar($id){
			//Definimos el metodo eliminar y retornamos los datos necesarios para aplicar la logica de negocio
			$this->trabajo->set("id_trabajo",$id);
			$audit = "*DELETE*" . date("Y-m-d H:i:s");
			$this->trabajo->set("audit", $audit);			
			$this->trabajo->borrar();
			header("Location: " . URL . "trabajos");
		}

//Metodos auxiliares, logica de negocio
/*Ejemplo		
		public function listarSecciones(){
			$datos = $this->seccion->listar();
			return $datos;
		}
*/		
}
	//Instanciamos la clase para usar el trabajo en las vistas
	$trabajos = new trabajosController();

?>