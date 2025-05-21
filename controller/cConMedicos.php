<?php
Class Medicos {

    public static function ctrRegistra(){
        if(isset($_POST["nombres"]) && isset($_POST["apellidos"]) && isset($_POST["telefono"]) ){

            $eliminar = array("(",")","-"," ");
            $telefono = str_replace($eliminar, "", $_POST["telefono"]);


            $original_date = $_POST["fechaNac"];
            $timestamp = strtotime($original_date);
            $fechaNacimiento = date("Y-m-d", $timestamp);
            $fechaRegistro = date('Y-m-d');
            $costo = $_POST["costoConsulta"];
        
            $datos = array("nombres" => $_POST["nombres"],
                           "apellidos" => $_POST["apellidos"],
                           "telefono" => $telefono,
                           "fechaNac" => $fechaNacimiento,
                           "costoConsulta" => $costo
                        );


            $ingresa = mdlMedicos::mdlRegistraMedico($datos);

            if ($ingresa == "ok"){

                    echo "<script>Swal.fire({
                        title: 'Registro Exitoso',
                        text: 'El nuevo médico ha sio registrado',
                        icon: 'success',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Ok'
                      }).then((result) => {
                        if (result.isConfirmed) {
                            window.location='index.php?page=inicio'
                        }
                      })
                      </script>";
            }
            else{

                echo "<script>Swal.fire({
                    title: 'Error',
                    text: 'No se pudo guardar la información',
                    icon: 'danger',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Ok'
                  }).then((result) => {
                    if (result.isConfirmed) {
                        window.location='index.php?page=vMedicoList'
                    }
                  })
                  </script>";
        }
            
            
        }
    }


    public static function ctrActualiza(){
        if(isset($_POST["btnActualiza"])){

            $eliminar = array("(",")","-"," ");
            $telefono = str_replace($eliminar, "", $_POST["telefono"]);

            $original_date = $_POST["fechaNac"];
            $timestamp = strtotime($original_date);
            $fechaNacimiento = date("Y-m-d", $timestamp);
        
            $datos = array("id" => $_POST["id"],
                           "nombres" => $_POST["nombres"],
                           "apellidos" => $_POST["apellidos"],
                           "telefono" => $telefono,
                           "fechaNac" => $fechaNacimiento,
                           "costoConsulta" => $_POST["costoConsulta"]);

            $actualiza = mdlMedicos::mdlActualizaMedico($datos);

            if ($actualiza == "ok"){

                echo "<script>Swal.fire({
                    title: 'Actualizado!',
                    text: 'La información se actualizó correctamente',
                    icon: 'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Ok'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location='index.php?page=vMedicoList'
                    }
                    })
                    </script>";
            }else{
                echo "<script>Swal.fire({
                    title: 'Error!',
                    text: 'No se logró actualizar La información',
                    icon: 'error',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Ok'
                  }).then((result) => {
                    if (result.isConfirmed) {
                        window.location='index.php?page=vMedicoList'
                    }
                  })
                  </script>";

            }
            
        }
        if (isset($_POST["btnCancel"])){
            echo '<script>window.location="index.php?page=vMedicoList";</script>';
        }
    }


    #  Lista todos los médicos disponibles en la tabla que recibe como parametro
    #------------------------------------------------------------------------------------------------
    public static function ctrListaMedicos(){

		$respuesta = mdlMedicos::mdlListaMedico("medicos");

		foreach ($respuesta as $row => $item){
           

            echo '
            <tr>
                <td>'.$item["nombres"].' '.$item["apellidos"].'</td>
                <td>'.$item["telefono"].'</td>
                <td>'.$item["fechaNac"].'</td>
                <td>'.$item["costoConsulta"].'</td>
                <td>
                    <div class="item-action dropdown">
                        <a href="javascript:void(0)" data-toggle="dropdown" class="icon" aria-expanded="false"><i class="fe fe-more-vertical fs-20 text-dark"></i></a>
                        <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(-172px, 22px, 0px); top: 0px; left: 0px; will-change: transform;">
                            <a href="index.php?page=vMedicoEdit&idEditar='.$item["id"].'" class="dropdown-item"><i class="dropdown-icon fe fe-edit-2"></i> Editar </a>
                            <a href="index.php?page=vMedicoList&idBorrar='.$item["id"].'" class="dropdown-item"><i class="dropdown-icon fe fe-user-x"></i> Borrar </a>
                        </div>
                    </div>
                </td>
            </tr>';
		}
	}


    	#BORRAR MEDICO
	#------------------------------------
	public static function ctrBorrarMedico(){
		if (isset($_GET['idBorrar'])){
            echo '<script>  
            Swal.fire({
                title: "¿Está seguro?",
                text: "¡Esto no se podrá recuperar!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "¡Si, borrar!"
              }).then((result) => {
                if (result.isConfirmed) {
                    window.location="index.php?page=vMedicoDel&idBorrar="+'.$_GET["idBorrar"].'
                }
              })
              </script>';
		}
	}
}//Class

?>
