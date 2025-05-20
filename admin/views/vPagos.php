<?php

    $cita = $_GET["idCobrar"];
	$cajero = $_SESSION["id"];
    $citaCobrar = CitasModel::buscaCitaPago($cita);

	$original_date = $citaCobrar["fecha"];
	$timestamp = strtotime($original_date);
	$fecha = date("M-d", $timestamp);
?>
<div class="page-header">
    <div class="card-options" style="margin-right: 100px;">

        <a class="btn btn-cyan text-gray-dark btn-lg mb-1" href="index.php?page=inicio"><i class="zmdi zmdi-home" style="color:white" title="Volver a Inicio" data-toggle="tooltip"></i></a>

    </div>
</div>
<div class="row">
	<div class="col-lg-8">
		<h2 class="text-center">Pagos <br><br></h2>
	</div>
	<div class="col-lg-4">
		<h2 class="text-center"></h2>
	</div>

	<div class="col-lg-4">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Cómo será el Pago ?</h3>
			</div>
			<div class="card-body">
				<button type="button" class="btn btn-gray btn-block" onclick="metodoPago('efectivo')" id="efectivo"><i class="fa fa-money mr-2"></i>&nbsp; Efectivo</button>
				<button type="button" class="btn btn-gray btn-block" onclick="metodoPago('tarjeta')" id="tarjeta"><i class="fa fa-credit-card-alt mr-2"></i>&nbsp; Tarjeta</button>
				<button type="button" class="btn btn-gray btn-block" onclick="metodoPago('otro')" id="otro"><i class="fa fa-usd mr-2"></i>&nbsp; Otro</button>
			</div>
		</div>
	</div>
	<div class="col-lg-5">
		<div class="col-12">
			<div class="card overflow-hidden">
				<form method="POST">
				<div class="card-header">
				
					<div class="card-options"> <h1 class="text-blue">$ <?php echo $citaCobrar["costo"]; ?> </h1> </div>
				</div>
				<div class="card-body ">
					<div class="item3-medias">
						<div class="media meida-md mt-0 pb-2">
							<div class="media-left">
								<a href="#">
									<img class="media-object mr-2 br-2" src="../assets/images/faces/5.jpg" alt="media1">
								</a>
							</div>
							<div class="media-body">
								<h6 class="media-heading font-weight-bold text-uppercase"><?php echo $citaCobrar["paciente"]; ?></h6>
								<ul class="mb-0 item3-lists d-flex">
									<li>
										<a href=""><i class="fa fa-stethoscope"></i> <?php echo $citaCobrar["medico"]; ?></a>
									</li>
									<li>
										<a href=""><i class="icon icon-calendar"></i> <?php echo $fecha; ?></a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="card-footer">
					<input type="text" name="idCita" value="<?php echo $cita; ?>" hidden>
					<input type="text" name="cantidad" value="<?php echo $citaCobrar["costo"]; ?>" hidden>
					<input type="text" name="metodoPago" id="metodoPago" hidden>
					<input type="text" name="cajeroId" value="<?php echo $cajero; ?>" hidden>

					<button type="submit" class="btn btn-vk btn-block" id="btnLiquidar" name="btnLiquidar" disabled>Liquidar</button>
				</div>
				</form>

				<?php
					$registro = new CitasController();
					$registro -> registraPago();
				?>

			</div>
		</div>
	</div>
</div>



<script>
    function metodoPago(metodo) {
		const cajaMetodoPago = document.querySelector("#metodoPago");
		const btnLiquidar = document.querySelector("#btnLiquidar");
		const btnEfectivo = document.querySelector("#efectivo");
		const btnTarjeta = document.querySelector("#tarjeta");
		const btnOtro = document.querySelector("#otro");

		btnEfectivo.className = "btn btn-gray btn-block";
		btnTarjeta.className = "btn btn-gray btn-block";
		btnOtro.className = "btn btn-gray btn-block";

		const btn = document.querySelector("#"+metodo);
		btn.className = "btn btn-vk btn-block";
		cajaMetodoPago.value = metodo;
		btnLiquidar.disabled = false;

    }
</script>