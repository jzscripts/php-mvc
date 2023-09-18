<?php namespace Controllers;
	
	//Con los espacios de nombres se hace que Vehiculo sea igual a Models\Vehiculo.
	use Models\Turno as Turno;
	use Models\Vehiculo as Vehiculo;
	
           /* CONTROLADOR */
	class turnosController{
		//Definimos los atributos del controlador
		private $vehiculo;

		public function __construct(){
			//Instanciamos los modelos necesarios
			$this->turno = new Turno();
			$this->vehiculo = new Vehiculo();
		}
		
		public function listarVehiculos(){
			$datos = $this->vehiculo->listar();
			return $datos;
		}
						/* METODO */
		public function index(){
			//Definimos el metodo index y retornamos los datos necesarios para aplicar la logica de negocio
			if ($_POST) {
				if (isset($_POST['id_turno'])) {
					if (isset($_POST['borrado'])) {
						$this->eliminar($_POST['id_turno']);	
					}else{
						echo $_POST['borrado'];
						$this->editar($_POST['id_turno']);
					}
				}else{
					$this->agregar();
				}
			}
 		}
						/* METODO */
		private function agregar(){
			//Definimos el metodo agregar y retornamos los datos necesarios para aplicar la logica de negocio
			//Preparamos los datos y seteamos los atributos del turno para realizar el alta
			$id_vehiculo = $_POST['id_vehiculo'];
			$this->turno->set("id_vehiculo", $id_vehiculo);
			$this->vehiculo->set("id_vehiculo",$id_vehiculo);
			$vehiculo = $this->vehiculo->ver();
			$titular = $vehiculo['nombre'] . " " .$vehiculo['apellido'];
			$this->turno->set("title", strtoupper($titular));
			$this->turno->set("descripcion", $_POST['descripcion']);
			$start = str_replace("T", " ", $_POST['start']);
			$end = str_replace("T", " ", $_POST['end']);
			$this->turno->set("start", $start);
			$this->turno->set("end", $end);
			$audit = "*INSERT*" . date("Y-m-d H:i:s");
			$this->turno->set("audit", $audit);
			$this->turno->agregar();
			header("Location: " . URL . "turnos/");
		}
						/* METODO *//* (ATRIBUTO) */
		private function editar($id){		
			//Definimos el metodo editar y retornamos los datos necesarios para aplicar la logica de negocio
//Preparamos los datos y seteamos los atributos del turno para realizar la edicion
			$this->turno->set("id_turno", $id);

			$id_vehiculo = $_POST['id_vehiculo'];
			$this->turno->set("id_vehiculo", $id_vehiculo);
			$this->vehiculo->set("id_vehiculo",$id_vehiculo);
			$vehiculo = $this->vehiculo->ver();
			$titular = $vehiculo['nombre'] . " " .$vehiculo['apellido'];
			$this->turno->set("title", strtoupper($titular));
			$this->turno->set("descripcion", $_POST['descripcion']);
			$start = str_replace("T", " ", $_POST['start']);
			$end = str_replace("T", " ", $_POST['end']);
			$this->turno->set("start", $start);
			$this->turno->set("end", $end);

			$audit = "*UPDATE*" . date("Y-m-d H:i:s");
			$this->turno->set("audit", $audit);
			$this->turno->editar();
			header("Location: " . URL . "turnos/");
		}
						/* METODO *//* (ATRIBUTO) */
		private function eliminar($id){
			//Definimos el metodo eliminar y retornamos los datos necesarios para aplicar la logica de negocio
			$this->turno->set("id_turno",$id);
			$audit = "*DELETE*" . date("Y-m-d H:i:s");
			$this->turno->set("audit", $audit);			
			$this->turno->borrar();
//			header("Location: " . URL . "turnos");
		}
}
	//Instanciamos la clase para usar el turno en las vistas
	$turnos = new turnosController();

?>