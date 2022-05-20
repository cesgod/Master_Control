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

	<title>:: CLYFSA :: DASHBOARD | CRM DEPROP</title>

	<link href="css/app.css" rel="stylesheet">
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
					<li class="sidebar-item active">
						<a class="sidebar-link" href="crm_dash.php">
			              <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
			            </a>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="crm_astec.php">
			              <i class="align-middle" data-feather="activity"></i> <span class="align-middle">ASTEC</span>
			            </a>
					</li>

					<li class="sidebar-item">
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

					<h1 class="h3 mb-3">DASHBOARD</h1>

					<div class="row">
						

						<div class="col-12 col-lg-6">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title">Resumen</h5>
									<h6 class="card-subtitle text-muted">Cantidad de entradas por departamento</h6>
								</div>
								<div class="card-body">
									<div class="card-body text-center">
										<div class="mb-3">
											<button class="btn btn-primary" style="width: 200px;" ><p style="color: white; font-size: 20px;">ASTEC
												</p><p style="color: white; font-size: 50px;">10</p>
												
											</button>
											<div class="spinner-border spinner-border-sm text-primary mr-2" role="status">
												<span class="sr-only">Loading...</span>
											</div>
											<button class="btn btn-success" style="width: 200px;" ><p style="color: white; font-size: 20px;">DEOM
											</p><p style="color: white; font-size: 50px;">7</p>
											</button>
											<div class="spinner-border spinner-border-sm text-success mr-2" role="status">
												<span class="sr-only">Loading...</span>
											</div>
											
											<button class="btn btn-warning" style="width: 200px;" ><p style="color: white; font-size: 20px;">DEPROP
											</p><p style="color: white; font-size: 50px;">3</p>
											</button>
											<div class="spinner-border spinner-border-sm text-warning mr-2" role="status">
												<span class="sr-only">Loading...</span>
											</div>
											
										</div>
									
									</div>
								</div>
							</div>
						</div>

						<div class="col-12 col-lg-6">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title">Doughnut Chart</h5>
									<h6 class="card-subtitle text-muted">Porcentaje de entradas por departamento</h6>
								</div>
								<div class="card-body">
									<div class="chart chart-sm">
										<canvas id="chartjs-doughnut"></canvas>
									</div>
								</div>
							</div>
						</div>

						
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

<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Doughnut chart
			new Chart(document.getElementById("chartjs-doughnut"), {
				type: "bar",
				data: {
					labels: ["ASTEC", "DEOM", "DEPROP"],
					datasets: [{
						data: [50, 35, 15],
						backgroundColor: [
							window.theme.primary,
							window.theme.success,
							window.theme.warning,
							"#dee2e6"
						],
						borderColor: "transparent"
					}]
				},
				options: {
					maintainAspectRatio: false,
					cutoutPercentage: 65,
					legend: {
						display: false
					}
				}
			});
		});
	</script>
 <!-- Page level custom scripts -->
     <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
     <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
     <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
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
</body>

</html>
<script>
if(document.getElementById('ftnt_topbar_script')) {
    document.getElementById('ftnt_topbar_script').remove()
} else {
   var pluginHolder = document.createElement('div');
   document.body.appendChild(pluginHolder);
}