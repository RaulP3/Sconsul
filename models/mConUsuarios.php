<?php

require_once "../models/conexion.php";

class mdlUsuarios {

    #       Agregar un usuario a la BD
    # ---------------------------------------------
    
    public static function mdlRegistraUsuario($datos){

        $stmt = Conexion::conectar()->prepare("INSERT INTO `usuarios` (`id`, `nombres`, `apellidos`, `fechaNac`, `email`, `telefono`, `permisos`, `password`, `estado`, `costoConsulta`) 
        VALUES (NULL, :nombres, :apellidos, :fechaNac, :email, :telefono, :permisos, :pass, :estado, :costoConsulta )");
		
         $stmt -> bindParam(":nombres", $datos["nombres"], PDO::PARAM_STR);
         $stmt -> bindParam(":apellidos", $datos["apellidos"], PDO::PARAM_STR);
         $stmt -> bindParam(":email", $datos["email"], PDO::PARAM_STR);
         $stmt -> bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
         $stmt -> bindParam(":permisos", $datos["permisos"], PDO::PARAM_STR);
         $stmt -> bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
         $stmt -> bindParam(":fechaNac", $datos["fechaNac"], PDO::PARAM_STR);
         $stmt -> bindParam(":pass", $datos["password"], PDO::PARAM_STR);
         $stmt -> bindParam(':costoConsulta', $datos['costoConsulta'], PDO::PARAM_STR);
         
        if ($stmt -> execute()){
            return "ok";
        }
        else {
            return "error";
        }
    }


	#       Actualiza la informacion de un usuario a la BD
    # ----------------------------------------------------------
    
    public static function mdlActualizaUsuario($datos){

        $stmt = Conexion::conectar()->prepare("UPDATE `usuarios` SET `nombres`=:nombres,`apellidos`=:apellidos, `fechaNac` =:fechaNac, `estado`=:estado, 
		`telefono`=:telefono, `email`=:email, `password`=:pass, `permisos`=:permisos, `costoConsulta` = :costoConsulta WHERE id = :userId;");

		$stmt -> bindParam(":userId", $datos["userId"], PDO::PARAM_INT);
        $stmt -> bindParam(":nombres", $datos["nombres"], PDO::PARAM_STR);
        $stmt -> bindParam(":apellidos", $datos["apellidos"], PDO::PARAM_STR);
        $stmt -> bindParam(":fechaNac", $datos["fechaNac"], PDO::PARAM_STR);
        $stmt -> bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
        $stmt -> bindParam(":email", $datos["email"], PDO::PARAM_STR);
        $stmt -> bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
        $stmt -> bindParam(":permisos", $datos["permisos"], PDO::PARAM_STR);
        $stmt -> bindParam(":pass", $datos["password"], PDO::PARAM_STR);
        $stmt -> bindParam(":costoConsulta", $datos["costoConsulta"], PDO::PARAM_STR);
         
        if ($stmt -> execute()){
            return "ok";
        }
        else {
            return "error";
        }
    }

    	#LISTA USUARIOS
	#-------------------------------------

	public static function mdlListaUsuarios($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement.
		return $stmt->fetchAll();

		//$stmt->close();

	}


    	#BUSCA UN USUARIO
	#-------------------------------------

	public static function mdlBusca($usuario, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id = :id");

		$stmt->bindParam(":id", $usuario, PDO::PARAM_INT);

		$stmt -> execute();
		return $stmt -> fetch();

		//$stmt->close();
	}

    	#BUSCA UN USUARIO POR EMAIL
	#-------------------------------------

	public static function mdlBuscaEmail($email, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE email = :email");

		$stmt->bindParam(":email", $email, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetch();

		//$stmt->close();
	}


    	#BORRAR USUARIO
	#-------------------------------------
	public static function mdlBorrarUsuario($datosModel,$tabla){
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