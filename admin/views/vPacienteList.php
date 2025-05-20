<div class="page-header">
    <div class="card-options" style="margin-right: 100px;">

        <a class="btn btn-cyan text-gray-dark btn-lg mb-1" href="index.php?page=inicio"><i class="zmdi zmdi-home" style="color:white" title="Volver a Inicio" data-toggle="tooltip"></i></a>&nbsp

        <a class="btn btn-cyan btn-lg mb-1" href="index.php?page=vPacienteAdd"><i class="fa fa-user-plus" data-toggle="tooltip" title="Agregar Nuevo Paciente" data-original-title="fa fa-user-plus"></i></a>&nbsp

        <a class="btn btn-cyan text-gray-dark btn-lg mb-1" href="index.php?page=vNuevaCita"><i class="fa fa-calendar-plus-o" style="color:white" title="Agendar Nueva Cita" data-toggle="tooltip"></i></a>

    </div>
</div>
<div class="col-md-12 col-lg-12">
	<div class="card">
		<div class="card-header">
			<div class="card-title">Pacientes Registrados</div>

		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table id="example2" class="hover table-bordered border-top-0 border-bottom-0" style="text-align: center;">
					<thead>
						<td>Nombre</td>
						<td>Teléfono</td>
						<td>Email</td>
						<td>Ultima Cita</td>
						<td>Fecha de Nacimiento</td>
						<td>Opciones</td>
					</thead>
					<tbody>
						<?php
							$lista = new Pacientes();
							$lista -> ctrListaPaciente();
							$lista -> ctrBorrarPaciente();
						?>
						
					</tbody>
					<tfoot>
						<tr>
						<td>Nombre</td>
						<td>Teléfono</td>
						<td>Email</td>
						<td>Ultima Cita</td>
						<td>Fecha de Nacimiento</td>
						<td>Opciones</td>
						</tr>
					</tfoot>
				</table>

			</div>
		</div>
	</div>
</div>