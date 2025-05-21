<div class="page-header">
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
                <h3 class="card-title">Nueva Cita </h3>
                <div class="card-options">
                    <h3 id="labelCosto">$ </h3>
                </div>

            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">Paciente</label>
                            <select class="form-control" name="paciente" required>
                                <?php ComunController::selectNombreCompleto("pacientes"); ?>
                            </select>
                            <!-- <input type="text" class="form-control" name="nombres" placeholder="Juan" > -->
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">Médico</label>
                            <select class="form-control" name="medico" id="medico" required onchange="asignaPrecio(this)">
                                <option value="">-- Seleccione --</option>
                                <?php ComunController::selectMedicoCosto("usuarios"); ?>
                            </select>
                            <input type="text" class="form-control" name="costo" id="costo" hidden>
                            <input type="text" class="form-control" name="responsable" value="<?php echo $_SESSION["id"]; ?>" hidden>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-6">
                        <div class="form-group m-0">
                            <label class="form-label" style="margin-left:1px">Fecha</label>
                            <div class="row gutters-xs">
                                <?php
                                $fechaN="";
                                $fecha = CitasController::fechaAdd($fechaN);
                                ?>
                            </div>
                        </div>
                    </div>

                    <?php
                    $hora = CitasController::horario();
                    ?>

                </div>
            </div>
            <div class="card-footer text-right">
                <button type="submit" name="btnRegistrar" id="login" class="btn btn-primary">Registrar</button>
            </div>
            <?php
            $registro = new CitasController();
            $registro->registraCita();
            ?>
        </form>
    </div>

</div>

<script>
    function asignaPrecio(medico) {
        let select = document.querySelector("#medico");
        var costo = select.options[select.selectedIndex].getAttribute('costo-consulta');
        const cajaCosto = document.querySelector("#costo");
        labelCosto = document.querySelector("#labelCosto");
        if (costo === null) costo = 0;
        cajaCosto.value = costo;
        labelCosto.innerHTML = "$ " + costo;
    }
</script>