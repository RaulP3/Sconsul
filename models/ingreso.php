<?php

require_once "conexion.php";

Class IngresoModels{

	public static function ingresoModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE email = :email");

		$stmt -> bindParam(":email", $datosModel["email"], PDO::PARAM_STR);

		$stmt -> execute();
		return $stmt -> fetch();

	}

}