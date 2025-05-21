<?php
class clientes
{

    public static function ctrRegistra()
    {
        if (isset($_POST["email"])) {

            $datos = array(
                "rSocial" => $_POST["rSocial"],
                "rfc" => $_POST["rfc"],
                "calle" => $_POST["calle"],
                "num_ext" => $_POST["nExt"],
                "num_int" => $_POST["nInt"],
                "colonia" => $_POST["colonia"],
                "cPostal" => $_POST["cPostal"],
                "municipio" => $_POST["municipio"],
                "estado" => $_POST["estado"],
                "pais" => $_POST["pais"],
                "email" => $_POST["email"]
            );

            $ingresa = mdlClientes::mdlRegistraCliente($datos);

            if ($ingresa == "ok") {

                echo "<script>Swal.fire({
                        title: 'Registro Exitoso',
                        text: 'El nuevo cliente ha sio registrado',
                        icon: 'success',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Ok'
                      }).then((result) => {
                        if (result.isConfirmed) {
                            window.location='index.php?page=vClienteList'
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
                        window.location='index.php?page=vClienteList'
                    }
                  })
                  </script>";
            }
        }
    }


    public static function ctrActualiza()
    {
        if (isset($_POST["btnActualiza"])) {

            $datos = array(
                "rSocial" => $_POST["rSocial"],
                "rfc" => $_POST["rfc"],
                "calle" => $_POST["calle"],
                "num_ext" => $_POST["nExt"],
                "num_int" => $_POST["nInt"],
                "colonia" => $_POST["colonia"],
                "cPostal" => $_POST["cPostal"],
                "municipio" => $_POST["municipio"],
                "estado" => $_POST["estado"],
                "pais" => $_POST["pais"],
                "email" => $_POST["email"]
            );

            $actualiza = mdlClientes::mdlActualizaCliente($datos);

            if ($actualiza == "ok") {

                echo "<script>Swal.fire({
                    title: 'Actualizado!',
                    text: 'La información se actualizó correctamente',
                    icon: 'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Ok'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location='index.php?page=vClienteList'
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
                        window.location='index.php?page=vClienteList'
                    }
                  })
                  </script>";
            }
        }
        if (isset($_POST["btnCancel"])) {
            echo '<script>window.location="index.php?page=vClienteList";</script>';
        }
    }


    #  Lista todos los usuarios disponibles en la tabla que recibe como parametro
    #------------------------------------------------------------------------------------------------
    public static function ctrListaCliente()
    {

        $respuesta = ComunModel::mdlTraerTodo("clientes", "");

        foreach ($respuesta as $row => $item) {
            echo '
            <tr>
                <td>' . $item["rSocial"] . ' ' . $item["rfc"] . '</td>
                <td>' . $item["calle"] . '</td>
                <td>' . $item["nExt"] . '</td>
                <td>' . $item["nInt"] . '</td>
                <td>' . $item["colonia"] . '</td>
                <td>' . $item["cPostal"] . '</td>
                <td>' . $item["municipio"] . '</td>
                <td>' . $item["estado"] . '</td>
                <td>' . $item["pais"] . '</td>
                <td>' . $item["email"] . '</td>
                <td>
                    <div class="item-action dropdown">
                        <a href="javascript:void(0)" data-toggle="dropdown" class="icon" aria-expanded="false"><i class="fe fe-more-vertical fs-20 text-dark"></i></a>
                        <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(-172px, 22px, 0px); top: 0px; left: 0px; will-change: transform;">
                            <a href="index.php?page=vClienteEdit&idEditar=' . $item["id_cliente"] . '" class="dropdown-item"><i class="dropdown-icon fe fe-edit-2"></i> Editar </a>
                            <a href="index.php?page=vClienteList&idBorrar=' . $item["id_cliente"] . '" class="dropdown-item"><i class="dropdown-icon fe fe-user-x"></i> Borrar </a>
                        </div>
                    </div>
                </td>
            </tr>';
        }
    }

    #BORRAR USUARIO
    #------------------------------------
    public static function ctrBorrarCliente()
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
                    window.location="index.php?page=vClienteDel&idBorrar="+' . $_GET["idBorrar"] . '
                }
              })
              </script>';
        }
    }
}//Class
