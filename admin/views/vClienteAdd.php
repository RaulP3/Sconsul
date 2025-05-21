<div class="page-header">
    <div class="card-options" style="margin-right: 100px;">

        <a class="btn btn-cyan text-gray-dark btn-lg mb-1" href="index.php?page=inicio"><i class="zmdi zmdi-home" style="color:white" title="Volver a Inicio" data-toggle="tooltip"></i></a>&nbsp

        <a class="btn btn-cyan btn-lg mb-1" href="index.php?page=vPacienteAdd"><i class="fa fa-user-plus" data-toggle="tooltip" title="Agregar Nuevo Paciente" data-original-title="fa fa-user-plus"></i></a>&nbsp

        <a class="btn btn-cyan btn-lg mb-1" href="index.php?page=vClienteAdd"><i class="fa fa-user" data-toggle="tooltip" title="Agregar Nuevo Cliente" data-original-title="fa fa-user"></i></a>&nbsp

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
                            <label class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="nombre" placeholder="Razón Social" required>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">RFC</label>
                            <input type="text" class="form-control" name="rfc" placeholder="RFC" required>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-5">
                        <div class="form-group">
                            <label class="form-label">Calle</label>
                            <input type="text" class="form-control" name="calle" placeholder="Calle" required>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">No. Ext.</label>
                            <input type="int" class="form-control" name="num_ext" placeholder="Número Exterior" required>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-5">
                        <div class="form-group">
                            <label class="form-label">No. Int.</label>
                            <input type="int" class="form-control" name="num_int" placeholder="Número Interior">
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">Colonia</label>
                            <input type="text" class="form-control" name="colonia" placeholder="Colonia" required>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-5">
                        <div class="form-group">
                            <label class="form-label">Código Postal</label>
                            <input type="text" class="form-control" name="cod_postal" placeholder="Código Postal" data-inputmask="'mask' : '99999'" required>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">Municipio</label>
                            <input type="text" class="form-control" name="municipio" placeholder="Municipio" required>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-5">
                        <div class="form-group">
                            <label class="form-label">Estado</label>
                            <input type="text" class="form-control" name="estado" placeholder="Estado" required>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">País</label>
                            <input type="text" class="form-control" name="pais" placeholder="País" required>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-5">
                        <div class="form-group">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Email">
                        </div>
                    </div>
                    


                    <div class="card-footer text-right">
                        <button type="submit" id="login" class="btn btn-primary">Registrar</button>
                    </div>
                    <?php
                    $registro = new pacientes();
                    $registro->ctrRegistra();
                    ?>
        </form>
    </div>

</div>