<?php namespace Models;

	class Departamento{
		//Definimos los atributos del modelo
		private $id_departamento;
		private $departamento;
		private $descripcion;
		private $borrado;
		private $audit;
		private $con;

		private $texto_buscado;

		public function __construct(){
			//Creamos la conexion para que el modelo pueda interactuar con la base de datos
			$this->con = new Conexion();
		}

		public function set($atributo, $contenido){
			//Metodo para definir valores a los atributos del objeto
			$this->$atributo = $contenido;
		}

		public function get($atributo){
			//Metodo para recuperar valores de los atributos del objeto
			return $this->$atributo;
		}

		public function buscar(){
			//Metodo que retorna los departamentos encontrados
			$sql = "SELECT * FROM departamentos 
					 WHERE departamento LIKE '%{$this->texto_buscado}%' AND borrado = 0";
			$datos = $this->con->consultaRetorno($sql);
			return $datos;		
		}

		public function listar(){
			//Metodo que retorna los departamentos
			$sql = "SELECT * FROM departamentos 
					 WHERE borrado = 0";

			$datos = $this->con->consultaRetorno($sql);
			return $datos;
		}

		public function agregar(){
			//Metodo que agrega un nuevo departamento
			$sql = "INSERT INTO departamentos(departamento, 
										 descripcion, 
										 borrado, 
										 audit)
								 VALUES ('{$this->departamento}',
								 		'{$this->descripcion}',
								 		 0,
								 		'{$this->audit}')";
			$this->con->consultaSimple($sql);
		}

		public function borrar(){
			//Metodo que borra logicamente un departamento
			$sql = "UPDATE departamentos 
					   SET audit        ='{$this->audit}',
					   	   borrado		= 1
					 WHERE id_departamento		= '{$this->id_departamento}'";

			$this->con->consultaSimple($sql);
		}

		public function editar(){
			//Metodo que edita un departamento
			$sql = "UPDATE departamentos 
					   SET departamento ='{$this->departamento}', descripcion ='{$this->descripcion}', audit ='{$this->audit}'
					 WHERE id_departamento ='{$this->id_departamento}'";

			$this->con->consultaSimple($sql);
		}

		public function ver(){
			//Metodo para ver un departamento
			$sql = "SELECT * FROM departamentos
					 WHERE id_departamento 	= '{$this->id_departamento}'";

			$datos = $this->con->consultaRetorno($sql);
			//Preparamos los datos en un array asociativo, antes de retornarlo
			$row = mysqli_fetch_assoc($datos);
			return $row;
		}

	}
?>