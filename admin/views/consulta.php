<?php
 $idConsulta = $_GET["idConsultar"];
 $idMedico = $_SESSION["id"];
 $datosCita = CitasModel::datosConsulta($idConsulta); 
 $padecimientos =json_decode($datosCita['padecimientos'], true);

 $idPaciente = $datosCita["idPaciente"];
 if (!isset($_POST["registrar"])) CitasModel::consultaIn($idPaciente);

 $keys = json_decode($datosCita['padecimientos']);
// Loop through the associative array


?>
<div class="page-header">
    <div class="card-options" style="margin-right: 100px;">

        <a class="btn btn-cyan text-gray-dark btn-lg mb-1" href="index.php?page=inicio"><i class="zmdi zmdi-home" style="color:white" title="Volver a Inicio" data-toggle="tooltip"></i></a>&nbsp

        <a class="btn btn-cyan btn-lg mb-1" href="index.php?page=vPacienteAdd"><i class="fa fa-user-plus" data-toggle="tooltip" title="Agregar Nuevo Paciente" data-original-title="fa fa-user-plus"></i></a>&nbsp

        <a class="btn btn-cyan text-gray-dark btn-lg mb-1" href="index.php?page=vNuevaCita"><i class="fa fa-calendar-plus-o" style="color:white" title="Agendar Nueva Cita" data-toggle="tooltip"></i></a>

    </div>
</div>

<div class="row ">
    <div class="col-lg-8">
        <form enctype="multipart/form-data" class="card" method="POST">
            <div class="card-header">
                <h3 class="card-title"><?php echo $datosCita["paciente"] ?></h3>
                <div class="card-options">

                <?php
                // Muestra el nombre del padecimiento si su valor es 1
                    foreach($keys as $key=>$value){
                        echo ($value) ? '<span class="tag tag-yellow">'.$key.'</span>&nbsp;' : '';
                    }
                ?>
                </div>

            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-8 col-md-8">
                        <div class="form-group">
                            <label class="form-label">Titulo</label>
                            <input type="text" class="form-control" name="titulo" placeholder="Titulo de la Consulta" required >
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12">
                        <div class="form-group">
                            <label class="col-form-label">Detalle de la consulta</label>
                            <textarea class="form-control" name="comentario" rows="2"></textarea>
                        </div>
                    </div>
                
                
                
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <input type="text" class="form-control" name="idConsulta" value="<?php echo $idConsulta; ?>" hidden>
                            <input type="text" class="form-control" name="idPaciente" value="<?php echo $idPaciente; ?>" hidden>
                            <input type="text" class="form-control" name="idMedico" value="<?php echo $idMedico; ?>" hidden>
                        </div>
                    </div>
                       
                </div> <!-- row -->
                <div class="row">
                    <div class="col-lg-12 col-sm-12">
                        <h3>Subir archivos</h3>
                    </div>
                    <div class="col-lg-3 col-sm-12">
                            <input type="file" class="dropify" name="image1" data-max-file-size="3M"
                            data-allowed-file-extensions="jpg png jpeg pdf">
                    </div>
                    <div class="col-lg-3 col-sm-12">
                            <input type="file" class="dropify" name="image2" data-max-file-size="3M"
                            data-allowed-file-extensions="jpg png jpeg pdf">
                    </div>
                    <div class="col-lg-3 col-sm-12">
                            <input type="file" class="dropify" name="image3" data-max-file-size="3M"
                            data-allowed-file-extensions="jpg png jpeg pdf">
                    </div> 
                    <div class="col-lg-3 col-sm-12">
                            <input type="file" class="dropify" name="image4" data-max-file-size="3M"
                            data-allowed-file-extensions="jpg png jpeg pdf">
                    </div> 
                </div>
                
            </div>
            <div class="card-footer text-right">
                <button type="submit" name="registrar" class="btn btn-indigo">Guardar</button>
            </div>
            <?php
                 $registro = new CitasController();
                 $registro -> ctrRegistraExpediente();
            ?>
        </form>

    
    </div>

    <?php
        $expediente = new CitasController();
        $expediente -> expediente($idPaciente);
    ?>

</div>
