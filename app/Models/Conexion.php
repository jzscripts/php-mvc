<?php namespace Models;

	class Conexion{

		private $datos = array(
			"host"	=>	"localhost",
			"user"	=>	"root",
			"pass"	=>	"",
			"db" 	=>	"servi_independencia"
		);
		private $con;

		public function __construct(){
			//Creamos el objeto $con para realizar las consultas a la base de dato
			$this->con = new \mysqli(
									$this->datos['host'],	//Servidor
									$this->datos['user'],	//Usuario
									$this->datos['pass'],	//Contraseña
									$this->datos['db']		//Base de datos
									);
			$this->con->set_charset("utf8");
			date_default_timezone_set("America/Argentina/Tucuman");
		}
		public function consultaSimple($sql){
			//Metodo para consultas sin retorno[UPDATE, DELETE, INSERT]
			$this->con->query($sql);
			//Controla el error de horas duplicadas, en turnos
			if (strrpos($this->con->error, "for key 'fecha'")) {
							echo '<p class="bg-danger">Error, no se pueden asignar turnos con el mismo horario de inicio</p>';
						}
			echo $this->con->error;						
		}

		public function consultaRetorno($sql){
			//Metodo para consultas sin retorno[SELECT, FETCH]
			$datos = $this->con->query($sql);
			echo $this->con->error;
			return $datos;
		}
	}

?>
