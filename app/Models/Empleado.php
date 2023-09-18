<?php namespace Models;

	class Empleado{
		//Definimos los atributos del modelo
		private $id_empleado;
		private $nombre;
		private $apellido;
		private $dni;
		private $domicilio;
		private $telefono;
		private $id_departamento;
		private $clave;
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
			//Metodo que retorna los empleados encontrados
			$sql = "SELECT empleados.id_empleado, 
						   empleados.nombre, 
						   empleados.apellido, 
						   empleados.dni, 
						   empleados.domicilio, 
						   empleados.telefono, 
						   empleados.clave, 
						   departamentos.departamento 
					FROM   empleados INNER JOIN departamentos ON empleados.id_departamento=departamentos.id_departamento
					WHERE (empleados.nombre 		 LIKE '{$this->texto_buscado}'OR 
						   empleados.apellido 		 LIKE '{$this->texto_buscado}'OR 
						   empleados.dni 			 LIKE '{$this->texto_buscado}'	OR 
						   empleados.id_departamento LIKE '{$this->texto_buscado}') AND 
						   empleados.borrado = 0";
			$datos = $this->con->consultaRetorno($sql);
			return $datos;		
		}

		public function listar(){
			//Metodo que retorna los empleados
			$sql = "SELECT 	empleados.id_empleado, 
							empleados.nombre, 
					        empleados.apellido,
					        empleados.dni,
					        empleados.domicilio,
					        empleados.telefono,
					        departamentos.departamento,
					        empleados.borrado,
					        empleados.audit
					FROM	empleados INNER JOIN departamentos on empleados.id_departamento = departamentos.id_departamento 
					WHERE 	empleados.borrado = 0";

			$datos = $this->con->consultaRetorno($sql);
			return $datos;
		}

		public function agregar(){
			//Metodo que agrega un nuevo empleado
			$sql = "INSERT INTO empleados(nombre, 
										 apellido, 
										 dni, 
										 domicilio, 
										 telefono, 
										 id_departamento,
										 clave, 
										 borrado, 
										 audit)
								 VALUES ('{$this->nombre}',
								 		'{$this->apellido}',
								 		'{$this->dni}',
								 		'{$this->domicilio}',
								 		'{$this->telefono}',
								 		'{$this->id_departamento}',
								 		'{$this->clave}',
								 		0,
								 		'{$this->audit}')";

			$this->con->consultaSimple($sql);
		}

		public function borrar(){
			//Metodo que borra logicamente un empleado
			$sql = "UPDATE empleados 
					   SET audit        ='{$this->audit}',
					   	   borrado		= 1
					 WHERE id_empleado	= '{$this->id_empleado}'";

			$this->con->consultaSimple($sql);
		}

		public function editar(){
			//Metodo que edita un empleado
			$sql = "UPDATE empleados 
					   SET nombre ='{$this->nombre}', apellido ='{$this->apellido}', dni ='{$this->dni}', domicilio ='{$this->domicilio}', telefono ='{$this->telefono}', id_departamento ='{$this->id_departamento}', clave ='{$this->clave}', audit ='{$this->audit}'
					   WHERE id_empleado ='{$this->id_empleado}'";

			$this->con->consultaSimple($sql);
		}

		public function ver(){
			//Metodo para ver un empleado
			$sql = "SELECT empleados.id_empleado, 
						   empleados.nombre, 
						   empleados.apellido, 
						   empleados.dni, 
						   empleados.domicilio, 
						   empleados.telefono, 
						   empleados.clave, 
						   departamentos.departamento 
					FROM   empleados INNER JOIN departamentos ON empleados.id_departamento=departamentos.id_departamento
					 WHERE empleados.id_empleado 	= '{$this->id_empleado}'";

			$datos = $this->con->consultaRetorno($sql);
			//Preparamos los datos en un array asociativo, antes de retornarlo
			$row = mysqli_fetch_assoc($datos);
			return $row;
		}

		public function validarUser(){
			//Preparando entradas
			$this->dni = $this->dni;
			$this->clave = $this->clave;

			$sql = "SELECT empleados.id_empleado, 
						   empleados.nombre, 
						   empleados.apellido, 
						   empleados.dni, 
						   empleados.domicilio, 
						   empleados.telefono, 
						   empleados.clave, 
						   departamentos.departamento 
					FROM   empleados INNER JOIN departamentos ON empleados.id_departamento=departamentos.id_departamento
					WHERE  empleados.dni='".$this->dni."' AND empleados.clave='".$this->clave."' AND empleados.borrado = 0;";
			$datos = $this->con->consultaRetorno($sql);
			$row = mysqli_fetch_assoc($datos);
			if ($row){
				return $row;
			}else{
				return false;
			}
		}

	}
?>