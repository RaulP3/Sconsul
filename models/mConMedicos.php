<?php

require_once "../models/conexion.php";

class mdlMedicos {

    #       Agregar un Socio a la BD
    # ---------------------------------------------
    
    public static function mdlRegistraMedico($datos){

        $stmt = Conexion::conectar()->prepare("INSERT INTO `medicos` (`id`, `nombres`, `apellidos`, `telefono`, `fechaNac`, `costoConsulta`)
        VALUES (NULL, :nombres, :apellidos, :telefono, :fechaNac, :costoConsulta)");


         $stmt -> bindParam(":nombres", $datos["nombres"], PDO::PARAM_STR);
         $stmt -> bindParam(":apellidos", $datos["apellidos"], PDO::PARAM_STR);
         $stmt -> bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
         $stmt -> bindParam(":fechaNac", $datos["fechaNac"], PDO::PARAM_STR);
         $stmt -> bindParam(":costoConsulta", $datos["costoConsulta"], PDO::PARAM_INT);
         
        if ($stmt -> execute()){
            return "ok";
        }
        else {
            return "error";
        }
    }


	#       Actualiza la informacion de un Médico a la BD
    # ----------------------------------------------------------
    
    public static function mdlActualizaMedico($datos){

        $stmt = Conexion::conectar()->prepare("UPDATE `medicos` SET `nombres`=:nombres, `apellidos`=:apellidos,
		`telefono`=:telefono, `fechaNac`=:fechaNac, `costoConsulta`=:costoConsulta  WHERE id = :id;");

        $stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);
        $stmt -> bindParam(":nombres", $datos["nombres"], PDO::PARAM_STR);
        $stmt -> bindParam(":apellidos", $datos["apellidos"], PDO::PARAM_STR);
        $stmt -> bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
        $stmt -> bindParam(":fechaNac", $datos["fechaNac"], PDO::PARAM_STR);
        $stmt -> bindParam(":costoConsulta", $datos["costoConsulta"], PDO::PARAM_INT);
         
        if ($stmt -> execute()){
            return "ok";
        }
        else {
            return "error";
        }
    }

    	#LISTA Socios
	#-------------------------------------

	public static function mdlListaMedico($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement.
		return $stmt->fetchAll();

		//$stmt->close();

	}


    	#BUSCA UN Socio
	#-------------------------------------

	public static function mdlBusca($medico, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id = :id");

		$stmt->bindParam(":id", $medico, PDO::PARAM_INT);

		$stmt -> execute();
		return $stmt -> fetch();

		//$stmt->close();
	}


    	#BORRAR Médico
	#-------------------------------------
	public static function mdlBorrarMedico($datosModel,$tabla){
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
		$stmt -> bindPARAM(":id",$datosModel, PDO::PARAM_INT);
		if ($stmt->execute()){
			return "success";
		} else {
			return "error";
		}
		//$stmt -> close();
	}


}// Class

?>