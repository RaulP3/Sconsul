<?php

$usuario = $_GET["idEditar"];
$busca = mdlUsuarios::mdlBusca($usuario, "usuarios");

?>

<div class="page-header">
    <h4 class="page-title">Actualizar Informacion de Usuario</h4>
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
                            <input type="text" class="form-control" name="nombres" placeholder="Juan" value="<?php echo $busca['nombres']; ?>" required>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">Apellidos</label>
                            <input type="text" class="form-control" name="apellidos" placeholder="Perez García" required value="<?php echo $busca['apellidos']; ?>">
                        </div>
                    </div>

                    <!-- <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Fecha de Nacimiento</label>
                            <input class="form-control fc-datepicker" placeholder="MM/DD/YYYY" type="text" name="fechaNac" value="<?php echo $busca['fechaNac']; ?>">
                        </div>
                    </div> -->

                    <?php
                    $fechaN = $busca['fechaNac'];

                    ?>

                    <div class="col-sm-12 col-md-6">
                        <div class="form-group m-0">
                            <label class="form-label" style="margin-left:1px">Fecha</label>
                            <div class="row gutters-xs">
                                <?php
                                $fecha = CitasController::fechaAdd($fechaN);
                                ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Teléfono</label>
                            <input type="text" class="form-control" name="telefono" placeholder="6141234455" value="<?php echo $busca['telefono']; ?>">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Permisos en el sistema</label>
                            <select class="form-control custom-select select2" name="permisos">
                                <option value="asistente" <?php echo ($busca['permisos'] == "asistente") ? 'selected' : ""; ?>>Asistente</option>
                                <option value="medico" <?php echo ($busca['permisos'] == "medico") ? 'selected' : ""; ?>>Médico</option>
                                <option value="admin" <?php echo ($busca['permisos'] == "admin") ? 'selected' : ""; ?>>Administrador</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Email" required value="<?php echo $busca['email']; ?>">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Password</label>
                            <input type="text" name="password" class="form-control" id="password" placeholder="Solo si quiere cambiar">
                            <input type="text" name="pswd" class="form-control" id="password" value="<?php echo $busca['password']; ?>" hidden>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Costo Consulta $</label>
                            <input type="text" name="costoConsulta" placeholder="Sólo si es médico" class="form-control" value="<?php echo $busca['costoConsulta']; ?>">
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <div class="form-label">Activar Usuario</div>
                            <label class="custom-switch">
                                <input type="checkbox" name="estado" class="custom-switch-input" <?php echo ($busca['estado']) ? 'checked' : ""; ?>>
                                <span class="custom-switch-indicator"></span>
                                <span class="custom-switch-description">Acceso al sistema</span>
                            </label>
                        </div>
                    </div>

                </div>

            </div>
            <div class="card-footer text-right">
                <input type="text" name="userId" class="form-control" value="<?php echo $usuario; ?>" hidden />

                <button type="submit" name="btnCancel" class="btn btn-warning">Cancelar</button></a>
                <button type="submit" name="btnActualiza" id="login" class="btn btn-primary">Actualizar</button>
            </div>
            <?php
            $registro = new usuarios();
            $registro->ctrActualiza();
            ?>
        </form>
    </div>

</div>