<div class="page-header">
	<div class="card-options" style="margin-right: 100px;">

		<a class="btn btn-cyan text-gray-dark btn-lg mb-1" href="index.php?page=inicio"><i class="zmdi zmdi-home" style="color:white" title="Volver a Inicio" data-toggle="tooltip"></i></a>&nbsp

		<a class="btn btn-cyan btn-lg mb-1" href="index.php?page=vUserAdd"><i class="fa fa-user-md" data-toggle="tooltip" title="Agregar Nuevo Usuario" data-original-title="fa fa-user-plus"></i></a>&nbsp

		<a class="btn btn-cyan btn-lg mb-1" href="index.php?page=vPacienteAdd"><i class="fa fa-user-plus" data-toggle="tooltip" title="Agregar Nuevo Paciente" data-original-title="fa fa-user-plus"></i></a>&nbsp
		
		<a class="btn btn-cyan btn-lg mb-1" href="index.php?page=vClienteAdd"><i class="fa fa-user" data-toggle="tooltip" title="Agregar Nuevo Cliente" data-original-title="fa fa-user"></i></a>&nbsp

		<a class="btn btn-cyan text-gray-dark btn-lg mb-1" href="index.php?page=vNuevaCita"><i class="fa fa-calendar-plus-o" style="color:white" title="Agendar Nueva Cita" data-toggle="tooltip"></i></a>

	</div>
</div>
<!-- RECARGAR PAGINA -->
<script>
	function autoRefresh() {
		window.location = window.location.href;
	}
	setInterval('autoRefresh()', 30000);
</script>

<div class="row">
	<div class="col-lg-8">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Citas del día</h3>
				<div class="card-options">
					<h2 class="text-dark  mt-0 ">
						<?php
						$registro = new ComunController();
						$registro->cuentasAtendidas("citas");
						?>
					</h2>
				</div>
			</div>
			<div class="card-body">
				<div class="table-responsive border-top mb-0 ">

					<?php
					$medico = "";
					$lista = new CitasController();
					$lista->citasAgendadas($medico);
					?>

				</div>
			</div>
		</div>
	</div>

	<div class="col-lg-4">
		<div class="col-12">
			<div class="card overflow-hidden">
				<div class="card-header">
					<h3 class="card-title">Ingreso del Día</h3>
					<div class="card-options"><a class="btn btn-vk" href="index.php?page=vCorteCaja">Corte Caja</a></div>
				</div>
				<div class="card-body ">
					<h2 class="text-dark  mt-0 ">
						<?php
						echo "$";
						$registro = new ComunController();
						$registro->ingresosDia("ingresos");
						?>
					</h2>
				</div>
			</div>
		</div>
		<div class="col-12">
			<div class="card overflow-hidden">
				<div class="card-header">
					<h3 class="card-title">Ingreso Mensual</h3>
				</div>
				<div class="card-body ">
					<h2 class="text-dark  mt-0 ">
						<?php
						echo "$";
						$registro = new ComunController();
						$registro->sumaIngresos("ingresos");
						?>
					</h2>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<!---------- GRAFICA ---------->
	<div class="col-xl-8 col-lg-12 col-md-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Ingresos Mensuales</h3>
			</div>
			<div class="card-body">
				<div class="chart-wrapper">
					<canvas id="sales-status" class="chart-dropshadow h-280"></canvas>
				</div>
			</div>
		</div>
	</div>
	
	<!---------- ESTADISTICAS DE BARRAS ---------->
	<div class="col-xl-4 col-lg-12 col-md-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Estadísticas de Pacientes</h3>
			</div>
			<div class="card-body">
				<div class="chats-wrap">
					<div class="chat-details p-2">
						<h6 class="mb-0">
							<span class="font-weight-normal">Asistencia</span>
							<span class="float-right p-1">88%</span>
						</h6>
						<div class="progress progress-sm mt-3">
							<div class="progress-bar progress-bar-striped progress-bar-animated bg-success w-85"></div>
						</div>
					</div>
					<div class="chat-details p-2">
						<h6 class="mb-0">
							<span class="font-weight-normal">Mensualidad al día</span>
							<span class="float-right p-1">82%</span>
						</h6>
						<div class="progress progress-sm mt-3">
							<div class="progress-bar progress-bar-striped progress-bar-animated bg-primary w-75"></div>
						</div>
					</div>
					<div class="chat-details p-2">
						<h6 class="mb-0">
							<span class="font-weight-normal">Excellent</span>
							<span class="float-right p-1">89%</span>
						</h6>
						<div class="progress progress-sm mt-3">
							<div class="progress-bar progress-bar-striped progress-bar-animated bg-secondary w-65"></div>
						</div>
					</div>
					<div class="chat-details p-2">
						<h6 class="mb-0">
							<span class="font-weight-normal">Average</span>
							<span class="float-right p-1">40%</span>
						</h6>
						<div class="progress progress-sm mt-3">
							<div class="progress-bar progress-bar-striped progress-bar-animated bg-warning w-80"></div>
						</div>
					</div>
					<div class="chat-details p-2">
						<h6 class="mb-0">
							<span class="font-weight-normal">Unsatisfied</span>
							<span class="float-right p-1">20%</span>
						</h6>
						<div class="progress progress-sm mt-3">
							<div class="progress-bar progress-bar-striped progress-bar-animated bg-info w-80"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
