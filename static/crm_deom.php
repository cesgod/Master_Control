<?php
	session_start();
	#ini_set('memory_limit','512M');


?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

	<title>:: CLYFSA :: DASHBOARD | CRM DEOM</title>

	<link href="css/app.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/datetime/1.1.2/css/dataTables.dateTime.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



</head>

<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="crm_dash.php">
          <span class="align-middle">CLYFSA</span>
        </a>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Map
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="crm_dash.php">
			              <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
			            </a>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="crm_astec.php">
			              <i class="align-middle" data-feather="activity"></i> <span class="align-middle">ASTEC</span>
			            </a>
					</li>

					<li class="sidebar-item active">
						<a class="sidebar-link" href="crm_deom.php">
			              <i class="align-middle" data-feather="activity"></i> <span class="align-middle">DEOM</span>
			            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="crm_deprop.php">
			              <i class="align-middle" data-feather="activity"></i> <span class="align-middle">DEPROP</span>
			            </a>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="index.php">
			              <i class="align-middle" data-feather="alert-triangle"></i> <span class="align-middle">PD's</span>
			            </a>
					</li>
					
				</ul>

				
			</div>
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle d-flex">
          			<i class="hamburger align-self-center"></i>
        		</a>

				
				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-toggle="dropdown">
			                	<img src="img/avatars/avatar.jpg" class="avatar img-fluid rounded mr-1" alt="Charles Hall" /> <span class="text-dark"><?php #echo $_SESSION['username']; ?></span>
			              	</a>
							<div class="dropdown-menu dropdown-menu-right">
								<a class="dropdown-item" href="../src/php/logout.php">Log out</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>

			<main class="content">
				<div class="container-fluid p-0">

					<div class="row mb-2 mb-xl-3">
						<div class="col-auto d-none d-sm-block">
							<h3><strong>CRM </strong> DEOM</h3>
						</div>

						<div class="col-auto ml-auto text-right mt-n1">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
									<li class="breadcrumb-item"><a href="#">CLYFSA</a></li>
									<li class="breadcrumb-item"><a href="#">Dashboards</a></li>
									<li class="breadcrumb-item active" aria-current="page">CRM DEOM</li>
								</ol>
							</nav>
						</div>
					</div>
					<!--<div class="row">
						<div class="col-xl-6 col-xxl-5 d-flex">
							<div class="w-100">
								<div class="row">
									<div class="col-sm-6">
										<div class="card">
											<div class="card-body">
												<h5 class="card-title mb-4">Sales</h5>
												<h1 class="mt-1 mb-3">2.382</h1>
												<div class="mb-1">
													<span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -3.65% </span>
													<span class="text-muted">Since last week</span>
												</div>
											</div>
										</div>
										<div class="card">
											<div class="card-body">
												<h5 class="card-title mb-4">Visitors</h5>
												<h1 class="mt-1 mb-3">14.212</h1>
												<div class="mb-1">
													<span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> 5.25% </span>
													<span class="text-muted">Since last week</span>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="card">
											<div class="card-body">
												<h5 class="card-title mb-4">Earnings</h5>
												<h1 class="mt-1 mb-3">$21.300</h1>
												<div class="mb-1">
													<span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> 6.65% </span>
													<span class="text-muted">Since last week</span>
												</div>
											</div>
										</div>
										<div class="card">
											<div class="card-body">
												<h5 class="card-title mb-4">Orders</h5>
												<h1 class="mt-1 mb-3">64</h1>
												<div class="mb-1">
													<span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -2.25% </span>
													<span class="text-muted">Since last week</span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-xl-6 col-xxl-7">
							<div class="card flex-fill w-100">
								<div class="card-header">

									<h5 class="card-title mb-0">Recent Movement</h5>
								</div>
								<div class="card-body py-3">
									<div class="chart chart-sm">
										<canvas id="chartjs-dashboard-line"></canvas>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-12 col-md-6 col-xxl-3 d-flex order-2 order-xxl-3">
							<div class="card flex-fill w-100">
								<div class="card-header">

									<h5 class="card-title mb-0">Browser Usage</h5>
								</div>
								<div class="card-body d-flex">
									<div class="align-self-center w-100">
										<div class="py-3">
											<div class="chart chart-xs">
												<canvas id="chartjs-dashboard-pie"></canvas>
											</div>
										</div>

										<table class="table mb-0">
											<tbody>
												<tr>
													<td>Chrome</td>
													<td class="text-right">4306</td>
												</tr>
												<tr>
													<td>Firefox</td>
													<td class="text-right">3801</td>
												</tr>
												<tr>
													<td>IE</td>
													<td class="text-right">1689</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
						<div class="col-12 col-md-12 col-xxl-6 d-flex order-3 order-xxl-2">
							<div class="card flex-fill w-100">
								<div class="card-header">

									<h5 class="card-title mb-0">Real-Time</h5>
								</div>
								<div class="card-body px-4">
									<div id="world_map" style="height:350px;"></div>
								</div>
							</div>
						</div>
						<div class="col-12 col-md-6 col-xxl-3 d-flex order-1 order-xxl-1">
							<div class="card flex-fill">
								<div class="card-header">

									<h5 class="card-title mb-0">Calendar</h5>
								</div>
								<div class="card-body d-flex">
									<div class="align-self-center w-100">
										<div class="chart">
											<div id="datetimepicker-dashboard"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>-->

					<div class="row">
						<div class="col-12 col-lg-12 col-xxl-12 d-flex">
							<div class="card flex-fill">
								<div class="card-header">

									<h5 class="card-title mb-0">Ultimos Projectos</h5>
								</div>
								<table border="0" cellspacing="5" cellpadding="5">
							        <tbody><tr>
							            <td>Minimum date:</td>
							            <td><input type="text" id="min" name="min"></td>
							        </tr>
							        <tr>
							            <td>Maximum date:</td>
							            <td><input type="text" id="max" name="max"></td>
							        </tr>
							    </tbody></table>
								<table class="table table-hover my-0" id="table_id">
									<thead>
										<tr>
											<th class="d-none d-xl-table-cell">ITEM</th>
											<th class="d-none d-xl-table-cell">ODT_N</th>
											<th class="d-none d-xl-table-cell">PLANO_N</th>
											<th class="d-none d-xl-table-cell">FECHA_INICIO</th>
											<th class="d-none d-xl-table-cell">FECHA_CULMINACION</th>
											<th class="d-none d-xl-table-cell">EJECUTADO_POR</th>
											<th class="d-none d-xl-table-cell">TRABAJO_REALIZADO</th>
											<th class="d-none d-xl-table-cell">DESCRIPCION_DEL_TRABAJO</th>
											<th class="d-none d-xl-table-cell">DIRECCION</th>
											<th class="d-none d-xl-table-cell">SOLICITANTE</th>
											<th class="d-none d-xl-table-cell">N_DE_OFERTA</th>
											<th class="d-none d-xl-table-cell">MODALIDAD</th>
											<th class="d-none d-xl-table-cell">N_DE_FACTURA</th>
											<th class="d-none d-xl-table-cell">ESTADO</th>
											<th class="d-none d-xl-table-cell">HHP</th>
											<th class="d-none d-xl-table-cell">ELABORADO POR</th>
											<th class="d-none d-xl-table-cell">AL DESN MM2</th>
											<th class="d-none d-xl-table-cell">M DE CONDUCTOR</th>
											<th class="d-none d-xl-table-cell">PREENS MM2</th>
											<th class="d-none d-xl-table-cell">M DE CONDUCTOR</th>
											<th class="d-none d-xl-table-cell">MDLC BT MONOF</th>
											<th class="d-none d-xl-table-cell">MDLC BT TRIF</th>
											<th class="d-none d-xl-table-cell">MDLC MT MONOF</th>
											<th class="d-none d-xl-table-cell">MDLC MT TRIF</th>
											<th class="d-none d-xl-table-cell">AP I VM250</th>
											<th class="d-none d-xl-table-cell">AP I VS250</th>
											<th class="d-none d-xl-table-cell">AP I LED</th>
											<th class="d-none d-xl-table-cell">AP I VS400</th>
											<th class="d-none d-xl-table-cell">EN PODER DE</th>                                         
										</tr>
									</thead>
									<tbody>
										<?php 
										include 'conexion.php';
										$db_n = "crm_clyfsa";
										$conexion = new mysqli($host_db, $user_db, $pass_db, $db_n);
										if ($conexion->connect_error) {
										 die("La conexion falló: " . $conexion->connect_error);
										}
										$data = array();
										$values = mysqli_query($conexion, "SELECT * FROM deom ");
										while ($fila = $values->fetch_assoc()) {
										    $data[] = $fila;
										}
										#echo "<br>Data: ";echo "<pre>"; ;print_r($data);echo "</pre>";
										#die();
										 ?>
										 <?php
                                                $lim =  count($data);
                                                $lim1 =  count($data[0]);
                                                #echo $lim1;
                                                for($i=0; $i<$lim; $i++ ){
                                                    echo "<tr>";
                                                    foreach ($data[$i] as $value){
                                                        echo " <td>".$value."</td>";
                                                    }
                                                    #for($j=0; $j<$lim1; $j++ ){
                                                    #        echo " <td>".$tabled[$i][$j]."</td>";
                                                    #    
                                                    #}     

                                                    echo "</tr>";
                                                }
                                               
                                            ?>
										
									</tbody>
								</table>
							</div>
						</div>
						<!--<div class="col-12 col-lg-4 col-xxl-3 d-flex">
							<div class="card flex-fill w-100">
								<div class="card-header">

									<h5 class="card-title mb-0">Monthly Sales</h5>
								</div>
								<div class="card-body d-flex w-100">
									<div class="align-self-center chart chart-lg">
										<canvas id="chartjs-dashboard-bar"></canvas>
									</div>
								</div>
							</div>
						</div>-->
					</div>

				</div>
			</main>

			<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-left">
							<p class="mb-0">
								<a href="index.html" class="text-muted"><strong>CLYFSA</strong></a> &copy;
							</p>
						</div>
						<div class="col-6 text-right">
							<ul class="list-inline">
								<li class="list-inline-item">
									<a class="text-muted" href="#">Support</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="#">Help Center</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="#">Privacy</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="#">Terms</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>

	<script src="js/app.js"></script>
<!--
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			var ctx = document.getElementById("chartjs-dashboard-line").getContext("2d");
			var gradient = ctx.createLinearGradient(0, 0, 0, 225);
			gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
			gradient.addColorStop(1, "rgba(215, 227, 244, 0)");
			// Line chart
			new Chart(document.getElementById("chartjs-dashboard-line"), {
				type: "line",
				data: {
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
					datasets: [{
						label: "Sales ($)",
						fill: true,
						backgroundColor: gradient,
						borderColor: window.theme.primary,
						data: [
							2115,
							1562,
							1584,
							1892,
							1587,
							1923,
							2566,
							2448,
							2805,
							3438,
							2917,
							3327
						]
					}]
				},
				options: {
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					tooltips: {
						intersect: false
					},
					hover: {
						intersect: true
					},
					plugins: {
						filler: {
							propagate: false
						}
					},
					scales: {
						xAxes: [{
							reverse: true,
							gridLines: {
								color: "rgba(0,0,0,0.0)"
							}
						}],
						yAxes: [{
							ticks: {
								stepSize: 1000
							},
							display: true,
							borderDash: [3, 3],
							gridLines: {
								color: "rgba(0,0,0,0.0)"
							}
						}]
					}
				}
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Pie chart
			new Chart(document.getElementById("chartjs-dashboard-pie"), {
				type: "pie",
				data: {
					labels: ["Chrome", "Firefox", "IE"],
					datasets: [{
						data: [4306, 3801, 1689],
						backgroundColor: [
							window.theme.primary,
							window.theme.warning,
							window.theme.danger
						],
						borderWidth: 5
					}]
				},
				options: {
					responsive: !window.MSInputMethodContext,
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					cutoutPercentage: 75
				}
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Bar chart
			new Chart(document.getElementById("chartjs-dashboard-bar"), {
				type: "bar",
				data: {
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
					datasets: [{
						label: "This year",
						backgroundColor: window.theme.primary,
						borderColor: window.theme.primary,
						hoverBackgroundColor: window.theme.primary,
						hoverBorderColor: window.theme.primary,
						data: [54, 67, 41, 55, 62, 45, 55, 73, 60, 76, 48, 79],
						barPercentage: .75,
						categoryPercentage: .5
					}]
				},
				options: {
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					scales: {
						yAxes: [{
							gridLines: {
								display: false
							},
							stacked: false,
							ticks: {
								stepSize: 20
							}
						}],
						xAxes: [{
							stacked: false,
							gridLines: {
								color: "transparent"
							}
						}]
					}
				}
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			var markers = [{
					coords: [31.230391, 121.473701],
					name: "Shanghai"
				},
				{
					coords: [28.704060, 77.102493],
					name: "Delhi"
				},
				{
					coords: [6.524379, 3.379206],
					name: "Lagos"
				},
				{
					coords: [35.689487, 139.691711],
					name: "Tokyo"
				},
				{
					coords: [23.129110, 113.264381],
					name: "Guangzhou"
				},
				{
					coords: [40.7127837, -74.0059413],
					name: "New York"
				},
				{
					coords: [34.052235, -118.243683],
					name: "Los Angeles"
				},
				{
					coords: [41.878113, -87.629799],
					name: "Chicago"
				},
				{
					coords: [51.507351, -0.127758],
					name: "London"
				},
				{
					coords: [40.416775, -3.703790],
					name: "Madrid "
				}
			];
			var map = new JsVectorMap({
				map: "world",
				selector: "#world_map",
				zoomButtons: true,
				markers: markers,
				markerStyle: {
					initial: {
						r: 9,
						strokeWidth: 7,
						stokeOpacity: .4,
						fill: window.theme.primary
					},
					hover: {
						fill: window.theme.primary,
						stroke: window.theme.primary
					}
				}
			});
			window.addEventListener("resize", () => {
				map.updateSize();
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			document.getElementById("datetimepicker-dashboard").flatpickr({
				inline: true,
				prevArrow: "<span class=\"fas fa-chevron-left\" title=\"Previous month\"></span>",
				nextArrow: "<span class=\"fas fa-chevron-right\" title=\"Next month\"></span>",
			});
		});
	</script>
-->
 <!-- Page level custom scripts -->
     <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
     <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
     <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
     <script src="https://cdn.datatables.net/datetime/1.1.2/js/dataTables.dateTime.min.js"></script>
     <script>
         $(document).ready(function() {
            $('#table_id').DataTable( {
            	"scrollX": true,
                dom: 'Bfrtip',
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5'
                ]
            } );
        } );
     </script>
     <script type="text/javascript">
     	var minDate, maxDate;
 
		// Custom filtering function which will search data in column four between two values
		$.fn.dataTable.ext.search.push(
		    function( settings, data, dataIndex ) {
		        var min = minDate.val();
		        var max = maxDate.val();
		        var date = new Date( data[3] );
		 
		        if (
		            ( min === null && max === null ) ||
		            ( min === null && date <= max ) ||
		            ( min <= date   && max === null ) ||
		            ( min <= date   && date <= max )
		        ) {
		            return true;
		        }
		        return false;
		    }
		);
		 
		$(document).ready(function() {
		    // Create date inputs
		    minDate = new DateTime($('#min'), {
		        format: 'MMMM Do YYYY'
		    });
		    maxDate = new DateTime($('#max'), {
		        format: 'MMMM Do YYYY'
		    });
		 
		    // DataTables initialisation
		    var table = $('#table_id').DataTable();
		 
		    // Refilter the table
		    $('#min, #max').on('change', function () {
		        table.draw();
		    });
		});
     </script>
</body>

</html>
<script>
if(document.getElementById('ftnt_topbar_script')) {
    document.getElementById('ftnt_topbar_script').remove()
} else {
   var pluginHolder = document.createElement('div');
   document.body.appendChild(pluginHolder);
}