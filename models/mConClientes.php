<?php

require_once "../models/conexion.php";

class mdlClientes {

    #       Agregar un cliente a la BD
    # ---------------------------------------------
    
    public static function mdlRegistraCliente($datos){

        $stmt = Conexion::conectar()->prepare("INSERT INTO `clientes` (`id_cliente`, `rSocial`, `rfc`, `calle`, `nExt`, `nInt`, `colonia`, `cPostal`, `municipio`, `estado`, `pais`, `email`) 
        VALUES (NULL, :rSocial, :rfc, :calle, :num_ext, :num_int, :colonia, :cPostal, :municipio, :estado, :pais, :email);");

		$stmt -> bindParam(":rSocial", $datos["rSocial"], PDO::PARAM_STR);
		$stmt -> bindParam(":rfc", $datos["rfc"], PDO::PARAM_STR);
		$stmt -> bindParam(":calle", $datos["calle"], PDO::PARAM_STR);
		$stmt -> bindParam(":nExt", $datos["nExt"], PDO::PARAM_STR);
		$stmt -> bindParam(":nInt", $datos["nInt"], PDO::PARAM_STR);
		$stmt -> bindParam(":colonia", $datos["colonia"], PDO::PARAM_STR);
		$stmt -> bindParam(":cPostal", $datos["cPostal"], PDO::PARAM_STR);
		$stmt -> bindParam(":municipio", $datos["municipio"], PDO::PARAM_STR);
		$stmt -> bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
		$stmt -> bindParam(":pais", $datos["pais"], PDO::PARAM_STR);
		$stmt -> bindParam(":email", $datos["email"], PDO::PARAM_STR);

        if ($stmt -> execute()){
            return "ok";
        }
        else {
            return "error";
        }
    }


	#       Actualiza la informacion de un cliente a la BD
    # ----------------------------------------------------------
    
    public static function mdlActualizaCliente($datos){

        $stmt = Conexion::conectar()->prepare("UPDATE `clientes` SET `rSocial=:rSocial`, `rfc=:rfc`, `calle=:calle`, `nExt=:nExt`, `nInt=:nInt`, `colonia=:colonia`, `cPostal=:cPostal`, `municipio=:municipio`, `estado=:estado`, `pais=:pais`, `email=:email` WHERE id_Cliente = :id_Cliente;");

		$stmt -> bindParam(":id_Cliente", $datos["id_cliente"], PDO::PARAM_INT);
		$stmt -> bindParam(":rSocial", $datos["rSocial"], PDO::PARAM_STR);
		$stmt -> bindParam(":rfc", $datos["rfc"], PDO::PARAM_STR);
		$stmt -> bindParam(":calle", $datos["calle"], PDO::PARAM_STR);
		$stmt -> bindParam(":nExt", $datos["nExt"], PDO::PARAM_STR);
		$stmt -> bindParam(":nInt", $datos["nInt"], PDO::PARAM_STR);
		$stmt -> bindParam(":colonia", $datos["colonia"], PDO::PARAM_STR);
		$stmt -> bindParam(":cPostal", $datos["cPostal"], PDO::PARAM_STR);
		$stmt -> bindParam(":municipio", $datos["municipio"], PDO::PARAM_STR);
		$stmt -> bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
		$stmt -> bindParam(":pais", $datos["pais"], PDO::PARAM_STR);
		$stmt -> bindParam(":email", $datos["email"], PDO::PARAM_STR);

		if ($stmt -> execute()){
			return "ok";
		}
		else {
			return "error";
		}
	}

    }

    	#LISTA CLIENTES
	#-------------------------------------

/*	public static function mdlListaClientes($tabla){

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
		
	}*/
// Class

?>