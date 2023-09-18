<?php namespace Controllers;
	
	//Con los espacios de nombres se hace que Empleado sea igual a Models\Empleado.
	use Models\Empleado as Empleado;
	use Models\Departamento as Departamento;
	
           /* CONTROLADOR */
	class empleadosController{
		//Definimos los atributos del controlador
		private $empleado;
		private $departamento;

		public function __construct(){
			//Instanciamos los modelos necesarios
			$this->empleado = new Empleado();
			$this->departamento = new Departamento();
		}
		public function listarDepartamentos(){
			$datos_2 = $this->departamento->listar();
			return $datos_2;
		}
						/* METODO */
		public function index(){
			//Definimos el metodo index y retornamos los datos necesarios para aplicar la logica de negocio
			if($_POST){
				$this->empleado->set("texto_buscado", strtolower($_POST['texto_buscar']));
				$datos = $this->empleado->buscar();
				return $datos;
			}
 		}
						/* METODO */
		public function agregar(){
			//Definimos el metodo agregar y retornamos los datos necesarios para aplicar la logica de negocio
			//Si no hay $_POST, primer ingreso
			if(!$_POST){
				$datos = $this->departamento->listar();
				return $datos;
			}
			else{				
				//Preparamos los datos y seteamos los atributos del empleado para realizar el alta			
				$this->empleado->set("nombre", $_POST['nombre']);
				$this->empleado->set("apellido", $_POST['apellido']);
				$this->empleado->set("dni", $_POST['dni']);
				$this->empleado->set("domicilio", $_POST['domicilio']);
				$this->empleado->set("telefono", $_POST['telefono']);
				$this->empleado->set("clave", $_POST['clave']);
				$this->empleado->set("id_departamento", $_POST['id_departamento']);
				$audit = "*INSERT*" . date("Y-m-d H:i:s");;
				$this->empleado->set("audit", $audit);
				$this->empleado->agregar();
				header("Location: " . URL . "empleados/");
				}			
		}
						/* METODO *//* (ATRIBUTO) */
		public function editar($id){		
			//Definimos el metodo editar y retornamos los datos necesarios para aplicar la logica de negocio
			//Si no hay $_POST, primer ingreso
			if(!$_POST){
//Obtenemos los datos necesarios para editar un empleado
				$this->empleado->set("id_empleado", $id);
				$datos = $this->empleado->ver();
				return $datos;
			}else{
//Preparamos los datos y seteamos los atributos del empleado para realizar la edicion
				$this->empleado->set("id_empleado", $_POST['id']);
				$this->empleado->set("nombre", $_POST['nombre']);
				$this->empleado->set("apellido", $_POST['apellido']);
				$this->empleado->set("dni", $_POST['dni']);
				$this->empleado->set("domicilio", $_POST['domicilio']);
				$this->empleado->set("telefono", $_POST['telefono']);
				$this->empleado->set("id_departamento", $_POST['id_departamento']);
				$audit = "*UPDATE*" . date("Y-m-d H:i:s");;
				$this->empleado->set("audit", $audit);				
				$this->empleado->editar();
				header("Location: " . URL . "empleados/");
			}
		}
						/* METODO *//* (ATRIBUTO) */
		public function ver($id){
			//Definimos el metodo ver y retornamos los datos necesarios para aplicar la logica de negocio
//Obtenemos los datos necesarios para ver un empleado

			$this->empleado->set("id_empleado",$id);
			$datos = $this->empleado->ver();
			return $datos;

		}
						/* METODO *//* (ATRIBUTO) */
		public function eliminar($id){
			//Definimos el metodo eliminar y retornamos los datos necesarios para aplicar la logica de negocio
			$this->empleado->set("id_empleado",$id);
			$audit = "*DELETE*" . date("Y-m-d H:i:s");;
			$this->empleado->set("audit", $audit);			
			$this->empleado->borrar();
			header("Location: " . URL . "empleados");
		}
						/* METODO *//* (ATRIBUTO) */
		public function iniciarSesion(){
			if (!$_POST){
				echo "No hay datos";
			}else{
				$dni = $_POST['dni'];
				$clave = $_POST['clave'];

				$this->empleado->set('dni', $dni);
				$this->empleado->set('clave', $clave);
				
				$sesion = $this->empleado->validarUser();

				if (isset($sesion)){
					//Creacion de la variable de sesion
					$_SESSION['sesion_user'] = $sesion['nombre'] . " " . $sesion['apellido'];
					header("Location: " . URL . "turnos/");
				}else{
					echo "Invalido<br>";
				}
			}
		}

		public function cerrarSesion(){
			session_destroy();
			header("Location: " . URL . "turnos/");
		}
}
	//Instanciamos la clase para usar el empleado en las vistas
	$empleados = new empleadosController();

?>