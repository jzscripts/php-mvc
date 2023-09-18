<?php namespace Models;

	class Vehiculo{
		//Definimos los atributos del modelo
		private $id_vehiculo;
		private $patente;
		private $modelo;
		private $detalle;
		private $id_cliente;
		private $borrado;
		private $audit;
		private $con;

		private $texto_buscado;
		private $texto_buscado_2;


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
			//Metodo que retorna los clientes encontrados
			$sql = "SELECT vehiculos.id_vehiculo,
				           vehiculos.patente,
				           vehiculos.modelo,
				           vehiculos.detalle,
				           clientes.nombre,
				           clientes.apellido
					  FROM vehiculos INNER JOIN clientes ON vehiculos.id_cliente = clientes.id_cliente
					WHERE ((vehiculos.patente 		 LIKE '{$this->texto_buscado}' OR 
						   vehiculos.modelo 		 LIKE '{$this->texto_buscado}' AND 
						   vehiculos.borrado = 0) OR
						  (vehiculos.id_cliente      LIKE '{$this->texto_buscado_2}' AND 
						   vehiculos.borrado = 0))";


			$datos = $this->con->consultaRetorno($sql);
			return $datos;		
		}

		public function listar(){
			//Metodo que retorna los vehiculos
			$sql = "SELECT * FROM vehiculos 
					 WHERE borrado = 0";

			$datos = $this->con->consultaRetorno($sql);
			return $datos;
		}

		public function agregar(){
			//Metodo que agrega un nuevo empleado
			$sql = "INSERT INTO vehiculos(id_vehiculo, 
										 patente, 
										 modelo, 
										 detalle, 
										 id_cliente, 
										 borrado, 
										 audit)
								 VALUES (null,
								 		'{$this->patente}',
								 		'{$this->modelo}',
								 		'{$this->detalle}',
								 		'{$this->id_cliente}',
								 		0,
								 		'{$this->audit}')";

			$this->con->consultaSimple($sql);
		}

		public function borrar(){
			//Metodo que borra logicamente un empleado
			$sql = "UPDATE vehiculos 
					   SET audit        ='{$this->audit}',
					   	   borrado		= 1
					 WHERE id_vehiculo	= '{$this->id_vehiculo}'";

			$this->con->consultaSimple($sql);
		}

		public function editar(){
			//Metodo que edita un empleado
			$sql = "UPDATE vehiculos SET patente ='{$this->patente}', modelo ='{$this->modelo}', detalle ='{$this->detalle}', id_cliente ='{$this->id_cliente}', borrado ='{$this->borrado}', audit ='{$this->audit}'
					 WHERE id_vehiculo	='{$this->id_vehiculo}'";

			$this->con->consultaSimple($sql);
		}

		public function ver(){
			//Metodo para ver un empleado
			$sql = "SELECT vehiculos.id_vehiculo,
						   vehiculos.patente, 
						   vehiculos.modelo, 
						   vehiculos.detalle,
						   clientes.id_cliente, 
						   clientes.nombre, 
						   clientes.apellido 
					  FROM vehiculos INNER JOIN clientes ON vehiculos.id_cliente=clientes.id_cliente
					 WHERE vehiculos.id_vehiculo = '{$this->id_vehiculo}'";

			$datos = $this->con->consultaRetorno($sql);
			//Preparamos los datos en un array asociativo, antes de retornarlo
			$row = mysqli_fetch_assoc($datos);
			return $row;
		}

	}
?>