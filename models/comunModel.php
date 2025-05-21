<?php
Class ComunModel {

	# ___________________________________________________________________________
	# Trae toda la información de una tabla, si el parametro id tiene un valor, 
	# solamente trae la informacion de ese id
	# ___________________________________________________________________________
    public static function mdlTraerTodo($tabla, $id){

		if($id == "") 
		{
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
		}		
		else
		{
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE `id` = :id");
			$stmt -> bindParam(":id", $id, PDO::PARAM_INT);	
		} 

		$stmt->execute();
		return $stmt->fetchAll();

	}

	#---------------------------------------------------------------------
	#	Live Search para mostrar las horas disponibles de cada doctor
	#---------------------------------------------------------------------
	public static function mdlLiveSearch($hora, $medico,$dia,$mes,$anio)
	{
		//Selecciona hora de citas mientras el mes, dia y medico sean iguales a los parametros
		// $stmt = Conexion::conectar()->prepare("SELECT `hora` FROM citas WHERE MONTH(`fecha`)=$mes AND DAY(`fecha`)=$dia AND `medicoId` = $medico" AND `hora`!= $hora);
		$stmt = Conexion::conectar()->prepare("SELECT `pacienteId` FROM citas WHERE 1");
		$stmt->execute();
		return $stmt->fetchAll();
	}

	#---------------------------------------------------------------------
	#  Cuenta el numero total de datos que hay en la tabla (PARA MEDICOS)
	#---------------------------------------------------------------------
	public static function mdlCuentaAtendidas($tabla,$medico){
		$stmt = Conexion::conectar() ->prepare("SELECT COUNT(`id`) FROM $tabla WHERE (estado = 'A' OR estado ='$') AND fecha = CURRENT_DATE AND medicoId = $medico");  //Muestra las citas atendidas de cada doctor

		$stmt->execute();	
		return $stmt->fetch();
	}

	public static function mdlCuentaTotal($tabla,$medico){
		$stmt = Conexion::conectar() ->prepare("SELECT COUNT(`id`) FROM $tabla WHERE fecha = CURRENT_DATE AND medicoId = $medico");  //Muestra el total de las citas de cada doctor

		$stmt->execute();	
		return $stmt->fetch();
	}	

	#---------------------------------------------------------------------
	#	Muestra las citas que hay en la tabla (PARA ADMIN Y ASISTENTE)
	#---------------------------------------------------------------------

	public static function mdlAtendidas($tabla){
		$stmt = Conexion::conectar() ->prepare("SELECT COUNT(`id`) FROM $tabla WHERE (estado = 'A' OR estado ='$') AND fecha = CURRENT_DATE");  //Muestra las citas atendidas generales

		$stmt->execute();	
		return $stmt->fetch();
	}
	public static function mdlTotalCitas($tabla){
		$stmt = Conexion::conectar() ->prepare("SELECT COUNT(`id`) FROM $tabla WHERE fecha = CURRENT_DATE");  //Muestra el total de las citas 

		$stmt->execute();	
		return $stmt->fetch();
	}	

	#----------------------------------------------------------------
	#  Suma los ingresos diarios y totales
	#----------------------------------------------------------------

	public static function sumIngresosTotal($tabla){
		$stmt =Conexion::conectar()->prepare("SELECT SUM(ALL cantidad) FROM $tabla where MONTH(`fecha`) = MONTH(CURDATE())"); //Suma todos los ingresos mensuales
		$stmt->execute();
		return $stmt->fetch();
	}

	public static function sumIngresosDia($tabla){
		$stmt =Conexion::conectar()->prepare("SELECT SUM(cantidad) FROM ingresos WHERE fecha = CURRENT_DATE");  //Suma solo los ingresos del día
		$stmt->execute();
		return $stmt->fetch();
	}

	public static function sumIngresosDoc($medico){
		$stmt =Conexion::conectar()->prepare("SELECT SUM(cantidad) FROM citas AS c INNER JOIN ingresos AS i ON c.id = i.idCita	WHERE c.medicoId=$medico AND i.fecha = CURRENT_DATE");  //Suma solo los ingresos del día
		$stmt->execute();
		return $stmt->fetch();
	}


	#----------------------------------------------------------------
	#  Lista los nombres registrados en una tabla para un select
	#----------------------------------------------------------------
	public static function selectNombreCompleto($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT id, nombres, apellidos FROM $tabla ORDER BY nombres ASC");
		$stmt->execute();
		return $stmt->fetchAll();

	}

	public static function selectMedicoCosto($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT id, nombres, apellidos, costoConsulta  FROM $tabla WHERE `permisos` = 'medico' ORDER BY nombres ASC");
		$stmt->execute();
		return $stmt->fetchAll();

	}
}
?>