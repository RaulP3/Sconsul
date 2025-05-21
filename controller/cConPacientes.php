<?php
class pacientes
{

    public static function ctrRegistra()
    {
        if (isset($_POST["email"])) {
            //elimina caracteres de la mascara en el numero de telefono
            $eliminar = array("(", ")", "-", " ");
            $telefono = str_replace($eliminar, "", $_POST["telefono"]);

            $fechaNac = $_POST["dateAnio"] . "-" . $_POST["dateMes"] . "-" . $_POST["dateDia"];

            $diabetes = (isset($_POST["diabetes"])) ? $_POST["diabetes"] : "";
            $hipertension = (isset($_POST["hipertension"])) ? $_POST["hipertension"] : "";
            $alergias = (isset($_POST["alergias"])) ? "1" : "";

            $padec = array('Diabetes' => $diabetes, 'Hipertension' => $hipertension, 'Alergias' => $alergias);

            $datos = array(
                "nombres" => $_POST["nombres"],
                "apellidos" => $_POST["apellidos"],
                "telefono" => $telefono,
                "email" => $_POST["email"],
                "fecha" => $fechaNac,
                "padecimientos" => json_encode($padec)
            );

            $ingresa = mdlPacientes::mdlRegistraPaciente($datos);

            if ($ingresa == "ok") {

                echo "<script>Swal.fire({
                        title: 'Registro Exitoso',
                        text: 'El nuevo paciente ha sio registrado',
                        icon: 'success',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Ok'
                      }).then((result) => {
                        if (result.isConfirmed) {
                            window.location='index.php?page=vPacienteList'
                        }
                      })
                      </script>";
            } else {

                echo "<script>Swal.fire({
                    title: 'Error',
                    text: 'No se pudo guardar la información',
                    icon: 'danger',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Ok'
                  }).then((result) => {
                    if (result.isConfirmed) {
                        window.location='index.php?page=vPacienteList'
                    }
                  })
                  </script>";
            }
        }
    }


    public static function ctrActualiza()
    {
        if (isset($_POST["btnActualiza"])) {

            //elimina caracteres de la mascara en el numero de telefono
            $eliminar = array("(", ")", "-", " ");
            $telefono = str_replace($eliminar, "", $_POST["telefono"]);

            $fechaNac=$_POST["dateAnio"]."-".$_POST["dateMes"]."-".$_POST["dateDia"];
            
            $diabetes = (isset($_POST["diabetes"])) ? "1" : "";
            $hipertension = (isset($_POST["hipertension"])) ? "1" : "";
            $alergias = (isset($_POST["alergias"])) ? "1" : "";

            $padec = array('Diabetes' => $diabetes, 'Hipertension' => $hipertension, 'Alergias' => $alergias);

            $datos = array(
                "nombres" => $_POST["nombres"],
                "idEditar" => $_POST["idEditar"],
                "apellidos" => $_POST["apellidos"],
                "telefono" => $telefono,
                "email" => $_POST["email"],
                "fechaNac" => $fechaNac,
                "padecimientos" => json_encode($padec)
            );

            $actualiza = mdlPacientes::mdlActualizaPaciente($datos);

            if ($actualiza == "ok") {

                echo "<script>Swal.fire({
                    title: 'Actualizado!',
                    text: 'La información se actualizó correctamente',
                    icon: 'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Ok'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location='index.php?page=vPacienteList'
                    }
                    })
                    </script>";
            } else {
                echo "<script>Swal.fire({
                    title: 'Error!',
                    text: 'No se logró actualizar La información',
                    icon: 'error',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Ok'
                  }).then((result) => {
                    if (result.isConfirmed) {
                        window.location='index.php?page=vPacienteList'
                    }
                  })
                  </script>";
            }
        }
        if (isset($_POST["btnCancel"])) {
            echo '<script>window.location="index.php?page=vPacienteList";</script>';
        }
    }


    #  Lista todos los usuarios disponibles en la tabla que recibe como parametro
    #------------------------------------------------------------------------------------------------
    public static function ctrListaPaciente()
    {

        // $respuesta = mdlPacientes::mdlListaPacientes("pacientes");
        $respuesta = ComunModel::mdlTraerTodo("pacientes", "");

        foreach ($respuesta as $row => $item) {
            echo '
            <tr>
                <td>' . $item["nombres"] . ' ' . $item["apellidos"] . '</td>
                <td>' . $item["telefono"] . '</td>
                <td>' . $item["email"] . '</td>
                <td>' . $item["ultimaCita"] . '</td>
                <td>' . $item["fechaNac"] . '</td>
                <td>
                    <div class="item-action dropdown">
                        <a href="javascript:void(0)" data-toggle="dropdown" class="icon" aria-expanded="false"><i class="fe fe-more-vertical fs-20 text-dark"></i></a>
                        <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(-172px, 22px, 0px); top: 0px; left: 0px; will-change: transform;">
                            <a href="index.php?page=vPacienteEdit&idEditar=' . $item["id"] . '" class="dropdown-item"><i class="dropdown-icon fe fe-edit-2"></i> Editar </a>
                            <a href="index.php?page=vPacienteList&idBorrar=' . $item["id"] . '" class="dropdown-item"><i class="dropdown-icon fe fe-user-x"></i> Borrar </a>
                        </div>
                    </div>
                </td>
            </tr>';
        }
    }


    # Estas funciones se movieron al controller comun

    // #-------------------------------------
    // #Lista todas los clientes para un select
    // #------------------------------------
    // public static function ctlListPaciente(){

    // 	$respuesta = mdlPacientes::mdlListaPacientes("pacientes");

    // 	foreach ($respuesta as $row => $item){
    // 		echo  '<option value="'.$item["idCliente"].'">'.$item["nombres"].' '.$item["apellidos"].'</option>';
    // 	}
    // }
    // #-------------------------------------------------------------------------
    // # Lista clientes en un select para el registro de salidas, recibe un valor
    // # si coincide con la marca retorna selected para la edicion de la entrada
    // #------------------------------------------------------------------------
    // public static function ctlListPacientesSelected($valor){

    // 	$respuesta = mdlPacientes::mdlListaPacientes("clientes");

    // 	foreach ($respuesta as $row => $item){
    //         if ($item["idCliente"] == $valor ) 
    //             echo  '<option value="'.$item["idCliente"].'" selected>'.$item["nombres"].' '.$item["apellidos"].' </option>';    
    //         else 
    //             echo  '<option value="'.$item["idCliente"].'">'.$item["nombres"].' '.$item["apellidos"].'</option>';
    // 	}
    // }


    #BORRAR USUARIO
    #------------------------------------
    public static function ctrBorrarPaciente()
    {
        if (isset($_GET['idBorrar'])) {
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
                    window.location="index.php?page=vPacienteDel&idBorrar="+' . $_GET["idBorrar"] . '
                }
              })
              </script>';
        }
    }
}//Class
