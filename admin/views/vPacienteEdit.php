<?php

$paciente = $_GET["idEditar"];
$busca = mdlPacientes::mdlBusca($paciente, "pacientes");
$padec = json_decode($busca['padecimientos'], true);

?>

<div class="page-header">
    <h4 class="page-title">Actualizar Informacion de Paciente</h4>
    <div class="card-options" style="margin-right: 100px;">

        <a class="btn btn-cyan text-gray-dark btn-lg mb-1" href="index.php?page=inicio"><i class="zmdi zmdi-home" style="color:white" title="Volver a Inicio" data-toggle="tooltip"></i></a>&nbsp

        <a class="btn btn-cyan btn-lg mb-1" href="index.php?page=vPacienteAdd"><i class="fa fa-user-plus" data-toggle="tooltip" title="Agregar Nuevo Paciente" data-original-title="fa fa-user-plus"></i></a>&nbsp

        <a class="btn btn-cyan text-gray-dark btn-lg mb-1" href="index.php?page=vNuevaCita"><i class="fa fa-calendar-plus-o" style="color:white" title="Agendar Nueva Cita" data-toggle="tooltip"></i></a>

    </div>
</div>
<div class="row ">
    <div class="col-lg-8">
        <form class="card" method="POST">
            <div class="card-header">
                <h3 class="card-title">Información Personal</h3>

            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-5 col-md-5">
                        <div class="form-group">
                            <label class="form-label">Nombres</label>
                            <input type="text" class="form-control" name="nombres" placeholder="Juan" value="<?php echo $busca['nombres']; ?>">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">Apellidos</label>
                            <input type="text" class="form-control" name="apellidos" placeholder="Perez García" value="<?php echo $busca['apellidos']; ?>">
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-5">
                        <div class="form-group">
                            <label class="form-label">Teléfono</label>
                            <input type="text" class="form-control" name="telefono" data-inputmask="'mask' : '(999) 999-9999'" value="<?php echo $busca['telefono']; ?>">
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $busca['email']; ?>">
                        </div>
                    </div>

                    <?php
                    $fechaN = $busca['fechaNac'];
                    ?>

                    <div class="form-group m-0">
                        <label class="form-label" style="margin-left:15px">Fecha de Nacimiento</label>
                        <div class="row gutters-xs" style="margin-left:8px">
                            <?php
                            $fecha = CitasController::fechaAdd($fechaN);
                            ?>
                        </div>
                    </div>


                    <input type="text" class="form-control" name="idEditar" value="<?php echo $paciente; ?>" hidden>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Padecimientos</label>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="diabetes" value="1" <?php echo ($padec['Diabetes']) ? 'checked' : ""; ?>>
                                <span class="custom-control-label">Diabetes</span>
                            </label>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="hipertension" value="1" <?php echo ($padec['Hipertension']) ? 'checked' : ""; ?>>
                                <span class="custom-control-label">Hipertensión</span>
                            </label>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="alergias" value="1" <?php echo ($padec['Alergias']) ? 'checked' : ""; ?>>
                                <span class="custom-control-label">Alergias</span>
                            </label>
                        </div>
                    </div>

                </div>
            </div>
            <div class="card-footer text-right">
                <input type="text" name="clientId" class="form-control" value="<?php echo $paciente; ?>" hidden />
                <a href="index.php?page=vPacienteList"><button name="btnCancel" class="btn btn-warning">Cancelar</button></a>
                <button type="submit" name="btnActualiza" id="login" class="btn btn-primary">Actualizar</button>
            </div>
            <?php
            $registro = new pacientes();
            $registro->ctrActualiza();
            ?>
        </form>
    </div>

</div>