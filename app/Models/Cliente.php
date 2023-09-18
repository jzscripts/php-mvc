<?php namespace Models;

	class Cliente{
		//Definimos los atributos del modelo
		private $id_cliente;
		private $nombre;
		private $apellido;
		private $dni;
		private $domicilio;
		private $telefono;
		private $mail;
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
			//Metodo que retorna los clientes encontrados
			$sql = "SELECT * FROM clientes 
					 WHERE (nombre LIKE '%{$this->texto_buscado}%' OR apellido LIKE '%{$this->texto_buscado}%' OR dni LIKE '{$this->texto_buscado}') AND borrado = 0";
			$datos = $this->con->consultaRetorno($sql);
			return $datos;		
		}

		public function listar(){
			//Metodo que retorna los clientes
			$sql = "SELECT * FROM clientes 
					 WHERE borrado = 0";

			$datos = $this->con->consultaRetorno($sql);
			return $datos;
		}

		public function agregar(){
			//Metodo que agrega un nuevo cliente
			$sql = "INSERT INTO clientes(nombre, 
										 apellido, 
										 dni, 
										 domicilio, 
										 telefono, 
										 mail, 
										 borrado, 
										 audit)
								 VALUES ('{$this->nombre}',
								 		'{$this->apellido}',
								 		'{$this->dni}',
								 		'{$this->domicilio}',
								 		'{$this->telefono}',
								 		'{$this->mail}',
								 		 0,
								 		'{$this->audit}')";
			echo $this->mail ;
			$this->con->consultaSimple($sql);
		}

		public function borrar(){
			//Metodo que borra logicamente un cliente
			$sql = "UPDATE clientes 
					   SET audit        ='{$this->audit}',
					   	   borrado		= 1
					 WHERE id_cliente	= '{$this->id_cliente}'";

			$this->con->consultaSimple($sql);
		}

		public function editar(){
			//Metodo que edita un cliente
			$sql = "UPDATE clientes
					   SET  nombre='{$this->nombre}',apellido='{$this->apellido}',dni='{$this->dni}',domicilio='{$this->domicilio}',telefono='{$this->telefono}',mail='{$this->mail}',audit='{$this->audit}'
					   WHERE id_cliente='{$this->id_cliente}'";
			$this->con->consultaSimple($sql);
		}

		public function ver(){
			//Metodo para ver un cliente
			$sql = "SELECT * FROM clientes
					 WHERE id_cliente 	= '{$this->id_cliente}'";

			$datos = $this->con->consultaRetorno($sql);
			//Preparamos los datos en un array asociativo, antes de retornarlo
			$row = mysqli_fetch_assoc($datos);
			return $row;
		}

	}
?>