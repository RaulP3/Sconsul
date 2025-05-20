<?php
Class ComunController {

    #-------------------------------------
	#Lista todos los rgistros para un select
	#------------------------------------
	public static function selectNombreCompleto($tabla){

		$respuesta = ComunModel::selectNombreCompleto($tabla);

		foreach ($respuesta as $row => $item){
			echo  '<option value="'.$item["id"].'">'.$item["nombres"].' '.$item["apellidos"].'</option>';
		}
	}

	public static function selectMedicoCosto($tabla){

		$respuesta = ComunModel::selectMedicoCosto($tabla);

		foreach ($respuesta as $item){
			echo  '<option value="'.$item["id"].'" costo-consulta="'.$item["costoConsulta"].'">'.$item["nombres"].' '.$item["apellidos"].'</option>';
		}
	}

	public static function selectMedicoCostoSelected($tabla, $valor){

		$respuesta = ComunModel::selectMedicoCosto($tabla);

		foreach ($respuesta as $item){
			if ($item["id"] == $valor ) 
				echo  '<option value="'.$item["id"].'" costo-consulta="'.$item["costoConsulta"].'" selected>'.$item["nombres"].' '.$item["apellidos"].'</option>';
			else
				echo  '<option value="'.$item["id"].'" costo-consulta="'.$item["costoConsulta"].'">'.$item["nombres"].' '.$item["apellidos"].'</option>';
		}
	}

#--------------------------------------------------------------------
#  Muestra las citas que ya fueron atendidas
#--------------------------------------------------------------------

	public static function muestraCuenta($tabla, $medico){				//Solo para médicos
		$respuesta = ComunModel::mdlCuentaAtendidas($tabla,$medico);
		$total = ComunModel::mdlCuentaTotal($tabla,$medico);
		echo $respuesta[0], "/",  $total[0];
	}

	public static function cuentasAtendidas($tabla){					//Para Admin y Asistente
		$respuesta = ComunModel::mdlAtendidas($tabla);
		$total = ComunModel::mdlTotalCitas($tabla);
		echo $respuesta[0],"/",$total[0];
	}

#--------------------------------------------------------------------
#   Muestra los ingresos diarios y mensuales
#--------------------------------------------------------------------

	public static function sumaIngresos($tabla){
		$respuesta = ComunModel::sumIngresosTotal($tabla);
		if($respuesta [0]==""){
			echo "0";
		}else{
			echo $respuesta[0];
		}
	}
	public static function ingresosDia($tabla){
		$respuesta = ComunModel::sumIngresosDia($tabla);
		if($respuesta [0]==""){
			echo "0";
		}else{
			echo $respuesta[0];
		}
	}

	public static function ingresosDoctor($medico){
		$respuesta = ComunModel::sumIngresosDoc($medico);
		if($respuesta [0]==""){
			echo "0";
		}else{
			echo $respuesta[0];
		}
	}
    
    #-----------------------------------------------------------------
	# Lista los registros en un select, recibe un valor
    # si coincide retorna selected.
	#-----------------------------------------------------------------
	public static function selectNombreCompletoSelected($tabla, $valor){

		$respuesta = ComunModel::selectNombreCompleto($tabla);

		foreach ($respuesta as $item){

            if ($item["id"] == $valor ) 
                echo  '<option value="'.$item["id"].'" selected>'.$item["nombres"].' '.$item["apellidos"].' </option>';    
            else 
                echo  '<option value="'.$item["id"].'">'.$item["nombres"].' '.$item["apellidos"].'</option>';
		}
	}
}

?>