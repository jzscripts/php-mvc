<?php namespace Models;

	class Turno{
		//Definimos los atributos del modelo
		private $id_turno;
		private $id_vehiculo;
		private $allDay;
		private $title;
		private $descripcion;
		private $start;
		private $end;
		private $url;
		private $estado;
		private $borrado;
		private $audit;
		private $con;

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

		public function agregar(){
			//Metodo que agrega un nuevo empleado
			$sql = "INSERT INTO turnos(	id_vehiculo, 
										title,
										descripcion,
										start,
										end,
										url,
										estado, 
										borrado, 
										audit)
								 VALUES('{$this->id_vehiculo}',
								 		'{$this->title}',
								 		'{$this->descripcion}',
								 		'{$this->start}',
								 		'{$this->end}',
								 		'{$this->url}',
								 		0,
								 		0,
								 		'{$this->audit}')";
			$this->con->consultaSimple($sql);
		}

		public function borrar(){
			//Metodo que borra logicamente un empleado
			$sql = "UPDATE turnos 
					   SET audit        ='{$this->audit}',
					   	   borrado		= 1
					 WHERE id			= '{$this->id_turno}'";

			$this->con->consultaSimple($sql);
		}

		public function editar(){
			//Metodo que edita un empleado
			$sql = "UPDATE turnos 
					   SET id_vehiculo  ='{$this->id_vehiculo}',
					   	   title		='{$this->title}',
					   	   descripcion	='{$this->descripcion}',
					   	   start		='{$this->start}',
					   	   end			='{$this->end}',
					   	   url 			='{$this->url}',
					   	   estado		= 0,
					   	   borrado		= 0,
					   	   audit        ='{$this->audit}'
					 WHERE id			='{$this->id_turno}'";

			$this->con->consultaSimple($sql);
		}

		public function ver(){
			//Metodo para ver un empleado
			$sql = "SELECT * FROM turnos
					 WHERE id			= '{$this->id_turno}'";

			$datos = $this->con->consultaRetorno($sql);
			//Preparamos los datos en un array asociativo, antes de retornarlo
			$row = mysqli_fetch_assoc($datos);
			return $row;
		}

	}
?>