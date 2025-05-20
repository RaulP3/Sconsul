<?php
	$cajero = $_SESSION['id'];
?>

<div class="page-header">
    <div class="card-options" style="margin-right: 100px;">

        

    </div>
</div>


<div class="row ">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Corte de Caja</h3>
				<div class="card-options">
				<a class="btn btn-cyan btn-lg" href="index.php?page=inicio"><i class="zmdi zmdi-home" title="Volver a Inicio" data-toggle="tooltip"></i></a>&nbsp;&nbsp;
					<button type="button" class="btn btn-cyan" onclick="javascript:window.print();"><i class="icon icon-printer"></i> Imprimir</button>
				</div>
			</div>
			<div class="card-body">
				<div class="row ">
					<div class="col-lg-6 ">
						<p class="h3">Cajero</p>
						<?php
							$datosCajero = CitasController::datosCajero($cajero); 
						?>
					</div>
					<div class="col-lg-6 text-right">
						<p class="h3"></p>
						<!-- <address>
							Street Address<br>
							State, City<br>
							Region, Postal Code<br>
							ctr@example.com
						</address> -->
					</div>
				</div>

				<div class=" text-dark">
					<p class="mb-1 mt-5"><span class="font-weight-semibold">Fecha de Corte :</span> <?php echo date("d-m-Y"); ?></p>
				</div>
				<div class="table-responsive push">
					<?php
						$corte = CitasController::corteCaja($cajero);
					?>
				</div>
				<!-- <p class="text-muted text-center">Thank you very much for doing business with us. We look forward to working with you again!</p> -->
			</div>
		</div>
	</div>
</div>



