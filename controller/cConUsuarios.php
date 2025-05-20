<?php
Class usuarios {

    public static function ctrRegistra(){
        if(isset($_POST["btnRegistrar"]) && isset($_POST["email"])){

            // $original_date = $_POST["fechaNac"];
            // $timestamp = strtotime($original_date);
            // $fechaNac = date("Y-m-d", $timestamp);

            $fechaNac = $_POST["dateAnio"] . "-" . $_POST["dateMes"] . "-" . $_POST["dateDia"];

            $estado =  (isset($_POST["estado"])) ? "1" : "0";

            $costoConsulta =  (isset($_POST['costoConsulta']) && $_POST['costoConsulta'] != "")  ? $_POST['costoConsulta'] : '0';

            $registrado = mdlUsuarios::mdlBuscaEmail($_POST["email"], "usuarios");

            if (is_null($registrado) || $registrado != 'false' ){
                $datos = array("email" => $_POST["email"],
                           "nombres" => $_POST["nombres"],
                           "apellidos" => $_POST["apellidos"],
                           "fechaNac" => $fechaNac,
                           "telefono" => $_POST["telefono"],
                           "permisos" => $_POST["permisos"],
                           'costoConsulta' => $costoConsulta,
                           "estado" => $estado,
                           "password" => password_hash($_POST["password"], PASSWORD_DEFAULT));

                $ingresa = mdlUsuarios::mdlRegistraUsuario($datos);

                if ($ingresa == "ok"){

                        echo "<script>Swal.fire({
                            title: 'Registro Exitoso',
                            text: 'El nuevo usuario ha sio registrado',
                            icon: 'success',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Ok'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location='index.php?page=vUserList'
                            }
                          })
                        </script>";
                }
            }
            else{
                echo "<script>Swal.fire({
                    title: 'Usuario ya existe',
                    text: 'la direccion de email ya esta registrada',
                    icon: 'danger',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Ok'
                  }).then((result) => {
                    if (result.isConfirmed) {
                        window.location='index.php?page=vUserAdd'
                    }
                  })
                  </script>";
            }
           
            
        }
    }

 
    public static function ctrActualiza(){
        if(isset($_POST["btnActualiza"])){
            // $original_date = $_POST["fechaNac"];
            // $timestamp = strtotime($original_date);
            // $fechaNac = date("Y-m-d", $timestamp);

            $fechaNac = $_POST["dateAnio"] . "-" . $_POST["dateMes"] . "-" . $_POST["dateDia"];
            
            $estado =  (isset($_POST["estado"])) ? "1" : "0";
            $costoConsulta =  (isset($_POST['costoConsulta']) && $_POST['costoConsulta'] != "")  ? $_POST['costoConsulta'] : '0';

            if ($_POST["password"] != "")
            {
                $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
            }
            else{
                $password = $_POST["pswd"];
            }

            $datos = array("userId" => $_POST["userId"],
                           "email" => $_POST["email"],
                           "fechaNac" => $fechaNac,
                           "estado" => $estado,
                           "nombres" => $_POST["nombres"],
                           "apellidos" => $_POST["apellidos"],
                           "telefono" => $_POST["telefono"],
                           "permisos" => $_POST["permisos"],
                           "costoConsulta" => $costoConsulta,
                           "password" => $password);

            $actualiza = mdlUsuarios::mdlActualizaUsuario($datos);

            if ($actualiza == "ok"){

                echo "<script>Swal.fire({
                    title: 'Actualizado!',
                    text: 'La información se actualizó correctamente',
                    icon: 'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Ok'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location='index.php?page=inicio'
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
                        window.location='index.php?page=inicio'
                    }
                  })
                  </script>";

            }
            
        }
        if (isset($_POST["btnCancel"])){
            echo '<script>window.location="index.php?page=vUserList";</script>';
        }
    }


    #  Lista todos los usuarios disponibles en la tabla que recibe como parametro
    #------------------------------------------------------------------------------------------------
    public static function ctrListaUsuarios(){

		$respuesta = mdlUsuarios::mdlListaUsuarios("usuarios");

		foreach ($respuesta as $row => $item){
            if ($item["estado"] == 1) $estado = '<td class="text-success">Activo</td>';
            if ($item["estado"] == 0) $estado = '<td class="text-danger">Inactivo</td>';

            echo '
                <tr>
                    <td>
                        <div class="d-flex">
                            <span class="avatar avatar-md  d-block brround cover-image mr-3" data-image-src="'.$item["foto"].'"></span>
                            <span class="mt-2">'.$item["nombres"].' '.$item["apellidos"].'</span>
                        </div>
                    </td>
                    <td>'.$item["permisos"].'</td>
                    <td>'.$item["email"].'</td>'.
                    $estado.'
                    <td >'.$item["ultimoLogin"].'</td>
                    <td>'.$item["fechaNac"].'</td>
                    <td>
                        <div class="item-action dropdown">
                            <a href="javascript:void(0)" data-toggle="dropdown" class="icon" aria-expanded="false"><i class="fe fe-more-vertical fs-20 text-dark"></i></a>
                            <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(-172px, 22px, 0px); top: 0px; left: 0px; will-change: transform;">
                                <a href="index.php?page=vUserEdit&idEditar='.$item["id"].'" class="dropdown-item"><i class="dropdown-icon fe fe-edit-2"></i> Editar </a>';
                                
                                // esto es para que el usuario en sesion no pueda borrarse a si mismo
                                if ($item['id'] != $_SESSION['id']){
                                    echo '<a href="index.php?page=vUserList&idBorrar='.$item["id"].'" class="dropdown-item"><i class="dropdown-icon fe fe-user-x"></i> Borrar </a>';
                                }
                                echo '
                            </div>
                        </div>
                    </td>
                </tr>';
		}
	}


    	#BORRAR USUARIO
	#------------------------------------
	public static function ctrBorrarUsuario(){
		if (isset($_GET['idBorrar'])){
            echo '<script>  
            Swal.fire({
                title: "Esta seguro?",
                text: "Esto no se podrá recuperar!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Si, borrar!"
              }).then((result) => {
                if (result.isConfirmed) {
                    window.location="index.php?page=vUserDel&idBorrar="+'.$_GET["idBorrar"].'
                }
              })
              </script>';
		}
	}




}//Class

?>
