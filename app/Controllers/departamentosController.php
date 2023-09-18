<?php namespace Controllers;
	
	//Con los espacios de nombres se hace que Departamento sea igual a Models\Departamento.
	use Models\Departamento as Departamento;
	
           /* CONTROLADOR */
	class departamentosController{
		//Definimos los atributos del controlador
		private $departamento;

		public function __construct(){
			//Instanciamos los modelos necesarios
			$this->departamento = new Departamento();
		}
						/* METODO */
		public function index(){
			//Definimos el metodo index y retornamos los datos necesarios para aplicar la logica de negocio
			if($_POST){				
				$this->departamento->set("texto_buscado", $_POST['texto_buscar']);
				$datos = $this->departamento->buscar();
				return $datos;
			}
 		}
						/* METODO */
		public function agregar(){
			//Definimos el metodo agregar y retornamos los datos necesarios para aplicar la logica de negocio
			//Si no hay $_POST, primer ingreso
			if($_POST){
				//Preparamos los datos y seteamos los atributos del departamento para realizar el alta			
				$this->departamento->set("departamento", $_POST['departamento']);
				$this->departamento->set("descripcion", $_POST['descripcion']);
				$audit = "*INSERT*" . date("Y-m-d H:i:s");;
				$this->departamento->set("audit", $audit);
				$this->departamento->agregar();
				header("Location: " . URL . "departamentos/");
				}			
		}
						/* METODO *//* (ATRIBUTO) */
		public function editar($id){		
			//Definimos el metodo editar y retornamos los datos necesarios para aplicar la logica de negocio
			//Si no hay $_POST, primer ingreso
			if(!$_POST){
//Obtenemos los datos necesarios para editar un departamento
				$this->departamento->set("id_departamento", $id);
				$datos = $this->departamento->ver();
				return $datos;
			}else{
//Preparamos los datos y seteamos los atributos del departamento para realizar la edicion
				$this->departamento->set("id_departamento", $_POST['id']);
				$this->departamento->set("departamento", $_POST['departamento']);
				$this->departamento->set("descripcion", $_POST['descripcion']);
				$audit = "*UPDATE*" . date("Y-m-d H:i:s");
				$this->departamento->set("audit", $audit);
				$this->departamento->editar();
				header("Location: " . URL . "departamentos/");
			}
		}
						/* METODO *//* (ATRIBUTO) */
		public function ver($id){
			//Definimos el metodo ver y retornamos los datos necesarios para aplicar la logica de negocio
//Obtenemos los datos necesarios para ver un departamento

			$this->departamento->set("id_departamento",$id);
			$datos = $this->departamento->ver();
			return $datos;

		}
						/* METODO *//* (ATRIBUTO) */
		public function eliminar($id){
			//Definimos el metodo eliminar y retornamos los datos necesarios para aplicar la logica de negocio
			$this->departamento->set("id_departamento",$id);
			$audit = "*DELETE*" . date("Y-m-d H:i:s");;
			$this->departamento->set("audit", $audit);			
			$this->departamento->borrar();
			header("Location: " . URL . "departamentos");
		}

//Metodos auxiliares, logica de negocio
/*Ejemplo		
		public function listarSecciones(){
			$datos = $this->seccion->listar();
			return $datos;
		}
*/		
}
	//Instanciamos la clase para usar el departamento en las vistas
	$departamentos = new departamentosController();

?>