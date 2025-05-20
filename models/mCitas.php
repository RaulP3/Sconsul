<?php
Class CitasModel{

	public static function buscaCita($id){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM `citas` WHERE id = :id");

		$stmt->bindParam(":id", $id, PDO::PARAM_INT);

		$stmt -> execute();
		return $stmt -> fetch();

	}

    public static function buscaCitaEx($cita)
    {
		$stmt = Conexion::conectar()->prepare("SELECT * FROM `citas` WHERE `fecha` = :fecha AND `medicoId` = :medico AND `hora` = :hora");

		$stmt->bindParam(":medico", $cita['medicoId'], PDO::PARAM_INT);
		$stmt->bindParam(":hora", $cita['hora'], PDO::PARAM_STR);
		$stmt->bindParam(":fecha", $cita['fecha'], PDO::PARAM_STR);

		$stmt -> execute();
		return $stmt -> fetchAll();
    }

    public static function buscaCitaPago($id){

		$stmt = Conexion::conectar()->prepare("SELECT c.id, c.fecha, c.hora, c.costo, CONCAT(m.nombres,' ', m.apellidos) AS medico, CONCAT(p.nombres,' ', p.apellidos) as paciente
                                                FROM citas AS c
                                                INNER JOIN usuarios AS m
                                                    ON c.medicoId = m.id
                                                INNER JOIN pacientes AS p
                                                    ON c.pacienteId = p.id
                                                    WHERE c.id = :id;");

		$stmt->bindParam(":id", $id, PDO::PARAM_INT);

		$stmt -> execute();
		return $stmt -> fetch();

		//$stmt->close();
	}

    public static function registraCita($datos){
        $stmt = Conexion::conectar()->prepare("INSERT INTO `citas` (`id`, `medicoId`, `pacienteId`, `fecha`, `hora`, `costo`, `estado`, `responsable`)
        VALUES (NULL, :medicoId, :pacienteId, :fecha, :hora, :costo, 'R', :responsable);");


        $stmt -> bindParam(":medicoId", $datos["medicoId"], PDO::PARAM_INT);
        $stmt -> bindParam(":pacienteId", $datos["pacienteId"], PDO::PARAM_INT);
        $stmt -> bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
        $stmt -> bindParam(":hora", $datos["hora"], PDO::PARAM_STR);
        $stmt -> bindParam(":responsable", $datos["responsable"], PDO::PARAM_INT);
        $stmt -> bindParam(":costo", $datos["costo"], PDO::PARAM_INT);

         
        if ($stmt -> execute()){
            return "ok";
        }
        else {
            return "error";
        }   
    }

    public static function registraPago($datos){
        $stmt = Conexion::conectar()->prepare("INSERT INTO `ingresos` (`id`, `idCita`, `cantidad`, `metodoPago`, `fecha`, `cajeroId`)
        VALUES (NULL, :idCita, :cantidad, :metodoPago, CURDATE(), :cajeroId);");


        $stmt -> bindParam(":idCita", $datos["idCita"], PDO::PARAM_INT);
        $stmt -> bindParam(":cantidad", $datos["cantidad"], PDO::PARAM_INT);
        $stmt -> bindParam(":metodoPago", $datos["metodoPago"], PDO::PARAM_STR);
        $stmt -> bindParam(":cajeroId", $datos["cajeroId"], PDO::PARAM_INT);
         
        if ($stmt -> execute()){
            return "ok";
        }
        else {
            return "error";
        } 
    }

    public static function corteCaja($cajero){
        $stmt = Conexion::conectar()->prepare("SELECT `metodoPago`, sum(`cantidad`) as cantidad, count(`cantidad`) as numero FROM `ingresos` 
                                                WHERE `fecha` = CURRENT_DATE AND `cajeroId` = :cajero group by `metodoPago`");

		$stmt->bindParam(":cajero", $cajero, PDO::PARAM_INT);

		$stmt -> execute();
		return $stmt -> fetchAll();
    }
    
    public static function totalDia($cajero){
        if ($cajero == "") $cajeroCorte = "";
        else $cajeroCorte = "AND cajeroId = $cajero";

        $stmt = Conexion::conectar()->prepare("SELECT sum(`cantidad`) as cantidad FROM `ingresos` WHERE `fecha` = CURRENT_DATE $cajeroCorte ");

		$stmt -> execute();
		return $stmt -> fetch();
    }

    public static function datosCajero($cajero){

        $stmt = Conexion::conectar()->prepare("SELECT `id`, `nombres`, `apellidos`, `telefono`, `email` FROM `usuarios` WHERE `id` = $cajero ");
        
		$stmt -> execute();
		return $stmt -> fetch();
    }

    public static function expediente($idPaciente){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM `expediente` WHERE `idPaciente` = :idPaciente ORDER BY `fecha` DESC ");
        $stmt->bindParam(":idPaciente", $idPaciente, PDO::PARAM_INT);
		$stmt -> execute();
		return $stmt -> fetchAll();
    }

    public static function reagendarCita($datos){
        $stmt = Conexion::conectar()->prepare(" UPDATE `citas` SET `medicoId` = :medicoId, `pacienteId` = :pacienteId, `fecha` = :fecha, `hora` = :hora, 
        `costo` = :costo, `estado` = 'R', `responsable` = :responsable WHERE `id` = :id ;");


        $stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);
        $stmt -> bindParam(":medicoId", $datos["medicoId"], PDO::PARAM_INT);
        $stmt -> bindParam(":pacienteId", $datos["pacienteId"], PDO::PARAM_INT);
        $stmt -> bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
        $stmt -> bindParam(":hora", $datos["hora"], PDO::PARAM_STR);
        $stmt -> bindParam(":responsable", $datos["responsable"], PDO::PARAM_INT);
        $stmt -> bindParam(":costo", $datos["costo"], PDO::PARAM_INT);

         
        if ($stmt -> execute()){
            return "ok";
        }
        else {
            return "error";
        }   
    }

    public static function citasAgendadas($medico){

        if ($medico == "") $propietarioCita = "";
        else $propietarioCita = "AND medicoId = $medico";

        $stmt = Conexion::conectar()->prepare("SELECT c.id, c.fecha, c.hora, c.costo, c.estado, CONCAT(m.nombres,' ', m.apellidos) AS medico, CONCAT(p.nombres,' ', p.apellidos) as paciente, p.telefono
                                                FROM citas AS c
                                                INNER JOIN usuarios AS m
                                                    ON c.medicoId = m.id
                                                INNER JOIN pacientes AS p
                                                    ON c.pacienteId = p.id
                                                    WHERE c.fecha >= CURDATE() $propietarioCita
                                                ORDER BY c.fecha;");
        $stmt->execute();
		return $stmt->fetchAll();
        
    }

    public static function datosConsulta($id){
        $stmt = Conexion::conectar()->prepare("SELECT c.id, p.id AS idPaciente, CONCAT(p.nombres,' ', p.apellidos) as paciente, p.telefono, padecimientos
                                                FROM citas AS c
                                                INNER JOIN pacientes AS p
                                                    ON c.pacienteId = p.id
                                                    WHERE c.fecha >= CURDATE() AND c.id = :id
                                                ORDER BY c.fecha;");

        $stmt -> bindPARAM(":id",$id, PDO::PARAM_INT);
        $stmt->execute();
		return $stmt->fetch();
    }

    # -------------------------------------------------------------------------------------
    # Cambia el estado de una cita con parametro que recibe
	#--------------------------------------------------------------------------------------
	public static function mEstadoCita($id, $estado){
		$stmt = Conexion::conectar()->prepare("UPDATE citas SET `estado` = :estado  WHERE id = :id");
        $stmt -> bindPARAM(":estado",$estado, PDO::PARAM_STR);
        $stmt -> bindPARAM(":id",$id, PDO::PARAM_INT);
		if ($stmt->execute()){
			return "success";
		} else {
			return "error";
		}
		//$stmt -> close();
	}

    public static function mdlRegistraExpediente($datos){

        $stmt = Conexion::conectar()->prepare("INSERT INTO `expediente`(`id`, `idPaciente`, `idMedico`, `fecha`, `titulo`, `comentario`, `archivos`) 
        VALUES (NULL, :idPaciente, :idMedico, CURRENT_DATE, :titulo, :comentario, :archivos)");
    
        $stmt -> bindParam(":idPaciente", $datos["idPaciente"], PDO::PARAM_INT);
        $stmt -> bindParam(":idMedico", $datos["idMedico"], PDO::PARAM_INT);
		$stmt -> bindParam(":titulo", $datos["titulo"], PDO::PARAM_STR);
		$stmt -> bindParam(":comentario", $datos["comentario"], PDO::PARAM_STR);
		$stmt -> bindParam(":archivos", $datos["archivos"], PDO::PARAM_STR);
        
        if ($stmt -> execute()){
            return "ok";
        }
        else {
            return "error";
        }
    }

    public static function registraUltimaVisita($paciente){

        $stmt = Conexion::conectar()->prepare("UPDATE `pacientes` SET `ultimaCita` = CURRENT_TIMESTAMP WHERE `id` = :idPaciente ");
    
        $stmt -> bindParam(":idPaciente", $paciente, PDO::PARAM_INT);
        
        if ($stmt -> execute()){
            return "ok";
        }
        else {
            return "error";
        }
    }

    public static function consultaIn($paciente){

        $stmt = Conexion::conectar()->prepare("UPDATE `citas` SET `consultaIn` = CURRENT_TIME WHERE `id` = :idPaciente");
    
        $stmt -> bindParam(":idPaciente", $paciente, PDO::PARAM_INT);
        
        if ($stmt -> execute()){
            return "ok";
        }
        else {
            return "error";
        }
    }

    public static function consultaOut($paciente){

        $stmt = Conexion::conectar()->prepare("UPDATE `citas` SET `consultaOut` = CURRENT_TIME WHERE `id` = :idPaciente ");
    
        $stmt -> bindParam(":idPaciente", $paciente, PDO::PARAM_INT);
        
        if ($stmt -> execute()){
            return "ok";
        }
        else {
            return "error";
        }
    }
}
?>