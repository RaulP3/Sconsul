<?php

require_once "../models/conexion.php";

class mdlpacientes {

    #       Agregar un cliente a la BD
    # ---------------------------------------------
    
    public static function mdlRegistraPaciente($datos){

        $stmt = Conexion::conectar()->prepare("INSERT INTO `pacientes` (`id`, `nombres`, `apellidos`, `telefono`, `email`, `fechaNac`, `padecimientos`)
        VALUES (NULL, :nombres, :apellidos, :telefono, :email, :fechaNac, :padecimientos);");


         $stmt -> bindParam(":nombres", $datos["nombres"], PDO::PARAM_STR);
         $stmt -> bindParam(":apellidos", $datos["apellidos"], PDO::PARAM_STR);
         $stmt -> bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
         $stmt -> bindParam(":email", $datos["email"], PDO::PARAM_STR);
         $stmt -> bindParam(":fechaNac", $datos["fechaNac"], PDO::PARAM_STR);
		 $stmt -> bindParam(":padecimientos", $datos["padecimientos"], PDO::PARAM_STR);
         
        if ($stmt -> execute()){
            return "ok";
        }
        else {
            return "error";
        }
    }


	#       Actualiza la informacion de un cliente a la BD
    # ----------------------------------------------------------
    
    public static function mdlActualizaPaciente($datos){

        $stmt = Conexion::conectar()->prepare("UPDATE `pacientes` SET `nombres`=:nombres, `apellidos`=:apellidos,
		`telefono`=:telefono, `email`=:email, `fechaNac`=:fechaNac, `padecimientos` =:padecimientos WHERE id = :idEditar;");

		$stmt -> bindParam(":nombres", $datos["nombres"], PDO::PARAM_STR);
		$stmt -> bindParam(":idEditar", $datos["idEditar"], PDO::PARAM_INT);
		$stmt -> bindParam(":apellidos", $datos["apellidos"], PDO::PARAM_STR);
		$stmt -> bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
		$stmt -> bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$stmt -> bindParam(":fechaNac", $datos["fechaNac"], PDO::PARAM_STR);
		$stmt -> bindParam(":padecimientos", $datos["padecimientos"], PDO::PARAM_STR);
         
        if ($stmt -> execute()){
            return "ok";
        }
        else {
            return "error";
        }
    }

    	#LISTA CLIENTES
	#-------------------------------------

	public static function mdlListaPacientes($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement.
		return $stmt->fetchAll();
		
		//$stmt->close();

	}

    


    	#BUSCA UN CLIENTE
	#-------------------------------------

	public static function mdlBusca($paciente, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id = :id");

		$stmt->bindParam(":id", $paciente, PDO::PARAM_INT);

		$stmt -> execute();
		return $stmt -> fetch();

		//$stmt->close();
	}


    	#BORRAR CLIENTE
	#-------------------------------------
	public static function mdlBorrarPaciente($datosModel,$tabla){
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