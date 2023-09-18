<?php namespace Models;

	class Trabajo{
		//Definimos los atributos del modelo
		private $id_trabajo;
		private $id_vehiculo;
		private $id_empleado;
		private $detalle;
		private $ingreso;
		private $egreso;
		private $estado;
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

		public function buscarPorPatente(){
			//Metodo que retorna los clientes encontrados
			$sql = "SELECT 	trabajos.id_trabajo, 
							trabajos.id_vehiculo, 
					        trabajos.id_empleado, 
					        trabajos.detalle, 
					        trabajos.ingreso, 
					        trabajos.egreso, 
					        trabajos.estado,
					        vehiculos.patente,
					        vehiculos.modelo,
					        vehiculos.detalle,
					        vehiculos.id_cliente,
					        empleados.nombre,
					        empleados.apellido,
					        empleados.id_departamento,
					        departamentos.departamento
					FROM	trabajos 
					INNER JOIN vehiculos ON trabajos.id_vehiculo = vehiculos.id_vehiculo
					INNER JOIN empleados ON trabajos.id_empleado = empleados.id_empleado
					INNER JOIN departamentos ON empleados.id_departamento = departamentos.id_departamento
					WHERE (vehiculos.patente 		 LIKE '{$this->texto_buscado}' 		AND
						   trabajos.borrado = 0)";

			$datos = $this->con->consultaRetorno($sql);
			return $datos;		
		}

		public function buscarPorFecha(){
			//Metodo que retorna los clientes encontrados
			$sql = "SELECT 	trabajos.id_trabajo, 
							trabajos.id_vehiculo, 
					        trabajos.id_empleado, 
					        trabajos.detalle, 
					        trabajos.ingreso, 
					        trabajos.egreso, 
					        trabajos.estado,
					        vehiculos.patente,
					        vehiculos.modelo,
					        vehiculos.detalle,
					        vehiculos.id_cliente,
					        empleados.nombre,
					        empleados.apellido,
					        empleados.id_departamento,
					        departamentos.departamento
					FROM	trabajos 
					INNER JOIN vehiculos ON trabajos.id_vehiculo = vehiculos.id_vehiculo
					INNER JOIN empleados ON trabajos.id_empleado = empleados.id_empleado
					INNER JOIN departamentos ON empleados.id_departamento = departamentos.id_departamento
					WHERE (DATE_FORMAT(trabajos.ingreso,'%d-%m-%Y') LIKE '{$this->texto_buscado}' AND
						   trabajos.borrado = 0)";
			$datos = $this->con->consultaRetorno($sql);
			return $datos;		
		}

		public function buscarPorCliente(){
			//Metodo que retorna los clientes encontrados
			$sql = "SELECT 	trabajos.id_trabajo, 
							trabajos.id_vehiculo, 
					        trabajos.id_empleado, 
					        trabajos.detalle, 
					        trabajos.ingreso, 
					        trabajos.egreso, 
					        trabajos.estado,
					        vehiculos.patente,
					        vehiculos.modelo,
					        vehiculos.detalle,
					        vehiculos.id_cliente,
					        empleados.nombre,
					        empleados.apellido,
					        empleados.id_departamento,
					        departamentos.departamento
					FROM	trabajos 
					INNER JOIN vehiculos ON trabajos.id_vehiculo = vehiculos.id_vehiculo
					INNER JOIN empleados ON trabajos.id_empleado = empleados.id_empleado
					INNER JOIN departamentos ON empleados.id_departamento = departamentos.id_departamento
					WHERE (vehiculos.id_cliente LIKE '{$this->texto_buscado}' AND
						   trabajos.borrado = 0)";

			$datos = $this->con->consultaRetorno($sql);
			return $datos;		
		}

		public function buscarPorEmpleado(){
			//Metodo que retorna los clientes encontrados
			$sql = "SELECT 	trabajos.id_trabajo, 
							trabajos.id_vehiculo, 
					        trabajos.id_empleado, 
					        trabajos.detalle, 
					        trabajos.ingreso, 
					        trabajos.egreso, 
					        trabajos.estado,
					        vehiculos.patente,
					        vehiculos.modelo,
					        vehiculos.detalle,
					        vehiculos.id_cliente,
					        empleados.id_empleado,
					        empleados.nombre,
					        empleados.apellido,
					        empleados.id_departamento,
					        departamentos.departamento
					FROM	trabajos 
					INNER JOIN vehiculos ON trabajos.id_vehiculo = vehiculos.id_vehiculo
					INNER JOIN empleados ON trabajos.id_empleado = empleados.id_empleado
					INNER JOIN departamentos ON empleados.id_departamento = departamentos.id_departamento
					WHERE (trabajos.id_empleado LIKE '{$this->texto_buscado}' AND
						   trabajos.borrado = 0)";

			$datos = $this->con->consultaRetorno($sql);
			return $datos;		
		}

		public function buscarPorDepartamento(){
			//Metodo que retorna los clientes encontrados
			$sql = "SELECT 	trabajos.id_trabajo, 
							trabajos.id_vehiculo, 
					        trabajos.id_empleado, 
					        trabajos.detalle, 
					        trabajos.ingreso, 
					        trabajos.egreso, 
					        trabajos.estado,
					        vehiculos.patente,
					        vehiculos.modelo,
					        vehiculos.detalle,
					        vehiculos.id_cliente,
					        empleados.id_empleado,
					        empleados.nombre,
					        empleados.apellido,
					        empleados.id_departamento,
					        departamentos.departamento
					FROM	trabajos 
					INNER JOIN vehiculos ON trabajos.id_vehiculo = vehiculos.id_vehiculo
					INNER JOIN empleados ON trabajos.id_empleado = empleados.id_empleado
					INNER JOIN departamentos ON empleados.id_departamento = departamentos.id_departamento
					WHERE (departamentos.id_departamento LIKE '{$this->texto_buscado}' AND
						   trabajos.borrado = 0)";

			$datos = $this->con->consultaRetorno($sql);
			return $datos;		
		}		

		public function listar(){
			//Metodo que retorna los trabajos
			$sql = "SELECT 	trabajos.id_trabajo, 
							trabajos.id_vehiculo, 
					        trabajos.id_empleado, 
					        trabajos.detalle, 
					        trabajos.ingreso, 
					        trabajos.egreso, 
					        trabajos.estado,         
					        vehiculos.patente,
					        vehiculos.modelo,
					        vehiculos.detalle,
					        vehiculos.id_cliente,
					        empleados.nombre,
					        empleados.apellido,
					        empleados.id_departamento,
					        departamentos.departamento
					FROM	trabajos 
					INNER JOIN vehiculos ON trabajos.id_vehiculo = vehiculos.id_vehiculo
					INNER JOIN empleados ON trabajos.id_empleado = empleados.id_empleado
					INNER JOIN departamentos ON empleados.id_departamento = departamentos.id_departamento
					WHERE	trabajos.borrado = 0";

			$datos = $this->con->consultaRetorno($sql);
			return $datos;
		}

		public function agregar(){
			//Metodo que agrega un nuevo empleado
			$sql = "INSERT INTO trabajos(id_vehiculo, 
										 id_empleado, 
										 detalle, 
										 ingreso, 
										 egreso,
										 estado,
										 borrado, 
										 audit)
								 VALUES ('{$this->id_vehiculo}',
								 		 '{$this->id_empleado}',
								 		 '{$this->detalle}',
								 		 '{$this->ingreso}',
								 		 '{$this->egreso}',
								 		 '{$this->estado}',
								 		  0,
								 		 '{$this->audit}')";

			$this->con->consultaSimple($sql);
		}

		public function borrar(){
			//Metodo que borra logicamente un empleado
			$sql = "UPDATE trabajos 
					   SET audit        ='{$this->audit}',
					   	   borrado		= 1
					 WHERE id_trabajo	= '{$this->id_trabajo}'";

			$this->con->consultaSimple($sql);
		}

		public function editar(){
			//Metodo que edita un empleado
			$sql = "UPDATE trabajos 
					   SET id_vehiculo	='{$this->id_vehiculo}',
					   	   id_empleado 	='{$this->id_empleado}',
					   	   detalle		='{$this->detalle}',
					   	   ingreso		='{$this->ingreso}',
					   	   egreso      	='{$this->egreso}',
					   	   estado      	='{$this->estado}',
					   	   audit        ='{$this->audit}'
					 WHERE id_trabajo	='{$this->id_trabajo}'";

			$this->con->consultaSimple($sql);
		}

		public function ver(){
			//Metodo para ver un empleado
			$sql = "SELECT 	trabajos.id_trabajo, 
							trabajos.id_vehiculo, 
					        trabajos.id_empleado, 
					        trabajos.detalle AS detalleT, 
					        trabajos.ingreso, 
					        trabajos.egreso, 
					        trabajos.estado,
					        vehiculos.patente,
					        vehiculos.modelo,
					        vehiculos.detalle AS detalleV,
					        vehiculos.id_cliente,
					        clientes.nombre AS nombreC,
					        clientes.apellido AS apellidoC,
					        empleados.nombre AS nombreE,
					        empleados.apellido AS apellidoE,
					        empleados.id_departamento,
					        departamentos.departamento
					FROM	trabajos 
					INNER JOIN vehiculos ON trabajos.id_vehiculo = vehiculos.id_vehiculo
					INNER JOIN empleados ON trabajos.id_empleado = empleados.id_empleado
					INNER JOIN departamentos ON empleados.id_departamento = departamentos.id_departamento
					INNER JOIN clientes ON vehiculos.id_cliente = clientes.id_cliente
					WHERE trabajos.id_trabajo = '{$this->id_trabajo}'";

			$datos = $this->con->consultaRetorno($sql);
			//Preparamos los datos en un array asociativo, antes de retornarlo
			$row = mysqli_fetch_assoc($datos);
			return $row;
		}

	}
?>