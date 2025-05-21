<?php
setlocale(LC_ALL, "es_ES");
session_start();
if (isset($_SESSION["nombre"])) {
	$permisos = $_SESSION["permisos"];
} else {
	echo '<script>window.location="../";</script>';
}

$pagina = isset($_GET["page"]) ? $pagina = $_GET["page"] : $pagina = "";

?>
<!doctype html>
<html lang="en" dir="ltr">

<head>
	<meta charset="UTF-8">
	<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="keywords" content="">
	<meta charset="utf-8">

	<link rel="icon" href="favicon.ico" type="image/x-icon" />
	<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />


	<!-- Title -->
	<title>Consultorio | Asistente</title>
	<link rel="stylesheet" href="../assets/fonts/fonts/font-awesome.min.css">

	<!-- Bootstrap Css -->
	<link href="../assets/plugins/bootstrap-4.3.1-dist/css/bootstrap.min.css" rel="stylesheet" />

	<!-- Sidemenu Css -->
	<link href="../assets/css/sidemenu.css" rel="stylesheet" />

	<!-- Dashboard Css -->
	<link href="../assets/css/style.css" rel="stylesheet" />
	<link href="../assets/css/admin-custom.css" rel="stylesheet" />

	<!-- c3.js Charts Plugin -->
	<!-- <link href="../assets/plugins/charts-c3/c3-chart.css" rel="stylesheet" /> -->

	<!-- select2 Plugin -->
	<link href="../assets/plugins/select2/select2.min.css" rel="stylesheet" />

	<!-- Time picker Plugin -->
	<!-- <link href="../assets/plugins/time-picker/jquery.timepicker.css" rel="stylesheet" /> -->

	<!-- Date Picker Plugin -->
	<!-- <link href="../assets/plugins/date-picker/spectrum.css" rel="stylesheet" /> -->

	<!-- p-scroll bar css-->
	<link href="../assets/plugins/pscrollbar/pscrollbar.css" rel="stylesheet" />

	<!-- file Uploads -->
	<link href="../assets/plugins/fileuploads/css/dropify.css" rel="stylesheet" type="text/css" />

	<!---Font icons-->
	<link href="../assets/css/icons.css" rel="stylesheet" />
	<!-- Sweet Alert 2 -->
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	<!-- Data table css para la tabla de clientes -->
	<link href="../assets/plugins/datatable/dataTables.bootstrap4.min.css" rel="stylesheet" />
	<link href="../assets/plugins/datatable/jquery.dataTables.min.css" rel="stylesheet" />

</head>

<body class="app sidebar-mini">

	<div class="page">
		<div class="page-main  h-100">
			<div class="app-header1 header py-1 d-flex">
				<div class="container-fluid">
					<div class="d-flex">
						<a class="header-brand" href="index.php?page=inicio">
							<img src="../assets/images/brand/logo.png" width="65" height="65" alt="Business logo">
						</a>

					  <!-- CABECERA DE PANTALLA --> 
						<div class="d-flex order-lg-2 ml-auto">
							<!-- FULLSCREEN -->
							<!-- <div class="dropdown d-none d-md-flex" >
									<a  class="nav-link icon full-screen-link">
										<i class="fe fe-maximize-2"  id="fullscreen-button"></i>
									</a>
								</div> -->
							<!-- NOTIFICACIONES CAMPANA -->
							<!-- <div class="dropdown d-none d-md-flex">
									<a class="nav-link icon" data-toggle="dropdown">
										<i class="fa fa-bell-o"></i>
										<span class=" nav-unread badge badge-danger  badge-pill">4</span>
									</a>
									<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
										<a href="#" class="dropdown-item text-center">You have 4 notification</a>
										<div class="dropdown-divider"></div>
										<a href="#" class="dropdown-item d-flex pb-3">
											<div class="notifyimg">
												<i class="fa fa-envelope-o"></i>
											</div>
											<div>
												<strong>2 new Messages</strong>
												<div class="small text-muted">17:50 Pm</div>
											</div>
										</a>
										<a href="#" class="dropdown-item d-flex pb-3">
											<div class="notifyimg">
												<i class="fa fa-calendar"></i>
											</div>
											<div>
												<strong> 1 Event Soon</strong>
												<div class="small text-muted">19-10-2019</div>
											</div>
										</a>
										<a href="#" class="dropdown-item d-flex pb-3">
											<div class="notifyimg">
												<i class="fa fa-comment-o"></i>
											</div>
											<div>
												<strong> 3 new Comments</strong>
												<div class="small text-muted">05:34 Am</div>
											</div>
										</a>
										<a href="#" class="dropdown-item d-flex pb-3">
											<div class="notifyimg">
												<i class="fa fa-exclamation-triangle"></i>
											</div>
											<div>
												<strong> Application Error</strong>
												<div class="small text-muted">13:45 Pm</div>
											</div>
										</a>
										<div class="dropdown-divider"></div>
										<a href="#" class="dropdown-item text-center">See all Notification</a>
									</div>
								</div> -->
							<!-- NOTIFICACIONES CORREO -->
							<!-- <div class="dropdown d-none d-md-flex">
									<a class="nav-link icon" data-toggle="dropdown">
										<i class="fa fa-envelope-o"></i>
										<span class=" nav-unread badge badge-warning  badge-pill">3</span>
									</a>
									<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
										<a href="#" class="dropdown-item d-flex pb-3">
											<img src="../assets/images/faces/male/41.jpg" alt="avatar-img" class="avatar brround mr-3 align-self-center">
											<div>
												<strong>Blake</strong> I've finished it! See you so.......
												<div class="small text-muted">30 mins ago</div>
											</div>
										</a>
										<a href="#" class="dropdown-item d-flex pb-3">
											<img src="../assets/images/faces/female/1.jpg" alt="avatar-img" class="avatar brround mr-3 align-self-center">
											<div>
												<strong>Caroline</strong> Just see the my Admin....
												<div class="small text-muted">12 mins ago</div>
											</div>
										</a>
										<a href="#" class="dropdown-item d-flex pb-3">
											<img src="../assets/images/faces/male/18.jpg" alt="avatar-img" class="avatar brround mr-3 align-self-center">
											<div>
												<strong>Jonathan</strong> Hi! I'am singer......
												<div class="small text-muted">1 hour ago</div>
											</div>
										</a>
										<a href="#" class="dropdown-item d-flex pb-3">
											<img src="../assets/images/faces/female/18.jpg" alt="avatar-img" class="avatar brround mr-3 align-self-center">
											<div>
												<strong>Emily</strong> Just a reminder that you have.....
												<div class="small text-muted">45 mins ago</div>
											</div>
										</a>
										<div class="dropdown-divider"></div>
										<a href="#" class="dropdown-item text-center">View all Messages</a>
									</div>
								</div> -->
							<!-- APPS & SETTINGS -->
							<!-- <div class="dropdown d-none d-md-flex">
									<a class="nav-link icon" data-toggle="dropdown">
										<i class="fe fe-grid"></i>
									</a>
									<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow  app-selector">
										<ul class="drop-icon-wrap">
											<li>
												<a href="#" class="drop-icon-item">
													<i class="icon icon-speech text-dark"></i>
													<span class="block"> E-mail</span>
												</a>
											</li>
											<li>
												<a href="#" class="drop-icon-item">
													<i class="icon icon-map text-dark"></i>
													<span class="block">map</span>
												</a>
											</li>

											<li>
												<a href="#" class="drop-icon-item">
													<i class="icon icon-bubbles text-dark"></i>
													<span class="block">Messages</span>
												</a>
											</li>
											<li>
												<a href="#" class="drop-icon-item">
													<i class="icon icon-user-follow text-dark"></i>
													<span class="block">Followers</span>
												</a>
											</li>
											<li>
												<a href="#" class="drop-icon-item">
													<i class="icon icon-picture text-dark"></i>
													<span class="block">Photos</span>
												</a>
											</li>
											<li>
												<a href="#" class="drop-icon-item">
													<i class="icon icon-settings text-dark"></i>
													<span class="block">Settings</span>
												</a>
											</li>
										</ul>
										<div class="dropdown-divider"></div>
										<a href="#" class="dropdown-item text-center">View all</a>
									</div>
								</div> -->
							<!-- FOTO DE PERFIL -->
							<div class="dropdown ">
								<a href="#" class="nav-link pr-0 leading-none user-img" data-toggle="dropdown">
									<img src="../assets/images/faces/1.jpg" alt="profile-img" class="avatar avatar-md brround">
								</a>
								<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow ">
									<!-- <a class="dropdown-item" href="index.php?page=vUserEdit&idEditar=<?php //echo $_SESSION["id"] ?>">
										<i class="dropdown-icon icon icon-user"></i> Mis Datos
									</a> -->
									<a class="dropdown-item" href="index.php?page=logOut">
										<i class="dropdown-icon icon icon-power"></i> Log out
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>


			<!-- Sidebar menu-->
			<div class="app-content  my-3 my-md-5">
				<div class="side-app">

					<?php
					include "whiteList.php";
					?>

				</div>
			</div>
		</div>

		<!--footer-->
		<footer class="footer">
			<div class="container">
				<div class="row align-items-center flex-row-reverse">
					<div class="col-md-12 col-sm-12 mt-3 mt-lg-0 text-center">
						Copyright © <?php echo date('Y'); ?> <a href="https://u3digital.com.mx">U3 Digital</a>. All rights reserved.
					</div>
				</div>
			</div>
		</footer>
		<!-- End Footer-->
	</div>

	<!-- Back to top -->
	<a href="#top" id="back-to-top"><i class="fa fa-rocket"></i></a>

	<!-- Dashboard Css -->
	<script src="../assets/js/vendors/jquery-3.2.1.min.js"></script>
	<script src="../assets/plugins/bootstrap-4.3.1-dist/js/popper.min.js"></script>
	<script src="../assets/plugins/bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
	<script src="../assets/js/vendors/jquery.sparkline.min.js"></script>
	<script src="../assets/js/vendors/selectize.min.js"></script>
	<script src="../assets/js/vendors/jquery.tablesorter.min.js"></script>
	<script src="../assets/js/vendors/circle-progress.min.js"></script>
	<script src="../assets/plugins/rating/jquery.rating-stars.js"></script>

	<!-- Fullside-menu Js-->
	<script src="../assets/plugins/toggle-sidebar/sidemenu.js"></script>

	<!--Select2 js -->
	<script src="../assets/plugins/select2/select2.full.min.js"></script>

	<!-- Timepicker js -->
	<script src="../assets/plugins/time-picker/jquery.timepicker.js"></script>
	<script src="../assets/plugins/time-picker/toggles.min.js"></script>

	<!-- Datepicker js -->
	<script src="../assets/plugins/date-picker/spectrum.js"></script>
	<script src="../assets/plugins/date-picker/jquery-ui.js"></script>
	<script src="../assets/plugins/input-mask/jquery.maskedinput.js"></script>

	<!-- Inline js -->
	<script src="../assets/js/select2.js"></script>
	<script src="../assets/js/formelements.js"></script>

	<!-- file uploads js -->
	<script src="../assets/plugins/fileuploads/js/dropify.js"></script>

	<!--InputMask Js-->
	<script src="../assets/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js"></script>

	<!-- p-scroll bar Js-->
	<script src="../assets/plugins/pscrollbar/pscrollbar.js"></script>
	<script src="../assets/plugins/pscrollbar/pscroll.js"></script>

	<!-- Custom Js-->
	<script src="../assets/js/admin-custom.js"></script>

	<!-- Data tables -->
	<script src="../assets/plugins/datatable/jquery.dataTables.min.js"></script>
	<script src="../assets/plugins/datatable/dataTables.bootstrap4.min.js"></script>
	<script src="../assets/js/datatable.js"></script>

	<!-- ECharts Plugin -->
	<script src="../assets/plugins/echarts/echarts.js"></script>
	<script src="../assets/plugins/echarts/echarts.js"></script>


	<script>
		$(function(e) {
			'use strict'


			/* chartjs (#sales-status) */

			var ctx = $('#sales-status');
			ctx.height(310);
			var myChart = new Chart(ctx, {
				type: 'line',
				data: {
					labels: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
					type: 'line',
					datasets: [{
							label: "Mensualidades",
							data: [20000, 25000, 38000, 42000, 65000, 74000, 66000, 58500, 69000, 75600, 58400, 78000],
							backgroundColor: 'transparent',
							borderColor: '#ec296b ',
							borderWidth: 3,
							pointStyle: 'circle',
							pointRadius: 5,
							pointBorderColor: 'transparent',
							pointBackgroundColor: '#ec296b',
						}
						//  {
						// 	label: "Productos",
						// 	data: [25000, 32000, 26000, 41000, 69000, 76000, 38000, 42500, 63000, 72400, 58620, 96000],
						// 	backgroundColor: 'transparent',
						// 	borderColor: '#4801ff',
						// 	borderWidth: 3,
						// 	pointStyle: 'circle',
						// 	pointRadius: 5,
						// 	pointBorderColor: 'transparent',
						// 	pointBackgroundColor: '#4801ff',
						// }
					]
				},
				options: {
					responsive: true,
					maintainAspectRatio: false,
					tooltips: {
						mode: 'index',
						titleFontSize: 12,
						titleFontColor: '#000',
						bodyFontColor: '#000',
						backgroundColor: '#fff',
						cornerRadius: 3,
						intersect: false,
					},
					legend: {
						display: true,
						labels: {
							usePointStyle: false,
						},
					},
					scales: {
						xAxes: [{
							ticks: {
								fontColor: "#605e7e",
							},
							display: true,
							gridLines: {
								display: true,
								color: 'rgba(96, 94, 126, 0.1)',
								drawBorder: false
							},
							scaleLabel: {
								display: false,
								labelString: 'Month',
								fontColor: 'transparent'
							}
						}],
						yAxes: [{
							ticks: {
								fontColor: "#605e7e",
							},
							display: true,
							gridLines: {
								display: true,
								color: 'rgba(96, 94, 126, 0.1)',
								drawBorder: false
							},
							scaleLabel: {
								display: false,
								labelString: 'sales',
								fontColor: 'transparent'
							}
						}]
					},
					title: {
						display: false,
						text: 'Normal Legend'
					}
				}
			});
			/* chartjs (#sales-status) closed */

		});
	</script>

	<!-- CHARTJS CHART -->
	<script src="../assets/plugins/chart/Chart.bundle.js"></script>
	<script src="../assets/plugins/chart/utils.js"></script>
</body>

</html>